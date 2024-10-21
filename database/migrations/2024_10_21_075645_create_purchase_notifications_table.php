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
        Schema::create('purchase_notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_notification_id')
            ->constrained('purchase_plot_installments')->cascadeOnDelete();
            $table->foreignId('client_id')
            ->constrained('purchases')->cascadeOnDelete();
            $table->boolean('is_marked')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_notifications');
    }
};
