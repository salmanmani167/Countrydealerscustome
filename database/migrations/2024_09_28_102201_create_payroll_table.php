<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id(); // Payroll ID
            $table->unsignedBigInteger('employee_id'); // Reference to employee
            $table->decimal('basic_salary', 10, 2); // Employee basic salary
            $table->decimal('fuel_adjustment', 10, 2)->nullable(); // Fuel adjustment, if any
            $table->decimal('other_allowance', 10, 2)->nullable(); // Other allowances, if any
            $table->decimal('bonus', 10, 2)->nullable(); // Bonus amount, if any
            $table->decimal('deductions', 10, 2)->nullable(); // Any other deductions
            $table->decimal('loan_deduction', 10, 2)->nullable(); // Loan repayment deduction
            $table->decimal('net_salary', 10, 2); // Final net salary after adjustments
            $table->string('status')->default('Pending'); // Payroll status (Pending/Paid)
            $table->date('payment_date'); // Payment date
            $table->timestamps(); // Timestamps

            // Foreign key constraint for employee
            $table->foreign('employee_id')->references('id')->on('admin_office_employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
