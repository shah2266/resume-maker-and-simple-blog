<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('adminStyle/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form> -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview {{ request()->is('/dashboard') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/dashboard"><i class="fa fa-circle-o"></i> Dashboard</a></li>
                </ul>
            </li>
            <li class="treeview {{ (request()->is('control/company') OR request()->is('control/company/*') OR request()->is('control/banner') OR request()->is('control/banner/*'))? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Site Option</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ (request()->is('control/company') OR request()->is('control/company/*')) ? 'active' : '' }}"><a href="{{ url('control/company') }}"><i class="fa fa-circle-o"></i> General setting</a></li>
                    <li class="{{ (request()->is('control/banner') OR request()->is('control/banner/*')) ? 'active' : '' }}"><a href="{{ url('control/banner') }}"><i class="fa fa-circle-o"></i> Banner</a></li>
                </ul>
            </li>

            <li class="treeview {{ (request()->is('control/resume') OR request()->is('control/resume/*'))? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Resume</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('control/resume*') ? 'active' : '' }}"><a href="{{ url('control/resume') }}"><i class="fa fa-circle-o"></i> Resume</a></li>
                </ul>
            </li>
            <li class="header">Blog area</li>
            <li class="treeview {{ (request()->is('control/blog') OR request()->is('control/blog/*'))? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-tag"></i>
                    <span>Blog</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('control/blog/page') ? 'active' : '' }}"><a href="{{ url('control/blog/page') }}"><i class="fa fa-circle-o"></i> Page setting</a></li>
                    <li class="{{ request()->is('control/blog/category') ? 'active' : '' }}"><a href="{{ url('control/blog/category') }}"><i class="fa fa-circle-o"></i> Category</a></li>
{{--                    <li class="{{ request()->is('control/blog/tag') ? 'active' : '' }}"><a href="{{ url('control/blog/tag') }}"><i class="fa fa-circle-o"></i> Tag</a></li>--}}
                    <li class="{{ (request()->is('control/blog/post') OR request()->is('control/blog/post/*')) ? 'active' : '' }}"><a href="{{ url('control/blog/post') }}"><i class="fa fa-circle-o"></i> Post</a></li>
                </ul>
            </li>


            <li class="header">Contact area</li>
            <li class="treeview {{ (request()->is('control/contact') OR request()->is('control/contact/*'))? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-phone"></i>
                    <span>Contact</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ (request()->is('control/contact/page/index')  OR request()->is('control/contact/page/*')) ? 'active' : '' }}"><a href="{{ url('control/contact/page/index') }}"><i class="fa fa-circle-o"></i> Page setting</a></li>
                    <li class="{{ request()->is('control/contact') ? 'active' : '' }}"><a href="{{ url('control/contact') }}"><i class="fa fa-circle-o"></i> Contact</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
