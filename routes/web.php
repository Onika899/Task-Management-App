<?php

use App\Http\Controllers\TaskControllerOB;
use App\Http\Controllers\AdminControllerOB;
use App\Http\Controllers\DashboardControllerOB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardControllerOB::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/profile', function () { return view('profile'); })->name('profile')->middleware('auth');

Route::resource('tasks', TaskControllerOB::class)->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminControllerOB::class, 'dashboard'])->name('admin.dashboard');
    Route::put('/admin/users/{user}/role', [AdminControllerOB::class, 'updateUserRole'])->name('admin.updateRole');
});