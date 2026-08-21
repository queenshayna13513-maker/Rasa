@extends('layouts.app')

@section('title', 'Tambah Rumah')
@section('header', 'Tambah Rumah')
@section('description', 'Tambahkan rumah baru ke dalam sistem RASA.')

@section('content')

<div class="max-w-3xl">

<form method="POST"
    action="{{ route('admin.houses.store') }}"
    class="bg-[#FFFDF8] rounded-xl shadow-sm p-6">

    @csrf

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        <div class="md:col-span-2">

            <label class="block text-sm font-medium mb-2">
                Nama Rumah
            </label>

            <input type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Contoh: Rumah Ibu Sari"
                class="w-full rounded-lg border-[#DDD6CA]
                       focus:border-[#315B72] focus:ring-[#315B72]">

        </div>


        <div>

            <label class="block text-sm font-medium mb-2">
                Nama Pemilik
            </label>

            <input type="text"
                name="owner_name"
                value="{{ old('owner_name') }}"
                placeholder="Nama pemilik rumah"
                class="w-full rounded-lg border-[#DDD6CA]">

        </div>


        <div>

            <label class="block text-sm font-medium mb-2">
                Nomor Telepon
            </label>

            <input type="text"
                name="phone"
                value="{{ old('phone') }}"
                placeholder="08xxxxxxxxxx"
                class="w-full rounded-lg border-[#DDD6CA]">

        </div>


        <div class="md:col-span-2">

            <label class="block text-sm font-medium mb-2">
                Alamat
            </label>

            <textarea name="address"
                rows="3"
                class="w-full rounded-lg border-[#DDD6CA]"
                placeholder="Alamat lengkap rumah">{{ old('address') }}</textarea>

        </div>


        <div>

            <label class="block text-sm font-medium mb-2">
                Tegangan Standar
            </label>

            <div class="relative">

                <input type="number"
                    name="standard_voltage"
                    value="{{ old('standard_voltage', 220) }}"
                    class="w-full rounded-lg border-[#DDD6CA] pr-10">

                <span class="absolute right-3 top-2.5 text-sm text-gray-400">
                    V
                </span>

            </div>

        </div>

    </div>


    <div class="flex justify-end gap-3 mt-6">

        <a href="{{ route('admin.houses.index') }}"
            class="px-4 py-2 rounded-lg bg-[#F3EFE7] text-sm">

            Batal

        </a>

        <button
            class="px-4 py-2 rounded-lg
                   bg-[#315B72] text-white text-sm">

            Simpan Rumah

        </button>

    </div>

</form>

</div>

@endsection