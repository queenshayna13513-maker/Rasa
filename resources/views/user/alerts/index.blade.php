@extends('layouts.app')

@section('title', 'Peringatan')
@section('header', 'Pusat Peringatan')
@section('description', 'Riwayat kondisi listrik yang membutuhkan perhatian.')

@section('content')

<style>
    .rasa-alert-card {
        background: #FFFDF8;
        border: 1px solid #EEE8DD;
        border-radius: 16px;
        box-shadow: 0 4px 14px rgba(49, 91, 114, 0.055);
        overflow: hidden;
    }

    .rasa-alert-header {
        padding: 18px 20px;
        border-bottom: 1px solid #EEE8DD;
    }

    .rasa-alert-header h3 {
        font-size: 14px;
        font-weight: 600;
        color: #263F4D;
        margin: 0;
    }

    .rasa-alert-header p {
        font-size: 11px;
        color: #8B9296;
        margin-top: 4px;
    }

    .rasa-alert-item {
        display: block;
        padding: 17px 20px;
        border-bottom: 1px solid #EEE8DD;
        transition: all .2s ease;
        text-decoration: none;
    }

    .rasa-alert-item:hover {
        background: #FAF7F1;
    }

    .rasa-alert-item:last-child {
        border-bottom: none;
    }

    .rasa-alert-content {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
    }

    .rasa-alert-left {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        min-width: 0;
    }

    .rasa-alert-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .rasa-alert-icon-danger {
        background: #FBECEC;
        color: #B83F45;
    }

    .rasa-alert-icon-warning {
        background: #FFF4E5;
        color: #C47A1B;
    }

    .rasa-alert-icon-normal {
        background: #E7F0F4;
        color: #0cc0df;
    }

    .rasa-alert-dot {
        width: 7px;
        height: 7px;
        border-radius: 999px;
        flex-shrink: 0;
    }

    .rasa-alert-dot-danger {
        background: #B83F45;
    }

    .rasa-alert-dot-warning {
        background: #D88921;
    }

    .rasa-alert-dot-normal {
        background: #0cc0df;
    }

    .rasa-alert-title {
        font-size: 13px;
        font-weight: 600;
        color: #34444D;
        line-height: 1.4;
    }

    .rasa-alert-message {
        font-size: 11px;
        color: #8B9296;
        margin-top: 5px;
        line-height: 1.5;
    }

    .rasa-alert-meta {
        text-align: right;
        flex-shrink: 0;
    }

    .rasa-alert-time {
        font-size: 10px;
        color: #9AA0A4;
        white-space: nowrap;
    }

    .rasa-alert-new {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        margin-top: 7px;
        padding: 4px 8px;
        border-radius: 7px;
        background: #E7F0F4;
        color: #0cc0df;
        font-size: 9px;
        font-weight: 600;
    }

    .rasa-alert-empty {
        padding: 50px 20px;
        text-align: center;
        color: #9AA0A4;
    }

    .rasa-alert-empty-icon {
        width: 42px;
        height: 42px;
        margin: 0 auto 10px;
        border-radius: 12px;
        background: #F3EFE7;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #8B9296;
    }

    .rasa-alert-empty p {
        font-size: 12px;
    }

    .rasa-alert-pagination {
        padding: 16px 20px;
        border-top: 1px solid #EEE8DD;
    }

    @media (max-width: 640px) {

        .rasa-alert-content {
            gap: 12px;
        }

        .rasa-alert-item {
            padding: 15px;
        }

        .rasa-alert-header {
            padding: 16px;
        }

        .rasa-alert-meta {
            min-width: 70px;
        }

        .rasa-alert-time {
            white-space: normal;
        }
    }
</style>


<div class="rasa-alert-card">

    {{-- HEADER --}}
    <div class="rasa-alert-header">

        <h3>
            Riwayat Peringatan
        </h3>

        <p>
            Semua peringatan dari sistem RASA.
        </p>

    </div>


    {{-- ALERT LIST --}}
    <div>

        @forelse($alerts as $alert)

        <a href="{{ route('user.alerts.show', $alert) }}"
            class="rasa-alert-item">

            <div class="rasa-alert-content">

                <div class="rasa-alert-left">

                    {{-- ICON / INDICATOR --}}
                    @if(($alert->severity ?? '') === 'danger')

                        <div class="rasa-alert-icon rasa-alert-icon-danger">

                            <svg
                                class="w-4 h-4"
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

                    @elseif(($alert->severity ?? '') === 'warning')

                        <div class="rasa-alert-icon rasa-alert-icon-warning">

                            <svg
                                class="w-4 h-4"
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

                    @else

                        <div class="rasa-alert-icon rasa-alert-icon-normal">

                            <svg
                                class="w-4 h-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M12 6v6l4 2"/>

                                <circle
                                    cx="12"
                                    cy="12"
                                    r="9"
                                    stroke-width="1.8"/>

                            </svg>

                        </div>

                    @endif


                    {{-- CONTENT --}}
                    <div class="min-w-0">

                        <div class="flex items-center gap-2">

                            @if(($alert->severity ?? '') === 'danger')

                                <span class="rasa-alert-dot rasa-alert-dot-danger"></span>

                            @elseif(($alert->severity ?? '') === 'warning')

                                <span class="rasa-alert-dot rasa-alert-dot-warning"></span>

                            @else

                                <span class="rasa-alert-dot rasa-alert-dot-normal"></span>

                            @endif


                            <p class="rasa-alert-title">
                                {{ $alert->title ?? 'Peringatan Sistem' }}
                            </p>

                        </div>


                        <p class="rasa-alert-message">

                            {{ $alert->message ?? 'Terdapat perubahan kondisi listrik.' }}

                        </p>

                    </div>

                </div>


                {{-- TIME + STATUS --}}
                <div class="rasa-alert-meta">

                    <p class="rasa-alert-time">

                        {{ $alert->created_at }}

                    </p>


                    @if(empty($alert->is_read))

                        <span class="rasa-alert-new">

                            <span class="w-1.5 h-1.5 rounded-full bg-[#0cc0df]"></span>

                            Baru

                        </span>

                    @endif

                </div>

            </div>

        </a>

        @empty

        {{-- EMPTY STATE --}}
        <div class="rasa-alert-empty">

            <div class="rasa-alert-empty-icon">

                <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.7"
                        d="M15 17h5l-1.5-2V10a6.5 6.5 0 00-13 0v5L4 17h5"/>

                    <path
                        stroke-linecap="round"
                        stroke-width="1.7"
                        d="M10 20h4"/>

                </svg>

            </div>

            <p>
                Belum ada peringatan.
            </p>

        </div>

        @endforelse

    </div>


    {{-- PAGINATION --}}
    @if($alerts->hasPages())

        <div class="rasa-alert-pagination">

            {{ $alerts->links() }}

        </div>

    @endif

</div>

@endsection