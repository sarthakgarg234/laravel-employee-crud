<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register | EmployeeHub</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

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

        body::before {
            content: "";
            position: fixed;
            width: 400px;
            height: 400px;
            background: rgba(99, 102, 241, .35);
            border-radius: 50%;
            filter: blur(100px);
            top: -150px;
            left: -100px;
            animation: float 7s ease-in-out infinite;
        }

        body::after {
            content: "";
            position: fixed;
            width: 350px;
            height: 350px;
            background: rgba(139, 92, 246, .30);
            border-radius: 50%;
            filter: blur(100px);
            bottom: -150px;
            right: -100px;
            animation: float 8s ease-in-out infinite reverse;
        }

        .auth-wrapper {
            width: 100%;
            max-width: 470px;
            position: relative;
            z-index: 2;
            animation: slideUp .7s ease;
        }

        .auth-card {
            padding: 42px;
            border-radius: 28px;

            background: rgba(255, 255, 255, .13);
            border: 1px solid rgba(255, 255, 255, .25);

            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);

            box-shadow:
                0 30px 80px rgba(0, 0, 0, .35),
                inset 0 1px 0 rgba(255,255,255,.2);
        }

        .brand {
            text-align: center;
            margin-bottom: 30px;
        }

        .brand-icon {
            width: 68px;
            height: 68px;
            margin: 0 auto 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 20px;

            background: linear-gradient(
                135deg,
                #6366f1,
                #8b5cf6
            );

            color: white;
            font-size: 30px;

            box-shadow:
                0 15px 35px rgba(99, 102, 241, .4);

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

        .form-label {
            color: rgba(255,255,255,.9);
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
        }

        .form-control {
            height: 52px;
            border-radius: 13px;

            border: 1px solid rgba(255,255,255,.18);

            background: rgba(255,255,255,.10);
            color: white;

            padding-left: 46px;
            padding-right: 16px;

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
        }

        .password-toggle:hover {
            color: white;
        }

        .btn-register {
            width: 100%;
            height: 53px;
            margin-top: 8px;

            border: none;
            border-radius: 13px;

            background: linear-gradient(
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
        }

        .btn-register:hover {
            color: white;
            transform: translateY(-3px);

            box-shadow:
                0 18px 38px rgba(99,102,241,.45);
        }

        .btn-register:active {
            transform: translateY(-1px);
        }

        .login-link {
            text-align: center;
            margin-top: 25px;

            color: rgba(255,255,255,.65);
            font-size: 13px;
        }

        .login-link a {
            color: #c4b5fd;
            font-weight: 800;
            text-decoration: none;
        }

        .login-link a:hover {
            color: white;
        }

        .error-box {
            background: rgba(220, 38, 38, .15);
            border: 1px solid rgba(248, 113, 113, .25);
            color: #fecaca;

            border-radius: 12px;
            padding: 12px 15px;

            font-size: 12px;
            font-weight: 600;

            margin-bottom: 20px;
        }

        .field-error {
            color: #fca5a5;
            font-size: 11px;
            margin-top: 6px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 18px;
        }

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

        @media (max-width: 576px) {

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
        }
    </style>
</head>

<body>

<div class="auth-wrapper">

    <div class="auth-card">

        <div class="brand">

            <div class="brand-icon">
                <i class="bi bi-person-plus-fill"></i>
            </div>

            <h1>Create Account</h1>

            <p>
                Join EmployeeHub and manage your employees
            </p>

        </div>


        @if ($errors->any())

            <div class="error-box">

                <i class="bi bi-exclamation-triangle-fill me-2"></i>

                Please fix the following errors:

                <ul class="mb-0 mt-2 ps-3">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form method="POST" action="{{ route('register') }}">

            @csrf


            <!-- NAME -->

            <div class="form-group">

                <label class="form-label">
                    Full Name
                </label>

                <div class="input-wrapper">

                    <i class="bi bi-person"></i>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        placeholder="Enter your full name"
                        required
                        autofocus
                        autocomplete="name"
                    >

                </div>

                @error('name')
                    <div class="field-error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- EMAIL -->

            <div class="form-group">

                <label class="form-label">
                    Email Address
                </label>

                <div class="input-wrapper">

                    <i class="bi bi-envelope"></i>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        required
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

                    <i class="bi bi-lock"></i>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        placeholder="Create a password"
                        required
                        autocomplete="new-password"
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        onclick="togglePassword('password', 'passwordIcon')"
                    >
                        <i id="passwordIcon" class="bi bi-eye"></i>
                    </button>

                </div>

                @error('password')
                    <div class="field-error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- CONFIRM PASSWORD -->

            <div class="form-group">

                <label class="form-label">
                    Confirm Password
                </label>

                <div class="input-wrapper">

                    <i class="bi bi-shield-lock"></i>

                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        class="form-control"
                        placeholder="Confirm your password"
                        required
                        autocomplete="new-password"
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        onclick="togglePassword('password_confirmation', 'confirmPasswordIcon')"
                    >
                        <i id="confirmPasswordIcon" class="bi bi-eye"></i>
                    </button>

                </div>

            </div>


            <button type="submit" class="btn-register">

                <i class="bi bi-person-check-fill me-2"></i>

                Create Account

            </button>

        </form>


        <div class="login-link">

            Already have an account?

            <a href="{{ route('login') }}">
                Sign in
            </a>

        </div>

    </div>

</div>


<script>

function togglePassword(inputId, iconId)
{
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (input.type === 'password') {

        input.type = 'text';

        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');

    } else {

        input.type = 'password';

        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');

    }
}

</script>

</body>
</html>