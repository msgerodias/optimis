<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OPTIMIS Login</title>

    {{-- Temporary Tailwind CDN to avoid Vite manifest error --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Use this instead once Vite is working --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --optimis-blue: #2f8fc1;
            --optimis-blue-dark: #176895;
            --optimis-teal: #72c7b0;
            --optimis-green: #9ccf8a;
            --optimis-orange: #f7a832;
            --optimis-soft: #f3fbf8;
            --optimis-white: #ffffff;
            --optimis-text: #17364a;
            --optimis-border: #d8f0e9;
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--optimis-soft);
        }

        @keyframes floatSlow {
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
                transform: translateY(24px);
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
                opacity: .9;
                transform: scale(1.08);
            }
        }

        .float-slow {
            animation: floatSlow 6s ease-in-out infinite;
        }

        .fade-up {
            animation: fadeUp .75s ease-out both;
        }

        .glow-pulse {
            animation: glowPulse 5s ease-in-out infinite;
        }

        .glass {
            background: rgba(255, 255, 255, .88);
            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);
        }

        .btn-optimis {
            background: linear-gradient(135deg, #2f8fc1 0%, #72c7b0 52%, #f7a832 100%);
        }

        .btn-optimis:hover {
            filter: brightness(1.04);
        }

        .left-panel {
            background:
                radial-gradient(circle at 18% 18%, rgba(255,255,255,.24), transparent 26%),
                radial-gradient(circle at 82% 20%, rgba(247,168,50,.26), transparent 30%),
                radial-gradient(circle at 50% 88%, rgba(156,207,138,.24), transparent 36%),
                linear-gradient(145deg, #176895 0%, #2f8fc1 45%, #72c7b0 100%);
        }

        .soft-grid {
            background-image:
                linear-gradient(rgba(47,143,193,.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(47,143,193,.08) 1px, transparent 1px);
            background-size: 42px 42px;
        }

        .brand-title {
            text-shadow: 0 14px 40px rgba(23, 104, 149, .25);
        }
    </style>
</head>

<body class="min-h-screen overflow-hidden">

    <div class="relative min-h-screen bg-[#f3fbf8]">

        {{-- Global Background --}}
        <div class="absolute inset-0 soft-grid"></div>
        <div class="absolute -top-40 -left-40 h-96 w-96 rounded-full bg-[#72c7b0]/30 blur-3xl glow-pulse"></div>
        <div class="absolute top-20 -right-36 h-[30rem] w-[30rem] rounded-full bg-[#2f8fc1]/20 blur-3xl glow-pulse"></div>
        <div class="absolute -bottom-44 left-1/3 h-[30rem] w-[30rem] rounded-full bg-[#f7a832]/20 blur-3xl glow-pulse"></div>

        <div class="relative z-10 min-h-screen grid grid-cols-1 lg:grid-cols-[52%_48%]">

            {{-- LEFT BRANDING AREA --}}
            <div class="hidden lg:flex relative min-h-screen left-panel overflow-hidden items-center justify-center px-12 py-10 text-white">

                {{-- Decorative Circles --}}
                <div class="absolute -top-32 -left-32 h-[30rem] w-[30rem] rounded-full border-[44px] border-white/15"></div>
                <div class="absolute -bottom-36 -right-36 h-[34rem] w-[34rem] rounded-full border-[48px] border-[#f7a832]/35"></div>

                {{-- Soft Glow --}}
                <div class="absolute top-24 right-20 h-44 w-44 rounded-full bg-white/20 blur-3xl glow-pulse"></div>
                <div class="absolute bottom-24 left-24 h-48 w-48 rounded-full bg-[#f7a832]/25 blur-3xl glow-pulse"></div>

                {{-- Main Branding --}}
                <div class="relative z-10 w-full max-w-2xl text-center fade-up">

                    <div class="mx-auto mb-10 h-72 w-72 rounded-[3rem] bg-white shadow-[0_35px_90px_rgba(23,104,149,.35)] flex items-center justify-center border border-white/70 float-slow">
                        <img
                            src="{{ asset('images/optimis/optimis-logo.png') }}"
                            alt="OPTIMIS Logo"
                            class="h-64 w-64 object-contain"
                        >
                    </div>

                    <h1 class="brand-title text-7xl xl:text-8xl font-black tracking-tight leading-none">
                        OPTIMIS
                    </h1>

                    <p class="mt-7 text-2xl xl:text-3xl font-black leading-tight text-white">
                        Optimizing Child Health through OPT
                    </p>

                    <p class="mt-2 text-xl xl:text-2xl font-bold text-white/95">
                        Integrated Monitoring and Information System
                    </p>

                    <div class="mx-auto mt-8 h-1.5 w-32 rounded-full bg-gradient-to-r from-white via-[#f7a832] to-white"></div>

                    <p class="mt-7 text-3xl xl:text-4xl font-black text-[#f7a832] drop-shadow-lg">
                        Tracking Growth, Saving Lives
                    </p>

                </div>
            </div>

            {{-- RIGHT LOGIN AREA --}}
            <div class="relative min-h-screen flex items-center justify-center px-6 py-10 sm:px-10 lg:px-16">

                <div class="relative z-10 w-full max-w-[500px] fade-up">

                    {{-- Mobile Branding Only --}}
                    <div class="lg:hidden text-center mb-8">
                        <div class="mx-auto mb-5 h-32 w-32 rounded-[2rem] bg-white shadow-2xl flex items-center justify-center border border-[#d8f0e9]">
                            <img
                                src="{{ asset('images/optimis/optimis-logo.png') }}"
                                alt="OPTIMIS Logo"
                                class="h-28 w-28 object-contain"
                            >
                        </div>

                        <h1 class="text-5xl font-black tracking-tight leading-none">
                            <span class="text-[#2f8fc1]">OPTI</span><span class="text-[#72c7b0]">MIS</span>
                        </h1>

                        <p class="mt-3 text-lg font-black text-[#f7a832]">
                            Tracking Growth, Saving Lives
                        </p>
                    </div>

                    {{-- LOGIN BOX ONLY --}}
                    <div class="glass rounded-[2rem] border border-white shadow-[0_25px_80px_rgba(47,143,193,.22)] p-7 sm:p-9">

                        <div class="mb-7">
                            <div class="inline-flex items-center gap-2 rounded-full bg-[#e8f8f3] px-4 py-2 text-xs font-black uppercase tracking-[.16em] text-[#176895]">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                Secure Login
                            </div>

                            <h2 class="mt-4 text-3xl font-black text-[#17364a]">
                                Welcome Back
                            </h2>

                            <p class="mt-2 text-sm text-gray-500">
                                Sign in to access your DSWD, BHW, or Parent dashboard.
                            </p>
                        </div>

                        @if (session('status'))
                            <div class="mb-5 rounded-2xl bg-[#e8f8f3] border border-[#bde6dc] px-4 py-3 text-sm font-semibold text-[#176895]">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="mb-5 rounded-2xl bg-red-50 border border-red-200 px-4 py-3 text-sm font-semibold text-red-600">
                                <i class="fa-solid fa-circle-exclamation mr-2"></i>
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="space-y-5">
                            @csrf

                            {{-- Username --}}
                            <div>
                                <label for="username" class="block text-sm font-black text-[#17364a] mb-2">
                                    Username
                                </label>

                                <div class="relative group">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                                        <i class="fa-solid fa-user"></i>
                                    </span>

                                    <input
                                        id="username"
                                        type="text"
                                        name="username"
                                        value="{{ old('username') }}"
                                        required
                                        autofocus
                                        autocomplete="username"
                                        placeholder="Enter your username"
                                        class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                                    >
                                </div>

                                @error('username')
                                    <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div>
                                <label for="password" class="block text-sm font-black text-[#17364a] mb-2">
                                    Password
                                </label>

                                <div class="relative group">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>

                                    <input
                                        id="password"
                                        type="password"
                                        name="password"
                                        required
                                        autocomplete="current-password"
                                        placeholder="Enter your password"
                                        class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 pr-16 text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                                    >

                                    <button
                                        type="button"
                                        onclick="togglePassword()"
                                        class="absolute inset-y-0 right-4 flex items-center text-xs font-black text-gray-400 transition hover:text-[#176895]"
                                    >
                                        <span id="eyeText">SHOW</span>
                                    </button>
                                </div>

                                @error('password')
                                    <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Remember + Forgot --}}
                            <div class="flex items-center justify-between gap-4">
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        name="remember"
                                        class="rounded border-gray-300 text-[#2f8fc1] shadow-sm focus:ring-[#72c7b0]"
                                    >
                                    <span class="text-sm text-gray-600">Remember me</span>
                                </label>

                                @if (Route::has('password.request'))
                                    <a
                                        href="{{ route('password.request') }}"
                                        class="text-sm font-black text-[#2f8fc1] transition hover:text-[#f7a832]"
                                    >
                                        Forgot Password?
                                    </a>
                                @endif
                            </div>

                            {{-- Submit --}}
                            <button
                                type="submit"
                                class="btn-optimis group relative w-full overflow-hidden rounded-2xl px-6 py-4 text-white font-black uppercase tracking-wide shadow-[0_16px_40px_rgba(47,143,193,.28)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_22px_55px_rgba(47,143,193,.35)]"
                            >
                                <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/25 to-transparent translate-x-[-100%] transition duration-700 group-hover:translate-x-[100%]"></span>

                                <span class="relative flex items-center justify-center gap-3">
                                    Sign In
                                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                </span>
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const eyeText = document.getElementById('eyeText');

            if (password.type === 'password') {
                password.type = 'text';
                eyeText.textContent = 'HIDE';
            } else {
                password.type = 'password';
                eyeText.textContent = 'SHOW';
            }
        }
    </script>

</body>
</html>