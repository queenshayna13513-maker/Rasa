@extends('layouts.app')

@section('title', 'Profil Rumah')
@section('header', 'Profil Rumah')
@section('description', 'Informasi rumah yang dipantau oleh RASA.')

@section('content')

<style>

    /* =========================================================
       RASA HOUSE PROFILE — MINIMAL
    ========================================================= */

    .house-card {
        background: #fffdf8;
        border: 1px solid #e8e2d8;
        border-radius: 14px;
        overflow: hidden;
    }

    .house-header {
        padding: 18px 20px;
        border-bottom: 1px solid #eee9e1;

        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
    }

    .house-header h3 {
        margin: 0;

        font-size: 15px;
        font-weight: 700;

        color: #2f414b;
        letter-spacing: -0.01em;
    }

    .house-header p {
        margin-top: 4px;

        font-size: 11px;
        color: #8a9091;
    }

    .house-icon {
        width: 36px;
        height: 36px;

        border-radius: 10px;

        background: #eef4f6;

        display: flex;
        align-items: center;
        justify-content: center;
    }


    /* =========================================================
       FORM
    ========================================================= */

    .house-body {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group:last-child {
        margin-bottom: 0;
    }

    .form-label {
        display: block;

        margin-bottom: 7px;

        font-size: 12px;
        font-weight: 600;

        color: #45545b;
    }

    .form-input,
    .form-textarea {
        width: 100%;

        border: 1px solid #ddd7cd;
        border-radius: 9px;

        background: #ffffff;

        padding: 10px 12px;

        font-size: 12px;
        color: #37474f;

        outline: none;

        transition: border-color .2s ease,
                    box-shadow .2s ease;
    }

    .form-input {
        height: 40px;
    }

    .form-textarea {
        min-height: 95px;
        resize: vertical;
    }

    .form-input:focus,
    .form-textarea:focus {
        border-color: #315b72;

        box-shadow: 0 0 0 3px rgba(49, 91, 114, .06);
    }


    /* =========================================================
       SAVE
    ========================================================= */

    .form-footer {
        display: flex;
        justify-content: flex-end;

        margin-top: 20px;
        padding-top: 16px;

        border-top: 1px solid #eee9e1;
    }

    .btn-save {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;

        height: 38px;
        padding: 0 15px;

        border: 0;
        border-radius: 9px;

        background: #315b72;
        color: white;

        font-size: 12px;
        font-weight: 600;

        cursor: pointer;

        transition: all .2s ease;
    }

    .btn-save:hover {
        background: #274b5e;
    }


    /* =========================================================
       SIDE CARDS
    ========================================================= */

    .info-card {
        background: #fffdf8;

        border: 1px solid #e8e2d8;
        border-radius: 14px;

        overflow: hidden;
    }

    .info-header {
        padding: 15px 18px;

        border-bottom: 1px solid #eee9e1;
    }

    .info-header h4 {
        margin: 0;

        font-size: 13px;
        font-weight: 700;

        color: #2f414b;
    }

    .info-body {
        padding: 18px;
    }


    /* =========================================================
       STATUS
    ========================================================= */

    .status-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .status-left {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .status-icon {
        width: 34px;
        height: 34px;

        border-radius: 9px;

        background: #eef7f0;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .status-label {
        font-size: 10px;
        color: #92999d;
    }

    .status-value {
        margin-top: 2px;

        font-size: 12px;
        font-weight: 700;

        color: #15803d;
    }

    .status-active {
        display: inline-flex;
        align-items: center;
        gap: 5px;

        font-size: 10px;
        font-weight: 600;

        color: #15803d;
    }

    .status-dot {
        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: #22c55e;
    }


    /* =========================================================
       STAT
    ========================================================= */

    .stat-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .stat-label {
        font-size: 10px;
        color: #92999d;
    }

    .stat-value {
        margin-top: 4px;

        font-size: 25px;
        line-height: 1;

        font-weight: 700;

        color: #315b72;
        letter-spacing: -0.03em;
    }

    .stat-unit {
        font-size: 11px;
        font-weight: 500;

        color: #8a9091;
    }

    .stat-icon {
        width: 36px;
        height: 36px;

        border-radius: 9px;

        background: #eef4f6;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .info-note {
        margin-top: 13px;

        padding-top: 12px;

        border-top: 1px solid #eee9e1;

        font-size: 10px;
        line-height: 1.5;

        color: #92999d;
    }


    /* =========================================================
       EMPTY
    ========================================================= */

    .empty-state {
        padding: 55px 20px;

        text-align: center;
    }

    .empty-icon {
        width: 46px;
        height: 46px;

        margin: 0 auto 12px;

        border-radius: 12px;

        background: #f3efe7;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .empty-title {
        font-size: 12px;
        font-weight: 600;

        color: #5f6668;
    }

    .empty-description {
        margin-top: 4px;

        font-size: 10px;

        color: #92999d;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 700px) {

        .house-header {
            padding: 16px;
        }

        .house-body {
            padding: 16px;
        }

        .form-footer {
            justify-content: stretch;
        }

        .btn-save {
            width: 100%;
        }

    }

</style>

@if($house)

<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

```
{{-- =====================================================
    INFORMASI RUMAH
====================================================== --}}

<div class="lg:col-span-2">

    <div class="house-card">

        {{-- HEADER --}}

        <div class="house-header">

            <div>

                <h3>
                    Informasi Rumah
                </h3>

                <p>
                    Data rumah yang terhubung dengan akun Anda.
                </p>

            </div>

            <div class="house-icon">

                <i
                    data-lucide="house"
                    class="w-4 h-4 text-[#315b72]"
                ></i>

            </div>

        </div>


        {{-- BODY --}}

        <div class="house-body">

            <form
                method="POST"
                action="{{ route('user.profile.update') }}"
            >

                @csrf
                @method('PUT')


                {{-- ALAMAT --}}

                <div class="form-group">

                    <label class="form-label">
                        Alamat
                    </label>

                    <textarea
                        name="address"
                        rows="4"
                        class="form-textarea"
                    >{{ old('address', $house->address) }}</textarea>

                </div>


                {{-- CATATAN TAMBAHAN --}}

                <div class="form-group">

                    <label class="form-label">
                        Catatan Tambahan
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $house->name) }}"
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
                        value="{{ old('phone', $house->phone) }}"
                        class="form-input"
                    >

                </div>


                {{-- BUTTON --}}

                <div class="form-footer">

                    <button
                        type="submit"
                        class="btn-save"
                    >

                        <i
                            data-lucide="save"
                            class="w-3.5 h-3.5"
                        ></i>

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>



{{-- =====================================================
    INFORMASI STATUS
====================================================== --}}

<div class="space-y-5">


    {{-- STATUS RUMAH --}}

    <div class="info-card">

        <div class="info-header">

            <h4>
                Status Rumah
            </h4>

        </div>

        <div class="info-body">

            <div class="status-row">

                <div class="status-left">

                    <div class="status-icon">

                        <i
                            data-lucide="shield-check"
                            class="w-4 h-4 text-green-600"
                        ></i>

                    </div>

                    <div>

                        <p class="status-label">
                            Kondisi sistem
                        </p>

                        <p class="status-value">
                            Aktif
                        </p>

                    </div>

                </div>


                <span class="status-active">

                    <span class="status-dot"></span>

                    Aktif

                </span>

            </div>

        </div>

    </div>



    {{-- TEGANGAN STANDAR --}}

    <div class="info-card">

        <div class="info-header">

            <h4>
                Tegangan Standar
            </h4>

        </div>

        <div class="info-body">

            <div class="stat-row">

                <div>

                    <p class="stat-label">
                        Standar tegangan rumah
                    </p>

                    <p class="stat-value">

                        {{ $house->standard_voltage }}

                        <span class="stat-unit">
                            V
                        </span>

                    </p>

                </div>


                <div class="stat-icon">

                    <i
                        data-lucide="zap"
                        class="w-4 h-4 text-[#315b72]"
                    ></i>

                </div>

            </div>

        </div>

    </div>



    {{-- PENGGUNAAN BULAN INI --}}

    <div class="info-card">

        <div class="info-header">

            <h4>
                Penggunaan Bulan Ini
            </h4>

        </div>

        <div class="info-body">

            <div class="stat-row">

                <div>

                    <p class="stat-label">
                        Total penggunaan
                    </p>

                    <p class="stat-value">

                        0

                        <span class="stat-unit">
                            kWh
                        </span>

                    </p>

                </div>


                <div class="stat-icon">

                    <i
                        data-lucide="gauge"
                        class="w-4 h-4 text-[#315b72]"
                    ></i>

                </div>

            </div>


            <div class="info-note">

                Data akan terisi ketika hardware
                terhubung.

            </div>

        </div>

    </div>

</div>
```

</div>

@else

{{-- =========================================================
EMPTY STATE
========================================================= --}}

<div class="house-card">

```
<div class="house-header">

    <div>

        <h3>
            Profil Rumah
        </h3>

        <p>
            Informasi rumah yang terhubung dengan akun Anda.
        </p>

    </div>


    <div class="house-icon">

        <i
            data-lucide="house"
            class="w-4 h-4 text-[#315b72]"
        ></i>

    </div>

</div>


<div class="empty-state">

    <div class="empty-icon">

        <i
            data-lucide="house"
            class="w-5 h-5 text-[#315b72]"
        ></i>

    </div>


    <p class="empty-title">
        Belum Ada Data Rumah
    </p>


    <p class="empty-description">
        Belum ada data rumah yang terhubung
        dengan akun Anda.
    </p>

</div>
```

</div>

@endif

@endsection
