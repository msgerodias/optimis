<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OPTIMIS Login</title>

    {{-- Use CDN to avoid Vite manifest error --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- If Vite is already working, you can use this instead --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --optimis-dark: #5b2a00;
            --optimis-deep: #6f3500;
            --optimis-brown: #9b5a05;
            --optimis-brown-2: #b86e08;
            --optimis-gold: #f4b21b;
            --optimis-cream: #fff8e8;
            --optimis-soft: #fff3c4;
            --optimis-border: #ecd991;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--optimis-cream);
        }

        .float-slow {
            animation: floatSlow 6s ease-in-out infinite;
        }

        @keyframes floatSlow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .left-brush {
            clip-path: polygon(
                0 0,
                94% 0,
                90% 12%,
                93% 28%,
                89% 45%,
                92% 63%,
                88% 82%,
                93% 100%,
                0 100%
            );
        }

        .curve-divider {
            border-radius: 50% 50% 50% 50% / 45% 55% 55% 45%;
        }

        .theme-pattern {
            background-image:
                radial-gradient(circle at 15% 15%, rgba(244, 178, 27, 0.22), transparent 28%),
                radial-gradient(circle at 90% 75%, rgba(155, 90, 5, 0.14), transparent 30%);
        }

        .bg-optimis-gradient {
            background: linear-gradient(135deg, #9b5a05 0%, #7b3f03 48%, #5b2a00 100%);
        }

        .btn-optimis {
            background: linear-gradient(90deg, #6f3500 0%, #9b5a05 48%, #f4b21b 100%);
        }

        .btn-optimis:hover {
            filter: brightness(1.05);
        }
    </style>
</head>

<body class="min-h-screen overflow-hidden">

    <div class="min-h-screen w-full grid grid-cols-1 lg:grid-cols-[48%_22%_30%] bg-[#fff8e8]">

        {{-- LEFT IMAGE PANEL --}}
        <div class="hidden lg:block relative min-h-screen overflow-hidden bg-[#5b2a00]">

            <div class="absolute inset-0 left-brush">
                <img
                    src="{{ asset('images/optimis/operation-timbang-bg.png') }}"
                    alt="Operation Timbang Background"
                    class="w-full h-full object-cover opacity-75"
                    style="filter: sepia(35%) saturate(1.15) contrast(1.05);"
                >

                <div class="absolute inset-0 bg-gradient-to-r from-[#5b2a00]/80 via-[#9b5a05]/45 to-transparent"></div>
            </div>

            {{-- Top white/cream curve --}}
            <div class="absolute -top-28 -left-10 w-[115%] h-64 bg-[#fff8e8]/95 rounded-b-[55%]"></div>

            {{-- Bottom brown brush --}}
            <div class="absolute -bottom-20 -left-20 w-[115%] h-72 bg-gradient-to-r from-[#5b2a00] via-[#7b3f03] to-[#9b5a05] rounded-tr-[75%]"></div>

            {{-- Gold divider --}}
            <div class="absolute -right-10 -top-10 h-[115%] w-24 bg-gradient-to-b from-[#f4b21b] via-[#c97a06] to-[#f4b21b] curve-divider shadow-2xl"></div>

            {{-- Floating accent --}}
            <div class="absolute top-28 left-16 w-28 h-28 rounded-full bg-[#f4b21b]/20 blur-2xl float-slow"></div>
            <div class="absolute bottom-36 right-36 w-32 h-32 rounded-full bg-white/15 blur-3xl float-slow"></div>
        </div>

        {{-- CENTER BRANDING PANEL --}}
        <div class="hidden lg:flex relative min-h-screen items-center justify-center bg-[#fff8e8] theme-pattern overflow-hidden px-6">

            <div class="relative z-10 text-center w-full max-w-[330px]">

                <div class="mx-auto mb-8 w-28 h-28 rounded-full bg-white shadow-xl flex items-center justify-center border border-[#ecd991] float-slow">
                    <img
                        src="{{ asset('images/optimis/optimis-logo.png') }}"
                        alt="OPTIMIS Logo"
                        class="w-20 h-20 object-contain"
                    >
                </div>

                <h1 class="text-5xl xl:text-6xl font-black tracking-tight text-[#8a4c04] leading-none">
                    OPTIMIS
                </h1>

                <p class="mt-4 text-2xl font-black text-[#f4a700] leading-tight">
                    Operation Timbang
                </p>

                <p class="mt-2 text-base xl:text-lg font-bold text-[#5b2a00] leading-snug">
                    Monitoring Information System
                </p>
            </div>
        </div>

        {{-- RIGHT LOGIN PANEL --}}
        <div class="relative min-h-screen flex items-center justify-center bg-white px-6 sm:px-10 lg:px-8 xl:px-12">

            <div class="absolute top-10 right-10 w-32 h-32 rounded-full bg-[#f4b21b]/25 blur-3xl"></div>
            <div class="absolute bottom-20 left-8 w-40 h-40 rounded-full bg-[#9b5a05]/10 blur-3xl"></div>

            <div class="relative z-10 w-full max-w-[460px]">

                {{-- MOBILE LOGO --}}
                <div class="lg:hidden text-center mb-8">
                    <div class="mx-auto mb-4 w-24 h-24 rounded-full bg-white shadow-lg flex items-center justify-center border border-[#ecd991]">
                        <img
                            src="{{ asset('images/optimis/optimis-logo.png') }}"
                            alt="OPTIMIS Logo"
                            class="w-16 h-16 object-contain"
                        >
                    </div>

                    <h1 class="text-4xl font-black text-[#8a4c04]">
                        OPTIMIS
                    </h1>

                    <p class="mt-1 text-[#f4a700] font-bold">
                        Operation Timbang Monitoring Information System
                    </p>
                </div>

                {{-- LOGIN HEADER --}}
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-16 h-16 rounded-2xl bg-[#fff3c4] shadow-lg flex items-center justify-center border border-[#ecd991]">
                        <img
                            src="{{ asset('images/optimis/dswd-logo.png') }}"
                            alt="DSWD Logo"
                            class="w-11 h-11 object-contain"
                        >
                    </div>

                    <div>
                        <p class="text-xs font-black uppercase tracking-[0.28em] text-[#9b5a05]">
                            Secure Access
                        </p>
                        <h2 class="text-4xl font-black text-[#1f2937] leading-tight">
                            LOGIN
                        </h2>
                    </div>
                </div>

                {{-- LOGIN CARD --}}
                <div class="bg-white/95 backdrop-blur-xl border border-[#f0dfaa] rounded-3xl shadow-2xl p-7 sm:p-8">

                    @if (session('status'))
                        <div class="mb-5 rounded-xl bg-[#fff8e8] border border-[#ecd991] px-4 py-3 text-sm font-medium text-[#6f3500]">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        {{-- Username --}}
                        <div>
                            <label for="username" class="block text-sm font-bold text-gray-700 mb-2">
                                Username
                            </label>

                            <input
                                id="username"
                                type="text"
                                name="username"
                                value="{{ old('username') }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="Enter your username"
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3.5 text-gray-800 shadow-sm outline-none transition focus:border-[#b86e08] focus:ring-4 focus:ring-[#f4b21b]/20"
                            >

                            @error('username')
                                <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div>
                            <label for="password" class="block text-sm font-bold text-gray-700 mb-2">
                                Password
                            </label>

                            <div class="relative">
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="Enter your password"
                                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3.5 pr-16 text-gray-800 shadow-sm outline-none transition focus:border-[#b86e08] focus:ring-4 focus:ring-[#f4b21b]/20"
                                >

                                <button
                                    type="button"
                                    onclick="togglePassword()"
                                    class="absolute inset-y-0 right-4 flex items-center text-xs font-black text-gray-400 hover:text-[#9b5a05]"
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
                                    class="rounded border-gray-300 text-[#9b5a05] shadow-sm focus:ring-[#f4b21b]"
                                >
                                <span class="text-sm text-gray-600">Remember me</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a
                                    href="{{ route('password.request') }}"
                                    class="text-sm font-bold text-[#9b5a05] hover:text-[#f4a700]"
                                >
                                    Forgot Password?
                                </a>
                            @endif
                        </div>

                        {{-- Submit --}}
                        <button
                            type="submit"
                            class="btn-optimis w-full rounded-xl px-6 py-3.5 text-white font-black uppercase tracking-wide shadow-lg transition duration-300 hover:scale-[1.01] hover:shadow-xl"
                        >
                            Sign Me In
                        </button>
                    </form>
                </div>

                {{-- Footer --}}
                <div class="mt-8 border-t border-[#f0dfaa] pt-5 text-center">
                    <p class="text-sm text-gray-400 leading-relaxed">
                        © {{ date('Y') }} OPTIMIS — Operation Timbang Monitoring Information System
                    </p>
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