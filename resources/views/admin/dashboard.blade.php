@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('header', 'Dashboard Admin')

@section('description')
    Pantau aktivitas dan kelola sistem RASA dari satu tempat.
@endsection

@section('header-action')

    <div class="flex items-center gap-2">

        <span
            class="inline-flex items-center gap-2
                   px-3 py-2 rounded-full
                   bg-green-50 text-green-700
                   border border-green-100
                   text-xs font-semibold"
        >
            <span class="w-2 h-2 rounded-full bg-green-500"></span>
            Sistem Aktif
        </span>

    </div>

@endsection


@section('content')

<style>

    /* =========================
       DASHBOARD ADMIN
    ========================= */

    .admin-dashboard {
        width: 100%;
    }


    /* =========================
       WELCOME CARD
    ========================= */

    .admin-welcome {
        position: relative;
        overflow: hidden;

        background: #0cc0df;
        border: 1px solid #0cc0df;

        border-radius: 18px;

        padding: 30px;

        margin-bottom: 25px;

        color: #ffffff;

        box-shadow:
            0 4px 15px rgba(49, 91, 114, 0.08);

        transition: all 0.25s ease;
    }

    .admin-welcome:hover {
        transform: translateY(-1px);

        box-shadow:
            0 8px 22px rgba(49, 91, 114, 0.12);
    }


    .admin-welcome-content {
        position: relative;
        z-index: 2;

        max-width: 650px;
    }


    .admin-welcome-label {
        margin: 0 0 7px;

        font-size: 13px;

        color: #dce9ef;
    }


    .admin-welcome-title {
        margin: 0 0 10px;

        font-size: 27px;
        line-height: 1.3;

        font-weight: 700;

        color: #ffffff;
    }


    .admin-welcome-description {
        margin: 0;

        font-size: 13px;
        line-height: 1.7;

        color: #dce9ef;
    }


    /* =========================
       WELCOME DECORATION
    ========================= */

    .admin-welcome-circle-one {
        position: absolute;

        right: -45px;
        bottom: -75px;

        width: 260px;
        height: 260px;

        border-radius: 50%;

        background:
            rgba(255, 255, 255, 0.08);

        animation:
            adminFloat 7s ease-in-out infinite;
    }


    .admin-welcome-circle-two {
        position: absolute;

        right: 90px;
        top: -85px;

        width: 160px;
        height: 160px;

        border-radius: 50%;

        background:
            rgba(255, 255, 255, 0.05);

        animation:
            adminFloatReverse 9s ease-in-out infinite;
    }


    .admin-welcome-icon {
        position: absolute;

        right: 40px;
        top: 50%;

        transform: translateY(-50%);

        width: 100px;
        height: 100px;

        opacity: 0.10;

        animation:
            adminPulse 4s ease-in-out infinite;
    }


    /* =========================
       STATISTICS
    ========================= */

    .admin-stat-grid {

        display: grid;

        /*
         * 3 CARD SEJAJAR
         */
        grid-template-columns:
            repeat(3, minmax(0, 1fr));

        gap: 18px;

        margin-bottom: 25px;
    }


    .admin-stat-card {

        position: relative;

        background: #fffdf8;

        border: 1px solid #e5ded2;

        border-radius: 18px;

        padding: 20px;

        box-shadow:
            0 4px 15px rgba(49, 91, 114, 0.06);

        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease;
    }


    .admin-stat-card:hover {

        box-shadow:
            0 9px 24px rgba(49, 91, 114, 0.10);

        transform:
            translateY(-3px);
    }


    .admin-stat-content {

        display: flex;

        align-items: flex-start;

        justify-content: space-between;

        gap: 15px;
    }


    .admin-stat-label {

        margin: 0;

        font-size: 13px;

        color: #7a7d7c;
    }


    .admin-stat-value {

        margin-top: 8px;

        font-size: 30px;

        line-height: 1;

        font-weight: 700;

        color: #0cc0df;
    }


    .admin-stat-description {

        margin-top: 9px;

        font-size: 11px;

        color: #9a9c9b;
    }


    /* =========================
       STAT ICON
    ========================= */

    .admin-stat-icon {

        width: 44px;
        height: 44px;

        flex-shrink: 0;

        border-radius: 12px;

        background: #e7f0f4;

        display: flex;

        align-items: center;

        justify-content: center;
    }


    .admin-stat-icon svg {

        width: 20px;
        height: 20px;

        color: #0cc0df;
    }


    /* =========================
       ACTIVE HOUSE
    ========================= */

    .admin-stat-card.active-house
    .admin-stat-icon {

        background: #edf7f0;
    }


    .admin-stat-card.active-house
    .admin-stat-icon svg {

        color: #397052;
    }


    .admin-stat-card.active-house
    .admin-stat-value {

        color: #397052;
    }


    /* =========================
       BLOCKED HOUSE
    ========================= */

    .admin-stat-card.blocked-house
    .admin-stat-icon {

        background: #fdf0ef;
    }


    .admin-stat-card.blocked-house
    .admin-stat-icon svg {

        color: #b34a43;
    }


    .admin-stat-card.blocked-house
    .admin-stat-value {

        color: #b34a43;
    }


    /* =========================
       ANIMATION
    ========================= */

    @keyframes adminFloat {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-12px);
        }
    }


    @keyframes adminFloatReverse {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(10px);
        }
    }


    @keyframes adminPulse {

        0%,
        100% {
            opacity: 0.08;
        }

        50% {
            opacity: 0.15;
        }
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 1100px) {

        .admin-stat-grid {

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 14px;
        }

    }


    @media (max-width: 800px) {

        .admin-stat-grid {

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 14px;
        }

    }


    @media (max-width: 700px) {

        .admin-welcome {

            padding: 22px;
        }


        .admin-welcome-title {

            font-size: 23px;
        }


        .admin-welcome-icon,
        .admin-welcome-circle-two {

            display: none;
        }


        .admin-stat-grid {

            grid-template-columns: 1fr;

            gap: 14px;
        }


        .admin-stat-card {

            padding: 18px;
        }

    }

