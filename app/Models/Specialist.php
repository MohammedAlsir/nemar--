<?php

namespace App\Models;
use App\Models\Doctors;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    protected $table= "specialists";



    public function doctor(){

        return $this->hasMany(Doctor::Class);

    }

}
