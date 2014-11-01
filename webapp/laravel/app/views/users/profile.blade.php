@extends("layouts.admin.main")
@section("content")
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    รายละเอียดบัญชีผู้ใช้
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Personal Profile -->
        @if(Auth::check())     
        <div class="row" id="personalProfile">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> {{Auth::user()->fullname}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <p><b>Email :</b> {{Auth::user()->email}}</p>
                            <p><b>Register Date :</b> {{CommonController::convertTime(Auth::user()->date_register)}} ({{CommonController::showTimeAgo(Auth::user()->date_register)}})</p>
                            <p><b>Status :</b> @if(Auth::user()->status_active ==1)   <span class="text-success">Active</span> @else <span class="text-danger">Banned</span> @endif</p>
                            <p><b>Role :</b> @if(Auth::user()->role ==1)   Admin @else User @endif</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- /.row -->    

    <!-- Change Password -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="glyphicon glyphicon-lock"></i> Change Password</h3>
                </div>
                <div class="panel-body">
                    @if($errors->all())
                    <div class='alert alert-danger'>                       
                        @foreach($errors->all() as $error)
                        {{ $error }} <br/>
                        @endforeach
                    </div>  
                    @endif     
                    @if(Session::has('nf_changpw'))
                    <div class='alert alert-success'>   
                     {{ Session::get('nf_changpw') }}
                 </div>
                 @endif
                 {{ Form::open(array('url'=>'password/change', 'id'=>'changepwForm', 'name' => 'changePw' , 'class' => 'form-horizontal', 'role' => 'form')) }}
                 <div class="form-group">
                    <label for="inputOldPassword" class="col-sm-2 control-label">Old Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="inputOldPassword" name="password_old" placeholder="Old Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNewPassword" class="col-sm-2 control-label">New Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="inputNewPassword" name="password" placeholder="New Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNewPasswordagain" class="col-sm-2 control-label">Password Again</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="inputNewPasswordagain" name="password_confirmation" placeholder="New Password Again">
                    </div>
                </div>                        
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Change</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                </div>
                {{ Form::close() }}    
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

@stop