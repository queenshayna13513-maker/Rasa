@extends('layouts.app')

@section('title', 'Detail Rumah')
@section('header', 'Detail Rumah')
@section('description', 'Informasi rumah dan perangkat yang terhubung.')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <div class="lg:col-span-2 bg-[#FFFDF8] rounded-xl shadow-sm p-6">

        <h3 class="font-semibold mb-5">
            Informasi Rumah
        </h3>

        <div class="space-y-4">

            <div class="flex justify-between border-b border-[#EEE8DD] pb-3">
                <span class="text-sm text-gray-500">Nama Rumah</span>
                <span class="text-sm font-medium">{{ $house->name }}</span>
            </div>

            <div class="flex justify-between border-b border-[#EEE8DD] pb-3">
                <span class="text-sm text-gray-500">Pemilik</span>
                <span class="text-sm font-medium">{{ $house->owner_name }}</span>
            </div>

            <div class="border-b border-[#EEE8DD] pb-3">
                <p class="text-sm text-gray-500 mb-1">Alamat</p>
                <p class="text-sm">{{ $house->address }}</p>
            </div>

            <div class="flex justify-between border-b border-[#EEE8DD] pb-3">
                <span class="text-sm text-gray-500">Telepon</span>
                <span class="text-sm">{{ $house->phone ?? '-' }}</span>
            </div>

            <div class="flex justify-between">
                <span class="text-sm text-gray-500">Tegangan Standar</span>
                <span class="text-sm font-semibold">
                    {{ $house->standard_voltage }} V
                </span>
            </div>

        </div>

    </div>


    <div class="bg-[#FFFDF8] rounded-xl shadow-sm p-6">

        <h3 class="font-semibold mb-5">
            Status
        </h3>

        <div class="text-center py-5">

            @if($house->status === 'active')

                <div class="w-14 h-14 mx-auto rounded-full
                            bg-green-100 flex items-center justify-center">

                    <span class="text-green-700 text-xl">
                        ✓
                    </span>

                </div>

                <p class="font-semibold text-green-700 mt-3">
                    Aktif
                </p>

            @else

                <div class="w-14 h-14 mx-auto rounded-full
                            bg-red-100 flex items-center justify-center">

                    <span class="text-red-600 text-xl">
                        !
                    </span>

                </div>

                <p class="font-semibold text-red-600 mt-3">
                    Diblokir
                </p>

            @endif

        </div>


        <div class="flex gap-2 mt-5">

            <a href="{{ route('admin.houses.edit', $house) }}"
                class="flex-1 text-center px-3 py-2
                       rounded-lg bg-[#E7F0F4]
                       text-[#315B72] text-sm">

                Edit

            </a>

            <a href="{{ route('admin.houses.index') }}"
                class="flex-1 text-center px-3 py-2
                       rounded-lg bg-[#F3EFE7] text-sm">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection