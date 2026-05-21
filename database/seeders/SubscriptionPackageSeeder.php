<?php

namespace Database\Seeders;

use App\Models\SubscriptionPackage;
use Illuminate\Database\Seeder;

class SubscriptionPackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            [
                'name' => 'Starter Pack',
                'price' => 299.00,
                'interval' => 'monthly',
                'target_role' => 'provider',
                'features' => ['Standard Listing', 'View Basic Analytics', 'Limited Customer Inquiries'],
            ],
            [
                'name' => 'Professional Pack',
                'price' => 2499.00,
                'interval' => 'yearly',
                'target_role' => 'provider',
                'features' => ['Priority Listing', 'Full Analytics', 'Unlimited Inquiries', 'Featured Badge'],
            ],
            [
                'name' => 'Lifetime Pro',
                'price' => 9999.00,
                'interval' => 'one-time',
                'target_role' => 'provider',
                'features' => ['All Professional Features', 'No Renewal Needed', 'Exclusive Partner Perks'],
            ],
            [
                'name' => 'Customer Plus',
                'price' => 99.00,
                'interval' => 'monthly',
                'target_role' => 'customer',
                'features' => ['No Platform Fees', 'Priority Booking', 'Exclusive Discounts'],
            ]
        ];

        foreach ($packages as $pkg) {
            SubscriptionPackage::updateOrCreate(['name' => $pkg['name']], $pkg);
        }
    }
}
