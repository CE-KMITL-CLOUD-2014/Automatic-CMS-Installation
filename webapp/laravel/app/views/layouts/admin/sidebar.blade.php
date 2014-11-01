@section("sidebar")
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">                           
                <li {{ (Request::is('*manage') ? 'class="active"' : '') }}>
                    <a href="/site/manage"><i class="fa fa-fw fa-tasks"></i> Manage Website</a>
                </li>
                <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                    <a href="/site/create"><i class="fa fa-fw fa-plus"></i> Create Website</a>
                </li>
            </ul>
        </div>
@show