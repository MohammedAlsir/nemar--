<?php

namespace App\Http\Controllers\api\web;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class clinicAdminController extends Controller
{
    public function interviewsReport(){

       

        $interview = DB::table('interviews')->join('doctors',function($join){
            $userId = Auth::id();
        $user = User::find( $userId);
        $clinic = $user->clinics;
    
             $join->on('interviews.doctor_id','=','doctors.id')->join('users',function($join)
             {
              $join->on('doctors.user_id','=','users.id');   
                }
       )->join('specialists',function($join){
           $join->on('doctors.specialist_id','=','specialists.id');
       }
       )->where('doctors.clinic_id','=',$clinic[0]->id);
             })->join('patients',function($join){
               $join->on('interviews.patient_id','=','patients.id');
             })->select('interviews.*','specialists.specalty_name','users.user_name','patients.patient_name')->get();
           
             return response()->json($interview);

    }
}
