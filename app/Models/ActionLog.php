<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionLog extends Model
{
    protected $fillable = [
        'user_id',
        'action_type',
        'target_id',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array'
    ];
}
