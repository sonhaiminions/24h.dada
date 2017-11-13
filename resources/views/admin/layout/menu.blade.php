  <!-- /.navbar-top-links -->

  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">

                @if(isset($user))

                <div class="alert-dismissable" style="font:ultra-expanded;" >Welcome Back :<span style="color: #f211de;">{{$user->name}}</span></div>
                @endif
            </li>
            <li>
                <a href="#"><i class="fa fa-dashboard fa-fw"></i> Menu</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{"admin/category/list"}}">List Category</a>
                    </li>
                    <li>
                        <a href="{{"admin/category/add"}}">Add Category</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> News<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/news/list">List new</a>
                    </li>
                    <li>
                        <a href="admin/news/add">Add new</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="admin/user/list">List User</a>
                    </li>
                    <li>
                        <a href="admin/user/add">Add User</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
