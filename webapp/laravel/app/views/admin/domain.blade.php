@extends("layouts.admin.main")
@section("content")
<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					จัดการโดเมนเนม
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
					<li role="presentation" class="active"><a href="#domain_list" role="tab" data-toggle="tab">โดเมนทั้งหมด <span class="badge">{{$domain_count}}</span></a></li>	
					<li role="presentation"><a href="#domain_add" role="tab" data-toggle="tab">เพิ่มโดเมนใหม่</a></li>
					<li role="presentation"><a href="#domain_manage" role="tab" data-toggle="tab">จัดการโดเมน</a></li>					
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="domain_list">
						<table class="table table-striped" id="user_data">
							<thead>
								<tr>
									<th>No</th>
									<th>Domain Name</th>
									<th>Create Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$count = 1;
								?>
								@foreach ($domain_data as $data)
								<tr>
									<td>{{$count}}</td>
									<td>{{$data->name}}</td>
									<td>{{CommonController::convertTime($data->date_create)}}</td>
									<td>
										@if($data->status_active ==1)										
										<button type="button" class="btn btn-warning btn-xs" onclick="hide_domain({{$data->did}});"><span class="glyphicon glyphicon-eye-close"></span> Hide</button>
										@else
										<button type="button" class="btn btn-success btn-xs" onclick="show_domain({{$data->did}});"><span class="glyphicon glyphicon-eye-open"></span> Show</button>
										@endif
										<input type="hidden" id="domain_name_{{$data->did}}" value="{{$data->name}}" />
									</td>									
								</tr>
								<?php
								$count++;
								?>	
								@endforeach
							</tbody>
						</table>
					</div>

					<div role="tabpanel" class="tab-pane fade" id="domain_add">
						sd
					</div>

					<div role="tabpanel" class="tab-pane fade" id="domain_manage">
						<iframe src="http://nfsite.me/dns" width="800px" height="500px" frameborder="0" class="center-block" id="frame_dns"></iframe>
					</div>
				</div>

			</div> 
		</div>
	</div>
</div>
<!-- /#page-wrapper -->

@include("admin.domain-footer")

@stop