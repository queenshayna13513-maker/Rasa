@extends('layouts.app')

@section('title', 'Log Aktivitas')
@section('header', 'Log Aktivitas Sistem')
@section('description', 'Pantau koneksi perangkat dan aktivitas sistem RASA.')

@section('content')

<style>

    /* =========================
       ACTIVITY LOG
    ========================= */

    .activity-card {
        background: #fffdf8;

        border: 1px solid #e5ded2;
        border-radius: 18px;

        overflow: hidden;

        box-shadow:
            0 4px 15px
            rgba(49, 91, 114, 0.06);
    }


    /* =========================
       HEADER
    ========================= */

    .activity-card-header {
        padding: 22px 25px;

        border-bottom: 1px solid #e8e1d6;
    }

    .activity-card-header h3 {
        margin: 0;

        font-size: 17px;
        font-weight: 700;

        color: #2f414b;
    }

    .activity-card-header p {
        margin-top: 5px;

        font-size: 13px;

        color: #7a7d7c;
    }


    /* =========================
       TABLE
    ========================= */

    .activity-table-wrapper {
        width: 100%;

        overflow-x: auto;
    }

    .activity-table {
        width: 100%;

        border-collapse: collapse;

        font-size: 13px;
    }


    /* TABLE HEADER */

    .activity-table thead {
        background: #f3efe7;
    }

    .activity-table th {
        padding: 13px 18px;

        text-align: left;

        font-size: 12px;
        font-weight: 600;

        color: #606867;

        white-space: nowrap;
    }

    .activity-table th.text-center {
        text-align: center;
    }


    /* TABLE BODY */

    .activity-table tbody tr {
        border-top: 1px solid #eee8dd;

        transition: background 0.2s ease;
    }

    .activity-table tbody tr:hover {
        background: #faf7f1;
    }

    .activity-table td {
        padding: 16px 18px;

        color: #4b565b;

        vertical-align: middle;
    }

    .activity-table td.text-center {
        text-align: center;
    }


    /* =========================
       TIME
    ========================= */

    .activity-time {
        color: #7a7d7c;

        white-space: nowrap;
    }


    /* =========================
       HOUSE
    ========================= */

    .activity-house {
        font-weight: 600;

        color: #37474f;
    }


    /* =========================
       ACTIVITY
    ========================= */

    .activity-message {
        color: #4b565b;

        line-height: 1.5;
    }


    /* =========================
       STATUS
    ========================= */

    .activity-status {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        min-width: 68px;

        padding: 6px 10px;

        border-radius: 8px;

        font-size: 11px;
        font-weight: 600;
    }


    .status-error {
        background: #fdf0ef;

        color: #b34a43;

        border: 1px solid #f3d8d5;
    }


    .status-offline {
        background: #fff5e8;

        color: #a96720;

        border: 1px solid #f3dfc5;
    }


    .status-normal {
        background: #edf7f0;

        color: #397052;

        border: 1px solid #dcecdf;
    }


    /* =========================
       EMPTY STATE
    ========================= */

    .activity-empty {
        padding: 50px 20px !important;

        text-align: center;

        color: #8b8e8c !important;
    }


    /* =========================
       PAGINATION
    ========================= */

    .activity-pagination {
        padding: 18px 25px;

        border-top: 1px solid #e8e1d6;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 700px) {

        .activity-table {
            min-width: 700px;
        }

        .activity-card-header {
            padding: 20px;
        }

    }

</style>


<div class="activity-card">


    {{-- =========================
        HEADER
    ========================= --}}

    <div class="activity-card-header">

        <h3>
            Riwayat Aktivitas
        </h3>

        <p>
            Digunakan untuk membantu proses maintenance.
        </p>

    </div>



    {{-- =========================
        TABLE
    ========================= --}}

    <div class="activity-table-wrapper">

        <table class="activity-table">

            <thead>

                <tr>

                    <th>
                        Waktu
                    </th>

                    <th>
                        Rumah
                    </th>

                    <th>
                        Aktivitas
                    </th>

                    <th class="text-center">
                        Status
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($logs as $log)

                <tr>


                    {{-- WAKTU --}}

                    <td class="activity-time">
                        {{ $log->created_at }}
                    </td>


                    {{-- RUMAH --}}

                    <td class="activity-house">
                        {{ $log->house->name ?? '-' }}
                    </td>


                    {{-- AKTIVITAS --}}

                    <td class="activity-message">
                        {{ $log->activity ?? $log->message ?? '-' }}
                    </td>


                    {{-- STATUS --}}

                    <td class="text-center">

                        @if(($log->status ?? '') === 'error')

                            <span class="activity-status status-error">
                                Error
                            </span>

                        @elseif(($log->status ?? '') === 'offline')

                            <span class="activity-status status-offline">
                                Offline
                            </span>

                        @else

                            <span class="activity-status status-normal">
                                Normal
                            </span>

                        @endif

                    </td>


                </tr>

                @empty

                <tr>

                    <td
                        colspan="4"
                        class="activity-empty"
                    >

                        Belum ada aktivitas sistem.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>



    {{-- =========================
        PAGINATION
    ========================= --}}

    @if($logs->hasPages())

        <div class="activity-pagination">

            {{ $logs->links() }}

        </div>

    @endif


</div>

@endsection