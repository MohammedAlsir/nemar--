@extends('layouts.app')
@section('title','إضافة طبيب جديد')
@section('doctor_open','menu-open')
@section('doctor','active')
@section('doctor_create','active')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <!-- left column -->
            <div class="col-md-11">
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">بيانات الطبيب الجديد</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('doctor.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">اسم الطبيب  </label>
                                <div class="col-sm-10">
                                    <input required type="text" class="form-control" name="name">
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <label class="col-sm-2 control-label">المستشفى</label>
                                <div class="col-sm-10">
                                   <select required class="form-control" name="hospital_id" id="">
                                           <option value="">اختر المستشفى</option>
                                       @foreach ($model_1 as $item)
                                           <option value="{{$item->id}}">{{$item->name}}</option>
                                       @endforeach

                                   </select>
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">التخصص</label>
                                <div class="col-sm-10">
                                   <select required class="form-control" name="specialtie_id" id="">
                                       <option value="">اختر التخصص</option>
                                       @foreach ($model_2 as $item)
                                           <option value="{{$item->id}}">{{$item->name}}</option>
                                       @endforeach
                                   </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">سنة الميلاد</label>
                                <div class="col-sm-10">
                                    <input required type="text" class="form-control" name="birth">
                                </div>
                            </div>





                             <div class="form-group row">
                                <label class="col-sm-2 control-label">رقم الهاتف  </label>
                                <div class="col-sm-10">
                                    <input required type="number" class="form-control" name="phone">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-2 control-label">سعر الكشف   </label>
                                <div class="col-sm-10">
                                    <input required type="number" class="form-control" name="price">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-2 control-label">حول الطبيب</label>
                                <div class="col-sm-10">
                                    <textarea required type="number" class="form-control" name="about"></textarea>
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <label class="col-md-2 control-label"></label>
                                <div class="col-md-10">
                                    <img style="width: 150px; height: 150px; object-fit: cover;"  src="{{asset('uploads/users/'.Auth::user()->photo)}}" alt="لا يوجد صورة للطبيب " srcset="">
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 control-label">الصورة الشخصية</label>

                                <div class="col-md-10">
                                    <input required type="file" class="form-control" name="photo" >
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-2 control-label">البريد الالكتروني</label>
                                <div class="col-sm-10">
                                    <input required type="email" class="form-control" name="email">
                                    <span class="small" style="color: red">هذا الحقل خاص  بعملية تسجيل الدخول </span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label"> كلمة المرور</label>
                                <div class="col-sm-10">
                                    <input required type="password" class="form-control" name="password">
                                    <span class="small" style="color: red">هذا الحقل خاص  بعملية تسجيل الدخول </span>

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


