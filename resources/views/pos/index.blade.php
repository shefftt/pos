<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
    <title>{{ __('messages.Sales') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.min.css?v=1')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css?v=1">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css?v=1')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/iCheck/flat/blue.css?v=1')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('plugins/morris/morris.css?v=1')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css?v=1')}}">
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css?v=1')}}">

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
    <style>
        .img-icon{width: 20px; height: 20px;}
    </style>

</head>

<body>
    <div id="app" class="wrapper">

        <nav class="navbar align-top navbar-dark bg-dark justify-content-between">
            <a class="navbar-brand">
                <img src="{{url('/image/logo.png')}}" class="rounded" width="48" height="48" class="" alt="logo">
            </a>
            <div class="col-6 mr-auto ">
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" type="search" id="search" placeholder="البحث عن فاتوره">
                    </div>
                    <div class="form-group">
                        <button id="searchBtn" class="btn-info btn btn-info">{{ __('messages.Search') }}</button>
                    </div>
                </div>
            </div>

            <ul class="nav" id="navId">
                <li class="nav-item">

                    <a href="{{url('/')}}" class="nav-link"> <img src="{{url('/image/dashboard.png')}}" class="img-icon">   {{ __('messages.control Board') }}</a>
                </li>

                <div class="row mr-auto">
                    <li class="nav-item">
                        <a href="#tab5Id" class="nav-link"><img src="{{url('/image/user_male.png')}}" class="img-icon">   {{ __('messages.welcome') }}{{auth()->user()->name}}  </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('logout')}}" class="nav-link"><img src="{{url('/image/sign_out.png')}}" class="img-icon">  {{ __('messages.Exit') }} </a>
                    </li>
                </div>
            </ul>
        </nav>

        <pos />

    </div>

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
    <!-- Slimscroll -->
    <script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('/')}}dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        $("#search").on('keypress', function(e) {
            if (e.which == 13) {
                var id = $("#search").val();
                window.location = "/print/" + id

            }
        });
        $("#searchBtn").click(function() {
            var id = $("#search").val();
            window.location = "/print/" + id
        });
    </script>
</body>

</html>
