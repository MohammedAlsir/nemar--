@extends('layouts.app')
@section('title','بيانات الطبيب')
@section('doctor_open','menu-open')
@section('doctor','active')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <!-- left column -->
            <div class="col-md-11">
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">تعديل بيانات الطبيب {{$item->name}} </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('doctor.update',$item->id)}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                       <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">اسم الطبيب  </label>
                                <div class="col-sm-10">
                                    <input required type="text"  value="{{$item->name}}" class="form-control" name="name">
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <label class="col-sm-2 control-label">المستشفى</label>
                                <div class="col-sm-10">
                                   <select required class="form-control" name="hospital_id" id="">
                                           <option value="">اختر المستشفى</option>
                                       @foreach ($model_1 as $item_one)
                                           <option {{$item->hospital_id == $item_one->id ? 'selected':''}} value="{{$item_one->id}}">{{$item_one->name}}</option>
                                       @endforeach

                                   </select>
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">التخصص</label>
                                <div class="col-sm-10">
                                   <select required class="form-control" name="specialtie_id" id="">
                                       <option value="">اختر التخصص</option>
                                       @foreach ($model_2 as $item_two)
                                           <option  {{$item->specialtie_id == $item_two->id ? 'selected':''}} value="{{$item_two->id}}">{{$item_two->name}}</option>
                                       @endforeach
                                   </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">سنة الميلاد</label>
                                <div class="col-sm-10">
                                    <input required type="text"  value="{{$item->birth}}" class="form-control" name="birth">
                                </div>
                            </div>





                             <div class="form-group row">
                                <label class="col-sm-2 control-label">رقم الهاتف  </label>
                                <div class="col-sm-10">
                                    <input required type="number"  value="{{$item->phone}}" class="form-control" name="phone">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-2 control-label">سعر الكشف   </label>
                                <div class="col-sm-10">
                                    <input required type="number"  value="{{$item->price}}" class="form-control" name="price">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-2 control-label">حول الطبيب</label>
                                <div class="col-sm-10">
                                    <textarea required type="number"  class="form-control" name="about">{{$item->about}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 control-label"></label>
                                <div class="col-md-10">
                                    <img style="width: 150px; height: 150px; object-fit: cover;"  src="{{asset('uploads/doctors/'.$item->photo)}}" alt="لا يوجد صورة للطبيب " srcset="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 control-label">الصورة الشخصية</label>

                                <div class="col-md-10">
                                    <input  type="file" class="form-control" name="photo" >
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-2 control-label">البريد الالكتروني</label>
                                <div class="col-sm-10">
                                    <input required type="email"  value="{{$item->name_user->email}}" class="form-control" name="email">
                                    <span class="small" style="color: red">هذا الحقل خاص  بعملية تسجيل الدخول </span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label"> كلمة المرور</label>
                                <div class="col-sm-10">
                                    <input  type="password" class="form-control" name="password">
                                    <span class="small" style="color: red">هذا الحقل خاص  بعملية تسجيل الدخول </span>

                                </div>
                            </div>

                             <!-- /.card-body -->
                            <div class="card-footer">
                                <h4>ايام العمل </h4>
                            </div>

                            {{-- السبت --}}
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">السبت</label>
                                <label class="col-sm-1 control-label">من</label>
                                <div class="col-sm-3">
                                    {{-- {{dd($workTime->where('day','السبت')->pluck('to')->first())}} --}}
                                    <input  type="hidden" class="form-control" value="السبت" name="day[]">
                                    <input  type="time" value="{{$st->where('day','السبت')->pluck('from')->first()}}" class="form-control" name="from[]">
                                </div>
                                <label class="col-sm-1 control-label">الي</label>
                                <div class="col-sm-3">
                                    <input  type="time" value="{{$st->where('day','السبت')->pluck('to')->first()}}" class="form-control" name="to[]">
                                </div>
                            </div>

                            {{-- الاحد --}}
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">الاحد</label>
                                <label class="col-sm-1 control-label">من</label>
                                <div class="col-sm-3">
                                    <input  type="hidden" class="form-control" value="الاحد" name="day[]">
                                    <input  type="time" value="{{$sun->where('day','الاحد')->pluck('from')->first()}}" class="form-control" name="from[]">
                                </div>
                                <label class="col-sm-1 control-label">الي</label>
                                <div class="col-sm-3">
                                    <input  type="time" value="{{$sun->where('day','الاحد')->pluck('to')->first()}}" class="form-control" name="to[]">
                                </div>
                            </div>

                            {{-- الاثنين --}}
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">الاثنين</label>
                                <label class="col-sm-1 control-label">من</label>
                                <div class="col-sm-3">
                                    <input  type="hidden" class="form-control" value="الاثنين" name="day[]">
                                    <input  type="time" value="{{$mon->where('day','الاثنين')->pluck('from')->first()}}" class="form-control" name="from[]">
                                </div>
                                <label class="col-sm-1 control-label">الي</label>
                                <div class="col-sm-3">
                                    <input  type="time" value="{{$mon->where('day','الاثنين')->pluck('to')->first()}}" class="form-control" name="to[]">
                                </div>
                            </div>

                            {{-- الثلاثاء --}}
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">الثلاثاء</label>
                                <label class="col-sm-1 control-label">من</label>
                                <div class="col-sm-3">
                                    <input  type="hidden" class="form-control" value="الثلاثاء" name="day[]">
                                    <input  type="time" value="{{$tue->where('day','الثلاثاء')->pluck('from')->first()}}" class="form-control" name="from[]">
                                </div>
                                <label class="col-sm-1 control-label">الي</label>
                                <div class="col-sm-3">
                                    <input  type="time" value="{{$tue->where('day','الثلاثاء')->pluck('to')->first()}}" class="form-control" name="to[]">
                                </div>
                            </div>

                            {{-- الاربعاء --}}
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">الاربعاء</label>
                                <label class="col-sm-1 control-label">من</label>
                                <div class="col-sm-3">
                                    <input  type="hidden" class="form-control" value="الاربعاء" name="day[]">
                                    <input  type="time" value="{{$wed->where('day','الاربعاء')->pluck('from')->first()}}" class="form-control" name="from[]">
                                </div>
                                <label class="col-sm-1 control-label">الي</label>
                                <div class="col-sm-3">
                                    <input  type="time" value="{{$wed->where('day','الاربعاء')->pluck('to')->first()}}" class="form-control" name="to[]">
                                </div>
                            </div>

                            {{-- الخميس --}}
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">الخميس</label>
                                <label class="col-sm-1 control-label">من</label>
                                <div class="col-sm-3">
                                    <input  type="hidden" class="form-control" value="الخميس" name="day[]">
                                    <input  type="time" value="{{$thu->where('day','الخميس')->pluck('from')->first()}}" class="form-control" name="from[]">
                                </div>
                                <label class="col-sm-1 control-label">الي</label>
                                <div class="col-sm-3">
                                    <input  type="time" value="{{$thu->where('day','الخميس')->pluck('to')->first()}}" class="form-control" name="to[]">
                                </div>
                            </div>

                            {{-- الجمعة --}}
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">الجمعة</label>
                                <label class="col-sm-1 control-label">من</label>
                                <div class="col-sm-3">
                                    <input  type="hidden" class="form-control" value="الجمعة" name="day[]">
                                    <input  type="time" value="{{$fri->where('day','الجمعة')->pluck('from')->first()}}" class="form-control" name="from[]">
                                </div>
                                <label class="col-sm-1 control-label">الي</label>
                                <div class="col-sm-3">
                                    <input  type="time" value="{{$fri->where('day','الجمعة')->pluck('to')->first()}}" class="form-control" name="to[]">
                                </div>
                            </div>


                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-block btn-info">اضافة</button>
                            </div>
                        </div>
                            <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->

            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection


