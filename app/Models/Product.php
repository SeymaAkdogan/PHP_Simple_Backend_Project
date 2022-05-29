<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        "name",
        "price",
        "description",
        "is_active",
        "is_home"
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
