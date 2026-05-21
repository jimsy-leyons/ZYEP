<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function terms()
    {
        $content = Setting::get('customer_terms', 'Terms and conditions coming soon.');
        return view('legal.content', [
            'title' => 'Terms & Conditions',
            'content' => $content
        ]);
    }

    public function providerTerms()
    {
        $content = Setting::get('provider_terms', 'Provider terms coming soon.');
        return view('legal.content', [
            'title' => 'Provider Terms',
            'content' => $content
        ]);
    }

    public function privacy()
    {
        $content = Setting::get('privacy_policy', 'Privacy policy coming soon.');
        return view('legal.content', [
            'title' => 'Privacy Policy',
            'content' => $content
        ]);
    }
}
