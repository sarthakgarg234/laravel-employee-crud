@extends('layouts.app')

@section('title', 'Users - EmployeeHub')
@section('page-title', 'User Management')

@section('content')
<div class="fade-in">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h2 class="fw-bold mb-1">Registered Users</h2>
            <p class="text-secondary mb-0">
                View and manage registered EmployeeHub accounts.
            </p>
        </div>

        <div class="stat-card">
            <div class="stat-icon icon-purple">
                <i class="bi bi-people-fill"></i>
            </div>
            <div class="stat-number">{{ number_format($totalUsers) }}</div>
            <div class="stat-label">Total Registered Users</div>
        </div>
    </div>

    {{-- Success and error messages --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
        </div>
    @endif

    <div class="content-card slide-up">

        <div class="card-header-custom">
            <div>
                <h5 class="section-title">User Directory</h5>
                <div class="section-subtitle">
                    Search and manage registered accounts
                </div>
            </div>

            <form action="{{ route('users.index') }}"
                  method="GET"
                  class="search-box">
                <i class="bi bi-search"></i>
                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Search name or email..."
                    aria-label="Search users"
                >
            </form>
        </div>

        <div class="table-container">
            <table class="table employee-table">
                <thead>
                    <tr>
                        <th>S. No</th>
                        <th>User</th>
                        <th>Email Address</th>
                        <th>Registered On</th>
                        @if (auth()->user()->is_admin)
                            <th class="text-center">Actions</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $users->firstItem() + $loop->index }}</td>

                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="profile-avatar">
                                        {{ collect(preg_split('/\s+/', trim($user->name)))
                                            ->filter()
                                            ->map(fn ($part) => strtoupper(substr($part, 0, 1)))
                                            ->take(2)
                                            ->implode('') }}
                                    </div>

                                    <div>
                                        <span class="fw-semibold">
                                            {{ $user->name }}
                                        </span>

                                        @if ($user->is_admin)
                                            <span class="badge bg-primary ms-1">
                                                Admin
                                            </span>
                                        @endif

                                        @if (auth()->id() === $user->id)
                                            <span class="badge bg-secondary ms-1">
                                                You
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <td>{{ $user->email }}</td>

                            <td>
                                {{ $user->created_at?->format('d M Y, h:i A') ?? 'N/A' }}
                            </td>

                            @if (auth()->user()->is_admin)
                                <td class="text-center">
                                    @if (auth()->id() !== $user->id)
                                        <form
                                            action="{{ route('users.destroy', $user) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete {{ addslashes($user->name) }}? This action cannot be undone.');"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-outline-danger btn-sm"
                                                    title="Delete user">
                                                <i class="bi bi-trash3 me-1"></i>
                                                Delete
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-secondary small">
                                            Current account
                                        </span>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ auth()->user()->is_admin ? 5 : 4 }}"
                                class="text-center py-5">
                                <i class="bi bi-people fs-2 text-secondary"></i>
                                <p class="mt-2 mb-0">
                                    No users found.
                                </p>

                                @if ($search)
                                    <a href="{{ route('users.index') }}"
                                       class="btn btn-outline-secondary btn-sm mt-3">
                                        Clear Search
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($users->hasPages())
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 p-3">
                <small class="text-secondary">
                    Showing {{ $users->firstItem() }}–{{ $users->lastItem() }}
                    of {{ $users->total() }} users
                </small>

                {{ $users->links() }}
            </div>
        @endif

    </div>
</div>
@endsection