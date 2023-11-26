<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'security_amount',
        'category_id',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
