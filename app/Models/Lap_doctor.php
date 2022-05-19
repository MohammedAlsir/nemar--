<?php

namespace App\Models;
use App\Models\Clinic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lap_doctor extends Model
{
    protected $table= "lap_doctors";


    public function clinic(){

        return $this->belongsTo(Clinic::Class);

    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

}
