@extends('layouts.app')

@section('title', 'Data Rumah')
@section('header', 'Data Rumah')
@section('description', 'Kelola rumah yang terhubung dengan sistem RASA.')

@section('content')

<style>

    /* =========================
       DATA RUMAH
    ========================= */

    .house-card {
        background: #fffdf8;
        border: 1px solid #e5ded2;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(49, 91, 114, 0.06);
    }


    /* =========================
       CARD HEADER
    ========================= */

    .house-card-header {
        padding: 22px 25px;
        border-bottom: 1px solid #e8e1d6;

        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
    }

    .house-card-header h3 {
        margin: 0;

        font-size: 17px;
        font-weight: 700;

        color: #2f414b;
    }

    .house-card-header p {
        margin-top: 5px;

        font-size: 13px;

        color: #7a7d7c;
    }


    /* =========================
       ADD BUTTON
    ========================= */

    .btn-add-house {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        height: 42px;
        padding: 0 18px;

        border-radius: 11px;

        background: #315b72;
        border: 1px solid #315b72;

        color: #ffffff;

        font-size: 13px;
        font-weight: 600;

        text-decoration: none;

        transition: all 0.2s ease;

        white-space: nowrap;
    }

    .btn-add-house:hover {
        background: #274b5e;
        border-color: #274b5e;

        transform: translateY(-1px);

        box-shadow:
            0 5px 12px
            rgba(49, 91, 114, 0.20);
    }


    /* =========================
       TABLE
    ========================= */

    .house-table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .house-table {
        width: 100%;
        border-collapse: collapse;

        font-size: 13px;
    }

    .house-table thead {
        background: #f3efe7;
    }

    .house-table th {
        padding: 13px 18px;

        text-align: left;

        font-size: 12px;
        font-weight: 600;

        color: #606867;

        white-space: nowrap;
    }

    .house-table th.text-center {
        text-align: center;
    }

    .house-table tbody tr {
        border-top: 1px solid #eee8dd;

        transition: background 0.2s ease;
    }

    .house-table tbody tr:hover {
        background: #faf7f1;
    }

    .house-table td {
        padding: 16px 18px;

        color: #4b565b;

        vertical-align: middle;
    }

    .house-table td.text-center {
        text-align: center;
    }


    /* =========================
       HOUSE NAME
    ========================= */

    .house-name {
        margin: 0;

        font-size: 13px;
        font-weight: 600;

        color: #37474f;
    }

    .house-address {
        margin-top: 4px;

        font-size: 12px;

        color: #8b8e8c;

        max-width: 300px;
    }


    /* =========================
       VOLTAGE
    ========================= */

    .voltage-value {
        font-weight: 600;

        color: #315b72;
    }


    /* =========================
       STATUS
    ========================= */

    .status-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 6px 10px;

        border-radius: 8px;

        font-size: 11px;
        font-weight: 600;
    }

    .status-active {
        background: #edf7f0;
        color: #397052;

        border: 1px solid #dcecdf;
    }

    .status-blocked {
        background: #fdf0ef;
        color: #b34a43;

        border: 1px solid #f3d8d5;
    }


    /* =========================
       DEVICE COUNT
    ========================= */

    .device-count {
        font-weight: 600;

        color: #37474f;
    }


    /* =========================
       ACTION
    ========================= */

    .action-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;

        gap: 7px;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        height: 34px;
        padding: 0 12px;

        border-radius: 9px;

        font-size: 12px;
        font-weight: 600;

        text-decoration: none;

        border: 1px solid transparent;

        cursor: pointer;

        transition: all 0.2s ease;
    }


    /* DETAIL */

    .btn-detail {
        background: #e7f0f4;
        color: #315b72;
        border-color: #d9e7ed;
    }

    .btn-detail:hover {
        background: #d9e7ed;
    }


    /* BLOKIR */

    .btn-block {
        background: #fdf0ef;
        color: #b34a43;
        border-color: #f3d8d5;
    }

    .btn-block:hover {
        background: #f9dfdc;
    }


    /* AKTIFKAN */

    .btn-activate {
        background: #edf7f0;
        color: #397052;
        border-color: #dcecdf;
    }

    .btn-activate:hover {
        background: #dcecdf;
    }


    /* =========================
       EMPTY STATE
    ========================= */

    .empty-state {
        padding: 50px 20px;

        text-align: center;

        color: #8b8e8c;
    }

    .empty-state-icon {
        width: 48px;
        height: 48px;

        margin: 0 auto 12px;

        border-radius: 13px;

        background: #f3efe7;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #315b72;
    }

    .empty-state-icon svg {
        width: 22px;
        height: 22px;
    }

    .empty-state p {
        margin: 0;

        font-size: 13px;
    }


    /* =========================
       PAGINATION
    ========================= */

    .house-pagination {
        padding: 18px 25px;

        border-top: 1px solid #e8e1d6;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 800px) {

        .house-card-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .btn-add-house {
            width: 100%;
        }

        .house-table {
            min-width: 850px;
        }

    }

