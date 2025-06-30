<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VMOrderController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\VMVerificationController;
use App\Http\Controllers\Admin\StudentVerificationController;



Route::patch('/vm-orders/{id}/approve', [VMOrderController::class, 'approve'])->name('vm-orders.approve');
Route::patch('/vm-orders/{id}/reject', [VMOrderController::class, 'reject'])->name('vm-orders.reject');
/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing');
});

/*
|--------------------------------------------------------------------------
| Authenticated User Routes (Students)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'role:student'])->group(function () {
    // Dashboard for students
    Route::get('/dashboard', function () {
        return view('student.dashboard');
    })->name('dashboard');

    // VM Order routes for students
    Route::resource('vm-orders', VMOrderController::class);
});

/*
|--------------------------------------------------------------------------
| Profile Routes (Shared)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (with Role Middleware)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Admin Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // VM Order Management
        Route::get('/vm-orders', [VMVerificationController::class, 'index'])->name('vm-orders.index');
        Route::patch('/vm-orders/{id}/approve', [VMOrderController::class, 'approve'])->name('vm-orders.approve');
        Route::patch('/vm-orders/{id}/reject', [VMOrderController::class, 'reject'])->name('vm-orders.reject');

        // Student Verification
        Route::get('/students', [StudentVerificationController::class, 'index'])->name('students.index');
        Route::patch('/students/{user}/verify', [StudentVerificationController::class, 'verify'])->name('students.verify');
        Route::patch('/students/{user}/reject', [StudentVerificationController::class, 'reject'])->name('students.reject');
        Route::patch('/students/{user}/unverify', [StudentVerificationController::class, 'unverify'])->name('students.unverify');
    });

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';