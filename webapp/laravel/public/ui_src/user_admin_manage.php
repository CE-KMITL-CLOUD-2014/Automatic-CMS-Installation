<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Admin - Night Fury</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.admin.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


	

</head>

<body>

	<div id="wrapper">

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
                <a class="navbar-brand" href="user_admin.php">User Adimin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="user_admin_profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="user_admin.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
					<li>
                        <a href="user_admin_create.php"><i class="fa fa-fw fa-plus"></i> Create Website</a>
                    </li>
					<li class="active">
                        <a href="user_admin_manage.php"><i class="fa fa-fw fa-tasks"></i> Manage Website</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

		<div id="page-wrapper">

            <div class="container-fluid">

				<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manage Website <small>Manage your all web site</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-tasks"></i> Manage Website
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

				<!-- Content -->
				<!-- Web Site 1-3 -->
				<div class="row">
					
					<!-- Web Site 1 -->
					<div class="col-sm-4">
						
						<!-- Button trigger modal -->
						<a href="#" data-toggle="modal" data-target="#webSite1">
							<div class="panel panel-default">
								<div class="panel-body">
									<table style="background-color: #f5f5f5;">
										<tr>
											<td valign="middle" style="width:100%;">
												<img src='img/user-page/w1-page.png' style="width:inherit"/>
											</td>
										</tr>
									</table>
									<h3>Web Site 1</h3>
								</div>
							</div>
						</a>

						<!-- Modal -->
						<div class="modal fade" id="webSite1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">Web Site 1 </h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-12">
												<img src='img/user-page/w1-page.png' style="width:100%"/>
											</div>
										</div>
										<div class="row" style="background-color: #f5f5f5;margin-top:15px;">
											<div class="col-sm-9">
												<div style="padding:10px;">
													<a href="#"><h2>website1.nfsite.me</h2></a>
												</div>
											</div>
											<div class="col-sm-2" style="padding-top:15px;padding-bottom:15px;background-color: #e0e0e0;text-align: center;">
													<img src='img/icon/wordpress-icon.png' style="width:100%;max-width:120px;"/>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-danger">Delete</button>
									</div>
								</div>
							</div>
						</div>

					</div><!-- /.col -->
					<!-- /.Web Site 1 -->

					<!-- Web Site 2 -->
					<div class="col-sm-4">
						
						<!-- Button trigger modal -->
						<a href="#" data-toggle="modal" data-target="#webSite2">
							<div class="panel panel-default">
								<div class="panel-body">
									<table style="background-color: #f5f5f5;">
										<tr>
											<td valign="middle" style="width:100%;">
												<img src='img/user-page/j1-page.png' style="width:inherit"/>
											</td>
										</tr>
									</table>
									<h3>Web Site 2</h3>
								</div>
							</div>
						</a>

						<!-- Modal -->
						<div class="modal fade" id="webSite2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">Web Site 2 </h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-12">
												<img src='img/user-page/j1-page.png' style="width:100%"/>
											</div>
										</div>
										<div class="row" style="background-color: #f5f5f5;margin-top:15px;">
											<div class="col-sm-9">
												<div style="padding:10px;">
													<a href="#"><h2>website2.nfsite.me</h2></a>
												</div>
											</div>
											<div class="col-sm-2" style="padding-top:15px;padding-bottom:15px;background-color: #e0e0e0;text-align: center;">
													<img src='img/icon/joomla-icon.png' style="width:100%;max-width:120px;"/>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-danger">Delete</button>
									</div>
								</div>
							</div>
						</div>

					</div><!-- /.col -->
					<!-- /.Web Site 2 -->

					<!-- Web Site 3 -->
					<div class="col-sm-4">
						
						<!-- Button trigger modal -->
						<a href="#" data-toggle="modal" data-target="#webSite3">
							<div class="panel panel-default">
								<div class="panel-body">
									<table style="background-color: #f5f5f5;">
										<tr>
											<td valign="middle" style="width:100%;">
												<img src='img/user-page/d1-page.png' style="width:inherit"/>
											</td>
										</tr>
									</table>
									<h3>Web Site 3</h3>
								</div>
							</div>
						</a>

						<!-- Modal -->
						<div class="modal fade" id="webSite3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">Web Site 3 </h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-12">
												<img src='img/user-page/d1-page.png' style="width:100%"/>
											</div>
										</div>
										<div class="row" style="background-color: #f5f5f5;margin-top:15px;">
											<div class="col-sm-9">
												<div style="padding:10px;">
													<a href="#"><h2>website3.nfsite.me</h2></a>
												</div>
											</div>
											<div class="col-sm-2" style="padding-top:15px;padding-bottom:15px;background-color: #e0e0e0;text-align: center;">
													<img src='img/icon/drupal-icon.png' style="width:100%;max-width:120px;"/>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-danger">Delete</button>
									</div>
								</div>
							</div>
						</div>

					</div><!-- /.col -->
					<!-- /.Web Site 3 -->

				</div><!-- /.row -->
				<!-- Web Site 4-6 -->
				<div class="row">
					
					<!-- Web Site 4 -->
					<div class="col-sm-4">
						
						<!-- Button trigger modal -->
						<a href="#" data-toggle="modal" data-target="#webSite4">
							<div class="panel panel-default">
								<div class="panel-body">
									<table style="background-color: #f5f5f5;">
										<tr>
											<td valign="middle" style="width:100%;">
												<img src='img/user-page/w2-page.png' style="width:inherit"/>
											</td>
										</tr>
									</table>
									<h3>Web Site 4</h3>
								</div>
							</div>
						</a>

						<!-- Modal -->
						<div class="modal fade" id="webSite4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">Web Site 4 </h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-12">
												<img src='img/user-page/w2-page.png' style="width:100%"/>
											</div>
										</div>
										<div class="row" style="background-color: #f5f5f5;margin-top:15px;">
											<div class="col-sm-9">
												<div style="padding:10px;">
													<a href="#"><h2>website4.nfsite.me</h2></a>
												</div>
											</div>
											<div class="col-sm-2" style="padding-top:15px;padding-bottom:15px;background-color: #e0e0e0;text-align: center;">
													<img src='img/icon/wordpress-icon.png' style="width:100%;max-width:120px;"/>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-danger">Delete</button>
									</div>
								</div>
							</div>
						</div>

					</div><!-- /.col -->
					<!-- /.Web Site 4 -->

					<!-- Web Site 5 -->
					<div class="col-sm-4">
						
						<!-- Button trigger modal -->
						<a href="#" data-toggle="modal" data-target="#webSite5">
							<div class="panel panel-default">
								<div class="panel-body">
									<table style="background-color: #f5f5f5;">
										<tr>
											<td valign="middle" style="width:100%;">
												<img src='img/user-page/j2-page.png' style="width:inherit"/>
											</td>
										</tr>
									</table>
									<h3>Web Site 5</h3>
								</div>
							</div>
						</a>

						<!-- Modal -->
						<div class="modal fade" id="webSite5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">Web Site 5 </h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-12">
												<img src='img/user-page/j2-page.png' style="width:100%"/>
											</div>
										</div>
										<div class="row" style="background-color: #f5f5f5;margin-top:15px;">
											<div class="col-sm-9">
												<div style="padding:10px;">
													<a href="#"><h2>website5.nfsite.me</h2></a>
												</div>
											</div>
											<div class="col-sm-2" style="padding-top:15px;padding-bottom:15px;background-color: #e0e0e0;text-align: center;">
													<img src='img/icon/joomla-icon.png' style="width:100%;max-width:120px;"/>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-danger">Delete</button>
									</div>
								</div>
							</div>
						</div>

					</div><!-- /.col -->
					<!-- /.Web Site 5 -->

					<!-- Web Site 6 -->
					<div class="col-sm-4">
						
						<!-- Button trigger modal -->
						<a href="#" data-toggle="modal" data-target="#webSite6">
							<div class="panel panel-default">
								<div class="panel-body">
									<table style="background-color: #f5f5f5;">
										<tr>
											<td valign="middle" style="width:100%;">
												<img src='img/user-page/d2-page.png' style="width:inherit"/>
											</td>
										</tr>
									</table>
									<h3>Web Site 6</h3>
								</div>
							</div>
						</a>

						<!-- Modal -->
						<div class="modal fade" id="webSite6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">Web Site 6 </h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-12">
												<img src='img/user-page/d2-page.png' style="width:100%"/>
											</div>
										</div>
										<div class="row" style="background-color: #f5f5f5;margin-top:15px;">
											<div class="col-sm-9">
												<div style="padding:10px;">
													<a href="#"><h2>website6.nfsite.me</h2></a>
												</div>
											</div>
											<div class="col-sm-2" style="padding-top:15px;padding-bottom:15px;background-color: #e0e0e0;text-align: center;">
													<img src='img/icon/drupal-icon.png' style="width:100%;max-width:120px;"/>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-danger">Delete</button>
									</div>
								</div>
							</div>
						</div>

					</div><!-- /.col -->
					<!-- /.Web Site 3 -->

				</div><!-- /.row -->

			</div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

	</div>

</body>

</html>

<script>
	var x=0;
	$(document).ready(function(){
		var temp=$('img[src^="img/user-page/"]');
		setTimeout(function(){
			$('img[src^="img/user-page/"]').each(function(){
				var i=$(this).height();
				//alert('height:'+i);
				if(i>x){
					x=i;
					temp=$(this);
				}
			});
			//alert('max-height:'+x);
			$('img[src^="img/user-page/"]').parent().not('div').animate({height:x+'px'});
		},2000);
		$(window).resize(function(){
			setTimeout(function(){
				$('img[src^="img/user-page/"]').parent().not('div').animate({height:temp.height()+"px"});
			},500);
		});
	});
	
</script>