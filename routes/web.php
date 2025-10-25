<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');


//admin route
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/tasks', [AdminController::class, 'index'])->name('admin.tasks');
    Route::post('/admin/tasks', [AdminController::class, 'store'])->name('admin.tasks.store');
    Route::post('/admin/tasks/{task}/approve', [AdminController::class, 'approve'])->name('admin.tasks.approve');
    Route::post('/admin/tasks/{task}/reassign', [AdminController::class, 'reassign'])->name('admin.tasks.reassign');
});


// employee route
Route::middleware(['auth'])->group(function () {
    Route::get('/employee/tasks', [EmployeeController::class, 'index'])->name('employee.tasks');
    Route::post('/employee/tasks/{task}/complete', [EmployeeController::class, 'complete'])->name('employee.tasks.complete');
});
