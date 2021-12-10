<nav id="nav">
    <form id="logout-form" action="{{url('logout')}}" method="post" style="display: none;">
        @csrf
    </form>


    <ul class="main-menu nav navbar-nav navbar-right">
        <li><a href="{{url('/')}}">@lang('web.home')</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('web.cats') <span class="caret"></span></a>
            <ul class="dropdown-menu">
                @foreach($cats as $cat)
                <li><a href='{{ url("categories/show/{$cat->id}") }}'>{{$cat->name()}}</a></li>
                @endforeach
            </ul>
        </li>
        <li><a href="{{url('contact')}}">@lang('web.contact')</a></li>
        @guest
        <li><a href="{{url('login')}}">@lang('web.sign in')</a></li>
        <li><a href="{{url('register')}}">@lang('web.sign up')</a></li>
        @endguest

        @auth
        @if(Auth::user()->role->name=='student')
        <li><a href="{{url('profile')}}">{{Auth::user()->name}}'s profile</a></li>
        @else
        <li><a href="{{url('dashbord')}}">Dashbord</a></li>

        @endif
        <li><a id="logout-link" href="#">@lang('web.signout')</a></li>
        @endauth

        @if(App::getLocale() == 'ar')
        <li><a href="{{url('lang/set/en')}}">En</a></li>
        @else
        <li><a href="{{url('lang/set/ar')}}">ع</a></li>
        @endif

    </ul>
</nav>