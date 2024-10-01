<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')
            ->constrained('admin_office_employees')
            ->cascadeOnDelete();
            $table->string('first_name', 100); // First Name
            $table->string('last_name', 100); // Last Name
            $table->string('gender');
            $table->date('date_of_birth');
            $table->integer('salary')->nullable();
            $table->text('previous_experience')->nullable();
            $table->text('fuel_adjustment')->nullable();
            $table->text('address')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('reference')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('father_name')->nullable();
            $table->integer('account_number')->nullable();
            $table->integer('loan_amount')->nullable();
            $table->integer('loan_return')->nullable();
            $table->integer('other_allowance')->nullable();
            $table->integer('cnic')->nullable();
            $table->integer('loan_duration')->nullable();
            $table->string('employee_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
