<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Clinic;
use App\Models\Interview;
use App\Models\Specialist;
use App\Models\Work_time;



class Doctor extends Model
{
    protected $table= "doctors";
 

    protected $fillable = ['carrier', 'about'];



    public function clinic(){

        return $this->belongsTo(Clinic::Class);

    }


    public function interview(){

        return $this->hasMany(Interview::Class);

    }


    public function specialist(){

        return $this->belongsTo(Specialist::Class);

    }

    public function work_time(){

        return $this->hasMany(Work_time::Class);

    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
