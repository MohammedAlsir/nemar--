@extends('layouts.app')
@section('title','الرئيسية')
@section('home','active')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            @if (Auth::user()->role == 'admin')
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$hospital}}</h3>

                            <p>مستشفى</p>
                        </div>
                        <div class="icon">
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$Specialties}}</h3>

                            <p>تخصص</p>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$Doctor}}</h3>

                            <p>طبيب</p>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$Patient}}</h3>

                            <p>مستخدمين للتطبيق</p>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
            </div>
            @endif

            @if (Auth::user()->role == 'doctor')
            <div class="row">
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$all}}</h3>

                            <p>كل الكشوفات</p>
                        </div>
                        <div class="icon">
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$done}}</h3>

                            <p>الكشوفات المكتملة</p>
                        </div>

                    </div>
                </div>
                <!-- ./col -->

            </div>
            @endif

             @if (Auth::user()->role == 'hospital')
            <div class="row">
                <div class="col-lg-12 col-12">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$all_doctors}}</h3>

                            <p>كل الاطباء</p>
                        </div>
                        <div class="icon">
                        </div>

                    </div>
                </div>


            </div>
            @endif
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
@endsection
