@extends('layouts.app')

@section('title', 'Peringatan')
@section('header', 'Pusat Peringatan')
@section('description', 'Riwayat kondisi listrik yang membutuhkan perhatian.')

@section('content')

<div class="bg-[#FFFDF8] rounded-xl shadow-sm overflow-hidden">

    <div class="px-5 py-4 border-b border-[#EEE8DD]">

        <h3 class="font-semibold">
            Riwayat Peringatan
        </h3>

        <p class="text-xs text-gray-500 mt-1">
            Semua peringatan dari sistem RASA.
        </p>

    </div>


    <div>

        @forelse($alerts as $alert)

        <a href="{{ route('user.alerts.show', $alert) }}"
            class="block px-5 py-4
                   border-b border-[#EEE8DD]
                   hover:bg-[#FAF7F1] transition">

            <div class="flex justify-between gap-4">

                <div>

                    <div class="flex items-center gap-2">

                        @if(($alert->severity ?? '') === 'danger')

                            <span class="w-2.5 h-2.5 rounded-full bg-red-500"></span>

                        @elseif(($alert->severity ?? '') === 'warning')

                            <span class="w-2.5 h-2.5 rounded-full bg-orange-500"></span>

                        @else

                            <span class="w-2.5 h-2.5 rounded-full bg-[#315B72]"></span>

                        @endif


                        <p class="font-medium text-sm">
                            {{ $alert->title ?? 'Peringatan Sistem' }}
                        </p>

                    </div>


                    <p class="text-xs text-gray-500 mt-2">
                        {{ $alert->message ?? 'Terdapat perubahan kondisi listrik.' }}
                    </p>

                </div>


                <div class="text-right shrink-0">

                    <p class="text-xs text-gray-400">
                        {{ $alert->created_at }}
                    </p>

                    @if(empty($alert->is_read))

                        <span class="inline-block mt-2
                                     px-2 py-1 rounded
                                     bg-[#E7F0F4]
                                     text-[#315B72] text-[10px]">

                            Baru

                        </span>

                    @endif

                </div>

            </div>

        </a>

        @empty

        <div class="text-center py-12 text-gray-400">

            Belum ada peringatan.

        </div>

        @endforelse

    </div>


    @if($alerts->hasPages())

        <div class="px-5 py-4 border-t border-[#EEE8DD]">
            {{ $alerts->links() }}
        </div>

    @endif

</div>

@endsection