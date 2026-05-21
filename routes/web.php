<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LegalController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('legal')->group(function () {
    Route::get('/terms', [LegalController::class, 'terms'])->name('legal.terms');
    Route::get('/provider-terms', [LegalController::class, 'providerTerms'])->name('legal.provider-terms');
    Route::get('/privacy', [LegalController::class, 'privacy'])->name('legal.privacy');
});
