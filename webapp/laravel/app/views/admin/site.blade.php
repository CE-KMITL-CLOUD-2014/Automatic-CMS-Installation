@extends("layouts.admin.main")
@section("content")
<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					จัดการเว็บไซต์ทั้งหมด
				</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<table class="table table-striped" id="site_data">
					<thead>
						<tr>
							<th>No</th>
							<th>Site Url</th>
							<th>CMS type</th>		           
							<th>Owner</th>
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
							<td>{{$data->user->fullname}}</td>
							<td>{{CommonController::convertTime($data->date_create)}}</td>
							<td>@if($data->status_active ==1)   <span class="text-success">Active</span> @else <span class="text-danger">Banned</span> @endif</td>
							<td>
								<a href="#"><span class="glyphicon glyphicon-search" title="View Website"></span></a>
								<a href="#"><span class="glyphicon glyphicon-stop" title="Block Website"></span></a>
								<a href="#"><span class="glyphicon glyphicon-trash" title="Delete Website"></span></a>
							</td>
						</tr>
						<?php
						$count++;
						?>	
						@endforeach		        		        
					</tbody>
				</table>
			</div> </div>
		</div>
	</div>
	<!-- /#page-wrapper -->

	<script type="text/javascript">
		$(document).ready( function () {
			$('#site_data').DataTable();
		} );
	</script>



	@stop