@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>My Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Category</th>
                    <th>Assigned To</th>
                    <th>Deadline</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>
                            <span
                                class="badge bg-{{ $task->status === 'completed' ? 'success' : ($task->status === 'in_progress' ? 'warning' : 'secondary') }}">
                                {{ ucfirst($task->status) }}
                            </span>
                        </td>
                        <td>
                            <span
                                class="badge bg-{{ $task->priority->level >= 4 ? 'danger' : ($task->priority->level >= 3 ? 'warning' : 'info') }}">
                                {{ $task->priority->name }}
                            </span>
                        </td>
                        <td>{{ $task->category->name }}</td>
                        <td>{{ $task->assignedUser->name ?? 'Unassigned' }}</td>
                        <td>{{ date('M d, Y', strtotime($task->deadline)) }}</td>
                        <td>
                            <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this task?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No tasks found. Create your first task!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
