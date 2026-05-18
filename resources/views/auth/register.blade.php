@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6 col-lg-5">
            <div class="card-modern p-4">
                <div class="text-center mb-4">
                    <i class="fas fa-tasks fa-3x" style="color: #667eea;"></i>
                    <h2 class="mt-3 fw-bold">Create Account</h2>
                    <p class="text-muted">Join Task Manager to organize your tasks</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-user me-2 text-primary"></i>Full Name
                        </label>
                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="Enter your full name"
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-envelope me-2 text-primary"></i>Email Address
                        </label>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="example@email.com"
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-lock me-2 text-primary"></i>Password
                        </label>
                        <input type="password"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Create password"
                               required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-check-circle me-2 text-primary"></i>Confirm Password
                        </label>
                        <input type="password"
                               name="password_confirmation"
                               class="form-control"
                               placeholder="Confirm password"
                               required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-user-plus me-2"></i>Register
                        </button>
                    </div>

                    <div class="text-center mt-4">
                        <p class="text-muted mb-0">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-decoration-none fw-semibold" style="color: #667eea;">
                                Login here
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .min-vh-100 {
        min-height: 100vh;
    }
    .card-modern {
        background: white;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }
    .form-control, .btn {
        border-radius: 10px;
    }
</style>
@endsection