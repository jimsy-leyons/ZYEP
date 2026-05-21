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
        Schema::create('mproviders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('musers')->onDelete('cascade');
            $table->string('business_name');
            $table->foreignId('category_id')->constrained('mcategories')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->integer('experience')->default(0);
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('area')->nullable();
            $table->float('rating')->default(0);
            $table->tinyInteger('status')->default(0); // 0: Pending, 1: Approved, 2: Rejected
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mproviders');
    }
};
