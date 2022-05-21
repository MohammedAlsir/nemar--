<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\Reservation;
use App\Models\Specialties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $doctor = 0;
        $all = 0;
        $done = 0;
        $all_doctors = 0;

        if (Auth::user()->role == 'doctor') {
            $doctor = Doctor::where('user_id', Auth::user()->id)->first();
            $all = Reservation::where('doctor_id', $doctor->id)->count(); #كل الكشوفات
            $done = Reservation::where('doctor_id', $doctor->id)->where('status', 1)->count(); #  مكتملة

        }

        if (Auth::user()->role == 'hospital') {
            $hospital = Hospital::where('user_id', Auth::user()->id)->first();

            $all_doctors = Doctor::where('hospital_id', $hospital->id)->count(); #كل الاطباء

        }

        $hospital = Hospital::count();
        $Specialties = Specialties::count();
        $Doctor = Doctor::count();
        $Patient = Patient::count();
        return view('home', compact(
            'hospital',
            'Specialties',
            'Doctor',
            'Patient',
            'all',
            'done',
            'all_doctors'
        ));
    }
}