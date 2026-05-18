@extends('layouts.app')

@section('content')
<div class="auth-container">

    <div class="auth-left">
        <div class="left-content">
            <div class="brand">
                <i class="fas fa-tasks"></i>
                <h1>Task Manager Pro</h1>
            </div>

            <h2>Welcome Back</h2>

            <p>
                Login and continue managing your tasks,
                deadlines, projects and productivity.
            </p>
        </div>
    </div>

    <div class="auth-right">

        <div class="form-card">

            <div class="text-center mb-4">
                <div class="icon-circle">
                    <i class="fas fa-sign-in-alt"></i>
                </div>

                <h2>Login</h2>
                <p class="text-muted">Access your account</p>
            </div>

            <form method="POST" action="{{ route('login') }}">

                @csrf

                <div class="mb-3">
                    <label>Email Address</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="example@email.com"
                           required>

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Enter password"
                           required>

                    @error('password')
                        <div class="invalid-feedback">
@endsection