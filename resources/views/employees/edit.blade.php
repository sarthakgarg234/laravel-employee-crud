@extends('layouts.app')

@section('title', 'Edit Employee - EmployeeHub')
@section('page-title', 'Edit Employee')

@section('content')

<div class="fade-in">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Edit Employee
            </h2>

            <p class="text-secondary mb-0">
                Update {{ $employee->name }}'s information.
            </p>
        </div>

        <a
            href="{{ route('employees.index') }}"
            class="btn btn-light border"
        >
            <i class="bi bi-arrow-left me-1"></i>
            Back
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


    <form
        action="{{ route('employees.update', $employee) }}"
        method="POST"
    >

        @csrf
        @method('PUT')


        <div class="row g-4">

            <div class="col-lg-8">

                <div class="content-card">

                    <div class="card-header-custom">

                        <div>

                            <h5 class="section-title">
                                <i class="bi bi-person me-2"></i>
                                Personal Information
                            </h5>

                            <div class="section-subtitle">
                                Update employee details
                            </div>

                        </div>

                    </div>


                    <div class="p-4">

                        <div class="row g-4">

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Full Name *
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    value="{{ old('name', $employee->name) }}"
                                    required
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Email Address *
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ old('email', $employee->email) }}"
                                    required
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Phone Number
                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    value="{{ old('phone', $employee->phone) }}"
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Joining Date *
                                </label>

                                <input
                                    type="date"
                                    name="joining_date"
                                    class="form-control"
                                    value="{{ old('joining_date', $employee->joining_date?->format('Y-m-d')) }}"
                                    required
                                >

                            </div>


                            <div class="col-12">

                                <label class="form-label fw-semibold">
                                    Address
                                </label>

                                <textarea
                                    name="address"
                                    class="form-control"
                                    rows="3"
                                >{{ old('address', $employee->address) }}</textarea>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-lg-4">

                <div class="content-card">

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
                                value="{{ old('position', $employee->position) }}"
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

                                @foreach([
                                    'Development',
                                    'Design',
                                    'HR',
                                    'Marketing',
                                    'Finance',
                                    'Sales'
                                ] as $department)

                                    <option
                                        value="{{ $department }}"
                                        {{ old('department', $employee->department) == $department ? 'selected' : '' }}
                                    >
                                        {{ $department }}
                                    </option>

                                @endforeach

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
                                    value="{{ old('salary', $employee->salary) }}"
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

                                <option
                                    value="Active"
                                    {{ old('status', $employee->status) == 'Active' ? 'selected' : '' }}
                                >
                                    Active
                                </option>

                                <option
                                    value="Inactive"
                                    {{ old('status', $employee->status) == 'Inactive' ? 'selected' : '' }}
                                >
                                    Inactive
                                </option>

                            </select>

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-12">

                <div class="content-card p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <a
                            href="{{ route('employees.show', $employee) }}"
                            class="btn btn-light border"
                        >
                            <i class="bi bi-eye me-1"></i>
                            View Employee
                        </a>


                        <div class="d-flex gap-2">

                            <a
                                href="{{ route('employees.index') }}"
                                class="btn btn-light border"
                            >
                                Cancel
                            </a>

                            <button
                                type="submit"
                                class="btn btn-primary-custom"
                            >
                                <i class="bi bi-save me-1"></i>
                                Update Employee
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection