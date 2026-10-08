<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>@yield('title', 'Employee Management')</title>

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
        font-family: 'Inter', sans-serif;
        background: #f4f7fb;
        color: #1e293b;
    }

    a {
        text-decoration: none;
    }

    /* ================= SIDEBAR ================= */

    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 260px;
        height: 100vh;
        background: linear-gradient(180deg, #111827, #1e293b);
        color: white;
        padding: 25px 18px;
        z-index: 1000;
        box-shadow: 8px 0 30px rgba(15, 23, 42, .08);
    }

    .brand {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 12px 30px;
    }

    .brand-icon {
        width: 45px;
        height: 45px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        font-size: 22px;
        box-shadow: 0 10px 25px rgba(99, 102, 241, .35);
    }

    .brand h4 {
        margin: 0;
        font-size: 17px;
        font-weight: 800;
    }

    .brand small {
        color: #94a3b8;
        font-size: 11px;
    }

    .menu-title {
        color: #64748b;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 10px 12px;
    }

    .nav-link-custom {
        display: flex;
        align-items: center;
        gap: 13px;
        color: #cbd5e1;
        padding: 13px 14px;
        border-radius: 12px;
        margin-bottom: 6px;
        font-size: 14px;
        font-weight: 600;
        transition: all .25s ease;
    }

    .nav-link-custom i {
        font-size: 18px;
    }

    .nav-link-custom:hover,
    .nav-link-custom.active {
        color: white;
        background: linear-gradient(
            135deg,
            rgba(99,102,241,.9),
            rgba(139,92,246,.9)
        );
        transform: translateX(4px);
        box-shadow: 0 8px 20px rgba(99,102,241,.18);
    }

    /* ================= MAIN ================= */

    .main {
        margin-left: 260px;
        min-height: 100vh;
    }

    .topbar {
        min-height: 75px;
        background: rgba(255,255,255,.9);
        backdrop-filter: blur(15px);
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 35px;
        position: sticky;
        top: 0;
        z-index: 900;
    }

    .topbar-title {
        font-size: 20px;
        font-weight: 800;
        color: #0f172a;
    }

    .topbar-subtitle {
        font-size: 12px;
        color: #64748b;
        margin-top: 2px;
    }

    /* ================= PROFILE ================= */

    .profile {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .profile-user {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .profile-avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
        font-size: 14px;
        font-weight: 800;
        text-transform: uppercase;
        box-shadow: 0 6px 18px rgba(99, 102, 241, .25);
        flex-shrink: 0;
    }

    .profile-name {
        font-size: 13px;
        font-weight: 800;
        color: #1e293b;
        line-height: 1.3;
    }

    .profile-email {
        font-size: 11px;
        color: #94a3b8;
        margin-top: 2px;
        max-width: 180px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .logout-btn {
        border: 1px solid #fee2e2;
        background: #fff5f5;
        color: #dc2626;
        border-radius: 10px;
        padding: 9px 13px;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        font-size: 12px;
        font-weight: 700;
        transition: all .25s ease;
    }

    .logout-btn:hover {
        background: #fee2e2;
        color: #b91c1c;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(220, 38, 38, .12);
    }

    .content {
        padding: 35px;
    }

    /* ================= CARDS ================= */

    .stat-card {
        border: 0;
        border-radius: 20px;
        background: white;
        padding: 24px;
        height: 100%;
        box-shadow: 0 10px 30px rgba(15, 23, 42, .06);
        transition: all .3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 40px rgba(15, 23, 42, .12);
    }

    .stat-card::after {
        content: "";
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        right: -35px;
        top: -35px;
        background: rgba(99,102,241,.06);
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin-bottom: 18px;
    }

    .icon-purple {
        background: #ede9fe;
        color: #7c3aed;
    }

    .icon-green {
        background: #dcfce7;
        color: #16a34a;
    }

    .icon-red {
        background: #fee2e2;
        color: #dc2626;
    }

    .icon-blue {
        background: #dbeafe;
        color: #2563eb;
    }

    .stat-number {
        font-size: 30px;
        font-weight: 800;
        margin-bottom: 4px;
    }

    .stat-label {
        color: #64748b;
        font-size: 13px;
        font-weight: 600;
    }

    /* ================= CONTENT CARD ================= */

    .content-card {
        border: 0;
        border-radius: 20px;
        background: white;
        box-shadow: 0 10px 30px rgba(15, 23, 42, .06);
        overflow: hidden;
    }

    .card-header-custom {
        padding: 24px 26px;
        border-bottom: 1px solid #eef2f7;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .section-title {
        font-size: 18px;
        font-weight: 800;
        margin: 0;
    }

    .section-subtitle {
        font-size: 12px;
        color: #64748b;
        margin-top: 5px;
    }

    /* ================= BUTTONS ================= */

    .btn-primary-custom {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border: none;
        color: white;
        border-radius: 11px;
        padding: 11px 18px;
        font-size: 13px;
        font-weight: 700;
        transition: all .25s ease;
        box-shadow: 0 8px 18px rgba(99,102,241,.2);
    }

    .btn-primary-custom:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(99,102,241,.3);
    }

    .btn-action {
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        border: none;
        transition: .2s ease;
    }

    .btn-action:hover {
        transform: translateY(-2px);
    }

    .btn-view {
        color: #2563eb;
        background: #dbeafe;
    }

    .btn-edit {
        color: #7c3aed;
        background: #ede9fe;
    }

    .btn-delete {
        color: #dc2626;
        background: #fee2e2;
    }

    /* ================= TABLE ================= */

    .table-container {
        overflow-x: auto;
    }

    .employee-table {
        margin: 0;
    }

    .employee-table thead th {
        background: #f8fafc;
        color: #64748b;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .6px;
        font-weight: 800;
        padding: 16px 20px;
        border: 0;
        white-space: nowrap;
    }

    .employee-table tbody td {
        padding: 17px 20px;
        vertical-align: middle;
        border-color: #f1f5f9;
        font-size: 13px;
        font-weight: 500;
    }

    .employee-table tbody tr {
        transition: .2s ease;
    }

    .employee-table tbody tr:hover {
        background: #fafbff;
    }

    .employee-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .employee-avatar {
        width: 42px;
        height: 42px;
        flex-shrink: 0;
        border-radius: 12px;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
    }

    .employee-name {
        font-weight: 700;
        color: #1e293b;
    }

    .employee-email {
        color: #94a3b8;
        font-size: 11px;
        margin-top: 2px;
    }

    .badge-active,
    .badge-inactive {
        padding: 7px 11px;
        border-radius: 30px;
        font-size: 10px;
        font-weight: 800;
    }

    .badge-active {
        background: #dcfce7;
        color: #15803d;
    }

    .badge-inactive {
        background: #fee2e2;
        color: #b91c1c;
    }

    /* ================= SEARCH ================= */

    .search-box {
        position: relative;
        width: 280px;
    }

    .search-box i {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
    }

    .search-box input {
        width: 100%;
        border: 1px solid #e2e8f0;
        border-radius: 11px;
        padding: 10px 12px 10px 38px;
        font-size: 13px;
        outline: none;
        transition: .2s;
    }

    .search-box input:focus {
        border-color: #818cf8;
        box-shadow: 0 0 0 4px rgba(99,102,241,.08);
    }

    /* ================= ALERT ================= */

    .alert-custom {
        border: 0;
        border-radius: 13px;
        padding: 14px 18px;
        font-size: 13px;
        font-weight: 600;
        animation: slideDown .4s ease;
    }

    /* ================= ANIMATIONS ================= */

    .fade-in {
        animation: fadeIn .6s ease both;
    }

    .slide-up {
        animation: slideUp .6s ease both;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ================= RESPONSIVE ================= */

    @media (max-width: 991px) {
        .sidebar {
            width: 80px;
            padding: 20px 10px;
        }

        .brand h4,
        .brand small,
        .menu-title,
        .nav-link-custom span {
            display: none;
        }

        .brand {
            justify-content: center;
            padding-bottom: 25px;
        }

        .nav-link-custom {
            justify-content: center;
        }

        .main {
            margin-left: 80px;
        }

        .topbar {
            padding: 0 20px;
        }

        .content {
            padding: 25px 20px;
        }
    }

    @media (max-width: 767px) {
        .sidebar {
            display: none;
        }

        .main {
            margin-left: 0;
        }

        .content {
            padding: 20px 15px;
        }

        .topbar {
            min-height: 65px;
            padding: 10px 15px;
        }

        .topbar-title {
            font-size: 16px;
        }

        .topbar-subtitle {
            display: none;
        }

        .profile-user {
            display: none;
        }

        .profile-avatar {
            width: 38px;
            height: 38px;
        }

        .logout-btn {
            padding: 9px 11px;
        }

        .logout-btn span {
            display: none;
        }

        .card-header-custom {
            align-items: flex-start;
            flex-direction: column;
        }

        .search-box {
            width: 100%;
        }
    }
</style>

@stack('styles')


</head>

<body>


<!-- SIDEBAR -->
<aside class="sidebar">

    <div class="brand">
        <div class="brand-icon">
            <i class="bi bi-people-fill"></i>
        </div>

        <div>
            <h4>EmployeeHub</h4>
            <small>Management System</small>
        </div>
    </div>

    <div class="menu-title">
        Main Menu
    </div>

    <a
        href="{{ route('employees.index') }}"
        class="nav-link-custom {{ request()->routeIs('employees.index') ? 'active' : '' }}"
    >
        <i class="bi bi-grid-1x2-fill"></i>
        <span>Dashboard</span>
    </a>

    <a
        href="{{ route('employees.index') }}"
        class="nav-link-custom"
    >
        <i class="bi bi-people"></i>
        <span>Employees</span>
    </a>

    <a
        href="{{ route('employees.create') }}"
        class="nav-link-custom {{ request()->routeIs('employees.create') ? 'active' : '' }}"
    >
        <i class="bi bi-person-plus"></i>
        <span>Add Employee</span>
    </a>

</aside>


<!-- MAIN -->
<main class="main">

    <!-- TOPBAR -->
    <header class="topbar">

        <div>
            <div class="topbar-title">
                @yield('page-title', 'Employee Dashboard')
            </div>

            <div class="topbar-subtitle">
                Manage your employees efficiently
            </div>
        </div>

        <div class="profile">

            @auth

                @php
                    $userName = auth()->user()->name ?? 'User';
                    $userEmail = auth()->user()->email ?? '';

                    $nameParts = preg_split('/\s+/', trim($userName));
                    $initials = '';

                    foreach ($nameParts as $part) {
                        if ($part !== '') {
                            $initials .= strtoupper(substr($part, 0, 1));
                        }
                    }

                    $initials = substr($initials ?: 'U', 0, 2);
                @endphp

                <div class="profile-user">

                    <div class="profile-avatar">
                        {{ $initials }}
                    </div>

                    <div>
                        <div class="profile-name">
                            {{ $userName }}
                        </div>

                        <div class="profile-email">
                            {{ $userEmail }}
                        </div>
                    </div>

                </div>

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                    style="margin:0;"
                >
                    @csrf

                    <button
                        type="submit"
                        class="logout-btn"
                        title="Logout"
                    >
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>

            @endauth

        </div>

    </header>


    <!-- CONTENT -->
    <section class="content">

        @if(session('success'))

            <div class="alert alert-success alert-custom alert-dismissible fade show mb-4">
                <i class="bi bi-check-circle-fill me-2"></i>

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                ></button>
            </div>

        @endif

        @yield('content')

    </section>

</main>


<!-- Bootstrap JS -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

@stack('scripts')


</body>
</html>