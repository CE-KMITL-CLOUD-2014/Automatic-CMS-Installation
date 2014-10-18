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

	<!-- Select period frequency function -->
	<script>
		function cc(x,y){
			$('#'+x+'-hourly').css("display","none");
			$('#'+x+'-day').css("display","none");
			$('#'+x+'-week').css("display","none");
			$('#'+x+'-month').css("display","none");
			$('#'+x+'-'+y).css("display","block");
		}
	</script>

	<!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

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
                    <li class="active">
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
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

				<!-- Web Site 1 -->
				<div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
								<div class="row">
									<div class="col-lg-6">
										<h3 class="panel-title" style="display:inline;"><i class="fa fa-bar-chart-o fa-fw"></i> Web Site 1 (Pageviews)</h3>
									</div>
									<div class="col-lg-6 text-right">
										<!-- Nav tabs -->
										<div class="btn-group">
										  <button type="button" class="btn btn-default btn-xs" onclick="cc('web1','hourly')">Hourly</button>
										  <button type="button" class="btn btn-default btn-xs" onclick="cc('web1','day')">Day</button>
										  <button type="button" class="btn btn-default btn-xs" onclick="cc('web1','week')">Week</button>
										  <button type="button" class="btn btn-default btn-xs" onclick="cc('web1','month')">Month</button>
										</div>
									</div>
								</div>
                            </div>
                            <div class="panel-body" id="web1-hourly">
                                <div id="morris-website1-pageviews-hourly-chart"></div>
                            </div>
							<div class="panel-body" id="web1-day">
                                <div id="morris-website1-pageviews-day-chart"></div>
                            </div>
							<div class="panel-body" id="web1-week">
                                <div id="morris-website1-pageviews-week-chart"></div>
                            </div>
							<div class="panel-body" id="web1-month">
                                <div id="morris-website1-pageviews-month-chart"></div>
                            </div>
							<!-- script for select default pageviews chart -->
							<script>
								setTimeout(function(){cc('web1','month')},10)
							</script>
                        </div>
                    </div>
					<div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> New Visitor, Returning Visitor</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-website1-donut-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

				<!-- Web Site 2 -->
				<div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
								<div class="row">
									<div class="col-lg-6">
										<h3 class="panel-title" style="display:inline;"><i class="fa fa-bar-chart-o fa-fw"></i> Web Site 2 (Pageviews)</h3>
									</div>
									<div class="col-lg-6 text-right">
										<!-- Nav tabs -->
										<div class="btn-group">
										  <button type="button" class="btn btn-default btn-xs" onclick="cc('web2','hourly')">Hourly</button>
										  <button type="button" class="btn btn-default btn-xs" onclick="cc('web2','day')">Day</button>
										  <button type="button" class="btn btn-default btn-xs" onclick="cc('web2','week')">Week</button>
										  <button type="button" class="btn btn-default btn-xs" onclick="cc('web2','month')">Month</button>
										</div>
									</div>
								</div>
                            </div>
							<div class="panel-body" id="web2-hourly">
                                Web site 2 area hourly chart
                            </div>
							<div class="panel-body" id="web2-day">
                                Web site 2 area day chart
                            </div>
							<div class="panel-body" id="web2-week">
                                Web site 2 area week chart
                            </div>
                            <div class="panel-body" id="web2-month">
                                <div id="morris-website2-pageviews-chart"></div>
                            </div>
							<!-- script for select default pageviews chart -->
							<script>
								setTimeout(function(){cc('web2','month')},10)
							</script>
                        </div>
                    </div>
					<div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> New Visitor, Returning Visitor</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-website2-donut-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

				<!-- Web Site 3 -->
				<div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
								<div class="row">
									<div class="col-lg-6">
										<h3 class="panel-title" style="display:inline;"><i class="fa fa-bar-chart-o fa-fw"></i> Web Site 3 (Pageviews)</h3>
									</div>
									<div class="col-lg-6 text-right">
										<!-- Nav tabs -->
										<div class="btn-group">
										  <button type="button" class="btn btn-default btn-xs" onclick="cc('web3','hourly')">Hourly</button>
										  <button type="button" class="btn btn-default btn-xs" onclick="cc('web3','day')">Day</button>
										  <button type="button" class="btn btn-default btn-xs" onclick="cc('web3','week')">Week</button>
										  <button type="button" class="btn btn-default btn-xs" onclick="cc('web3','month')">Month</button>
										</div>
									</div>
								</div>
                            </div>
                            <div class="panel-body" id="web3-hourly">
                                Web site 3 area hourly chart
                            </div>
							<div class="panel-body" id="web3-day">
                                Web site 3 area day chart
                            </div>
							<div class="panel-body" id="web3-week">
                                Web site 3 area week chart
                            </div>
                            <div class="panel-body" id="web3-month">
                                <div id="morris-website3-pageviews-chart"></div>
                            </div>
							<!-- script for select default pageviews chart -->
							<script>
								setTimeout(function(){cc('web3','month')},10)
							</script>
                        </div>
                    </div>
					<div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> New Visitor, Returning Visitor</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-website3-donut-chart"></div>
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