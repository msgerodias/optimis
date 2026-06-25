<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Municipality;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    public function index()
    {
        $municipalities = Municipality::latest('municipality_id')
            ->paginate(10);

        return view('admin.municipalities.index', compact('municipalities'));
    }

    public function create()
    {
        return view('admin.municipalities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'municipality_name' => ['required', 'string', 'max:255'],
            'municipality_postal_code' => ['nullable', 'string', 'max:20'],
        ]);

        Municipality::create([
            'municipality_name' => $request->municipality_name,
            'municipality_postal_code' => $request->municipality_postal_code,
        ]);

        return redirect()
            ->route('admin.municipalities.index')
            ->with('success', 'Municipality created successfully.');
    }

    public function show(Municipality $municipality)
    {
        return redirect()->route('admin.municipalities.index');
    }

    public function edit(Municipality $municipality)
    {
        return view('admin.municipalities.edit', compact('municipality'));
    }

    public function update(Request $request, Municipality $municipality)
    {
        $request->validate([
            'municipality_name' => ['required', 'string', 'max:255'],
            'municipality_postal_code' => ['nullable', 'string', 'max:20'],
        ]);

        $municipality->update([
            'municipality_name' => $request->municipality_name,
            'municipality_postal_code' => $request->municipality_postal_code,
        ]);

        return redirect()
            ->route('admin.municipalities.index')
            ->with('success', 'Municipality updated successfully.');
    }

    public function destroy(Municipality $municipality)
    {
        if ($municipality->barangays()->count() > 0) {
            return back()->withErrors([
                'delete' => 'Cannot delete this municipality because it has barangays connected to it.',
            ]);
        }

        $municipality->delete();

        return redirect()
            ->route('admin.municipalities.index')
            ->with('success', 'Municipality deleted successfully.');
    }
}