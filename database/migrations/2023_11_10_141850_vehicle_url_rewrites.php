<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Karaev\Vehicle\Domain\Api\Data\VehicleUrlRewriteDataInterface;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicle_url_rewrites', function (Blueprint $table) {
            $table->id();
            $table->foreignId(VehicleUrlRewriteDataInterface::VEHICLE_ID)->constrained('vehicles')->cascadeOnDelete();
            $table->string(VehicleUrlRewriteDataInterface::URL_REWRITE)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_url_rewrite');
    }
};
