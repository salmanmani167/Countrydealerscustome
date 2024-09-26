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
        Schema::create('site_employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100); // First Name
            $table->string('last_name', 100); // Last Name
            $table->string('gender');
            $table->date('date_of_birth');
            $table->text('previous_experience')->nullable();
            $table->string('image')->nullable();
            $table->string('cnic_front_image')->nullable();
            $table->string('cnic_back_image')->nullable();
            $table->string('father_cnic_front_image')->nullable();
            $table->string('father_cnic_back_image')->nullable();
            $table->string('cv')->nullable();
            $table->text('fuel_adjustment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_employees');
    }
};
