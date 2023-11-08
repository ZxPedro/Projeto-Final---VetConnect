<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalService extends Model
{
    use HasFactory;

    protected $table = 'professionals_services';

    protected $fillable = [
        'user_id',
        'service_id',
        'working_days',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'professional_services', 'id', 'id');
    }
}
