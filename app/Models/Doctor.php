<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function specialties()
    {
        return $this->belongsTo(Specialties::class, 'specialtie_id');
    }

    public function name_user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
