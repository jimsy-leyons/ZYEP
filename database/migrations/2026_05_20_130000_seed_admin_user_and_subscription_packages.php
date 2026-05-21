<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Insert admin user
        DB::table('musers')->updateOrInsert(
            ['phone' => '9207908701'],
            [
                'name' => 'System Admin',
                'email' => 'admin@zyep.in',
                'role' => 'admin',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Insert packages
        $packages = [
            [
                'name' => 'Starter Pack',
                'price' => 299.00,
                'interval' => 'monthly',
                'target_role' => 'provider',
                'features' => json_encode(['Standard Listing', 'View Basic Analytics', 'Limited Customer Inquiries']),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Professional Pack',
                'price' => 2499.00,
                'interval' => 'yearly',
                'target_role' => 'provider',
                'features' => json_encode(['Priority Listing', 'Full Analytics', 'Unlimited Inquiries', 'Featured Badge']),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lifetime Pro',
                'price' => 9999.00,
                'interval' => 'one-time',
                'target_role' => 'provider',
                'features' => json_encode(['All Professional Features', 'No Renewal Needed', 'Exclusive Partner Perks']),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Customer Plus',
                'price' => 99.00,
                'interval' => 'monthly',
                'target_role' => 'customer',
                'features' => json_encode(['No Platform Fees', 'Priority Booking', 'Exclusive Discounts']),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($packages as $pkg) {
            DB::table('subscription_packages')->updateOrInsert(
                ['name' => $pkg['name']],
                $pkg
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('musers')->where('phone', '9207908701')->delete();
        DB::table('subscription_packages')->whereIn('name', [
            'Starter Pack',
            'Professional Pack',
            'Lifetime Pro',
            'Customer Plus'
        ])->delete();
    }
};
