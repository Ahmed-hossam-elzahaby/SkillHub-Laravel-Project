@extends('admin.layout')


@section('main')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> {{$exam->name()}} / Questions </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('dashbord')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('dashbord/exams')}}">Exams</a></li>
                        <li class="breadcrumb-item"><a href='{{url("dashbord/exams/show/$exam->id")}}'>{{$exam->name()}}</a></li>

                        <li class="breadcrumb-item active">Questions</li>
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
                <div class="col-md-12  pb-3">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Exam questions</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">

                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>TITEL</th>
                                        <th>OPTIONS</th>
                                        <th>RIGHT ANS.</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($exam->questions as $ques)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$ques->titel}}</td>

                                        <td>

                                            {{$ques->option_1}} <br>|
                                            {{$ques->option_2}} <br>|
                                            {{$ques->option_3}} <br>|
                                            {{$ques->option_4}} 

                                        </td>


                                        <td>{{$ques->right_ans}}</td>

                                     
                                        <!-- <td>
                                            <a href='{{url("dashbord/exams/edit/$exam->id")}}' class="mr-1 btn btn-sm btn-primary ">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href='{{url("dashbord/exams/show/$exam->id")}}' class="mr-1 btn btn-sm btn-success ">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href='{{url("dashbord/exams/show/$exam->id/questions")}}' class="mr-1 btn btn-sm btn-info ">
                                                <i class="fas fa-question"></i>
                                            </a>
                                            <a href='{{url("dashbord/exams/delete/$exam->id")}}' class="mr-1 btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <a href='{{url("dashbord/exams/toggle/$exam->id")}}' class="btn btn-sm btn-secondary">
                                                <i class="fas fa-toggle-on"></i>
                                            </a>

                                        </td> -->

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>





                        </div>

                        <!-- /.card-body -->
                    </div>
                    <a href="{{url()->previous()}}" class="btn btn-primary">Back</a>
                    <a href="{{url('dashbord/exams')}}" class="btn btn-primary">Back to all exams</a>

                </div>



            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection