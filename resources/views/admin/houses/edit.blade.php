@extends('layouts.app')

@section('title', 'Edit Rumah')
@section('header', 'Edit Rumah')
@section('description', 'Perbarui informasi rumah.')

@section('content')

<style>
    .edit-house-wrapper {
        max-width: 850px;
        margin: 0 auto;
    }

    .edit-house-card {
        background: #fffdf8;
        border: 1px solid #e5ded2;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(49, 91, 114, 0.06);
    }

    .edit-house-header {
        padding-bottom: 20px;
        margin-bottom: 25px;
        border-bottom: 1px solid #e8e1d6;
    }

    .edit-house-header h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
        color: #2f414b;
    }

    .edit-house-header p {
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

    .form-input:focus,
    .form-textarea:focus {
        border-color: #315b72;
        box-shadow: 0 0 0 3px rgba(49, 91, 114, 0.10);
    }

    .readonly-input {
        background: #f5f1e9;
        color: #606867;
        cursor: not-allowed;
    }

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
        .edit-house-wrapper {
            max-width: 100%;
        }

        .edit-house-card {
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


<div class="edit-house-wrapper">

    <form method="POST"
        action="{{ route('admin.houses.update', $house) }}"
        class="edit-house-card">

        @csrf
        @method('PUT')


        {{-- HEADER --}}
        <div class="edit-house-header">

            <h3>
                Informasi Rumah
            </h3>

            <p>
                Perbarui informasi yang diperlukan.
                Data lama akan tetap tersimpan jika tidak diubah.
            </p>

        </div>


        

        {{-- PEMILIK + TELEPON --}}
        <div class="form-row">

            {{-- PEMILIK --}}
            <div class="form-group">

                <label class="form-label">
                    Nama Pemilik
                </label>

                <input
                    type="text"
                    value="{{ $house->user?->name ?? '-' }}"
                    class="form-input readonly-input"
                    readonly>

            </div>


            {{-- TELEPON --}}
            <div class="form-group">

                <label for="phone" class="form-label">
                    Nomor Telepon
                </label>

                <input
                    id="phone"
                    type="text"
                    name="phone"
                    value="{{ old('phone', $house->phone ?? '') }}"
                    class="form-input"
                    placeholder="Masukkan nomor telepon">

                @error('phone')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>


        {{-- ALAMAT --}}
        <div class="form-group">

            <label for="address" class="form-label">
                Alamat
            </label>

            <textarea
                id="address"
                name="address"
                rows="4"
                class="form-textarea"
                placeholder="Masukkan alamat rumah">{{ old('address', $house->address ?? '') }}</textarea>

            @error('address')
                <div class="error-message">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- TEGANGAN --}}
        <div class="form-group">

            <label for="standard_voltage" class="form-label">
                Tegangan Standar
            </label>

            <div class="voltage-wrapper">

                <input
                    id="standard_voltage"
                    type="number"
                    name="standard_voltage"
                    value="{{ old('standard_voltage', $house->standard_voltage ?? 220) }}"
                    class="form-input"
                    placeholder="220">

                <span class="voltage-unit">
                    V
                </span>

            </div>

            @error('standard_voltage')
                <div class="error-message">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- BUTTON --}}
        <div class="form-actions">

            <a href="{{ route('admin.houses.show', $house) }}"
                class="btn-cancel">

                Batal

            </a>


            <button type="submit"
                class="btn-save">

                <svg xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 13l4 4L19 7" />

                </svg>

                Simpan Perubahan

            </button>

        </div>

    </form>

</div>

@endsection