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
        Schema::create('purchase_plot_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('purchases')->cascadeOnDelete();
            $table->string('payment_type')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('cheque_image')->nullable();
            $table->integer('check_amount')->nullable();
            $table->integer('full_payment')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_plot_payments');
    }
};
