<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'mcategories';

    protected $fillable = ['parent_id', 'name', 'icon', 'description', 'status'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('status', 1);
    }

    public function providers()
    {
        return $this->hasMany(Provider::class, 'category_id');
    }
}
