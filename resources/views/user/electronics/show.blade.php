@extends('layouts.app')

@section('title', 'Detail Perangkat')
@section('header', 'Detail Perangkat')
@section('description', 'Informasi perangkat elektronik.')

@section('content')

<style>
    .electronic-detail-wrapper {
        max-width: 850px;
        margin: 0 auto;
    }

    .electronic-detail-card {
        background: #fffdf8;
        border: 1px solid #e5ded2;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(49, 91, 114, 0.06);
    }

    .electronic-detail-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding-bottom: 22px;
        margin-bottom: 24px;
        border-bottom: 1px solid #e8e1d6;
    }

    .electronic-detail-title {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
        color: #2f414b;
    }

    .electronic-detail-category {
        margin-top: 6px;
        font-size: 13px;
        color: #7a7d7c;
    }

    /* Wrapper untuk menumpuk badge agar rapi */
    .badge-wrapper {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 8px;
    }

    .registered-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 7px 12px;
        border-radius: 999px;
        background: #eaf4ec;
        color: #15803d;
        border: 1px solid #d5ead9;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    .registered-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #22c55e;
    }

    /* Style baru khusus untuk Status Badge */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 7px 12px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    .status-badge.active {
        background: #e7f0f4;
        color: #0cc0df;
        border: 1px solid #d9e7ed;
    }

    .status-badge.inactive {
        background: #f3f4f6;
        color: #4b5563;
        border: 1px solid #e5e7eb;
    }

    .status-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
    }

    .status-badge.active .status-dot {
        background: #0cc0df;
    }

    .status-badge.inactive .status-dot {
        background: #9ca3af;
    }

    .spec-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .spec-card {
        border-radius: 14px;
        padding: 18px;
        border: 1px solid transparent;
    }

    .voltage-card {
        background: #f3efe7;
        border-color: #e5ded2;
    }

    .watt-card {
        background: #e7f0f4;
        border-color: #d9e7ed;
    }

    .spec-label {
        margin: 0;
        font-size: 12px;
        font-weight: 500;
        color: #7a7d7c;
    }

    .watt-card .spec-label {
        color: #0cc0df;
    }

    .spec-value {
        margin-top: 7px;
        font-size: 22px;
        font-weight: 700;
        color: #2f414b;
    }

    .watt-card .spec-value {
        color: #0cc0df;
    }

    .detail-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 12px;
        margin-top: 28px;
        padding-top: 22px;
        border-top: 1px solid #e8e1d6;
    }

    .detail-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 44px;
        padding: 0 20px;
        border-radius: 11px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .btn-edit {
        background: #e7f0f4;
        color: #0cc0df;
        border: 1px solid #d9e7ed;
    }

    .btn-edit:hover {
        background: #d9e7ed;
        border-color: #c9dce5;
        transform: translateY(-1px);
    }

    .btn-back {
        background: #f3efe7;
        color: #5f625f;
        border: 1px solid #ddd5c8;
    }

    .btn-back:hover {
        background: #e9e2d7;
        transform: translateY(-1px);
    }

    @media (max-width: 650px) {
        .electronic-detail-wrapper {
            max-width: 100%;
        }

        .electronic-detail-card {
            padding: 20px;
        }

        .electronic-detail-header {
            align-items: flex-start;
            flex-direction: column;
        }

        /* Pada mobile, badge akan rata kiri agar sejajar dengan judul */
        .badge-wrapper {
            align-items: flex-start;
            width: 100%;
            flex-direction: row; /* Berdampingan di mobile agar hemat ruang vertikal */
            flex-wrap: wrap;
        }

        .spec-grid {
            grid-template-columns: 1fr;
        }

        .detail-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .detail-btn {
            width: 100%;
        }
    }
</style>


<div class="electronic-detail-wrapper">

    <div class="electronic-detail-card">

        {{-- HEADER --}}
        <div class="electronic-detail-header">

            <div>
                <h3 class="electronic-detail-title">
                    {{ $electronic->name }}
                </h3>

                <p class="electronic-detail-category">
                    {{ $electronic->category }}
                </p>
            </div>

            {{-- WRAPPER BADGE (Terdaftar + Status) --}}
            <div class="badge-wrapper">
                
                {{-- BADGE TERDAFTAR (TETAP DIPERTAHANKAN) --}}
                <span class="registered-badge">
                    <span class="registered-dot"></span>
                    Terdaftar
                </span>

                {{-- BADGE STATUS (BARU) --}}
                @if($electronic->status === 'active')
                    <span class="status-badge active">
                        <span class="status-dot"></span>
                        Aktif
                    </span>
                @else
                    <span class="status-badge inactive">
                        <span class="status-dot"></span>
                        Tidak Aktif
                    </span>
                @endif

            </div>

        </div>


        {{-- SPECIFICATIONS --}}
        <div class="spec-grid">

            {{-- TEGANGAN --}}
            <div class="spec-card voltage-card">
                <p class="spec-label">Tegangan</p>
                <p class="spec-value">{{ $electronic->voltage }} V</p>
            </div>

            {{-- DAYA --}}
            <div class="spec-card watt-card">
                <p class="spec-label">Daya</p>
                <p class="spec-value">{{ $electronic->watt }} W</p>
            </div>

        </div>


        {{-- BUTTON --}}
        <div class="detail-actions">

            <a href="{{ route('user.electronics.edit', $electronic) }}" class="detail-btn btn-edit">
                Edit
            </a>

            <a href="{{ route('user.electronics.index') }}" class="detail-btn btn-back">
                Kembali
            </a>

        </div>

    </div>

</div>

@endsection