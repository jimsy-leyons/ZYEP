<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ActionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnalyticsController extends Controller
{
    /**
     * Log a user interaction event.
     */
    public function logAction(Request $request)
    {
        $request->validate([
            'action_type' => 'required|string',
            'target_id' => 'nullable|integer',
            'metadata' => 'nullable|array'
        ]);

        $user = $request->user() ?? Auth::guard('sanctum')->user();

        ActionLog::create([
            'user_id' => $user?->id,
            'action_type' => $request->action_type,
            'target_id' => $request->target_id,
            'metadata' => $request->metadata
        ]);

        return response()->json(['status' => 'success']);
    }
}
