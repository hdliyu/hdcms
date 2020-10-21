@inject('menuService', 'App\Services\MenuService')
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ module()['title'] }} - {{ site()['title'] }} </title>
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet">
    <link href="/admin2/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/modules/Edu/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    @stack('styles')
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="{{ module()['preview'] }}" alt="" class="rounded-circle" style="width:35px;">
                </div>
                <div class="sidebar-brand-text mx-3">{{ module()['title'] }}</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>仪表盘</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                模块管理
            </div>
            @include('layouts.module._menu')

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                系统菜单
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('site.site.index') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>站点列表</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('site.module.index',site()) }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>所有模块</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ site()['domain'] }}" target="_blank">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>网站首页</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div>
                        <a href="{{ route('module.menu.type','module')}}"
                            class="font-weight-bold mr-3 ml-3 {{ $menuService->type()=='module'?'text-primary':'text-secondary' }}">
                            <i class="fas fa-dice"></i> 模块业务
                        </a>
                        <a href="{{ route('module.menu.type','wechat')}}"
                            class="font-weight-bold mr-3 {{ $menuService->type()=='wechat'?'text-primary':'text-secondary' }}">
                            <i class="fab fa-weixin"></i> 微信管理
                        </a>
                        <a href="{{ route('module.menu.type','article')}}"
                            class="font-weight-bold mr-3 {{ $menuService->type()=='article'?'text-primary':'text-secondary' }}">
                            <i class="fas fa-check-square"></i> 文章系统
                        </a>
                    </div>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ user()['name'] }}</span>
                                <img class="img-profile rounded-circle" src="{{ user('avatar') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    个人中心
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.my.edit') }}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    修改密码
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    退出
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid mb-5 {{ route_class() }}" id="app">
                    <div class="bg-white p-3 border pb-5" style="margin-bottom: 10rem;">
                        @include('layouts.message')
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    @yield('scripts')
</body>

</html>
