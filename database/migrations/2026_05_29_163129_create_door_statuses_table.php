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
        Schema::create('door_statuses', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['locked', 'unlocked'])->default('locked');
            $table->enum('mode', ['manual', 'auto'])->default('manual');
            $table->timestamp('last_updated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('door_statuses');
    }
};
