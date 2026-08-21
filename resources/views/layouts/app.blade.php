<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'RASA')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="min-h-screen bg-[#F7F3EA] text-[#24343D]">

    {{-- NAVBAR --}}
    <nav class="bg-[#FFFDF8] border-b border-[#E8E1D5]">

        <div class="max-w-7xl mx-auto px-6">

            <div class="min-h-[76px] flex items-center justify-between gap-6">

                {{-- LOGO --}}
                <a href="{{ auth()->check()
                    ? (auth()->user()->role === 'admin'
                        ? route('admin.dashboard')
                        : route('user.dashboard'))
                    : route('login') }}"
                    class="flex items-center gap-3 shrink-0">

                    <div class="w-10 h-10 rounded-xl bg-[#315B72]
                                flex items-center justify-center">

                        <span class="text-white font-bold text-lg">
                            R
                        </span>

                    </div>

                    <div>
                        <h1 class="text-xl font-bold tracking-wide text-[#315B72]">
                            RASA
                        </h1>

                        <p class="text-[9px] text-gray-500 tracking-widest">
                            REMOTE ASSISTANCE & SAFETY
                        </p>
                    </div>

                </a>


                {{-- NAVIGATION --}}
                @auth

                    <div class="flex items-center gap-1">

                        @if(auth()->user()->role === 'admin')

                            <a href="{{ route('admin.dashboard') }}"
                                class="px-3 py-2 rounded-lg text-sm
                                {{ request()->routeIs('admin.dashboard')
                                    ? 'bg-[#E7F0F4] text-[#315B72] font-semibold'
                                    : 'text-gray-600 hover:bg-[#F3EFE7]' }}
                                transition">
                                Dashboard
                            </a>

                            <a href="{{ route('admin.houses.index') }}"
                                class="px-3 py-2 rounded-lg text-sm
                                {{ request()->routeIs('admin.houses.*')
                                    ? 'bg-[#E7F0F4] text-[#315B72] font-semibold'
                                    : 'text-gray-600 hover:bg-[#F3EFE7]' }}
                                transition">
                                Data Rumah
                            </a>

                            <a href="{{ route('admin.activity-logs.index') }}"
                                class="px-3 py-2 rounded-lg text-sm
                                {{ request()->routeIs('admin.activity-logs.*')
                                    ? 'bg-[#E7F0F4] text-[#315B72] font-semibold'
                                    : 'text-gray-600 hover:bg-[#F3EFE7]' }}
                                transition">
                                Log Aktivitas
                            </a>

                            <a href="{{ route('admin.settings.index') }}"
                                class="px-3 py-2 rounded-lg text-sm
                                {{ request()->routeIs('admin.settings.*')
                                    ? 'bg-[#E7F0F4] text-[#315B72] font-semibold'
                                    : 'text-gray-600 hover:bg-[#F3EFE7]' }}
                                transition">
                                Pengaturan
                            </a>

                        @else

                            <a href="{{ route('user.dashboard') }}"
                                class="px-3 py-2 rounded-lg text-sm
                                {{ request()->routeIs('user.dashboard')
                                    ? 'bg-[#E7F0F4] text-[#315B72] font-semibold'
                                    : 'text-gray-600 hover:bg-[#F3EFE7]' }}
                                transition">
                                Dashboard
                            </a>

                            <a href="{{ route('user.electronics.index') }}"
                                class="px-3 py-2 rounded-lg text-sm
                                {{ request()->routeIs('user.electronics.*')
                                    ? 'bg-[#E7F0F4] text-[#315B72] font-semibold'
                                    : 'text-gray-600 hover:bg-[#F3EFE7]' }}
                                transition">
                                Perangkat
                            </a>

                            <a href="{{ route('user.alerts.index') }}"
                                class="px-3 py-2 rounded-lg text-sm
                                {{ request()->routeIs('user.alerts.*')
                                    ? 'bg-[#E7F0F4] text-[#315B72] font-semibold'
                                    : 'text-gray-600 hover:bg-[#F3EFE7]' }}
                                transition">
                                Peringatan
                            </a>

                            <a href="{{ route('user.profile.index') }}"
                                class="px-3 py-2 rounded-lg text-sm
                                {{ request()->routeIs('user.profile.*')
                                    ? 'bg-[#E7F0F4] text-[#315B72] font-semibold'
                                    : 'text-gray-600 hover:bg-[#F3EFE7]' }}
                                transition">
                                Rumah
                            </a>

                        @endif

                    </div>


                    {{-- USER --}}
                    <div class="flex items-center gap-3 shrink-0">

                        <div class="text-right hidden sm:block">

                            <p class="text-sm font-semibold">
                                {{ auth()->user()->name }}
                            </p>

                            <p class="text-xs text-gray-400 capitalize">
                                {{ auth()->user()->role }}
                            </p>

                        </div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                class="px-3 py-2 text-sm text-gray-500
                                hover:text-red-600 transition">

                                Keluar

                            </button>

                        </form>

                    </div>

                @endauth

            </div>

        </div>

    </nav>


    {{-- MAIN --}}
    <main class="max-w-7xl mx-auto px-6 py-8">

        @hasSection('header')

            <div class="mb-6">

                <h2 class="text-2xl font-bold text-[#24343D]">
                    @yield('header')
                </h2>

                @hasSection('description')

                    <p class="text-sm text-gray-500 mt-1">
                        @yield('description')
                    </p>

                @endif

            </div>

        @endif


        {{-- SUCCESS --}}
        @if(session('success'))

            <div class="mb-5 px-4 py-3 rounded-xl
                        bg-[#E7F0F4] border border-[#C9DCE5]
                        text-[#315B72] text-sm">

                {{ session('success') }}

            </div>

        @endif


        {{-- ERROR --}}
        @if(session('error'))

            <div class="mb-5 px-4 py-3 rounded-xl
                        bg-red-50 border border-red-100
                        text-red-600 text-sm">

                {{ session('error') }}

            </div>

        @endif


        @if($errors->any())

            <div class="mb-5 px-4 py-3 rounded-xl
                        bg-red-50 border border-red-100
                        text-red-600 text-sm">

                <p class="font-semibold mb-1">
                    Terdapat kesalahan:
                </p>

                <ul class="list-disc ml-5">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        @yield('content')

    </main>


    @stack('scripts')

</body>

</html>