<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Complaint extends Model
{
    protected $table= "complaints";


    public function user()
    {
        return $this->belongsTo(User::Class);
    }

}
