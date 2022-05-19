<?php

namespace App\Models;
use App\Models\User;

use App\Models\Interview;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table= "patients";

    protected $fillable = [
        'patient_name',
        'email',
        'password',
        'gender',
        'remember_token',
        'phone',
        'blood_type',
        'chronic_disease',
        'sensitive',
        'gentics_disease',
        'social_status',
        'bad_happit',
        'birth'
    ];
    public function interveiw(){

        return $this->hasMany(Interview::Class);

    }

    

}
