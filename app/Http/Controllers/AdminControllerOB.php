<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminControllerOB extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::user() || !Auth::user()->isAdmin()) {
                abort(403, 'Unauthorized access. Admin only.');
            }
            return $next($request);
        });
    }

    public function dashboard()
    {
        $users = User::all();
        $totalUsers = User::count();
        $admins = User::where('role', 'Admin')->count();
        $teamMembers = User::where('role', 'Team Member')->count();
        $guests = User::where('role', 'Guest')->count();

        return view('admin.dashboard', compact('users', 'totalUsers', 'admins', 'teamMembers', 'guests'));
    }

    public function updateUserRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:Admin,Team Member,Guest'
        ]);

        $user->update(['role' => $request->role]);

        return redirect()->back()->with('success', 'User role updated successfully!');
    }
}