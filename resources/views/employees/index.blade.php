@extends('layouts.app')

@section('title', 'Employees - EmployeeHub')
@section('page-title', 'Employee Dashboard')

@section('content')

<div class="fade-in">

    <!-- PAGE HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Employees
            </h2>

            <p class="text-secondary mb-0">
                Manage and monitor your team members.
            </p>
        </div>

        <a href="{{ route('employees.create') }}"
           class="btn btn-primary-custom">

            <i class="bi bi-plus-lg me-1"></i>

            Add Employee

        </a>

    </div>


    <!-- STAT CARDS -->

    <div class="row g-4 mb-4">

        <div class="col-xl-3 col-md-6">
            <div class="stat-card slide-up">

                <div class="stat-icon icon-purple">
                    <i class="bi bi-people-fill"></i>
                </div>

                <div class="stat-number">
                    {{ $totalEmployees }}
                </div>

                <div class="stat-label">
                    Total Employees
                </div>

            </div>
        </div>


        <div class="col-xl-3 col-md-6">
            <div class="stat-card slide-up" style="animation-delay:.1s">

                <div class="stat-icon icon-green">
                    <i class="bi bi-person-check-fill"></i>
                </div>

                <div class="stat-number">
                    {{ $activeEmployees }}
                </div>

                <div class="stat-label">
                    Active Employees
                </div>

            </div>
        </div>


        <div class="col-xl-3 col-md-6">
            <div class="stat-card slide-up" style="animation-delay:.2s">

                <div class="stat-icon icon-red">
                    <i class="bi bi-person-x-fill"></i>
                </div>

                <div class="stat-number">
                    {{ $inactiveEmployees }}
                </div>

                <div class="stat-label">
                    Inactive Employees
                </div>

            </div>
        </div>


        <div class="col-xl-3 col-md-6">
            <div class="stat-card slide-up" style="animation-delay:.3s">

                <div class="stat-icon icon-blue">
                    <i class="bi bi-building-fill"></i>
                </div>

                <div class="stat-number">
                    {{ $departments }}
                </div>

                <div class="stat-label">
                    Departments
                </div>

            </div>
        </div>

    </div>


    <!-- EMPLOYEE TABLE -->

    <div class="content-card slide-up">

        <div class="card-header-custom">

            <div>
                <h5 class="section-title">
                    Employee Directory
                </h5>

                <div class="section-subtitle">
                    View and manage all employees
                </div>
            </div>


            <form
                action="{{ route('employees.index') }}"
                method="GET"
                class="search-box"
            >

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Search employees..."
                >

            </form>

        </div>


        <div class="table-container">

            <table class="table employee-table">

                <thead>

                    <tr>

                        <th>Employee</th>

                        <th>Position</th>

                        <th>Department</th>

                        <th>Salary</th>

                        <th>Status</th>

                        <th class="text-end">Actions</th>

                    </tr>

                </thead>


                <tbody>

                @forelse($employees as $employee)

                    <tr>

                        <td>

                            <div class="employee-info">

                                <div class="employee-avatar">

                                    {{ strtoupper(substr($employee->name, 0, 1)) }}

                                </div>

                                <div>

                                    <div class="employee-name">
                                        {{ $employee->name }}
                                    </div>

                                    <div class="employee-email">
                                        {{ $employee->email }}
                                    </div>

                                </div>

                            </div>

                        </td>


                        <td>
                            {{ $employee->position }}
                        </td>


                        <td>
                            {{ $employee->department }}
                        </td>


                        <td>
                            ₹{{ number_format($employee->salary, 2) }}
                        </td>


                        <td>

                            @if($employee->status === 'Active')

                                <span class="badge-active">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    Active
                                </span>

                            @else

                                <span class="badge-inactive">
                                    <i class="bi bi-x-circle-fill me-1"></i>
                                    Inactive
                                </span>

                            @endif

                        </td>


                        <td class="text-end">

                            <div class="d-flex justify-content-end gap-2">

                                <a
                                    href="{{ route('employees.show', $employee) }}"
                                    class="btn-action btn-view"
                                    title="View"
                                >
                                    <i class="bi bi-eye"></i>
                                </a>


                                <a
                                    href="{{ route('employees.edit', $employee) }}"
                                    class="btn-action btn-edit"
                                    title="Edit"
                                >
                                    <i class="bi bi-pencil"></i>
                                </a>


                                <form
                                    action="{{ route('employees.destroy', $employee) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this employee?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-action btn-delete"
                                        title="Delete"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6">

                            <div class="text-center py-5">

                                <div
                                    class="stat-icon icon-purple mx-auto"
                                    style="width:70px;height:70px;font-size:28px;"
                                >
                                    <i class="bi bi-people"></i>
                                </div>

                                <h5 class="fw-bold mt-3">
                                    No Employees Found
                                </h5>

                                <p class="text-secondary">
                                    Start by adding your first employee.
                                </p>

                                <a
                                    href="{{ route('employees.create') }}"
                                    class="btn btn-primary-custom"
                                >
                                    <i class="bi bi-plus-lg me-1"></i>
                                    Add Employee
                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>


        @if($employees->hasPages())

            <div class="p-4 border-top">

                {{ $employees->links() }}

            </div>

        @endif

    </div>

</div>

@endsection