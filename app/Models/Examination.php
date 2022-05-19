<?php

namespace App\Models;

use App\Models\Clinic;
use App\Models\Interview;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model

{
    protected $table= "examinations";


    public function clinic(){

    return $this->belongsTo(Clinic::Class);
    }

    public function interview(){

        return $this->belongsTo(Interview::Class);

    }
    
}

