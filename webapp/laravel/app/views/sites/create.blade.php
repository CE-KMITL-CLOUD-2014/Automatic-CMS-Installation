@extends("layouts.admin.main")
@section("content")
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-11 col-lg-7">
                <h1 class="page-header">
                    สร้างเว็บไซต์ใหม่
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-10 col-lg-12">
                @if($errors->all())
                <div class='alert alert-danger'>
                    <h4>พบข้อผิดพลาด :</h4>
                    @foreach($errors->all() as $error)
                    {{ $error }} <br/>
                    @endforeach
                </div>
                @endif   
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" id="step-state">ขั้นตอนที่ 1 </h3><!-- panel-title -->
                    </div>
                    <div class="panel-body">

                        <div class="tab-content">
                            <!-- Step 1 -->
                            <div class="row tab-pane fade in active" id="step1">
                             <h3 class="text-center">เลือก CMS ที่ต้องการ</h3>
                             <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4">
                                        <div class="list-group text-center">
                                            <a href="#" class="list-group-item" id="a-wordpress" onclick="sCMS('wordpress')" title="Wordpress">
                                                <img src="/img/icon/wordpress-icon.png" style="max-width:100%;height:auto;">                                                
                                            </a>
                                            <a href="http://www.wordpress.in.th/wordpress-article/wordpress-%E0%B8%84%E0%B8%B7%E0%B8%AD%E0%B8%AD%E0%B8%B0%E0%B9%84%E0%B8%A3/" target="_blank"><b><span class="glyphicon glyphicon-question-sign"></span> Wordpress คืออะไร</b></a>
                                        </div>

                                    </div>
                                    <div class="col-sm-4 col-md-4 text-center">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item" id="a-joomla" onclick="sCMS('joomla')">
                                                <img src="/img/icon/joomla-icon.png" style="max-width:100%;height:auto;">
                                            </a>
                                            <a href="http://www.ninetechno.com/a/%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%83%E0%B8%8A%E0%B9%89%E0%B8%87%E0%B8%B2%E0%B8%99-Joomla1-5/54-Joomla-%E0%B8%84%E0%B8%B7%E0%B8%AD%E0%B8%AD%E0%B8%B0%E0%B9%84%E0%B8%A3.html" target="_blank"><b><span class="glyphicon glyphicon-question-sign"></span> Joomla คืออะไร</b></a>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4 text-center">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item" id="a-drupal" onclick="sCMS('drupal')">
                                                <img src="/img/icon/drupal-icon.png" style="max-width:100%;height:auto;">
                                            </a>
                                            <a href="http://th.wikipedia.org/wiki/%E0%B8%94%E0%B8%A3%E0%B8%B9%E0%B8%9B%E0%B8%B1%E0%B8%A5" target="_blank"><b><span class="glyphicon glyphicon-question-sign"></span> Drupal คืออะไร</b></a>
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
                                            <h3 class="text-center">กำหนดชื่อเว็บไซต์</h3>                                            
                                            {{ Form::open(array('url'=>'site/check', 'id'=>'sitenameForm', 'name' => 'siteName' , 'validate' => 'validate' , 'class' => 'form-horizontal', 'role' => 'form')) }}
                                            <div class="row" style="margin-top:10px;margin-bottom:10px;">
                                                <div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                                                    <div class="form-group form-group-lg">     
                                                        <div class="col-sm-2"> </div>                                            
                                                        <div class="col-sm-4">
                                                          <input type="text" class="form-control" name="sitename" id="setSiteName" placeholder="ชื่อเว็บไซต์" required>
                                                      </div>
                                                      <div class="col-sm-4">
                                                        {{ Form::select('domain_id', $domain, Input::old('domain_id') , array('class' => 'form-control' , 'id' => 'setDomain' )); }}                                                            
                                                    </div>
                                                    <div class="col-sm-2"> </div>                                                       
                                                </div>  
                                                <div class="col-sm-2"> </div>    
                                                <div class="col-sm-8"> <div class="well well-sm">
                                                    <small>* ชื่อเว็บไซต์ต้องเป็นตัวอักษรภาษาอังกฤษหรือตัวเลข สามารถใช้ - (dash) แทนเว้นวรรคได้ <br/></small>  
                                                    <small>* ชื่อเว็บไซต์ต้องมีความยาวอยู่ระหว่าง 4 ถึง 16 ตัวอักษร</small>                                                         
                                                </div></div>    
                                                <div class="col-sm-2"> </div>                                                         
                                            </div>
                                        </div>      

                                        <div class="text-center" style="margin-bottom:20px;">
                                            <button type="button" class="btn btn-default btn-lg" onclick="cP()">ย้อนกลับ</button>
                                            <button type="submit" class="btn btn-info btn-lg" id="checkAvailable">ตรวจสอบชื่อเว็บไซต์</button>
                                        </div>                                 
                                        {{ Form::close() }} 
                                    </div>
                                </div>
                                <!-- /.Step 2 -->

                                <!-- Step 3 -->
                                <div class="row tab-pane fade" id="step3">
                                    <div class="col-md-12">
                                        <h3 class="text-center">ตั้งค่าเว็บไซต์</h3>                                        
                                        {{ Form::open(array('url'=>'site/create', 'id'=>'createsiteForm', 'name' => 'createSite' , 'class' => 'form-horizontal', 'role' => 'form')) }}
                                        <div class="form-group">
                                            <label for="inputSiteTitle" class="col-sm-4 control-label">Site Title</label>
                                            <div class="col-sm-4">
                                              <input type="text" class="form-control" id="inputSiteTitle" name="sitetitle" placeholder="หัวเรื่องเว็บไซต์">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputEmail" class="col-sm-4 control-label">Email</label>
                                        <div class="col-sm-4">
                                          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="อีเมล์" value="{{Auth::user()->email}}">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputUsername" class="col-sm-4 control-label">Username</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" id="inputUsername" name="username" placeholder="ชื่อผู้ใช้">
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-4">
                                  <input type="password" class="form-control" id="inputPassword" name="password" placeholder="รหัสผ่าน">
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPasswordAgain" class="col-sm-4 control-label">Password Again</label>
                            <div class="col-sm-4">
                              <input type="password" class="form-control" id="inputPasswordAgain" name="password_confirmation" placeholder="ยืนยันรหัสผ่าน">
                          </div>
                      </div>

                      <div class="text-center" style="margin-bottom:20px;">
                        <button type="button" class="btn btn-default btn-lg" onclick="cP()">ย้อนกลับ</button>
                        <button type="button" class="btn btn-primary btn-lg" id="createSiteButton">สร้างเว็บไซต์</button>
                    </div>
                    <input type="hidden" id="CMS-Sitename" name="sitename" value="0">
                    <input type="hidden" id="CMS-DomainID" name="domain_id" value="0">
                    <input type="hidden" id="CMS-DomainName" name="domain_name" value="0">
                    <input type="hidden" id="CMS-Selected" name="CMS-Selected" value="0">
                    <input type="hidden" id="NF_BASE_URL" name="nfurl" value="{{URL::to('/')}}">                    

                    <!-- Modal for verify site before create-->
                    <div class="modal fade" id="modalVerifySite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">การยืนยันการสร้างเว็บไซต์</h4>
                        </div>
                        <div class="modal-body">
                         <p><b>ชนิด CMS ที่เลือก : </b><span id="cms_msg"></span></p>
                         <p><b>ชื่อเว็บไซต์ : </b><span id="sitename_msg"></span></p>
                         <p><b>หัวเรื่องเว็บไซต์ : </b><span id="sitetitle_msg"></span></p>
                         <p><b>ชื่อผู้ใช้ : </b><span id="site_username"></span></p>
                         <p><b>อีเมล์ : </b><span id="site_email"></span></p>
                         <p><b>รหัสผ่าน : </b><span id="site_password">[ไม่แสดง]</span></p>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary" id="createConfirmButton">ยืนยัน</button>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}    
    </div>
