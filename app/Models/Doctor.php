<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'doctor_name',
        'gender',
        'specialty_id',
        'subspecialty_id',
        'qualification_degree',
        'bio',
        'average_rating',
        'total_reviews',
    ];
     public function specialty()
    {
        return $this->hasOne(Specialty::class);
    }
     public function subspecialty()
    {
        return $this->hasOne(Subspecialty::class);
    }
}
