<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $table = "customer_address";

    protected $fillable = [
        'customer_id',
        'endereco',
        'endereco_numero',
        'endereco_cep',
        'endereco_bairro',
        'endereco_complemento',
        'uf',
        'cidade',
        'flagprincipal'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
