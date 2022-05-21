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


