<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('assets/backend/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ Request::is('admin/dashboard')? 'active':'' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/header*')? 'active':'' }}">
                <a href="{{ route('header.index') }}">
                    <i class="fa fa-header"></i> <span>Header</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/feature*')? 'active':'' }}">
                <a href="{{ route('feature.index') }}">
                    <i class="fa fa-list-alt"></i> <span>Features</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/pricing*')? 'active':'' }}">
                <a href="{{ route('pricing.index') }}">
                    <i class="fa fa-money"></i> <span>Pricing</span>
                </a>
            </li>
            <li class="header">LABELS</li>
            <li><a href="{{ route('home') }}" target="_blank"><i class="fa fa-home text-yellow"></i> <span>Go Home</span></a></li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out text-red"></i> <span>Logout</span>
                </a>
                <form id="logout-form" style="display: none;" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
