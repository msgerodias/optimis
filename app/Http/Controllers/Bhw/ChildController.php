<?php

namespace App\Http\Controllers\Bhw;

use App\Http\Controllers\Controller;
use App\Models\Barangay;
use App\Models\ChildRecord;
use App\Models\Municipality;
use App\Models\ParentRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ChildController extends Controller
{
    public function index()
    {
        $children = ChildRecord::with([
                'municipality',
                'barangay',
                'parent',
            ])
            ->latest('child_id')
            ->paginate(10);

        return view('bhw.children.index', compact('children'));
    }

    public function create()
    {
        $municipalities = Municipality::orderBy('municipality_name')->get();

        $barangays = Barangay::with('municipality')
            ->orderBy('brgy_name')
            ->get();

        return view('bhw.children.create', compact('municipalities', 'barangays'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['nullable', 'string', 'max:255'],

            'belongs_to_ip_group' => ['required', Rule::in(['yes', 'no'])],
            'gender' => ['required', Rule::in(['Male', 'Female'])],
            'birthday' => ['required', 'date'],

            'municipality_id' => ['required', 'exists:municipalities,municipality_id'],
            'barangay_id' => ['required', 'exists:barangays,brgy_id'],
            'purok' => ['required', 'integer', 'min:1'],

            'parent_lastname' => ['required', 'string', 'max:255'],
            'parent_firstname' => ['required', 'string', 'max:255'],
            'parent_middlename' => ['nullable', 'string', 'max:255'],
            'parent_contact_no' => ['nullable', 'string', 'max:30'],
            'parent_email_address' => [
                'required',
                'email',
                'max:255',
                'unique:parents,email_address',
                'unique:users,email',
            ],
            'authorized_guardian' => ['nullable', 'string', 'max:255'],
        ]);

        DB::transaction(function () use ($request) {
            $child = ChildRecord::create([
                'lastname' => $request->lastname,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'belongs_to_ip_group' => $request->belongs_to_ip_group,
                'gender' => $request->gender,
                'birthday' => $request->birthday,
                'municipality_id' => $request->municipality_id,
                'barangay_id' => $request->barangay_id,
                'purok' => $request->purok,
            ]);

            $parent = ParentRecord::create([
                'lastname' => $request->parent_lastname,
                'firstname' => $request->parent_firstname,
                'middlename' => $request->parent_middlename,
                'contact_no' => $request->parent_contact_no,
                'email_address' => $request->parent_email_address,
                'authorized_guardian' => $request->authorized_guardian,
                'child_id' => $child->child_id,
            ]);

            $username = $this->generateUniqueUsername(
                $parent->firstname,
                $parent->lastname,
                $parent->parent_id
            );

            $temporaryPassword = Str::random(10);

            User::create([
                'name' => $parent->full_name,
                'email' => $parent->email_address,
                'username' => $username,
                'password' => Hash::make($temporaryPassword),
                'user_type' => 'parent',
                'profile_id' => $parent->parent_id,
            ]);

            $this->sendCredentialsEmail(
                $parent->email_address,
                $parent->full_name,
                $child->full_name,
                $username,
                $temporaryPassword
            );
        });

        return redirect()
            ->route('bhw.children.index')
            ->with('success', 'Child registered successfully. Parent account credentials were sent or logged.');
    }

    public function show(ChildRecord $child)
    {
        $child->load([
            'municipality',
            'barangay',
            'parent',
            'optCases',
        ]);

        return view('bhw.children.show', compact('child'));
    }

    public function edit(ChildRecord $child)
    {
        $child->load('parent');

        $municipalities = Municipality::orderBy('municipality_name')->get();

        $barangays = Barangay::with('municipality')
            ->orderBy('brgy_name')
            ->get();

        return view('bhw.children.edit', compact('child', 'municipalities', 'barangays'));
    }

    public function update(Request $request, ChildRecord $child)
    {
        $child->load('parent.user');

        $parent = $child->parent;
        $parentUserId = optional(optional($parent)->user)->id;

        $request->validate([
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['nullable', 'string', 'max:255'],

            'belongs_to_ip_group' => ['required', Rule::in(['yes', 'no'])],
            'gender' => ['required', Rule::in(['Male', 'Female'])],
            'birthday' => ['required', 'date'],

            'municipality_id' => ['required', 'exists:municipalities,municipality_id'],
            'barangay_id' => ['required', 'exists:barangays,brgy_id'],
            'purok' => ['required', 'integer', 'min:1'],

            'parent_lastname' => ['required', 'string', 'max:255'],
            'parent_firstname' => ['required', 'string', 'max:255'],
            'parent_middlename' => ['nullable', 'string', 'max:255'],
            'parent_contact_no' => ['nullable', 'string', 'max:30'],
            'parent_email_address' => [
                'required',
                'email',
                'max:255',
                Rule::unique('parents', 'email_address')->ignore($parent->parent_id, 'parent_id'),
                Rule::unique('users', 'email')->ignore($parentUserId),
            ],
            'authorized_guardian' => ['nullable', 'string', 'max:255'],
        ]);

        DB::transaction(function () use ($request, $child, $parent) {
            $child->update([
                'lastname' => $request->lastname,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'belongs_to_ip_group' => $request->belongs_to_ip_group,
                'gender' => $request->gender,
                'birthday' => $request->birthday,
                'municipality_id' => $request->municipality_id,
                'barangay_id' => $request->barangay_id,
                'purok' => $request->purok,
            ]);

            $parent->update([
                'lastname' => $request->parent_lastname,
                'firstname' => $request->parent_firstname,
                'middlename' => $request->parent_middlename,
                'contact_no' => $request->parent_contact_no,
                'email_address' => $request->parent_email_address,
                'authorized_guardian' => $request->authorized_guardian,
            ]);

            User::where('user_type', 'parent')
                ->where('profile_id', $parent->parent_id)
                ->update([
                    'name' => $parent->full_name,
                    'email' => $parent->email_address,
                ]);
        });

        return redirect()
            ->route('bhw.children.show', $child)
            ->with('success', 'Child and parent information updated successfully.');
    }

    public function destroy(ChildRecord $child)
    {
        $child->load('parent');

        DB::transaction(function () use ($child) {
            if ($child->parent) {
                User::where('user_type', 'parent')
                    ->where('profile_id', $child->parent->parent_id)
                    ->delete();
            }

            $child->delete();
        });

        return redirect()
            ->route('bhw.children.index')
            ->with('success', 'Child record deleted successfully.');
    }

    private function generateUniqueUsername(string $firstname, string $lastname, int $id): string
    {
        $baseUsername = strtolower($firstname[0] . $lastname . $id);

        $baseUsername = preg_replace('/[^a-z0-9]/', '', $baseUsername);

        if (!$baseUsername) {
            $baseUsername = 'parent' . $id;
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
        string $parentName,
        string $childName,
        string $username,
        string $temporaryPassword
    ): void {
        Mail::raw(
            "Hello {$parentName},

Welcome to OPTIMIS - Operation Timbang Monitoring Information System.

Your parent account has been created for viewing the OPT records of:

Child: {$childName}

Login Credentials:

Username: {$username}
Password: {$temporaryPassword}

Please keep your credentials secure.

Thank you.",
            function ($message) use ($email) {
                $message->to($email)
                    ->subject('OPTIMIS Parent Account Credentials');
            }
        );
    }
}