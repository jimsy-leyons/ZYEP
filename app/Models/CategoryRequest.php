<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryRequest extends Model
{
    protected $table = 'mcategory_requests';

    protected $fillable = ['name', 'requested_by', 'status'];

    public function requester()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }
}
