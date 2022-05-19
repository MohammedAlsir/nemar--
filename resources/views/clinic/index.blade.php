@extends('layouts.app')
@section('title','كل المستشفيات')
@section('clinic_open','menu-open')
@section('clinic','active')
@section('clinic_index','active')



@section('content')
<!-- Main content -->
    <section class="content">
      <div class="">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">بيانات كل المستشفيات</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>اسم المستشفى </th>
                  <th>العنوان</th>
                  <th>رقم الهاتف</th>
                  <th>العمليات</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($clinic as $item)
                        <tr>
                            <td>{{$index++}}</td>
                            <td>{{$item->clinic_name}}</td>
                            <td>{{$item->Address}}</td>
                            <td>{{$item->phone}}</td>
                            {{-- <td>{{$item->products->count()}}</td> --}}
                            <td>
                                <div>
                                    <form  action="{{route('clinic.destroy',$item->id)}}" method="POST">
                                        {{ csrf_field()}}
                                        {{ method_field('delete') }}
                                        <a href="{{route('clinic.edit',$item->id)}}" class="btn btn-primary"> تعديل</a>
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
