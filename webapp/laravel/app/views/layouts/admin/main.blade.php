<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{$pagetitle}} | {{CommonController::getSetting()->site_title}}</title>

    <!-- Bootstrap Core CSS -->
    <link href="//az686380.vo.msecnd.net/css/bootstrap.min.admin.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="//az686380.vo.msecnd.net/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="//az686380.vo.msecnd.net/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->   

   <!-- jQuery Version 1.11.0 -->
   <script src="//az686380.vo.msecnd.net/js/jquery-1.11.0.js"></script>

   <!-- Bootstrap Core JavaScript -->
   <script src="//az686380.vo.msecnd.net/js/bootstrap.min.js"></script>

@if(Request::is('*user') || Request::is('*site'))
   <!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.3/css/jquery.dataTables.css">  

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.js"></script>
@endif

</head>

<body>
    @include("layouts.admin.header")
<div id="wrapper">    
    @yield("content")
    @include("layouts.admin.footer")
</div>

</body>

</html>