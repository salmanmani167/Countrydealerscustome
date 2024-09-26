<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OfficeEmployeeController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('admin.index');
    });
    Route::controller(OfficeEmployeeController::class)->group(function () {
        Route::get('/office/employee', 'index')->name('employee.office.index');
        Route::get('/office/employee/create', 'create')->name('employee.office.create');
        // Route::get('/house/employee', 'houseEmployee')->name('house.office');
        // Route::get('/site/employee', 'siteEmployee')->name('employee.site');
    });
});
