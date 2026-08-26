<x-guest-layout>

    <style>
        /* =========================================
           RASA LOGIN
        ========================================= */
        

        .rasa-login-page {
            min-height: 100vh;
            background:
                radial-gradient(
                    circle at 10% 20%,
                    rgba(49, 91, 114, 0.07),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 90% 80%,
                    rgba(134, 169, 186, 0.10),
                    transparent 30%
                ),
                #f7f4ed;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px 20px;

            overflow: hidden;
            position: relative;
        }


        /* =========================================
           BACKGROUND DECORATION
        ========================================= */

        .rasa-bg-circle {
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
        }

        .rasa-bg-circle-one {
            width: 320px;
            height: 320px;

            top: -150px;
            left: -120px;

            background: rgba(49, 91, 114, 0.06);

            animation: rasaFloat 7s ease-in-out infinite;
        }

        .rasa-bg-circle-two {
            width: 240px;
            height: 240px;

            right: -90px;
            bottom: -100px;

            background: rgba(134, 169, 186, 0.10);

            animation: rasaFloatReverse 8s ease-in-out infinite;
        }


        /* =========================================
           LOGIN CARD
        ========================================= */

        .rasa-login-card {
            width: 100%;
            max-width: 430px;

            background: rgba(255, 253, 248, 0.96);

            border: 1px solid #e5ded2;

            border-radius: 22px;

            padding: 34px;

            box-shadow:
                0 15px 45px rgba(49, 91, 114, 0.09),
                0 3px 10px rgba(49, 91, 114, 0.04);

            position: relative;
            z-index: 2;

            animation: rasaCardIn .65s ease forwards;
        }


        /* =========================================
           LOGO
        ========================================= */

        .rasa-logo-wrapper {
            display: flex;
            justify-content: center;
            margin-bottom: 22px;
        }

        .rasa-logo {
            width: 62px;
            height: 62px;

            border-radius: 18px;

            background: #315b72;

            display: flex;
            align-items: center;
            justify-content: center;

            color: white;

            box-shadow:
                0 8px 20px rgba(49, 91, 114, 0.20);

            animation: rasaLogoIn .7s ease forwards;
        }

        .rasa-logo svg {
            width: 32px;
            height: 32px;
        }


        /* =========================================
           HEADER
        ========================================= */

        .rasa-login-header {
            text-align: center;
            margin-bottom: 28px;
        }

        .rasa-login-header h1 {
            margin: 0;

            font-size: 25px;
            line-height: 1.3;

            font-weight: 700;

            color: #263f4d;
        }

        .rasa-login-header h1 span {
            color: #315b72;
        }

        .rasa-login-header p {
            margin-top: 8px;

            font-size: 13px;
            line-height: 1.6;

            color: #858c90;
        }


        /* =========================================
           INPUT GROUP
        ========================================= */

        .rasa-field {
            margin-bottom: 18px;
        }

        .rasa-label {
            display: block;

            margin-bottom: 7px;

            font-size: 12px;
            font-weight: 600;

            color: #44545d;
        }

        .rasa-input-wrapper {
            position: relative;
        }

        .rasa-input-icon {
            position: absolute;

            left: 13px;
            top: 50%;

            transform: translateY(-50%);

            width: 18px;
            height: 18px;

            color: #8b979d;

            pointer-events: none;

            transition: color .2s ease;
        }

        .rasa-input {
            width: 100%;

            height: 46px;

            padding:
                0 42px
                0 42px;

            border: 1px solid #ddd6ca;

            border-radius: 11px;

            background: #fffdf8;

            color: #34444d;

            font-size: 13px;

            outline: none;

            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                background .2s ease,
                transform .2s ease;
        }

        .rasa-input::placeholder {
            color: #a4aaad;
        }

        .rasa-input:hover {
            border-color: #c9c0b3;
        }

        .rasa-input:focus {
            border-color: #315b72;

            background: #ffffff;

            box-shadow:
                0 0 0 3px rgba(49, 91, 114, 0.09);

            transform: translateY(-1px);
        }

        .rasa-input-wrapper:focus-within .rasa-input-icon {
            color: #315b72;
        }


        /* =========================================
           PASSWORD TOGGLE
        ========================================= */

        .rasa-password-toggle {
            position: absolute;

            right: 12px;
            top: 50%;

            transform: translateY(-50%);

            width: 28px;
            height: 28px;

            border: none;

            background: transparent;

            color: #8b979d;

            cursor: pointer;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 7px;

            transition:
                color .2s ease,
                background .2s ease;
        }

        .rasa-password-toggle:hover {
            color: #315b72;
            background: #f3efe7;
        }


        /* =========================================
           ERROR
        ========================================= */

        .rasa-error {
            margin-top: 6px;

            font-size: 11px;

            color: #b34a43;
        }


        /* =========================================
           REMEMBER + FORGOT
        ========================================= */

        .rasa-options {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 12px;

            margin-top: 4px;
            margin-bottom: 22px;
        }

        .rasa-remember {
            display: inline-flex;
            align-items: center;

            gap: 8px;

            font-size: 11px;

            color: #777f83;

            cursor: pointer;
        }

        .rasa-remember input {
            width: 15px;
            height: 15px;

            accent-color: #315b72;

            cursor: pointer;
        }

        .rasa-forgot {
            font-size: 11px;
            font-weight: 600;

            color: #315b72;

            text-decoration: none;

            transition:
                color .2s ease,
                transform .2s ease;
        }

        .rasa-forgot:hover {
            color: #263f4d;
        }


        /* =========================================
           LOGIN BUTTON
        ========================================= */

        .rasa-login-button {
            width: 100%;

            height: 47px;

            border: none;
            border-radius: 11px;

            background: #315b72;

            color: white;

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            box-shadow:
                0 7px 16px rgba(49, 91, 114, 0.16);

            transition:
                transform .2s ease,
                box-shadow .2s ease,
                background .2s ease;
        }

        .rasa-login-button:hover {
            background: #274b5e;

            transform: translateY(-2px);

            box-shadow:
                0 10px 22px rgba(49, 91, 114, 0.22);
        }

        .rasa-login-button:active {
            transform: translateY(0);
        }

        .rasa-login-button svg {
            transition: transform .2s ease;
        }

        .rasa-login-button:hover svg {
            transform: translateX(3px);
        }


        /* =========================================
           BOTTOM TEXT
        ========================================= */

        .rasa-login-footer {
            text-align: center;

            margin-top: 22px;

            font-size: 10px;

            color: #9a9fa2;
        }

        .rasa-login-footer span {
            color: #315b72;
            font-weight: 600;
        }


        /* =========================================
           ANIMATION
        ========================================= */

        @keyframes rasaCardIn {

            from {
                opacity: 0;
                transform:
                    translateY(18px)
                    scale(.98);
            }

            to {
                opacity: 1;
                transform:
                    translateY(0)
                    scale(1);
            }

        }


        @keyframes rasaLogoIn {

            from {
                opacity: 0;
                transform:
                    scale(.7)
                    rotate(-8deg);
            }

            to {
                opacity: 1;
                transform:
                    scale(1)
                    rotate(0);
            }

        }


        @keyframes rasaFloat {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(15px);
            }

        }


        @keyframes rasaFloatReverse {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }

        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 500px) {

            .rasa-login-page {
                padding: 20px 14px;
            }

            .rasa-login-card {
                padding: 27px 22px;

                border-radius: 19px;
            }

            .rasa-login-header h1 {
                font-size: 22px;
            }

            .rasa-bg-circle-one {
                width: 220px;
                height: 220px;
            }

            .rasa-bg-circle-two {
                width: 170px;
                height: 170px;
            }

        }


        /* =========================================
           REDUCED MOTION
        ========================================= */

        @media (prefers-reduced-motion: reduce) {

            .rasa-login-card,
            .rasa-logo,
            .rasa-bg-circle-one,
            .rasa-bg-circle-two {
                animation: none;
            }

            .rasa-input,
            .rasa-login-button {
                transition: none;
            }

        }

    </style>


    {{-- =========================================
         LOGIN PAGE
    ========================================= --}}

    <div class="rasa-login-page">


        {{-- BACKGROUND DECORATION --}}

        <div class="rasa-bg-circle rasa-bg-circle-one"></div>

        <div class="rasa-bg-circle rasa-bg-circle-two"></div>


        {{-- =====================================
             LOGIN CARD
        ====================================== --}}

        <div class="rasa-login-card">


            {{-- LOGO --}}

            <div class="rasa-logo-wrapper">

                <div class="rasa-logo">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.5"
                    >

                        {{-- Shield --}}

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 3l7 3v5c0 4.5-3 7.8-7 10-4-2.2-7-5.5-7-10V6l7-3z"
                        />

                        {{-- Check --}}

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 12l2 2 4-4"
                        />

                    </svg>

                </div>

            </div>


            {{-- HEADER --}}

            <div class="rasa-login-header">

                <h1>
                    Selamat datang di
                    <span>RASA</span>
                </h1>

                <p>
                    Masuk untuk memantau keamanan listrik
                    rumah Anda dengan lebih tenang.
                </p>

            </div>


            {{-- SESSION STATUS --}}

            <x-auth-session-status
                class="mb-4"
                :status="session('status')"
            />


            {{-- LOGIN FORM --}}

            <form
                method="POST"
                action="{{ route('login') }}"
                id="rasaLoginForm"
            >

                @csrf


                {{-- EMAIL --}}

                <div class="rasa-field">

                    <label
                        for="email"
                        class="rasa-label"
                    >
                        Email
                    </label>


                    <div class="rasa-input-wrapper">

                        <svg
                            class="rasa-input-icon"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.7"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 7l9 6 9-6"
                            />

                            <rect
                                x="3"
                                y="5"
                                width="18"
                                height="14"
                                rx="2"
                            />

                        </svg>


                        <input
                            id="email"
                            class="rasa-input"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email Anda"
                            required
                            autofocus
                            autocomplete="username"
                        />

                    </div>


                    @if($errors->get('email'))

                        <div class="rasa-error">

                            {{ $errors->first('email') }}

                        </div>

                    @endif

                </div>


                {{-- PASSWORD --}}

                <div class="rasa-field">

                    <label
                        for="password"
                        class="rasa-label"
                    >
                        Password
                    </label>


                    <div class="rasa-input-wrapper">

                        <svg
                            class="rasa-input-icon"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.7"
                        >

                            <rect
                                x="5"
                                y="10"
                                width="14"
                                height="10"
                                rx="2"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M8 10V7a4 4 0 018 0v3"
                            />

                        </svg>


                        <input
                            id="password"
                            class="rasa-input"
                            type="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                            autocomplete="current-password"
                        />


                        {{-- SHOW PASSWORD --}}

                        <button
                            type="button"
                            class="rasa-password-toggle"
                            id="togglePassword"
                            aria-label="Tampilkan password"
                        >

                            <svg
                                id="eyeOpen"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.7"
                                class="w-4 h-4"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6z"
                                />

                                <circle
                                    cx="12"
                                    cy="12"
                                    r="2.5"
                                />

                            </svg>


                            <svg
                                id="eyeClosed"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.7"
                                class="w-4 h-4 hidden"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 3l18 18"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M10.6 6.2A9.8 9.8 0 0112 6c6 0 9.5 6 9.5 6a17 17 0 01-3.2 3.7"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6.3 6.8C3.8 8.7 2.5 12 2.5 12s3.5 6 9.5 6c1.3 0 2.5-.3 3.5-.8"
                                />

                            </svg>

                        </button>

                    </div>


                    @if($errors->get('password'))

                        <div class="rasa-error">

                            {{ $errors->first('password') }}

                        </div>

                    @endif

                </div>


                {{-- OPTIONS --}}

                <div class="rasa-options">


                    <label
                        for="remember_me"
                        class="rasa-remember"
                    >

                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                        >

                        <span>
                            Ingat saya
                        </span>

                    </label>


                    @if (Route::has('password.request'))

                        <a
                            class="rasa-forgot"
                            href="{{ route('password.request') }}"
                        >
                            Lupa password?
                        </a>

                    @endif

                </div>


                {{-- LOGIN BUTTON --}}

                <button
                    type="submit"
                    class="rasa-login-button"
                    id="rasaLoginButton"
                >

                    <span id="loginButtonText">
                        Masuk ke Dashboard
                    </span>


                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                        class="w-4 h-4"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 12h14"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M13 6l6 6-6 6"
                        />

                    </svg>

                </button>

            </form>


            {{-- FOOTER --}}

            <div class="rasa-login-footer">

                <span>RASA</span>

                &nbsp;·&nbsp;

                Remote Assistance & Safety for Aging

            </div>


        </div>

    </div>


    {{-- =========================================
         INTERACTION
    ========================================= --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /*
             * ================================
             * SHOW / HIDE PASSWORD
             * ================================
             */

            const togglePassword =
                document.getElementById('togglePassword');

            const password =
                document.getElementById('password');

            const eyeOpen =
                document.getElementById('eyeOpen');

            const eyeClosed =
                document.getElementById('eyeClosed');


            if (
                togglePassword &&
                password
            ) {

                togglePassword.addEventListener(
                    'click',
                    function () {

                        const isPassword =
                            password.type === 'password';


                        password.type =
                            isPassword
                                ? 'text'
                                : 'password';


                        eyeOpen.classList.toggle(
                            'hidden',
                            isPassword
                        );

                        eyeClosed.classList.toggle(
                            'hidden',
                            !isPassword
                        );


                        togglePassword.setAttribute(
                            'aria-label',
                            isPassword
                                ? 'Sembunyikan password'
                                : 'Tampilkan password'
                        );

                    }
                );

            }


            /*
             * ================================
             * LOGIN LOADING
             * ================================
             */

            const form =
                document.getElementById('rasaLoginForm');

            const button =
                document.getElementById('rasaLoginButton');

            const buttonText =
                document.getElementById('loginButtonText');


            if (
                form &&
                button
            ) {

                form.addEventListener(
                    'submit',
                    function () {

                        button.disabled = true;

                        button.style.opacity = '0.8';

                        button.style.cursor =
                            'not-allowed';


                        buttonText.textContent =
                            'Memproses...';

                    }
                );

            }


            /*
             * ================================
             * INPUT ANIMATION
             * ================================
             */

            const inputs =
                document.querySelectorAll(
                    '.rasa-input'
                );


            inputs.forEach(function (input) {

                input.addEventListener(
                    'input',
                    function () {

                        if (input.value.length > 0) {

                            input.style.borderColor =
                                '#86a9ba';

                        }

                    }
                );

            });

        });

    </script>

</x-guest-layout>