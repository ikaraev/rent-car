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
        Schema::create('vehicle_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('vehicles')->cascadeOnDelete();
            $table->smallInteger('is_active')->default(1);
            $table->string('name')->nullable();
            $table->string('engine')->nullable();
            $table->string('gear_box')->nullable();
            $table->string('vin_code')->nullable();
            $table->string('car_number')->nullable();
            $table->smallInteger('make')->nullable();
            $table->smallInteger('model')->nullable();
            $table->float('rent_price')->nullable();
            $table->float('first_period_discount_price')->nullable();
            $table->float('second_period_discount_price')->nullable();
            $table->float('owner_price')->nullable();
            $table->integer('year')->nullable();
            $table->foreignId('car_owner_id')->nullable()->constrained('users')->nullOnDelete();
            $table->float('fuel_consumption')->nullable();
            $table->timestamps();

            $table->unique('vehicle_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_properties');
    }
};
