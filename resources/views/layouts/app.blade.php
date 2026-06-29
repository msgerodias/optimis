<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'OPTIMIS') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Tailwind CDN for quick setup --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Alpine.js for mobile menu --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Font Awesome Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        optimisBlue: '#2f8fc1',
                        optimisBlueDark: '#176895',
                        optimisTeal: '#72c7b0',
                        optimisGreen: '#9ccf8a',
                        optimisOrange: '#f7a832',
                        optimisSoft: '#f3fbf8',
                        optimisText: '#17364a',
                        optimisBorder: '#d8f0e9',
                    }
                }
            }
        }
    </script>

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

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background:
                radial-gradient(circle at 5% 5%, rgba(114, 199, 176, .18), transparent 26%),
                radial-gradient(circle at 95% 8%, rgba(47, 143, 193, .14), transparent 28%),
                radial-gradient(circle at 50% 100%, rgba(247, 168, 50, .13), transparent 34%),
                var(--optimis-soft);
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes floatSoft {
            0%, 100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes glowPulse {
            0%, 100% {
                opacity: .45;
                transform: scale(1);
            }

            50% {
                opacity: .75;
                transform: scale(1.07);
            }
        }

        .optimis-fade-up {
            animation: fadeUp .55s ease-out both;
        }

        .optimis-float {
            animation: floatSoft 6s ease-in-out infinite;
        }

        .optimis-glow {
            animation: glowPulse 5s ease-in-out infinite;
        }

        .optimis-sidebar {
            background:
                radial-gradient(circle at 20% 10%, rgba(255, 255, 255, .22), transparent 25%),
                radial-gradient(circle at 92% 20%, rgba(247, 168, 50, .26), transparent 28%),
                radial-gradient(circle at 48% 88%, rgba(156, 207, 138, .25), transparent 35%),
                linear-gradient(165deg, #176895 0%, #2f8fc1 48%, #72c7b0 100%);
        }

        .optimis-soft-grid {
            background-image:
                linear-gradient(rgba(47, 143, 193, .07) 1px, transparent 1px),
                linear-gradient(90deg, rgba(47, 143, 193, .07) 1px, transparent 1px);
            background-size: 42px 42px;
        }

        .nav-link {
            transition: all .22s ease;
        }

        .nav-link:hover {
            transform: translateX(4px);
        }

        .mobile-link {
            transition: all .22s ease;
        }

        .mobile-link:hover {
            transform: translateX(3px);
        }
    </style>
</head>

<body class="text-gray-800">

@auth
<div x-data="{ mobileMenu: false }" class="min-h-screen flex relative overflow-x-hidden">

    {{-- Background Grid --}}
    <div class="fixed inset-0 optimis-soft-grid pointer-events-none"></div>

    {{-- Desktop Sidebar --}}
    <aside class="hidden lg:flex lg:flex-col w-72 h-screen sticky top-0 optimis-sidebar text-white shadow-2xl relative overflow-hidden z-20">

        {{-- Sidebar Effects --}}
        <div class="absolute -top-28 -left-28 w-72 h-72 rounded-full border-[32px] border-white/10 optimis-glow"></div>
        <div class="absolute -bottom-32 -right-28 w-80 h-80 rounded-full border-[36px] border-[#f7a832]/30 optimis-glow"></div>

        {{-- Brand --}}
        <div class="relative z-10 shrink-0 p-5 border-b border-white/20">   
            <div class="flex items-center gap-3">
                <div class="w-14 h-14 rounded-2xl bg-white flex items-center justify-center shadow-xl optimis-float">
                    <img
                        src="{{ asset('images/optimis/optimis-logo.png') }}"
                        alt="OPTIMIS Logo"
                        class="w-11 h-11 object-contain"
                    >
                </div>

                <div class="min-w-0">
                    <h1 class="text-2xl font-black tracking-tight leading-none">
                        OPTIMIS
                    </h1>
                    <p class="mt-1 text-[11px] text-white/85 leading-tight">
                        Tracking Growth, Saving Lives
                    </p>
                </div>
            </div>
        </div>

        {{-- Navigation --}}
        <nav class="relative z-10 flex-1 min-h-0 overflow-y-auto p-4 space-y-2 text-sm font-semibold">

            <a href="{{ route('dashboard') }}"
               class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-2xl {{ request()->routeIs('dashboard') ? 'bg-white text-[#176895] shadow-xl' : 'text-white/95 hover:bg-white/15' }}">
                <i class="fa-solid fa-chart-line w-5"></i>
                <span>Dashboard</span>
            </a>

            @if(auth()->user()->user_type === 'dswd')
                <a href="{{ route('admin.municipalities.index') }}"
                   class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-2xl {{ request()->routeIs('admin.municipalities.*') ? 'bg-white text-[#176895] shadow-xl' : 'text-white/95 hover:bg-white/15' }}">
                    <i class="fa-solid fa-map-location-dot w-5"></i>
                    <span>Municipalities</span>
                </a>

                <a href="{{ route('admin.barangays.index') }}"
                   class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-2xl {{ request()->routeIs('admin.barangays.*') ? 'bg-white text-[#176895] shadow-xl' : 'text-white/95 hover:bg-white/15' }}">
                    <i class="fa-solid fa-house-flag w-5"></i>
                    <span>Barangays</span>
                </a>

                <a href="{{ route('admin.bhws.index') }}"
                   class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-2xl {{ request()->routeIs('admin.bhws.*') ? 'bg-white text-[#176895] shadow-xl' : 'text-white/95 hover:bg-white/15' }}">
                    <i class="fa-solid fa-user-nurse w-5"></i>
                    <span>BHW Accounts</span>
                </a>

                <a href="{{ route('reports.index') }}"
                   class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-2xl {{ request()->routeIs('reports.*') ? 'bg-white text-[#176895] shadow-xl' : 'text-white/95 hover:bg-white/15' }}">
                    <i class="fa-solid fa-file-lines w-5"></i>
                    <span>Reports</span>
                </a>
            @endif

            @if(auth()->user()->user_type === 'bhw')
                <a href="{{ route('bhw.children.index') }}"
                   class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-2xl {{ request()->routeIs('bhw.children.*') || request()->routeIs('bhw.opt-cases.*') ? 'bg-white text-[#176895] shadow-xl' : 'text-white/95 hover:bg-white/15' }}">
                    <i class="fa-solid fa-children w-5"></i>
                    <span>Children</span>
                </a>

                <a href="{{ route('reports.index') }}"
                   class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-2xl {{ request()->routeIs('reports.*') ? 'bg-white text-[#176895] shadow-xl' : 'text-white/95 hover:bg-white/15' }}">
                    <i class="fa-solid fa-file-lines w-5"></i>
                    <span>Reports</span>
                </a>
            @endif

            @if(auth()->user()->user_type === 'parent')
                <a href="{{ route('parent.dashboard') }}"
                   class="nav-link flex items-center gap-3 px-4 py-2.5 rounded-2xl {{ request()->routeIs('parent.dashboard') ? 'bg-white text-[#176895] shadow-xl' : 'text-white/95 hover:bg-white/15' }}">
                    <i class="fa-solid fa-child-reaching w-5"></i>
                    <span>My Child</span>
                </a>
            @endif

        </nav>

        {{-- User Footer --}}
        <div class="relative z-10 shrink-0 p-4 border-t border-white/20 bg-white/5 backdrop-blur-xl">
            <div class="mb-3 rounded-2xl bg-white/12 border border-white/20 px-4 py-2.5 backdrop-blur-xl">
                <p class="text-xs text-white/75">Logged in as</p>
                <p class="text-sm font-black truncate">{{ auth()->user()->name }}</p>
                <p class="text-xs uppercase font-bold text-[#f7a832] tracking-wide">
                    {{ auth()->user()->user_type }}
                </p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full flex items-center gap-3 px-4 py-2.5 rounded-2xl bg-white/12 hover:bg-white/20 transition text-sm font-bold">
                    <i class="fa-solid fa-right-from-bracket w-5"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 min-w-0 relative z-10">

        {{-- Top Header --}}
        <header class="bg-white/90 backdrop-blur-xl border-b border-[#d8f0e9] shadow-sm sticky top-0 z-30">

            <div class="px-4 sm:px-6 py-4 flex items-center justify-between">

                <div class="flex items-center gap-3">
                    {{-- Mobile Menu Button --}}
                    <button @click="mobileMenu = !mobileMenu"
                            class="lg:hidden w-11 h-11 rounded-2xl bg-[#e8f8f3] text-[#176895] flex items-center justify-center shadow-sm">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                    <div class="hidden sm:flex w-11 h-11 rounded-2xl bg-white border border-[#d8f0e9] items-center justify-center shadow-sm">
                        <img
                            src="{{ asset('images/optimis/optimis-logo.png') }}"
                            alt="OPTIMIS Logo"
                            class="w-8 h-8 object-contain"
                        >
                    </div>

                    <div>
                        <h2 class="text-lg sm:text-xl font-black text-[#17364a]">
                            @yield('title', 'Dashboard')
                        </h2>
                        <p class="text-xs text-gray-500">
                            Operation Timbang Monitoring Information System
                        </p>
                    </div>
                </div>

                <div class="hidden sm:flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-sm font-black text-[#17364a]">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500 uppercase font-bold">{{ auth()->user()->user_type }}</p>
                    </div>

                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] text-white flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
            </div>

            {{-- Mobile Menu --}}
            <div x-show="mobileMenu"
                 x-transition
                 class="lg:hidden border-t border-[#d8f0e9] bg-white/95 backdrop-blur-xl px-4 py-2.5 space-y-2">

                <a href="{{ route('dashboard') }}"
                   class="mobile-link block px-4 py-2.5 rounded-xl font-bold {{ request()->routeIs('dashboard') ? 'bg-[#e8f8f3] text-[#176895]' : 'text-gray-700 hover:bg-[#e8f8f3]' }}">
                    <i class="fa-solid fa-chart-line mr-2 text-[#2f8fc1]"></i> Dashboard
                </a>

                @if(auth()->user()->user_type === 'dswd')
                    <a href="{{ route('admin.municipalities.index') }}"
                       class="mobile-link block px-4 py-2.5 rounded-xl font-bold {{ request()->routeIs('admin.municipalities.*') ? 'bg-[#e8f8f3] text-[#176895]' : 'text-gray-700 hover:bg-[#e8f8f3]' }}">
                        <i class="fa-solid fa-map-location-dot mr-2 text-[#2f8fc1]"></i> Municipalities
                    </a>

                    <a href="{{ route('admin.barangays.index') }}"
                       class="mobile-link block px-4 py-2.5 rounded-xl font-bold {{ request()->routeIs('admin.barangays.*') ? 'bg-[#e8f8f3] text-[#176895]' : 'text-gray-700 hover:bg-[#e8f8f3]' }}">
                        <i class="fa-solid fa-house-flag mr-2 text-[#2f8fc1]"></i> Barangays
                    </a>

                    <a href="{{ route('admin.bhws.index') }}"
                       class="mobile-link block px-4 py-2.5 rounded-xl font-bold {{ request()->routeIs('admin.bhws.*') ? 'bg-[#e8f8f3] text-[#176895]' : 'text-gray-700 hover:bg-[#e8f8f3]' }}">
                        <i class="fa-solid fa-user-nurse mr-2 text-[#2f8fc1]"></i> BHW Accounts
                    </a>

                    <a href="{{ route('reports.index') }}"
                       class="mobile-link block px-4 py-2.5 rounded-xl font-bold {{ request()->routeIs('reports.*') ? 'bg-[#e8f8f3] text-[#176895]' : 'text-gray-700 hover:bg-[#e8f8f3]' }}">
                        <i class="fa-solid fa-file-lines mr-2 text-[#2f8fc1]"></i> Reports
                    </a>
                @endif

                @if(auth()->user()->user_type === 'bhw')
                    <a href="{{ route('bhw.children.index') }}"
                       class="mobile-link block px-4 py-2.5 rounded-xl font-bold {{ request()->routeIs('bhw.children.*') || request()->routeIs('bhw.opt-cases.*') ? 'bg-[#e8f8f3] text-[#176895]' : 'text-gray-700 hover:bg-[#e8f8f3]' }}">
                        <i class="fa-solid fa-children mr-2 text-[#2f8fc1]"></i> Children
                    </a>

                    <a href="{{ route('reports.index') }}"
                       class="mobile-link block px-4 py-2.5 rounded-xl font-bold {{ request()->routeIs('reports.*') ? 'bg-[#e8f8f3] text-[#176895]' : 'text-gray-700 hover:bg-[#e8f8f3]' }}">
                        <i class="fa-solid fa-file-lines mr-2 text-[#2f8fc1]"></i> Reports
                    </a>
                @endif

                @if(auth()->user()->user_type === 'parent')
                    <a href="{{ route('parent.dashboard') }}"
                       class="mobile-link block px-4 py-2.5 rounded-xl font-bold {{ request()->routeIs('parent.dashboard') ? 'bg-[#e8f8f3] text-[#176895]' : 'text-gray-700 hover:bg-[#e8f8f3]' }}">
                        <i class="fa-solid fa-child-reaching mr-2 text-[#2f8fc1]"></i> My Child
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left px-4 py-2.5 rounded-xl text-red-600 hover:bg-red-50 font-bold">
                        <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </header>

        {{-- Page Body --}}
        <section class="p-4 sm:p-6 optimis-fade-up">

            @if(session('success'))
                <div class="mb-5 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-green-700 text-sm font-semibold shadow-sm">
                    <i class="fa-solid fa-circle-check mr-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-5 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-red-700 text-sm shadow-sm">
                    <div class="font-black mb-1">
                        <i class="fa-solid fa-triangle-exclamation mr-2"></i>
                        Please check the following:
                    </div>

                    <ul class="list-disc pl-5 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')

        </section>
    </main>
</div>
@else
    @yield('content')
@endauth

</body>
</html>