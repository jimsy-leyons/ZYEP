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
        Schema::create('action_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('musers')->onDelete('cascade');
            $table->string('action_type'); // e.g., 'category_click', 'provider_view', 'search'
            $table->unsignedBigInteger('target_id')->nullable(); // ID of category or provider
            $table->json('metadata')->nullable(); // e.g., search keywords, location
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('action_logs');
    }
};
