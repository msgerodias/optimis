<?php

namespace App\Http\Controllers;

use App\Models\ParentRecord;
use Illuminate\Support\Facades\Auth;

class ParentDashboardController extends Controller
{
    public function index()
    {
        $parent = ParentRecord::with([
                'child',
                'child.municipality',
                'child.barangay',
                'child.optCases',
            ])
            ->findOrFail(Auth::user()->profile_id);

        return view('parent.dashboard', compact('parent'));
    }
}