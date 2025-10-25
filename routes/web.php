<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

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


     Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::resource('roles', RoleController::class)->names([
        'index' => 'admin.roles',
    ]);

    Route::resource('permissions', PermissionController::class)->names([
        'index' => 'admin.permission',
    ]);
});


// employee route
Route::middleware(['auth'])->group(function () {
    Route::get('/employee/tasks', [EmployeeController::class, 'index'])->name('employee.tasks');
    Route::post('/employee/tasks/{task}/complete', [EmployeeController::class, 'complete'])->name('employee.tasks.complete');
});
