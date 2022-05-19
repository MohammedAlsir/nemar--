<?php

namespace App\Models;
use App\Models\Doctors;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work_time extends Model
{

    protected $table= "work_times";
    public $timestamps = false;
    public function doctor(){

        return $this->belongsTo(Doctor::Class);

    }
}
