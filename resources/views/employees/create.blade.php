@extends('layouts.app')

@section('title', 'Add Employee - EmployeeHub')
@section('page-title', 'Add Employee')

@section('content')

<div class="fade-in">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Add New Employee</h2>
            <p class="text-secondary mb-0">
                Create a new employee profile.
            </p>
        </div>

        <a href="{{ route('employees.index') }}"
           class="btn btn-light border">
            <i class="bi bi-arrow-left me-1"></i>
            Back to Employees
        </a>
    </div>


    @if($errors->any())

        <div class="alert alert-danger alert-custom mb-4">

            <i class="bi bi-exclamation-triangle-fill me-2"></i>

            Please fix the following errors:

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif


    <form action="{{ route('employees.store') }}" method="POST">

        @csrf

        <div class="row g-4">

            <!-- PERSONAL INFORMATION -->

            <div class="col-lg-8">

                <div class="content-card">

                    <div class="card-header-custom">
                        <div>
                            <h5 class="section-title">
                                <i class="bi bi-person me-2"></i>
                                Personal Information
                            </h5>

                            <div class="section-subtitle">
                                Enter basic employee details
                            </div>
                        </div>
                    </div>


                    <div class="p-4">

                        <div class="row g-4">

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Full Name *
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text bg-white">
                                        <i class="bi bi-person"></i>
                                    </span>

                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        value="{{ old('name') }}"
                                        placeholder="Enter full name"
                                        required
                                    >

                                </div>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Email Address *
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text bg-white">
                                        <i class="bi bi-envelope"></i>
                                    </span>

                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        value="{{ old('email') }}"
                                        placeholder="employee@example.com"
                                        required
                                    >

                                </div>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Phone Number
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text bg-white">
                                        <i class="bi bi-telephone"></i>
                                    </span>

                                    <input
                                        type="text"
                                        name="phone"
                                        class="form-control"
                                        value="{{ old('phone') }}"
                                        placeholder="+91 98765 43210"
                                    >

                                </div>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Joining Date *
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text bg-white">
                                        <i class="bi bi-calendar"></i>
                                    </span>

                                    <input
                                        type="date"
                                        name="joining_date"
                                        class="form-control"
                                        value="{{ old('joining_date') }}"
                                        required
                                    >

                                </div>

                            </div>


                            <div class="col-12">

                                <label class="form-label fw-semibold">
                                    Address
                                </label>

                                <textarea
                                    name="address"
                                    class="form-control"
                                    rows="3"
                                    placeholder="Enter employee address"
                                >{{ old('address') }}</textarea>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- JOB INFORMATION -->

            <div class="col-lg-4">

                <div class="content-card h-100">

                    <div class="card-header-custom">

                        <div>
                            <h5 class="section-title">
                                <i class="bi bi-briefcase me-2"></i>
                                Job Details
                            </h5>

                            <div class="section-subtitle">
                                Employment information
                            </div>
                        </div>

                    </div>


                    <div class="p-4">

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Position *
                            </label>

                            <input
                                type="text"
                                name="position"
                                class="form-control"
                                value="{{ old('position') }}"
                                placeholder="e.g. Backend Developer"
                                required
                            >

                        </div>


                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Department *
                            </label>

                            <select
                                name="department"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    Select Department
                                </option>

                                <option value="Development"
                                    {{ old('department') == 'Development' ? 'selected' : '' }}>
                                    Development
                                </option>

                                <option value="Design"
                                    {{ old('department') == 'Design' ? 'selected' : '' }}>
                                    Design
                                </option>

                                <option value="HR"
                                    {{ old('department') == 'HR' ? 'selected' : '' }}>
                                    Human Resources
                                </option>

                                <option value="Marketing"
                                    {{ old('department') == 'Marketing' ? 'selected' : '' }}>
                                    Marketing
                                </option>

                                <option value="Finance"
                                    {{ old('department') == 'Finance' ? 'selected' : '' }}>
                                    Finance
                                </option>

                                <option value="Sales"
                                    {{ old('department') == 'Sales' ? 'selected' : '' }}>
                                    Sales
                                </option>

                            </select>

                        </div>


                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Salary *
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    ₹
                                </span>

                                <input
                                    type="number"
                                    name="salary"
                                    class="form-control"
                                    value="{{ old('salary') }}"
                                    placeholder="50000"
                                    min="0"
                                    step="0.01"
                                    required
                                >

                            </div>

                        </div>


                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Status *
                            </label>

                            <select
                                name="status"
                                class="form-select"
                                required
                            >

                                <option value="Active"
                                    {{ old('status', 'Active') == 'Active' ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="Inactive"
                                    {{ old('status') == 'Inactive' ? 'selected' : '' }}>
                                    Inactive
                                </option>

                            </select>

                        </div>

                    </div>

                </div>

            </div>


            <!-- BUTTONS -->

            <div class="col-12">

                <div class="content-card p-4">

                    <div class="d-flex justify-content-end gap-2">

                        <a
                            href="{{ route('employees.index') }}"
                            class="btn btn-light border px-4"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary-custom px-4"
                        >
                            <i class="bi bi-check-lg me-1"></i>
                            Save Employee
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection