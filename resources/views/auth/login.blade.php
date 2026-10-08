<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | EmployeeHub</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;

            font-family: 'Inter', sans-serif;

            background:
                linear-gradient(
                    135deg,
                    rgba(15, 23, 42, .88),
                    rgba(49, 46, 129, .78)
                ),
                url('https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&w=2000&q=85')
                center/cover no-repeat fixed;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px 15px;

            overflow-x: hidden;
        }


        /* =========================
           BACKGROUND EFFECTS
        ========================= */

        body::before {
            content: "";

            position: fixed;

            width: 420px;
            height: 420px;

            background: rgba(99, 102, 241, .35);

            border-radius: 50%;

            filter: blur(110px);

            top: -170px;
            left: -120px;

            animation: float 7s ease-in-out infinite;

            pointer-events: none;
        }


        body::after {
            content: "";

            position: fixed;

            width: 360px;
            height: 360px;

            background: rgba(139, 92, 246, .32);

            border-radius: 50%;

            filter: blur(110px);

            bottom: -160px;
            right: -120px;

            animation: float 8s ease-in-out infinite reverse;

            pointer-events: none;
        }


        /* =========================
           AUTH WRAPPER
        ========================= */

        .auth-wrapper {
            width: 100%;
            max-width: 450px;

            position: relative;
            z-index: 2;

            animation: slideUp .7s ease;
        }


        /* =========================
           CARD
        ========================= */

        .auth-card {

            padding: 43px;

            border-radius: 28px;

            background: rgba(255, 255, 255, .13);

            border: 1px solid rgba(255, 255, 255, .25);

            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);

            box-shadow:
                0 30px 80px rgba(0, 0, 0, .35),
                inset 0 1px 0 rgba(255,255,255,.20);
        }


        /* =========================
           BRAND
        ========================= */

        .brand {
            text-align: center;
            margin-bottom: 32px;
        }


        .brand-icon {

            width: 68px;
            height: 68px;

            margin: 0 auto 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 20px;

            background:
                linear-gradient(
                    135deg,
                    #6366f1,
                    #8b5cf6
                );

            color: white;

            font-size: 30px;

            box-shadow:
                0 15px 35px rgba(99, 102, 241, .40);

            animation: pulse 3s ease-in-out infinite;
        }


        .brand h1 {

            color: white;

            font-size: 28px;

            font-weight: 800;

            margin: 0 0 7px;

            letter-spacing: -.5px;
        }


        .brand p {

            color: rgba(255,255,255,.65);

            font-size: 13px;

            margin: 0;
        }


        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 20px;
        }


        .form-label {

            color: rgba(255,255,255,.92);

            font-size: 13px;

            font-weight: 700;

            margin-bottom: 8px;
        }


        .input-wrapper {
            position: relative;
        }


        .input-wrapper > i {

            position: absolute;

            left: 16px;
            top: 50%;

            transform: translateY(-50%);

            color: #94a3b8;

            font-size: 17px;

            z-index: 2;

            transition: .2s ease;
        }


        .form-control {

            height: 53px;

            border-radius: 13px;

            border: 1px solid rgba(255,255,255,.18);

            background: rgba(255,255,255,.10);

            color: white;

            padding-left: 46px;
            padding-right: 48px;

            font-size: 14px;

            font-weight: 500;

            transition: all .25s ease;
        }


        .form-control::placeholder {
            color: rgba(255,255,255,.42);
        }


        .form-control:focus {

            color: white;

            background: rgba(255,255,255,.16);

            border-color: #a78bfa;

            box-shadow:
                0 0 0 4px rgba(139,92,246,.15);

            outline: none;
        }


        .form-control:focus + .input-icon {
            color: #c4b5fd;
        }


        /* =========================
           PASSWORD TOGGLE
        ========================= */

        .password-toggle {

            position: absolute;

            right: 15px;
            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            color: #94a3b8;

            font-size: 17px;

            cursor: pointer;

            z-index: 3;

            transition: .2s ease;
        }


        .password-toggle:hover {
            color: white;
        }


        /* =========================
           REMEMBER / FORGOT
        ========================= */

        .form-options {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-top: -4px;

            margin-bottom: 22px;
        }


        .remember {

            display: flex;

            align-items: center;

            gap: 8px;

            color: rgba(255,255,255,.68);

            font-size: 12px;

            font-weight: 500;
        }


        .remember input {

            width: 15px;
            height: 15px;

            accent-color: #6366f1;

            cursor: pointer;
        }


        .forgot-password {

            color: #c4b5fd;

            font-size: 12px;

            font-weight: 700;

            text-decoration: none;

            transition: .2s ease;
        }


        .forgot-password:hover {
            color: white;
        }


        /* =========================
           LOGIN BUTTON
        ========================= */

        .btn-login {

            width: 100%;

            height: 53px;

            border: none;

            border-radius: 13px;

            background:
                linear-gradient(
                    135deg,
                    #6366f1,
                    #8b5cf6
                );

            color: white;

            font-size: 14px;

            font-weight: 800;

            box-shadow:
                0 12px 30px rgba(99,102,241,.35);

            transition: all .25s ease;

            position: relative;

            overflow: hidden;
        }


        .btn-login::before {

            content: "";

            position: absolute;

            top: 0;
            left: -100%;

            width: 100%;
            height: 100%;

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    rgba(255,255,255,.18),
                    transparent
                );

            transition: .5s;
        }


        .btn-login:hover::before {
            left: 100%;
        }


        .btn-login:hover {

            color: white;

            transform: translateY(-3px);

            box-shadow:
                0 18px 38px rgba(99,102,241,.45);
        }


        .btn-login:active {
            transform: translateY(-1px);
        }


        /* =========================
           REGISTER LINK
        ========================= */

        .register-link {

            text-align: center;

            margin-top: 26px;

            color: rgba(255,255,255,.65);

            font-size: 13px;
        }


        .register-link a {

            color: #c4b5fd;

            font-weight: 800;

            text-decoration: none;

            transition: .2s ease;
        }


        .register-link a:hover {
            color: white;
        }


        /* =========================
           ERROR
        ========================= */

        .error-box {

            background: rgba(220, 38, 38, .15);

            border:
                1px solid
                rgba(248, 113, 113, .25);

            color: #fecaca;

            border-radius: 12px;

            padding: 13px 15px;

            font-size: 12px;

            font-weight: 600;

            margin-bottom: 21px;

            animation: shake .4s ease;
        }


        .field-error {

            color: #fca5a5;

            font-size: 11px;

            margin-top: 6px;

            font-weight: 600;
        }


        /* =========================
           ANIMATIONS
        ========================= */

        @keyframes slideUp {

            from {
                opacity: 0;
                transform: translateY(35px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }


        @keyframes float {

            0%, 100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(25px);
            }

        }


        @keyframes pulse {

            0%, 100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.04);
            }

        }


        @keyframes shake {

            0%, 100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            75% {
                transform: translateX(5px);
            }

        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 576px) {

            body {
                padding: 20px 12px;
            }

            .auth-card {
                padding: 30px 22px;
                border-radius: 22px;
            }

            .brand h1 {
                font-size: 24px;
            }

            .brand-icon {
                width: 60px;
                height: 60px;
                font-size: 26px;
            }

            .form-options {
                align-items: flex-start;
                gap: 10px;
            }

        }

    </style>

