@extends('admin.layout')



@section('main')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add New Admin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('dashbord')}}">Home</a></li>
                        <li class="breadcrumb-item active">Add New Admin</li>
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
                            <h3 class="card-title">Add New Admin</h3>

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
                        @include('web.inc.massage')

                            <form action="{{url('dashbord/admin/store')}}" method="POST">
@csrf
                                <div class="d-flex justify-content-center">

                                    <input type="text" name="name" placeholder="Name" class="form-control w-50 mb-3">


                                </div>

                                <div class="d-flex justify-content-center">

                                    <input type="email" name="email" placeholder="Email" class="form-control w-50 mb-3">


                                </div>


                                <div class="d-flex justify-content-center">

                                    <input type="number" name="password" placeholder="password" class="form-control w-50 mb-3">


                                </div>


                                <div class="d-flex justify-content-center">

                                    <input type="number" name="password_confirmation" placeholder="confirm_password" class="form-control w-50 mb-3">


                                </div>



                                <div class="d-flex justify-content-center">

<button type="submit" class="btn btn-danger" >Add New</button>

                                </div>





                            </form>





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