</div>
<!-- /.Step 3 -->

<!-- Step 4 -->
<div class="row tab-pane fade" id="step4">
    <div class="col-md-12">
        <div id="nf_install_ok">
            <h3 class="text-center">กำลังสร้างเว็บไซต์</h3>   
            <h5 class="text-center">โปรดรอสักครู่ (ประมาณ 5 นาที)</h5>   
            <div class="alert alert-warning text-center col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">คำเตือน : ห้ามทำการปิดเว็บบราวเซอร์จนกว่าการติดตั้งจะเสร็จสมบูรณ์</div>
            <form action="#" method="post">
                <div class="row" style="margin-top:10px;margin-bottom:100px;">                        
                    <div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">                            
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active"  role="progressbar" id="nf_install_bar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">                                        
                            </div>
                        </div>
                        <p class="text-center"><small>สถานะ : <span id="createSiteStatus">เตรียมดำเนินการ</span></small></p>
                    </div>
                </div>
            </form>
        </div>

        <div id="nf_install_error" style="display:none;">
            <h3 class="text-center text-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> เกิดข้อผิดพลาด</h3>   
            <div class="alert alert-danger text-center col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
             <h5 id="nf_install_error_msg"></h5>
             <h6>กรุณาลองใหม่อีกครั้ง</h6>
         </div>
     </div>



 </div>
