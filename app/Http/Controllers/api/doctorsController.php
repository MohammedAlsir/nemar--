<?php

namespace App\Http\Controllers\api;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use App\Http\Resources\doctorResource;
use App\Http\Resources\userResource;

class doctorsController extends Controller
{
    public function byClinicAndSspecialist($clinic,$specialist){
        $doctors =Doctor::where('clinic_id','=',$clinic)->where('specialist_id','=',$specialist)->get();
      
        if($doctors == null)
                return response()->json([
                  'error'=> true,
                  'message'=>'there is no doctors' ,  
                  'code'=> 1  ],
                    404);
              else{
                 
                
                return doctorResource::collection($doctors);
              }
        }
       public function show($id){

         $doctor = Doctor::find($id);
       return new doctorResource($doctor);
       
       }
       public function search(Request $request){
      
         
      
      $user =User::where('user_name', '=',$request->name)->where('role','=','doctor')->latest()->first();
        if($user == null)
                return response()->json([
                  'error'=> true,
                  'message'=>'there is no doctors' ,  
                  'code'=> 1  ],
                    404);
              else{
                
               $doctor = Doctor::where('user_id','=',$user->id)->latest()->first();
               
                return new doctorResource($doctor);
              }
       }

}  
