<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'RASA')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

    <style>

        /* =========================
           GLOBAL RASA STYLE
        ========================= */

        body {
            background: #f7f3ea;
            color: #24343d;
        }


        /* =========================
           NAVBAR
        ========================= */

        .rasa-navbar {
            background: #fffdf8;

            border-bottom: 1px solid #e8e1d5;

            box-shadow:
                0 2px 8px
                rgba(49, 91, 114, 0.03);
        }


        .rasa-navbar-inner {
            min-height: 76px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 24px;
        }


        /* =========================
           LOGO
        ========================= */

        .rasa-logo {
            display: flex;
            align-items: center;

            gap: 12px;

            text-decoration: none;

            flex-shrink: 0;
        }


        .rasa-logo-icon {
            width: 40px;
            height: 40px;

            border-radius: 12px;

            background: #315b72;

            display: flex;
            align-items: center;
            justify-content: center;

            box-shadow:
                0 3px 8px
                rgba(49, 91, 114, 0.12);
        }


        .rasa-logo-letter {
            color: #ffffff;

            font-size: 18px;
            font-weight: 700;
        }


        .rasa-logo-name {
            margin: 0;

            font-size: 20px;
            font-weight: 700;

            letter-spacing: 0.04em;

            color: #315b72;
        }


        .rasa-logo-subtitle {
            margin: 2px 0 0;

            font-size: 9px;

            color: #7a7d7c;

            letter-spacing: 0.15em;
        }


        /* =========================
           NAVIGATION
        ========================= */

        .rasa-navigation {
            display: flex;

            align-items: center;

            gap: 4px;
        }


        .rasa-nav-link {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding: 9px 13px;

            border-radius: 10px;

            font-size: 13px;

            color: #606867;

            text-decoration: none;

            transition:
                background 0.2s ease,
                color 0.2s ease;
        }


        .rasa-nav-link:hover {
            background: #f3efe7;

            color: #315b72;
        }


        .rasa-nav-link-active {
            background: #e7f0f4;

            color: #315b72;

            font-weight: 600;
        }


        /* =========================
           USER AREA
        ========================= */

        .rasa-user-area {
            display: flex;

            align-items: center;

            gap: 12px;

            flex-shrink: 0;
        }


        .rasa-user-info {
            text-align: right;
        }


        .rasa-user-name {
            margin: 0;

            font-size: 13px;

            font-weight: 600;

            color: #37474f;
        }


        .rasa-user-role {
            margin-top: 2px;

            font-size: 11px;

            color: #8b8e8c;

            text-transform: capitalize;
        }


        .rasa-logout {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding: 9px 12px;

            border-radius: 9px;

            border: 1px solid transparent;

            background: transparent;

            color: #6f7473;

            font-size: 13px;

            cursor: pointer;

            transition: all 0.2s ease;
        }


        .rasa-logout:hover {
            background: #fdf0ef;

            color: #b34a43;

            border-color: #f3d8d5;
        }


        /* =========================
           MAIN
        ========================= */

        .rasa-main {
            max-width: 1280px;

            margin: 0 auto;

            padding: 32px 24px;
        }


        /* =========================
           PAGE HEADER
        ========================= */

        .rasa-page-header {
            margin-bottom: 25px;
        }


        .rasa-page-title {
            margin: 0;

            font-size: 24px;

            font-weight: 700;

            color: #24343d;

            line-height: 1.3;
        }


        .rasa-page-description {
            margin-top: 5px;

            font-size: 13px;

            color: #7a7d7c;

            line-height: 1.5;
        }


        /* =========================
           ALERT
        ========================= */

        .rasa-alert {
            margin-bottom: 20px;

            padding: 13px 16px;

            border-radius: 12px;

            font-size: 13px;

            line-height: 1.5;
        }


        .rasa-alert-success {
            background: #e7f0f4;

            border: 1px solid #c9dce5;

            color: #315b72;
        }


        .rasa-alert-error {
            background: #fdf0ef;

            border: 1px solid #f3d8d5;

            color: #b34a43;
        }


        .rasa-alert-title {
            margin-bottom: 4px;

            font-weight: 600;
        }


        /* =========================
           RESPONSIVE NAVBAR
        ========================= */

        @media (max-width: 1050px) {

            .rasa-navbar-inner {
                gap: 12px;
            }

            .rasa-nav-link {
                padding-left: 9px;
                padding-right: 9px;
            }

        }


        @media (max-width: 850px) {

            .rasa-navbar-inner {
                flex-wrap: wrap;

                padding-top: 14px;
                padding-bottom: 14px;
            }

            .rasa-navigation {
                order: 3;

                width: 100%;

                overflow-x: auto;

                padding-bottom: 2px;
            }

            .rasa-nav-link {
                white-space: nowrap;
            }

        }


        @media (max-width: 600px) {

            .rasa-main {
                padding: 24px 16px;
            }

            .rasa-page-title {
                font-size: 21px;
            }

            .rasa-user-info {
                display: none;
            }

            .rasa-logo-subtitle {
                display: none;
            }

        }

    </style>

