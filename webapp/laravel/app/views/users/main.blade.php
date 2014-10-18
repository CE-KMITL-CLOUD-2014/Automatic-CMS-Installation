@extends("layouts.main")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Main</h1>
            <hr>
            @foreach($user as $value)
            <h5> ID :: {{ $value->uid }} </h5>
            <h5> Username :: {{ $value->username }} </h5>
            <h5> EMAIL :: {{ $value->email }} </h5>
            @endforeach
             <hr>
        </div>
    </div>
</div>
	
	
@stop