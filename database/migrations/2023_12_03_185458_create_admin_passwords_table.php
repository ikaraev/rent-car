<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Karaev\Admin\Domain\Api\Data\AdminPasswordInterface;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_passwords', function (Blueprint $table) {
            $table->id();
            $table->foreignId(AdminPasswordInterface::ADMIN_ID)->constrained('admins')->cascadeOnDelete();
            $table->string(AdminPasswordInterface::SALT);
            $table->string(AdminPasswordInterface::HASH);
            $table->boolean(AdminPasswordInterface::IS_ACTIVE)->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_passwords');
    }
};