</style>


<div class="house-card">


    {{-- =========================
        HEADER
    ========================= --}}

    <div class="house-card-header">

        <div>

            <h3>
                Daftar Rumah
            </h3>

            <p>
                Rumah pengguna yang terdaftar dalam sistem.
            </p>

        </div>


        <a
            href="{{ route('admin.houses.create') }}"
            class="btn-add-house"
        >
            + Tambah Rumah
        </a>

    </div>



    {{-- =========================
        TABLE
    ========================= --}}

    <div class="house-table-wrapper">

        <table class="house-table">

            <thead>

                <tr>

                    <th>
                        Alamat Rumah
                    </th>

                    <th>
                        Pemilik
                    </th>

                    <th class="text-center">
                        Tegangan
                    </th>

                    <th class="text-center">
                        Status
                    </th>

                    <th class="text-center">
                        Perangkat
                    </th>

                    <th class="text-center">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($houses as $house)

                <tr>


                    {{-- ALAMAT --}}

                    <td>

                        <p class="house-name">
                            {{ $house->name }}
                        </p>

                        <p class="house-address">
                            {{ $house->address }}
                        </p>

                    </td>


                    {{-- PEMILIK --}}

                    <td>

                        {{ $house->user->name }}

                    </td>


                    {{-- TEGANGAN --}}

                    <td class="text-center">

                        <span class="voltage-value">
                            {{ $house->standard_voltage }} V
                        </span>

                    </td>


                    {{-- STATUS --}}

                    <td class="text-center">

                        @if($house->status === 'active')

                            <span class="status-badge status-active">

                                Aktif

                            </span>

                        @else

                            <span class="status-badge status-blocked">

                                Diblokir

                            </span>

                        @endif

                    </td>


                    {{-- PERANGKAT --}}

                    <td class="text-center">

                        <span class="device-count">
                            {{ $house->electronics_count ?? 0 }}
                        </span>

                    </td>


                    {{-- AKSI --}}

                    <td>

                        <div class="action-wrapper">


                            {{-- DETAIL --}}

                            <a
                                href="{{ route('admin.houses.show', $house) }}"
                                class="btn-action btn-detail"
                            >
                                Detail
                            </a>


                            @if($house->status === 'active')


                                {{-- BLOKIR --}}

                                <form
                                    method="POST"
                                    action="{{ route('admin.houses.block', $house) }}"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        class="btn-action btn-block"
                                    >
                                        Blokir
                                    </button>

                                </form>


                            @else


                                {{-- AKTIFKAN --}}

                                <form
                                    method="POST"
                                    action="{{ route('admin.houses.activate', $house) }}"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        class="btn-action btn-activate"
                                    >
                                        Aktifkan
                                    </button>

                                </form>


                            @endif

                        </div>

                    </td>


                </tr>

                @empty

                <tr>

                    <td
                        colspan="6"
                        class="empty-state"
                    >

                        Belum ada rumah yang terdaftar.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>



    {{-- =========================
        PAGINATION
    ========================= --}}

    @if($houses->hasPages())

        <div class="house-pagination">

            {{ $houses->links() }}

        </div>

    @endif


</div>

@endsection