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

        @keyframes slideArrow {
            0% {
                transform: translateX(-30%) translateY(10%) rotate(-5deg);
                opacity: .55;
            }

            50% {
                transform: translateX(0%) translateY(-4%) rotate(0deg);
                opacity: .9;
            }

            100% {
                transform: translateX(18%) translateY(-14%) rotate(4deg);
                opacity: .65;
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

        .arrow-motion {
            animation: slideArrow 7s ease-in-out infinite alternate;
        }

        .glass {
            background: rgba(255, 255, 255, .84);
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
                radial-gradient(circle at 18% 18%, rgba(255,255,255,.22), transparent 26%),
                radial-gradient(circle at 78% 24%, rgba(247,168,50,.24), transparent 28%),
                radial-gradient(circle at 50% 88%, rgba(114,199,176,.26), transparent 35%),
                linear-gradient(145deg, #176895 0%, #2f8fc1 45%, #72c7b0 100%);
        }

        .soft-grid {
            background-image:
                linear-gradient(rgba(47,143,193,.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(47,143,193,.08) 1px, transparent 1px);
            background-size: 42px 42px;
        }
    </style>
</head>

<body class="min-h-screen overflow-hidden">

    <div class="relative min-h-screen bg-[#f3fbf8]">

        {{-- Background --}}
        <div class="absolute inset-0 soft-grid"></div>

        <div class="absolute -top-40 -left-40 h-96 w-96 rounded-full bg-[#72c7b0]/30 blur-3xl glow-pulse"></div>
        <div class="absolute top-20 -right-36 h-[30rem] w-[30rem] rounded-full bg-[#2f8fc1]/20 blur-3xl glow-pulse"></div>
        <div class="absolute -bottom-44 left-1/3 h-[30rem] w-[30rem] rounded-full bg-[#f7a832]/20 blur-3xl glow-pulse"></div>

        <div class="relative z-10 min-h-screen grid grid-cols-1 lg:grid-cols-[48%_52%]">

            {{-- LEFT BRANDING PANEL --}}
            <div class="hidden lg:flex relative min-h-screen left-panel overflow-hidden items-center justify-center px-12 py-10 text-white">

                {{-- Decorative Logo Style Circles --}}
                <div class="absolute -top-28 -left-28 h-96 w-96 rounded-full border-[38px] border-white/15"></div>
                <div class="absolute -bottom-24 -right-24 h-[28rem] w-[28rem] rounded-full border-[42px] border-[#f7a832]/35"></div>

                {{-- Animated Arrow --}}
                <div class="absolute bottom-28 left-0 right-0 mx-auto w-[85%] h-28 rounded-full border-t-[18px] border-[#9ccf8a]/70 rotate-[-12deg] arrow-motion"></div>
                <div class="absolute bottom-[13.5rem] right-24 w-0 h-0 border-l-[34px] border-l-[#9ccf8a]/80 border-y-[24px] border-y-transparent rotate-[-28deg] arrow-motion"></div>

                <div class="relative z-10 max-w-xl fade-up">
                    <div class="mt-12 rounded-[2rem] bg-white/15 border border-white/25 p-8 shadow-2xl backdrop-blur-xl float-slow">
                        <div class="h-24 w-24 rounded-[2rem] bg-white flex items-center justify-center shadow-xl mb-7">
                            <img
                                src="{{ asset('images/optimis/optimis-logo.png') }}"
                                alt="OPTIMIS Logo"
                                class="h-20 w-20 object-contain"
                            >
                        </div>

                        <h1 class="text-6xl font-black tracking-tight leading-none">
                            OPTIMIS
                        </h1>

                        <p class="mt-5 text-2xl font-black leading-tight text-white">
                            Tracking Growth, Saving Lives
                        </p>

                        <p class="mt-5 text-base leading-relaxed text-white/90">
                            Optimizing Child Health through OPT Integrated Monitoring and Information System.
                        </p>
                    </div>

                    <div class="mt-8 grid grid-cols-3 gap-4">
                        <div class="rounded-3xl bg-white/15 border border-white/20 p-5 backdrop-blur-xl transition duration-300 hover:-translate-y-2 hover:bg-white/20">
                            <i class="fa-solid fa-children text-3xl text-white"></i>
                            <p class="mt-4 text-xs font-bold leading-relaxed text-white/90">
                                Child Growth Tracking
                            </p>
                        </div>

                        <div class="rounded-3xl bg-white/15 border border-white/20 p-5 backdrop-blur-xl transition duration-300 hover:-translate-y-2 hover:bg-white/20">
                            <i class="fa-solid fa-shield-heart text-3xl text-white"></i>
                            <p class="mt-4 text-xs font-bold leading-relaxed text-white/90">
                                Health Status Monitoring
                            </p>
                        </div>

                        <div class="rounded-3xl bg-white/15 border border-white/20 p-5 backdrop-blur-xl transition duration-300 hover:-translate-y-2 hover:bg-white/20">
                            <i class="fa-solid fa-chart-line text-3xl text-white"></i>
                            <p class="mt-4 text-xs font-bold leading-relaxed text-white/90">
                                Barangay Reports
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RIGHT LOGIN AREA --}}
            <div class="relative min-h-screen flex items-center justify-center px-6 py-10 sm:px-10 lg:px-16">

                <div class="relative z-10 w-full max-w-[560px] fade-up">

                    {{-- TOP BRANDING --}}
                    <div class="text-center mb-8">

                        <div class="mx-auto mb-5 h-36 w-36 rounded-[2rem] bg-white shadow-2xl flex items-center justify-center border border-[#d8f0e9] float-slow">
                            <img
                                src="{{ asset('images/optimis/optimis-logo.png') }}"
                                alt="OPTIMIS Logo"
                                class="h-32 w-32 object-contain"
                            >
                        </div>

                        <h1 class="text-5xl sm:text-6xl font-black tracking-tight leading-none">
                            <span class="text-[#2f8fc1]">OPTI</span><span class="text-[#72c7b0]">MIS</span>
                        </h1>

                        <p class="mt-4 text-lg sm:text-xl font-black leading-tight text-[#176895]">
                            Optimizing Child Health through OPT
                        </p>

                        <p class="mt-1 text-base sm:text-lg font-bold text-[#176895]">
                            Integrated Monitoring and Information System
                        </p>

                        <p class="mt-3 text-lg sm:text-xl font-black text-[#f7a832]">
                            Tracking Growth, Saving Lives
                        </p>
                    </div>

                    {{-- LOGIN BOX --}}
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

                    {{-- Footer --}}
                    <div class="mt-7 text-center">
                        <p class="text-sm text-gray-400 leading-relaxed">
                            © {{ date('Y') }} OPTIMIS — Operation Timbang Monitoring Information System
                        </p>
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