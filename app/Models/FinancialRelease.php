<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialRelease extends Model
{
    use HasFactory;


    protected $table = "financial_releases";

    protected $fillable = [
        'name',
        'price',
        'type',
        'descricao'
    ];
}
