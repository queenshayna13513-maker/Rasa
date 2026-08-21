@extends('layouts.app')

@section('title', 'Perangkat Elektronik')
@section('header', 'Perangkat Elektronik')
@section('description', 'Kelola perangkat elektronik yang dipantau oleh RASA.')

@section('content')

<div class="bg-[#FFFDF8] rounded-xl shadow-sm overflow-hidden">

    <div class="px-5 py-4 border-b border-[#EEE8DD]
                flex justify-between items-center">

        <div>
            <h3 class="font-semibold">
                Daftar Perangkat
            </h3>

            <p class="text-xs text-gray-500 mt-1">
                Perangkat yang terdaftar di rumah.
            </p>
        </div>

        <a href="{{ route('user.electronics.create') }}"
            class="px-4 py-2 rounded-lg
                   bg-[#315B72] text-white text-sm">

            + Tambah Perangkat

        </a>

    </div>


    <table class="w-full text-sm">

        <thead class="bg-[#F3EFE7] text-gray-600">

            <tr>

                <th class="px-5 py-3 text-left">
                    Nama
                </th>

                <th class="px-5 py-3 text-center">
                    Kategori
                </th>

                <th class="px-5 py-3 text-center">
                    Tegangan
                </th>

                <th class="px-5 py-3 text-center">
                    Daya
                </th>

                <th class="px-5 py-3 text-center">
                    Aksi
                </th>

            </tr>

        </thead>


        <tbody>

            @forelse($electronics as $electronic)

            <tr class="border-t border-[#EEE8DD]">

                <td class="px-5 py-4 font-medium">
                    {{ $electronic->name }}
                </td>

                <td class="px-5 py-4 text-center">
                    {{ $electronic->category }}
                </td>

                <td class="px-5 py-4 text-center">
                    {{ $electronic->voltage }} V
                </td>

                <td class="px-5 py-4 text-center">
                    {{ $electronic->wattage }} W
                </td>

                <td class="px-5 py-4">

                    <div class="flex justify-center gap-2">

                        <a href="{{ route('user.electronics.show', $electronic) }}"
                            class="px-3 py-1 rounded-lg
                                   bg-[#E7F0F4] text-[#315B72] text-xs">

                            Detail

                        </a>

                        <a href="{{ route('user.electronics.edit', $electronic) }}"
                            class="px-3 py-1 rounded-lg
                                   bg-[#F3EFE7] text-xs">

                            Edit

                        </a>

                        <form method="POST"
                            action="{{ route('user.electronics.destroy', $electronic) }}">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Hapus perangkat ini?')"
                                class="px-3 py-1 rounded-lg
                                       bg-red-50 text-red-600 text-xs">

                                Hapus

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="5"
                    class="text-center py-10 text-gray-400">

                    Belum ada perangkat elektronik.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection