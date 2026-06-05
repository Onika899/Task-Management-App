<?php

namespace App\Http\Controllers;

use App\Models\TaskJS;
use App\Models\CategoryJS;
use App\Models\PriorityJS;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskControllerJS extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $tasks = TaskJS::with(['assignedUser', 'category', 'priority'])->get();
        } else {
            $tasks = TaskJS::with(['assignedUser', 'category', 'priority'])
                ->where('assigned_to', $user->id)
                ->orWhere('created_by', $user->id)
                ->get();
        }

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $categories = CategoryJS::all();
        $priorities = PriorityJS::all();
        $users = User::where('role', '!=', 'guest')->get();

        return view('tasks.create', compact('categories', 'priorities', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date',
            'assigned_to' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'priority_id' => 'required|exists:priorities,id',
        ]);

        $validated['created_by'] = Auth::id();
        $validated['status'] = 'pending';

        TaskJS::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task created!');
    }

    public function show(TaskJS $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(TaskJS $task)
    {
        $categories = CategoryJS::all();
        $priorities = PriorityJS::all();
        $users = User::where('role', '!=', 'guest')->get();

        return view('tasks.edit', compact('task', 'categories', 'priorities', 'users'));
    }

    public function update(Request $request, TaskJS $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'deadline' => 'required|date',
            'assigned_to' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'priority_id' => 'required|exists:priorities,id',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated!');
    }

    public function destroy(TaskJS $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }

    public function updateStatus(Request $request, TaskJS $task)
    {
        $request->validate([
            'status' => 'required|in:pending,in_progress,completed'
        ]);

        $task->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status updated!');
    }
}
