<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Only admins can access user management
        if (!auth()->user()->is_admin) {
            return response()->view('errors.admin-only', [], 403);
        }

        $search = $request->input('search');

        $users = User::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $totalUsers = User::count();

        return view('users.index', compact(
            'users',
            'search',
            'totalUsers'
        ));
    }

    public function destroy(User $user)
    {
        // Only admins can delete users
        abort_unless(auth()->user()->is_admin, 403);

        // Prevent deleting your own account
        if (auth()->id() === $user->id) {
            return redirect()
                ->route('users.index')
                ->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}