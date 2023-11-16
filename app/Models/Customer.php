<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'email',
        'data_nascimento',
        'telefone',
        'cpf',
        'genero',

    ];

    public function animais()
    {
        return $this->hasMany(Animal::class);
    }

    public function address()
    {
        return $this->hasMany(CustomerAddress::class);
    }

    public function scheduling()
    {
        return $this->hasMany(Scheduling::class);
    }
}
