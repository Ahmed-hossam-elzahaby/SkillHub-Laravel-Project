@extends('layout')

@section('titel')
Homepage
@endsection



@section('main')





<!-- Home -->
<div id="home" class="hero-area">

<!-- Backgound Image -->
<div class="bg-image bg-parallax overlay" style="background-image:url({{asset('web/img/home-background.jpg')}})"></div>
<!-- /Backgound Image -->

<div class="home-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="white-text">@lang('web.SkillsHub Free Online')</h1>
                <p class="lead white-text">@lang('web.Libris vivendo')</p>
                <a class="main-button icon-button" href="#">@lang('web.Get Started!')</a>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /Home -->

<!-- Courses -->
<div id="courses" class="section">

<!-- container -->
<div class="container">

    <!-- row -->
    <div class="row">
        <div class="section-header text-center">
            <h2>@lang('web.Popular Exams')</h2>
            <p class="lead">@lang('web.Libris vivendo eloquentiam ex ius')</p>
        </div>
    </div>
    <!-- /row -->

    <!-- courses -->
    <div id="courses-wrapper">

        <!-- row -->
        <div class="row">

            <!-- single course -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="course">
                    <a href="#" class="course-img">
                        <img src="{{asset('uplods/exams/exam1.jpg')}}" alt="">
                        <i class="course-link-icon fa fa-link"></i>
                    </a>
                    <a class="course-title" href="#">@lang('web.Beginner to Pro')</a>
                    <div class="course-details">
                        <span class="course-category">@lang('web.Design')</span>
                    </div>
                </div>
            </div>
            <!-- /single course -->

            <!-- single course -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="course">
                    <a href="#" class="course-img">
                        <img src="{{asset('uplods/exams/exam2.jpg')}}" alt="">
                        <i class="course-link-icon fa fa-link"></i>
                    </a>
                    <a class="course-title" href="#">@lang('web.Introduction to CSS') </a>
                    <div class="course-details">
                        <span class="course-category">@lang('web.programming')</span>
                    </div>
                </div>
            </div>
            <!-- /single course -->

            <!-- single course -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="course">
                    <a href="#" class="course-img">
                        <img src="{{asset('uplods/exams/exam3.jpg')}}" alt="">
                        <i class="course-link-icon fa fa-link"></i>
                    </a>
                    <a class="course-title" href="#">@lang('web.The Ultimate Drawing')</a>
                    <div class="course-details">
                        <span class="course-category">@lang('web.Drawing')</span>
                    </div>
                </div>
            </div>
            <!-- /single course -->

            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="course">
                    <a href="#" class="course-img">
                        <img src="{{asset('uplods/exams/exam4.jpg')}}" alt="">
                        <i class="course-link-icon fa fa-link"></i>
                    </a>
                    <a class="course-title" href="#">@lang('web.The Complete Web Development Course')</a>
                    <div class="course-details">
                        <span class="course-category">@lang('web.Web Development')</span>
                    </div>
                </div>
            </div>
            <!-- /single course -->

        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">

            <!-- single course -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="course">
                    <a href="#" class="course-img">
                        <img src="{{asset('uplods/exams/exam5.jpg')}}" alt="">
                        <i class="course-link-icon fa fa-link"></i>
                    </a>
                    <a class="course-title" href="#">@lang('web.PHP Tips,')</a>
                    <div class="course-details">
                        <span class="course-category">@lang('web.Web Development')</span>
                    </div>
                </div>
            </div>
            <!-- /single course -->

            <!-- single course -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="course">
                    <a href="#" class="course-img">
                        <img src="{{asset('uplods/exams/exam6.jpg')}}" alt="">
                        <i class="course-link-icon fa fa-link"></i>
                    </a>
                    <a class="course-title" href="#">@lang('web.All You Need To Know About Programming')</a>
                    <div class="course-details">
                        <span class="course-category">@lang('web.programming')</span>
                    </div>
                </div>
            </div>
            <!-- /single course -->

            <!-- single course -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="course">
                    <a href="#" class="course-img">
                        <img src="{{asset('uplods/exams/exam7.jpg')}}" alt="">
                        <i class="course-link-icon fa fa-link"></i>
                    </a>
                    <a class="course-title" href="#">@lang('web.How to Get Started in Photography')</a>
                    <div class="course-details">
                        <span class="course-category">@lang('web.Photography')</span>
                    </div>
                </div>
            </div>
            <!-- /single course -->


            <!-- single course -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="course">
                    <a href="#" class="course-img">
                        <img src="{{asset('uplods/exams/exam8.jpg')}}" alt="">
                        <i class="course-link-icon fa fa-link"></i>
                    </a>
                    <a class="course-title" href="#">@lang('web.Typography From A to Z')</a>
                    <div class="course-details">
                        <span class="course-category">@lang('web.Typography')</span>
                    </div>
                </div>
            </div>
            <!-- /single course -->

        </div>
        <!-- /row -->

    </div>
    <!-- /courses -->

    <div class="row">
        <div class="center-btn">
            <a class="main-button icon-button" href="#">@lang('web.More Courses')</a>
        </div>
    </div>

</div>
<!-- container -->

</div>
<!-- /Courses -->



<!-- Contact CTA -->
<div id="contact-cta" class="section">

<!-- Backgound Image -->
<div class="bg-image bg-parallax overlay" style="background-image:url({{asset('web/img/cta.jpg')}})"></div>
<!-- Backgound Image -->

<!-- container -->
<div class="container">

    <!-- row -->
    <div class="row">

        <div class="col-md-8 col-md-offset-2 text-center">
            <h2 class="white-text">@lang('web.Contact Us')</h2>
            <p class="lead white-text">@lang('web.Libris vivendo eloquentiam ex ius, nec id splendide abhorreant.')</p>
            <a class="main-button icon-button" href="contact.html">@lang('web.Contact Us Now')</a>
        </div>

    </div>
    <!-- /row -->

</div>
<!-- /container -->

</div>
<!-- /Contact CTA -->




@endsection
		