</head>


<body>

<div class="auth-wrapper">

    <div class="auth-card">


        <!-- BRAND -->

        <div class="brand">

            <div class="brand-icon">

                <i class="bi bi-people-fill"></i>

            </div>

            <h1>
                Welcome Back
            </h1>

            <p>
                Sign in to your EmployeeHub account
            </p>

        </div>


        <!-- ERRORS -->

        @if ($errors->any())

            <div class="error-box">

                <i class="bi bi-exclamation-triangle-fill me-2"></i>

                {{ $errors->first() }}

            </div>

        @endif


        <!-- LOGIN FORM -->

        <form
            method="POST"
            action="{{ route('login') }}"
        >

            @csrf


            <!-- EMAIL -->

            <div class="form-group">

                <label class="form-label">
                    Email Address
                </label>

                <div class="input-wrapper">

                    <i class="bi bi-envelope input-icon"></i>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        required
                        autofocus
                        autocomplete="email"
                    >

                </div>


                @error('email')

                    <div class="field-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- PASSWORD -->

            <div class="form-group">

                <label class="form-label">
                    Password
                </label>

                <div class="input-wrapper">

                    <i class="bi bi-lock input-icon"></i>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        placeholder="Enter your password"
                        required
                        autocomplete="current-password"
                    >


                    <button
                        type="button"
                        class="password-toggle"
                        onclick="togglePassword()"
                        aria-label="Show password"
                    >

                        <i
                            id="passwordIcon"
                            class="bi bi-eye"
                        ></i>

                    </button>

                </div>


                @error('password')

                    <div class="field-error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- OPTIONS -->

            <div class="form-options">

                <label class="remember">

                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                    >

                    Remember me

                </label>


                @if (Route::has('password.request'))

                    <a
                        href="{{ route('password.request') }}"
                        class="forgot-password"
                    >
                        Forgot password?
                    </a>

                @endif

            </div>


            <!-- LOGIN BUTTON -->

            <button
                type="submit"
                class="btn-login"
            >

                <i class="bi bi-box-arrow-in-right me-2"></i>

                Sign In

            </button>

        </form>


        <!-- REGISTER -->

        <div class="register-link">

            Don't have an account?

            <a href="{{ route('register') }}">
                Create Account
            </a>

        </div>


    </div>

</div>


<script>

function togglePassword()
{
    const password =
        document.getElementById('password');

    const icon =
        document.getElementById('passwordIcon');


    if (password.type === 'password') {

        password.type = 'text';

        icon.classList.remove('bi-eye');

        icon.classList.add('bi-eye-slash');

    } else {

        password.type = 'password';

        icon.classList.remove('bi-eye-slash');

        icon.classList.add('bi-eye');

    }
}

</script>


</body>
</html>