<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'mproviders';

    // NOTE: rating/status/is_verified are privileged fields, kept mass-assignable
    // only because the Filament admin resource needs to set them directly.
    // Never fill these from raw request input in an API controller — build an
    // explicit array instead (see ProviderController::store for the pattern).
    protected $fillable = [
        'user_id',
        'business_name',
        'category_id',
        'description',
        'experience',
        'latitude',
        'longitude',
        'area',
        'rating',
        'status',
        'is_verified',
        'terms_accepted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function activeSubscription()
    {
        return $this->hasOne(Subscription::class)
            ->where('status', 'active')
            ->where(function ($query) {
                $query->whereNull('expires_at')
                      ->orWhere('expires_at', '>', now());
            })
            ->latestOfMany();
    }
}
