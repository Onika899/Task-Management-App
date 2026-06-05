<?php

use App\Http\Controllers\DashboardControllerJS;
use App\Http\Controllers\TaskControllerJS;
use App\Http\Controllers\CategoryControllerJS;
use App\Http\Controllers\PriorityControllerJS;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardControllerJS::class, 'index'])->name('dashboard');

    Route::resource('tasks', TaskControllerJS::class);
    Route::patch('/tasks/{task}/status', [TaskControllerJS::class, 'updateStatus'])->name('tasks.status.update');

    Route::resource('categories', CategoryControllerJS::class)->middleware('role:admin');
    Route::resource('priorities', PriorityControllerJS::class)->middleware('role:admin');
});

require __DIR__.'/auth.php';
