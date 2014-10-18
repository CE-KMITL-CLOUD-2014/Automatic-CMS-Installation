@extends("layouts.main")
@section("content")
	<!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12"> 
                @if(Session::has('nf_confirm'))
                <div class='alert alert-info'>   
               {{ Session::get('nf_confirm') }}
                </div>
                @endif
                    <div class="intro-text">
                        <span class="skills">เข้าสู่ระบบ</span>
                        <hr class="star-light">
                    </div>
                    <div class="col-lg-4 col-lg-offset-4 text-center">
                    @if($errors->all())
                        <div class='alert alert-danger'>                       
                        @foreach($errors->all() as $error)
                        {{ $error }} <br/>
                        @endforeach
                        </div>  
                    @endif                         
                        {{ Form::open(array('url'=>'user/login', 'id'=>'signinForm', 'name' => 'signIn' , 'validate' => 'validate')) }}
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls" style="background-color:white;">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Username" id="username" name="username" required data-validation-required-message="Please enter your username.">
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
                            <div id="success"></div>
                            <div class="row text-center">
                                <div class="form-group col-xs-12" style="margin-top:20px;">
                                    <button type="submit" class="btn btn-info btn-lg">ตกลง</button>                                    
                                </div>
                            </div>
                        {{ Form::close() }}                      
                    </div>                    
                </div>
            </div>
        </div>
    </header>
	
	
@stop