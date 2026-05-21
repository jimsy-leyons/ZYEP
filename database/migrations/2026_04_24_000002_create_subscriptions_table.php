<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $box) {
            $box->id();
            $box->foreignId('user_id')->constrained('musers')->onDelete('cascade');
            $box->foreignId('package_id')->constrained('subscription_packages')->onDelete('cascade');
            $box->foreignId('provider_id')->nullable()->constrained('mproviders')->onDelete('cascade');
            $box->timestamp('starts_at')->useCurrent();
            $box->timestamp('expires_at')->nullable();
            $box->string('status')->default('pending'); // pending, active, expired, cancelled
            $box->string('payment_id')->nullable(); // Reference to our payments table or gateway ID
            $box->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
