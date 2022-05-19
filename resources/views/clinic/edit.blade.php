@extends('layouts.app')
@section('title','بيانات المستشفى')
@section('clinic_open','menu-open')
@section('clinic','active')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <!-- left column -->
            <div class="col-md-11">
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">تعديل بيانات قسم {{$clinic->name}} </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('clinic.update',$clinic->id)}}" class="form-horizontal">
                        @csrf
                        @method('put')
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">اسم المستشفى  </label>
                                <div class="col-sm-10">
                                    <input required type="text" value="{{$clinic->clinic_name}}" class="form-control" name="clinic_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">العنوان</label>
                                <div class="col-sm-10">
                                    <input required type="text" class="form-control" value="{{$clinic->Address}}" name="Address">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-sm-2 control-label">رقم الهاتف  </label>
                                <div class="col-sm-10">
                                    <input required type="number" class="form-control"  value="{{$clinic->phone}}" name="phone">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-sm-2 control-label">البريد الالكتروني</label>
                                <div class="col-sm-10">
                                    <input required type="email" class="form-control" value="{{$user->email}}" name="email">
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
                                <button type="submit" class="btn btn-block btn-info">تعديل</button>
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


