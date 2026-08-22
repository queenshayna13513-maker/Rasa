@extends('layouts.app')

@section('title', 'Tambah Perangkat')
@section('header', 'Tambah Perangkat')
@section('description', 'Masukkan informasi perangkat elektronik yang ingin dipantau.')

@section('content')

<style>
    .add-electronic-wrapper {
        max-width: 850px;
        margin: 0 auto;
    }

    .add-electronic-card {
        background: #fffdf8;
        border: 1px solid #e5ded2;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(49, 91, 114, 0.06);
    }

    .add-electronic-header {
        padding-bottom: 20px;
        margin-bottom: 25px;
        border-bottom: 1px solid #e8e1d6;
    }

    .add-electronic-header h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
        color: #2f414b;
    }

    .add-electronic-header p {
        margin-top: 6px;
        font-size: 13px;
        color: #7a7d7c;
    }

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
    .form-select {
        width: 100%;
        height: 45px;
        box-sizing: border-box;
        border: 1px solid #d8d1c6;
        border-radius: 11px;
        background: #ffffff;
        color: #37474f;
        font-size: 14px;
        outline: none;
        transition: 0.2s ease;
        padding: 0 14px;
    }

    .form-input::placeholder {
        color: #a1a4a2;
    }

    .form-input:focus,
    .form-select:focus {
        border-color: #315b72;
        box-shadow: 0 0 0 3px rgba(49, 91, 114, 0.10);
    }

    .form-select {
        cursor: pointer;
        appearance: auto;
    }

    .voltage-wrapper,
    .wattage-wrapper {
        position: relative;
    }

    .voltage-wrapper .form-input,
    .wattage-wrapper .form-input {
        padding-right: 45px;
    }

    .input-unit {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 13px;
        color: #8b8e8c;
        pointer-events: none;
    }

    .error-message {
        margin-top: 5px;
        font-size: 12px;
        color: #dc2626;
    }

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

    .btn-cancel {
        background: #f3efe7;
        color: #5f625f;
        border: 1px solid #ddd5c8;
    }

    .btn-cancel:hover {
        background: #e9e2d7;
    }

    .btn-save {
        background: #315b72;
        color: #ffffff;
        border: 1px solid #315b72;
        min-width: 165px;
        box-shadow: 0 3px 8px rgba(49, 91, 114, 0.15);
    }

    .btn-save:hover {
        background: #274b5e;
        border-color: #274b5e;
        transform: translateY(-1px);
        box-shadow: 0 5px 12px rgba(49, 91, 114, 0.20);
    }

    .btn-save:active {
        transform: translateY(0);
    }

    .btn-save svg {
        width: 16px;
        height: 16px;
        margin-right: 8px;
    }

    @media (max-width: 700px) {

        .add-electronic-wrapper {
            max-width: 100%;
        }

        .add-electronic-card {
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


<div class="add-electronic-wrapper">

    <form method="POST"
        action="{{ route('user.electronics.store') }}"
        class="add-electronic-card">

        @csrf


        {{-- HEADER --}}

        <div class="add-electronic-header">

            <h3>
                Informasi Perangkat
            </h3>

            <p>
                Masukkan informasi perangkat elektronik
                yang ingin dipantau oleh sistem RASA.
            </p>

        </div>


        {{-- NAMA PERANGKAT --}}

        <div class="form-group">

            <label
                for="name"
                class="form-label">

                Nama Perangkat

            </label>

            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Contoh: Kulkas"
                class="form-input">

            @error('name')

                <div class="error-message">
                    {{ $message }}
                </div>

            @enderror

        </div>


        {{-- KATEGORI --}}

        <div class="form-group">

            <label
                for="category"
                class="form-label">

                Kategori

            </label>

            <select
                id="category"
                name="category"
                class="form-select">

                <option value="">
                    Pilih kategori
                </option>

                <option value="Dapur">
                    Dapur
                </option>

                <option value="Elektronik">
                    Elektronik
                </option>

                <option value="Penerangan">
                    Penerangan
                </option>

                <option value="Pendingin">
                    Pendingin
                </option>

                <option value="Lainnya">
                    Lainnya
                </option>

            </select>

            @error('category')

                <div class="error-message">
                    {{ $message }}
                </div>

            @enderror

        </div>


        {{-- TEGANGAN + DAYA --}}

        <div class="form-row">


            {{-- TEGANGAN --}}

            <div class="form-group">

                <label
                    for="voltage"
                    class="form-label">

                    Tegangan

                </label>

                <div class="voltage-wrapper">

                    <input
                        id="voltage"
                        type="number"
                        name="voltage"
                        value="{{ old('voltage') }}"
                        placeholder="220"
                        class="form-input">

                    <span class="input-unit">
                        V
                    </span>

                </div>

                @error('voltage')

                    <div class="error-message">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- DAYA --}}

            <div class="form-group">

                <label
                    for="wattage"
                    class="form-label">

                    Daya

                </label>

                <div class="wattage-wrapper">

                    <input
                        id="wattage"
                        type="number"
                        name="watt"
                        value="{{ old('watt') }}"
                        placeholder="100"
                        class="form-input">

                    <span class="input-unit">
                        W
                    </span>

                </div>

                @error('watt')

                    <div class="error-message">
                        {{ $message }}
                    </div>

                @enderror

            </div>

        </div>

        {{-- STATUS PERANGKAT (BARU) --}}

        <div class="form-group">

            <label
                for="status"
                class="form-label">

                Status Perangkat

            </label>

            <select
                id="status"
                name="status"
                class="form-select">

                <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>
                    Aktif
                </option>

                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                    Tidak Aktif
                </option>

            </select>

            @error('status')

                <div class="error-message">
                    {{ $message }}
                </div>

            @enderror

        </div>


        {{-- BUTTON --}}

        <div class="form-actions">

            <a
                href="{{ route('user.electronics.index') }}"
                class="btn-cancel">

                Batal

            </a>


            <button
                type="submit"
                class="btn-save">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 13l4 4L19 7" />

                </svg>

                Simpan Perangkat

            </button>

        </div>

    </form>

</div>

@endsection