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
            --optimis-dark: #5b2a00;
            --optimis-deep: #6f3500;
            --optimis-brown: #8b4300;
            --optimis-brown-2: #a45a05;
            --optimis-gold: #f4a900;
            --optimis-gold-2: #ffbd1a;
            --optimis-cream: #fff8e8;
            --optimis-soft: #fff3c4;
            --optimis-border: #ecd991;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--optimis-cream);
        }

        .left-brush {
            clip-path: polygon(
                0 0,
                94% 0,
                90% 12%,
                94% 28%,
                89% 47%,
                93% 66%,
                88% 84%,
                94% 100%,
                0 100%
            );
        }

        .gold-divider {
            border-radius: 50% 50% 50% 50% / 45% 55% 55% 45%;
        }

        .float-slow {
            animation: floatSlow 6s ease-in-out infinite;
        }

        @keyframes floatSlow {
            0%, 100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        .login-bg {
            background:
                radial-gradient(circle at 85% 12%, rgba(244, 169, 0, 0.16), transparent 28%),
                radial-gradient(circle at 18% 88%, rgba(139, 67, 0, 0.08), transparent 30%),
                #ffffff;
        }

        .btn-optimis {
            background: linear-gradient(90deg, #8b4300 0%, #a45a05 45%, #f4a900 100%);
        }

        .btn-optimis:hover {
            filter: brightness(1.05);
        }
    </style>
</head>

<body class="min-h-screen overflow-hidden">

    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-[47%_53%] bg-[#fff8e8]">

        {{-- LEFT IMAGE PANEL --}}
        <div class="hidden lg:block relative min-h-screen overflow-hidden bg-[#5b2a00]">

            <div class="absolute inset-0 left-brush">
                <img
                    src="{{ asset('images/optimis/operation-timbang-bg.png') }}"
                    alt="Operation Timbang Background"
                    class="w-full h-full object-cover"
                    style="object-position: center; filter: sepia(25%) saturate(1.05) contrast(1.03);"
                >

                <div class="absolute inset-0 bg-gradient-to-r from-[#5b2a00]/60 via-[#8b4300]/20 to-transparent"></div>
            </div>

            {{-- Top cream curve --}}
            <div class="absolute -top-28 -left-10 w-[115%] h-64 bg-[#fff8e8]/95 rounded-b-[55%]"></div>

            {{-- Bottom brown brush --}}
            <div class="absolute -bottom-24 -left-20 w-[115%] h-80 bg-gradient-to-r from-[#5b2a00] via-[#6f3500] to-[#8b4300] rounded-tr-[75%]"></div>

            {{-- Gold divider --}}
            <div class="absolute -right-8 -top-8 h-[115%] w-24 bg-gradient-to-b from-[#ffbd1a] via-[#d98700] to-[#f4a900] gold-divider shadow-2xl"></div>

            {{-- Decorative soft glow --}}
            <div class="absolute top-28 left-14 w-32 h-32 rounded-full bg-[#f4a900]/20 blur-3xl float-slow"></div>
            <div class="absolute bottom-40 right-32 w-36 h-36 rounded-full bg-white/15 blur-3xl float-slow"></div>
        </div>

        {{-- RIGHT LOGIN AREA --}}
        <div class="relative min-h-screen login-bg flex items-center justify-center px-6 py-10 sm:px-10 lg:px-14">

            <div class="relative z-10 w-full max-w-[510px]">

                {{-- OPTIMIS BRANDING ABOVE SIGN-IN BOX --}}
                <div class="text-center mb-8">
                    <div class="mx-auto mb-5 w-28 h-28 rounded-full bg-white shadow-xl flex items-center justify-center border border-[#ecd991] float-slow">
                        <img
                            src="{{ asset('images/optimis/optimis-logo.png') }}"
                            alt="OPTIMIS Logo"
                            class="w-20 h-20 object-contain"
                        >
                    </div>

                    <h1 class="text-5xl sm:text-6xl font-black tracking-tight text-[#8b4300] leading-none">
                        OPTIMIS
                    </h1>

                    <p class="mt-3 text-2xl font-black text-[#f4a900] leading-tight">
                        Operation Timbang
                    </p>

                    <p class="mt-1 text-base sm:text-lg font-bold text-[#5b2a00]">
                        Monitoring Information System
                    </p>
                </div>

                {{-- SIGN-IN BOX --}}
                <div class="bg-white/95 backdrop-blur-xl border border-[#ecd991] rounded-[2rem] shadow-2xl p-7 sm:p-9">

                    {{-- LOGIN HEADER INSIDE BOX --}}
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
                            <h2 class="text-4xl font-black text-gray-900 leading-tight">
                                LOGIN
                            </h2>
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="mb-5 rounded-xl bg-[#fff8e8] border border-[#ecd991] px-4 py-3 text-sm font-semibold text-[#6f3500]">
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
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3.5 text-gray-800 shadow-sm outline-none transition focus:border-[#a45a05] focus:ring-4 focus:ring-[#f4a900]/20"
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
                                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3.5 pr-16 text-gray-800 shadow-sm outline-none transition focus:border-[#a45a05] focus:ring-4 focus:ring-[#f4a900]/20"
                                >

                                <button
                                    type="button"
                                    onclick="togglePassword()"
                                    class="absolute inset-y-0 right-4 flex items-center text-xs font-black text-gray-400 hover:text-[#8b4300]"
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
                                    class="rounded border-gray-300 text-[#8b4300] shadow-sm focus:ring-[#f4a900]"
                                >
                                <span class="text-sm text-gray-600">Remember me</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a
                                    href="{{ route('password.request') }}"
                                    class="text-sm font-bold text-[#9b5a05] hover:text-[#f4a900]"
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
                <div class="mt-8 border-t border-[#ecd991] pt-5 text-center">
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