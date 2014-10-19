@extends("layouts.admin.main")
@section("content")
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

@stop