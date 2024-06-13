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
        Schema::create('booking_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->string('insurance_type', 20)->nullable();
            $table->boolean('is_free_cancellation')->default(false);
            $table->boolean('is_second_driver')->default(false);
            $table->boolean('baby_seat')->default(false);
            $table->boolean('child_seat')->default(false);

            $table->string('receiving_city')->nullable();
            $table->string('receiving_address')->nullable();
            $table->string('return_city')->nullable();
            $table->string('return_address')->nullable();

            $table->float('day_price');

            $table->float('total_price');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_properties');
    }
};
