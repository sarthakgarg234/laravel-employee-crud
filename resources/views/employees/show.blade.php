@extends('layouts.app')

@section('title', 'Employee Details - EmployeeHub')
@section('page-title', 'Employee Details')

@section('content')

<div class="fade-in">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Employee Profile
            </h2>

            <p class="text-secondary mb-0">
                Complete information about the employee.
            </p>

        </div>


        <div class="d-flex gap-2">

            <a
                href="{{ route('employees.index') }}"
                class="btn btn-light border"
            >
                <i class="bi bi-arrow-left me-1"></i>
                Back
            </a>

            <a
                href="{{ route('employees.edit', $employee) }}"
                class="btn btn-primary-custom"
            >
                <i class="bi bi-pencil me-1"></i>
                Edit
            </a>

        </div>

    </div>


    <div class="row g-4">

        <!-- PROFILE -->

        <div class="col-lg-4">

            <div class="content-card text-center p-4">

                <div
                    class="employee-avatar mx-auto mb-3"
                    style="
                        width:100px;
                        height:100px;
                        border-radius:25px;
                        font-size:38px;
                    "
                >
                    {{ strtoupper(substr($employee->name, 0, 1)) }}
                </div>


                <h3 class="fw-bold mb-1">
                    {{ $employee->name }}
                </h3>


                <p class="text-secondary mb-3">
                    {{ $employee->position }}
                </p>


                @if($employee->status === 'Active')

                    <span class="badge-active">
                        <i class="bi bi-check-circle-fill me-1"></i>
                        Active Employee
                    </span>

                @else

                    <span class="badge-inactive">
                        <i class="bi bi-x-circle-fill me-1"></i>
                        Inactive Employee
                    </span>

                @endif


                <hr class="my-4">


                <div class="text-start">

                    <div class="mb-3">

                        <small class="text-secondary d-block">
                            Email
                        </small>

                        <strong>
                            <i class="bi bi-envelope me-2"></i>
                            {{ $employee->email }}
                        </strong>

                    </div>


                    <div class="mb-3">

                        <small class="text-secondary d-block">
                            Phone
                        </small>

                        <strong>
                            <i class="bi bi-telephone me-2"></i>
                            {{ $employee->phone ?: 'Not provided' }}
                        </strong>

                    </div>


                    <div>

                        <small class="text-secondary d-block">
                            Joining Date
                        </small>

                        <strong>
                            <i class="bi bi-calendar me-2"></i>

                            {{ $employee->joining_date->format('d M Y') }}

                        </strong>

                    </div>

                </div>

            </div>

        </div>


        <!-- JOB DETAILS -->

        <div class="col-lg-8">

            <div class="content-card">

                <div class="card-header-custom">

                    <div>

                        <h5 class="section-title">
                            <i class="bi bi-briefcase me-2"></i>
                            Employment Information
                        </h5>

                        <div class="section-subtitle">
                            Job and salary information
                        </div>

                    </div>

                </div>


                <div class="p-4">

                    <div class="row g-4">

                        <div class="col-md-6">

                            <div class="p-3 rounded-3 bg-light">

                                <small class="text-secondary">
                                    Position
                                </small>

                                <div class="fw-bold mt-1">
                                    {{ $employee->position }}
                                </div>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="p-3 rounded-3 bg-light">

                                <small class="text-secondary">
                                    Department
                                </small>

                                <div class="fw-bold mt-1">
                                    {{ $employee->department }}
                                </div>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="p-3 rounded-3 bg-light">

                                <small class="text-secondary">
                                    Monthly Salary
                                </small>

                                <div class="fw-bold mt-1 fs-5">
                                    ₹{{ number_format($employee->salary, 2) }}
                                </div>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="p-3 rounded-3 bg-light">

                                <small class="text-secondary">
                                    Employee ID
                                </small>

                                <div class="fw-bold mt-1">
                                    #{{ str_pad($employee->id, 4, '0', STR_PAD_LEFT) }}
                                </div>

                            </div>

                        </div>


                        <div class="col-12">

                            <div class="p-3 rounded-3 bg-light">

                                <small class="text-secondary">
                                    Address
                                </small>

                                <div class="fw-semibold mt-1">

                                    @if($employee->address)

                                        {{ $employee->address }}

                                    @else

                                        <span class="text-secondary">
                                            Address not provided
                                        </span>

                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- DELETE -->

            <div class="content-card mt-4 p-4">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h6 class="fw-bold mb-1">
                            Delete Employee
                        </h6>

                        <small class="text-secondary">
                            This action cannot be undone.
                        </small>

                    </div>


                    <form
                        action="{{ route('employees.destroy', $employee) }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to permanently delete this employee?')"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-outline-danger"
                        >
                            <i class="bi bi-trash me-1"></i>
                            Delete Employee
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection