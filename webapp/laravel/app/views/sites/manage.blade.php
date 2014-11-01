@extends("layouts.admin.main")
@section("content")
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    จัดการเว็บไซต์
                </h1>                 
            </div>
        </div>
        <!-- /.row -->

        <!-- Content -->

      @if(Session::has('nf_del_success'))
        <div class='alert alert-success'>   
         {{ Session::get('nf_del_success') }}
     </div>
     @endif

     @if(Session::has('nf_del_error'))
     <div class='alert alert-danger'>   
         {{ Session::get('nf_del_error') }}
     </div>
     @endif

     @if($site_count == 0)
     <div class="row">
        <div class="col-md-12" style="margin-bottom:100px;">
            <h4 class="text-center text-info">คุณยังไม่ได้สร้างเว็บไซต์</h4>
            <button type="button" class="btn btn-primary btn-lg center-block" onclick="window.location.replace('/site/create');">สร้างเว็บไซต์ใหม่</button>
        </div>
    </div>
    @else
    <!-- Each 3 Web Site per row -->
    <?php
    $count = 1;
    ?>
    @foreach ($site_data as $data)
    @if($count%3 == 1)
    <div class="row">
        @endif

        <!-- Web Site 1 -->
        <div class="col-sm-4">

            <!-- Button trigger modal -->
            <a href="#" data-toggle="modal" data-target="#webSite{{$count}}">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table style="background-color: #f5f5f5;">
                            <tr>
                                <td valign="middle" style="width:100%;">
                                    <img src='{{$data["img"]}}' style="width:inherit;height:265px;"/>
                                </td>
                            </tr>
                        </table>
                        <h3>{{$data['url']}}</h3>
                    </div>
                </div>
            </a>

            <!-- Modal -->
            <div class="modal fade" id="webSite{{$count}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{$data['url']}} ({{$data['cms_name']}})</h4>
                        </div>
                        <div class="modal-body">                           
                            <div class="row">

                                <div class="col-md-12">
                                  <div class="row" >
                                    <div class="col-sm-12 col-md-offset-1 col-lg-10 col-lg-offset-1">                            
                                        <div class="well"><h4 class="text-center"><span class="glyphicon glyphicon-info-sign"></span> รายละเอียดการเข้าถึงเว็บไซต์</h4>
                                            <img src='{{$data["img"]}}' class="center-block" title="{{$data['cms_name']}}" style="width:inherit;height:265px;"/>                                                   
                                            <h5>หน้าหลัก : <a target="_blank" href="http://{{$data['url']}}">{{$data['url']}}</a></h5>
                                            @if($data['cms_type'] == 'wordpress')
                                            <h5>หน้าผู้ดูแลระบบ : <a target="_blank" href="http://{{$data['url']}}/wp-admin">{{$data['url']}}/wp-admin</a></h5>
                                            @elseif($data['cms_type'] == 'joomla')
                                            <h5>หน้าผู้ดูแลระบบ : <a target="_blank" href="http://{{$data['url']}}/administrator">{{$data['url']}}/administrator</a></h5>
                                            @elseif($data['cms_type'] == 'drupal')
                                            <h5>หน้าผู้ดูแลระบบ : <a target="_blank" href="http://{{$data['url']}}/admin">{{$data['url']}}/admin</a></h5>
                                             @endif
                                            <input type="hidden" id="site_{{$count}}" value="{{$data['url']}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>                                   
                        </div>
                    </div>
                    <div class="modal-footer">                            
                        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                        <button type="button" class="btn btn-danger" onclick="del_site({{$data['sid']}},{{$count}});">ลบเว็บไซต์นี้</button>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.col -->
    <!-- /.Web Site 1 -->


    @if($count%3 == 0 || $site_count == $count)
</div><!-- /.row -->
@endif

<?php
$count++;
?>
@endforeach
@endif

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<!-- Modal on delete website-->
<div class="modal fade" id="modalConfirmDeleteSite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">ลบเว็บไซต์</h4>
    </div>
    <div class="modal-body">
     <p class="modalCheckAvailable_msg alert alert-warning" id="show_del_status">กรุณายืนยันการลบเว็บไซต์ : <span id="show_del_site"></span></p>
 </div>
 <div class="modal-footer">
     <input type="hidden" id="confirm_del_input" value="0" />
     <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
     <button type="button" class="btn btn-primary" id="confirm_del_btn">ยืนยัน</button>
 </div>
</div>
</div>
</div>

<!-- NF Site Installer-->
<script src="/js/nf_manage.js"></script>

@stop