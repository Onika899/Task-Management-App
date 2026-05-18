@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold">My Tasks</h1>
            <p class="text-muted">Manage your daily tasks</p>
        </div>

        <a href="{{ route('tasks.create') }}" class="btn btn-main">
            <i class="fas fa-plus me-2"></i>
            Create Task
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">

        @forelse($tasks as $task)

            <div class="col-lg-6 mb-4">

                <div class="task-card">

                    <div class="d-flex justify-content-between align-items-start mb-3">

                        <div>
                            <h4>{{ $task->title }}</h4>

                            @if($task->priority == 'High')
                                <span class="badge bg-danger">High</span>
                            @elseif($task->priority == 'Medium')
                                <span class="badge bg-warning text-dark">Medium</span>
                            @else
                                <span class="badge bg-info">Low</span>
                            @endif
                        </div>

                        <span class="badge bg-dark">
                            {{ $task->status }}
                        </span>

                    </div>

                    <p>
                        {{ $task->description ?? 'No description available.' }}
@endsection