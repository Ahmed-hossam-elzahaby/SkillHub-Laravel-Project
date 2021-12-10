@extends('admin.layout')


@section('main')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> {{$exam->name()}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('dashbord')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('dashbord/exams')}}">Exams</a></li>

                        <li class="breadcrumb-item active">{{$exam->name()}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 offset-md-1 pb-3">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Exam detailes</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-sm">

                                <tbody>
                                    <tr>
                                        <th>Name (en)</th>
                                        <td>
                                            {{$exam->name('en')}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Name (ar)</th>
                                        <td>
                                            {{$exam->name('ar')}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>IMAGE</th>
                                        <td>
                                            <img src='{{asset("uplods/$exam->img")}}' height="50px" alt="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>SKILL</th>
                                        <td>
                                            {{$exam->skill->name()}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>DESC(EN)</th>
                                        <td>
                                            {{$exam->desc('en')}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>DESC(ar)</th>
                                        <td>
                                            {{$exam->desc('ar')}}
                                        </td>
                                    </tr>


                                    <tr>
                                        <th>DIFFICULTY</th>
                                        <td>
                                            @for($i=1;$i<=$exam->difficulty;$i++)
                                                <i class="fa fa-star"></i>
                                                @endfor
                                                @for($i=1;$i<= 5 - $exam->difficulty;$i++)
                                                    <i class="fa fa-star-o"></i>
                                                    @endfor
                                        </td>
                                    </tr>


                                    <tr>
                                        <th>QUESTION_NUM</th>
                                        <td>
                                            {{$exam->question_no}}
                                        </td>
                                    </tr>












                                </tbody>
                            </table>



                        </div>

                        <!-- /.card-body -->
                    </div>
                    <a href='{{url("dashbord/exams/show/$exam->id/questions")}}' class="btn btn-success">Show question</a>
                    <a href="{{url()->previous()}}"  class="btn btn-primary" >Back</a>

                </div>



            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection