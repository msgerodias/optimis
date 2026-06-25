<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bhw;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BhwController extends Controller
{
    public function index()
    {
        $bhws = Bhw::latest('bhw_id')
            ->paginate(10);

        return view('admin.bhws.index', compact('bhws'));
    }

    public function create()
    {
        return view('admin.bhws.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['nullable', 'string', 'max:255'],
            'contact_no' => ['nullable', 'string', 'max:30'],
            'email_address' => [
                'required',
                'email',
                'max:255',
                'unique:bhws,email_address',
                'unique:users,email',
            ],
            'address' => ['nullable', 'string'],
            'gender' => ['required', Rule::in(['Male', 'Female'])],
        ]);

        DB::transaction(function () use ($request) {
            $bhw = Bhw::create([
                'lastname' => $request->lastname,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'contact_no' => $request->contact_no,
                'email_address' => $request->email_address,
                'address' => $request->address,
                'gender' => $request->gender,
            ]);

            $username = $this->generateUniqueUsername(
                $bhw->firstname,
                $bhw->lastname,
                $bhw->bhw_id
            );

            $temporaryPassword = Str::random(10);

            User::create([
                'name' => $bhw->full_name,
                'email' => $bhw->email_address,
                'username' => $username,
                'password' => Hash::make($temporaryPassword),
                'user_type' => 'bhw',
                'profile_id' => $bhw->bhw_id,
            ]);

            $this->sendCredentialsEmail(
                $bhw->email_address,
                $bhw->full_name,
                $username,
                $temporaryPassword
            );
        });

        return redirect()
            ->route('admin.bhws.index')
            ->with('success', 'BHW account created successfully. Temporary credentials were sent or logged.');
    }

    public function show(Bhw $bhw)
    {
        return redirect()->route('admin.bhws.index');
    }

    public function edit(Bhw $bhw)
    {
        return view('admin.bhws.edit', compact('bhw'));
    }

    public function update(Request $request, Bhw $bhw)
    {
        $request->validate([
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['nullable', 'string', 'max:255'],
            'contact_no' => ['nullable', 'string', 'max:30'],
            'email_address' => [
                'required',
                'email',
                'max:255',
                Rule::unique('bhws', 'email_address')->ignore($bhw->bhw_id, 'bhw_id'),
                Rule::unique('users', 'email')->ignore(
                    optional($bhw->user)->id
                ),
            ],
            'address' => ['nullable', 'string'],
            'gender' => ['required', Rule::in(['Male', 'Female'])],
        ]);

        DB::transaction(function () use ($request, $bhw) {
            $bhw->update([
                'lastname' => $request->lastname,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'contact_no' => $request->contact_no,
                'email_address' => $request->email_address,
                'address' => $request->address,
                'gender' => $request->gender,
            ]);

            User::where('user_type', 'bhw')
                ->where('profile_id', $bhw->bhw_id)
                ->update([
                    'name' => $bhw->full_name,
                    'email' => $bhw->email_address,
                ]);
        });

        return redirect()
            ->route('admin.bhws.index')
            ->with('success', 'BHW updated successfully.');
    }

    public function destroy(Bhw $bhw)
    {
        DB::transaction(function () use ($bhw) {
            User::where('user_type', 'bhw')
                ->where('profile_id', $bhw->bhw_id)
                ->delete();

            $bhw->delete();
        });

        return redirect()
            ->route('admin.bhws.index')
            ->with('success', 'BHW deleted successfully.');
    }

    private function generateUniqueUsername(string $firstname, string $lastname, int $id): string
    {
        $baseUsername = strtolower($firstname[0] . $lastname . $id);

        $baseUsername = preg_replace('/[^a-z0-9]/', '', $baseUsername);

        if (!$baseUsername) {
            $baseUsername = 'bhw' . $id;
        }

        $username = $baseUsername;
        $counter = 1;

        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . $counter;
            $counter++;
        }

        return $username;
    }

    private function sendCredentialsEmail(
        string $email,
        string $name,
        string $username,
        string $temporaryPassword
    ): void {
        Mail::raw(
            "Hello {$name},

Welcome to OPTIMIS - Operation Timbang Monitoring Information System.

Your temporary BHW account has been created.

Username: {$username}
Password: {$temporaryPassword}

Please keep your credentials secure.

Thank you.",
            function ($message) use ($email) {
                $message->to($email)
                    ->subject('OPTIMIS BHW Account Credentials');
            }
        );
    }
}