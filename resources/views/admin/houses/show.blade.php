@extends('layouts.app')

@section('title', 'Detail Rumah')
@section('header', 'Detail Rumah')
@section('description', 'Informasi rumah dan perangkat yang terhubung.')

@section('content')

<style>

    /* =========================
       DETAIL HOUSE
    ========================= */

    .detail-house-grid {
        display: grid;

        grid-template-columns:
            minmax(0, 2fr)
            minmax(280px, 1fr);

        gap: 20px;
    }


    .detail-house-card {
        background: #fffdf8;

        border: 1px solid #e5ded2;
        border-radius: 18px;

        padding: 30px;

        box-shadow:
            0 4px 15px
            rgba(49, 91, 114, 0.06);
    }


    /* =========================
       CARD HEADER
    ========================= */

    .detail-card-header {
        padding-bottom: 20px;

        margin-bottom: 25px;

        border-bottom: 1px solid #e8e1d6;
    }

    .detail-card-header h3 {
        margin: 0;

        font-size: 18px;
        font-weight: 700;

        color: #2f414b;
    }

    .detail-card-header p {
        margin-top: 6px;

        font-size: 13px;

        color: #7a7d7c;
    }


    /* =========================
       HOUSE INFORMATION
    ========================= */

    .house-information {
        display: flex;

        flex-direction: column;
    }

    .information-row {
        display: flex;

        align-items: center;
        justify-content: space-between;

        gap: 25px;

        padding: 15px 0;

        border-bottom: 1px solid #eee8dd;
    }

    .information-row:first-child {
        padding-top: 0;
    }

    .information-row:last-child {
        border-bottom: none;

        padding-bottom: 0;
    }

    .information-label {
        font-size: 13px;

        color: #7a7d7c;
    }

    .information-value {
        font-size: 14px;
        font-weight: 500;

        color: #37474f;

        text-align: right;
    }


    /* ADDRESS */

    .information-address {
        padding: 15px 0;

        border-bottom: 1px solid #eee8dd;
    }

    .information-address-label {
        margin-bottom: 7px;

        font-size: 13px;

        color: #7a7d7c;
    }

    .information-address-value {
        margin: 0;

        font-size: 14px;
        line-height: 1.6;

        color: #37474f;
    }


    /* VOLTAGE */

    .voltage-value {
        font-weight: 700;

        color: #315b72;
    }


    /* =========================
       STATUS
    ========================= */

    .status-card {
        display: flex;

        flex-direction: column;
    }

    .status-content {
        text-align: center;

        padding: 10px 0 5px;
    }

    .status-icon {
        width: 58px;
        height: 58px;

        margin: 0 auto;

        border-radius: 50%;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .status-icon-active {
        background: #edf7f0;

        color: #397052;
    }

    .status-icon-blocked {
        background: #fdf0ef;

        color: #b34a43;
    }

    .status-icon svg {
        width: 25px;
        height: 25px;
    }

    .status-active-text {
        margin-top: 12px;

        font-size: 14px;
        font-weight: 700;

        color: #397052;
    }

    .status-blocked-text {
        margin-top: 12px;

        font-size: 14px;
        font-weight: 700;

        color: #b34a43;
    }


    /* =========================
       BUTTONS
    ========================= */

    .detail-actions {
        display: flex;

        gap: 10px;

        margin-top: 25px;

        padding-top: 20px;

        border-top: 1px solid #e8e1d6;
    }

    .detail-button {
        flex: 1;

        height: 42px;

        display: inline-flex;

        align-items: center;
        justify-content: center;

        border-radius: 11px;

        font-size: 13px;
        font-weight: 600;

        text-decoration: none;

        transition: all 0.2s ease;
    }


    /* EDIT */

    .btn-edit {
        background: #e7f0f4;

        color: #315b72;

        border: 1px solid #d9e7ed;
    }

    .btn-edit:hover {
        background: #d9e7ed;
    }


    /* BACK */

    .btn-back {
        background: #f3efe7;

        color: #5f625f;

        border: 1px solid #ddd5c8;
    }

    .btn-back:hover {
        background: #e9e2d7;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 850px) {

        .detail-house-grid {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 600px) {

        .detail-house-card {
            padding: 20px;
        }

        .information-row {
            align-items: flex-start;

            flex-direction: column;

            gap: 5px;
        }

        .information-value {
            text-align: left;
        }

        .detail-actions {
            flex-direction: column;
        }

        .detail-button {
            width: 100%;
        }

    }

</style>


<div class="detail-house-grid">


    {{-- =========================
        INFORMASI RUMAH
    ========================= --}}

    <div class="detail-house-card">

        <div class="detail-card-header">

            <h3>
                Informasi Rumah
            </h3>

            <p>
                Informasi lengkap rumah yang terhubung dengan sistem RASA.
            </p>

        </div>


        <div class="house-information">


            {{-- PEMILIK --}}

            <div class="information-row">

                <span class="information-label">
                    Pemilik
                </span>

                <span class="information-value">
                    {{ $house->user->name }}
                </span>

            </div>


            {{-- ALAMAT --}}

            <div class="information-address">

                <p class="information-address-label">
                    Alamat
                </p>

                <p class="information-address-value">
                    {{ $house->address }}
                </p>

            </div>


            {{-- TELEPON --}}

            <div class="information-row">

                <span class="information-label">
                    Telepon
                </span>

                <span class="information-value">
                    {{ $house->phone ?? '-' }}
                </span>

            </div>


            {{-- TEGANGAN --}}

            <div class="information-row">

                <span class="information-label">
                    Tegangan Standar
                </span>

                <span class="information-value voltage-value">
                    {{ $house->standard_voltage }} V
                </span>

            </div>


        </div>

    </div>



    {{-- =========================
        STATUS
    ========================= --}}

    <div class="detail-house-card status-card">

        <div class="detail-card-header">

            <h3>
                Status
            </h3>

            <p>
                Status koneksi rumah pada sistem RASA.
            </p>

        </div>


        <div class="status-content">


            @if($house->status === 'active')


                <div class="status-icon status-icon-active">

                    <i data-lucide="check"></i>

                </div>


                <p class="status-active-text">
                    Aktif
                </p>


            @else


                <div class="status-icon status-icon-blocked">

                    <i data-lucide="alert-triangle"></i>

                </div>


                <p class="status-blocked-text">
                    Diblokir
                </p>


            @endif


        </div>


        {{-- BUTTON --}}

        <div class="detail-actions">


            <a
                href="{{ route('admin.houses.edit', $house) }}"
                class="detail-button btn-edit"
            >
                Edit
            </a>


            <a
                href="{{ route('admin.houses.index') }}"
                class="detail-button btn-back"
            >
                Kembali
            </a>


        </div>

    </div>


</div>

@endsection