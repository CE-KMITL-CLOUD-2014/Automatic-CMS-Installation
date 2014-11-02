@extends("layouts.admin.main")
@section("content")
<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					จัดการผู้ใช้ทั้งหมด 
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
				<table class="table table-striped" id="user_data">
					<thead>
						<tr>
							<th>No</th>
							<th>Full Name</th>
							<th>Email</th>
							<th>Register Date</th>
							<th>Email Confirm</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$count = 1;
						?>
						@foreach ($user_data as $data)
						<tr>
							<td>{{$count}}</td>
							<td>{{$data->fullname}}</td>
							<td>{{$data->email}}</td>
							<td>{{CommonController::convertTime($data->date_register)}}</td>
							<td>@if($data->status_confirm ==1)   <span class="text-success">Yes</span> @else <span class="text-danger">No</span> @endif</td>
							<td>@if($data->status_active ==1)   <span class="text-success">Active</span> @else <span class="text-danger">Banned</span> @endif</td>
							<td>
								<a href="/admin/user/{{$data->uid}}"><span class="glyphicon glyphicon-search" title="View User"></span></a>
								@if($data->status_active ==1)
								<a href="#ban_{{$data->uid}}" onclick="ban_user({{$data->uid}});"><span class="glyphicon glyphicon-stop" title="Ban User"></span></a>
								@else
								<a href="#unban_{{$data->uid}}" onclick="unban_user({{$data->uid}});"><span class="glyphicon glyphicon-play" title="Unban User"></span></a>
								@endif
								<a href="#del_{{$data->uid}}"><span class="glyphicon glyphicon-trash" title="Delete User"></span></a>

								<input type="hidden" id="user_name_{{$data->uid}}" value="{{$data->fullname}}" />
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
<!-- /#page-wrapper -->

<script type="text/javascript">
	$(document).ready( function () {
		$('#user_data').DataTable();
	} );
</script>

@include("admin.user-footer")

@stop