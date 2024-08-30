<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [AdminController::class, 'index'])->name('admin.login');
        Route::get('register', [AdminController::class, 'register'])->name('admin.register');
        Route::post('login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    });
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('table', [AdminController::class, 'table'])->name('admin.table');
        Route::get('form', [AdminController::class, 'form'])->name('admin.form');
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');

        // Academic Year Module
        Route::get('academic_year/read', [AcademicYearController::class, 'read'])->name('academic-year.read');
        Route::get('academic_year/create', [AcademicYearController::class, 'index'])->name('academic-year.create');
        Route::post('academic_year/create', [AcademicYearController::class, 'store'])->name('academic-year.store');
        Route::get('academic_year/edit', [AcademicYearController::class, 'edit'])->name('academic-year.edit');
        Route::put('academic_year/update', [AcademicYearController::class, 'update'])->name('academic-year.update');
        Route::get('academic_year/delete', [AcademicYearController::class, 'delete'])->name('academic-year.delete');


        // Classes Module

        Route::get('class/read', [ClassesController::class, 'read'])->name('class.read');
        Route::get('class/create', [ClassesController::class, 'index'])->name('class.create');
        Route::post('class/create', [ClassesController::class, 'store'])->name('class.store');
        Route::get('class/edit', [ClassesController::class, 'edit'])->name('class.edit');
        Route::put('class/update', [ClassesController::class, 'update'])->name('class.update');
        Route::get('class/delete', [ClassesController::class, 'delete'])->name('class.delete');
    });
});
