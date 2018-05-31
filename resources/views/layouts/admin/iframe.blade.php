<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} | Blank Page</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('resources/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('resources/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('resources/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('resources/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('resources/css/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('resources/css/style-responsive.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('resources/css/theme/default.css') }}" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('resources/plugins/pace/pace.min.js') }}"></script>
    @section('page-css-plugins')@show
    <!-- ================== END BASE JS ================== -->
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader">
    <div class="material-loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
        <div class="message">Loading...</div>
    </div>
</div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-with-wide-sidebar" style="padding-top: 50px">

    <!-- begin #content -->
    @yield('content')
    <!-- end #content -->

    <!-- begin #footer -->
    <div id="footer" class="footer">
        &copy; 2018 {{ config('app.name') }}
    </div>
    <!-- end #footer -->

    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ asset('resources/plugins/jquery/jquery-1.9.1.min.js') }}"></script>
<script src="{{ asset('resources/plugins/jquery/jquery-migrate-1.1.0.min.js') }}"></script>
<script src="{{ asset('resources/plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}"></script>
<script src="{{ asset('resources/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!--[if lt IE 9]>
<script src="{{ asset('resources/crossbrowserjs/html5shiv.js') }}"></script>
<script src="{{ asset('resources/crossbrowserjs/respond.min.js') }}"></script>
<script src="{{ asset('resources/crossbrowserjs/excanvas.min.js') }}"></script>
<![endif]-->
<script src="{{ asset('resources/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('resources/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{ asset('resources/js/apps.min.js') }}"></script>
@section('page-js-plugins')@show
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
@section('page-js')@show

</body>
</html>
