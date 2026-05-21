<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchLog extends Model
{
    protected $table = 'tsearch_logs';

    protected $fillable = ['user_id', 'keyword', 'location'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
