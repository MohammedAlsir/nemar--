@extends('layouts.app')
@section('title','بيانات التخصص')
@section('specialies_open','menu-open')
@section('specialies','active')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <!-- left column -->
            <div class="col-md-11">
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">تعديل بيانات تخصص {{$item->name}} </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('specialies.update',$item->id)}}" class="form-horizontal">
                        @csrf
                        @method('put')
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">اسم التخصص  </label>
                                <div class="col-sm-10">
                                    <input required type="text" value="{{$item->name}}" class="form-control" name="name">
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


