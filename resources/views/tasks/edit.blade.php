@extends('layouts.app')

@section('content')

<div class="dashboard-container">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="logo-section">
            <i class="fas fa-tasks"></i>
            <span>Task Manager</span>
        </div>

        <ul class="sidebar-menu">

            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('tasks.index') }}" class="active">
                    <i class="fas fa-list-check"></i>
                    Tasks
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-users"></i>
                    Users
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-layer-group"></i>
                    Categories
                </a>
            </li>

        </ul>

    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">

        <!-- PAGE HEADER -->
        <div class="topbar">

            <div>

                <h2>Edit Task</h2>

                <p class="text-muted">
                    Update and manage task details
                </p>

            </div>

        </div>

        <!-- FORM CARD -->
        <div class="form-card">

            <form method="POST"
                  action="{{ route('tasks.update', $task) }}">

                @csrf
                @method('PUT')

                <!-- TITLE -->
                <div class="form-group">

                    <label class="form-label">

                        Task Title *

                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $task->title) }}"
                        class="form-control"
                        placeholder="Enter task title"
                        required
                    >

                </div>

                <!-- DESCRIPTION -->
                <div class="form-group">

                    <label class="form-label">

                        Description

                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="form-control"
                        placeholder="Enter task description"
                    >{{ old('description', $task->description) }}</textarea>

                </div>

                <!-- ROW -->
                <div class="row">

                    <!-- PRIORITY -->
                    <div class="col-md-4">

                        <div class="form-group">

                            <label class="form-label">

                                Priority

                            </label>

                            <select
                                name="priority"
                                class="form-select"
                            >

                                <option value="Low"
                                    {{ $task->priority == 'Low' ? 'selected' : '' }}>
                                    Low
                                </option>

                                <option value="Medium"
                                    {{ $task->priority == 'Medium' ? 'selected' : '' }}>
                                    Medium
                                </option>

                                <option value="High"
                                    {{ $task->priority == 'High' ? 'selected' : '' }}>
                                    High
                                </option>

                            </select>

                        </div>

                    </div>

                    <!-- STATUS -->
                    <div class="col-md-4">

                        <div class="form-group">

                            <label class="form-label">

                                Status

                            </label>

                            <select
                                name="status"
                                class="form-select"
                            >

                                <option value="Pending"
                                    {{ $task->status == 'Pending' ? 'selected' : '' }}>
                                    Pending
                                </option>

                                <option value="In Progress"
                                    {{ $task->status == 'In Progress' ? 'selected' : '' }}>
                                    In Progress
                                </option>

                                <option value="Completed"
                                    {{ $task->status == 'Completed' ? 'selected' : '' }}>
                                    Completed
                                </option>

                            </select>

                        </div>

                    </div>

                    <!-- DEADLINE -->
                    <div class="col-md-4">

                        <div class="form-group">

                            <label class="form-label">

                                Deadline

                            </label>

                            <input
                                type="date"
                                name="deadline"
                                value="{{ old('deadline', $task->deadline) }}"
                                class="form-control"
                            >

                        </div>

                    </div>

                </div>

                <!-- CATEGORY -->
                <div class="form-group">

                    <label class="form-label">

                        Category

                    </label>

                    <select
                        name="category_id"
                        class="form-select"
                    >

                        <option value="">
                            Select Category
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ $task->category_id == $category->id ? 'selected' : '' }}
                            >

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- ASSIGNED USERS -->
                @if(Auth::user()->isAdmin())

                <div class="form-group">

                    <label class="form-label">

                        Assign Users

                    </label>

                    <select
                        name="assigned_users[]"
                        class="form-select"
                        multiple
                        size="5"
                    >

                        @foreach($users as $user)

                            <option
                                value="{{ $user->id }}"
                                {{ $task->assignedUsers->contains($user->id) ? 'selected' : '' }}
                            >

                                {{ $user->name }}
                                ({{ $user->role }})

                            </option>

                        @endforeach

                    </select>

                    <small class="text-muted">
                        Hold Ctrl to select multiple users
                    </small>

                </div>

                @endif

                <!-- BUTTONS -->
                <div class="button-group">

                    <button type="submit"
                            class="btn-save">

                        <i class="fas fa-save me-2"></i>

                        Update Task

                    </button>

                    <a href="{{ route('tasks.index') }}"
                       class="btn-cancel">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<style>

body{
    background:#f4f7fc;
    font-family:'Poppins',sans-serif;
}

/* LAYOUT */

.dashboard-container{
    display:flex;
    min-height:100vh;
}

/* SIDEBAR */

.sidebar{
    width:260px;
    background:linear-gradient(180deg,#1e3c72,#2a5298);
    color:white;
    padding:30px 20px;
}

.logo-section{
    font-size:24px;
    font-weight:700;
    margin-bottom:50px;
}

.logo-section i{
    margin-right:10px;
}

.sidebar-menu{
    list-style:none;
    padding:0;
}

.sidebar-menu li{
    margin-bottom:15px;
}

.sidebar-menu a{
    display:flex;
    align-items:center;
    text-decoration:none;
    color:white;
    padding:14px 18px;
    border-radius:12px;
    transition:0.3s;
}

.sidebar-menu a:hover,
.sidebar-menu a.active{
    background:rgba(255,255,255,0.15);
}

.sidebar-menu i{
    margin-right:12px;
}

/* MAIN CONTENT */

.main-content{
    flex:1;
    padding:35px;
}

.topbar{
    margin-bottom:30px;
}

/* FORM CARD */

.form-card{
    background:white;
    padding:35px;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.05);
}

.form-group{
    margin-bottom:25px;
}

.form-label{
    font-weight:600;
    margin-bottom:10px;
}

.form-control,
.form-select{
    height:55px;
    border-radius:12px;
    border:1px solid #dfe3ea;
}

textarea.form-control{
    height:auto;
    padding:15px;
}

.form-control:focus,
.form-select:focus{
    box-shadow:none;
    border-color:#2a5298;
}

/* BUTTONS */

.button-group{
    display:flex;
    gap:15px;
    margin-top:30px;
}

.btn-save{
    background:linear-gradient(135deg,#1e3c72,#2a5298);
    color:white;
    border:none;
    padding:14px 24px;
    border-radius:12px;
    font-weight:600;
    transition:0.3s;
}

.btn-save:hover{
    opacity:0.9;
}

.btn-cancel{
    background:#e2e8f0;
    color:#333;
    padding:14px 24px;
    border-radius:12px;
    text-decoration:none;
    font-weight:600;
}

/* RESPONSIVE */

@media(max-width:992px){

    .sidebar{
        display:none;
    }

    .main-content{
        width:100%;
    }

}

</style>

@endsection