<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Karaev\Vehicle\Domain\Api\Data\VehicleImageDataInterface;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicle_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId(VehicleImageDataInterface::VEHICLE_ID)->constrained('vehicles')->cascadeOnDelete();
            $table->smallInteger(VehicleImageDataInterface::SORT_ORDER);
            $table->string(VehicleImageDataInterface::NAME);
            $table->string(VehicleImageDataInterface::TYPE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_images');
    }
};
