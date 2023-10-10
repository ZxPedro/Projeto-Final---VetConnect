<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;


    protected $fillable = [

        'customer_id',
        'name',
        'especie',
        'raca',
        'data_nascimento',
        'flagidoso',
        'flagcardiopata',
        'flagepiletico',
        'flaglesionado',
        'flagalergico',
        'observacao'

    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
