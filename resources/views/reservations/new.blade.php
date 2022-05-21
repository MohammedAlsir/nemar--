@extends('layouts.app')
@section('title','كل الكشوفات الجديدة')
@section('reservations_open','menu-open')
@section('reservations','active')
@section('reservations_index','active')



@section('content')
<!-- Main content -->
    <section class="content">
      <div class="">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">بيانات كل الكشوفات الجديدة</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>اسم المريض </th>
                  <th>النوع</th>
                  <th>فصيلة الدم</th>
                  <th>العمر</th>
                  <th>رقم الهاتف</th>
                  <th>حالة الكشف</th>
                  <th>العمليات</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $item)
                        <tr>
                            <td>{{$index++}}</td>
                            <td>{{$item->patient->name}}</td>
                            <td>{{$item->patient->gender}}</td>
                            <td>{{$item->patient->blood_type}}</td>
                            <td>{{2022 - (int)$item->patient->birth}}</td>
                            <td>{{$item->patient->phone}}</td>
                            <td>
                                @if($item->status == 0)
                                    كشف جديد
                                @else
                                    اكتمل الكشف
                                @endif
                            </td>
                            {{-- <td>{{$item->products->count()}}</td> --}}
                            <td>
                                <div>
                                    <form  action="{{route('reservations.destroy',$item->id)}}" method="POST">
                                        {{ csrf_field()}}
                                        {{ method_field('delete') }}
                                        <a href="{{route('reservations.edit',$item->id)}}" class="btn btn-primary"> الكشف</a>
                                        <button type="submit" class="show_confirm  btn btn-danger"></i>&nbsp; حذف</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach



                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
