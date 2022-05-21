<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = 1;
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        $reservations = Reservation::where('doctor_id', $doctor->id)->get();
        return view('reservations.index', compact('reservations', 'index'));
    }

    public function new()
    {
        $index = 1;
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        $reservations = Reservation::where('doctor_id', $doctor->id)->where('status', 0)->get();
        return view('reservations.new', compact('reservations', 'index'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        $reservations = Reservation::find($id);
        return view('reservations.edit', compact('reservations'));
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
        $reservations = Reservation::find($id);

        $reservations->diagnosis = $request->diagnosis;
        $reservations->status = 1;
        $reservations->save();

        toast('تم اضافة بيانات الكشف بنجاح', 'success');

        return redirect()->route('reservations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservations = Reservation::find($id);


        $reservations->delete();

        toast('تم حذف بيانات الكشف بنجاح', 'success');

        return redirect()->route('reservations.index');
    }
}