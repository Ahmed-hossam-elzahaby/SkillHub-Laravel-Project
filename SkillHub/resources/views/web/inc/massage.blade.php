@if(session('sucess'))
<div class="alert alert-success">
    {{session('sucess')}}
</div>

@endif
@if(session('msg'))
<div class="alert alert-danger">
    {{session('msg')}}
</div>

@endif



@if($errors->any())

<div class="alert alert-danger">
@foreach($errors->all() as $error)
<p>{{$error}}</p>

@endforeach
</div>

@endif

