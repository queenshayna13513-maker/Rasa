@extends('layouts.app')

@section('title', 'Pengaturan')
@section('header', 'Pengaturan Tegangan')
@section('description', 'Atur batas standar tegangan yang digunakan sistem RASA.')

@section('content')

<div class="max-w-2xl">

<form method="POST"
    action="{{ route('admin.settings.update') }}"
    class="bg-[#FFFDF8] rounded-xl shadow-sm p-6">

    @csrf
    @method('PUT')

    <div class="mb-6">

        <h3 class="font-semibold">
            Standar Tegangan Global
        </h3>

        <p class="text-sm text-gray-500 mt-1">
            Nilai ini menjadi acuan awal sebelum pengguna
            memiliki preferensi masing-masing.
        </p>

    </div>


    <div class="space-y-5">

        <div>

            <label class="block text-sm font-medium mb-2">
                Tegangan Standar
            </label>

            <div class="relative">

                <input type="number"
                    name="standard_voltage"
                    value="{{ old('standard_voltage', $settings['standard_voltage']) }}"
                    class="w-full rounded-lg border-[#DDD6CA] pr-10">

                <span class="absolute right-3 top-2.5 text-sm text-gray-400">
                    V
                </span>

            </div>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <div>

                <label class="block text-sm font-medium mb-2">
                    Batas Minimum
                </label>

                <div class="relative">

                    <input type="number"
                        name="minimum_voltage"
                        value="{{ old('minimum_voltage', $settings['minimum_voltage']) }}"
                        class="w-full rounded-lg border-[#DDD6CA] pr-10">

                    <span class="absolute right-3 top-2.5 text-sm text-gray-400">
                        V
                    </span>

                </div>

            </div>


            <div>

                <label class="block text-sm font-medium mb-2">
                    Batas Maksimum
                </label>

                <div class="relative">

                    <input type="number"
                        name="maximum_voltage"
                        value="{{ old('maximum_voltage', $settings['maximum_voltage']) }}"
                        class="w-full rounded-lg border-[#DDD6CA] pr-10">

                    <span class="absolute right-3 top-2.5 text-sm text-gray-400">
                        V
                    </span>

                </div>

            </div>

        </div>

    </div>


    <div class="mt-6 p-4 rounded-xl bg-[#E7F0F4]">

        <p class="text-sm font-medium text-[#315B72]">
            Catatan
        </p>

        <p class="text-xs text-[#315B72] mt-1">
            Pengaturan global akan menjadi acuan awal
            sistem monitoring RASA.
        </p>

    </div>


    <div class="flex justify-end mt-6">

        <button
            class="px-4 py-2 rounded-lg bg-[#315B72]
                   text-white text-sm">

            Simpan Pengaturan

        </button>

    </div>

</form>

</div>

@endsection