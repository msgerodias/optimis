<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\Bhw;
use App\Models\ChildRecord;
use App\Models\Municipality;
use App\Models\OptCase;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->user_type === 'parent') {
            return redirect()->route('parent.dashboard');
        }

        $stats = [
            'municipalities' => Municipality::count(),
            'barangays' => Barangay::count(),
            'bhws' => Bhw::count(),
            'children' => ChildRecord::count(),
            'opt_cases' => OptCase::count(),
        ];

        return view('dashboard', compact('user', 'stats'));
    }
}