<?php

namespace App\Http\Controllers;

use App\Http\Requests\Hosptal;
use App\Models\Hospital;
use App\Models\User;
use App\Traits\Oprations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HospitalController extends Controller
{

    use Oprations;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->index_data(Hospital::class, 'hospital.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->create_date('hospital.create');
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

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'hospital';
        $user->password = Hash::make($request->password);
        $user->save();


        $hospital = new Hospital();
        $hospital->name = $request->name;
        $hospital->location = $request->location;
        $hospital->phone = $request->phone;
        $hospital->user_id = $user->id;


        $hospital->save();


        toast('تم الاضافة بنجاح', 'success');
        return redirect()->route('hospital.index');
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
        return $this->edit_data(Hospital::class, $id, 'hospital.edit');
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
        $hospital =  Hospital::find($id);

        $user = User::where('id', $hospital->user_id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'hospital';
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();


        $hospital->name = $request->name;
        $hospital->location = $request->location;
        $hospital->phone = $request->phone;
        $hospital->user_id = $user->id;


        $hospital->save();


        toast('تم التعديل بنجاح', 'success');
        return redirect()->route('hospital.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospital =  Hospital::find($id);

        $user = User::where('id', $hospital->user_id)->first();

        $hospital->delete();
        $user->delete();

        toast('تم التعديل بنجاح', 'success');
        return redirect()->route('hospital.index');
    }
}
