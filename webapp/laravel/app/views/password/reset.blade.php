@extends("layouts.main")
@section("content")
	<!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">               
                    <div class="intro-text">
                        <span class="skills">Reset Password</span>                        
                        <hr class="star-light">
                    </div>
                    <div class="col-lg-4 col-lg-offset-4 text-center">  
                    @if (Session::has('error'))
                        <div class='alert alert-danger'>                       
                        {{ trans(Session::get('error')) }}
                        </div>  
                    @endif                                         
                        {{ Form::open(array('route' => array('password/reset', $token), 'id'=>'resetForm', 'name' => 'reset' , 'validate' => 'validate')) }}
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls" style="background-color:white;">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" required data-validation-required-message="Please enter your email.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls" style="background-color:white;">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" id="password" name="password" required data-validation-required-message="Please enter your password.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls" style="background-color:white;">
                                    <label>Password Again</label>
                                    <input type="password" class="form-control" placeholder="Password Again" id="password_confirmation" name="password_confirmation" required data-validation-required-message="Please enter your password again.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            {{ Form::hidden('token', $token) }}
                            <div id="success"></div>
                            <div class="row text-center">
                                <div class="form-group col-xs-12" style="margin-top:20px;">
                                    <button type="submit" class="btn btn-info btn-lg">ยืนยัน</button>                                    
                                </div>
                            </div>
                        {{ Form::close() }}                      
                    </div>                    
                </div>
            </div>
        </div>
    </header>
	
	
@stop