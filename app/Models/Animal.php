<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;


    protected $fillable = [

        'name',
        'customer_id',
        'especie',
        'data_nascimento',
        'flagidoso',
        'flagcardiaco',
        'flaghepletico',
        'flaglesionado',
        'outros'

    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
