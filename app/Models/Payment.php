<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'tpayments';

    protected $fillable = [
        'user_id',
        'amount',
        'payment_id',
        'order_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
