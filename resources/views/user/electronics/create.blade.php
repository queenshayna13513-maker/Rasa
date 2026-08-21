@extends('layouts.app')

@section('title', 'Tambah Perangkat')
@section('header', 'Tambah Perangkat')
@section('description', 'Masukkan informasi perangkat elektronik yang ingin dipantau.')

@section('content')

<div class="max-w-2xl">

<form method="POST"
    action="{{ route('user.electronics.store') }}"
    class="bg-[#FFFDF8] rounded-xl shadow-sm p-6">

    @csrf

    <div class="space-y-5">

        <div>

            <label class="block text-sm font-medium mb-2">
                Nama Perangkat
            </label>

            <input type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Contoh: Kulkas"
                class="w-full rounded-lg border-[#DDD6CA]">

        </div>


        <div>

            <label class="block text-sm font-medium mb-2">
                Kategori
            </label>

            <select name="category"
                class="w-full rounded-lg border-[#DDD6CA]">

                <option value="">
                    Pilih kategori
                </option>

                <option value="Dapur">
                    Dapur
                </option>

                <option value="Elektronik">
                    Elektronik
                </option>

                <option value="Penerangan">
                    Penerangan
                </option>

                <option value="Pendingin">
                    Pendingin
                </option>

                <option value="Lainnya">
                    Lainnya
                </option>

            </select>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <div>

                <label class="block text-sm font-medium mb-2">
                    Tegangan
                </label>

                <input type="number"
                    name="voltage"
                    value="{{ old('voltage') }}"
                    placeholder="220"
                    class="w-full rounded-lg border-[#DDD6CA]">

            </div>


            <div>

                <label class="block text-sm font-medium mb-2">
                    Daya
                </label>

                <input type="number"
                    name="wattage"
                    value="{{ old('wattage') }}"
                    placeholder="100"
                    class="w-full rounded-lg border-[#DDD6CA]">

            </div>

        </div>

    </div>


    <div class="flex justify-end gap-3 mt-6">

        <a href="{{ route('user.electronics.index') }}"
            class="px-4 py-2 rounded-lg bg-[#F3EFE7] text-sm">

            Batal

        </a>

        <button
            class="px-4 py-2 rounded-lg
                   bg-[#315B72] text-white text-sm">

            Simpan Perangkat

        </button>

    </div>

</form>

</div>

@endsection