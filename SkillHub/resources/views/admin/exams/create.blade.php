@extends('admin.layout')



@section('main')

@include('web.inc.massage')

<div class="d-flex justify-content-center">
    <h2>Add new</h2>
</div>

<form action="{{url('dashbord/exams/store')}}" method="POST"  enctype="multipart/form-data"> 
@csrf
    <div class="d-flex justify-content-center">

        <input placeholder="name_en" type="text" class="form-control w-50 mb-2 " name="name_en">
    </div>


    <div class="d-flex justify-content-center">
        <input placeholder="name_ar" type="text" class="form-control w-50 mb-2" name="name_ar">
    </div>


    <div class="d-flex justify-content-center">

        <textarea placeholder="desc_en" name="desc_en" class="form-control w-50 mb-2" cols="60" rows="2"></textarea>
    </div>




    <div class="d-flex justify-content-center">

        <textarea placeholder="desc_ar" name="desc_ar" class="form-control w-50 mb-2" cols="60" rows="2"></textarea>
    </div>



    <div class="d-flex justify-content-center">
        <span class="mt-1 mr-3">skill</span>

        <select class="mb-2 form-control w-50" name="skill_id">

            @foreach($skills as $skill)
            <option value="{{$skill->id}}" class="form-control">{{$skill->name()}}</option>
            @endforeach
        </select>

    </div>

    <div class="d-flex justify-content-center">


        <input type="file" name="img" class="form-control mb-2 w-25">

    </div>



    <div class="d-flex justify-content-center">

        <input placeholder="question_no" type="number" name="question_no" class="form-control w-50 mb-2">
    </div>

    <div class="d-flex justify-content-center">



        <input placeholder="difficulty" type="number" name="difficulty" class="form-control w-50 mb-2">

    </div>


    <div class="d-flex justify-content-center">


        <input placeholder="duration_mins" type="number" name="duration_mins" class="form-control w-50">

    </div>


    <div class="d-flex justify-content-center">


<button type="submit"  class="btn btn-success mt-3 mb-2">Add </button>
    </div>















</form>




















@endsection