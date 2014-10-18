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
    <link href="css/bootstrap.min.css" rel="stylesheet">

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

    <!-- Morris Charts JavaScript 
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	-->

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
                <a class="navbar-brand" href="index.html">User Adimin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
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
					<li>
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
                            Profile <small>Your profile detail</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i> Profile
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				<!-- Personal Profile -->
				 <div class="row" id="personalProfile">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
								<h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> Personal profile</h3>
                            </div>
                            <div class="panel-body">
								<div class="panel panel-default">
								  <div class="panel-body">
										<p>Gender :</p>
										<p>Name-Lastname :</p>
										<p>Date of birth :</p>
								  </div>
								</div>
								<button type="button" class="btn btn-default" onclick="ppEdit()">Edit</button>
								<!-- function show/hide Personal Profile Edit form -->
								<script>
									function ppEdit(){
										$('#personalProfileEdit').css('display','block');
										$('#personalProfile').css('display','none');
									}
								</script>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
				
				<!-- Personal Profile Edit form -->
				<div class="row" id="personalProfileEdit" style="display:none">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> Personal profile</h3>
                            </div>
                            <div class="panel-body">
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label for="gender" class="col-sm-2 control-label">Gender</label>
										<div class="col-sm-10">
											<label class="radio-inline">
												<input type="radio" name="gender" id="gender-male" value="male"> male
											</label>
											<label class="radio-inline">
												<input type="radio" name="gender" id="gender-female" value="female"> female
											</label>
										</div>
									</div>
									<div class="form-group">
										<label for="inputName" class="col-sm-2 control-label">Name</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="inputName" placeholder="Name">
										</div>
										<label for="inputLastname" class="col-sm-1 control-label">Lastname</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="inputLastname" placeholder="Lastname">
										</div>
									</div>
									<div class="form-group">
										<label for="inputBirthday" class="col-sm-2 control-label">Date of birth</label>
										<div class="col-sm-4">
											<input type="date" class="form-control" id="inputBirthday">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" class="btn btn-default">Submit</button>
										</div>
									</div>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
				
				<!-- Contact Details -->
				<div class="row" id="contactDetails">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-phone"></i> Contact Details</h3>
                            </div>
                            <div class="panel-body">
								<div class="panel panel-default">
									<div class="panel-body">
										<p>Phone :</p>
										<p>E-mail :</p>
										<p>Address : </p>
									</div>
								</div>
								<button type="button" class="btn btn-default" onclick="cdEdit()">Edit</button>
								<!-- function show/hide Contact Details Edit form -->
								<script>
									function cdEdit(){
										$('#contactDetailsEdit').css('display','block');
										$('#contactDetails').css('display','none');
									}
								</script>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
				
				<!-- Contact Details Edit form -->
				<div class="row" id="contactDetailsEdit" style="display:none">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-phone"></i> Contact Details</h3>
                            </div>
                            <div class="panel-body">
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label for="inputPhone" class="col-sm-2 control-label">Phone</label>
										<div class="col-sm-4">
											<input type="number" class="form-control" id="inputPhone" placeholder="Phone">
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
										<div class="col-sm-4">
											<input type="email" class="form-control" id="inputEmail" placeholder="E-mail">
										</div>
									</div>
									<div class="form-group">
										<label for="inputAddress" class="col-sm-2 control-label">Address</label>
										<div class="col-sm-8">
											<textarea class="form-control" rows="3" id="inputAddress"></textarea>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" class="btn btn-default">Submit</button>
										</div>
									</div>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

				<!-- Change Password -->
				<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="glyphicon glyphicon-lock"></i> Change Password</h3>
                            </div>
                            <div class="panel-body">
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label for="inputNewPassword" class="col-sm-2 control-label">New Password</label>
										<div class="col-sm-4">
											<input type="password" class="form-control" id="inputNewPassword" placeholder="New Password">
										</div>
									</div>
									<div class="form-group">
										<label for="inputNewPasswordagain" class="col-sm-2 control-label">Password again</label>
										<div class="col-sm-4">
											<input type="password" class="form-control" id="inputNewPasswordagain" placeholder="New Password again">
										</div>
									</div>
									<div class="form-group">
										<label for="inputOldPassword" class="col-sm-2 control-label">Old Password</label>
										<div class="col-sm-4">
											<input type="password" class="form-control" id="inputOldPassword" placeholder="New Password">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" class="btn btn-default">Submit</button>
										</div>
									</div>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

			</div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

	</div>

</body>

</html>
