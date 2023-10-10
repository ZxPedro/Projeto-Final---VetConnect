<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalBreed extends Model
{
    use HasFactory;

    protected $table = "animals_breed";

    protected $fillable = [
        'id',
        'name',
        'especie',

    ];
}
