@extends('layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard')
@section('description', 'Jaga yang tersayang dari mana saja.')

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

    /* =====================================================
       RASA DASHBOARD
    ===================================================== */

    .rasa-dashboard {
        width: 100%;
    }


    /* =====================================================
       WELCOME CARD
    ===================================================== */

    .rasa-welcome {
        position: relative;
        overflow: hidden;

        background: #0cc0df;
        border: 1px solid #0cc0df;

        border-radius: 18px;

        padding: 30px;

        margin-bottom: 28px;

        color: white;

        box-shadow:
            0 4px 15px rgba(49, 91, 114, 0.08);
    }


    .rasa-welcome-content {
        position: relative;
        z-index: 3;

        max-width: 650px;
    }


    .rasa-welcome-label {
        margin: 0 0 7px;

        font-size: 13px;

        color: #dce9ef;
    }


    .rasa-welcome-title {
        margin: 0 0 10px;

        font-size: 27px;

        line-height: 1.3;

        font-weight: 700;

        color: #ffffff;
    }


    .rasa-welcome-description {
        margin: 0;

        font-size: 13px;

        line-height: 1.7;

        color: #dce9ef;
    }


    /* =====================================================
       WELCOME DECORATION
    ===================================================== */

    .rasa-welcome-circle-one {
        position: absolute;

        right: -45px;
        bottom: -75px;

        width: 260px;
        height: 260px;

        border-radius: 50%;

        background: rgba(255, 255, 255, 0.08);
    }


    .rasa-welcome-circle-two {
        position: absolute;

        right: 90px;
        top: -85px;

        width: 160px;
        height: 160px;

        border-radius: 50%;

        background: rgba(255, 255, 255, 0.05);
    }


    .rasa-welcome-icon {
        position: absolute;

        right: 40px;
        top: 50%;

        transform: translateY(-50%);

        width: 100px;
        height: 100px;

        opacity: 0.10;

        z-index: 2;
    }


    /* =====================================================
       GENERAL CARD
    ===================================================== */

    .rasa-card {

        background: #FFFDF8;

        border: 1px solid #EEE8DD;

        border-radius: 16px;

        box-shadow:
            0 4px 14px rgba(49, 91, 114, 0.055);

        transition: all .2s ease;
    }


    .rasa-card:hover {

        box-shadow:
            0 7px 20px rgba(49, 91, 114, 0.08);

    }


    .rasa-blue {
        color: #0cc0df;
    }


    .rasa-muted {
        color: #7D858A;
    }


    /* =====================================================
       ICON
    ===================================================== */

    .rasa-icon {

        width: 38px;
        height: 38px;

        border-radius: 11px;

        display: flex;

        align-items: center;

        justify-content: center;

        flex-shrink: 0;
    }


    /* =====================================================
       CHART
    ===================================================== */

    .rasa-chart-bar {

        background: #86A9BA;

        border-radius:
            6px 6px 2px 2px;

        transition: all .2s ease;
    }


    .rasa-chart-bar:hover {

        background: #0cc0df;

        transform:
            translateY(-2px);
    }


    /* =====================================================
       EMERGENCY
    ===================================================== */

    .rasa-emergency {

        border-radius: 14px;

        transition: all .2s ease;
    }


    .rasa-emergency:hover {

        transform:
            translateY(-1px);

        box-shadow:
            0 7px 18px rgba(185, 55, 55, .18);
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 700px) {

        .rasa-welcome {

            padding: 22px;

        }


        .rasa-welcome-title {

            font-size: 23px;

        }


        .rasa-welcome-icon,
        .rasa-welcome-circle-two {

            display: none;

        }

    }

</style>


