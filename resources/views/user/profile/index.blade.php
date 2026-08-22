@extends('layouts.app')

@section('title', 'Profil Rumah')
@section('header', 'Profil Rumah')
@section('description', 'Informasi rumah dan lansia yang dipantau oleh RASA.')

@section('content')

<style>
    /* =========================================================
       RASA HOUSE PROFILE
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
        flex-shrink: 0;
    }

    /* =========================================================
       FORM
    ========================================================= */
    .house-body { padding: 20px; }
    .form-group { margin-bottom: 18px; }
    .form-label {
        display: block;
        margin-bottom: 7px;
        font-size: 12px;
        font-weight: 600;
        color: #45545b;
    }

    .form-input, .form-textarea {
        width: 100%;
        border: 1px solid #ddd7cd;
        border-radius: 9px;
        background: #ffffff;
        padding: 10px 12px;
        font-size: 12px;
        color: #37474f;
        outline: none;
        transition: border-color .2s ease, box-shadow .2s ease;
        box-sizing: border-box;
    }

    .form-input { height: 40px; }
    .form-textarea { min-height: 95px; resize: vertical; }

    .form-input:focus, .form-textarea:focus {
        border-color: #0cc0df;
        box-shadow: 0 0 0 3px rgba(49, 91, 114, .06);
    }

    .form-input.error, .form-textarea.error {
        border-color: #ef4444;
        background-color: #fef2f2;
    }
    .form-input.error:focus, .form-textarea.error:focus {
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }

    .error-message {
        margin-top: 6px;
        font-size: 11px;
        color: #dc2626;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    /* =========================================================
       BUTTONS & ALERTS
    ========================================================= */
    .form-footer {
        display: flex;
        justify-content: flex-end;
        margin-top: 24px;
        padding-top: 16px;
        border-top: 1px solid #eee9e1;
    }

    .btn-save {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        height: 38px;
        padding: 0 18px;
        border: 0;
        border-radius: 9px;
        background: #0cc0df;
        color: white;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all .2s ease;
    }
    .btn-save:hover {
        background: #274b5e;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(49, 91, 114, 0.15);
    }

    

    /* =========================================================
       SIDE CARDS (STATUS & STATS)
    ========================================================= */
    .info-card {
        background: #fffdf8;
        border: 1px solid #e8e2d8;
        border-radius: 14px;
        overflow: hidden;
        margin-bottom: 20px;
    }
    .info-card:last-child { margin-bottom: 0; }

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
    .info-body { padding: 18px; }

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
    .status-label { font-size: 10px; color: #92999d; }
    .status-value { margin-top: 2px; font-size: 12px; font-weight: 700; color: #15803d; }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 10px;
        border-radius: 99px;
        font-size: 10px;
        font-weight: 600;
    }
    .status-badge.active { background: #eaf4ec; color: #15803d; border: 1px solid #d5ead9; }
    .status-badge.blocked { background: #fef2f2; color: #b91c1c; border: 1px solid #fecaca; }
    
    .status-dot { width: 6px; height: 6px; border-radius: 50%; }
    .status-badge.active .status-dot { background: #22c55e; }
    .status-badge.blocked .status-dot { background: #ef4444; }

    .stat-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .stat-label { font-size: 10px; color: #92999d; }
    .stat-value {
        margin-top: 4px;
        font-size: 25px;
        line-height: 1;
        font-weight: 700;
        color: #0cc0df;
        letter-spacing: -0.03em;
    }
    .stat-unit { font-size: 11px; font-weight: 500; color: #8a9091; }
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
       EMPTY STATE
    ========================================================= */
    .empty-state { padding: 55px 20px; text-align: center; }
    .empty-icon {
        width: 46px; height: 46px; margin: 0 auto 12px;
        border-radius: 12px; background: #f3efe7;
        display: flex; align-items: center; justify-content: center;
    }
    .empty-title { font-size: 13px; font-weight: 600; color: #5f6668; }
    .empty-description {
        margin-top: 6px; font-size: 11px; color: #92999d;
        max-width: 280px; margin-left: auto; margin-right: auto; line-height: 1.5;
    }
    .empty-action { margin-top: 20px; }

    @media (max-width: 700px) {
        .house-header, .house-body { padding: 16px; }
        .form-footer { justify-content: stretch; }
        .btn-save { width: 100%; }
    }
</style>

{{-- NOTIFIKASI SUKSES --}}


@if($house)

<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

    {{-- =====================================================
        FORM PROFIL RUMAH
    ====================================================== --}}
    <div class="lg:col-span-2">
        <div class="house-card">
            <div class="house-header">
                <div>
                    <h3>Informasi Rumah & Penghuni</h3>
                    <p>Data rumah yang terhubung dengan akun Anda.</p>
                </div>
                <div class="house-icon">
                    <!-- Icon House -->
                    <svg class="w-4 h-4 text-[#0cc0df]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>
            </div>

            <div class="house-body">
                <form method="POST" action="{{ route('user.profile.update') }}">
                    @csrf
                    @method('PUT')

                    {{-- NAMA LANSIA --}}
                    <div class="form-group">
                        <label class="form-label" for="elderly_name">Nama Lansia / Penghuni</label>
                        <input 
                            type="text" 
                            id="elderly_name"
                            name="elderly_name" 
                            value="{{ old('elderly_name', $house->elderly_name) }}" 
                            placeholder="Contoh: Bapak Sutrisno"
                            class="form-input @error('elderly_name') error @enderror"
                        >
                        @error('elderly_name')
                            <div class="error-message">
                                <!-- Icon Alert Circle -->
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- ALAMAT --}}
                    <div class="form-group">
                        <label class="form-label" for="address">Alamat Lengkap</label>
                        <textarea 
                            id="address"
                            name="address" 
                            rows="3" 
                            placeholder="Masukkan alamat lengkap rumah..."
                            class="form-textarea @error('address') error @enderror"
                        >{{ old('address', $house->address) }}</textarea>
                        @error('address')
                            <div class="error-message">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- NOMOR TELEPON --}}
                    <div class="form-group">
                        <label class="form-label" for="phone">Nomor Telepon / WhatsApp</label>
                        <input 
                            type="text" 
                            id="phone"
                            name="phone" 
                            value="{{ old('phone', $house->phone) }}" 
                            placeholder="Contoh: 081234567890"
                            class="form-input @error('phone') error @enderror"
                        >
                        @error('phone')
                            <div class="error-message">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn-save">
                            <!-- Icon Save -->
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- =====================================================
        SIDEBAR: STATUS & INFO
    ====================================================== --}}
    <div class="space-y-5">

        {{-- STATUS SISTEM --}}
        <div class="info-card">
            <div class="info-header">
                <h4>Status Akun Rumah</h4>
            </div>
            <div class="info-body">
                <div class="status-row">
                    <div class="status-left">
                        <div class="status-icon">
                            @if($house->status === 'active')
                                <!-- Icon Shield Check -->
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            @else
                                <!-- Icon Shield Alert -->
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            @endif
                        </div>
                        <div>
                            <p class="status-label">Kondisi Saat Ini</p>
                            <p class="status-value" style="color: {{ $house->status === 'active' ? '#15803d' : '#b91c1c' }}">
                                {{ $house->status === 'active' ? 'Berjalan Normal' : 'Diblokir Sementara' }}
                            </p>
                        </div>
                    </div>
                    
                    @if($house->status === 'active')
                        <span class="status-badge active">
                            <span class="status-dot"></span> Aktif
                        </span>
                    @else
                        <span class="status-badge blocked">
                            <span class="status-dot"></span> Blocked
                        </span>
                    @endif
                </div>
            </div>
        </div>

        {{-- TEGANGAN STANDAR --}}
        <div class="info-card">
            <div class="info-header">
                <h4>Tegangan Standar</h4>
            </div>
            <div class="info-body">
                <div class="stat-row">
                    <div>
                        <p class="stat-label">Batas aman tegangan</p>
                        <p class="stat-value">
                            {{ number_format($house->nominal_voltage, 0) }}
                            <span class="stat-unit">V</span>
                        </p>
                    </div>
                    <div class="stat-icon">
                        <!-- Icon Zap -->
                        <svg class="w-4 h-4 text-[#0cc0df]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- PENGGUNAAN BULAN INI --}}
        <div class="info-card">
            <div class="info-header">
                <h4>Penggunaan Bulan Ini</h4>
            </div>
            <div class="info-body">
                <div class="stat-row">
                    <div>
                        <p class="stat-label">Total estimasi</p>
                        <p class="stat-value">
                            {{ $monthlyPower ?? 0 }}
                            <span class="stat-unit">kWh</span>
                        </p>
                    </div>
                    <div class="stat-icon">
                        <!-- Icon Gauge -->
                        <svg class="w-4 h-4 text-[#0cc0df]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="info-note">
                    Data penggunaan akan terisi otomatis ketika perangkat hardware RASA terhubung.
                </div>
            </div>
        </div>

    </div>
</div>

@else

{{-- =========================================================
    EMPTY STATE
========================================================= --}}
<div class="house-card">
    <div class="house-header">
        <div>
            <h3>Profil Rumah</h3>
            <p>Informasi rumah yang terhubung dengan akun Anda.</p>
        </div>
        <div class="house-icon">
            <svg class="w-4 h-4 text-[#0cc0df]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
        </div>
    </div>

    <div class="empty-state">
        <div class="empty-icon">
            <svg class="w-6 h-6 text-[#0cc0df]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
        </div>
        <p class="empty-title">Belum Ada Data Rumah</p>
        <p class="empty-description">
            Anda belum mengatur profil rumah. Silakan tambahkan data rumah agar sistem RASA dapat mulai memantau keamanan lansia.
        </p>
        
        <div class="empty-action">
            <a href="{{ route('user.profile.create') }}" class="btn-save">
                <!-- Icon Plus -->
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Profil Rumah
            </a>
        </div>
    </div>
</div>

@endif

@endsection