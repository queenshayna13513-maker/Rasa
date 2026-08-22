@extends('layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard')
@section('description', 'Pantau keamanan listrik rumah dari mana saja.')

@section('content')

<style>
    .rasa-card {
        background: #FFFDF8;
        border: 1px solid #EEE8DD;
        border-radius: 16px;
        box-shadow: 0 4px 14px rgba(49, 91, 114, 0.055);
    }

    .rasa-card:hover {
        box-shadow: 0 7px 20px rgba(49, 91, 114, 0.08);
    }

    .rasa-blue {
        color: #315B72;
    }

    .rasa-muted {
        color: #7D858A;
    }

    .rasa-icon {
        width: 38px;
        height: 38px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .rasa-chart-bar {
        background: #86A9BA;
        border-radius: 6px 6px 2px 2px;
        transition: all .2s ease;
    }

    .rasa-chart-bar:hover {
        background: #315B72;
        transform: translateY(-2px);
    }

    .rasa-emergency {
        border-radius: 14px;
        transition: all .2s ease;
    }

    .rasa-emergency:hover {
        transform: translateY(-1px);
        box-shadow: 0 7px 18px rgba(185, 55, 55, .18);
    }

    .rasa-action {
        border: 1px solid #DDD6CA;
        background: #FFFDF8;
        color: #315B72;
        border-radius: 10px;
        transition: all .2s ease;
    }

    .rasa-action:hover {
        background: #F3EFE7;
        border-color: #315B72;
    }
</style>


{{-- WELCOME --}}
<div class="mb-6">

    <p class="text-[13px] text-[#7D858A] mb-1">
        Dashboard monitoring
    </p>

    <div class="flex items-center justify-between gap-4">

        <div>
            <h2 class="text-xl font-semibold text-[#263F4D]">
                Selamat datang,
                <span class="text-[#315B72]">
                    {{ auth()->user()->name }}
                </span>
            </h2>

            <p class="text-sm text-[#7D858A] mt-1">
                Pantau kondisi listrik rumah dengan tenang.
            </p>
        </div>

        <div class="hidden sm:flex items-center gap-2
                    px-3 py-2 rounded-xl
                    bg-[#EAF2F5] text-[#315B72]">

            <span class="w-2 h-2 rounded-full bg-green-500"></span>

            <span class="text-xs font-medium">
                Sistem Aktif
            </span>

        </div>

    </div>

</div>


{{-- STATUS --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-5">


    {{-- DAYA --}}
    <div class="rasa-card p-4">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-xs font-medium rasa-muted">
                    Daya Saat Ini
                </p>

                <div class="flex items-baseline gap-2 mt-2">

                    <span class="text-[27px] leading-none
                                 font-bold rasa-blue">
                        780
                    </span>

                    <span class="text-xs rasa-muted">
                        Watt
                    </span>

                </div>
            </div>

            <div class="rasa-icon bg-[#E7F0F4]">

                <svg class="w-5 h-5 text-[#315B72]"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M13 2L4 14h7l-1 8 9-12h-7l1-8z"/>

                </svg>

            </div>

        </div>

        <div class="mt-3 pt-3 border-t border-[#EEE8DD]">

            <p class="text-[11px] text-[#92999D]">
                Penggunaan listrik saat ini
            </p>

        </div>

    </div>


    {{-- PERANGKAT --}}
    <div class="rasa-card p-4">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-xs font-medium rasa-muted">
                    Perangkat Terdaftar
                </p>

                <p class="text-[27px] leading-none
                          font-bold rasa-blue mt-2">
                    7
                </p>

            </div>

            <div class="rasa-icon bg-[#F3EFE7]">

                <svg class="w-5 h-5 text-[#315B72]"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <rect x="4" y="3"
                        width="16"
                        height="18"
                        rx="2"
                        stroke-width="1.8"/>

                    <path stroke-linecap="round"
                        stroke-width="1.8"
                        d="M8 7h8M8 11h8M9 16h6"/>

                </svg>

            </div>

        </div>

        <div class="mt-3 pt-3 border-t border-[#EEE8DD]">

            <p class="text-[11px] text-[#92999D]">
                Perangkat elektronik
            </p>

        </div>

    </div>


    {{-- KONDISI --}}
    <div class="rasa-card p-4 sm:col-span-2 lg:col-span-1">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-xs font-medium rasa-muted">
                    Kondisi Rumah
                </p>

                <div class="flex items-center gap-2 mt-2">

                    <span class="w-2.5 h-2.5 rounded-full
                                 bg-green-500
                                 shadow-[0_0_0_4px_#E7F4EA]">
                    </span>

                    <span class="text-[21px] leading-none
                                 font-bold text-green-700">
                        Aman
                    </span>

                </div>

            </div>

            <div class="rasa-icon bg-[#EAF4EC]">

                <svg class="w-5 h-5 text-green-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M5 12l4 4L19 6"/>

                </svg>

            </div>

        </div>

        <div class="mt-3 pt-3 border-t border-[#EEE8DD]">

            <p class="text-[11px] text-[#92999D]">
                Tidak ada kondisi abnormal
            </p>

        </div>

    </div>

</div>


{{-- GRAPH --}}
<div class="rasa-card overflow-hidden mb-5">
    

    <div class="px-5 py-4
                border-b border-[#EEE8DD]
                flex items-center justify-between">

        <div>

            <h3 class="text-sm font-semibold text-[#263F4D]">
                Penggunaan Listrik
            </h3>

            <p class="text-[11px] text-[#8B9296] mt-1">
                Historis penggunaan daya hari ini.
            </p>

        </div>

        <div class="px-2.5 py-1.5
                    rounded-lg bg-[#F3EFE7]
                    text-[11px] text-[#6F777B]">

            Hari ini

        </div>

    </div>


    <div class="px-5 pt-5 pb-4">

        <div class="h-[210px] flex items-end gap-2 sm:gap-3
                    border-b border-l border-[#DDD6CA]
                    px-3 sm:px-5">

            @foreach([30,45,38,60,52,70,55,85,65,50,72,48] as $height)

                <div class="flex-1 flex items-end h-full">

                    <div
                        class="rasa-chart-bar w-full"
                        style="height: {{ $height }}%;">
                    </div>

                </div>

            @endforeach

        </div>


        <div class="flex justify-between
                    text-[10px] text-[#9AA0A4]
                    mt-2 px-2">

            <span>00.00</span>
            <span>06.00</span>
            <span>12.00</span>
            <span>18.00</span>
            <span>24.00</span>

        </div>

    </div>

</div>


{{-- BOTTOM --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">


    {{-- AKTIVITAS --}}
    <div class="lg:col-span-2 rasa-card overflow-hidden">

        <div class="px-5 py-4
                    border-b border-[#EEE8DD]
                    flex items-center justify-between">

            <div>

                <h3 class="text-sm font-semibold text-[#263F4D]">
                    Aktivitas Terbaru
                </h3>

                <p class="text-[11px] text-[#8B9296] mt-1">
                    Aktivitas terakhir sistem RASA.
                </p>

            </div>

            <span class="text-[11px] text-[#315B72]
                         bg-[#E7F0F4]
                         px-2.5 py-1 rounded-lg">
                Live
            </span>

        </div>


        <div class="px-5">

            <div class="flex items-center justify-between
                        gap-4 py-4
                        border-b border-[#EEE8DD]">

                <div class="flex items-center gap-3">

                    <div class="w-8 h-8 rounded-lg
                                bg-[#EAF4EC]
                                flex items-center justify-center">

                        <svg class="w-4 h-4 text-green-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 12l4 4L19 6"/>

                        </svg>

                    </div>

                    <div>

                        <p class="text-xs font-medium text-[#34444D]">
                            Penggunaan listrik normal
                        </p>

                        <p class="text-[10px] text-[#9AA0A4] mt-1">
                            10 menit yang lalu
                        </p>

                    </div>

                </div>

                <span class="text-[10px] px-2.5 py-1
                             rounded-lg
                             bg-[#EAF4EC]
                             text-green-700">
                    Aman
                </span>

            </div>


            <div class="flex items-center justify-between
                        gap-4 py-4">

                <div class="flex items-center gap-3">

                    <div class="w-8 h-8 rounded-lg
                                bg-[#E7F0F4]
                                flex items-center justify-center">

                        <svg class="w-4 h-4 text-[#315B72]"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M12 6v6l4 2"/>

                            <circle cx="12"
                                cy="12"
                                r="9"
                                stroke-width="1.8"/>

                        </svg>

                    </div>

                    <div>

                        <p class="text-xs font-medium text-[#34444D]">
                            Sistem monitoring aktif
                        </p>

                        <p class="text-[10px] text-[#9AA0A4] mt-1">
                            30 menit yang lalu
                        </p>

                    </div>

                </div>

                <span class="text-[10px] px-2.5 py-1
                             rounded-lg
                             bg-[#E7F0F4]
                             text-[#315B72]">
                    Sistem
                </span>

            </div>

        </div>

    </div>


    {{-- DARURAT --}}
    <div class="rasa-card p-5">

        <div class="flex items-start gap-3">

            <div class="rasa-icon bg-[#FBECEC]">

                <svg class="w-5 h-5 text-red-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M12 9v4m0 4h.01M10.3 4.6L2.7 18a2 2 0 001.7 3h15.2a2 2 0 001.7-3L13.7 4.6a2 2 0 00-3.4 0z"/>

                </svg>

            </div>

            <div>

                <p class="text-sm font-semibold text-[#263F4D]">
                    Tombol Darurat
                </p>

                <p class="text-[11px] text-[#8B9296] mt-1 leading-relaxed">
                    Gunakan hanya ketika terjadi kondisi
                    listrik yang membahayakan.
                </p>

            </div>

        </div>


        <button
            type="button"
            onclick="alert('Simulasi: aliran listrik akan diputus.')"
            class="rasa-emergency w-full mt-5
                   py-3.5 px-4
                   bg-[#B83F45]
                   text-white
                   text-xs font-semibold
                   tracking-wide
                   flex items-center justify-center gap-2">

            <svg class="w-4 h-4"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 3v18M5 8l7-5 7 5M5 16l7 5 7-5"/>

            </svg>

            MATIKAN LISTRIK

        </button>


        <p class="text-[10px] text-[#9AA0A4]
                  text-center leading-relaxed mt-3">

            Fitur pemutusan akan terhubung dengan
            hardware pada tahap berikutnya.

        </p>

    </div>
    

</div>

@endsection