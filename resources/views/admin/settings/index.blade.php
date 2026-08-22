@extends('layouts.app')

@section('title', 'Pengaturan')
@section('header', 'Pengaturan Tegangan')
@section('description', 'Atur batas standar tegangan yang digunakan sistem RASA.')

@section('content')

<style>

    /* =========================
       SETTINGS
    ========================= */

    .settings-wrapper {
        max-width: 850px;
        margin: 0 auto;
    }

    .settings-card {
        background: #fffdf8;
        border: 1px solid #e5ded2;
        border-radius: 18px;
        padding: 30px;

        box-shadow:
            0 4px 15px
            rgba(49, 91, 114, 0.06);
    }


    /* =========================
       HEADER
    ========================= */

    .settings-header {
        padding-bottom: 20px;
        margin-bottom: 25px;

        border-bottom: 1px solid #e8e1d6;
    }

    .settings-header h3 {
        margin: 0;

        font-size: 18px;
        font-weight: 700;

        color: #2f414b;
    }

    .settings-header p {
        margin-top: 6px;

        font-size: 13px;

        line-height: 1.5;

        color: #7a7d7c;
    }


    /* =========================
       FORM
    ========================= */

    .settings-group {
        margin-bottom: 22px;
    }

    .settings-label {
        display: block;

        margin-bottom: 8px;

        font-size: 13px;
        font-weight: 600;

        color: #37474f;
    }

    .settings-input {
        width: 100%;
        height: 45px;

        box-sizing: border-box;

        padding: 0 45px 0 14px;

        border: 1px solid #d8d1c6;
        border-radius: 11px;

        background: #ffffff;

        color: #37474f;

        font-size: 14px;

        outline: none;

        transition: 0.2s ease;
    }

    .settings-input:focus {
        border-color: #315b72;

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
       VOLTAGE GRID
    ========================= */

    .voltage-grid {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 18px;
    }


    /* =========================
       NOTE
    ========================= */

    .settings-note {
        margin-top: 5px;

        padding: 16px;

        border-radius: 12px;

        background: #e7f0f4;

        border: 1px solid #d9e7ed;
    }

    .settings-note-title {
        margin: 0;

        font-size: 13px;
        font-weight: 600;

        color: #315b72;
    }

    .settings-note-text {
        margin-top: 5px;

        font-size: 12px;
        line-height: 1.5;

        color: #315b72;
    }


    /* =========================
       ACTION
    ========================= */

    .settings-actions {
        display: flex;

        justify-content: flex-end;

        margin-top: 30px;

        padding-top: 22px;

        border-top: 1px solid #e8e1d6;
    }

    .btn-save-settings {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        height: 44px;

        padding: 0 22px;

        min-width: 170px;

        border-radius: 11px;

        background: #315b72;

        border: 1px solid #315b72;

        color: #ffffff;

        font-size: 13px;
        font-weight: 600;

        cursor: pointer;

        transition: all 0.2s ease;

        box-shadow:
            0 3px 8px
            rgba(49, 91, 114, 0.15);
    }

    .btn-save-settings:hover {
        background: #274b5e;

        border-color: #274b5e;

        transform: translateY(-1px);

        box-shadow:
            0 5px 12px
            rgba(49, 91, 114, 0.20);
    }

    .btn-save-settings:active {
        transform: translateY(0);
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 700px) {

        .settings-wrapper {
            max-width: 100%;
        }

        .settings-card {
            padding: 20px;
        }

        .voltage-grid {
            grid-template-columns: 1fr;

            gap: 0;
        }

        .settings-actions {
            align-items: stretch;
        }

        .btn-save-settings {
            width: 100%;
        }

    }

</style>


<div class="settings-wrapper">

    <form method="POST"
        action="{{ route('admin.settings.update') }}"
        class="settings-card">

        @csrf
        @method('PUT')


        {{-- =========================
            HEADER
        ========================= --}}

        <div class="settings-header">

            <h3>
                Standar Tegangan Global
            </h3>

            <p>
                Nilai ini menjadi acuan awal sebelum pengguna
                memiliki preferensi masing-masing.
            </p>

        </div>



        {{-- =========================
            FORM
        ========================= --}}

        <div>


            {{-- TEGANGAN STANDAR --}}

            <div class="settings-group">

                <label class="settings-label">
                    Tegangan Standar
                </label>

                <div class="voltage-wrapper">

                    <input
                        type="number"
                        name="standard_voltage"
                        value="{{ old('standard_voltage', $settings['standard_voltage']) }}"
                        class="settings-input"
                    >

                    <span class="voltage-unit">
                        V
                    </span>

                </div>

            </div>



            {{-- MINIMUM + MAKSIMUM --}}

            <div class="voltage-grid">


                {{-- MINIMUM --}}

                <div class="settings-group">

                    <label class="settings-label">
                        Batas Minimum
                    </label>

                    <div class="voltage-wrapper">

                        <input
                            type="number"
                            name="minimum_voltage"
                            value="{{ old('minimum_voltage', $settings['minimum_voltage']) }}"
                            class="settings-input"
                        >

                        <span class="voltage-unit">
                            V
                        </span>

                    </div>

                </div>



                {{-- MAKSIMUM --}}

                <div class="settings-group">

                    <label class="settings-label">
                        Batas Maksimum
                    </label>

                    <div class="voltage-wrapper">

                        <input
                            type="number"
                            name="maximum_voltage"
                            value="{{ old('maximum_voltage', $settings['maximum_voltage']) }}"
                            class="settings-input"
                        >

                        <span class="voltage-unit">
                            V
                        </span>

                    </div>

                </div>


            </div>

        </div>



        {{-- =========================
            CATATAN
        ========================= --}}

        <div class="settings-note">

            <p class="settings-note-title">
                Catatan
            </p>

            <p class="settings-note-text">
                Pengaturan global akan menjadi acuan awal
                sistem monitoring RASA.
            </p>

        </div>



        {{-- =========================
            BUTTON
        ========================= --}}

        <div class="settings-actions">

            <button
                type="submit"
                class="btn-save-settings"
            >
                Simpan Pengaturan
            </button>

        </div>


    </form>

</div>

@endsection