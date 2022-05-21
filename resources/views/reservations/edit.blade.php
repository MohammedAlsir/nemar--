@extends('layouts.app')
@section('title','بيانات الكشف')
@section('reservations_open','menu-open')
@section('reservations','active')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <!-- left column -->
            <div class="col-md-11">
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"> بيانات الكشف </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('reservations.update',$reservations->id)}}" class="form-horizontal">
                        @csrf
                        @method('put')
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">اسم المريض  </label>
                                <div class="col-sm-10">
                                    <input readonly disabled type="text" value="{{$reservations->patient->name}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">النوع </label>
                                <div class="col-sm-10">
                                    <input readonly disabled type="text" value="{{$reservations->patient->gender}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">فصيلة الدم  </label>
                                <div class="col-sm-10">
                                    <input readonly disabled type="text" value="{{$reservations->patient->blood_type}}" class="form-control">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 control-label">العمر </label>
                                <div class="col-sm-10">
                                    <input readonly disabled type="text" value="{{2022 - (int)$reservations->patient->brith}}" class="form-control">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 control-label">رقم الهاتف </label>
                                <div class="col-sm-10">
                                    <input readonly disabled type="text" value="{{$reservations->patient->phone}}" class="form-control">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 control-label"> الكشف </label>
                                <div class="col-sm-10">
                                    <textarea name="diagnosis" class="form-control">{{$reservations->diagnosis}}</textarea>
                                </div>
                            </div>







                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-block btn-info">اضافة بيانات الكشف </button>
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


