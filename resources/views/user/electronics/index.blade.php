@extends('layouts.app')

@section('title', 'Perangkat Elektronik')
@section('header', 'Perangkat Elektronik')
@section('description', 'Kelola perangkat elektronik yang dipantau oleh RASA.')

@section('content')

<style>
    .electronics-card {
        background: #fffdf8;
        border: 1px solid #e5ded2;
        border-radius: 18px;
        box-shadow: 0 4px 15px rgba(49, 91, 114, 0.06);
        overflow: hidden;
    }

    .electronics-header {
        padding: 20px 22px;
        border-bottom: 1px solid #e8e1d6;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
    }

    .electronics-header h3 {
        margin: 0;
        font-size: 16px;
        font-weight: 700;
        color: #2f414b;
    }

    .electronics-header p {
        margin-top: 5px;
        font-size: 12px;
        color: #7a7d7c;
    }

    .btn-add-electronic {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        min-height: 42px;
        padding: 0 17px;

        border-radius: 11px;

        background: #315b72;
        border: 1px solid #315b72;

        color: #ffffff;
        font-size: 13px;
        font-weight: 600;

        text-decoration: none;

        box-shadow: 0 3px 8px rgba(49, 91, 114, 0.12);

        transition: all 0.2s ease;
    }

    .btn-add-electronic:hover {
        background: #274b5e;
        border-color: #274b5e;
        transform: translateY(-1px);
        box-shadow: 0 5px 12px rgba(49, 91, 114, 0.18);
    }

    .electronics-table-wrapper {
        overflow-x: auto;
    }

    .electronics-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
    }

    .electronics-table thead {
        background: #f3efe7;
        color: #5f6668;
    }

    .electronics-table th {
        padding: 13px 20px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    .electronics-table td {
        padding: 16px 20px;
        border-top: 1px solid #eee8dd;
        color: #37474f;
        white-space: nowrap;
    }

    .electronics-table tbody tr {
        transition: background 0.2s ease;
    }

    .electronics-table tbody tr:hover {
        background: #faf7f1;
    }

    .electronic-name {
        font-weight: 600;
        color: #2f414b;
    }

    .electronic-category {
        color: #6f777b;
    }

    .electronic-value {
        color: #37474f;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        padding: 5px 10px;

        border-radius: 999px;

        font-size: 11px;
        font-weight: 600;
    }

    .status-active {
        background: #eaf4ec;
        color: #15803d;
    }

    .status-inactive {
        background: #f1f1ef;
        color: #6b7280;
    }

    .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
    }

    .status-dot-active {
        background: #22c55e;
    }

    .status-dot-inactive {
        background: #9ca3af;
    }

    .action-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        min-height: 32px;
        padding: 0 11px;

        border-radius: 9px;

        font-size: 11px;
        font-weight: 600;

        text-decoration: none;

        transition: all 0.2s ease;
    }

    .btn-detail {
        background: #e7f0f4;
        color: #315b72;
    }

    .btn-detail:hover {
        background: #d9e7ed;
    }

    .btn-edit {
        background: #f3efe7;
        color: #5f625f;
    }

    .btn-edit:hover {
        background: #e9e2d7;
    }

    .btn-delete {
        border: none;
        background: #fbecec;
        color: #dc2626;
        cursor: pointer;
    }

    .btn-delete:hover {
        background: #f8dddd;
    }

    .empty-state {
        padding: 55px 20px;
        text-align: center;
        color: #9a9f9f;
    }

    .empty-icon {
        width: 48px;
        height: 48px;

        margin: 0 auto 12px;

        border-radius: 14px;

        background: #f3efe7;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 22px;
    }

    .empty-state-title {
        font-size: 13px;
        font-weight: 600;
        color: #5f6668;
    }

    .empty-state-description {
        margin-top: 5px;
        font-size: 11px;
        color: #92999d;
    }

    .electronics-pagination {
        padding: 16px 20px;
        border-top: 1px solid #e8e1d6;
    }

    @media (max-width: 700px) {

        .electronics-header {
            align-items: stretch;
            flex-direction: column;
        }

        .btn-add-electronic {
            width: 100%;
        }

        .electronics-table th,
        .electronics-table td {
            padding-left: 14px;
            padding-right: 14px;
        }

    }
