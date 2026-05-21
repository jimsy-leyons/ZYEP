<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscription_packages', function (Blueprint $box) {
            $box->id();
            $box->string('name');
            $box->decimal('price', 10, 2);
            $box->string('interval'); // monthly, yearly, one-time
            $box->string('target_role')->default('provider'); // provider, customer
            $box->json('features')->nullable();
            $box->boolean('is_active')->default(true);
            $box->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscription_packages');
    }
};
