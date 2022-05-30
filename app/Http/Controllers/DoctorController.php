<?php

namespace App\Http\Controllers;

use App\Http\Requests\Hosptal;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Specialties;
use App\Models\User;
use App\Models\WorkTime;
use App\Traits\Oprations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    use Oprations;
    private $uploadPath = "uploads/doctors/";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $this->index_data(Doctor::class, 'doctor.index');
        $index = 1;
        $hospital = Hospital::where('user_id', Auth::user()->id)->first();
        $collection = Doctor::where('hospital_id', $hospital->id)->orderBy('id', 'DESC')->get();
        return view('doctor.index', compact('collection', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->create_date_with_two_model('doctor.create', Hospital::class, Specialties::class);
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
        $user->role = 'doctor';
        $user->password = Hash::make($request->password);
        $user->save();

        $hospital = Hospital::where('user_id', Auth::user()->id)->first();

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->hospital_id = $hospital->id;
        $doctor->specialtie_id = $request->specialtie_id;
        $doctor->birth = $request->birth;
        $doctor->phone = $request->phone;
        $doctor->price = $request->price;
        $doctor->about = $request->about;
        $doctor->user_id = $user->id;

        // حفظ الصورة الشخصية
        $formFile = "photo";
        $fileFinalName = "";
        if ($request->$formFile != "") {
            // Delete file if there is a new one
            if ($doctor->$formFile != "") {
                File::delete($this->uploadPath . $doctor->$formFile);
            }
            $fileFinalName = time() . rand(
                1111,
                9999
            ) . '.' . $request->file($formFile)->getClientOriginalExtension();
            $path = $this->uploadPath;
            $request->file($formFile)->move($path, $fileFinalName);
        }

        if ($fileFinalName != "") {
            $doctor->photo = $fileFinalName;
        }
        $doctor->save();

        foreach ($request->day as $index => $day) {
            // $loop->index
            if ($request->from[$index] != '' && $request->to[$index] != '') {
                $days = new WorkTime();
                $days->day  = $day;
                $days->from = $request->from[$index];
                $days->to  = $request->to[$index];
                $days->doctor_id = $doctor->id;
                $days->save();
            }
        }

        toast('تم الاضافة بنجاح', 'success');
        return redirect()->route('doctor.index');
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
        $st = WorkTime::where('doctor_id', $id);
        $sun = WorkTime::where('doctor_id', $id);
        $mon = WorkTime::where('doctor_id', $id);
        $tue = WorkTime::where('doctor_id', $id);
        $wed = WorkTime::where('doctor_id', $id);
        $thu = WorkTime::where('doctor_id', $id);
        $fri = WorkTime::where('doctor_id', $id);

        $item = Doctor::find($id);
        $model_1 = Hospital::orderBy('id', 'DESC')->get();
        $model_2 = Specialties::orderBy('id', 'DESC')->get();
        return view('doctor.edit', compact(
            'item',
            'model_1',
            'model_2',
            'st',
            'sun',
            'mon',
            'tue',
            'wed',
            'thu',
            'fri',
        ));
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


        $doctor = Doctor::find($id);

        $user = User::where('id', $doctor->user_id)->first();


        $this->validate($request, array(
            'email' => ['required', Rule::unique('users')->ignore($user)],

        ));
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'doctor';
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $hospital = Hospital::where('user_id', Auth::user()->id)->first();

        $doctor->name = $request->name;
        $doctor->hospital_id = $hospital->id;

        $doctor->specialtie_id = $request->specialtie_id;
        $doctor->birth = $request->birth;
        $doctor->phone = $request->phone;
        $doctor->price = $request->price;
        $doctor->about = $request->about;
        // $doctor->user_id = $user->id;

        // حفظ الصورة الشخصية
        $formFile = "photo";
        $fileFinalName = "";
        if ($request->$formFile != "") {
            // Delete file if there is a new one
            if ($doctor->$formFile != "") {
                File::delete($this->uploadPath . $doctor->$formFile);
            }
            $fileFinalName = time() . rand(
                1111,
                9999
            ) . '.' . $request->file($formFile)->getClientOriginalExtension();
            $path = $this->uploadPath;
            $request->file($formFile)->move($path, $fileFinalName);
        }


        if ($fileFinalName != "") {
            $doctor->photo = $fileFinalName;
        }


        $doctor->save();

        WorkTime::where('doctor_id', $id)->delete();
        foreach ($request->day as $index => $day) {
            // $loop->index
            if ($request->from[$index] != '' && $request->to[$index] != '') {
                $days = new WorkTime();
                $days->day  = $day;
                $days->from = $request->from[$index];
                $days->to  = $request->to[$index];
                $days->doctor_id = $doctor->id;
                $days->save();
            }
        }

        toast('تم التعديل  بنجاح', 'success');
        return redirect()->route('doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);

        $user = User::where('id', $doctor->user_id)->first();

        $doctor->delete();
        $user->delete();

        toast('تم الحذف  بنجاح', 'success');
        return redirect()->route('doctor.index');
    }
}