<?php

namespace App\Http\Controllers;

use App\Models\TaskOB;
use App\Models\CategoryOB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskControllerOB extends Controller
{
    public function __construct()
{
    // $this->authorizeResource(TaskOB::class, 'task');
}

    public function index()
    {
        $user = Auth::user();
        
        if ($user->isAdmin()) {
            $tasks = TaskOB::with(['category', 'assignedUsers', 'creator'])->get();
        } else {
            $tasks = $user->tasks()->with(['category', 'creator'])->get();
        }
        
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $categories = CategoryOB::all();
        $users = User::all();
        return view('tasks.create', compact('categories', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Pending,In Progress,Completed',
            'deadline' => 'nullable|date',
            'category_id' => 'nullable|exists:categories,id',
            'assigned_users' => 'array|exists:users,id'
        ]);

        $task = TaskOB::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'priority' => $validated['priority'],
            'status' => $validated['status'],
            'deadline' => $validated['deadline'] ?? null,
            'category_id' => $validated['category_id'] ?? null,
            'created_by' => Auth::id()
        ]);

        if (isset($validated['assigned_users'])) {
            $task->assignedUsers()->attach($validated['assigned_users']);
        }

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    public function show(TaskOB $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(TaskOB $task)
    {
        $categories = CategoryOB::all();
        $users = User::all();
        return view('tasks.edit', compact('task', 'categories', 'users'));
    }

    public function update(Request $request, TaskOB $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Pending,In Progress,Completed',
            'deadline' => 'nullable|date',
            'category_id' => 'nullable|exists:categories,id',
            'assigned_users' => 'array|exists:users,id'
        ]);

        $task->update($validated);

        $task->assignedUsers()->sync($validated['assigned_users'] ?? []);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    public function destroy(TaskOB $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}