@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Dashboard</h1>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Tasks</h5>
                    <h2 class="mb-0">{{ $stats['total_tasks'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-secondary">
                <div class="card-body">
                    <h5 class="card-title">Pending</h5>
                    <h2 class="mb-0">{{ $stats['pending_tasks'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">In Progress</h5>
                    <h2 class="mb-0">{{ $stats['in_progress_tasks'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Completed</h5>
                    <h2 class="mb-0">{{ $stats['completed_tasks'] }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Tasks -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Recent Tasks</h5>
                </div>
                <div class="card-body">
                    @if ($stats['recent_tasks']->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Assigned To</th>
                                        <th>Deadline</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stats['recent_tasks'] as $task)
                                        <tr>
                                            <td>{{ Str::limit($task->title, 30) }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $task->priority->level >= 4 ? 'danger' : ($task->priority->level >= 3 ? 'warning' : 'info') }}">
                                                    {{ $task->priority->name }}
                                                </span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $task->status === 'completed' ? 'success' : ($task->status === 'in_progress' ? 'warning' : 'secondary') }}">
                                                    {{ ucfirst($task->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $task->assignedUser->name ?? 'Unassigned' }}</td>
                                            <td>{{ date('M d, Y', strtotime($task->deadline)) }}</td>
                                            <td>
                                                <a href="{{ route('tasks.show', $task) }}"
                                                    class="btn btn-sm btn-info">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center">No tasks found. <a href="{{ route('tasks.create') }}">Create your first
                                task!</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
