@extends('layouts.app')

@section('title', 'Admin Access Only - EmployeeHub')
@section('page-title', 'Access Restricted')

@section('content')
<div class="container py-5">
    <div class="content-card text-center p-5 mx-auto" style="max-width: 650px;">

        <div class="mb-4">
            <i class="bi bi-shield-lock-fill text-warning"
               style="font-size: 5rem;"></i>
        </div>

        <h2 class="fw-bold mb-3">Admin Access Only</h2>

        <p class="text-secondary mb-4">
            Sorry! The User Management page is available only to administrators.
            Your account does not have permission to access this section.
        </p>

        <a href="{{ route('employees.index') }}"
           class="btn btn-primary px-4 py-2">
            <i class="bi bi-arrow-left me-2"></i>
            Back to Employees
        </a>

    </div>
</div>
@endsection