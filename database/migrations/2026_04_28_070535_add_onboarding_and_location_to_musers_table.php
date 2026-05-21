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
        Schema::table('musers', function (Blueprint $table) {
            $table->string('onboarding_stage')->default('legal')->after('terms_accepted_at');
            $table->timestamp('onboarding_completed_at')->nullable()->after('onboarding_stage');
            $table->decimal('latitude', 10, 8)->nullable()->after('onboarding_completed_at');
            $table->decimal('longitude', 11, 8)->nullable()->after('latitude');
            $table->string('area')->nullable()->after('longitude');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('musers', function (Blueprint $table) {
            $table->dropColumn(['onboarding_stage', 'onboarding_completed_at', 'latitude', 'longitude', 'area']);
        });
    }
};
