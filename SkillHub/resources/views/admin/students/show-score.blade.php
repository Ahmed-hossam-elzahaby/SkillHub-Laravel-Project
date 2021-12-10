@extends('admin.layout')



@section('main')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">students  {{$student->name}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('dashbord')}}">Home</a></li>
                        <li class="breadcrumb-item active">students</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @include('web.inc.massage')

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All students  {{$student->name}}</h3>

                            <div class="card-tools">
                                <!-- <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div> -->
                               
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Exam</th>
                                        <th>scroe</th>
                                        <th>Status</th>
                                        <th>Time (mins)</th>
                                        <th>AT</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($exams as $exam)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td >{{$exam->name()}}</td>
                                        <td >{{$exam->pivot->score}}</td>
                                        <td >{{$exam->pivot->status}}</td>

                                        <td >{{$exam->pivot->time_mins}}</td>
                                        <td >{{$exam->pivot->created_at}}</td>
                                      
                                      

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                           


                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->











@endsection

@section('scripts')






@endsection