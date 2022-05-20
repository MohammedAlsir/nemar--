<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ApiController extends Controller
{
    //Regester Function
    public function register(Request $request)
    {

        //
        $data = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',

                'gender' => 'required',
                'phone' => 'required',
                'birth' => 'required',
                'blood_type' => 'required',
            ]
        );

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'sick';
        $user->password = Hash::make($request->password);
        $user->save();

        $patient = new Patient();
        $patient->name = $request->name;
        $patient->gender = $request->gender;
        $patient->birth = $request->birth;
        $patient->phone = $request->phone;
        $patient->blood_type = $request->blood_type;
        $patient->user_id = $user->id;
        $patient->save();
        //
        $token = $user->createToken('LaravelAuthApp')->accessToken;

        return response()->json([
            'token' => $token,
            'patient' => $patient,
            'user' => $user,
            'error' => false,
            'message_en' => '',
            'message_ar' => ''
        ], 200);
    }

    // Login
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required|min:8'
        ]);



        if (Auth::attempt($data)) {
            if (auth()->user()->role == 'sick') {
                $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
                return response()->json(
                    [
                        'token' => $token,
                        'user' => Auth::user(),
                        'error' => false,
                        'message_en' => '',
                        'message_ar' => ''
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        'error'     => true,
                        'message_en'   => 'Unauthorised ,Sorry, you do not have access to this page ',
                        'message_ar'   => 'عفوا ، ليس لديك صلاحيات الوصول إلى هذه الصفحة',
                    ],
                    200
                );
            }
        } else {
            return response()->json([
                'error'     => true,
                'message_en'   => 'Sorry, there is an error in your phone or password',
                'message_ar'   => 'عفوا ، هناك خطأ في رقم الهاتف أو كلمة المرور الخاصة بك',
            ], 200);
        }
    }

    // Edit profile
    public function profile(Request $request, $id)
    {
        $user = User::find($id);

        //Start Edit  User Data

        if (auth()->user()->id == $user->id && $user->role == 'sick') {
            $data = $request->validate([
                'name' => 'required',
                'email' => ['email', Rule::unique('users')->ignore($user)],
                'password' => 'min:8',
                'gender' => 'required',
                'phone' => 'required',
                'birth' => 'required',
                'blood_type' => 'required',
            ]);

            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            $patient = Patient::where('user_id', $id)->first();
            $patient->name = $request->name;
            $patient->gender = $request->gender;
            $patient->birth = $request->birth;
            $patient->phone = $request->phone;
            $patient->blood_type = $request->blood_type;
            $patient->save();


            return response()->json([
                'user' => $user,
                'patient' => $patient,
                'error' => false,
                'message_en' => 'succses edit user data',
                'message_ar' => 'تم تعديل بيانات هذا المستخدم بنجاح'
            ], 200);
        } else {
            return response()->json([
                'error'     => true,
                'message_en'   => 'Unauthorised ,Sorry, you do not have access to this page ',
                'message_ar'   => 'عفوا ، ليس لديك صلاحيات الوصول إلى هذه الصفحة',
            ], 200);
        }
        //End Edit  User Data
    }
}