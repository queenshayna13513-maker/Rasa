@extends('layouts.app')

@section('title', 'Detail Peringatan')
@section('header', 'Detail Peringatan')
@section('description', 'Informasi lengkap mengenai peringatan listrik.')

@section('content')

<style>
    .rasa-alert-detail-card {
        background: #FFFDF8;
        border: 1px solid #EEE8DD;
        border-radius: 16px;
        box-shadow: 0 4px 14px rgba(49, 91, 114, 0.055);
    }

    .rasa-alert-detail-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .rasa-alert-detail-title {
        font-size: 17px;
        font-weight: 600;
        color: #263F4D;
        line-height: 1.4;
    }

    .rasa-alert-detail-time {
        font-size: 10px;
        color: #9AA0A4;
        margin-top: 4px;
    }

    .rasa-alert-message-box {
        margin-top: 24px;
        padding: 17px;
        border-radius: 13px;
        background: #F3EFE7;
        border: 1px solid #EEE8DD;
    }

    .rasa-alert-message {
        font-size: 12px;
        line-height: 1.7;
        color: #4B575D;
    }

    .rasa-alert-info {
        margin-top: 20px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    .rasa-alert-info-item {
        padding: 14px;
        border-radius: 12px;
        background: #FAF7F1;
        border: 1px solid #EEE8DD;
    }

    .rasa-alert-info-label {
        font-size: 10px;
        color: #8B9296;
    }

    .rasa-alert-info-value {
        font-size: 12px;
        font-weight: 600;
        color: #34444D;
        margin-top: 5px;
    }

    .rasa-alert-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 10px;
        margin-top: 24px;
        padding-top: 20px;
        border-top: 1px solid #EEE8DD;
    }

    .rasa-btn {
        height: 40px;
        padding: 0 16px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: all .2s ease;
        border: none;
    }

    .rasa-btn-primary {
        background: #0cc0df;
        color: #FFFFFF;
        box-shadow: 0 3px 8px rgba(49, 91, 114, 0.12);
    }

    .rasa-btn-primary:hover {
        background: #274B5E;
        transform: translateY(-1px);
        box-shadow: 0 5px 12px rgba(49, 91, 114, 0.17);
    }

    .rasa-btn-secondary {
        background: #F3EFE7;
        color: #5F686D;
        border: 1px solid #DDD6CA;
    }

    .rasa-btn-secondary:hover {
        background: #EAE4DA;
        color: #34444D;
    }

    @media (max-width: 640px) {

        .rasa-alert-info {
            grid-template-columns: 1fr;
        }

        .rasa-alert-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .rasa-btn {
            width: 100%;
        }
    }
</style>


<div class="max-w-2xl">

    <div class="rasa-alert-detail-card p-6">

        {{-- HEADER --}}
        <div class="flex items-start gap-4">

            <div class="rasa-alert-detail-icon bg-[#FFF4E5] text-[#C47A1B]">

                <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M12 9v4m0 4h.01M10.3 4.6L2.7 18a2 2 0 001.7 3h15.2a2 2 0 001.7-3L13.7 4.6a2 2 0 00-3.4 0z"/>

                </svg>

            </div>


            <div class="min-w-0">

                <h3 class="rasa-alert-detail-title">
                    {{ $alert->title ?? 'Peringatan Sistem' }}
                </h3>

                <p class="rasa-alert-detail-time">
                    {{ $alert->created_at }}
                </p>

            </div>

        </div>


        {{-- MESSAGE --}}
        <div class="rasa-alert-message-box">

            <p class="rasa-alert-message">
                {{ $alert->message ?? 'Tidak ada detail peringatan.' }}
            </p>

        </div>


        {{-- INFORMATION --}}
        <div class="rasa-alert-info">

            {{-- TINGKAT --}}
            <div class="rasa-alert-info-item">

                <p class="rasa-alert-info-label">
                    Tingkat
                </p>

                <p class="rasa-alert-info-value capitalize">

                    {{ $alert->severity ?? 'Informasi' }}

                </p>

            </div>


            {{-- STATUS --}}
            <div class="rasa-alert-info-item">

                <p class="rasa-alert-info-label">
                    Status
                </p>

                <p class="rasa-alert-info-value">

                    {{ !empty($alert->is_read) ? 'Sudah dibaca' : 'Belum dibaca' }}

                </p>

            </div>

        </div>


        {{-- ACTIONS --}}
        <div class="rasa-alert-actions">

            @if(empty($alert->is_read))

                <form method="POST"
                    action="{{ route('user.alerts.read', $alert) }}">

                    @csrf

                    <button
                        class="rasa-btn rasa-btn-primary">

                        <svg
                            class="w-4 h-4 mr-2"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M5 13l4 4L19 7"/>

                        </svg>

                        Tandai Dibaca

                    </button>

                </form>

            @endif


            <a href="{{ route('user.alerts.index') }}"
                class="rasa-btn rasa-btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection