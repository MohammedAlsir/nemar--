<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\clinic;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class usercontroller extends Controller
{
     /*****************************************************************************************************
     * 
     *                                   Begin Regester Function 
     * 
     *****************************************************************************************************/
    public function Register(Request $request)
    {
        $user = User::where('phone', '=', $request->input('phone'))->first();
        if($user == null){
                $new_user = User::create([ //انشاء مستخدم جديد
                                'user_name' => $request['name'],
                                'phone' => $request['phone'],
                                'email' => $request['email'],
                                'role' => 'user',
                                'password' => Hash::make($request['password']),
                                'remember_token' => Str::random(60),
                            ]);
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
        $user = User::where('phone', '=', $request->input('phone'))->first();
        if($user != null){// for test user not empty
          if($request->input('password') == $user->password){
            $token = Str::random(60);// token generation لتوليد توكن لتمييز المستخدمين
            $user->forceFill([
                'remember_token' => $token,
            ])->save(); // حفظ التوكن في قاعدة البيانات 
            return response()->json(
              ['error'=>false,
              'message'=>'',
              'data'=>$user]
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


     public function all(){
$clinic = clinic::all();

if (count($clinic) > 0) { // التأكد من وجود منتجات 
  return response()->json([
     'error'=>false ,
     'message'=>'' ,
     'data'=>$clinic],
         200); // رسالة نجاح // يوجد منتجات حاليا
}else
 return response()->json([
     'error'=>true , 
     'message'=>'Sorry, There Are No Products Currently' ,
     'code'=> 4],
         404);

     }
}
