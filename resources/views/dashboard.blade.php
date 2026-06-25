@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-6">

    {{-- Welcome Card --}}
    <div class="xl:col-span-2 rounded-3xl bg-gradient-to-br from-yellow-700 via-yellow-800 to-yellow-950 text-white p-8 shadow-xl relative overflow-hidden">

        <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full bg-white/10"></div>
        <div class="absolute -bottom-24 -left-24 w-80 h-80 rounded-full bg-white/10"></div>

        <div class="relative z-10">
            <div class="w-16 h-16 rounded-3xl bg-white/15 flex items-center justify-center mb-5">
                <i class="fa-solid fa-scale-balanced text-3xl"></i>
            </div>

            <h2 class="text-3xl font-black mb-2">
                Welcome to OPTIMIS
            </h2>

            <p class="text-yellow-100 max-w-2xl">
                Operation Timbang Monitoring Information System helps manage barangay child nutrition records, OPT cases, and report generation.
            </p>

            <div class="mt-6 flex flex-wrap gap-3">
                @if(auth()->user()->user_type === 'dswd')
                    <a href="{{ route('admin.municipalities.index') }}"
                       class="inline-flex items-center gap-2 rounded-2xl bg-white text-yellow-800 px-5 py-3 text-sm font-bold shadow">
                        <i class="fa-solid fa-map-location-dot"></i>
                        Manage Municipalities
                    </a>

                    <a href="{{ route('reports.index') }}"
                       class="inline-flex items-center gap-2 rounded-2xl bg-white/15 text-white px-5 py-3 text-sm font-bold hover:bg-white/20">
                        <i class="fa-solid fa-file-lines"></i>
                        View Reports
                    </a>
                @endif

                @if(auth()->user()->user_type === 'bhw')
                    <a href="{{ route('bhw.children.create') }}"
                       class="inline-flex items-center gap-2 rounded-2xl bg-white text-yellow-800 px-5 py-3 text-sm font-bold shadow">
                        <i class="fa-solid fa-child-reaching"></i>
                        Register Child
                    </a>

                    <a href="{{ route('reports.index') }}"
                       class="inline-flex items-center gap-2 rounded-2xl bg-white/15 text-white px-5 py-3 text-sm font-bold hover:bg-white/20">
                        <i class="fa-solid fa-file-lines"></i>
                        Generate Report
                    </a>
                @endif
            </div>
        </div>
    </div>

    {{-- Account Card --}}
    <div class="rounded-3xl bg-white border border-yellow-100 p-6 shadow">
        <div class="flex items-center gap-4 mb-5">
            <div class="w-16 h-16 rounded-3xl bg-yellow-100 text-yellow-800 flex items-center justify-center">
                <i class="fa-solid fa-user text-2xl"></i>
            </div>

            <div>
                <p class="text-sm text-gray-500">Logged in as</p>
                <h3 class="font-black text-gray-900">{{ auth()->user()->name }}</h3>
                <p class="text-xs uppercase font-bold text-yellow-700">
                    {{ auth()->user()->user_type }}
                </p>
            </div>
        </div>

        <div class="space-y-3 text-sm">
            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-500">Username</span>
                <span class="font-bold">{{ auth()->user()->username }}</span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="text-gray-500">Email</span>
                <span class="font-bold truncate max-w-[180px]">{{ auth()->user()->email }}</span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-500">Role</span>
                <span class="font-bold uppercase">{{ auth()->user()->user_type }}</span>
            </div>
        </div>
    </div>
</div>

{{-- Stats --}}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-5 mb-6">

    <div class="rounded-3xl bg-white border border-yellow-100 p-6 shadow">
        <div class="w-12 h-12 rounded-2xl bg-yellow-100 text-yellow-800 flex items-center justify-center mb-4">
            <i class="fa-solid fa-map-location-dot"></i>
        </div>
        <p class="text-xs uppercase font-bold text-gray-500">Municipalities</p>
        <h3 class="text-4xl font-black text-yellow-800 mt-2">
            {{ $stats['municipalities'] ?? 0 }}
        </h3>
    </div>

    <div class="rounded-3xl bg-white border border-yellow-100 p-6 shadow">
        <div class="w-12 h-12 rounded-2xl bg-yellow-100 text-yellow-800 flex items-center justify-center mb-4">
            <i class="fa-solid fa-house-flag"></i>
        </div>
        <p class="text-xs uppercase font-bold text-gray-500">Barangays</p>
        <h3 class="text-4xl font-black text-yellow-800 mt-2">
            {{ $stats['barangays'] ?? 0 }}
        </h3>
    </div>

    <div class="rounded-3xl bg-white border border-yellow-100 p-6 shadow">
        <div class="w-12 h-12 rounded-2xl bg-yellow-100 text-yellow-800 flex items-center justify-center mb-4">
            <i class="fa-solid fa-user-nurse"></i>
        </div>
        <p class="text-xs uppercase font-bold text-gray-500">BHW</p>
        <h3 class="text-4xl font-black text-yellow-800 mt-2">
            {{ $stats['bhws'] ?? 0 }}
        </h3>
    </div>

    <div class="rounded-3xl bg-white border border-yellow-100 p-6 shadow">
        <div class="w-12 h-12 rounded-2xl bg-yellow-100 text-yellow-800 flex items-center justify-center mb-4">
            <i class="fa-solid fa-children"></i>
        </div>
        <p class="text-xs uppercase font-bold text-gray-500">Children</p>
        <h3 class="text-4xl font-black text-yellow-800 mt-2">
            {{ $stats['children'] ?? 0 }}
        </h3>
    </div>

    <div class="rounded-3xl bg-white border border-yellow-100 p-6 shadow">
        <div class="w-12 h-12 rounded-2xl bg-yellow-100 text-yellow-800 flex items-center justify-center mb-4">
            <i class="fa-solid fa-notes-medical"></i>
        </div>
        <p class="text-xs uppercase font-bold text-gray-500">OPT Cases</p>
        <h3 class="text-4xl font-black text-yellow-800 mt-2">
            {{ $stats['opt_cases'] ?? 0 }}
        </h3>
    </div>

</div>

{{-- Quick Guide --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <div class="rounded-3xl bg-white border border-yellow-100 p-6 shadow">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-11 h-11 rounded-2xl bg-yellow-100 text-yellow-800 flex items-center justify-center">
                <i class="fa-solid fa-user-shield"></i>
            </div>
            <h3 class="font-black text-gray-900">DSWD Admin</h3>
        </div>

        <p class="text-sm text-gray-600 leading-relaxed">
            Manage municipalities, barangays, barangay health workers, and view generated OPT reports.
        </p>
    </div>

    <div class="rounded-3xl bg-white border border-yellow-100 p-6 shadow">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-11 h-11 rounded-2xl bg-yellow-100 text-yellow-800 flex items-center justify-center">
                <i class="fa-solid fa-user-nurse"></i>
            </div>
            <h3 class="font-black text-gray-900">BHW</h3>
        </div>

        <p class="text-sm text-gray-600 leading-relaxed">
            Register children and parents, create OPT cases, encode measurements, and generate barangay reports.
        </p>
    </div>

    <div class="rounded-3xl bg-white border border-yellow-100 p-6 shadow">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-11 h-11 rounded-2xl bg-yellow-100 text-yellow-800 flex items-center justify-center">
                <i class="fa-solid fa-users"></i>
            </div>
            <h3 class="font-black text-gray-900">Parents</h3>
        </div>

        <p class="text-sm text-gray-600 leading-relaxed">
            Parents can log in using temporary credentials and view their child's OPT monitoring records.
        </p>
    </div>

</div>

@endsection