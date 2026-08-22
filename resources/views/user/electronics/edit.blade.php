@extends('layouts.app')

@section('title', 'Edit Perangkat')
@section('header', 'Edit Perangkat')
@section('description', 'Perbarui informasi perangkat elektronik.')

@section('content')

<style>
    .edit-electronic-wrapper {
        max-width: 850px;
        margin: 0 auto;
    }

    .edit-electronic-card {
        background: #fffdf8;
        border: 1px solid #e5ded2;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(49, 91, 114, 0.06);
    }

    .edit-electronic-header {
        padding-bottom: 20px;
        margin-bottom: 25px;
        border-bottom: 1px solid #e8e1d6;
    }

    .edit-electronic-header h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
        color: #2f414b;
    }

    .edit-electronic-header p {
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
    }

    .form-input {
        padding: 0 14px;
    }

    .form-select {
        padding: 0 40px 0 14px;
        cursor: pointer;
    }

    .form-input:focus,
    .form-select:focus {
        border-color: #315b72;
        box-shadow: 0 0 0 3px rgba(49, 91, 114, 0.10);
    }

    .input-unit-wrapper {
        position: relative;
    }

    .input-unit-wrapper .form-input {
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
        transform: translateY(-1px);
    }

    .btn-save {
        min-width: 165px;

        background: #315b72;
        color: #ffffff;

        border: 1px solid #315b72;

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

    .btn-save svg {
        width: 16px;
        height: 16px;
        margin-right: 8px;
    }

    @media (max-width: 700px) {

        .edit-electronic-wrapper {
            max-width: 100%;
        }

        .edit-electronic-card {
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


<div class="edit-electronic-wrapper">

    <form method="POST"
        action="{{ route('user.electronics.update', $electronic) }}"
        class="edit-electronic-card">

        @csrf
        @method('PUT')


        {{-- HEADER --}}

        <div class="edit-electronic-header">

            <h3>
                Informasi Perangkat
            </h3>

            <p>
                Perbarui informasi perangkat yang diperlukan.
                Data lama akan tetap tersimpan jika tidak diubah.
            </p>

        </div>


        {{-- NAMA PERANGKAT --}}

        <div class="form-group">

            <label
                for="name"
                class="form-label"
            >
                Nama Perangkat
            </label>

            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name', $electronic->name) }}"
                class="form-input"
            >

        </div>


        {{-- KATEGORI --}}

        <div class="form-group">

            <label
                for="category"
                class="form-label"
            >
                Kategori
            </label>

            <select
                id="category"
                name="category"
                class="form-select"
            >

                @foreach(['Dapur','Elektronik','Penerangan','Pendingin','Lainnya'] as $category)

                    <option
                        value="{{ $category }}"
                        @selected(
                            old(
                                'category',
                                $electronic->category
                            ) === $category
                        )
                    >

                        {{ $category }}

                    </option>

                @endforeach

            </select>

        </div>


        {{-- TEGANGAN + DAYA --}}

        <div class="form-row">


            {{-- TEGANGAN --}}

            <div class="form-group">

                <label
                    for="voltage"
                    class="form-label"
                >
                    Tegangan
                </label>

                <div class="input-unit-wrapper">

                    <input
                        id="voltage"
                        type="number"
                        name="voltage"
                        value="{{ old(
                            'voltage',
                            $electronic->voltage
                        ) }}"
                        class="form-input"
                    >

                    <span class="input-unit">
                        V
                    </span>

                </div>

            </div>


            {{-- DAYA --}}

            <div class="form-group">

                <label
                    for="wattage"
                    class="form-label"
                >
                    Daya
                </label>

                <div class="input-unit-wrapper">

                    <input
                        id="wattage"
                        type="number"
                        name="watt"
                        value="{{ old(
                            'watt',
                            $electronic->watt
                        ) }}"
                        class="form-input"
                    >

                    <span class="input-unit">
                        W
                    </span>

                </div>

            </div>

        </div>

        {{-- STATUS PERANGKAT (BARU) --}}
        <div class="form-group">
            <label for="status" class="form-label">Status Perangkat</label>
            <select id="status" name="status" class="form-select">
                <option value="active" @selected(old('status', $electronic->status) === 'active')>
                    Aktif
                </option>
                <option value="inactive" @selected(old('status', $electronic->status) === 'inactive')>
                    Tidak Aktif
                </option>
            </select>
            @error('status')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>


        {{-- BUTTON --}}

        <div class="form-actions">

            <a
                href="{{ route('user.electronics.index') }}"
                class="btn-cancel"
            >
                Batal
            </a>


            <button
                type="submit"
                class="btn-save"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 13l4 4L19 7"
                    />

                </svg>

                Simpan Perubahan

            </button>

        </div>

    </form>

</div>

@endsection