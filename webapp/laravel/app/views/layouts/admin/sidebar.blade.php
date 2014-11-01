@section("sidebar")
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">   
            <li class="text-center"> <h4 class="text-warning">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-th"></span> ส่วนสมาชิก</h4>   </li>                        
                <li {{ (Request::is('*manage') ? 'class="active"' : '') }}>
                    <a href="/site/manage"><i class="fa fa-fw fa-tasks"></i> จัดการเว็บไซต์</a>
                </li>
                <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                    <a href="/site/create"><i class="fa fa-fw fa-plus"></i> สร้างเว็บไซต์</a>
                </li>
                <li {{ (Request::is('*profile') ? 'class="active"' : '') }}><a href="/user/profile"><i class="fa fa-fw fa-user"></i> ข้อมูลส่วนตัว</a></li>
                <li><a href="/user/logout"><i class="fa fa-fw fa-power-off"></i> ออกจากระบบ</a></li>
                @if(Auth::user()->role == 1)
                <li class="text-center"> <h4 class="text-warning">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-th"></span> ส่วนผู้ดูแล</h4>   </li>
                <li {{ (Request::is('*user') ? 'class="active"' : '') }}><a href="/admin/user"><i class="fa fa-fw fa-user"></i> จัดการผู้ใช้ทั้งหมด</a></li>
                <li {{ (Request::is('*site') ? 'class="active"' : '') }}><a href="/admin/site"><i class="fa fa-fw fa-cloud"></i> จัดการเว็บไซต์ทั้งหมด</a></li>
                <li {{ (Request::is('*setting') ? 'class="active"' : '') }}><a href="/admin/setting"><i class="fa fa-fw fa-cog"></i> ตั้งค่าระบบ</a></li>
                @endif
            </ul>            
        </div>
@show