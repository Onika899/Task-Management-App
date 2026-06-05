<?php

namespace App\Http\Controllers;

use App\Models\TaskJS;
use Illuminate\Support\Facades\Auth;

class DashboardControllerJS extends Controller
{
    public function index()
    {
        $stats = [
            'total_tasks' => TaskJS::count(),
            'pending_tasks' => TaskJS::where('status', 'pending')->count(),
            'in_progress_tasks' => TaskJS::where('status', 'in_progress')->count(),
            'completed_tasks' => TaskJS::where('status', 'completed')->count(),
            'recent_tasks' => TaskJS::with(['assignedUser', 'priority'])
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get(),
        ];

        return view('dashboard', compact('stats'));
    }
}
