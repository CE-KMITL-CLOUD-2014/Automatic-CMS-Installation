@extends("layouts.admin.main")
@section("content")
<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					ตั้งค่าระบบ
				</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					<h3 class="panel-title"><i class="glyphicon glyphicon-cog"></i> ทั่วไป</h3>
					</div>
					<div class="panel-body">
						@if($errors->all())
						<div class='alert alert-danger'>                       
							@foreach($errors->all() as $error)
							{{ $error }} <br/>
							@endforeach
						</div>  
						@endif     
						@if(Session::has('nf_setting'))
						<div class='alert alert-success'>   
							{{ Session::get('nf_setting') }}
						</div>
						@endif
						{{ Form::open(array('url'=>'admin/setting', 'id'=>'settingForm', 'name' => 'setting' , 'class' => 'form-horizontal', 'role' => 'form')) }}
						<div class="form-group">
							<label for="inputMaxSite" class="col-sm-2 control-label">จำนวนเว็บไซต์ต่อผู้ใช้</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="inputMaxSite" name="setting_max_site" placeholder="จำนวนเว็บไซต์" value="{{$setting->max_site}}">
							</div>
						</div>						                      
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">ตกลง</button>
								<button type="reset" class="btn btn-default">ล้าง</button>
							</div>
						</div>
						{{ Form::close() }}    
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
</div>
<!-- /#page-wrapper -->





@stop