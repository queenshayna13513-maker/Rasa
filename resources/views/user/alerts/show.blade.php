@extends('layouts.app')

@section('title', 'Detail Peringatan')
@section('header', 'Detail Peringatan')
@section('description', 'Informasi lengkap mengenai peringatan listrik.')

@section('content')

<div class="max-w-2xl">

<div class="bg-[#FFFDF8] rounded-xl shadow-sm p-6">

    <div class="flex items-start gap-4">

        <div class="w-11 h-11 rounded-xl
                    bg-orange-100
                    flex items-center justify-center
                    text-orange-600">

            !

        </div>


        <div>

            <h3 class="font-semibold text-lg">
                {{ $alert->title ?? 'Peringatan Sistem' }}
            </h3>

            <p class="text-xs text-gray-400 mt-1">
                {{ $alert->created_at }}
            </p>

        </div>

    </div>


    <div class="mt-6 p-4 rounded-xl bg-[#F3EFE7]">

        <p class="text-sm leading-6">
            {{ $alert->message ?? 'Tidak ada detail peringatan.' }}
        </p>

    </div>


    <div class="mt-5 grid grid-cols-2 gap-4">

        <div>

            <p class="text-xs text-gray-500">
                Tingkat
            </p>

            <p class="text-sm font-semibold mt-1 capitalize">
                {{ $alert->severity ?? 'Informasi' }}
            </p>

        </div>


        <div>

            <p class="text-xs text-gray-500">
                Status
            </p>

            <p class="text-sm font-semibold mt-1">
                {{ !empty($alert->is_read) ? 'Sudah dibaca' : 'Belum dibaca' }}
            </p>

        </div>

    </div>


    <div class="flex justify-end gap-3 mt-6">

        @if(empty($alert->is_read))

            <form method="POST"
                action="{{ route('user.alerts.read', $alert) }}">

                @csrf

                <button
                    class="px-4 py-2 rounded-lg
                           bg-[#315B72] text-white text-sm">

                    Tandai Dibaca

                </button>

            </form>

        @endif


        <a href="{{ route('user.alerts.index') }}"
            class="px-4 py-2 rounded-lg
                   bg-[#F3EFE7] text-sm">

            Kembali

        </a>

    </div>

</div>

</div>

@endsection