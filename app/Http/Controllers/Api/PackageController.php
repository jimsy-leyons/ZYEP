<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPackage;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $role = $request->query('role', 'provider');
        
        $packages = SubscriptionPackage::where('is_active', true)
            ->where('target_role', $role)
            ->get();
            
        return response()->json([
            'packages' => $packages
        ]);
    }
}
