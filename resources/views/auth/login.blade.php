@extends('layouts.app')

@section('content')

<style>
    @keyframes floatSoft {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-18px) rotate(2deg); }
    }

    @keyframes pulseGlow {
        0%, 100% { opacity: .45; transform: scale(1); }
        50% { opacity: .8; transform: scale(1.08); }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(28px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes shimmer {
        0% { background-position: -200% center; }
        100% { background-position: 200% center; }
    }

    .animate-float-soft {
        animation: floatSoft 7s ease-in-out infinite;
    }

    .animate-pulse-glow {
        animation: pulseGlow 5s ease-in-out infinite;
    }

    .animate-slide-up {
        animation: slideUp .75s ease-out both;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.82);
        backdrop-filter: blur(22px);
        -webkit-backdrop-filter: blur(22px);
    }

    .gold-shimmer {
        background-size: 200% auto;
        animation: shimmer 4s linear infinite;
    }
</style>

<div class="relative min-h-screen overflow-hidden bg-[#fff8e6] flex items-center justify-center px-4 py-10">

    {{-- Background Effects --}}
    <div class="absolute inset-0 bg-gradient-to-br from-yellow-50 via-white to-yellow-200"></div>

    <div class="absolute -top-40 -left-40 w-96 h-96 rounded-full bg-yellow-300/30 blur-3xl animate-pulse-glow"></div>
    <div class="absolute top-1/3 -right-40 w-[32rem] h-[32rem] rounded-full bg-amber-600/20 blur-3xl animate-pulse-glow"></div>
    <div class="absolute -bottom-44 left-1/3 w-[34rem] h-[34rem] rounded-full bg-yellow-900/20 blur-3xl animate-pulse-glow"></div>

    <div class="absolute inset-0 opacity-[0.08]"
         style="background-image: linear-gradient(#8a5a00 1px, transparent 1px), linear-gradient(90deg, #8a5a00 1px, transparent 1px); background-size: 44px 44px;">
    </div>

    {{-- Main Container --}}
    <div class="relative z-10 w-full max-w-6xl grid grid-cols-1 lg:grid-cols-[1.05fr_.95fr] rounded-[2rem] overflow-hidden shadow-[0_30px_100px_rgba(120,70,0,.28)] border border-white/70 animate-slide-up">

        {{-- Left Branding --}}
        <div class="hidden lg:flex relative flex-col justify-between min-h-[680px] overflow-hidden bg-gradient-to-br from-yellow-700 via-yellow-900 to-stone-950 p-10 text-white">

            {{-- Decorative Layers --}}
            <div class="absolute inset-0 opacity-30"
                 style="background-image: radial-gradient(circle at 20% 20%, rgba(255,255,255,.28), transparent 25%), radial-gradient(circle at 85% 15%, rgba(255,255,255,.18), transparent 28%), radial-gradient(circle at 50% 90%, rgba(255,214,10,.22), transparent 35%);">
            </div>

            <div class="absolute -top-24 -right-20 w-80 h-80 bg-white/10 rounded-full blur-sm animate-float-soft"></div>
            <div class="absolute -bottom-28 -left-24 w-96 h-96 bg-yellow-300/10 rounded-full blur-sm animate-float-soft" style="animation-delay: 1.2s;"></div>

            <div class="relative z-10">
                <div class="inline-flex items-center gap-3 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-bold uppercase tracking-[.25em] text-yellow-100 shadow-lg">
                    <span class="h-2 w-2 rounded-full bg-green-300 animate-pulse"></span>
                    Child Nutrition Monitoring
                </div>

                <div class="mt-14">
                    <div class="w-24 h-24 rounded-[2rem] bg-white/15 border border-white/20 flex items-center justify-center mb-8 shadow-2xl animate-float-soft">
                        <i class="fa-solid fa-scale-balanced text-5xl text-yellow-100"></i>
                    </div>

                    <h1 class="text-6xl font-black tracking-tight leading-none">
                        OPTIMIS
                    </h1>

                    <div class="mt-4 h-1.5 w-28 rounded-full bg-gradient-to-r from-yellow-200 via-white to-yellow-500 gold-shimmer"></div>

                    <p class="mt-7 max-w-md text-yellow-50/90 text-lg leading-relaxed">
                        Operation Timbang Monitoring Information System for Barangay Child Nutrition Monitoring and Reporting.
                    </p>
                </div>
            </div>

            {{-- Feature Cards --}}
            <div class="relative z-10 grid grid-cols-3 gap-4">
                <div class="group rounded-3xl border border-white/15 bg-white/10 p-5 shadow-xl backdrop-blur-xl transition duration-300 hover:-translate-y-2 hover:bg-white/15">
                    <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-white/15">
                        <i class="fa-solid fa-map-location-dot text-2xl text-yellow-100"></i>
                    </div>
                    <p class="text-xs font-semibold leading-relaxed text-yellow-50/90">
                        Municipality & Barangay Records
                    </p>
                </div>

                <div class="group rounded-3xl border border-white/15 bg-white/10 p-5 shadow-xl backdrop-blur-xl transition duration-300 hover:-translate-y-2 hover:bg-white/15">
                    <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-white/15">
                        <i class="fa-solid fa-children text-2xl text-yellow-100"></i>
                    </div>
                    <p class="text-xs font-semibold leading-relaxed text-yellow-50/90">
                        Child OPT Monitoring
                    </p>
                </div>

                <div class="group rounded-3xl border border-white/15 bg-white/10 p-5 shadow-xl backdrop-blur-xl transition duration-300 hover:-translate-y-2 hover:bg-white/15">
                    <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-white/15">
                        <i class="fa-solid fa-chart-pie text-2xl text-yellow-100"></i>
                    </div>
                    <p class="text-xs font-semibold leading-relaxed text-yellow-50/90">
                        Monthly Nutrition Reports
                    </p>
                </div>
            </div>
        </div>

        {{-- Login Form --}}
        <div class="glass-card relative p-7 sm:p-10 lg:p-14">

            {{-- Mobile Branding --}}
            <div class="lg:hidden text-center mb-10 animate-slide-up">
                <div class="mx-auto w-24 h-24 rounded-[2rem] bg-gradient-to-br from-yellow-600 via-yellow-800 to-yellow-950 text-white flex items-center justify-center mb-5 shadow-2xl">
                    <i class="fa-solid fa-scale-balanced text-5xl"></i>
                </div>

                <h1 class="text-5xl font-black tracking-tight text-yellow-900">
                    OPTIMIS
                </h1>

                <p class="text-sm text-gray-500 mt-2">
                    Operation Timbang Monitoring Information System
                </p>
            </div>

            {{-- Header --}}
            <div class="mb-9 animate-slide-up" style="animation-delay: .08s;">
                <div class="inline-flex items-center gap-2 rounded-full bg-yellow-100 px-4 py-2 text-xs font-black uppercase tracking-[.18em] text-yellow-800">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    Welcome Back
                </div>

                <h2 class="mt-5 text-4xl sm:text-5xl font-black tracking-tight text-gray-950">
                    Sign in to your account
                </h2>

                <p class="mt-3 text-sm sm:text-base text-gray-500 leading-relaxed">
                    Access your DSWD, BHW, or Parent dashboard securely.
                </p>
            </div>

            {{-- Error Alert --}}
            @if($errors->any())
                <div class="mb-6 rounded-3xl border border-red-200 bg-red-50 px-5 py-4 text-red-700 text-sm shadow-sm animate-slide-up">
                    <div class="flex items-start gap-3">
                        <i class="fa-solid fa-circle-exclamation mt-0.5"></i>
                        <span>{{ $errors->first() }}</span>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}" class="space-y-6 animate-slide-up" style="animation-delay: .16s;">
                @csrf

                {{-- Username --}}
                <div>
                    <label class="mb-2 block text-sm font-black text-gray-700">
                        Username
                    </label>

                    <div class="group relative">
                        <span class="absolute inset-y-0 left-0 pl-5 flex items-center text-yellow-700 transition group-focus-within:text-yellow-900">
                            <i class="fa-solid fa-user"></i>
                        </span>

                        <input type="text"
                               name="username"
                               value="{{ old('username') }}"
                               required
                               autofocus
                               class="w-full rounded-3xl border border-yellow-100 bg-white/85 pl-14 pr-5 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition duration-300 placeholder:text-gray-400 focus:border-yellow-500 focus:bg-white focus:ring-4 focus:ring-yellow-300/30"
                               placeholder="Enter your username">
                    </div>
                </div>

                {{-- Password --}}
                <div>
                    <label class="mb-2 block text-sm font-black text-gray-700">
                        Password
                    </label>

                    <div class="group relative">
                        <span class="absolute inset-y-0 left-0 pl-5 flex items-center text-yellow-700 transition group-focus-within:text-yellow-900">
                            <i class="fa-solid fa-lock"></i>
                        </span>

                        <input type="password"
                               name="password"
                               id="passwordInput"
                               required
                               class="w-full rounded-3xl border border-yellow-100 bg-white/85 pl-14 pr-14 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition duration-300 placeholder:text-gray-400 focus:border-yellow-500 focus:bg-white focus:ring-4 focus:ring-yellow-300/30"
                               placeholder="Enter your password">

                        <button type="button"
                                onclick="togglePassword()"
                                class="absolute inset-y-0 right-0 pr-5 flex items-center text-gray-400 transition hover:text-yellow-800">
                            <i id="passwordIcon" class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </div>

                {{-- Submit --}}
                <button type="submit"
                        class="group relative w-full overflow-hidden rounded-3xl bg-gradient-to-r from-yellow-700 via-yellow-800 to-yellow-950 px-6 py-4 text-white font-black shadow-[0_18px_40px_rgba(146,93,0,.35)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_24px_55px_rgba(146,93,0,.45)]">
                    <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent translate-x-[-100%] transition duration-700 group-hover:translate-x-[100%]"></span>

                    <span class="relative flex items-center justify-center gap-3">
                        Login
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    </span>
                </button>
            </form>

            {{-- Footer Note --}}
            <div class="mt-9 rounded-3xl border border-yellow-100 bg-yellow-50/70 px-5 py-4 text-sm text-gray-600 animate-slide-up" style="animation-delay: .24s;">
                <div class="flex items-start gap-3">
                    <div class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-2xl bg-yellow-200 text-yellow-800">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>

                    <p class="leading-relaxed">
                        This system is intended for authorized users only. Please keep your login credentials secure.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const input = document.getElementById('passwordInput');
        const icon = document.getElementById('passwordIcon');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

@endsection