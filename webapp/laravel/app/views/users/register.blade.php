@extends("layouts.main")
@section("content")
<!-- Sign Up -->
<section  id="sign-up">
  <div class="container" style="padding-top:50px;">
     <div class="row">
        <div class="col-lg-12 text-center">
           <h2>สมัครสมาชิก</h2>
           <hr class="star-primary">
       </div>
   </div>
   <div class="row">
    <div class="col-lg-8 col-lg-offset-2 ">
        {{ Form::open(array('url'=>'user/register', 'id'=>'signupForm', 'name' => 'signUp' , 'validate' => 'validate')) }}                    
        @if($errors->all())
        <div class='alert alert-danger'>
            <h3>Error :</h3>
            @foreach($errors->all() as $error)
            {{ $error }} <br/>
            @endforeach
        </div>
        @endif                    		                       
        <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Full Name</label>
                <input type="text" class="form-control" placeholder="Full Name" id="fullname" name="fullname" required data-validation-required-message="Please enter your fullname.">
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <div class="row control-group">
            <div class="form-group col-xs-6 floating-label-form-group controls">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required data-validation-required-message="Please enter your password.">
                <p class="help-block text-danger"></p>
            </div>                        
            <div class="form-group col-xs-6 floating-label-form-group controls">
                <label>Password Again</label>
                <input type="password" class="form-control" placeholder="Password Again" id="password_confirmation" name="password_confirmation" required data-validation-required-message="Please enter your password again.">
                <p class="help-block text-danger"></p>
            </div>
        </div>				
        
        <div id="success"></div>
        <br/>
        <div class="row text-center">
            <div class="form-group col-xs-12">
                <button type="submit" class="btn btn-success btn-lg">ลงทะเบียน</button>
            </div>
        </div>
        {{ Form::close() }}   
    </div>
</div>
</div>
</section>


@stop