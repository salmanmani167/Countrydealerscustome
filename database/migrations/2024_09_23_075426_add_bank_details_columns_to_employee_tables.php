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
        Schema::table('admin_office_employees', function (Blueprint $table) {
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
        });
        Schema::table('site_employees', function (Blueprint $table) {
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
        });
        Schema::table('house_employees', function (Blueprint $table) {
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admin_office_employees', function (Blueprint $table) {
            $table->dropColumn('address')->nullable();
            $table->dropColumn('bank_name')->nullable();
            $table->dropColumn('reference')->nullable();
            $table->dropColumn('joining_date')->nullable();
            $table->dropColumn('designation')->nullable();
            $table->dropColumn('department')->nullable();
            $table->dropColumn('father_name')->nullable();
            $table->dropColumn('account_number')->nullable();
            $table->dropColumn('loan_amount')->nullable();
            $table->dropColumn('loan_return')->nullable();
            $table->dropColumn('other_allowance')->nullable();
            $table->dropColumn('cnic')->nullable();

        });
        Schema::table('site_employees', function (Blueprint $table) {
            $table->dropColumn('address')->nullable();
            $table->dropColumn('bank_name')->nullable();
            $table->dropColumn('reference')->nullable();
            $table->dropColumn('joining_date')->nullable();
            $table->dropColumn('designation')->nullable();
            $table->dropColumn('department')->nullable();
            $table->dropColumn('father_name')->nullable();
            $table->dropColumn('account_number')->nullable();
            $table->dropColumn('loan_amount')->nullable();
            $table->dropColumn('loan_return')->nullable();
            $table->dropColumn('other_allowance')->nullable();
            $table->dropColumn('cnic')->nullable();
        });
        Schema::table('house_employees', function (Blueprint $table) {
            $table->dropColumn('address')->nullable();
            $table->dropColumn('bank_name')->nullable();
            $table->dropColumn('reference')->nullable();
            $table->dropColumn('joining_date')->nullable();
            $table->dropColumn('designation')->nullable();
            $table->dropColumn('department')->nullable();
            $table->dropColumn('father_name')->nullable();
            $table->dropColumn('account_number')->nullable();
            $table->dropColumn('loan_amount')->nullable();
            $table->dropColumn('loan_return')->nullable();
            $table->dropColumn('other_allowance')->nullable();
            $table->dropColumn('cnic')->nullable();
        });
    }
};