<div class="rasa-dashboard">


    {{-- =====================================================
        WELCOME
    ===================================================== --}}

    <div class="rasa-welcome">

        <div class="rasa-welcome-content">

            <p class="rasa-welcome-label">
                Selamat datang kembali 👋
            </p>


            <h2 class="rasa-welcome-title">

                {{ auth()->user()->name }}

            </h2>


            <p class="rasa-welcome-description">

                Jaga orang tersayang di rumah dengan tenang
                dan tetap terhubung dengan keamanan rumah
                dari mana saja.

            </p>

        </div>


        {{-- DECORATION --}}

        <div class="rasa-welcome-circle-one"></div>

        <div class="rasa-welcome-circle-two"></div>


        {{-- SHIELD ICON --}}

        <svg
            class="rasa-welcome-icon"
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


    {{-- =====================================================
        STATUS
    ===================================================== --}}

    <div
        class="grid grid-cols-1
               sm:grid-cols-2
               lg:grid-cols-3
               gap-5
               mb-7"
    >


        {{-- DAYA --}}

        <div class="rasa-card p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs font-medium rasa-muted">
                        Daya Saat Ini
                    </p>


                    <div
                        class="flex items-baseline
                               gap-2 mt-2"
                    >

                        <span
                            class="text-[27px]
                                   leading-none
                                   font-bold rasa-blue"
                        >
                            780
                        </span>

                        <span class="text-xs rasa-muted">
                            Watt
                        </span>

                    </div>

                </div>


                <div class="rasa-icon bg-[#E7F0F4]">

                    <svg
                        class="w-5 h-5 text-[#0cc0df]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M13 2L4 14h7l-1 8 9-12h-7l1-8z"
                        />

                    </svg>

                </div>

            </div>


            <div
                class="mt-4 pt-3
                       border-t border-[#EEE8DD]"
            >

                <p class="text-[11px] text-[#92999D]">
                    Penggunaan listrik saat ini
                </p>

            </div>

        </div>


        {{-- PERANGKAT --}}

        <div class="rasa-card p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs font-medium rasa-muted">
                        Perangkat Terdaftar
                    </p>


                    <p
                        class="text-[27px]
                               leading-none
                               font-bold
                               rasa-blue
                               mt-2"
                    >
                        7
                    </p>

                </div>


                <div class="rasa-icon bg-[#F3EFE7]">

                    <svg
                        class="w-5 h-5 text-[#0cc0df]"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <rect
                            x="4"
                            y="3"
                            width="16"
                            height="18"
                            rx="2"
                            stroke-width="1.8"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-width="1.8"
                            d="M8 7h8M8 11h8M9 16h6"
                        />

                    </svg>

                </div>

            </div>


            <div
                class="mt-4 pt-3
                       border-t border-[#EEE8DD]"
            >

                <p class="text-[11px] text-[#92999D]">
                    Perangkat elektronik
                </p>

            </div>

        </div>


        {{-- KONDISI --}}

        <div
            class="rasa-card p-5
                   sm:col-span-2
                   lg:col-span-1"
        >

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs font-medium rasa-muted">
                        Kondisi Rumah
                    </p>


                    <div
                        class="flex items-center
                               gap-2 mt-2"
                    >

                        <span
                            class="w-2.5 h-2.5
                                   rounded-full
                                   bg-green-500
                                   shadow-[0_0_0_4px_#E7F4EA]"
                        ></span>


                        <span
                            class="text-[21px]
                                   leading-none
                                   font-bold
                                   text-green-700"
                        >
                            Aman
                        </span>

                    </div>

                </div>


                <div class="rasa-icon bg-[#EAF4EC]">

                    <svg
                        class="w-5 h-5 text-green-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M5 12l4 4L19 6"
                        />

                    </svg>

                </div>

            </div>


            <div
                class="mt-4 pt-3
                       border-t border-[#EEE8DD]"
            >

                <p class="text-[11px] text-[#92999D]">
                    Tidak ada kondisi abnormal
                </p>

            </div>

        </div>

    </div>


    {{-- =====================================================
        GRAPH
    ===================================================== --}}

    <div
        class="rasa-card
               overflow-hidden
               mb-7"
    >

        <div
            class="px-5 py-4
                   border-b border-[#EEE8DD]
                   flex items-center
                   justify-between"
        >

            <div>

                <h3
                    class="text-sm
                           font-semibold
                           text-[#263F4D]"
                >
                    Penggunaan Listrik
                </h3>


                <p
                    class="text-[11px]
                           text-[#8B9296]
                           mt-1"
                >
                    Historis penggunaan daya hari ini.
                </p>

            </div>


            <div
                class="px-2.5 py-1.5
                       rounded-lg
                       bg-[#F3EFE7]
                       text-[11px]
                       text-[#6F777B]"
            >

                Hari ini

            </div>

        </div>


        <div class="px-5 pt-5 pb-5">

            <div
                class="h-[210px]
                       flex items-end
                       gap-2 sm:gap-3
                       border-b
                       border-l
                       border-[#DDD6CA]
                       px-3 sm:px-5"
            >

                @foreach([30,45,38,60,52,70,55,85,65,50,72,48] as $height)

                    <div
                        class="flex-1
                               flex items-end
                               h-full"
                    >

                        <div
                            class="rasa-chart-bar
                                   w-full"
                            style="height: {{ $height }}%;"
                        ></div>

                    </div>

                @endforeach

            </div>


            <div
                class="flex justify-between
                       text-[10px]
                       text-[#9AA0A4]
                       mt-2 px-2"
            >

                <span>00.00</span>
                <span>06.00</span>
                <span>12.00</span>
                <span>18.00</span>
                <span>24.00</span>

            </div>

        </div>

    </div>


    {{-- =====================================================
        BOTTOM
    ===================================================== --}}

    <div
        class="grid grid-cols-1
               lg:grid-cols-3
               gap-7"
    >


        {{-- =================================================
            AKTIVITAS
        ================================================= --}}

        <div
            class="lg:col-span-2
                   rasa-card
                   overflow-hidden"
        >

            <div
                class="px-5 py-4
                       border-b border-[#EEE8DD]
                       flex items-center
                       justify-between"
            >

                <div>

                    <h3
                        class="text-sm
                               font-semibold
                               text-[#263F4D]"
                    >
                        Aktivitas Terbaru
                    </h3>


                    <p
                        class="text-[11px]
                               text-[#8B9296]
                               mt-1"
                    >
                        Aktivitas terakhir sistem RASA.
                    </p>

                </div>


                <span
                    class="text-[11px]
                           text-[#0cc0df]
                           bg-[#E7F0F4]
                           px-2.5 py-1
                           rounded-lg"
                >
                    Live
                </span>

            </div>


            <div class="px-5">

                {{-- ACTIVITY 1 --}}

                <div
                    class="flex items-center
                           justify-between
                           gap-4
                           py-5
                           border-b
                           border-[#EEE8DD]"
                >

                    <div
                        class="flex items-center
                               gap-3"
                    >

                        <div
                            class="w-8 h-8
                                   rounded-lg
                                   bg-[#EAF4EC]
                                   flex items-center
                                   justify-center"
                        >

                            <svg
                                class="w-4 h-4
                                       text-green-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 12l4 4L19 6"
                                />

                            </svg>

                        </div>


                        <div>

                            <p
                                class="text-xs
                                       font-medium
                                       text-[#34444D]"
                            >
                                Penggunaan listrik normal
                            </p>


                            <p
                                class="text-[10px]
                                       text-[#9AA0A4]
                                       mt-1"
                            >
                                10 menit yang lalu
                            </p>

                        </div>

                    </div>


                    <span
                        class="text-[10px]
                               px-2.5 py-1
                               rounded-lg
                               bg-[#EAF4EC]
                               text-green-700"
                    >
                        Aman
                    </span>

                </div>


                {{-- ACTIVITY 2 --}}

                <div
                    class="flex items-center
                           justify-between
                           gap-4
                           py-5"
                >

                    <div
                        class="flex items-center
                               gap-3"
                    >

                        <div
                            class="w-8 h-8
                                   rounded-lg
                                   bg-[#E7F0F4]
                                   flex items-center
                                   justify-center"
                        >

                            <svg
                                class="w-4 h-4
                                       text-[#0cc0df]"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M12 6v6l4 2"
                                />

                                <circle
                                    cx="12"
                                    cy="12"
                                    r="9"
                                    stroke-width="1.8"
                                />

                            </svg>

                        </div>


                        <div>

                            <p
                                class="text-xs
                                       font-medium
                                       text-[#34444D]"
                            >
                                Sistem monitoring aktif
                            </p>


                            <p
                                class="text-[10px]
                                       text-[#9AA0A4]
                                       mt-1"
                            >
                                30 menit yang lalu
                            </p>

                        </div>

                    </div>


                    <span
                        class="text-[10px]
                               px-2.5 py-1
                               rounded-lg
                               bg-[#E7F0F4]
                               text-[#0cc0df]"
                    >
                        Sistem
                    </span>

                </div>

            </div>

        </div>


        {{-- =================================================
            DARURAT
        ================================================= --}}

        <div
            class="rasa-card
                   p-5"
        >

            <div
                class="flex items-start
                       gap-3"
            >

                <div
                    class="rasa-icon
                           bg-[#FBECEC]"
                >

                    <svg
                        class="w-5 h-5
                               text-red-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M12 9v4m0 4h.01M10.3 4.6L2.7 18a2 2 0 001.7 3h15.2a2 2 0 001.7-3L13.7 4.6a2 2 0 00-3.4 0z"
                        />

                    </svg>

                </div>


                <div>

                    <p
                        class="text-sm
                               font-semibold
                               text-[#263F4D]"
                    >
                        Tombol Darurat
                    </p>


                    <p
                        class="text-[11px]
                               text-[#8B9296]
                               mt-1
                               leading-relaxed"
                    >
                        Gunakan hanya ketika terjadi kondisi
                        listrik yang membahayakan.
                    </p>

                </div>

            </div>


            {{-- EMERGENCY BUTTON --}}

            <button
                type="button"
                onclick="alert('Simulasi: aliran listrik akan diputus.')"
                class="rasa-emergency
                       w-full
                       mt-6
                       py-3.5
                       px-4
                       bg-[#B83F45]
                       text-white
                       text-xs
                       font-semibold
                       tracking-wide
                       flex items-center
                       justify-center
                       gap-2
                       cursor-pointer"
            >

                <svg
                    class="w-4 h-4"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 3v18M5 8l7-5 7 5M5 16l7 5 7-5"
                    />

                </svg>


                MATIKAN LISTRIK

            </button>


            <p
                class="text-[10px]
                       text-[#9AA0A4]
                       text-center
                       leading-relaxed
                       mt-3"
            >

                Fitur pemutusan akan terhubung dengan
                hardware pada tahap berikutnya.

            </p>

        </div>

    </div>

</div>

@endsection