</style>


<div class="electronics-card">


    {{-- HEADER --}}

    <div class="electronics-header">

        <div>

            <h3>
                Daftar Perangkat
            </h3>

            <p>
                Perangkat yang terdaftar di rumah.
            </p>

        </div>


        @if($house)

            <a href="{{ route('user.electronics.create') }}"
                class="btn-add-electronic">

                <span class="text-base leading-none">
                    +
                </span>

                Tambah Perangkat

            </a>

        @endif

    </div>



    {{-- TABLE --}}

    <div class="electronics-table-wrapper">

        <table class="electronics-table">

            <thead>

                <tr>

                    <th class="text-left">
                        Nama
                    </th>

                    <th class="text-center">
                        Kategori
                    </th>

                    <th class="text-center">
                        Tegangan
                    </th>

                    <th class="text-center">
                        Daya
                    </th>

                    <th class="text-center">
                        Status
                    </th>

                    <th class="text-center">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($electronics as $electronic)


                    <tr>


                        {{-- NAMA --}}

                        <td>

                            <span class="electronic-name">
                                {{ $electronic->name }}
                            </span>

                        </td>



                        {{-- KATEGORI --}}

                        <td class="text-center">

                            <span class="electronic-category">
                                {{ $electronic->category ?? '-' }}
                            </span>

                        </td>



                        {{-- VOLTAGE --}}

                        <td class="text-center">

                            <span class="electronic-value">
                                {{ $electronic->voltage }} V
                            </span>

                        </td>



                        {{-- WATT --}}

                        <td class="text-center">

                            <span class="electronic-value">
                                {{ $electronic->watt }} W
                            </span>

                        </td>



                        {{-- STATUS --}}

                        <td class="text-center">

                            @if($electronic->status === 'active')

                                <span
                                    class="status-badge status-active"
                                >

                                    <span
                                        class="status-dot
                                               status-dot-active"
                                    ></span>

                                    Aktif

                                </span>

                            @else

                                <span
                                    class="status-badge
                                           status-inactive"
                                >

                                    <span
                                        class="status-dot
                                               status-dot-inactive"
                                    ></span>

                                    Tidak Aktif

                                </span>

                            @endif

                        </td>



                        {{-- AKSI --}}

                        <td>

                            <div class="action-wrapper">


                                {{-- DETAIL --}}

                                <a
                                    href="{{ route(
                                        'user.electronics.show',
                                        $electronic
                                    ) }}"
                                    class="btn-action btn-detail"
                                >

                                    Detail

                                </a>



                                {{-- EDIT --}}

                                <a
                                    href="{{ route(
                                        'user.electronics.edit',
                                        $electronic
                                    ) }}"
                                    class="btn-action btn-edit"
                                >

                                    Edit

                                </a>



                                {{-- DELETE --}}

                                <form
                                    method="POST"
                                    action="{{ route(
                                        'user.electronics.destroy',
                                        $electronic
                                    ) }}"
                                >

                                    @csrf
                                    @method('DELETE')


                                    <button
                                        type="submit"
                                        onclick="return confirm(
                                            'Hapus perangkat ini?'
                                        )"
                                        class="btn-action btn-delete"
                                    >

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>


                @empty


                    <tr>

                        <td
                            colspan="6"
                            class="empty-state"
                        >

                            <div class="empty-icon">
                                ⚡
                            </div>


                            <p class="empty-state-title">
                                Belum ada perangkat elektronik.
                            </p>


                            @if($house)

                                <p class="empty-state-description">
                                    Tambahkan perangkat pertama untuk
                                    mulai memantau rumah.
                                </p>

                            @endif

                        </td>

                    </tr>


                @endforelse

            </tbody>

        </table>

    </div>



    {{-- PAGINATION --}}

    @if(method_exists($electronics, 'links'))

        <div class="electronics-pagination">

            {{ $electronics->links() }}

        </div>

    @endif


</div>

@endsection