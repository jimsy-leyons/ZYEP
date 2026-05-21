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
        Schema::create('mcategory_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('requested_by')->constrained('musers')->onDelete('cascade');
            $table->tinyInteger('status')->default(0); // 0: Pending, 1: Approved, 2: Rejected
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mcategory_requests');
    }
};