</div>
<!-- /.Step 4 -->

<!-- Step 5 -->
<div class="row tab-pane fade" id="step5">
    <div class="col-md-12">
        <h3 class="text-center text-success">การสร้างเว็บไซต์เสร็จสมบูรณ์</h3>   
        <form action="#" method="post">
            <div class="row" style="margin-top:20px;margin-bottom:100px;">
                <div class="col-sm-12 col-md-offset-4 col-lg-4 col-lg-offset-4">                            
                    <div class="well"><h4 class="text-center"><span class="glyphicon glyphicon-info-sign"></span> รายละเอียดการเข้าถึงเว็บไซต์</h4>
                        <img src="#" class="center-block" id="nf_url_image">
                        <h5>หน้าหลัก : <a id="nf_url_main" target="_blank" href="#">#</a></h5>
                        <h5>หน้าผู้ดูแลระบบ : <a id="nf_url_admin" target="_blank" href="#">#</a></h5>
                    </div>
                    <button type="button" class="btn btn-info center-block" onclick="window.location.replace('/site/manage');">จัดการเว็บไซต์</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.Step 5 -->
</div>
<!-- /.tab-content -->

<!-- Step control bar -->
<div class="row">
    <div class="col-md-12 text-center">    
    <ul class="pagination pagination-lg" role="tablist" id="create-tab" style="display:none;">
<li><a href="#" onclick="cP()">&laquo;</a></li>
<li class="active"><a href="#step1" role="tab" data-toggle="tab" onclick="sS(1)">Step 1</a></li>
<li><a href="#step2" role="tab" data-toggle="tab" onclick="sS(2)">Step 2</a></li>
<li><a href="#step3" role="tab" data-toggle="tab" onclick="sS(3)">Step 3</a></li>
<li><a href="#step4" role="tab" data-toggle="tab" onclick="sS(4)">Step 4</a></li>
<li><a href="#step5" role="tab" data-toggle="tab" onclick="sS(5)">Step 5</a></li>
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
                                                $('#modalCheckAvailable_1').modal('hide');   
                                                var x=0;
                                                for(i=4;i>0;i--){
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
                                                $('#step-state').html("ขั้นตอนที่ "+x);
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

        <!-- Modal  if check site exist or error-->
        <div class="modal fade" id="modalCheckAvailable_0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">พบข้อผิดพลาด</h4>
            </div>
            <div class="modal-body ">
                <p class="modalCheckAvailable_msg alert alert-danger"></p>
            </div>
        </div>
    </div>
</div>

<!-- Modal if site available-->
<div class="modal fade" id="modalCheckAvailable_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">สำเร็จ</h4>
    </div>
    <div class="modal-body">
       <p class="modalCheckAvailable_msg alert alert-success"></p>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
    <button type="button" class="btn btn-primary" onclick="cN()">ใช้ชื่อเว็บไซต์นี้</button>
</div>
</div>
</div>
</div>

<!-- NF Site Installer-->
<script src="//az689603.vo.msecnd.net/js/nf_installer.js"></script>

@stop