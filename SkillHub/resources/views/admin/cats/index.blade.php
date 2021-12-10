@extends('admin.layout')



@section('main')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('dashbord')}}">Home</a></li>
                        <li class="breadcrumb-item active">Categorise</li>
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
                            <h3 class="card-title">All categorise</h3>

                            <div class="card-tools">
                                <!-- <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div> -->
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-model">
                                    Create

                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name (En)</th>
                                        <th>Name (Ar)</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cats as $cat)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td >{{$cat->name('en')}}</td>
                                        <td >{{$cat->name('ar')}}</td>
                                        <td>
                                            @if($cat->active)
                                            <span class="badge bg-success">yes</span>
                                            @else
                                            <span class="badge bg-danger">no</span>

                                            @endif
                                        </td>
                                        <td>
                                            <button type="button"  data-toggle="modal" data-target="#edite-model" data-id="{{$cat->id}}"  data-name-en="{{$cat->name('en')}}" data-name-ar="{{$cat->name('ar')}}" class="mr-1 btn btn-sm btn-info edite-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a href='{{url("cats/store/delete/$cat->id")}}' class="mr-1 btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <a href='{{url("cats/toggle/$cat->id")}}' class="btn btn-sm btn-secondary">
                                                <i class="fas fa-toggle-on"></i>
                                            </a>

                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="mt-3 d-flex justify-content-center">
                                {{$cats->links()}}
                            </div>


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




<div class="modal fade" id="add-model" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add new</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-cat" method="POST" action="{{url('cats/store')}}">
                    @csrf
                    <div class="mb-2 d-flex justify-content-center">
                        <input type="text" class="w-50 form-control" name="name_en" placeholder="Name(en)">
                    </div>
                    <div class="d-flex justify-content-center">

                        <input type="text" class="w-50 form-control" name="name_ar" placeholder="Name(ar)">
                    </div>



                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button form="add-cat" type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<div class="modal fade" id="edite-model" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-cat" method="POST" action="{{url('cats/update')}}">
                    @csrf
                    <input type="hidden" name="id" id="edit-cat-id">
                    <div class="mb-2 d-flex justify-content-center">
                        <input type="text" class="w-50 form-control" id="edit-cat-name-en" name="name_en" placeholder="a7aaaaaaaaaaa(en)">
                    </div>
                    <div class="d-flex justify-content-center">

                        <input type="text" class="w-50 form-control" id="edit-cat-name-ar" name="name_ar" placeholder="Name(ar)">
                    </div>



                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button form="edit-cat" type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection

@section('scripts')

<script>

$('.edite-btn').click(function(){

let id =$(this).attr('data-id')
let nameEn =$(this).attr('data-name-en')
let nameAr =$(this).attr('data-name-ar')

$('#edit-cat-id').val(id)
$('#edit-cat-name-en').val(nameEn)
$('#edit-cat-name-ar').val(nameAr)

});



</script>


@endsection