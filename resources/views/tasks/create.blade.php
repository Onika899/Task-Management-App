@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="form-wrapper">

        <div class="form-header">
            <h2>Create New Task</h2>
            <p>Add a new task to your workflow</p>
        </div>

        <form method="POST" action="{{ route('tasks.store') }}">

            @csrf

            <div class="mb-3">
                <label>Task Title</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description"
                          class="form-control"
                          rows="5"></textarea>
            </div>

            <div class="row">

                <div class="col-md-4 mb-3">
                    <label>Priority</label>
                    <select name="priority" class="form-select">
                        <option>Low</option>
                        <option selected>Medium</option>
                        <option>High</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Status</label>
                    <select name="status" class="form-select">
                        <option>Pending</option>
                        <option>In Progress</option>
                        <option>Completed</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Deadline</label>
                    <input type="date" name="deadline" class="form-control">
                </div>

            </div>

            <div class="mb-4">
@endsection