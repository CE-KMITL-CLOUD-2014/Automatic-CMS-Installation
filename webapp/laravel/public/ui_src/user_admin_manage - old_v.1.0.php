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

				<!-- Web site -->
				<div class="row">

					<div class="col-md-8">

						<div class="panel-group" id="accordion">
						  
						  <!-- Web site #1 -->
						  <div class="panel panel-default">
							<div class="panel-heading">
							  <h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
								  Web site #1
								</a>
							  </h4>
							</div>
							<!-- /.panel-heading -->
							<div id="collapseOne" class="panel-collapse collapse in">
							  <div class="panel-body">
								<table class="table">
									<thead></thead>
									<tbody>
									<tr>
										<td width="120">
											<p class="text-right">Domain name : </p>
										</td>
										<td>
											<a href="#" alt="Word Press">http://website1.nf.in.th</a>	
										</td>
									</tr>
									<tr>
										<td>
											<p class="text-right">Type : </p>
										</td>
										<td>
											<img src="img/icon/w-icon-200.png" style="width:50px;" class="img-thumbnail">
											<!-- Word Press = w-icon-200.png" -->
											<!-- Joomla = j-icon-200.png" -->
											<!-- Drupal = d-icon-200.png" -->
										</td>
									</tr>
									</tbody>
								</table>
								<div class="row">
									<div class="col-sm-3 col-sm-offset-9 text-right">
										<!-- Delete button -->
										<button class="btn btn-danger" data-toggle="modal" data-target="#web-site-1-delete-modal-conferm">Delete</button>
										<!-- /.Delete button -->
									</div>
									<!-- Delete modal -->
									<div class="modal fade" id="web-site-1-delete-modal-conferm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-sm">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
													<h4 class="modal-title" id="myModalLabel">Web site #1 Delete!</h4>
												</div>
												<div class="modal-body">Are you sure to delete this site! Press Delete or Cancel.</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger">delete</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
												</div>
											</div>
										</div>
									</div>
									<!-- /.Delete modal -->
								</div>
								<!-- /.Delete button -->
							  </div>
							  <!-- /.panel-body -->
							</div>
							<!-- /.collapseOne -->
						  </div>
						  <!-- /.Web site #1 -->
							
						  <!-- Web site #2 -->
						  <div class="panel panel-default">
							<div class="panel-heading">
							  <h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
								  Web site #2
								</a>
							  </h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse">
							  <div class="panel-body">
								<table class="table">
									<thead></thead>
									<tbody>
									<tr>
										<td width="120">
											<p class="text-right">Domain name : </p>
										</td>
										<td>
											<a href="#" alt="Word Press">http://website2.nf.in.th</a>	
										</td>
									</tr>
									<tr>
										<td>
											<p class="text-right">Type : </p>
										</td>
										<td>
											<img src="img/icon/j-icon-200.png" style="width:50px;" class="img-thumbnail">
											<!-- Word Press = w-icon-200.png" -->
											<!-- Joomla = j-icon-200.png" -->
											<!-- Drupal = d-icon-200.png" -->
										</td>
									</tr>
									</tbody>
								</table>
								<div class="row">
									<div class="col-sm-3 col-sm-offset-9 text-right">
										<!-- Delete button -->
										<button class="btn btn-danger" data-toggle="modal" data-target="#web-site-2-delete-modal-conferm">Delete</button>
										<!-- /.Delete button -->
									</div>
									<!-- Delete modal -->
									<div class="modal fade" id="web-site-2-delete-modal-conferm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-sm">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
													<h4 class="modal-title" id="myModalLabel">Web site #2 Delete!</h4>
												</div>
												<div class="modal-body">Are you sure to delete this site! Press Delete or Cancel.</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger">delete</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
												</div>
											</div>
										</div>
									</div>
									<!-- /.Delete modal -->
								</div>
								<!-- /.Delete button -->
							  </div>
							</div>
						  </div>
						  <!-- /.Web site #2 -->

						  <!-- Web site #3 -->
						  <div class="panel panel-default">
							<div class="panel-heading">
							  <h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
								  Web site #3
								</a>
							  </h4>
							</div>
							<div id="collapseThree" class="panel-collapse collapse">
							  <div class="panel-body">
								<table class="table">
									<thead></thead>
									<tbody>
									<tr>
										<td width="120">
											<p class="text-right">Domain name : </p>
										</td>
										<td>
											<a href="#" alt="Word Press">http://website3.nf.in.th</a>	
										</td>
									</tr>
									<tr>
										<td>
											<p class="text-right">Type : </p>
										</td>
										<td>
											<img src="img/icon/d-icon-200.png" style="width:50px;" class="img-thumbnail">
											<!-- Word Press = w-icon-200.png" -->
											<!-- Joomla = j-icon-200.png" -->
											<!-- Drupal = d-icon-200.png" -->
										</td>
									</tr>
									</tbody>
								</table>
								<div class="row">
									<div class="col-sm-3 col-sm-offset-9 text-right">
										<!-- Delete button -->
										<button class="btn btn-danger" data-toggle="modal" data-target="#web-site-3-delete-modal-conferm">Delete</button>
										<!-- /.Delete button -->
									</div>
									<!-- Delete modal -->
									<div class="modal fade" id="web-site-3-delete-modal-conferm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-sm">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
													<h4 class="modal-title" id="myModalLabel">Web site #3 Delete!</h4>
												</div>
												<div class="modal-body">Are you sure to delete this site! Press Delete or Cancel.</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger">delete</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
												</div>
											</div>
										</div>
									</div>
									<!-- /.Delete modal -->
								</div>
								<!-- /.Delete button -->
							  </div>
							</div>
						  </div>
						  <!-- /.Web site #3 -->

						</div>
						<!-- /.panal-group -->
					
					</div>
					<!-- /.col -->
					
				</div>
				<!-- /.row -->

			</div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

	</div>

</body>

</html>