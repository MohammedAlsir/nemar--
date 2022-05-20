<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\Specialties;
use Illuminate\Http\Request;

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
        $hospital = Hospital::count();
        $Specialties = Specialties::count();
        $Doctor = Doctor::count();
        $Patient = Patient::count();
        return view('home', compact(
            'hospital',
            'Specialties',
            'Doctor',
            'Patient'
        ));
    }
}
