@extends('layouts.app')
@section('title','إضافة مستشفى جديد')
@section('clinic_open','menu-open')
@section('clinic','active')
@section('clinic_create','active')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <!-- left column -->
            <div class="col-md-11">
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">بيانات المستشفى الجديد</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('clinic.store')}}" class="form-horizontal">
                        @csrf
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">اسم المستشفى  </label>
                                <div class="col-sm-10">
                                    <input required type="text" class="form-control" name="clinic_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">العنوان</label>
                                <div class="col-sm-10">
                                    <input required type="text" class="form-control" name="Address">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-sm-2 control-label">رقم الهاتف  </label>
                                <div class="col-sm-10">
                                    <input required type="number" class="form-control" name="phone">
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


