@extends('layouts.app')

@section('title', 'Edit Rumah')
@section('header', 'Edit Rumah')
@section('description', 'Perbarui informasi rumah.')

@section('content')

<div class="max-w-3xl">

<form method="POST"
    action="{{ route('admin.houses.update', $house) }}"
    class="bg-[#FFFDF8] rounded-xl shadow-sm p-6">

    @csrf
    @method('PUT')

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


        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <div>
                <label class="block text-sm font-medium mb-2">
                    Nama Pemilik
                </label>

                <input type="text"
                    name="owner_name"
                    value="{{ old('owner_name', $house->owner_name) }}"
                    class="w-full rounded-lg border-[#DDD6CA]">
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


        <div>

            <label class="block text-sm font-medium mb-2">
                Alamat
            </label>

            <textarea name="address"
                rows="3"
                class="w-full rounded-lg border-[#DDD6CA]">{{ old('address', $house->address) }}</textarea>

        </div>


        <div>

            <label class="block text-sm font-medium mb-2">
                Tegangan Standar
            </label>

            <input type="number"
                name="standard_voltage"
                value="{{ old('standard_voltage', $house->standard_voltage) }}"
                class="w-full rounded-lg border-[#DDD6CA]">

        </div>

    </div>


    <div class="flex justify-end gap-3 mt-6">

        <a href="{{ route('admin.houses.show', $house) }}"
            class="px-4 py-2 rounded-lg bg-[#F3EFE7] text-sm">

            Batal

        </a>

        <button
            class="px-4 py-2 rounded-lg bg-[#315B72]
                   text-white text-sm">

            Simpan Perubahan

        </button>

    </div>

</form>

</div>

@endsection