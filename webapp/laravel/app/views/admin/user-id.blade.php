@extends("layouts.admin.main")
@section("content")
<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					จัดการผู้ใช้ : {{$user_data->fullname}}					
				</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#general" role="tab" data-toggle="tab">ข้อมูลทั่วไป</a></li>
					<li role="presentation"><a href="#site" role="tab" data-toggle="tab">เว็บไซต์</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="general">
						<div class="panel-body">
							<div class="panel panel-default">
								<div class="panel-body">
									<p><b>Fullname :</b> {{$user_data->fullname}}</p>
									<p><b>Email :</b> {{$user_data->email}}</p>
									<p><b>Register Date :</b> {{CommonController::convertTime($user_data->date_register)}} ({{CommonController::showTimeAgo($user_data->date_register)}})</p>
									<p><b>Status :</b> @if($user_data->status_active ==1)   <span class="text-success">Active</span> @else <span class="text-danger">Banned</span> @endif</p>
									<p><b>Role :</b> @if($user_data->role ==1)   Admin @else User @endif</p>
									<p></p>
									<p class="pull-right"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-stop"> แบนผู้ใช้นี้</button> <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> ลบผู้ใช้นี้</button></p>									
								</div>
							</div>
						</div>
					</div>

					<div role="tabpanel" class="tab-pane fade" id="site">
						<table class="table table-striped" id="site_data">
							<thead>
								<tr>
									<th>No</th>
									<th>Site Url</th>
									<th>CMS type</th>		           
									<th>Date Create</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$count = 1;
								?>
								@foreach ($site_data as $data)
								<tr>
									<td>{{$count}}</td>
									<td>{{$data->name}}.{{$data->domain->name}}</td>
									<td>{{$data->cms->type}}</td>		           
									<td>{{CommonController::convertTime($data->date_create)}}</td>
									<td>@if($data->status_active ==1)   <span class="text-success">Active</span> @else <span class="text-danger">Blocked</span> @endif</td>
									<td>
										<a href="/admin/site/{{$data->sid}}"><span class="glyphicon glyphicon-search" title="View Website"></span></a>
										@if($data->status_active ==1)
										<a href="#block_{{$data->sid}}" onclick="block_site({{$data->sid}});"><span class="glyphicon glyphicon-stop" title="Block Website"></span></a>
										@else
										<a href="#unblock_{{$data->sid}}" onclick="unblock_site({{$data->sid}});"><span class="glyphicon glyphicon-play" title="Unblock Website"></span></a>
										@endif
										<a href="#del_{{$data->sid}}" onclick="del_site({{$data->sid}});"><span class="glyphicon glyphicon-trash" title="Delete Website"></span></a>

										<input type="hidden" id="site_url_{{$data->sid}}" value="{{$data->name}}.{{$data->domain->name}}" />
									</td>
								</tr>
								<?php
								$count++;
								?>	
								@endforeach		        		        
							</tbody>
						</table>
					</div>
				</div>
			</div> 
		</div>
	</div>
</div>
<!-- /#page-wrapper -->

@include("admin.site-footer")

@stop