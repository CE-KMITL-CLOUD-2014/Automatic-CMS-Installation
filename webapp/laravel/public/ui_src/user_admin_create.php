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
					<li class="active">
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
                    <div class="col-md-11 col-lg-7">
                        <h1 class="page-header">
                            Create Website <small>Create your web site</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-plus"></i> Create Website
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-md-11 col-lg-7">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title" id="step-state">Step 1</h3><!-- panel-title -->
							</div>
							<div class="panel-body">
								
								<div class="tab-content">
									<!-- Step 1 -->
									<div class="row tab-pane fade in active" id="step1">
										<div class="col-md-12">
											<h3 style="margin: 20px;">Select your CMS</h3>
											<div class="row">
												<div class="col-sm-4 col-md-4">
													<div class="list-group text-center">
														<a href="#" class="list-group-item" id="a-wordpress" onclick="sCMS('wordpress')">
															<img src="img/icon/wordpress-icon.png" style="max-width:100%;height:auto;">
														</a>
													</div>
												</div>
												<div class="col-sm-4 col-md-4 text-center">
													<div class="list-group">
														<a href="#" class="list-group-item" id="a-joomla" onclick="sCMS('joomla')">
															<img src="img/icon/joomla-icon.png" style="max-width:100%;height:auto;">
														</a>
													</div>
												</div>
												<div class="col-sm-4 col-md-4 text-center">
													<div class="list-group">
														<a href="#" class="list-group-item" id="a-drupal" onclick="sCMS('drupal')">
															<img src="img/icon/drupal-icon.png" style="max-width:100%;height:auto;">
														</a>
													</div>
												</div>
												<!-- Select CMS function -->
												<!-- x = 'wordpress', 'joomla', 'drupal' -->
												<script>
													function sCMS(x){
														$('#a-wordpress').css("background-color","none");
														$('#a-joomla').css("background-color","none");
														$('#a-drupal').css("background-color","none");

														$('#a-'+x).css("background-color","#f0f0f0");
														$('#CMS-Selected').attr("value",x);//set input hidden value of "CMS-Selected" 
														$('#create-tab li:eq(2) a').tab('show');//when cms selected that go to step 2 
														sS(2);//panel-title is "Step 2"
													};
												</script>
											</div>
										</div>
									</div>
									<!-- /.Step 1 -->

									<!-- Step 2 -->
									<div class="row tab-pane fade" id="step2">
										<div class="col-md-12">
											<h3 style="margin: 20px;">Create your web site name</h3>
											<form action="#" method="post">
												<div class="row" style="margin-top:126px;margin-bottom:50px;">
													<div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
														<div class="input-group">
															<input type="text" class="form-control" placeholder="Your domain name">
															<span class="input-group-btn">
																<button class="btn btn-default" type="button">mfsite.me</button>
															</span>
														</div><!-- /input-group -->
													</div>
												</div>
												<div class="text-center" style="margin-bottom:50px;">
													<button type="button" class="btn btn-primary btn-lg">Create now!</button>
												</div>
												<input type="hidden" id="CMS-Selected" name="CMS-Selected" value="0"><!-- CMS-Selected -->
											</form>
										</div>
									</div>
									<!-- /.Step 2 -->

									<!-- Step 3 -->
									<div class="row tab-pane fade" id="step3">
										<div class="col-md-12">
											<h3 style="margin: 20px;">Waiting... </h3>
											<form action="#" method="post">
												<div class="row" style="margin-top:126px;margin-bottom:100px;">
													<div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
														<div class="progress">
															<div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
																45%
															</div>
														</div>
														<p class="text-center">status : copy wordpress to website...</p>
													</div>
												</div>
											</form>
										</div>
									</div>
									<!-- /.Step 3 -->

									<!-- Step 4 -->
									<div class="row tab-pane fade" id="step4">
										<div class="col-md-12">
											<h3 style="margin: 20px;">Congrat Success </h3>
											<form action="#" method="post">
												<div class="row" style="margin-top:100px;margin-bottom:100px;">
													<div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 text-center">
														<h2>Your web site is "website.nfsite.me"</h2>
													</div>
												</div>
											</form>
										</div>
									</div>
									<!-- /.Step 4 -->
								</div>
								<!-- /.tab-content -->
								
								<!-- Step control bar -->
								<div class="row">
									<div class="col-md-12 text-center">
										<ul class="pagination pagination-lg" role="tablist" id="create-tab">
											<li><a href="#" onclick="cP()">&laquo;</a></li>
											<li class="active"><a href="#step1" role="tab" data-toggle="tab" onclick="sS(1)">Step 1</a></li>
											<li><a href="#step2" role="tab" data-toggle="tab" onclick="sS(2)">Step 2</a></li>
											<li><a href="#step3" role="tab" data-toggle="tab" onclick="sS(3)">Step 3</a></li>
											<li><a href="#step4" role="tab" data-toggle="tab" onclick="sS(4)">Step 4</a></li>
											<li><a href="#" onclick="cN()">&raquo;</a></li>
										</ul>
										<script>
											//Function for go to previous step
											function cP(){
												var x=0;
												for(i=2;i<5;i++){
													var y = $('#create-tab li:eq('+i+')').attr("class");
													if(y=='active'){
														var j=i-1;
														$('#create-tab li:eq('+j+') a').tab('show');
														sS(j);
													}
												}
											};
											//Function for go to next step
											function cN(){
												var x=0;
												for(i=3;i>0;i--){
													var y = $('#create-tab li:eq('+i+')').attr("class");
													if(y=='active'){
														var j=i+1;
														$('#create-tab li:eq('+j+') a').tab('show');
														sS(j);
													}
												}
											};
											//Function for show current step at panel-title
											function sS(x){
												$('#step-state').html("Step "+x);
											};
										</script>
									</div>
								</div><!-- /.Step control bar -->
							</div><!-- /.panel-body -->
						</div><!-- /.panel -->
					</div><!-- /.col -->
				</div>
                <!-- /.row -->

			</div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

	</div>

</body>

</html>