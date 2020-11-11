<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ __('messages.control Board') }}  - @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.min.css?v=1')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css?v=1">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css?v=1')}}">
    <!-- iCheck -->
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('plugins/morris/morris.css?v=1')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css?v=1')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css?v=1')}}">

    <link rel="stylesheet" href="{{asset('plugins/iCheck/flat/blue.css?v=1')}}">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css?v=1">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css?v=1')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('/')}}plugins/daterangepicker/daterangepicker-bs3.css?v=1">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css?v=1')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css?v=1')}}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap-rtl.min.css?v=1')}}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{asset('dist/css/custom-style.css?v=1')}}">
    <link rel="stylesheet" href="{{asset('css/app.css?v=1')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.19.0/dist/sweetalert2.min.css?v=1">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

    <style>
        #DataTable_filter input {
            border-radius: 5px;
        }

        button span {
            font-family: 'Vazir', sans-serif !important;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <div id="app" class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{url('stocks')}}">المخازن</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('sales')}}">المبيعات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('purchase')}}">المشتريات</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">المواد البشريه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">الحسابات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('settings')}}">الاعدادات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('customers')}}">العملاء</a>
                </li> -->
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="البحث" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav mr-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-comments-o"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{url('dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 ml-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        احمد حمد
                                        <span class="float-left text-sm text-danger"><i class="fa fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">با من لطفا...</p>
                                    <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{url('dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle ml-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        پیمان احمدی
                                        <span class="float-left text-sm text-muted"><i class="fa fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">من پیامتو دریافت کردم</p>
                                    <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{url('dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle ml-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        سارا وکیلی
                                        <span class="float-left text-sm text-warning"><i class="fa fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">پروژه اتون عالی بود مرسی واقعا</p>
                                    <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i>4 ساعت قبل</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">مشاهده المهام </a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                        <span class="dropdown-item dropdown-header">15 اشعار</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-envelope ml-2"></i> 4 مهمه جدید
                            <span class="float-left text-muted text-sm">3 دقیقه</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-users ml-2"></i> 8 طلب
                            <span class="float-left text-muted text-sm">12 ساعت</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-file ml-2"></i> 3 مستوى المخزن
                            <span class="float-left text-muted text-sm">2 روز</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">مشاهده جميع الاشعارات </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i class="fa fa-th-large"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"> {{ __('messages.control Board') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar" style="direction: ltr">
                <div style="direction: rtl">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{url('dist/img/user1-128x128.jpg')}}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">
                                {{auth()->user()->name}}
                            </a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="{{url('/')}}" class="nav-link active">
                                    <i class="nav-icon fa fa-dashboard"></i>
                                    <p>
                                        {{ __('messages.well') }}

                                    </p>
                                </a>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <img data-v-0288d978="" src="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAyMjYgMjI2Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9Im5vbnplcm8iIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2UtbGluZWNhcD0iYnV0dCIgc3Ryb2tlLWxpbmVqb2luPSJtaXRlciIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBzdHJva2UtZGFzaGFycmF5PSIiIHN0cm9rZS1kYXNob2Zmc2V0PSIwIiBmb250LWZhbWlseT0ibm9uZSIgZm9udC13ZWlnaHQ9Im5vbmUiIGZvbnQtc2l6ZT0ibm9uZSIgdGV4dC1hbmNob3I9Im5vbmUiIHN0eWxlPSJtaXgtYmxlbmQtbW9kZTogbm9ybWFsIj48cGF0aCBkPSJNMCwyMjZ2LTIyNmgyMjZ2MjI2eiIgZmlsbD0ibm9uZSI+PC9wYXRoPjxnIGZpbGw9IiNjY2NjY2MiPjxwYXRoIGQ9Ik02Ni40MzE2NCwyOC4yNWMtNi4xMjQ1MiwwIC0xMS45MTc5NywyLjY0ODQ0IC0xNS45NDU4LDcuMjI4MDNsLTE2Ljk5NDE0LDE5LjQ3NzA1YzAsLTAuMDU1MTcgMCwtMC4wNTUxNyAtMC4wNTUxNywwYy0zLjMxMDU1LDMuODA3MTMgLTUuMTg2NTMsOC44MjgxMyAtNS4xODY1MywxMy45MDQzdjEwNy43MDMxM2MwLDExLjY0MjA5IDkuNTQ1NDEsMjEuMTg3NSAyMS4xODc1LDIxLjE4NzVoMTI3LjEyNWMxMS42NDIwOSwwIDIxLjE4NzUsLTkuNTQ1NDEgMjEuMTg3NSwtMjEuMTg3NXYtMTA3LjcwMzEyYzAsLTUuMDc2MTcgLTEuODc1OTcsLTEwLjA5NzE3IC01LjI0MTcsLTEzLjkwNDNjMCwtMC4wNTUxNyAwLC0wLjA1NTE3IDAsMGwtMTYuOTk0MTQsLTE5LjQ3NzA1Yy00LjAyNzgzLC00LjU3OTU5IC05Ljg3NjQ1LC03LjIyODAzIC0xNS45NDU4LC03LjIyODAzek02Ni40MzE2NCw0Mi4zNzVoOTMuMTM2NzJjMi4wNDE1LDAgMy45NzI2NiwwLjg4MjgxIDUuMjk2ODgsMi40Mjc3M2wxMC4yNjI3LDExLjY5NzI3aC0xMjQuMjU1ODZsMTAuMjYyNjksLTExLjY5NzI3YzEuMzI0MjIsLTEuNTQ0OTIgMy4yNTUzNywtMi40Mjc3MyA1LjI5Njg4LC0yLjQyNzczek00Mi4zNzUsNzAuNjI1aDE0MS4yNXYxMDUuOTM3NWMwLDMuOTcyNjYgLTMuMDg5ODQsNy4wNjI1IC03LjA2MjUsNy4wNjI1aC0xMjcuMTI1Yy0zLjk3MjY2LDAgLTcuMDYyNSwtMy4wODk4NCAtNy4wNjI1LC03LjA2MjV6TTg0Ljc1LDg0Ljc1djE0LjEyNWg1Ni41di0xNC4xMjV6TTEzNC4xODc1LDExM2wtNy4wNjI1LDE0LjEyNXYxNC4xMjVoMTQuMTI1di0xNC4xMjV6TTE2Mi40Mzc1LDExM2wtNy4wNjI1LDE0LjEyNXYxNC4xMjVoMTQuMTI1di0xNC4xMjV6TTEyNy4xMjUsMTU1LjM3NXYxNC4xMjVoNDIuMzc1di0xNC4xMjV6Ij48L3BhdGg+PC9nPjwvZz48L3N2Zz4=" alt="icon" width="26" height="22">
                                    <p>
                                        {{ __('messages.Products') }}
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/products')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>  {{ __('messages.Viewproducts') }}</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/product/create')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>{{ __('messages.Addaproduct') }}</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/categories')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>

                                            <p>{{ __('messages.Classifications') }}</p>
                                        </a>
                                    </li>
                                </ul>
                             </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <img data-v-0288d978="" src="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAyMjYgMjI2Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9Im5vbnplcm8iIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2UtbGluZWNhcD0iYnV0dCIgc3Ryb2tlLWxpbmVqb2luPSJtaXRlciIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBzdHJva2UtZGFzaGFycmF5PSIiIHN0cm9rZS1kYXNob2Zmc2V0PSIwIiBmb250LWZhbWlseT0ibm9uZSIgZm9udC13ZWlnaHQ9Im5vbmUiIGZvbnQtc2l6ZT0ibm9uZSIgdGV4dC1hbmNob3I9Im5vbmUiIHN0eWxlPSJtaXgtYmxlbmQtbW9kZTogbm9ybWFsIj48cGF0aCBkPSJNMCwyMjZ2LTIyNmgyMjZ2MjI2eiIgZmlsbD0ibm9uZSI+PC9wYXRoPjxnIGZpbGw9IiNjY2NjY2MiPjxwYXRoIGQ9Ik02Ni40MzE2NCwyOC4yNWMtNi4xMjQ1MiwwIC0xMS45MTc5NywyLjY0ODQ0IC0xNS45NDU4LDcuMjI4MDNsLTE2Ljk5NDE0LDE5LjQ3NzA1YzAsLTAuMDU1MTcgMCwtMC4wNTUxNyAtMC4wNTUxNywwYy0zLjMxMDU1LDMuODA3MTMgLTUuMTg2NTMsOC44MjgxMyAtNS4xODY1MywxMy45MDQzdjEwNy43MDMxM2MwLDExLjY0MjA5IDkuNTQ1NDEsMjEuMTg3NSAyMS4xODc1LDIxLjE4NzVoMTI3LjEyNWMxMS42NDIwOSwwIDIxLjE4NzUsLTkuNTQ1NDEgMjEuMTg3NSwtMjEuMTg3NXYtMTA3LjcwMzEyYzAsLTUuMDc2MTcgLTEuODc1OTcsLTEwLjA5NzE3IC01LjI0MTcsLTEzLjkwNDNjMCwtMC4wNTUxNyAwLC0wLjA1NTE3IDAsMGwtMTYuOTk0MTQsLTE5LjQ3NzA1Yy00LjAyNzgzLC00LjU3OTU5IC05Ljg3NjQ1LC03LjIyODAzIC0xNS45NDU4LC03LjIyODAzek02Ni40MzE2NCw0Mi4zNzVoOTMuMTM2NzJjMi4wNDE1LDAgMy45NzI2NiwwLjg4MjgxIDUuMjk2ODgsMi40Mjc3M2wxMC4yNjI3LDExLjY5NzI3aC0xMjQuMjU1ODZsMTAuMjYyNjksLTExLjY5NzI3YzEuMzI0MjIsLTEuNTQ0OTIgMy4yNTUzNywtMi40Mjc3MyA1LjI5Njg4LC0yLjQyNzczek00Mi4zNzUsNzAuNjI1aDE0MS4yNXYxMDUuOTM3NWMwLDMuOTcyNjYgLTMuMDg5ODQsNy4wNjI1IC03LjA2MjUsNy4wNjI1aC0xMjcuMTI1Yy0zLjk3MjY2LDAgLTcuMDYyNSwtMy4wODk4NCAtNy4wNjI1LC03LjA2MjV6TTg0Ljc1LDg0Ljc1djE0LjEyNWg1Ni41di0xNC4xMjV6TTEzNC4xODc1LDExM2wtNy4wNjI1LDE0LjEyNXYxNC4xMjVoMTQuMTI1di0xNC4xMjV6TTE2Mi40Mzc1LDExM2wtNy4wNjI1LDE0LjEyNXYxNC4xMjVoMTQuMTI1di0xNC4xMjV6TTEyNy4xMjUsMTU1LjM3NXYxNC4xMjVoNDIuMzc1di0xNC4xMjV6Ij48L3BhdGg+PC9nPjwvZz48L3N2Zz4=" alt="icon" width="26" height="22">
                                    <p>
                                        كروت الاصناف
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/products')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p> كروت الاصناف</p>
                                        </a>
                                    </li>
                                </ul>
                             </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <img data-v-0288d978="" src="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAyMjYgMjI2Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9Im5vbnplcm8iIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2UtbGluZWNhcD0iYnV0dCIgc3Ryb2tlLWxpbmVqb2luPSJtaXRlciIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBzdHJva2UtZGFzaGFycmF5PSIiIHN0cm9rZS1kYXNob2Zmc2V0PSIwIiBmb250LWZhbWlseT0ibm9uZSIgZm9udC13ZWlnaHQ9Im5vbmUiIGZvbnQtc2l6ZT0ibm9uZSIgdGV4dC1hbmNob3I9Im5vbmUiIHN0eWxlPSJtaXgtYmxlbmQtbW9kZTogbm9ybWFsIj48cGF0aCBkPSJNMCwyMjZ2LTIyNmgyMjZ2MjI2eiIgZmlsbD0ibm9uZSI+PC9wYXRoPjxnIGZpbGw9IiNjY2NjY2MiPjxwYXRoIGQ9Ik00OS40Mzc1LDI4LjI1Yy0xMS42NDIwOSwwIC0yMS4xODc1LDkuNTQ1NDEgLTIxLjE4NzUsMjEuMTg3NXYxMTNjMCwxMS42NDIwOSA5LjU0NTQxLDIxLjE4NzUgMjEuMTg3NSwyMS4xODc1aDEyNy4xMjVjMTEuNjQyMDksMCAyMS4xODc1LC05LjU0NTQxIDIxLjE4NzUsLTIxLjE4NzV2LTExM2MwLC0xMS42NDIwOSAtOS41NDU0MSwtMjEuMTg3NSAtMjEuMTg3NSwtMjEuMTg3NXpNNDkuNDM3NSw0Mi4zNzVoMTI3LjEyNWMzLjk3MjY2LDAgNy4wNjI1LDMuMDg5ODQgNy4wNjI1LDcuMDYyNXYxMTNjMCwzLjk3MjY2IC0zLjA4OTg0LDcuMDYyNSAtNy4wNjI1LDcuMDYyNWgtMTI3LjEyNWMtMy45NzI2NiwwIC03LjA2MjUsLTMuMDg5ODQgLTcuMDYyNSwtNy4wNjI1di0xMTNjMCwtMy45NzI2NiAzLjA4OTg0LC03LjA2MjUgNy4wNjI1LC03LjA2MjV6TTYzLjU2MjUsNTYuNWMtMy45MTc0OCwwIC03LjA2MjUsMy4xNDUwMiAtNy4wNjI1LDcuMDYyNXY1Ni41YzAsMy45MTc0OCAzLjE0NTAyLDcuMDYyNSA3LjA2MjUsNy4wNjI1aDk4Ljg3NWMzLjkxNzQ4LDAgNy4wNjI1LC0zLjE0NTAyIDcuMDYyNSwtNy4wNjI1di01Ni41YzAsLTMuOTE3NDggLTMuMTQ1MDIsLTcuMDYyNSAtNy4wNjI1LC03LjA2MjV6TTcwLjYyNSw3MC42MjVoNTYuNXYxNC4xMjVoLTU2LjV6TTE0MS4yNSw3MC42MjVoMTQuMTI1djE0LjEyNWgtMTQuMTI1ek03MC42MjUsOTguODc1aDU2LjV2MTQuMTI1aC01Ni41ek0xNDEuMjUsOTguODc1aDE0LjEyNXYxNC4xMjVoLTE0LjEyNXpNMTEzLDE0MS4yNXYxNC4xMjVoNTYuNXYtMTQuMTI1eiI+PC9wYXRoPjwvZz48L2c+PC9zdmc+" alt="icon" width="26" height="22">
                                    <p>

                                        {{ __('messages.Purchases') }}

                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{url('purchase')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                {{ __('messages.Viewpurchases') }}
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/purchase/create')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                {{ __('messages.Createapurchaseinvoice') }}
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <img data-v-0288d978="" src="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAyMjYgMjI2Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9Im5vbnplcm8iIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2UtbGluZWNhcD0iYnV0dCIgc3Ryb2tlLWxpbmVqb2luPSJtaXRlciIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBzdHJva2UtZGFzaGFycmF5PSIiIHN0cm9rZS1kYXNob2Zmc2V0PSIwIiBmb250LWZhbWlseT0ibm9uZSIgZm9udC13ZWlnaHQ9Im5vbmUiIGZvbnQtc2l6ZT0ibm9uZSIgdGV4dC1hbmNob3I9Im5vbmUiIHN0eWxlPSJtaXgtYmxlbmQtbW9kZTogbm9ybWFsIj48cGF0aCBkPSJNMCwyMjZ2LTIyNmgyMjZ2MjI2eiIgZmlsbD0ibm9uZSI+PC9wYXRoPjxnIGZpbGw9IiNjY2NjY2MiPjxwYXRoIGQ9Ik00OS40Mzc1LDI4LjI1Yy0xMS42NDIwOSwwIC0yMS4xODc1LDkuNTQ1NDEgLTIxLjE4NzUsMjEuMTg3NXYxMTNjMCwxMS42NDIwOSA5LjU0NTQxLDIxLjE4NzUgMjEuMTg3NSwyMS4xODc1aDEyNy4xMjVjMTEuNjQyMDksMCAyMS4xODc1LC05LjU0NTQxIDIxLjE4NzUsLTIxLjE4NzV2LTExM2MwLC0xMS42NDIwOSAtOS41NDU0MSwtMjEuMTg3NSAtMjEuMTg3NSwtMjEuMTg3NXpNNDkuNDM3NSw0Mi4zNzVoMTI3LjEyNWMzLjk3MjY2LDAgNy4wNjI1LDMuMDg5ODQgNy4wNjI1LDcuMDYyNXYxMTNjMCwzLjk3MjY2IC0zLjA4OTg0LDcuMDYyNSAtNy4wNjI1LDcuMDYyNWgtMTI3LjEyNWMtMy45NzI2NiwwIC03LjA2MjUsLTMuMDg5ODQgLTcuMDYyNSwtNy4wNjI1di0xMTNjMCwtMy45NzI2NiAzLjA4OTg0LC03LjA2MjUgNy4wNjI1LC03LjA2MjV6TTYzLjU2MjUsNTYuNWMtMy45MTc0OCwwIC03LjA2MjUsMy4xNDUwMiAtNy4wNjI1LDcuMDYyNXY1Ni41YzAsMy45MTc0OCAzLjE0NTAyLDcuMDYyNSA3LjA2MjUsNy4wNjI1aDk4Ljg3NWMzLjkxNzQ4LDAgNy4wNjI1LC0zLjE0NTAyIDcuMDYyNSwtNy4wNjI1di01Ni41YzAsLTMuOTE3NDggLTMuMTQ1MDIsLTcuMDYyNSAtNy4wNjI1LC03LjA2MjV6TTcwLjYyNSw3MC42MjVoNTYuNXYxNC4xMjVoLTU2LjV6TTE0MS4yNSw3MC42MjVoMTQuMTI1djE0LjEyNWgtMTQuMTI1ek03MC42MjUsOTguODc1aDU2LjV2MTQuMTI1aC01Ni41ek0xNDEuMjUsOTguODc1aDE0LjEyNXYxNC4xMjVoLTE0LjEyNXpNMTEzLDE0MS4yNXYxNC4xMjVoNTYuNXYtMTQuMTI1eiI+PC9wYXRoPjwvZz48L2c+PC9zdmc+" alt="icon" width="26" height="22">
                                    <p>
                                        {{ __('messages.Sales') }}


                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{url('sales')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                {{ __('messages.salesinvoices') }}


                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a target="_blank" href="{{url('/pos')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                {{ __('messages.Createsalesinvoice') }}

                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <img data-v-0288d978="" src="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAyMjYgMjI2Ij48ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSg0Ljk3Miw0Ljk3Mikgc2NhbGUoMC45NTYsMC45NTYpIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9Im5vbnplcm8iIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSJub25lIiBzdHJva2UtbGluZWNhcD0iYnV0dCIgc3Ryb2tlLWxpbmVqb2luPSJub25lIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIHN0cm9rZS1kYXNoYXJyYXk9IiIgc3Ryb2tlLWRhc2hvZmZzZXQ9IjAiIGZvbnQtZmFtaWx5PSJub25lIiBmb250LXdlaWdodD0ibm9uZSIgZm9udC1zaXplPSJub25lIiB0ZXh0LWFuY2hvcj0ibm9uZSIgc3R5bGU9Im1peC1ibGVuZC1tb2RlOiBub3JtYWwiPjxnIGZpbGw9IiNjY2NjY2MiIHN0cm9rZT0iI2NjY2NjYyIgc3Ryb2tlLXdpZHRoPSIxMCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PHBhdGggZD0iTTEyMS4zLDEwMS44djIuMzdoLTYuOTd2MjAuMDNoLTIuNjZ2LTIwLjAzaC02Ljk3di0yLjM3eiI+PC9wYXRoPjwvZz48ZyBmaWxsPSIjY2NjY2NjIiBzdHJva2U9IiNjY2NjY2MiIHN0cm9rZS13aWR0aD0iMTAiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwYXRoIGQ9Ik0xMjcuMTI1LDU2LjVjMCwyMy4zMzkzNiAtMTkuMDM1NjQsNDIuMzc1IC00Mi4zNzUsNDIuMzc1Yy0yMy4zMzkzNiwwIC00Mi4zNzUsLTE5LjAzNTY0IC00Mi4zNzUsLTQyLjM3NWMwLC0yMy4zMzkzNiAxOS4wMzU2NCwtNDIuMzc1IDQyLjM3NSwtNDIuMzc1YzIzLjMzOTM2LDAgNDIuMzc1LDE5LjAzNTY0IDQyLjM3NSw0Mi4zNzV6TTExNS4zMTczOSwxMDUuODI3MTZjMi40ODI5MSwtNC4wODMwMSA2LjczMTQ0LC02Ljk1MjE2IDExLjgwNzYxLC02Ljk1MjE2aDcwLjYyNWM3LjcyNDYxLDAgMTQuMTI1LDYuNDAwMzkgMTQuMTI1LDE0LjEyNXY3MC42MjVjMCw3LjcyNDYxIC02LjQwMDM5LDE0LjEyNSAtMTQuMTI1LDE0LjEyNWgtNzAuNjI1Yy03LjcyNDYxLDAgLTE0LjEyNSwtNi40MDAzOSAtMTQuMTI1LC0xNC4xMjV2LTYyLjkwMDM5Yy04LjMzMTU1LC00Ljg1NTQ3IC0xNy44NzY5NSwtNy43MjQ2MSAtMjguMjUsLTcuNzI0NjFjLTMxLjI4NDY3LDAgLTU2LjUsMjUuMjE1MzMgLTU2LjUsNTYuNWgtMTQuMTI1YzAsLTM4Ljg5ODkyIDMxLjcyNjA4LC03MC42MjUgNzAuNjI1LC03MC42MjVjMTAuOTI0ODEsMCAyMS4yOTc4NiwyLjQ4MjkxIDMwLjU2NzM5LDYuOTUyMTZ6TTU2LjUsNTYuNWMwLDE1LjY2OTkyIDEyLjU4MDA4LDI4LjI1IDI4LjI1LDI4LjI1YzE1LjY2OTkyLDAgMjguMjUsLTEyLjU4MDA4IDI4LjI1LC0yOC4yNWMwLC0xNS42Njk5MiAtMTIuNTgwMDgsLTI4LjI1IC0yOC4yNSwtMjguMjVjLTE1LjY2OTkyLDAgLTI4LjI1LDEyLjU4MDA4IC0yOC4yNSwyOC4yNXpNMTI3LjEyNSwxMjcuMTI1aDcwLjYyNXYtMTQuMTI1aC03MC42MjV6TTEyNy4xMjUsMTgzLjYyNWg3MC42MjV2LTQyLjM3NWgtMTQuMTI1djE0LjEyNWgtNDIuMzc1di0xNC4xMjVoLTE0LjEyNXoiPjwvcGF0aD48L2c+PHBhdGggZD0iTTAsMjI2di0yMjZoMjI2djIyNnoiIGZpbGw9Im5vbmUiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2UtbGluZWpvaW49Im1pdGVyIj48L3BhdGg+PGcgZmlsbD0iI2NjY2NjYyIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIHN0cm9rZS1saW5lam9pbj0ibWl0ZXIiPjxwYXRoIGQ9Ik04NC43NSwxNC4xMjVjLTIzLjMzOTM2LDAgLTQyLjM3NSwxOS4wMzU2NCAtNDIuMzc1LDQyLjM3NWMwLDIzLjMzOTM2IDE5LjAzNTY0LDQyLjM3NSA0Mi4zNzUsNDIuMzc1YzIzLjMzOTM2LDAgNDIuMzc1LC0xOS4wMzU2NCA0Mi4zNzUsLTQyLjM3NWMwLC0yMy4zMzkzNiAtMTkuMDM1NjQsLTQyLjM3NSAtNDIuMzc1LC00Mi4zNzV6TTg0Ljc1LDk4Ljg3NWMtMzguODk4OTIsMCAtNzAuNjI1LDMxLjcyNjA4IC03MC42MjUsNzAuNjI1aDE0LjEyNWMwLC0zMS4yODQ2NyAyNS4yMTUzMywtNTYuNSA1Ni41LC01Ni41YzEwLjM3MzA1LDAgMTkuOTE4NDUsMi44NjkxNCAyOC4yNSw3LjcyNDYxdjYyLjkwMDM5YzAsNy43MjQ2MSA2LjQwMDM5LDE0LjEyNSAxNC4xMjUsMTQuMTI1aDcwLjYyNWM3LjcyNDYxLDAgMTQuMTI1LC02LjQwMDM5IDE0LjEyNSwtMTQuMTI1di03MC42MjVjMCwtNy43MjQ2MSAtNi40MDAzOSwtMTQuMTI1IC0xNC4xMjUsLTE0LjEyNWgtNzAuNjI1Yy01LjA3NjE3LDAgLTkuMzI0NywyLjg2OTE0IC0xMS44MDc2MSw2Ljk1MjE2Yy05LjI2OTUzLC00LjQ2OTI1IC0xOS42NDI1OCwtNi45NTIxNiAtMzAuNTY3MzksLTYuOTUyMTZ6TTg0Ljc1LDI4LjI1YzE1LjY2OTkyLDAgMjguMjUsMTIuNTgwMDggMjguMjUsMjguMjVjMCwxNS42Njk5MiAtMTIuNTgwMDgsMjguMjUgLTI4LjI1LDI4LjI1Yy0xNS42Njk5MiwwIC0yOC4yNSwtMTIuNTgwMDggLTI4LjI1LC0yOC4yNWMwLC0xNS42Njk5MiAxMi41ODAwOCwtMjguMjUgMjguMjUsLTI4LjI1ek0xMjcuMTI1LDExM2g3MC42MjV2MTQuMTI1aC03MC42MjV6TTEyNy4xMjUsMTQxLjI1aDE0LjEyNXYxNC4xMjVoNDIuMzc1di0xNC4xMjVoMTQuMTI1djQyLjM3NWgtNzAuNjI1eiI+PC9wYXRoPjwvZz48ZyBmaWxsPSIjY2NjY2NjIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLWxpbmVqb2luPSJtaXRlciI+PHBhdGggZD0iTTEyMS4zLDEwMS44djIuMzdoLTYuOTd2MjAuMDNoLTIuNjZ2LTIwLjAzaC02Ljk3di0yLjM3eiI+PC9wYXRoPjwvZz48cGF0aCBkPSIiIGZpbGw9Im5vbmUiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2UtbGluZWpvaW49Im1pdGVyIj48L3BhdGg+PHBhdGggZD0iIiBmaWxsPSJub25lIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLWxpbmVqb2luPSJtaXRlciI+PC9wYXRoPjxwYXRoIGQ9IiIgZmlsbD0ibm9uZSIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIHN0cm9rZS1saW5lam9pbj0ibWl0ZXIiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2UtbGluZWpvaW49Im1pdGVyIj48L3BhdGg+PC9nPjwvZz48L3N2Zz4=" alt="icon" width="26" height="22">
                                    <p>
                                        {{ __('messages.Suppliers') }}


                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{url('suppliers')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                {{ __('messages.Viewsuppliers') }}


                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/supplier/create')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                {{ __('messages.AddSuppliers') }}

                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <img data-v-0288d978="" src="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAyMjYgMjI2Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9Im5vbnplcm8iIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2UtbGluZWNhcD0iYnV0dCIgc3Ryb2tlLWxpbmVqb2luPSJtaXRlciIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBzdHJva2UtZGFzaGFycmF5PSIiIHN0cm9rZS1kYXNob2Zmc2V0PSIwIiBmb250LWZhbWlseT0ibm9uZSIgZm9udC13ZWlnaHQ9Im5vbmUiIGZvbnQtc2l6ZT0ibm9uZSIgdGV4dC1hbmNob3I9Im5vbmUiIHN0eWxlPSJtaXgtYmxlbmQtbW9kZTogbm9ybWFsIj48cGF0aCBkPSJNMCwyMjZ2LTIyNmgyMjZ2MjI2eiIgZmlsbD0ibm9uZSI+PC9wYXRoPjxnIGZpbGw9IiNjY2NjY2MiPjxwYXRoIGQ9Ik00OS40Mzc1LDI4LjI1Yy0zLjkxNzQ4LDAgLTcuMDYyNSwzLjE0NTAyIC03LjA2MjUsNy4wNjI1YzAsMy45MTc0OCAzLjE0NTAyLDcuMDYyNSA3LjA2MjUsNy4wNjI1YzMuOTE3NDgsMCA3LjA2MjUsLTMuMTQ1MDIgNy4wNjI1LC03LjA2MjVjMCwtMy45MTc0OCAtMy4xNDUwMiwtNy4wNjI1IC03LjA2MjUsLTcuMDYyNXpNMTYyLjQzNzUsMjguMjVjLTMuOTE3NDgsMCAtNy4wNjI1LDMuMTQ1MDIgLTcuMDYyNSw3LjA2MjVjMCwzLjkxNzQ4IDMuMTQ1MDIsNy4wNjI1IDcuMDYyNSw3LjA2MjVjMy45MTc0OCwwIDcuMDYyNSwtMy4xNDUwMiA3LjA2MjUsLTcuMDYyNWMwLC0zLjkxNzQ4IC0zLjE0NTAyLC03LjA2MjUgLTcuMDYyNSwtNy4wNjI1ek0xMjIuNzEwOTQsNTYuNWwtMzguODQzNzUsNTEuOTc1NTlsLTM3LjI5ODgzLC0yMy4xNzM4M2wtMzIuOTk1MTEsNDguNDQ0MzNsMTEuNjk3MjcsNy45NDUzMWwyNS4zMjU2NywtMzcuMTg4NDdsMzYuODAyMjUsMjIuNzMyNDJsMzcuMDc4MTMsLTQ5LjU0Nzg2bDM3Ljk2MDk0LDM2LjE5NTMxbDM0Ljg3MTA5LC0zMi44Mjk1OWwtOS43MTA5NCwtMTAuMjYyNjlsLTI1LjE2MDE2LDIzLjY3MDQxek00OS40Mzc1LDU2LjVjLTMuOTE3NDgsMCAtNy4wNjI1LDMuMTQ1MDIgLTcuMDYyNSw3LjA2MjVjMCwzLjkxNzQ4IDMuMTQ1MDIsNy4wNjI1IDcuMDYyNSw3LjA2MjVjMy45MTc0OCwwIDcuMDYyNSwtMy4xNDUwMiA3LjA2MjUsLTcuMDYyNWMwLC0zLjkxNzQ4IC0zLjE0NTAyLC03LjA2MjUgLTcuMDYyNSwtNy4wNjI1ek0xNjIuNDM3NSw1Ni41Yy0zLjkxNzQ4LDAgLTcuMDYyNSwzLjE0NTAyIC03LjA2MjUsNy4wNjI1YzAsMy45MTc0OCAzLjE0NTAyLDcuMDYyNSA3LjA2MjUsNy4wNjI1YzMuOTE3NDgsMCA3LjA2MjUsLTMuMTQ1MDIgNy4wNjI1LC03LjA2MjVjMCwtMy45MTc0OCAtMy4xNDUwMiwtNy4wNjI1IC03LjA2MjUsLTcuMDYyNXpNNDkuNDM3NSwxMjcuMTI1Yy0zLjkxNzQ4LDAgLTcuMDYyNSwzLjE0NTAyIC03LjA2MjUsNy4wNjI1YzAsMy45MTc0OCAzLjE0NTAyLDcuMDYyNSA3LjA2MjUsNy4wNjI1YzMuOTE3NDgsMCA3LjA2MjUsLTMuMTQ1MDIgNy4wNjI1LC03LjA2MjVjMCwtMy45MTc0OCAtMy4xNDUwMiwtNy4wNjI1IC03LjA2MjUsLTcuMDYyNXpNMTYyLjQzNzUsMTI3LjEyNWMtMy45MTc0OCwwIC03LjA2MjUsMy4xNDUwMiAtNy4wNjI1LDcuMDYyNWMwLDMuOTE3NDggMy4xNDUwMiw3LjA2MjUgNy4wNjI1LDcuMDYyNWMzLjkxNzQ4LDAgNy4wNjI1LC0zLjE0NTAyIDcuMDYyNSwtNy4wNjI1YzAsLTMuOTE3NDggLTMuMTQ1MDIsLTcuMDYyNSAtNy4wNjI1LC03LjA2MjV6TTQ5LjQzNzUsMTU1LjM3NWMtMy45MTc0OCwwIC03LjA2MjUsMy4xNDUwMiAtNy4wNjI1LDcuMDYyNWMwLDMuOTE3NDggMy4xNDUwMiw3LjA2MjUgNy4wNjI1LDcuMDYyNWMzLjkxNzQ4LDAgNy4wNjI1LC0zLjE0NTAyIDcuMDYyNSwtNy4wNjI1YzAsLTMuOTE3NDggLTMuMTQ1MDIsLTcuMDYyNSAtNy4wNjI1LC03LjA2MjV6TTE2Mi40Mzc1LDE1NS4zNzVjLTMuOTE3NDgsMCAtNy4wNjI1LDMuMTQ1MDIgLTcuMDYyNSw3LjA2MjVjMCwzLjkxNzQ4IDMuMTQ1MDIsNy4wNjI1IDcuMDYyNSw3LjA2MjVjMy45MTc0OCwwIDcuMDYyNSwtMy4xNDUwMiA3LjA2MjUsLTcuMDYyNWMwLC0zLjkxNzQ4IC0zLjE0NTAyLC03LjA2MjUgLTcuMDYyNSwtNy4wNjI1ek0xOTcuNzUsMTgzLjYyNWwtMTgzLjYyNSwwLjI3NTg4djE0LjEyNWwxODMuNjI1LC0wLjI3NTg4eiI+PC9wYXRoPjwvZz48L2c+PC9zdmc+" alt="icon" width="26" height="22">
                                    <p>
                                        {{ __('messages.Stores') }}


                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/stocks')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                {{ __('messages.ViewStores') }}

                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/stock/create')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                {{ __('messages.Addstore') }}

                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('customers')}}" class="nav-link">
                                    <img data-v-0288d978="" src="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAyMjYgMjI2Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9Im5vbnplcm8iIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2UtbGluZWNhcD0iYnV0dCIgc3Ryb2tlLWxpbmVqb2luPSJtaXRlciIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBzdHJva2UtZGFzaGFycmF5PSIiIHN0cm9rZS1kYXNob2Zmc2V0PSIwIiBmb250LWZhbWlseT0ibm9uZSIgZm9udC13ZWlnaHQ9Im5vbmUiIGZvbnQtc2l6ZT0ibm9uZSIgdGV4dC1hbmNob3I9Im5vbmUiIHN0eWxlPSJtaXgtYmxlbmQtbW9kZTogbm9ybWFsIj48cGF0aCBkPSJNMCwyMjZ2LTIyNmgyMjZ2MjI2eiIgZmlsbD0ibm9uZSI+PC9wYXRoPjxnIGZpbGw9IiNjY2NjY2MiPjxwYXRoIGQ9Ik0xMTMsMjguMjVjLTIzLjMzOTM2LDAgLTQyLjM3NSwxOS4wMzU2NCAtNDIuMzc1LDQyLjM3NWMwLDIzLjMzOTM2IDE5LjAzNTY0LDQyLjM3NSA0Mi4zNzUsNDIuMzc1YzIzLjMzOTM2LDAgNDIuMzc1LC0xOS4wMzU2NCA0Mi4zNzUsLTQyLjM3NWMwLC0yMy4zMzkzNiAtMTkuMDM1NjQsLTQyLjM3NSAtNDIuMzc1LC00Mi4zNzV6TTExMywxMTNjLTM4Ljg5ODkyLDAgLTcwLjYyNSwzMS43MjYwOCAtNzAuNjI1LDcwLjYyNWgxNC4xMjVjMCwtMzEuMjg0NjcgMjUuMjE1MzMsLTU2LjUgNTYuNSwtNTYuNWMzMS4yODQ2NywwIDU2LjUsMjUuMjE1MzMgNTYuNSw1Ni41aDE0LjEyNWMwLC0zOC44OTg5MiAtMzEuNzI2MDgsLTcwLjYyNSAtNzAuNjI1LC03MC42MjV6TTExMyw0Mi4zNzVjMTUuNjY5OTIsMCAyOC4yNSwxMi41ODAwOCAyOC4yNSwyOC4yNWMwLDE1LjY2OTkyIC0xMi41ODAwOCwyOC4yNSAtMjguMjUsMjguMjVjLTE1LjY2OTkyLDAgLTI4LjI1LC0xMi41ODAwOCAtMjguMjUsLTI4LjI1YzAsLTE1LjY2OTkyIDEyLjU4MDA4LC0yOC4yNSAyOC4yNSwtMjguMjV6Ij48L3BhdGg+PC9nPjwvZz48L3N2Zz4=" alt="icon" width="26" height="22">
                                    <p>
                                        {{ __('messages.Customers') }}


                                    </p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{url('accounts')}}" class="nav-link">
                                    <img data-v-0288d978="" src="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAyMjYgMjI2Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9Im5vbnplcm8iIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2UtbGluZWNhcD0iYnV0dCIgc3Ryb2tlLWxpbmVqb2luPSJtaXRlciIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBzdHJva2UtZGFzaGFycmF5PSIiIHN0cm9rZS1kYXNob2Zmc2V0PSIwIiBmb250LWZhbWlseT0ibm9uZSIgZm9udC13ZWlnaHQ9Im5vbmUiIGZvbnQtc2l6ZT0ibm9uZSIgdGV4dC1hbmNob3I9Im5vbmUiIHN0eWxlPSJtaXgtYmxlbmQtbW9kZTogbm9ybWFsIj48cGF0aCBkPSJNMCwyMjZ2LTIyNmgyMjZ2MjI2eiIgZmlsbD0ibm9uZSI+PC9wYXRoPjxnIGZpbGw9IiNjY2NjY2MiPjxwYXRoIGQ9Ik0xMDUuOTM3NSwyNy40MjIzNmwtODQuMjI1ODMsNDIuMDk5MTJjLTUuMDAzNzIsMi41MDE4NiAtNy41ODY2Nyw3LjYwMjEyIC03LjU4NjY3LDEyLjgyODM3djE2LjUyNTE1aDE0LjEyNXY4NC43NWgtMTQuMTI1djE0LjEyNWg4NC43NXY3LjA2MjVjMCwxMS42MTgyNSA5LjU2OTI0LDIxLjE4NzUgMjEuMTg3NSwyMS4xODc1aDg0Ljc1YzExLjYxODI1LDAgMjEuMTg3NSwtOS41NjkyNSAyMS4xODc1LC0yMS4xODc1di01Ni41YzAsLTExLjYxODI2IC05LjU2OTI1LC0yMS4xODc1IC0yMS4xODc1LC0yMS4xODc1aC0yMS4xODc1di0yOC4yNWgxNC4xMjV2LTcuMDYyNXYtOS40NjI2NWMwLC01LjIyNjI1IC0yLjU4Mjk1LC0xMC4zMjY1MSAtNy41ODY2NiwtMTIuODI4Mzd6TTEwNS45Mzc1LDQzLjIwMjY0bDc3LjYwNDc0LDM4LjgxNjE2YzAuMDE5ODYsMC4wMzg3NCAwLjA4Mjc2LDAuMTM0NjUgMC4wODI3NiwwLjMzMTA1djIuNDAwMTVoLTE1NS4zNzV2LTIuNDAwMTVjMCwtMC4xOTY0IDAuMDYyOSwtMC4zMTk5IDAuMDgyNzYsLTAuMzU4NjR6TTEwNS45Mzc1LDU2LjVjLTMuOTAwNTEsMCAtNy4wNjI1LDMuMTYxOTkgLTcuMDYyNSw3LjA2MjVjMCwzLjkwMDUxIDMuMTYxOTksNy4wNjI1IDcuMDYyNSw3LjA2MjVjMy45MDA1MSwwIDcuMDYyNSwtMy4xNjE5OSA3LjA2MjUsLTcuMDYyNWMwLC0zLjkwMDUxIC0zLjE2MTk5LC03LjA2MjUgLTcuMDYyNSwtNy4wNjI1ek00Mi4zNzUsOTguODc1aDE0LjEyNXY4NC43NWgtMTQuMTI1ek03MC42MjUsOTguODc1aDcwLjYyNXYyOC4yNWgtMjEuMTg3NWMtMTEuNjE4MjYsMCAtMjEuMTg3NSw5LjU2OTI0IC0yMS4xODc1LDIxLjE4NzV2MzUuMzEyNWgtMjguMjV6TTE1NS4zNzUsOTguODc1aDE0LjEyNXYyOC4yNWgtMTQuMTI1ek0xMjAuMDYyNSwxNDEuMjVoODQuNzVjMy45NzU3NSwwIDcuMDYyNSwzLjA4Njc1IDcuMDYyNSw3LjA2MjV2NTYuNWMwLDMuOTc1NzUgLTMuMDg2NzUsNy4wNjI1IC03LjA2MjUsNy4wNjI1aC04NC43NWMtMy45NzU3NCwwIC03LjA2MjUsLTMuMDg2NzUgLTcuMDYyNSwtNy4wNjI1di01Ni41YzAsLTMuOTc1NzUgMy4wODY3NiwtNy4wNjI1IDcuMDYyNSwtNy4wNjI1ek0xNjkuNSwxNTUuMzc1djE0LjEyNWgyOC4yNXYtMTQuMTI1ek0xMjcuMTI1LDE4My42MjV2MTQuMTI1aDE0LjEyNXYtMTQuMTI1ek0xNTUuMzc1LDE4My42MjV2MTQuMTI1aDE0LjEyNXYtMTQuMTI1ek0xODMuNjI1LDE4My42MjV2MTQuMTI1aDE0LjEyNXYtMTQuMTI1eiI+PC9wYXRoPjwvZz48L2c+PC9zdmc+" alt="icon" width="26" height="22">
                                    <p>
                                        {{ __('messages.Accounts') }}


                                    </p>
                                </a>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">

                                    <i class="nav-icon fa fa-users" style="font-size: 1rem;"></i>
                                    <p>
                                        {{ __('messages.employees') }}


                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{url('users')}}" class="nav-link">
                                            <i class="nav-icon fa  fa-circle"></i>
                                            <p>
                                                {{ __('messages.Viewemployees') }}

                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/user/create')}}" class="nav-link">
                                            <i class="nav-icon fa  fa-circle"></i>
                                            <p>
                                                {{ __('messages.Addemployees') }}

                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <img data-v-0288d978="" src="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAyMjYgMjI2Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9Im5vbnplcm8iIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2UtbGluZWNhcD0iYnV0dCIgc3Ryb2tlLWxpbmVqb2luPSJtaXRlciIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBzdHJva2UtZGFzaGFycmF5PSIiIHN0cm9rZS1kYXNob2Zmc2V0PSIwIiBmb250LWZhbWlseT0ibm9uZSIgZm9udC13ZWlnaHQ9Im5vbmUiIGZvbnQtc2l6ZT0ibm9uZSIgdGV4dC1hbmNob3I9Im5vbmUiIHN0eWxlPSJtaXgtYmxlbmQtbW9kZTogbm9ybWFsIj48cGF0aCBkPSJNMCwyMjZ2LTIyNmgyMjZ2MjI2eiIgZmlsbD0ibm9uZSI+PC9wYXRoPjxnIGZpbGw9IiNjY2NjY2MiPjxwYXRoIGQ9Ik00OS40Mzc1LDI4LjI1Yy0zLjkxNzQ4LDAgLTcuMDYyNSwzLjE0NTAyIC03LjA2MjUsNy4wNjI1YzAsMy45MTc0OCAzLjE0NTAyLDcuMDYyNSA3LjA2MjUsNy4wNjI1YzMuOTE3NDgsMCA3LjA2MjUsLTMuMTQ1MDIgNy4wNjI1LC03LjA2MjVjMCwtMy45MTc0OCAtMy4xNDUwMiwtNy4wNjI1IC03LjA2MjUsLTcuMDYyNXpNMTYyLjQzNzUsMjguMjVjLTMuOTE3NDgsMCAtNy4wNjI1LDMuMTQ1MDIgLTcuMDYyNSw3LjA2MjVjMCwzLjkxNzQ4IDMuMTQ1MDIsNy4wNjI1IDcuMDYyNSw3LjA2MjVjMy45MTc0OCwwIDcuMDYyNSwtMy4xNDUwMiA3LjA2MjUsLTcuMDYyNWMwLC0zLjkxNzQ4IC0zLjE0NTAyLC03LjA2MjUgLTcuMDYyNSwtNy4wNjI1ek0xMjIuNzEwOTQsNTYuNWwtMzguODQzNzUsNTEuOTc1NTlsLTM3LjI5ODgzLC0yMy4xNzM4M2wtMzIuOTk1MTEsNDguNDQ0MzNsMTEuNjk3MjcsNy45NDUzMWwyNS4zMjU2NywtMzcuMTg4NDdsMzYuODAyMjUsMjIuNzMyNDJsMzcuMDc4MTMsLTQ5LjU0Nzg2bDM3Ljk2MDk0LDM2LjE5NTMxbDM0Ljg3MTA5LC0zMi44Mjk1OWwtOS43MTA5NCwtMTAuMjYyNjlsLTI1LjE2MDE2LDIzLjY3MDQxek00OS40Mzc1LDU2LjVjLTMuOTE3NDgsMCAtNy4wNjI1LDMuMTQ1MDIgLTcuMDYyNSw3LjA2MjVjMCwzLjkxNzQ4IDMuMTQ1MDIsNy4wNjI1IDcuMDYyNSw3LjA2MjVjMy45MTc0OCwwIDcuMDYyNSwtMy4xNDUwMiA3LjA2MjUsLTcuMDYyNWMwLC0zLjkxNzQ4IC0zLjE0NTAyLC03LjA2MjUgLTcuMDYyNSwtNy4wNjI1ek0xNjIuNDM3NSw1Ni41Yy0zLjkxNzQ4LDAgLTcuMDYyNSwzLjE0NTAyIC03LjA2MjUsNy4wNjI1YzAsMy45MTc0OCAzLjE0NTAyLDcuMDYyNSA3LjA2MjUsNy4wNjI1YzMuOTE3NDgsMCA3LjA2MjUsLTMuMTQ1MDIgNy4wNjI1LC03LjA2MjVjMCwtMy45MTc0OCAtMy4xNDUwMiwtNy4wNjI1IC03LjA2MjUsLTcuMDYyNXpNNDkuNDM3NSwxMjcuMTI1Yy0zLjkxNzQ4LDAgLTcuMDYyNSwzLjE0NTAyIC03LjA2MjUsNy4wNjI1YzAsMy45MTc0OCAzLjE0NTAyLDcuMDYyNSA3LjA2MjUsNy4wNjI1YzMuOTE3NDgsMCA3LjA2MjUsLTMuMTQ1MDIgNy4wNjI1LC03LjA2MjVjMCwtMy45MTc0OCAtMy4xNDUwMiwtNy4wNjI1IC03LjA2MjUsLTcuMDYyNXpNMTYyLjQzNzUsMTI3LjEyNWMtMy45MTc0OCwwIC03LjA2MjUsMy4xNDUwMiAtNy4wNjI1LDcuMDYyNWMwLDMuOTE3NDggMy4xNDUwMiw3LjA2MjUgNy4wNjI1LDcuMDYyNWMzLjkxNzQ4LDAgNy4wNjI1LC0zLjE0NTAyIDcuMDYyNSwtNy4wNjI1YzAsLTMuOTE3NDggLTMuMTQ1MDIsLTcuMDYyNSAtNy4wNjI1LC03LjA2MjV6TTQ5LjQzNzUsMTU1LjM3NWMtMy45MTc0OCwwIC03LjA2MjUsMy4xNDUwMiAtNy4wNjI1LDcuMDYyNWMwLDMuOTE3NDggMy4xNDUwMiw3LjA2MjUgNy4wNjI1LDcuMDYyNWMzLjkxNzQ4LDAgNy4wNjI1LC0zLjE0NTAyIDcuMDYyNSwtNy4wNjI1YzAsLTMuOTE3NDggLTMuMTQ1MDIsLTcuMDYyNSAtNy4wNjI1LC03LjA2MjV6TTE2Mi40Mzc1LDE1NS4zNzVjLTMuOTE3NDgsMCAtNy4wNjI1LDMuMTQ1MDIgLTcuMDYyNSw3LjA2MjVjMCwzLjkxNzQ4IDMuMTQ1MDIsNy4wNjI1IDcuMDYyNSw3LjA2MjVjMy45MTc0OCwwIDcuMDYyNSwtMy4xNDUwMiA3LjA2MjUsLTcuMDYyNWMwLC0zLjkxNzQ4IC0zLjE0NTAyLC03LjA2MjUgLTcuMDYyNSwtNy4wNjI1ek0xOTcuNzUsMTgzLjYyNWwtMTgzLjYyNSwwLjI3NTg4djE0LjEyNWwxODMuNjI1LC0wLjI3NTg4eiI+PC9wYXRoPjwvZz48L2c+PC9zdmc+" alt="icon" width="26" height="22">
                                    <p>

                                        {{ __('messages.Reports') }}


                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">


                                    <li class="nav-item">
                                        <a href="{{url('/purchases_report')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>

                                                {{ __('messages.ProcurementReport') }}

                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('sales_report')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                {{ __('messages.salesreport') }}

                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('general/report')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                {{ __('messages.Generalreport') }}

                                            </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{url('product_report')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                {{ __('messages.Productmovementreport') }}

                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('profits_report')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                 تقرير الارباح
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <img data-v-0288d978="" src="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAyMjYgMjI2Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9Im5vbnplcm8iIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2UtbGluZWNhcD0iYnV0dCIgc3Ryb2tlLWxpbmVqb2luPSJtaXRlciIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBzdHJva2UtZGFzaGFycmF5PSIiIHN0cm9rZS1kYXNob2Zmc2V0PSIwIiBmb250LWZhbWlseT0ibm9uZSIgZm9udC13ZWlnaHQ9Im5vbmUiIGZvbnQtc2l6ZT0ibm9uZSIgdGV4dC1hbmNob3I9Im5vbmUiIHN0eWxlPSJtaXgtYmxlbmQtbW9kZTogbm9ybWFsIj48cGF0aCBkPSJNMCwyMjZ2LTIyNmgyMjZ2MjI2eiIgZmlsbD0ibm9uZSI+PC9wYXRoPjxnIGZpbGw9IiNjY2NjY2MiPjxwYXRoIGQ9Ik00OS40Mzc1LDI4LjI1Yy0zLjkxNzQ4LDAgLTcuMDYyNSwzLjE0NTAyIC03LjA2MjUsNy4wNjI1YzAsMy45MTc0OCAzLjE0NTAyLDcuMDYyNSA3LjA2MjUsNy4wNjI1YzMuOTE3NDgsMCA3LjA2MjUsLTMuMTQ1MDIgNy4wNjI1LC03LjA2MjVjMCwtMy45MTc0OCAtMy4xNDUwMiwtNy4wNjI1IC03LjA2MjUsLTcuMDYyNXpNMTYyLjQzNzUsMjguMjVjLTMuOTE3NDgsMCAtNy4wNjI1LDMuMTQ1MDIgLTcuMDYyNSw3LjA2MjVjMCwzLjkxNzQ4IDMuMTQ1MDIsNy4wNjI1IDcuMDYyNSw3LjA2MjVjMy45MTc0OCwwIDcuMDYyNSwtMy4xNDUwMiA3LjA2MjUsLTcuMDYyNWMwLC0zLjkxNzQ4IC0zLjE0NTAyLC03LjA2MjUgLTcuMDYyNSwtNy4wNjI1ek0xMjIuNzEwOTQsNTYuNWwtMzguODQzNzUsNTEuOTc1NTlsLTM3LjI5ODgzLC0yMy4xNzM4M2wtMzIuOTk1MTEsNDguNDQ0MzNsMTEuNjk3MjcsNy45NDUzMWwyNS4zMjU2NywtMzcuMTg4NDdsMzYuODAyMjUsMjIuNzMyNDJsMzcuMDc4MTMsLTQ5LjU0Nzg2bDM3Ljk2MDk0LDM2LjE5NTMxbDM0Ljg3MTA5LC0zMi44Mjk1OWwtOS43MTA5NCwtMTAuMjYyNjlsLTI1LjE2MDE2LDIzLjY3MDQxek00OS40Mzc1LDU2LjVjLTMuOTE3NDgsMCAtNy4wNjI1LDMuMTQ1MDIgLTcuMDYyNSw3LjA2MjVjMCwzLjkxNzQ4IDMuMTQ1MDIsNy4wNjI1IDcuMDYyNSw3LjA2MjVjMy45MTc0OCwwIDcuMDYyNSwtMy4xNDUwMiA3LjA2MjUsLTcuMDYyNWMwLC0zLjkxNzQ4IC0zLjE0NTAyLC03LjA2MjUgLTcuMDYyNSwtNy4wNjI1ek0xNjIuNDM3NSw1Ni41Yy0zLjkxNzQ4LDAgLTcuMDYyNSwzLjE0NTAyIC03LjA2MjUsNy4wNjI1YzAsMy45MTc0OCAzLjE0NTAyLDcuMDYyNSA3LjA2MjUsNy4wNjI1YzMuOTE3NDgsMCA3LjA2MjUsLTMuMTQ1MDIgNy4wNjI1LC03LjA2MjVjMCwtMy45MTc0OCAtMy4xNDUwMiwtNy4wNjI1IC03LjA2MjUsLTcuMDYyNXpNNDkuNDM3NSwxMjcuMTI1Yy0zLjkxNzQ4LDAgLTcuMDYyNSwzLjE0NTAyIC03LjA2MjUsNy4wNjI1YzAsMy45MTc0OCAzLjE0NTAyLDcuMDYyNSA3LjA2MjUsNy4wNjI1YzMuOTE3NDgsMCA3LjA2MjUsLTMuMTQ1MDIgNy4wNjI1LC03LjA2MjVjMCwtMy45MTc0OCAtMy4xNDUwMiwtNy4wNjI1IC03LjA2MjUsLTcuMDYyNXpNMTYyLjQzNzUsMTI3LjEyNWMtMy45MTc0OCwwIC03LjA2MjUsMy4xNDUwMiAtNy4wNjI1LDcuMDYyNWMwLDMuOTE3NDggMy4xNDUwMiw3LjA2MjUgNy4wNjI1LDcuMDYyNWMzLjkxNzQ4LDAgNy4wNjI1LC0zLjE0NTAyIDcuMDYyNSwtNy4wNjI1YzAsLTMuOTE3NDggLTMuMTQ1MDIsLTcuMDYyNSAtNy4wNjI1LC03LjA2MjV6TTQ5LjQzNzUsMTU1LjM3NWMtMy45MTc0OCwwIC03LjA2MjUsMy4xNDUwMiAtNy4wNjI1LDcuMDYyNWMwLDMuOTE3NDggMy4xNDUwMiw3LjA2MjUgNy4wNjI1LDcuMDYyNWMzLjkxNzQ4LDAgNy4wNjI1LC0zLjE0NTAyIDcuMDYyNSwtNy4wNjI1YzAsLTMuOTE3NDggLTMuMTQ1MDIsLTcuMDYyNSAtNy4wNjI1LC03LjA2MjV6TTE2Mi40Mzc1LDE1NS4zNzVjLTMuOTE3NDgsMCAtNy4wNjI1LDMuMTQ1MDIgLTcuMDYyNSw3LjA2MjVjMCwzLjkxNzQ4IDMuMTQ1MDIsNy4wNjI1IDcuMDYyNSw3LjA2MjVjMy45MTc0OCwwIDcuMDYyNSwtMy4xNDUwMiA3LjA2MjUsLTcuMDYyNWMwLC0zLjkxNzQ4IC0zLjE0NTAyLC03LjA2MjUgLTcuMDYyNSwtNy4wNjI1ek0xOTcuNzUsMTgzLjYyNWwtMTgzLjYyNSwwLjI3NTg4djE0LjEyNWwxODMuNjI1LC0wLjI3NTg4eiI+PC9wYXRoPjwvZz48L2c+PC9zdmc+" alt="icon" width="26" height="22">
                                    <p>
                                        {{ __('messages.Settings') }}


                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url('/settings')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                {{ __('messages.systemconfiguration') }}

                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/payments')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                {{ __('messages.paymentmethods') }}

                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/stock/create')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                {{ __('messages.Addstore') }}
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('units')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                {{ __('messages.Units') }}


                                            </p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{url('vat')}}" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                الضريبة
                                            </p>
                                        </a>
                                    </li>

                                </ul>
                            </li>




                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <img data-v-0288d978="" src="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAyMjYgMjI2Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9Im5vbnplcm8iIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2UtbGluZWNhcD0iYnV0dCIgc3Ryb2tlLWxpbmVqb2luPSJtaXRlciIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBzdHJva2UtZGFzaGFycmF5PSIiIHN0cm9rZS1kYXNob2Zmc2V0PSIwIiBmb250LWZhbWlseT0ibm9uZSIgZm9udC13ZWlnaHQ9Im5vbmUiIGZvbnQtc2l6ZT0ibm9uZSIgdGV4dC1hbmNob3I9Im5vbmUiIHN0eWxlPSJtaXgtYmxlbmQtbW9kZTogbm9ybWFsIj48cGF0aCBkPSJNMCwyMjZ2LTIyNmgyMjZ2MjI2eiIgZmlsbD0ibm9uZSI+PC9wYXRoPjxnIGZpbGw9IiNjY2NjY2MiPjxwYXRoIGQ9Ik00OS40Mzc1LDI4LjI1Yy0xMS42NDIwOSwwIC0yMS4xODc1LDkuNTQ1NDEgLTIxLjE4NzUsMjEuMTg3NXYxMTNjMCwxMS42NDIwOSA5LjU0NTQxLDIxLjE4NzUgMjEuMTg3NSwyMS4xODc1aDEyNy4xMjVjMTEuNjQyMDksMCAyMS4xODc1LC05LjU0NTQxIDIxLjE4NzUsLTIxLjE4NzV2LTExM2MwLC0xMS42NDIwOSAtOS41NDU0MSwtMjEuMTg3NSAtMjEuMTg3NSwtMjEuMTg3NXpNNDkuNDM3NSw0Mi4zNzVoMTI3LjEyNWMzLjk3MjY2LDAgNy4wNjI1LDMuMDg5ODQgNy4wNjI1LDcuMDYyNXYxMTNjMCwzLjk3MjY2IC0zLjA4OTg0LDcuMDYyNSAtNy4wNjI1LDcuMDYyNWgtMTI3LjEyNWMtMy45NzI2NiwwIC03LjA2MjUsLTMuMDg5ODQgLTcuMDYyNSwtNy4wNjI1di0xMTNjMCwtMy45NzI2NiAzLjA4OTg0LC03LjA2MjUgNy4wNjI1LC03LjA2MjV6TTYzLjU2MjUsNTYuNWMtMy45MTc0OCwwIC03LjA2MjUsMy4xNDUwMiAtNy4wNjI1LDcuMDYyNXY1Ni41YzAsMy45MTc0OCAzLjE0NTAyLDcuMDYyNSA3LjA2MjUsNy4wNjI1aDk4Ljg3NWMzLjkxNzQ4LDAgNy4wNjI1LC0zLjE0NTAyIDcuMDYyNSwtNy4wNjI1di01Ni41YzAsLTMuOTE3NDggLTMuMTQ1MDIsLTcuMDYyNSAtNy4wNjI1LC03LjA2MjV6TTcwLjYyNSw3MC42MjVoNTYuNXYxNC4xMjVoLTU2LjV6TTE0MS4yNSw3MC42MjVoMTQuMTI1djE0LjEyNWgtMTQuMTI1ek03MC42MjUsOTguODc1aDU2LjV2MTQuMTI1aC01Ni41ek0xNDEuMjUsOTguODc1aDE0LjEyNXYxNC4xMjVoLTE0LjEyNXpNMTEzLDE0MS4yNXYxNC4xMjVoNTYuNXYtMTQuMTI1eiI+PC9wYXRoPjwvZz48L2c+PC9zdmc+" alt="icon" width="26" height="22">
                                    <p>
                                        {{ __('messages.language') }}


                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="lang/ar" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                {{ __('messages.Arabic') }}


                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="lang/en" class="nav-link">
                                            <i class="fa fa-circle nav-icon"></i>
                                            <p>
                                                {{ __('messages.Einglish') }}

                                                                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>





                            <li class="nav-header">  {{ __('messages.Other') }}   </li>
                            <li class="nav-item">
                                <a href="{{url('logout')}}" class="nav-link">
                                    <i class="nav-icon fa fa-sign-out "></i>
                                    <p>
                                        خروج
                                    </p>
                                </a>
                            </li>

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <!-- <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">الرئسيه</a></li>
                                <li class="breadcrumb-item active">التصنيفات</li>

                            </ol>
                        </div> -->
                        <!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- Main Sidebar Container -->

        <!-- /.content-wrapper -->
        <footer class="main-footer text-center">
            <!-- <strong>panda180 &copy; 2020 احمد حمد يوسف</a>.</strong> -->
        </footer>

        <!-- Control Sidebar -->
        <!-- <aside class="control-sidebar control-sidebar-dark">
            Control sidebar content goes here
        </aside>
       <aside class="control-sidebar control-sidebar-dark" style="top: 57px;">
             Control sidebar content goes here
            <div class="p-3">
                <h5> الاقسام</h5>

            </div>
    </div>
    </aside>-->
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{asset('plugins/morris/morris.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('plugins/knob/jquery.knob.js')}}"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker -->
    <script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('/')}}dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="{{asset('dist/js/pages/dashboard.js')}}"></script> -->
    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('/ks/app.js')}}"></script>

@if(!isset($purchase))
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src=" https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js "></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js" ></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>



    <script>
        $(document).ready(function() {

            // $('#DataTable').DataTable({
            //     dom: 'Bfrtip',
            //     buttons: [
            //         'copy', 'csv', 'excel', 'pdf', 'print'
            //     ]
            // });

            $('#DataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        "extend": 'excel',
                        "text": ' اكسيل',
                        'className': 'btn btn-success fa fa-plus'
                    },
                    {
                        "extend": 'print',
                        "text": ' طباعه',
                        'className': 'btn btn-warning  fa fa-print'
                    },
                    {
                        "extend": 'copy',
                        "text": ' نسخ',
                        'className': 'btn btn-info fa fa-copy'
                    }
                ],
                initComplete: function() {
                    var btns = $('.dt-button');
                    btns.removeClass('dt-button');
                },
            });



        });
    </script>
    <script>
        $(document).ready(function() {
            $('select').selectize({
                sortField: 'text'
            });
        });
    </script>

@endif
    <!-- AdminLTE for demo purposes -->
    <!-- <scrip src="{{asset('dist/js/demo.js?v=1')}}"></scrip> -->

    <script>
        function printDiv() {

            var divToPrint = document.getElementById('DivIdToPrint');

            var newWin = window.open('', 'Print-Window');

            newWin.document.open();

            newWin.document.write(`<html>
            <style>
            .col {
    flex-basis: 0;
    flex-grow: 1;
    max-width: 100%;
}
            .text-center {
    text-align: center !important;
}
.row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -7.5px;
    margin-left: -7.5px;
}
        table{border: 1px solid; width: 100%;}
        table , tr , th , td{border: 1px solid;}
    </style>

             <link rel="stylesheet" href="dist/css/bootstrap-rtl.min.css">
             <body onload="window.print()">` + divToPrint.innerHTML + `</body></html>`);

            // newWin.document.close();

            // setTimeout(function(){newWin.close();},10);

        }
    </script>


    <script src="{{asset('js/app.js')}}"></script>

</body>

</html>
