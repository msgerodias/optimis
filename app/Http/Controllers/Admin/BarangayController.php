<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barangay;
use App\Models\Municipality;
use Illuminate\Http\Request;

class BarangayController extends Controller
{
    public function index()
    {
        $barangays = Barangay::with('municipality')
            ->latest('brgy_id')
            ->paginate(10);

        return view('admin.barangays.index', compact('barangays'));
    }

    public function create()
    {
        $municipalities = Municipality::orderBy('municipality_name')
            ->get();

        return view('admin.barangays.create', compact('municipalities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brgy_name' => ['required', 'string', 'max:255'],
            'brgy_municipality' => ['required', 'exists:municipalities,municipality_id'],
            'brgy_purok_count' => ['required', 'integer', 'min:1'],
        ]);

        Barangay::create([
            'brgy_name' => $request->brgy_name,
            'brgy_municipality' => $request->brgy_municipality,
            'brgy_purok_count' => $request->brgy_purok_count,
        ]);

        return redirect()
            ->route('admin.barangays.index')
            ->with('success', 'Barangay created successfully.');
    }

    public function show(Barangay $barangay)
    {
        return redirect()->route('admin.barangays.index');
    }

    public function edit(Barangay $barangay)
    {
        $municipalities = Municipality::orderBy('municipality_name')
            ->get();

        return view('admin.barangays.edit', compact('barangay', 'municipalities'));
    }

    public function update(Request $request, Barangay $barangay)
    {
        $request->validate([
            'brgy_name' => ['required', 'string', 'max:255'],
            'brgy_municipality' => ['required', 'exists:municipalities,municipality_id'],
            'brgy_purok_count' => ['required', 'integer', 'min:1'],
        ]);

        $barangay->update([
            'brgy_name' => $request->brgy_name,
            'brgy_municipality' => $request->brgy_municipality,
            'brgy_purok_count' => $request->brgy_purok_count,
        ]);

        return redirect()
            ->route('admin.barangays.index')
            ->with('success', 'Barangay updated successfully.');
    }

    public function destroy(Barangay $barangay)
    {
        if ($barangay->children()->count() > 0) {
            return back()->withErrors([
                'delete' => 'Cannot delete this barangay because it has child records connected to it.',
            ]);
        }

        $barangay->delete();

        return redirect()
            ->route('admin.barangays.index')
            ->with('success', 'Barangay deleted successfully.');
    }
}