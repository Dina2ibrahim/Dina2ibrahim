<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerAuthController;

// صفحات تسجيل الدخول والتسجيل للمديرين
Route::get('manager/login', [ManagerAuthController::class, 'showLoginForm'])->name('login');
Route::post('manager/login', [ManagerAuthController::class, 'login']);
Route::get('manager/register', [ManagerAuthController::class, 'showRegisterForm'])->name('register');
Route::post('manager/register', [ManagerAuthController::class, 'register']);
Route::post('manager/logout', [ManagerAuthController::class, 'logout'])->name('logout');

// صفحات الموظفين
Route::middleware('auth')->group(function () {
    Route::get('employees', [EmployeesController::class, 'index'])->name('employees.index'); // عرض الموظفين
    Route::get('employees/create', [EmployeesController::class, 'create'])->name('employees.create'); // إضافة موظف جديد
    Route::post('employees', [EmployeesController::class, 'store'])->name('employees.store'); // تخزين موظف جديد
    Route::get('employees/{employee}/edit', [EmployeesController::class, 'edit'])->name('employees.edit'); // تعديل موظف
    Route::put('employees/{employee}', [EmployeesController::class, 'update'])->name('employees.update'); // تحديث بيانات موظف
    Route::delete('employees/{employee}', [EmployeesController::class, 'destroy'])->name('employees.destroy'); // حذف موظف
});

