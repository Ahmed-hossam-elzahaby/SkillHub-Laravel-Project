@extends('admin.layout')
@section('main')
<div class="d-flex justify-content-center">
    <h2>Add step(2)</h2>
</div>

@include('web.inc.massage')


<div class="container">

    <div class="row">

<div class="col-md-10">


        <form class="offset-2" action='{{url("dashbord/exams/store-questions/{$exam_id}")}}' method="POST">
            @csrf



            @for ($i=1; $i<=$question_no; $i++) <h5>question {{$i}}</h5>

                <div class="d-felx justify-content-center">

                    <input type="text" placeholder="titel" class="w-50 form-control mb-2" name="titels[]">


                </div>


                <div class="d-felx justify-content-center">

                    <input type="number" placeholder="right_ans" class="w-50 form-control mb-2" name="right_anss[]">


                </div>


                <div class="d-felx justify-content-center">

                    <input type="text" placeholder="option_1" class="w-50 form-control mb-2" name="option_1s[]">

                </div>

                <div class="d-felx justify-content-center">

                    <input type="text" placeholder="option_2" class="w-50 form-control mb-2" name="option_2s[]">

                </div>
                <div class="d-felx justify-content-center">

                    <input type="text" placeholder="option_3" class="w-50 form-control mb-2" name="option_3s[]">

                </div>
                <div class="d-felx justify-content-center">

                    <input type="text" placeholder="option_4" class="w-50 form-control mb-2" name="option_4s[]">

                </div>



                @endfor


                <div class="d-flex justify-content-center">


                    <button type="submit" class="btn btn-success mt-3 mb-2">Add </button>
                </div>
        </form>
        </div>
    </div>
</div>

@endsection