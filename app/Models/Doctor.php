<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'clinic',
        'category',
        'photo',
        'is_active',
    ];

    public function schedules()
    {
        return $this->hasMany(DoctorSchedule::class);
    }
}