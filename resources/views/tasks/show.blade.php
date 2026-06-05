@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Task Details</h4>
                    <span
                        class="badge bg-{{ $task->status === 'completed' ? 'success' : ($task->status === 'in_progress' ? 'warning' : 'secondary') }} fs-6">
                        {{ ucfirst($task->status) }}
                    </span>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="border-bottom pb-2">Task Information</h5>
                        <div class="row mt-3">
                            <div class="col-md-3 fw-bold">Title:</div>
                            <div class="col-md-9">{{ $task->title }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 fw-bold">Description:</div>
                            <div class="col-md-9">{{ $task->description ?? 'No description provided.' }}</div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="border-bottom pb-2">Assignment</h5>
                        <div class="row mt-3">
                            <div class="col-md-3 fw-bold">Assigned To:</div>
                            <div class="col-md-9">{{ $task->assignedUser->name ?? 'Unassigned' }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 fw-bold">Created By:</div>
                            <div class="col-md-9">{{ $task->createdBy->name ?? 'Unknown' }}</div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="border-bottom pb-2">Timeline</h5>
                        <div class="row mt-3">
                            <div class="col-md-3 fw-bold">Deadline:</div>
                            <div class="col-md-9">
                                <span class="badge bg-{{ now()->gt($task->deadline) ? 'danger' : 'success' }}">
                                    {{ date('F d, Y', strtotime($task->deadline)) }}
                                </span>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 fw-bold">Created At:</div>
                            <div class="col-md-9">{{ $task->created_at->format('F d, Y g:i A') }}</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 fw-bold">Last Updated:</div>
                            <div class="col-md-9">{{ $task->updated_at->format('F d, Y g:i A') }}</div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="border-bottom pb-2">Classification</h5>
                        <div class="row mt-3">
                            <div class="col-md-3 fw-bold">Category:</div>
                            <div class="col-md-9">
                                <span class="badge bg-secondary">{{ $task->category->name }}</span>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 fw-bold">Priority:</div>
                            <div class="col-md-9">
                                <span
                                    class="badge bg-{{ $task->priority->level >= 4 ? 'danger' : ($task->priority->level >= 3 ? 'warning' : 'info') }}">
                                    {{ $task->priority->name }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Back to Tasks
                        </a>
                        <div>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">
                                Edit Task
                            </a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this task?')">
                                    Delete Task
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
