<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    use HasFactory;

    protected $table = "scheduling";

    protected $fillable = [
        'customer_id',
        'animal_id',
        'category_id',
        'professional_id',
        'service_id',
        'total',
        'data_agendamento',
        'flagfinalizado',
        'status_id',
        'descricao'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function professional()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
