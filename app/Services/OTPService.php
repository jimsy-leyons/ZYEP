<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class OTPService
{
    /**
     * Send OTP to a phone number (Mocked)
     */
    public function sendOTP($phone)
    {
        $otp = rand(100000, 999999);
        
        // Store in cache for 10 minutes
        Cache::put('otp_' . $phone, $otp, now()->addMinutes(10));

        Log::info("Mock OTP for {$phone}: {$otp}");

        // In a real scenario, you'd call an SMS gateway here
        return true;
    }

    /**
     * Verify OTP for a phone number
     */
    public function verifyOTP($phone, $otp)
    {
        $cachedOtp = Cache::get('otp_' . $phone);

        if ($cachedOtp && $cachedOtp == $otp) {
            Cache::forget('otp_' . $phone);
            return true;
        }

        return false;
    }

    /**
     * Get OTP for a phone number (for Demo/Development)
     */
    public function getOTP($phone)
    {
        return Cache::get('otp_' . $phone);
    }
}
