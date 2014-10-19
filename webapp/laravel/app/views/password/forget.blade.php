@extends("layouts.main")
@section("content")
<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">                         
                <div class="intro-text">
                    <span class="skills">ลืมรหัสผ่าน</span>
                    <hr class="star-light">
                </div>
                <div class="col-lg-4 col-lg-offset-4 text-center">  
                    @if (Session::has('error'))
                    <div class='alert alert-danger'>                       
                        {{ trans(Session::get('error')) }}
                    </div>                      
                    @endif    
                    @if (Session::has('sent'))      
                    <div class='alert alert-info'>                       
                        {{ trans(Session::get('sent')) }}
                    </div>    
                    @else                               
                    {{ Form::open(array('url'=>'password/forget', 'id'=>'forgetForm', 'name' => 'forget' , 'validate' => 'validate')) }}
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls" style="background-color:white;">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" required data-validation-required-message="Please enter your email.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>                            
                    <div id="success"></div>
                    <div class="row text-center">
                        <div class="form-group col-xs-12" style="margin-top:20px;">
                            <button type="submit" class="btn btn-info btn-lg">Submit</button>                                    
                        </div>
                    </div>
                    {{ Form::close() }}  
                    @endif                        
                </div>                    
            </div>
        </div>
    </div>
</header>


@stop