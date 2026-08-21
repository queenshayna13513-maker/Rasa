@extends('layouts.app')

@section('title', 'Profil Rumah')
@section('header', 'Profil Rumah')
@section('description', 'Informasi rumah yang dipantau oleh RASA.')

@section('content')

@if($house)

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <div class="lg:col-span-2">

        <form method="POST"
            action="{{ route('user.profile.update') }}"
            class="bg-[#FFFDF8] rounded-xl shadow-sm p-6">

            @csrf
            @method('PUT')

            <h3 class="font-semibold mb-5">
                Informasi Rumah
            </h3>


            <div class="space-y-5">

                <div>

                    <label class="block text-sm font-medium mb-2">
                        Nama Rumah
                    </label>

                    <input type="text"
                        name="name"
                        value="{{ old('name', $house->name) }}"
                        class="w-full rounded-lg border-[#DDD6CA]">

                </div>


                <div>

                    <label class="block text-sm font-medium mb-2">
                        Alamat
                    </label>

                    <textarea name="address"
                        rows="4"
                        class="w-full rounded-lg border-[#DDD6CA]">{{ old('address', $house->address) }}</textarea>

                </div>


                <div>

                    <label class="block text-sm font-medium mb-2">
                        Nomor Telepon
                    </label>

                    <input type="text"
                        name="phone"
                        value="{{ old('phone', $house->phone) }}"
                        class="w-full rounded-lg border-[#DDD6CA]">

                </div>

            </div>


            <div class="flex justify-end mt-6">

                <button
                    class="px-4 py-2 rounded-lg
                           bg-[#315B72] text-white text-sm">

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>


    <div class="space-y-5">

        <div class="bg-[#FFFDF8] rounded-xl shadow-sm p-5">

            <p class="text-sm text-gray-500">
                Status Rumah
            </p>

            <div class="flex items-center gap-2 mt-3">

                <span class="w-3 h-3 rounded-full bg-green-500"></span>

                <span class="font-semibold text-green-700">
                    Aktif
                </span>

            </div>

        </div>


        <div class="bg-[#FFFDF8] rounded-xl shadow-sm p-5">

            <p class="text-sm text-gray-500">
                Tegangan Standar
            </p>

            <p class="text-2xl font-bold text-[#315B72] mt-2">
                {{ $house->standard_voltage }} V
            </p>

        </div>


        <div class="bg-[#FFFDF8] rounded-xl shadow-sm p-5">

            <p class="text-sm text-gray-500">
                Penggunaan Bulan Ini
            </p>

            <p class="text-2xl font-bold text-[#315B72] mt-2">
                0 kWh
            </p>

            <p class="text-xs text-gray-400 mt-1">
                Data akan terisi ketika hardware terhubung.
            </p>

        </div>

    </div>

</div>

@else

<div class="bg-[#FFFDF8] rounded-xl shadow-sm p-8 text-center">

    <p class="text-gray-500">
        Belum ada data rumah yang terhubung dengan akun Anda.
    </p>

</div>

@endif

@endsection