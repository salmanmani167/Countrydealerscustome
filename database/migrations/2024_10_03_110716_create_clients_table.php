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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->integer('number')->nullable();
            $table->string('father_or_husband_name')->nullable();
            $table->string('client_type')->nullable();
            $table->string('sale_type')->nullable();
            $table->string('paid_by')->nullable();
            $table->integer('plot_number')->nullable();
            $table->string('location')->nullable();
            $table->integer('plot_price')->nullable();
            $table->integer('plot_demand')->nullable();
            $table->integer('plot_sale_price')->nullable();
            $table->string('agreement')->nullable();
            $table->string('vehicles_adjustment')->nullable();
            $table->integer('adjustment_price')->nullable();
            $table->string('adjustment_product')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
