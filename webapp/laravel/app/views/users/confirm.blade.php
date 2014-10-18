@extends("layouts.main")
@section("content")
<section id="confirm">
<div class="container" style="padding-top:50px;">
 <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2>การยืนยัน Email Address</h2>
        <p>กรุณาทำการยืนยันอีเมล์ตามที่เราส่งไปที่  
        @if(Session::has('nf_confirm_email'))                
               {{ Session::get('nf_confirm_email') }}                
                @endif
        </p>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
      </div>
</div>
</section>
	
	
@stop