@extends("layouts.admin.main")
@section("content")
<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					จัดการเว็บไซต์ : {{$site_data->name}}.{{$site_data->domain->name}}				
				</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				@if(Session::has('nf_success'))
				<div class='alert alert-success'>   
					{{ Session::get('nf_success') }}
				</div>
				@endif

				@if(Session::has('nf_error'))
				<div class='alert alert-danger'>   
					{{ Session::get('nf_error') }}
				</div>
				@endif
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#general" role="tab" data-toggle="tab">ข้อมูลทั่วไป</a></li>	
					<li role="presentation"><a href="#screenshot" role="tab" data-toggle="tab">Screenshot</a></li>					
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="general">
						<div class="panel-body">
							<div class="panel panel-default">
								<div class="panel-body">
									<p><b>Site Url :</b> <a href="http://{{$site_data->name}}.{{$site_data->domain->name}}/" target="_blank">{{$site_data->name}}.{{$site_data->domain->name}}</a></p>
									<p><b>CMS Type :</b> {{$site_data->cms->type}} ({{$site_data->cms->name}})</p>
									<p><b>Owner:</b> <a href="/admin/user/{{$site_data->user->uid}}">{{$site_data->user->fullname}}</a></p>
									<p><b>Create Date :</b> {{CommonController::convertTime($site_data->date_create)}} ({{CommonController::showTimeAgo($site_data->date_create)}})</p>
									<p><b>Status :</b> @if($site_data->status_active ==1)   <span class="text-success">Active</span> @else <span class="text-danger">Blocked</span> @endif</p>									
									<p></p>
									<p class="pull-right">
										<button type="button" class="btn btn-primary" onclick="window.open('http://{{$site_data->name}}.{{$site_data->domain->name}}/', '_blank');"><span class="glyphicon glyphicon-new-window"> เยี่ยมชมเว็บไซต์นี้</button> 
										@if($site_data->status_active ==1)
										<button type="button" class="btn btn-warning" onclick="block_site({{$site_data->sid}});"><span class="glyphicon glyphicon-stop"> บล็อกเว็บไซต์นี้</button> 
										@else
										<button type="button" class="btn btn-success" onclick="unblock_site({{$site_data->sid}});"><span class="glyphicon glyphicon-play"> ปลดบล็อกเว็บไซต์นี้</button> 
										@endif
										<button type="button" class="btn btn-danger" onclick="del_site({{$site_data->sid}});"><span class="glyphicon glyphicon-trash"> ลบเว็บไซต์นี้</button>
									</p>	
									<input type="hidden" id="site_url_{{$site_data->sid}}" value="{{$site_data->name}}.{{$site_data->domain->name}}" />								
								</div>
							</div>
						</div>
					</div>

					<div role="tabpanel" class="tab-pane fade" id="screenshot">
						<img src="{{$site_img}}" alt="{{$site_data->name}}.{{$site_data->domain->name}}" class="center-block" />
					</div>
				</div>
			</div> 
		</div>
	</div>
</div>
<!-- /#page-wrapper -->

@include("admin.site-footer")

@stop