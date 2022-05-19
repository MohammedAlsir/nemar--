<?php

namespace App\Http\Controllers\api;
use Illuminate\Http\Response;
use App\Models\Patient;
use App\Models\Interview;
use App\Models\Examination;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Resources\interviewsResource;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Superglobals;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


 /*****************************************************************************************************
     * 
     *                                   Begin Regester Function 
     * 
     *****************************************************************************************************/
    public function Register(Request $request)
    {
        $Patient = Patient::where('phone', '=', $request->input('phone'))->first();
        if($Patient == null){
                $new_user = new Patient();
                $new_user->patient_name = $request->input('name'); 
                $new_user->phone = $request->input('phone'); 
                $new_user->email = $request->input('email'); 
                $new_user->password = $request->input('password'); 
                $new_user->save();
                            return response()->json(
                              ['error'=>false,
                              'message'=>'',
                              'data'=>$new_user],201);
            
            
        }else
            return response()->json(
              ['error'=>true,
              'message'=> 'The Phone Is Duplicated...',
              'code'=> 4  ]
              ,400); //يوجد مستخدم بهذا الرقم
    }
     /*****************************************************************************************************
     * 
     *                                   End  Regester Function 
     * 
     *****************************************************************************************************/
    /*****************************************************************************************************
     * 
     *                                   Begin Login Function 
     * 
     *****************************************************************************************************/
    public function login(Request $request){
        $Patient = Patient::where('phone', '=', $request->input('phone'))->first();
        if($Patient != null){// for test user not empty
         
          if($request->input('password') == $Patient->password){
            $token = Str::random(60);// token generation لتوليد توكن لتمييز المستخدمين
            $Patient->forceFill([
                'remember_token' => $token,
            ])->save(); // حفظ التوكن في قاعدة البيانات 
            return response()->json(
              ['error'=>false,
              'message'=>'',
              'data'=>$Patient]
              ,200); // رقم الهاتف وكلمة المرور صحيحة وارجاع رسالة 200 
          }else{
                return response()->json(
                  ['error'=> true,
                  'message'=>'The Password Is Wrong',
                  'code'=> 0 ]
                  ,401); // خطأ في كلمة المرور
               }
        } else{
                return response()->json(
                  ['error'=> true,
                  'message'=>'Phone Number Is Incorrect' ,
                  'code'=> 1 ]
                  ,401); // خطأ في رقم الهاتف 
              }
    } 
     /*****************************************************************************************************
     * 
     *                                   End  Login Function 
     * 
     *****************************************************************************************************/
     /*****************************************************************************************************
     * 
     *                                   Begin  Profile Function 
     * 
     *****************************************************************************************************/
    public function profile(Request $request , $id){
        
        $Patient = Patient::find($id);
        if($Patient == null)
          return response()->json([
            'error'=> true,
            'message'=>'Phone Number Is Incorrect' ,  //الهاتف غير صحيح
            'code'=> 1  ],
              404);
        else{
           
          $Patient->fill($request->all())->save();
          return response()->json([
          'error'=>false,
          'message'=>'',
          'data'=>$Patient],200);
        }
    }
     /*****************************************************************************************************
     * 
     *                                   End  Profile Function 
     * 
     *****************************************************************************************************/
     //show the interviews for the patient by his id
    public function interviews($id)
    {
        $Interviews = Interview::where('patient_id', '=',$id)->get(); 
        if($Interviews == null)
          return response()->json([
            'error'=> true,
            'message'=>'there is no interviews for this patient' ,  //الهاتف غير صحيح
            'code'=> 1  ],
              404);
        else{
           
         
          return interviewsResource::collection($Interviews);
        }
    }

    /**
     * Show the examinations for the patient by his id
     *
     * @return \Illuminate\Http\Response
     */
    public function examinations($id)
    {
      $GLOBALS["idd"] = $id;
        $examinations =  DB::table('examinations')->join('interviews',function($join,)
        {

          
           $join->on('examinations.interview_id','=','interviews.id')
     ->where('interviews.patient_id','=',$GLOBALS["idd"]);
           }
           )->join('clinics',function($join){

             $join->on('examinations.clinic_id','=','clinics.id');
           }
           )->select('examinations.*','clinics.clinic_name')->get();

           if($examinations == null){

           
           return response()->json([
             'error'=> true,
             'message'=>'there is no examinations for this patient' ,  //الهاتف غير صحيح
             'code'=> 1  ],
               404);
           }
         else{
            
          return response()->json([
            'error'=>false,
            'message'=>'',
            'data'=>$examinations],200);
         }
     

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newExaminations($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