</style>


<div class="admin-dashboard">


    {{-- =========================
        WELCOME CARD
    ========================= --}}

    <div class="admin-welcome">

        <div class="admin-welcome-content">

            <p class="admin-welcome-label">
                Selamat datang kembali 👋
            </p>


            <h2 class="admin-welcome-title">

                {{ auth()->user()->name }}

            </h2>


            <p class="admin-welcome-description">

                Kelola jadwal, pengguna, dan aktivitas sistem
                RASA dengan mudah melalui dashboard administrator.

            </p>

        </div>


        {{-- =========================
            DEKORASI
        ========================= --}}

        <div class="admin-welcome-circle-one"></div>

        <div class="admin-welcome-circle-two"></div>


        <svg
            class="admin-welcome-icon"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.4"
        >

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 3l7 3v5c0 4.5-3 7.8-7 10-4-2.2-7-5.5-7-10V6l7-3z"
            />

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M9 12l2 2 4-4"
            />

        </svg>

    </div>



    {{-- =========================
        STATISTICS
    ========================= --}}

    <div class="admin-stat-grid">


        {{-- =========================
            TOTAL PENGGUNA
        ========================= --}}

        <div class="admin-stat-card">

            <div class="admin-stat-content">

                <div>

                    <p class="admin-stat-label">
                        Total Pengguna
                    </p>


                    <h3 class="admin-stat-value">

                        {{ $totalUsers ?? 0 }}

                    </h3>


                    <p class="admin-stat-description">
                        Pengguna terdaftar
                    </p>

                </div>


                <div class="admin-stat-icon">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"
                        />

                        <circle
                            cx="9"
                            cy="7"
                            r="4"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M22 21v-2a4 4 0 00-3-3.87"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16 3.13a4 4 0 010 7.75"
                        />

                    </svg>

                </div>

            </div>

        </div>



        {{-- =========================
            RUMAH AKTIF
        ========================= --}}

        <div class="admin-stat-card active-house">

            <div class="admin-stat-content">

                <div>

                    <p class="admin-stat-label">
                        Rumah Aktif
                    </p>


                    <h3 class="admin-stat-value">

                        {{ $activeHouses ?? 0 }}

                    </h3>


                    <p class="admin-stat-description">
                        Rumah yang aktif dipantau
                    </p>

                </div>


                <div class="admin-stat-icon">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 10.5L12 3l9 7.5"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 9.5V21h14V9.5"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 21v-6h6v6"
                        />

                    </svg>

                </div>

            </div>

        </div>



        {{-- =========================
            RUMAH DIBLOKIR
        ========================= --}}

        <div class="admin-stat-card blocked-house">

            <div class="admin-stat-content">

                <div>

                    <p class="admin-stat-label">
                        Rumah Diblokir
                    </p>


                    <h3 class="admin-stat-value">

                        {{ $blockedHouses ?? 0 }}

                    </h3>


                    <p class="admin-stat-description">
                        Rumah yang tidak aktif
                    </p>

                </div>


                <div class="admin-stat-icon">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 3l8 4v5c0 4.5-3 7.8-8 10-5-2.2-8-5.5-8-10V7l8-4z"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 9l6 6"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 9l-6 6"
                        />

                    </svg>

                </div>

            </div>

        </div>


    </div>


</div>

@endsection