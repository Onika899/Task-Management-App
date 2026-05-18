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
                <a href="{{ route('dashboard') }}" class="active">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('tasks.index') }}">
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

            <li>
                <a href="#">
                    <i class="fas fa-user"></i>
                    Profile
                </a>
            </li>

        </ul>

    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">

        <!-- TOPBAR -->
        <div class="topbar">

            <h2>Dashboard</h2>

            <div class="user-box">

                <i class="fas fa-user-circle"></i>

                <span>{{ Auth::user()->name }}</span>

            </div>

        </div>

        <!-- CARDS -->
        <div class="stats-grid">

            <div class="stat-card">

                <div>
                    <h3>{{ $totalTasks }}</h3>
                    <p>Total Tasks</p>
                </div>

                <i class="fas fa-tasks"></i>

            </div>

            <div class="stat-card success">

                <div>
                    <h3>{{ $completedTasks }}</h3>
                    <p>Completed</p>
                </div>

                <i class="fas fa-check-circle"></i>

            </div>

            <div class="stat-card warning">

                <div>
                    <h3>{{ $pendingTasks }}</h3>
                    <p>Pending</p>
                </div>

                <i class="fas fa-clock"></i>

            </div>

            <div class="stat-card danger">

                <div>
                    <h3>{{ $overdueTasks }}</h3>
                    <p>Overdue</p>
                </div>

                <i class="fas fa-exclamation-circle"></i>

            </div>

        </div>

        <!-- RECENT TASKS -->
        <div class="task-section">

            <div class="section-header">

                <h4>Recent Tasks</h4>

                <a href="{{ route('tasks.index') }}" class="view-btn">
                    View All
                </a>

            </div>

            <table class="table">

                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Due Date</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($recentTasks as $task)

                    <tr>

                        <td>{{ $task->title }}</td>

                        <td>
                            <span class="badge bg-primary">
                                {{ $task->status }}
                            </span>
                        </td>

                        <td>{{ $task->due_date }}</td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

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
    color:white;
    text-decoration:none;
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
    padding:30px;
}

.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
}

.user-box{
    display:flex;
    align-items:center;
    background:white;
    padding:10px 20px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

.user-box i{
    font-size:22px;
    margin-right:10px;
}

/* CARDS */

.stats-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    margin-bottom:30px;
}

.stat-card{
    background:white;
    padding:25px;
    border-radius:18px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 10px 25px rgba(0,0,0,0.05);
}

.stat-card i{
    font-size:40px;
    color:#2a5298;
}

.success i{
    color:#28a745;
}

.warning i{
    color:#ffc107;
}

.danger i{
    color:#dc3545;
}

/* TABLE */

.task-section{
    background:white;
    border-radius:18px;
    padding:25px;
    box-shadow:0 10px 25px rgba(0,0,0,0.05);
}

.section-header{
    display:flex;
    justify-content:space-between;
    margin-bottom:20px;
}

.view-btn{
    text-decoration:none;
    color:#2a5298;
    font-weight:600;
}

table{
    width:100%;
}

</style>

@endsection