</head>


<body class="min-h-screen bg-[#F7F3EA] text-[#24343D]">


    {{-- NAVBAR --}}

    <nav class="rasa-navbar">

        <div class="max-w-7xl mx-auto px-6">

            <div class="rasa-navbar-inner">


                {{-- LOGO --}}

                <a href="{{ auth()->check()
                    ? (auth()->user()->role === 'admin'
                        ? route('admin.dashboard')
                        : route('user.dashboard'))
                    : route('login') }}"
                    class="rasa-logo">

                    <div class="rasa-logo-icon">

                        <span class="rasa-logo-letter">
                            R
                        </span>

                    </div>


                    <div>

                        <h1 class="rasa-logo-name">
                            RASA
                        </h1>

                        <p class="rasa-logo-subtitle">
                            REMOTE ASSISTANCE & SAFETY
                        </p>

                    </div>

                </a>



                {{-- NAVIGATION --}}

                @auth

                    <div class="rasa-navigation">


                        @if(auth()->user()->role === 'admin')


                            {{-- DASHBOARD --}}

                            <a href="{{ route('admin.dashboard') }}"
                                class="rasa-nav-link
                                {{ request()->routeIs('admin.dashboard')
                                    ? 'rasa-nav-link-active'
                                    : '' }}">

                                Dashboard

                            </a>


                            {{-- DATA RUMAH --}}

                            <a href="{{ route('admin.houses.index') }}"
                                class="rasa-nav-link
                                {{ request()->routeIs('admin.houses.*')
                                    ? 'rasa-nav-link-active'
                                    : '' }}">

                                Data Rumah

                            </a>


                            {{-- LOG AKTIVITAS --}}

                            <a href="{{ route('admin.activity-logs.index') }}"
                                class="rasa-nav-link
                                {{ request()->routeIs('admin.activity-logs.*')
                                    ? 'rasa-nav-link-active'
                                    : '' }}">

                                Log Aktivitas

                            </a>


                            {{-- PENGATURAN --}}

                            <a href="{{ route('admin.settings.index') }}"
                                class="rasa-nav-link
                                {{ request()->routeIs('admin.settings.*')
                                    ? 'rasa-nav-link-active'
                                    : '' }}">

                                Pengaturan

                            </a>


                        @else


                            {{-- DASHBOARD USER --}}

                            <a href="{{ route('user.dashboard') }}"
                                class="rasa-nav-link
                                {{ request()->routeIs('user.dashboard')
                                    ? 'rasa-nav-link-active'
                                    : '' }}">

                                Dashboard

                            </a>


                            {{-- PERANGKAT --}}

                            <a href="{{ route('user.electronics.index') }}"
                                class="rasa-nav-link
                                {{ request()->routeIs('user.electronics.*')
                                    ? 'rasa-nav-link-active'
                                    : '' }}">

                                Perangkat

                            </a>


                            {{-- PERINGATAN --}}

                            <a href="{{ route('user.alerts.index') }}"
                                class="rasa-nav-link
                                {{ request()->routeIs('user.alerts.*')
                                    ? 'rasa-nav-link-active'
                                    : '' }}">

                                Peringatan

                            </a>


                            {{-- RUMAH --}}

                            <a href="{{ route('user.profile.index') }}"
                                class="rasa-nav-link
                                {{ request()->routeIs('user.profile.*')
                                    ? 'rasa-nav-link-active'
                                    : '' }}">

                                Rumah

                            </a>


                        @endif

                    </div>



                    {{-- USER --}}

                    <div class="rasa-user-area">


                        <div class="rasa-user-info">

                            <p class="rasa-user-name">
                                {{ auth()->user()->name }}
                            </p>

                            <p class="rasa-user-role">
                                {{ auth()->user()->role }}
                            </p>

                        </div>


                        <form method="POST"
                            action="{{ route('logout') }}">

                            @csrf

                            <button
                                type="submit"
                                class="rasa-logout">

                                Keluar

                            </button>

                        </form>

                    </div>


                @endauth

            </div>

        </div>

    </nav>



    {{-- MAIN --}}

    <main class="rasa-main">


        @hasSection('header')


            <div class="rasa-page-header">

                <h2 class="rasa-page-title">
                    @yield('header')
                </h2>


                @hasSection('description')

                    <p class="rasa-page-description">
                        @yield('description')
                    </p>

                @endif

            </div>


        @endif



        {{-- SUCCESS --}}

        @if(session('success'))

            <div class="rasa-alert rasa-alert-success">

                {{ session('success') }}

            </div>

        @endif



        {{-- ERROR --}}

        @if(session('error'))

            <div class="rasa-alert rasa-alert-error">

                {{ session('error') }}

            </div>

        @endif



        {{-- VALIDATION ERROR --}}

        @if($errors->any())

            <div class="rasa-alert rasa-alert-error">

                <p class="rasa-alert-title">
                    Terdapat kesalahan:
                </p>


                <ul class="list-disc ml-5">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif



        @yield('content')


    </main>



    @stack('scripts')


</body>

</html>