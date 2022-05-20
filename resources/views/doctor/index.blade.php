@extends('layouts.app')
@section('title','كل الاطباء')
@section('doctor_open','menu-open')
@section('doctor','active')
@section('doctor_index','active')



@section('content')
<!-- Main content -->
    <section class="content">
      <div class="">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">بيانات كل الاطباء</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>اسم الطبيب </th>
                  <th>الصورة</th>
                  <th> المستشفى </th>
                  <th>التخصص</th>
                  <th>العمر</th>
                  <th>رقم الهاتف</th>
                  {{-- <th>حول </th> --}}
                  <th>سعر الكشف</th>
                  <th>العمليات</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($collection as $item)
                        <tr>
                            <td>{{$index++}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <img style="width: 50px; height: 50px; object-fit: cover;"  src="{{asset('uploads/doctors/'.$item->photo)}}"  srcset="">
                            </td>
                            <td>{{$item->hospital->name}}</td>
                            <td>{{$item->specialties->name}}</td>
                            <td>{{ 2022 - $item->birth}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{number_format($item->price)}}</td>
                            {{-- <td>{{$item->products->count()}}</td> --}}
                            <td>
                                <div>
                                    <form  action="{{route('doctor.destroy',$item->id)}}" method="POST">
                                        {{ csrf_field()}}
                                        {{ method_field('delete') }}
                                        <a href="{{route('doctor.edit',$item->id)}}" class="btn btn-primary"> تعديل</a>
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
