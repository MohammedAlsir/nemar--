<?php

namespace App\Http\Controllers\api;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Resources\doctorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\clincResource;
class clinicsController extends Controller
{
    
        public function index()
        {
           $clinics = Clinic::all();
           return clincResource::collection($clinics);
        }
        public function show($id){
                $clinic = Clinic::find($id);
        if($clinic == null)
                return response()->json([
                  'error'=> true,
                  'message'=>'clinic not found' ,  //الهاتف غير صحيح
                  'code'=> 1  ],
                    404);
              else{
                 
                
                return response()->json([
                'error'=>false,
                'message'=>'',
                'data'=>$clinic],200);
              }
            
        }
        public function clinicDoctors($id){
               $doctors = Doctor::where('clinic_id',$id)->get();
               if($doctors == null)
                return response()->json([
                  'error'=> true,
                  'message'=>'has no doctors' ,  
                  'code'=> 1  ],
                    404);
              else{
                 
                
                return doctorResource::collection($doctors);
              }

        }

        public function search(Request $request){
          $name = $request->name;
         
         $clinic = DB::table('clinics')->where('clinic_name', $name)->get();
         if($clinic == null){
         return response()->json([
           'error'=> true,
           'message'=>'there is no clinic' ,  
           'code'=> 1  ],
             404);}
       else{
          
         
         return response()->json([
         'error'=>false,
         'message'=>'all clinics',
         'data'=>$clinic],200);
       }

           }
}

