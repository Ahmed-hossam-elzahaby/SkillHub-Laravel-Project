@extends('layout')

@section('styles')

<link href='{{asset("web/css/TimeCircles.css")}}' rel="stylesheet">

@endsection

@section('main')

<!-- Hero-area -->
<div class="hero-area section">

  <!-- Backgound Image -->
  <div class="bg-image bg-parallax overlay" style="background-image:url({{asset('web/img/blog-post-background.jpg')}})"></div>
  <!-- /Backgound Image -->

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 text-center">
        <ul class="hero-area-tree">
          <li><a href="index.html">Home</a></li>
          <li><a href="category.html">{{$exam->skill->cat->name()}}</a></li>
          <li><a href="category.html">{{$exam->skill->name()}}</a></li>
          <li>{{$exam->name()}}</li>
        </ul>
        <h1 class="white-text">{{$exam->name()}}</h1>
        <ul class="blog-post-meta">
          <li>>{{Carbon\Carbon::parse($exam->created_at)->format('d M, Y')}}</li>
          <li class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> {{$exam->users->count()}}</a></li>
        </ul>
      </div>
    </div>
  </div>

</div>
<!-- /Hero-area -->

<!-- Blog -->
<div id="blog" class="section">

  <!-- container -->
  <div class="container">

    <!-- row -->
    <div class="row">

      <!-- main blog -->
      <div id="main" class="col-md-9">
        <form id="ques-form" action='{{url("exams/submit/{$exam->id}")}}' method="POST">
          @csrf
        </form>
        <!-- blog post -->
        <div class="blog-post mb-5">
          <p>
            @foreach($exam->questions as $index=>$ques)
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">{{$index + 1}}- {{$ques->titel}}?</h3>
            </div>
            <div class="panel-body">
              <div class="radio">
                <label>
                  <input type="radio" name="answers[{{$ques->id}}]" value="1" form="ques-form">
                  {{$ques->option_1}}
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="answers[{{$ques->id}}]" value="2" form="ques-form">
                  {{$ques->option_2}}
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="answers[{{$ques->id}}]" value="3" form="ques-form">
                  {{$ques->option_3}}
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="answers[{{$ques->id}}]" value="4" form="ques-form">
                  {{$ques->option_4}}
                </label>
              </div>
            </div>
          </div>
          @endforeach

          </p>
        </div>
        <!-- /blog post -->

        <div>
          <button form="ques-form" type="submit" class="main-button icon-button pull-left">Submit</button>
          <button class="main-button icon-button btn-danger pull-left ml-sm">Cancel</button>
        </div>
      </div>
      <!-- /main blog -->

      <!-- aside blog -->
      <div id="aside" class="col-md-3">

        <!-- exam details widget -->
        <ul class="list-group">
          <li class="list-group-item">Skill: {{$exam->skill->name()}}</li>
          <li class="list-group-item">Questions: {{$exam->question_no}}</li>
          <li class="list-group-item">Duration: {{$exam->duration_mins}}</li>
          <li class="list-group-item">Difficulty:

            @for($i=1;$i<=$exam->difficulty;$i++)
              <i class="fa fa-star"></i>
              @endfor
              @for($i=1;$i<= 5 - $exam->difficulty;$i++)
                <i class="fa fa-star-o"></i>
                @endfor
                <!-- <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i> -->
          </li>
        </ul>
        <!-- /exam details widget -->

        <div class="duration-countdown" data-timer="{{$exam->duration_mins * 60}}"></div>


      </div>
      <!-- /aside blog -->

    </div>
    <!-- row -->

  </div>
  <!-- container -->

</div>
<!-- /Blog -->
@endsection

@section('scripts')
<script type="text/javascript" src='{{asset("web/js/TimeCircles.js")}}'></script>
<script>
  $(".duration-countdown").TimeCircles({

    time: {

      Days: {

        show: false,
      }
    },
    count_past_zero: false,
  }).addListener(function(unit, value, total) {
    if (total <= 0) {

      $('#ques-form').submit();
    }
  });
</script>
@endsection