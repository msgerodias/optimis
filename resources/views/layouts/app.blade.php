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
                        optimisGold: '#d69e2e',
                        optimisGoldDark: '#9a6b11',
                        optimisDark: '#2d2206',
                        optimisCream: '#fff8e7',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-optimisCream text-gray-800">

@auth
<div x-data="{ mobileMenu: false }" class="min-h-screen flex">

    {{-- Desktop Sidebar --}}
    <aside class="hidden lg:flex lg:flex-col w-72 bg-gradient-to-b from-yellow-700 via-yellow-800 to-yellow-950 text-white shadow-2xl">

        <div class="p-6 border-b border-yellow-600/40">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-white/15 flex items-center justify-center">
                    <i class="fa-solid fa-scale-balanced text-2xl"></i>
                </div>

                <div>
                    <h1 class="text-2xl font-black tracking-wide">OPTIMIS</h1>
                    <p class="text-xs text-yellow-100 leading-tight">
                        Operation Timbang Monitoring Information System
                    </p>
                </div>
            </div>
        </div>

        <nav class="flex-1 p-4 space-y-2 text-sm font-medium">

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-2xl transition {{ request()->routeIs('dashboard') ? 'bg-white text-yellow-800 shadow' : 'hover:bg-white/10' }}">
                <i class="fa-solid fa-chart-line w-5"></i>
                <span>Dashboard</span>
            </a>

            @if(auth()->user()->user_type === 'dswd')
                <a href="{{ route('admin.municipalities.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-2xl transition {{ request()->routeIs('admin.municipalities.*') ? 'bg-white text-yellow-800 shadow' : 'hover:bg-white/10' }}">
                    <i class="fa-solid fa-map-location-dot w-5"></i>
                    <span>Municipalities</span>
                </a>

                <a href="{{ route('admin.barangays.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-2xl transition {{ request()->routeIs('admin.barangays.*') ? 'bg-white text-yellow-800 shadow' : 'hover:bg-white/10' }}">
                    <i class="fa-solid fa-house-flag w-5"></i>
                    <span>Barangays</span>
                </a>

                <a href="{{ route('admin.bhws.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-2xl transition {{ request()->routeIs('admin.bhws.*') ? 'bg-white text-yellow-800 shadow' : 'hover:bg-white/10' }}">
                    <i class="fa-solid fa-user-nurse w-5"></i>
                    <span>BHW Accounts</span>
                </a>

                <a href="{{ route('reports.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-2xl transition {{ request()->routeIs('reports.*') ? 'bg-white text-yellow-800 shadow' : 'hover:bg-white/10' }}">
                    <i class="fa-solid fa-file-lines w-5"></i>
                    <span>Reports</span>
                </a>
            @endif

            @if(auth()->user()->user_type === 'bhw')
                <a href="{{ route('bhw.children.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-2xl transition {{ request()->routeIs('bhw.children.*') || request()->routeIs('bhw.opt-cases.*') ? 'bg-white text-yellow-800 shadow' : 'hover:bg-white/10' }}">
                    <i class="fa-solid fa-children w-5"></i>
                    <span>Children</span>
                </a>

                <a href="{{ route('reports.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-2xl transition {{ request()->routeIs('reports.*') ? 'bg-white text-yellow-800 shadow' : 'hover:bg-white/10' }}">
                    <i class="fa-solid fa-file-lines w-5"></i>
                    <span>Reports</span>
                </a>
            @endif

            @if(auth()->user()->user_type === 'parent')
                <a href="{{ route('parent.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-2xl transition {{ request()->routeIs('parent.dashboard') ? 'bg-white text-yellow-800 shadow' : 'hover:bg-white/10' }}">
                    <i class="fa-solid fa-child-reaching w-5"></i>
                    <span>My Child</span>
                </a>
            @endif

        </nav>

        <div class="p-4 border-t border-yellow-600/40">
            <div class="mb-4 px-4">
                <p class="text-xs text-yellow-100">Logged in as</p>
                <p class="text-sm font-bold truncate">{{ auth()->user()->name }}</p>
                <p class="text-xs uppercase text-yellow-200">{{ auth()->user()->user_type }}</p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl bg-white/10 hover:bg-white/20 transition text-sm font-semibold">
                    <i class="fa-solid fa-right-from-bracket w-5"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 min-w-0">

        {{-- Top Header --}}
        <header class="bg-white border-b border-yellow-100 shadow-sm sticky top-0 z-30">

            <div class="px-4 sm:px-6 py-4 flex items-center justify-between">

                <div class="flex items-center gap-3">
                    {{-- Mobile Menu Button --}}
                    <button @click="mobileMenu = !mobileMenu"
                            class="lg:hidden w-10 h-10 rounded-xl bg-yellow-100 text-yellow-800 flex items-center justify-center">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                    <div>
                        <h2 class="text-lg sm:text-xl font-black text-yellow-800">
                            @yield('title', 'Dashboard')
                        </h2>
                        <p class="text-xs text-gray-500">
                            Operation Timbang Monitoring Information System
                        </p>
                    </div>
                </div>

                <div class="hidden sm:flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-sm font-bold text-gray-800">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500 uppercase">{{ auth()->user()->user_type }}</p>
                    </div>

                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-yellow-600 to-yellow-900 text-white flex items-center justify-center shadow">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
            </div>

            {{-- Mobile Menu --}}
            <div x-show="mobileMenu" x-transition class="lg:hidden border-t border-yellow-100 bg-white px-4 py-3 space-y-2">

                <a href="{{ route('dashboard') }}" class="block px-4 py-3 rounded-xl bg-yellow-50 text-yellow-800 font-semibold">
                    <i class="fa-solid fa-chart-line mr-2"></i> Dashboard
                </a>

                @if(auth()->user()->user_type === 'dswd')
                    <a href="{{ route('admin.municipalities.index') }}" class="block px-4 py-3 rounded-xl hover:bg-yellow-50">
                        <i class="fa-solid fa-map-location-dot mr-2"></i> Municipalities
                    </a>

                    <a href="{{ route('admin.barangays.index') }}" class="block px-4 py-3 rounded-xl hover:bg-yellow-50">
                        <i class="fa-solid fa-house-flag mr-2"></i> Barangays
                    </a>

                    <a href="{{ route('admin.bhws.index') }}" class="block px-4 py-3 rounded-xl hover:bg-yellow-50">
                        <i class="fa-solid fa-user-nurse mr-2"></i> BHW Accounts
                    </a>

                    <a href="{{ route('reports.index') }}" class="block px-4 py-3 rounded-xl hover:bg-yellow-50">
                        <i class="fa-solid fa-file-lines mr-2"></i> Reports
                    </a>
                @endif

                @if(auth()->user()->user_type === 'bhw')
                    <a href="{{ route('bhw.children.index') }}" class="block px-4 py-3 rounded-xl hover:bg-yellow-50">
                        <i class="fa-solid fa-children mr-2"></i> Children
                    </a>

                    <a href="{{ route('reports.index') }}" class="block px-4 py-3 rounded-xl hover:bg-yellow-50">
                        <i class="fa-solid fa-file-lines mr-2"></i> Reports
                    </a>
                @endif

                @if(auth()->user()->user_type === 'parent')
                    <a href="{{ route('parent.dashboard') }}" class="block px-4 py-3 rounded-xl hover:bg-yellow-50">
                        <i class="fa-solid fa-child-reaching mr-2"></i> My Child
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left px-4 py-3 rounded-xl text-red-600 hover:bg-red-50">
                        <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </header>

        {{-- Page Body --}}
        <section class="p-4 sm:p-6">

            @if(session('success'))
                <div class="mb-5 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-green-700 text-sm font-medium">
                    <i class="fa-solid fa-circle-check mr-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-5 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-red-700 text-sm">
                    <div class="font-bold mb-1">
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