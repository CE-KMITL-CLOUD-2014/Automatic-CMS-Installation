@section("header")
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="/dashboard">NFSITE.ME Management</a>
	</div>
	<!-- Top Menu Items -->
	<ul class="nav navbar-nav navbar-right">
		<li>
			<a href="/">หน้าแรก</a>
		</li>                    
		<li class="page-scroll">
			<a href="/#about">เกี่ยวกับเรา</a>
		</li> 
		@if(Auth::check())       
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->fullname}}<b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li>
					<a href="/user/profile"><i class="fa fa-fw fa-user"></i> ข้อมูลส่วนตัว</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="/user/logout"><i class="fa fa-fw fa-power-off"></i> ออกจากระบบ</a>
				</li>
			</ul>
		</li>
		@endif
	</ul>


	@include("layouts.admin.sidebar")        
	<!-- /.navbar-collapse -->
</nav>
@show