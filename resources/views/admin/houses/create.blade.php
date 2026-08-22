@extends('layouts.app')

@section('title', 'Tambah Rumah')
@section('header', 'Tambah Rumah')
@section('description', 'Tambahkan rumah baru ke dalam sistem RASA.')

@section('content')

<style>

    /* =========================
       ADD HOUSE
    ========================= */

    .add-house-wrapper {
        max-width: 850px;
        margin: 0 auto;
    }

    .add-house-card {
        background: #fffdf8;
        border: 1px solid #e5ded2;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(49, 91, 114, 0.06);
    }


    /* =========================
       FORM HEADER
    ========================= */

    .add-house-header {
        padding-bottom: 20px;
        margin-bottom: 25px;
        border-bottom: 1px solid #e8e1d6;
    }

    .add-house-header h3 {
        margin: 0;

        font-size: 18px;
        font-weight: 700;

        color: #2f414b;
    }

    .add-house-header p {
        margin-top: 6px;

        font-size: 13px;

        color: #7a7d7c;
    }


    /* =========================
       FORM
    ========================= */

    .form-group {
        margin-bottom: 22px;
    }

    .form-row {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 18px;
    }

    .form-label {
        display: block;

        margin-bottom: 8px;

        font-size: 13px;
        font-weight: 600;

        color: #37474f;
    }

    .form-input,
    .form-textarea {
        width: 100%;
        box-sizing: border-box;

        border: 1px solid #d8d1c6;
        border-radius: 11px;

        background: #ffffff;

        color: #37474f;

        font-size: 14px;

        outline: none;

        transition: 0.2s ease;
    }

    .form-input {
        height: 45px;

        padding: 0 14px;
    }

    .form-textarea {
        padding: 12px 14px;

        resize: vertical;

        min-height: 100px;
    }

    .form-input::placeholder,
    .form-textarea::placeholder {
        color: #a0a3a2;
    }

    .form-input:focus,
    .form-textarea:focus {
        border-color: #0cc0df;

        box-shadow:
            0 0 0 3px
            rgba(49, 91, 114, 0.10);
    }


    /* =========================
       VOLTAGE
    ========================= */

    .voltage-wrapper {
        position: relative;
    }

    .voltage-wrapper .form-input {
        padding-right: 45px;
    }

    .voltage-unit {
        position: absolute;

        right: 15px;
        top: 50%;

        transform: translateY(-50%);

        font-size: 13px;

        color: #8b8e8c;

        pointer-events: none;
    }


    /* =========================
       ERROR
    ========================= */

    .error-message {
        margin-top: 5px;

        font-size: 12px;

        color: #dc2626;
    }


    /* =========================
       ACTION BUTTON
    ========================= */

    .form-actions {
        display: flex;

        justify-content: flex-end;
        align-items: center;

        gap: 12px;

        margin-top: 30px;

        padding-top: 22px;

        border-top: 1px solid #e8e1d6;
    }

    .btn-cancel,
    .btn-save {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        height: 44px;

        padding: 0 22px;

        border-radius: 11px;

        font-size: 13px;
        font-weight: 600;

        text-decoration: none;

        cursor: pointer;

        transition: all 0.2s ease;

        box-sizing: border-box;
    }


    /* CANCEL */

    .btn-cancel {
        background: #f3efe7;

        color: #5f625f;

        border: 1px solid #ddd5c8;
    }

    .btn-cancel:hover {
        background: #e9e2d7;
    }


    /* SAVE */

    .btn-save {
        background: #0cc0df;

        color: #ffffff;

        border: 1px solid #0cc0df;

        min-width: 145px;

        box-shadow:
            0 3px 8px
            rgba(49, 91, 114, 0.15);
    }

    .btn-save:hover {
        background: #274b5e;

        border-color: #274b5e;

        transform: translateY(-1px);

        box-shadow:
            0 5px 12px
            rgba(49, 91, 114, 0.20);
    }

    .btn-save:active {
        transform: translateY(0);
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 700px) {

        .add-house-wrapper {
            max-width: 100%;
        }

        .add-house-card {
            padding: 20px;
        }

        .form-row {
            grid-template-columns: 1fr;

            gap: 0;
        }

        .form-actions {
            flex-direction: column-reverse;

            align-items: stretch;
        }

        .btn-cancel,
        .btn-save {
            width: 100%;
        }

    }

</style>


<div class="add-house-wrapper">

    <form method="POST"
        action="{{ route('admin.houses.store') }}"
        class="add-house-card">

        @csrf


        {{-- =========================
            HEADER
        ========================= --}}

        <div class="add-house-header">

            <h3>
                Informasi Rumah
            </h3>

            <p>
                Masukkan informasi rumah yang akan
                terhubung dengan sistem RASA.
            </p>

        </div>



        {{-- =========================
            FORM
        ========================= --}}

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


            



            {{-- NAMA PEMILIK --}}

            <div class="form-group">

                <label class="form-label">
                    Nama Pemilik
                </label>

                <input
                    type="text"
                    name="owner_name"
                    value="{{ old('owner_name') }}"
                    placeholder="Nama pemilik rumah"
                    class="form-input"
                >

            </div>



            {{-- NOMOR TELEPON --}}

            <div class="form-group">

                <label class="form-label">
                    Nomor Telepon
                </label>

                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone') }}"
                    placeholder="08xxxxxxxxxx"
                    class="form-input"
                >

            </div>



            {{-- ALAMAT --}}

            <div class="md:col-span-2 form-group">

                <label class="form-label">
                    Alamat
                </label>

                <textarea
                    name="address"
                    rows="3"
                    class="form-textarea"
                    placeholder="Alamat lengkap rumah"
                >{{ old('address') }}</textarea>

            </div>



            {{-- TEGANGAN --}}

            <div class="form-group">

                <label class="form-label">
                    Tegangan Standar
                </label>

                <div class="voltage-wrapper">

                    <input
                        type="number"
                        name="standard_voltage"
                        value="{{ old('standard_voltage', 220) }}"
                        class="form-input"
                    >

                    <span class="voltage-unit">
                        V
                    </span>

                </div>

            </div>


        </div>



        {{-- =========================
            BUTTON
        ========================= --}}

        <div class="form-actions">

            <a
                href="{{ route('admin.houses.index') }}"
                class="btn-cancel"
            >
                Batal
            </a>


            <button
                type="submit"
                class="btn-save"
            >
                Simpan Rumah
            </button>

        </div>


    </form>

</div>

@endsection