<?php

namespace App\Http\Controllers;

use App\Models\TaskOB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardControllerOB extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->isAdmin()) {
            $totalTasks = TaskOB::count();
            $completedTasks = TaskOB::where('status', 'Completed')->count();
            $pendingTasks = TaskOB::where('status', 'Pending')->count();
            $inProgressTasks = TaskOB::where('status', 'In Progress')->count();
            $overdueTasks = TaskOB::where('deadline', '<', now())->count();
            $users = User::count();
        } else {
            $totalTasks = $user->tasks()->count();
            $completedTasks = $user->tasks()->where('status', 'Completed')->count();
            $pendingTasks = $user->tasks()->where('status', 'Pending')->count();
            $inProgressTasks = $user->tasks()->where('status', 'In Progress')->count();
            $overdueTasks = $user->tasks()->where('deadline', '<', now())->count();
            $users = 1;
        }
        
        $recentTasks = TaskOB::with(['category', 'assignedUsers'])
            ->latest()
            ->take(5)
            ->get();
        
        return view('dashboard', compact(
            'totalTasks', 'completedTasks', 'pendingTasks', 
            'inProgressTasks', 'overdueTasks', 'users', 'recentTasks'
        ));
    }
}
