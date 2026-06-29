@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<style>
    :root {
        --optimis-blue: #2f8fc1;
        --optimis-blue-dark: #176895;
        --optimis-teal: #72c7b0;
        --optimis-green: #9ccf8a;
        --optimis-orange: #f7a832;
        --optimis-soft: #f3fbf8;
        --optimis-text: #17364a;
        --optimis-border: #d8f0e9;
    }

    @keyframes floatSoft {
        0%, 100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-12px);
        }
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(22px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes glowPulse {
        0%, 100% {
            opacity: .55;
            transform: scale(1);
        }

        50% {
            opacity: .85;
            transform: scale(1.07);
        }
    }

    @keyframes shimmerMove {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    .optimis-fade-up {
        animation: fadeUp .65s ease-out both;
    }

    .optimis-float {
        animation: floatSoft 6s ease-in-out infinite;
    }

    .optimis-glow {
        animation: glowPulse 5s ease-in-out infinite;
    }

    .optimis-card {
        background: rgba(255, 255, 255, .88);
        border: 1px solid var(--optimis-border);
        box-shadow: 0 18px 45px rgba(47, 143, 193, .10);
        transition: all .28s ease;
    }

    .optimis-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 24px 60px rgba(47, 143, 193, .16);
    }

    .optimis-icon {
        background: linear-gradient(135deg, rgba(47, 143, 193, .15), rgba(114, 199, 176, .18));
        color: var(--optimis-blue-dark);
    }

    .optimis-main-gradient {
        background:
            radial-gradient(circle at 15% 20%, rgba(255,255,255,.23), transparent 28%),
            radial-gradient(circle at 82% 18%, rgba(247,168,50,.22), transparent 30%),
            radial-gradient(circle at 55% 90%, rgba(156,207,138,.25), transparent 36%),
            linear-gradient(135deg, #176895 0%, #2f8fc1 46%, #72c7b0 100%);
    }

    .optimis-button-primary {
        background: white;
        color: var(--optimis-blue-dark);
        transition: all .25s ease;
    }

    .optimis-button-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 30px rgba(255, 255, 255, .25);
    }

    .optimis-button-secondary {
        background: rgba(255, 255, 255, .16);
        color: white;
        border: 1px solid rgba(255, 255, 255, .22);
        transition: all .25s ease;
    }

    .optimis-button-secondary:hover {
        background: rgba(255, 255, 255, .24);
        transform: translateY(-2px);
    }

    .optimis-page-bg {
        background:
            radial-gradient(circle at 3% 8%, rgba(114, 199, 176, .20), transparent 28%),
            radial-gradient(circle at 96% 8%, rgba(47, 143, 193, .14), transparent 30%),
            radial-gradient(circle at 55% 100%, rgba(247, 168, 50, .14), transparent 34%);
    }
</style>

<div class="optimis-page-bg -m-6 p-6 min-h-screen">

    {{-- Welcome + Account --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-6">

        {{-- Welcome Card --}}
        <div class="xl:col-span-2 rounded-[2rem] optimis-main-gradient text-white p-8 shadow-[0_24px_70px_rgba(47,143,193,.28)] relative overflow-hidden optimis-fade-up">

            <div class="absolute -top-24 -right-24 w-80 h-80 rounded-full bg-white/10 optimis-glow"></div>
            <div class="absolute -bottom-28 -left-28 w-96 h-96 rounded-full bg-white/10 optimis-glow"></div>

            <div class="absolute bottom-8 right-8 hidden md:block opacity-20">
                <i class="fa-solid fa-chart-line text-[9rem]"></i>
            </div>

            <div class="relative z-10">
                <div class="flex flex-col sm:flex-row sm:items-center gap-5 mb-6">
                    <div class="w-20 h-20 rounded-[1.7rem] bg-white flex items-center justify-center shadow-xl optimis-float">
                        <img
                            src="{{ asset('images/optimis/optimis-logo.png') }}"
                            alt="OPTIMIS Logo"
                            class="w-16 h-16 object-contain"
                        >
                    </div>

                    <div>
                        <div class="inline-flex items-center gap-2 rounded-full bg-white/15 border border-white/20 px-4 py-2 text-xs font-black uppercase tracking-[.18em] text-white/95">
                            <span class="h-2 w-2 rounded-full bg-[#f7a832] animate-pulse"></span>
                            Tracking Growth, Saving Lives
                        </div>

                        <h2 class="text-3xl sm:text-4xl font-black mt-3 leading-tight">
                            Welcome to OPTIMIS
                        </h2>
                    </div>
                </div>

                <p class="text-white/90 max-w-2xl leading-relaxed">
                    Operation Timbang Monitoring Information System helps manage barangay child nutrition records, OPT cases, health monitoring, and report generation.
                </p>

                <div class="mt-7 flex flex-wrap gap-3">
                    @if(auth()->user()->user_type === 'dswd')
                        <a href="{{ route('admin.municipalities.index') }}"
                           class="optimis-button-primary inline-flex items-center gap-2 rounded-2xl px-5 py-3 text-sm font-black shadow">
                            <i class="fa-solid fa-map-location-dot"></i>
                            Manage Municipalities
                        </a>

                        <a href="{{ route('reports.index') }}"
                           class="optimis-button-secondary inline-flex items-center gap-2 rounded-2xl px-5 py-3 text-sm font-black">
                            <i class="fa-solid fa-file-lines"></i>
                            View Reports
                        </a>
                    @endif

                    @if(auth()->user()->user_type === 'bhw')
                        <a href="{{ route('bhw.children.create') }}"
                           class="optimis-button-primary inline-flex items-center gap-2 rounded-2xl px-5 py-3 text-sm font-black shadow">
                            <i class="fa-solid fa-child-reaching"></i>
                            Register Child
                        </a>

                        <a href="{{ route('reports.index') }}"
                           class="optimis-button-secondary inline-flex items-center gap-2 rounded-2xl px-5 py-3 text-sm font-black">
                            <i class="fa-solid fa-file-lines"></i>
                            Generate Report
                        </a>
                    @endif
                </div>
            </div>
        </div>

        {{-- Account Card --}}
        <div class="rounded-[2rem] optimis-card p-6 optimis-fade-up" style="animation-delay: .08s;">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-16 h-16 rounded-[1.4rem] optimis-icon flex items-center justify-center">
                    <i class="fa-solid fa-user text-2xl"></i>
                </div>

                <div class="min-w-0">
                    <p class="text-sm text-gray-500">Logged in as</p>
                    <h3 class="font-black text-[#17364a] truncate">{{ auth()->user()->name }}</h3>
                    <p class="text-xs uppercase font-black text-[#2f8fc1] tracking-wide">
                        {{ auth()->user()->user_type }}
                    </p>
                </div>
            </div>

            <div class="space-y-3 text-sm">
                <div class="flex justify-between gap-4 border-b border-[#d8f0e9] pb-3">
                    <span class="text-gray-500">Username</span>
                    <span class="font-bold text-[#17364a] truncate">{{ auth()->user()->username }}</span>
                </div>

                <div class="flex justify-between gap-4 border-b border-[#d8f0e9] pb-3">
                    <span class="text-gray-500">Email</span>
                    <span class="font-bold text-[#17364a] truncate max-w-[190px]">{{ auth()->user()->email }}</span>
                </div>

                <div class="flex justify-between gap-4">
                    <span class="text-gray-500">Role</span>
                    <span class="font-black uppercase text-[#f7a832]">{{ auth()->user()->user_type }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-5 mb-6">

        <div class="rounded-[2rem] optimis-card p-6 optimis-fade-up" style="animation-delay: .10s;">
            <div class="w-12 h-12 rounded-2xl optimis-icon flex items-center justify-center mb-4">
                <i class="fa-solid fa-map-location-dot"></i>
            </div>
            <p class="text-xs uppercase font-black text-gray-500 tracking-wide">Municipalities</p>
            <h3 class="text-4xl font-black text-[#2f8fc1] mt-2">
                {{ $stats['municipalities'] ?? 0 }}
            </h3>
        </div>

        <div class="rounded-[2rem] optimis-card p-6 optimis-fade-up" style="animation-delay: .14s;">
            <div class="w-12 h-12 rounded-2xl optimis-icon flex items-center justify-center mb-4">
                <i class="fa-solid fa-house-flag"></i>
            </div>
            <p class="text-xs uppercase font-black text-gray-500 tracking-wide">Barangays</p>
            <h3 class="text-4xl font-black text-[#2f8fc1] mt-2">
                {{ $stats['barangays'] ?? 0 }}
            </h3>
        </div>

        <div class="rounded-[2rem] optimis-card p-6 optimis-fade-up" style="animation-delay: .18s;">
            <div class="w-12 h-12 rounded-2xl optimis-icon flex items-center justify-center mb-4">
                <i class="fa-solid fa-user-nurse"></i>
            </div>
            <p class="text-xs uppercase font-black text-gray-500 tracking-wide">BHW</p>
            <h3 class="text-4xl font-black text-[#72c7b0] mt-2">
                {{ $stats['bhws'] ?? 0 }}
            </h3>
        </div>

        <div class="rounded-[2rem] optimis-card p-6 optimis-fade-up" style="animation-delay: .22s;">
            <div class="w-12 h-12 rounded-2xl optimis-icon flex items-center justify-center mb-4">
                <i class="fa-solid fa-children"></i>
            </div>
            <p class="text-xs uppercase font-black text-gray-500 tracking-wide">Children</p>
            <h3 class="text-4xl font-black text-[#72c7b0] mt-2">
                {{ $stats['children'] ?? 0 }}
            </h3>
        </div>

        <div class="rounded-[2rem] optimis-card p-6 optimis-fade-up" style="animation-delay: .26s;">
            <div class="w-12 h-12 rounded-2xl bg-[#fff3dc] text-[#f7a832] flex items-center justify-center mb-4">
                <i class="fa-solid fa-notes-medical"></i>
            </div>
            <p class="text-xs uppercase font-black text-gray-500 tracking-wide">OPT Cases</p>
            <h3 class="text-4xl font-black text-[#f7a832] mt-2">
                {{ $stats['opt_cases'] ?? 0 }}
            </h3>
        </div>

    </div>

    {{-- Quick Guide --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="rounded-[2rem] optimis-card p-6 optimis-fade-up" style="animation-delay: .30s;">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 rounded-2xl optimis-icon flex items-center justify-center">
                    <i class="fa-solid fa-user-shield"></i>
                </div>
                <h3 class="font-black text-[#17364a]">DSWD Admin</h3>
            </div>

            <p class="text-sm text-gray-600 leading-relaxed">
                Manage municipalities, barangays, barangay health workers, and view generated OPT reports.
            </p>
        </div>

        <div class="rounded-[2rem] optimis-card p-6 optimis-fade-up" style="animation-delay: .34s;">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 rounded-2xl optimis-icon flex items-center justify-center">
                    <i class="fa-solid fa-user-nurse"></i>
                </div>
                <h3 class="font-black text-[#17364a]">BHW</h3>
            </div>

            <p class="text-sm text-gray-600 leading-relaxed">
                Register children and parents, create OPT cases, encode measurements, and generate barangay reports.
            </p>
        </div>

        <div class="rounded-[2rem] optimis-card p-6 optimis-fade-up" style="animation-delay: .38s;">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-[#fff3dc] text-[#f7a832] rounded-2xl flex items-center justify-center">
                    <i class="fa-solid fa-users"></i>
                </div>
                <h3 class="font-black text-[#17364a]">Parents</h3>
            </div>

            <p class="text-sm text-gray-600 leading-relaxed">
                Parents can log in using temporary credentials and view their child's OPT monitoring records.
            </p>
        </div>

    </div>

</div>

@endsection