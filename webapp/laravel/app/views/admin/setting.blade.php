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

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#general" role="tab" data-toggle="tab">General</a></li>
					<li role="presentation"><a href="#cloud" role="tab" data-toggle="tab">Cloud Service</a></li>
					<li role="presentation"><a href="#dns_zone" role="tab" data-toggle="tab">DNS Zone</a></li>
					<li role="presentation"><a href="#dns_server" role="tab" data-toggle="tab">DNS Server</a></li>
					<li role="presentation"><a href="#screenshot" role="tab" data-toggle="tab">Screenshot API</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<!--General Setting Tab-->
					<div role="tabpanel" class="tab-pane fade in active" id="general">
						<div class="panel panel-default">							
							<div class="panel-body">
								{{ Form::open(array('url'=>'admin/setting/general', 'id'=>'settingGeneralForm', 'name' => 'settingGeneral' , 'class' => 'form-horizontal', 'role' => 'form')) }}
								<div class="form-group">
									<label for="inputSiteName" class="col-sm-2 control-label">Site Title</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputSiteName" name="setting_site_title" placeholder="ชื่อเว็บไซต์" value="{{$setting->site_title}}">
									</div>
								</div>	

								<div class="form-group">
									<label for="inputMaxSite" class="col-sm-2 control-label">Max website per user</label>
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
					<!-- end tab -->

					<!--Azure Setting Tab-->
					<div role="tabpanel" class="tab-pane fade" id="cloud">
						<div class="panel panel-default">							
							<div class="panel-body">
								{{ Form::open(array('url'=>'admin/setting/cloud', 'id'=>'settingCloudForm', 'name' => 'settingCloud' , 'class' => 'form-horizontal', 'role' => 'form')) }}
								<div class="form-group">
									<label for="inputAzurePath" class="col-sm-2 control-label">Azure Path</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputAzurePath" name="setting_azure_path" placeholder="" value="{{$setting->azure_path}}">
									</div>
								</div>

								<div class="form-group">
									<label for="inputAzureSuffix" class="col-sm-2 control-label">Azure Website URL</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputAzureSuffix" name="setting_azure_suffix" placeholder="" value="{{$setting->azure_suffix}}">
									</div>
								</div>

								<div class="form-group">
									<label for="inputAzureLocation" class="col-sm-2 control-label">Azure Website Location</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputAzureLocation" name="setting_azure_location" placeholder="" value="{{$setting->azure_location}}">
									</div>
								</div>	

								<div class="form-group">
									<label for="inputAzureFtpSuffix" class="col-sm-2 control-label">Azure FTP URL</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputAzureFtpSuffix" name="setting_azure_ftp_suffix" placeholder="" value="{{$setting->azure_ftp_suffix}}">
									</div>
								</div>

								<div class="form-group">
									<label for="inputAzureFtpUser" class="col-sm-2 control-label">Azure FTP User</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputAzureFtpUser" name="setting_azure_ftp_user" placeholder="" value="{{$setting->azure_ftp_user}}">
									</div>
								</div>	

								<div class="form-group">
									<label for="inputAzureFtpPassword" class="col-sm-2 control-label">Azure FTP Password</label>
									<div class="col-sm-4">
										<input type="password" class="form-control" id="inputAzureFtpPassword" name="setting_azure_ftp_password" placeholder="" value="{{$setting->azure_ftp_password}}">
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
					<!-- end tab -->

					<!--DNS Zone Setting Tab-->
					<div role="tabpanel" class="tab-pane fade" id="dns_zone">
						<div class="panel panel-default">							
							<div class="panel-body">
								{{ Form::open(array('url'=>'admin/setting/dns_zone', 'id'=>'settingDnsZoneForm', 'name' => 'settingDnsZone' , 'class' => 'form-horizontal', 'role' => 'form')) }}
								<div class="form-group">
									<label for="inputRefresh" class="col-sm-2 control-label">Refresh</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputRefresh" name="setting_refresh" placeholder="" value="{{$setting->refresh}}">
									</div>
								</div>	
								<div class="form-group">
									<label for="inputRetry" class="col-sm-2 control-label">Retry</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputRetry" name="setting_retry" placeholder="" value="{{$setting->retry}}">
									</div>
								</div>	
								<div class="form-group">
									<label for="inputExpire" class="col-sm-2 control-label">Expire</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputExpire" name="setting_expire" placeholder="" value="{{$setting->expire}}">
									</div>
								</div>	
								<div class="form-group">
									<label for="inputTTL" class="col-sm-2 control-label">TTL</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputTTL" name="setting_ttl" placeholder="" value="{{$setting->ttl}}">
									</div>
								</div>	
								<div class="form-group">
									<label for="inputNS1" class="col-sm-2 control-label">NS 1</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputNS1" name="setting_ns1" placeholder="" value="{{$setting->ns1}}">
									</div>
								</div>	
								<div class="form-group">
									<label for="inputNS2" class="col-sm-2 control-label">NS 2</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputNS2" name="setting_ns2" placeholder="" value="{{$setting->ns2}}">
									</div>
								</div>	
								<div class="form-group">
									<label for="inputWWW" class="col-sm-2 control-label">WWW IP Address</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputWWW" name="setting_www" placeholder="" value="{{$setting->www}}">
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
					<!-- end tab -->

					<!--DNS Server Setting Tab-->
					<div role="tabpanel" class="tab-pane fade" id="dns_server">
						<div class="panel panel-default">							
							<div class="panel-body">
								{{ Form::open(array('url'=>'admin/setting/dns_server', 'id'=>'settingDnsServerForm', 'name' => 'settingDnsServer' , 'class' => 'form-horizontal', 'role' => 'form')) }}
								<div class="form-group">
									<label for="inputUsername" class="col-sm-2 control-label">Username</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputUsername" name="setting_dns_username" placeholder="" value="{{$setting->dns_username}}">
									</div>
								</div>	

								<div class="form-group">
									<label for="inputPassword" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-4">
										<input type="password" class="form-control" id="inputPassword" name="setting_dns_password" placeholder="" value="{{$setting->dns_password}}">
									</div>
								</div>

								<div class="form-group">
									<label for="inputMainURL" class="col-sm-2 control-label">Main URL</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputMainURL" name="setting_dns_mainurl" placeholder="" value="{{$setting->dns_mainurl}}">
									</div>
								</div>

								<div class="form-group">
									<label for="inputUA" class="col-sm-2 control-label">User Agent</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputUA" name="setting_dns_ua" placeholder="" value="{{$setting->dns_ua}}">
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
					<!-- end tab -->

					<!--Screenshot API Setting Tab-->
					<div role="tabpanel" class="tab-pane fade" id="screenshot">
						<div class="panel panel-default">							
							<div class="panel-body">
								{{ Form::open(array('url'=>'admin/setting/screenshot', 'id'=>'settingScreenshotForm', 'name' => 'settingScreenshot' , 'class' => 'form-horizontal', 'role' => 'form')) }}
								<div class="form-group">
									<label for="inputAPIPUBKEY" class="col-sm-2 control-label">URLBOX APIKEY</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputAPIPUBKEY" name="setting_ss_pubkey" placeholder="" value="{{$setting->ss_pubkey}}">
									</div>
								</div>	

								<div class="form-group">
									<label for="inputAPISECKEY" class="col-sm-2 control-label">URLBOX SECRET</label>
									<div class="col-sm-4">
										<input type="password" class="form-control" id="inputAPISECKEY" name="setting_ss_seckey" placeholder="" value="{{$setting->ss_seckey}}">
									</div>
								</div>

								<div class="form-group">
									<label for="inputSsWidth" class="col-sm-2 control-label">Screenshot Width</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputSsWidth" name="setting_ss_width" placeholder="" value="{{$setting->ss_width}}">
									</div>
								</div>	

								<div class="form-group">
									<label for="inputSsHeight" class="col-sm-2 control-label">Screenshot Height</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="inputSsHeight" name="setting_ss_height" placeholder="" value="{{$setting->ss_height}}">
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
					<!-- end tab -->
				</div>				
			</div>
		</div>
		<!-- /.row -->
	</div>
</div>
<!-- /#page-wrapper -->





@stop