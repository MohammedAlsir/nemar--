<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinic = Clinic::all();
        $index = 1;
        return view('clinic.index', compact('clinic', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clinic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'email'        => 'required|unique:users',

        ));

        //Insert

        $clinic = new Clinic();

        $clinic->clinic_name = $request->clinic_name;
        $clinic->Address = $request->Address;
        $clinic->phone = $request->phone;

        $clinic->save();

        $user = new User();
        $user->name = $request->clinic_name;
        $user->user_name = $request->clinic_name;
        $user->email = $request->email;
        $user->address = $request->Address;
        $user->address = $request->Address;
        $user->role = 'clinicAdmin';
        $user->password = Hash::make($request->password);

        $user->save();



        toast('تم الاضافة  بنجاح', 'success');

        // Session::flash('SUCCESS', 'تم إضافة المستخدم بنجاح');


        // redirect
        return redirect()->route('clinic.index');
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
        $clinic = Clinic::find($id);
        $user = User::where('user_name', $clinic->clinic_name)->first();
        return view('clinic.edit', compact('clinic', 'user'));
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
        $clinic =  Clinic::find($id);
        $user = User::where('user_name', $clinic->clinic_name)->first();


        $this->validate($request, array(
            'email' => ['required', Rule::unique('users')->ignore($user)],


        ));

        //Insert


        $clinic->clinic_name = $request->clinic_name;
        $clinic->Address = $request->Address;
        $clinic->phone = $request->phone;

        $clinic->save();

        // $user = new User();
        $user->name = $request->clinic_name;
        $user->user_name = $request->clinic_name;
        $user->email = $request->email;
        $user->address = $request->Address;
        $user->address = $request->Address;
        $user->role = 'clinicAdmin';
        $user->password = Hash::make($request->password);
        $user->save();



        toast('تم التعديل  بنجاح', 'success');

        // Session::flash('SUCCESS', 'تم إضافة المستخدم بنجاح');


        // redirect
        return redirect()->route('clinic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clinic =  Clinic::find($id);
        $user = User::where('user_name', $clinic->clinic_name)->first();
        $clinic->delete();
        $user->delete();
        toast('تم الحذف  بنجاح', 'success');

        return redirect()->route('clinic.index');
    }
}