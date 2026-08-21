@extends('layouts.app')

@section('title', 'Data Rumah')
@section('header', 'Data Rumah')
@section('description', 'Kelola rumah yang terhubung dengan sistem RASA.')

@section('content')

<div class="bg-[#FFFDF8] rounded-xl shadow-sm overflow-hidden">

    <div class="px-5 py-4 border-b border-[#EEE8DD]
                flex justify-between items-center">

        <div>
            <h3 class="font-semibold">
                Daftar Rumah
            </h3>

            <p class="text-xs text-gray-500 mt-1">
                Rumah pengguna yang terdaftar dalam sistem.
            </p>
        </div>

        <a href="{{ route('admin.houses.create') }}"
            class="bg-[#315B72] text-white
                   px-4 py-2 rounded-lg text-sm
                   hover:bg-[#24465A] transition">

            + Tambah Rumah

        </a>

    </div>


    <table class="w-full text-sm">

        <thead class="bg-[#F3EFE7] text-gray-600">

            <tr>

                <th class="px-5 py-3 text-left">
                    Rumah
                </th>

                <th class="px-5 py-3 text-left">
                    Pemilik
                </th>

                <th class="px-5 py-3 text-center">
                    Tegangan
                </th>

                <th class="px-5 py-3 text-center">
                    Status
                </th>

                <th class="px-5 py-3 text-center">
                    Perangkat
                </th>

                <th class="px-5 py-3 text-center">
                    Aksi
                </th>

            </tr>

        </thead>


        <tbody>

            @forelse($houses as $house)

            <tr class="border-t border-[#EEE8DD]
                       hover:bg-[#FAF7F1] transition">

                <td class="px-5 py-4">

                    <p class="font-medium">
                        {{ $house->name }}
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        {{ $house->address }}
                    </p>

                </td>


                <td class="px-5 py-4">

                    {{ $house->owner_name }}

                </td>


                <td class="px-5 py-4 text-center">

                    {{ $house->standard_voltage }} V

                </td>


                <td class="px-5 py-4 text-center">

                    @if($house->status === 'active')

                        <span class="inline-flex items-center
                                     px-2 py-1 text-xs font-semibold
                                     bg-green-100 text-green-700 rounded">

                            Aktif

                        </span>

                    @else

                        <span class="inline-flex items-center
                                     px-2 py-1 text-xs font-semibold
                                     bg-red-100 text-red-600 rounded">

                            Diblokir

                        </span>

                    @endif

                </td>


                <td class="px-5 py-4 text-center">

                    {{ $house->electronics_count ?? 0 }}

                </td>


                <td class="px-5 py-4">

                    <div class="flex justify-center gap-2">

                        <a href="{{ route('admin.houses.show', $house) }}"
                            class="px-3 py-1 rounded-lg
                                   bg-[#E7F0F4] text-[#315B72]
                                   hover:bg-[#D9E7ED] transition">

                            Detail

                        </a>


                        @if($house->status === 'active')

                            <form method="POST"
                                action="{{ route('admin.houses.block', $house) }}">

                                @csrf

                                <button type="submit"
                                    class="px-3 py-1 rounded-lg
                                           bg-red-50 text-red-600
                                           hover:bg-red-100 transition">

                                    Blokir

                                </button>

                            </form>

                        @else

                            <form method="POST"
                                action="{{ route('admin.houses.activate', $house) }}">

                                @csrf

                                <button type="submit"
                                    class="px-3 py-1 rounded-lg
                                           bg-green-50 text-green-700
                                           hover:bg-green-100 transition">

                                    Aktifkan

                                </button>

                            </form>

                        @endif

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6"
                    class="text-center py-10 text-gray-400">

                    Belum ada rumah yang terdaftar.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>


    @if($houses->hasPages())

        <div class="px-5 py-4 border-t border-[#EEE8DD]">

            {{ $houses->links() }}

        </div>

    @endif

</div>

@endsection