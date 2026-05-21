<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Get dashboard statistics.
     */
    public function getStats()
    {
        $stats = [
            'total_users' => User::count(),
            'total_providers' => Provider::where('status', 1)->count(),
            'pending_approvals' => Provider::where('status', 0)->count(),
            'total_categories' => Category::count(),
            'top_categories' => Category::withCount(['providers' => function($q) {
                $q->where('status', 1);
            }])
            ->orderBy('providers_count', 'desc')
            ->take(5)
            ->get()
        ];

        return response()->json($stats);
    }

    /**
     * List providers awaiting approval.
     */
    public function getPendingProviders()
    {
        $pending = Provider::with(['user', 'category'])
            ->where('status', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($pending);
    }

    /**
     * Approve a service provider.
     */
    public function approveProvider($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->update(['status' => 1]);

        return response()->json([
            'message' => 'Provider approved successfully.',
            'provider' => $provider
        ]);
    }

    /**
     * Reject a service provider.
     */
    public function rejectProvider($id)
    {
        $provider = Provider::findOrFail($id);
        // Instead of deleting, we could mark as rejected (-1)
        $provider->update(['status' => -1]);

        return response()->json([
            'message' => 'Provider application rejected.'
        ]);
    }

    /**
     * List all subscription packages.
     */
    public function getPackages()
    {
        return response()->json(SubscriptionPackage::all());
    }

    /**
     * Create a new subscription package.
     */
    public function storePackage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'interval' => 'required|string',
            'target_role' => 'required|string',
            'features' => 'nullable|array',
        ]);

        $package = SubscriptionPackage::create($request->all());

        return response()->json([
            'message' => 'Package created successfully.',
            'package' => $package
        ]);
    }

    /**
     * Update an existing subscription package.
     */
    public function updatePackage(Request $request, $id)
    {
        $package = SubscriptionPackage::findOrFail($id);
        
        $request->validate([
            'name' => 'string|max:255',
            'price' => 'numeric|min:0',
            'interval' => 'string',
            'target_role' => 'string',
            'features' => 'nullable|array',
            'is_active' => 'boolean'
        ]);

        $package->update($request->all());

        return response()->json([
            'message' => 'Package updated successfully.',
            'package' => $package
        ]);
    }

    /**
     * Delete a subscription package.
     */
    public function destroyPackage($id)
    {
        $package = SubscriptionPackage::findOrFail($id);
        $package->delete();

        return response()->json(['message' => 'Package deleted successfully.']);
    }

    /**
     * Run database migrations.
     */
    public function runMigration()
    {
        try {
            \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
            $output = \Illuminate\Support\Facades\Artisan::output();
            
            return response()->json([
                'message' => 'Migration completed successfully.',
                'output' => $output
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Migration failed.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
