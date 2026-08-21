@extends('layouts.app')

@section('title', 'Log Aktivitas')
@section('header', 'Log Aktivitas Sistem')
@section('description', 'Pantau koneksi perangkat dan aktivitas sistem RASA.')

@section('content')

<div class="bg-[#FFFDF8] rounded-xl shadow-sm overflow-hidden">

    <div class="px-5 py-4 border-b border-[#EEE8DD]">

        <h3 class="font-semibold">
            Riwayat Aktivitas
        </h3>

        <p class="text-xs text-gray-500 mt-1">
            Digunakan untuk membantu proses maintenance.
        </p>

    </div>


    <table class="w-full text-sm">

        <thead class="bg-[#F3EFE7] text-gray-600">

            <tr>

                <th class="px-5 py-3 text-left">
                    Waktu
                </th>

                <th class="px-5 py-3 text-left">
                    Rumah
                </th>

                <th class="px-5 py-3 text-left">
                    Aktivitas
                </th>

                <th class="px-5 py-3 text-center">
                    Status
                </th>

            </tr>

        </thead>


        <tbody>

            @forelse($logs as $log)

            <tr class="border-t border-[#EEE8DD]">

                <td class="px-5 py-4 text-gray-500">
                    {{ $log->created_at }}
                </td>

                <td class="px-5 py-4 font-medium">
                    {{ $log->house->name ?? '-' }}
                </td>

                <td class="px-5 py-4">
                    {{ $log->activity ?? $log->message ?? '-' }}
                </td>

                <td class="px-5 py-4 text-center">

                    @if(($log->status ?? '') === 'error')

                        <span class="px-2 py-1 rounded
                                     bg-red-100 text-red-600 text-xs">
                            Error
                        </span>

                    @elseif(($log->status ?? '') === 'offline')

                        <span class="px-2 py-1 rounded
                                     bg-orange-100 text-orange-700 text-xs">
                            Offline
                        </span>

                    @else

                        <span class="px-2 py-1 rounded
                                     bg-green-100 text-green-700 text-xs">
                            Normal
                        </span>

                    @endif

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="4"
                    class="text-center py-10 text-gray-400">

                    Belum ada aktivitas sistem.

                </td>
            </tr>

            @endforelse

        </tbody>

    </table>


    @if($logs->hasPages())

        <div class="px-5 py-4 border-t border-[#EEE8DD]">
            {{ $logs->links() }}
        </div>

    @endif

</div>

@endsection