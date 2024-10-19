<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\EmployeePayrollController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\OfficeEmployeeController;
use App\Http\Controllers\Admin\PayrollHistoryControlelr;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\SalesOfficerController;
use Illuminate\Support\Facades\Route;



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
        Route::get('client/show/{id}', 'show')->name('client.show');
        Route::get('client/edit/{id}', 'edit')->name('client.edit');
        Route::post('client/update/{id}', 'update')->name('client.update');
        Route::get('client/installments/{id}', 'getInstallments')->name('client.installments');
        Route::get('client/installment/status/update/{id}', 'installmentUpdate')->name('client.installment.status.update');
        Route::post('add/custom/cash/installment/{id}', 'addNewCashInstallment')->name('add.custom.cash.installment');
        Route::post('add/custom/cheque/installment/{id}', 'addNewChequeInstallment')->name('add.custom.cheque.installment');
        Route::get('client/delete/{id}', 'delete')->name('client.delete');
        Route::get('client/print/{client_id}/{installment_id}', 'print')->name('client.print');
    });
    Route::controller(ExpenseController::class)->group(function () {
        Route::get('expense', 'index')->name('expense.index');
    });
    Route::controller(PurchaseController::class)->group(function () {
        Route::get('purchase', 'index')->name('purchase.index');
        Route::get('purchase/create', 'create')->name('purchase.create');
        Route::post('purchase/store', 'store')->name('purchase.store');
        Route::get('purchase/show/{id}', 'show')->name('purchase.show');
        Route::get('purchase/edit/{id}', 'edit')->name('purchase.edit');
        Route::post('purchase/update/{id}', 'update')->name('purchase.update');
        Route::get('purchase/delete/{id}', 'delete')->name('purchase.delete');
        Route::get('purchase/installments/{id}', 'getInstallments')->name('purchase.installments');
        Route::post('add/plot/cash/installment/{id}', 'addNewCashInstallment')->name('add.plot.cash.installment');
        Route::post('add/plot/cheque/installment/{id}', 'addNewChequeInstallment')->name('add.plot.cheque.installment');
        Route::get('purchase/installment/status/update/{id}', 'installmentUpdate')->name('purchase.installment.status.update');
        Route::get('purchase/print/{client_id}/{installment_id}', 'print')->name('purchase.print');
        Route::get('get/old/client/{id}', 'getOldClient')->name('get.old.client');
    });
    Route::controller(SalesOfficerController::class)->group(function () {
        Route::get('sales/officer', 'index')->name('sales.officer.index');
        Route::get('sales/officer/create', 'create')->name('sales.officer.create');
        Route::post('sales/officer/store', 'store')->name('sales.officer.store');
        Route::delete('sales/officer/delete/{id}', 'delete')->name('sales.officer.delete');
    });
});
