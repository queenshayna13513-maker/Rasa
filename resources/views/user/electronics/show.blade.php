@extends('layouts.app')

@section('title', 'Detail Perangkat')
@section('header', 'Detail Perangkat')
@section('description', 'Informasi perangkat elektronik.')

@section('content')

<div class="max-w-2xl">

<div class="bg-[#FFFDF8] rounded-xl shadow-sm p-6">

    <div class="flex items-center justify-between mb-6">

        <div>

            <h3 class="text-xl font-semibold">
                {{ $electronic->name }}
            </h3>

            <p class="text-sm text-gray-500 mt-1">
                {{ $electronic->category }}
            </p>

        </div>

        <span class="px-3 py-1 rounded-lg
                     bg-green-100 text-green-700 text-xs">

            Terdaftar

        </span>

    </div>


    <div class="grid grid-cols-2 gap-4">

        <div class="bg-[#F3EFE7] rounded-xl p-4">

            <p class="text-xs text-gray-500">
                Tegangan
            </p>

            <p class="text-xl font-semibold mt-1">
                {{ $electronic->voltage }} V
            </p>

        </div>


        <div class="bg-[#E7F0F4] rounded-xl p-4">

            <p class="text-xs text-[#315B72]">
                Daya
            </p>

            <p class="text-xl font-semibold text-[#315B72] mt-1">
                {{ $electronic->wattage }} W
            </p>

        </div>

    </div>


    <div class="flex justify-end gap-3 mt-6">

        <a href="{{ route('user.electronics.edit', $electronic) }}"
            class="px-4 py-2 rounded-lg
                   bg-[#E7F0F4] text-[#315B72] text-sm">

            Edit

        </a>

        <a href="{{ route('user.electronics.index') }}"
            class="px-4 py-2 rounded-lg
                   bg-[#F3EFE7] text-sm">

            Kembali

        </a>

    </div>

</div>

</div>

@endsection