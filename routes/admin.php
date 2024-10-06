<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\EmployeePayrollController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\OfficeEmployeeController;
use App\Http\Controllers\Admin\PayrollHistoryControlelr;
use App\Http\Controllers\Admin\SalesOfficerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PayrollController;



Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('admin.index');
    });
    Route::controller(OfficeEmployeeController::class)->group(function () {
        Route::get('office/employee', 'index')->name('employee.office.index');
        Route::get('office/employee/create', 'create')->name('employee.office.create');
        Route::post('office/employee/store', 'store')->name('employee.office.store');
        Route::get('house/employee/show/{id}', 'show')->name('employee.office.show');
        Route::get('house/employee/edit/{id}', 'edit')->name('employee.office.edit');
        Route::post('house/employee/update/{id}', 'update')->name('employee.office.update');
        Route::delete('house/employee/delete/{id}', 'delete')->name('employee.office.delete');
    });

    Route::controller(EmployeePayrollController::class)->group(function () {
        Route::get('payroll', 'index')->name('payroll.index');
        Route::get('payroll/store/{id}', 'store')->name('payroll.store');
    });
    Route::controller(PayrollHistoryControlelr::class)->group(function () {
        Route::get('payroll/store/{id}', 'store')->name('payroll.store');
        Route::get('payroll/history/{id}', 'history')->name('payroll.history');
    });

    Route::controller(ClientController::class)->group(function () {
        Route::get('client', 'index')->name('client.index');
        Route::get('client/create', 'create')->name('client.create');
        Route::post('client/store', 'store')->name('client.store');
    });
    Route::controller(ExpenseController::class)->group(function () {
        Route::get('expense', 'index')->name('expense.index');
    });
    Route::controller(SalesOfficerController::class)->group(function () {
        Route::get('sales/officer', 'index')->name('sales.officer.index');
        Route::get('sales/officer/create', 'create')->name('sales.officer.create');
        Route::post('sales/officer/store', 'store')->name('sales.officer.store');
        Route::delete('sales/officer/delete/{id}', 'delete')->name('sales.officer.delete');
    });
    Route::resource('payrolls', PayrollController::class);

});
