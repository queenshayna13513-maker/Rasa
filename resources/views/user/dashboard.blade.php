@extends('layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard')
@section('description', 'Pantau keamanan listrik rumah dari mana saja.')

@section('content')

<div class="mb-5">

    <p class="text-sm">
        Selamat datang,
        <span class="font-semibold">
            {{ $user->name }}
        </span>.
    </p>

</div>


{{-- STATUS --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">

    <div class="bg-[#FFFDF8] rounded-xl shadow-sm p-5">

        <p class="text-sm text-gray-500">
            Daya Saat Ini
        </p>

        <div class="flex items-end gap-2 mt-2">

            <span class="text-3xl font-bold text-[#315B72]">
                780
            </span>

            <span class="text-sm text-gray-500 mb-1">
                Watt
            </span>

        </div>

        <p class="text-xs text-gray-400 mt-2">
            Penggunaan listrik saat ini
        </p>

    </div>


    <div class="bg-[#FFFDF8] rounded-xl shadow-sm p-5">

        <p class="text-sm text-gray-500">
            Perangkat Terdaftar
        </p>

        <p class="text-3xl font-bold text-[#315B72] mt-2">
            7
        </p>

        <p class="text-xs text-gray-400 mt-2">
            Perangkat elektronik
        </p>

    </div>


    <div class="bg-[#FFFDF8] rounded-xl shadow-sm p-5">

        <p class="text-sm text-gray-500">
            Kondisi Rumah
        </p>

        <div class="flex items-center gap-2 mt-3">

            <span class="w-3 h-3 rounded-full bg-green-500"></span>

            <span class="text-xl font-semibold text-green-700">
                Aman
            </span>

        </div>

        <p class="text-xs text-gray-400 mt-2">
            Tidak ada kondisi abnormal
        </p>

    </div>

</div>


{{-- GRAPH --}}
<div class="bg-[#FFFDF8] rounded-xl shadow-sm overflow-hidden mb-6">

    <div class="px-5 py-4 border-b border-[#EEE8DD]">

        <h3 class="font-semibold">
            Penggunaan Listrik
        </h3>

        <p class="text-xs text-gray-500 mt-1">
            Historis penggunaan daya hari ini.
        </p>

    </div>


    <div class="p-5">

        <div class="h-64 flex items-end gap-3
                    border-b border-l border-[#DDD6CA]
                    px-5 pb-0">

            @foreach([30,45,38,60,52,70,55,85,65,50,72,48] as $height)

                <div class="flex-1 flex items-end h-full">

                    <div class="w-full bg-[#7FA5B8] rounded-t
                                hover:bg-[#315B72] transition"
                        style="height: {{ $height }}%;">
                    </div>

                </div>

            @endforeach

        </div>

        <div class="flex justify-between text-xs
                    text-gray-400 mt-2 px-4">

            <span>00.00</span>
            <span>06.00</span>
            <span>12.00</span>
            <span>18.00</span>
            <span>24.00</span>

        </div>

    </div>

</div>


{{-- ALERT + EMERGENCY --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <div class="lg:col-span-2 bg-[#FFFDF8]
                rounded-xl shadow-sm overflow-hidden">

        <div class="px-5 py-4 border-b border-[#EEE8DD]">

            <h3 class="font-semibold">
                Aktivitas Terbaru
            </h3>

        </div>

        <div class="p-5">

            <div class="flex justify-between py-3
                        border-b border-[#EEE8DD]">

                <div>
                    <p class="text-sm font-medium">
                        Penggunaan listrik normal
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        10 menit yang lalu
                    </p>
                </div>

                <span class="text-xs px-2 py-1 h-fit
                             rounded bg-green-100 text-green-700">

                    Aman

                </span>

            </div>


            <div class="flex justify-between py-3">

                <div>
                    <p class="text-sm font-medium">
                        Sistem monitoring aktif
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        30 menit yang lalu
                    </p>
                </div>

                <span class="text-xs px-2 py-1 h-fit
                             rounded bg-[#E7F0F4] text-[#315B72]">

                    Sistem

                </span>

            </div>

        </div>

    </div>


    {{-- DARURAT --}}
    <div class="bg-[#FFFDF8] rounded-xl shadow-sm p-5">

        <p class="text-sm font-semibold">
            Tombol Darurat
        </p>

        <p class="text-xs text-gray-500 mt-1">
            Gunakan hanya ketika terjadi kondisi
            listrik yang membahayakan.
        </p>

        <button type="button"
            onclick="alert('Simulasi: aliran listrik akan diputus.')"
            class="w-full mt-5 py-3 rounded-xl
                   bg-red-600 text-white font-semibold
                   hover:bg-red-700 transition">

            MATIKAN LISTRIK

        </button>

        <p class="text-[11px] text-gray-400 text-center mt-3">
            Fitur pemutusan akan terhubung dengan hardware
            pada tahap berikutnya.
        </p>

    </div>

</div>

@endsection