<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'RASA') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            margin: 0;
            background: #f5f1e8;
        }

        .rasa-guest-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;

            padding: 40px 20px;

            background:
                radial-gradient(
                    circle at 15% 20%,
                    rgba(12, 192, 223, 0.08),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 85% 80%,
                    rgba(47, 65, 75, 0.06),
                    transparent 30%
                ),
                #f5f1e8;
        }

        .rasa-login-container {
            width: 100%;
            max-width: 460px;
        }

        @media (max-width: 640px) {

            .rasa-guest-page {
                padding: 20px 15px;
            }

        }
    </style>
</head>

<body>

    <div class="rasa-guest-page">

        <div class="rasa-login-container">

            {{ $slot }}

        </div>

    </div>

</body>

</html>