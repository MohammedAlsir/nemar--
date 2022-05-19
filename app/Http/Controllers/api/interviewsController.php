<?php

namespace App\Http\Controllers\api;
use App\Models\Interview;
use App\Models\Examination;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class interviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created interview in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $InterviewCount = Interview::where('date', '=', $request->input('date'))->where('doctor_id','=',$request->input('doctor_id'))->count();
      
        if($InterviewCount >= 10){// التحقق من ان الخجوزات لا تتجاوز العشرة  في هذا التاريخ
         
         {
                return response()->json(
                  ['error'=> true,
                  'message'=>'you cant make reservation on this date coz it full try anther date',
                  'code'=> 0 ]
                  ,401); // العدد مستوفي في هذا التاريخ
               }
        } else{
            $newInterview = Interview::create([ //انشاء مستخدم جديد
                'name' => $request['name'],
                'date' => $request['date'],
                'age' => $request['age'],
                'patient_id' =>$request['patient_id'],
                'doctor_id' =>$request['doctor_id'],

                'tirn' => $InterviewCount + 1,
            ]);
            return response()->json(
              ['error'=>false,
              'message'=>'',
              'data'=>$newInterview],201);

              }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function interviewExaminations($id)
    {
        $examination = Examination::where('interview_id','=',$id)->where('state','=','finish')->get();
        if($examination == null)
        {
        return response()->json([
          'error'=> true,
          'message'=>'there is no rsualts yat' ,  
          ],
            404);
        }
      else{
         
       
        return response()->json([
        'error'=>false,
        'message'=>'',
        'data'=>$examination],200);
      }
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
