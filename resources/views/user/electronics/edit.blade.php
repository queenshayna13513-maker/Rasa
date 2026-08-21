@extends('layouts.app')

@section('title', 'Edit Perangkat')
@section('header', 'Edit Perangkat')
@section('description', 'Perbarui informasi perangkat elektronik.')

@section('content')

<div class="max-w-2xl">

<form method="POST"
    action="{{ route('user.electronics.update', $electronic) }}"
    class="bg-[#FFFDF8] rounded-xl shadow-sm p-6">

    @csrf
    @method('PUT')

    <div class="space-y-5">

        <div>

            <label class="block text-sm font-medium mb-2">
                Nama Perangkat
            </label>

            <input type="text"
                name="name"
                value="{{ old('name', $electronic->name) }}"
                class="w-full rounded-lg border-[#DDD6CA]">

        </div>


        <div>

            <label class="block text-sm font-medium mb-2">
                Kategori
            </label>

            <select name="category"
                class="w-full rounded-lg border-[#DDD6CA]">

                @foreach(['Dapur','Elektronik','Penerangan','Pendingin','Lainnya'] as $category)

                    <option value="{{ $category }}"
                        @selected(old('category', $electronic->category) === $category)>

                        {{ $category }}

                    </option>

                @endforeach

            </select>

        </div>


        <div class="grid grid-cols-2 gap-5">

            <div>

                <label class="block text-sm font-medium mb-2">
                    Tegangan
                </label>

                <input type="number"
                    name="voltage"
                    value="{{ old('voltage', $electronic->voltage) }}"
                    class="w-full rounded-lg border-[#DDD6CA]">

            </div>


            <div>

                <label class="block text-sm font-medium mb-2">
                    Daya
                </label>

                <input type="number"
                    name="wattage"
                    value="{{ old('wattage', $electronic->wattage) }}"
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

            Simpan Perubahan

        </button>

    </div>

</form>

</div>

@endsection