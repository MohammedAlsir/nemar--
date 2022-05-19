<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Doctors;
use App\Models\Patient;
use App\Models\Examination;
class Interview extends Model
{

    protected $fillable = [
        'name',
        'age',
        'date',
        'tirn',
        'state',
        'doctor_id',
        'patient_id'
     
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }


    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }


    public function examinations(){

        return $this->hasMany(Examination::Class);

    }
}
