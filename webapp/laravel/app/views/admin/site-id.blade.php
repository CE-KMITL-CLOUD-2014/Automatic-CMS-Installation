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
									<p class="pull-right"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-stop"> บล็อกเว็บไซต์นี้</button> <button type="button" class="btn btn-danger" onclick="del_site();"><span class="glyphicon glyphicon-trash"> ลบเว็บไซต์นี้</button></p>									
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

<!-- Modal on delete website-->
<div class="modal fade" id="modalConfirmDeleteSite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">การยืนยันการลบเว็บไซต์</h4>
			</div>
			<div class="modal-body" id="modalDelText">
				<p class="modalCheckAvailable_msg alert alert-warning" id="show_del_status">กรุณายืนยันการลบเว็บไซต์ : <span id="show_del_site">{{$site_data->name}}.{{$site_data->domain->name}}</span></p>
			</div>
			<div class="modal-body" id="modalDelLoading" style="display:none;">
				<p>กรุณารอสักครู่...</p>
				<div class="progress">
					<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">  
					</div>
				</div>
			</div>
			<div class="modal-footer" id="modalDelFooter">
				<input type="hidden" id="confirm_del_input" value="{{$site_data->sid}}" />
				<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
				<button type="button" class="btn btn-primary" id="confirm_del_btn">ยืนยัน</button>
			</div>
		</div>
	</div>
</div>

<!-- NF Site Installer-->
<script src="/js/nf_admin.js"></script>

@stop