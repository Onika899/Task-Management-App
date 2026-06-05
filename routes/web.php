<?php

<<<<<<< HEAD
use App\Http\Controllers\DashboardControllerJS;
use App\Http\Controllers\TaskControllerJS;
use App\Http\Controllers\CategoryControllerJS;
use App\Http\Controllers\PriorityControllerJS;
=======
use App\Http\Controllers\TaskControllerOB;
use App\Http\Controllers\AdminControllerOB;
use App\Http\Controllers\DashboardControllerOB;
use Illuminate\Support\Facades\Auth;
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardControllerJS::class, 'index'])->name('dashboard');

    Route::resource('tasks', TaskControllerJS::class);
    Route::patch('/tasks/{task}/status', [TaskControllerJS::class, 'updateStatus'])->name('tasks.status.update');

    Route::resource('categories', CategoryControllerJS::class)->middleware('role:admin');
    Route::resource('priorities', PriorityControllerJS::class)->middleware('role:admin');
});

require __DIR__.'/auth.php';
=======
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardControllerOB::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/profile', function () { return view('profile'); })->name('profile')->middleware('auth');

Route::resource('tasks', TaskControllerOB::class)->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminControllerOB::class, 'dashboard'])->name('admin.dashboard');
    Route::put('/admin/users/{user}/role', [AdminControllerOB::class, 'updateUserRole'])->name('admin.updateRole');
});
>>>>>>> 0a353b9856d9335bcd31226e46579f639538e0a8
