<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} | Login Page</title>
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
    <!-- ================== END BASE JS ================== -->
</head>
<style>
    .parsley-errors-list{
        color: #F44336;
    }
</style>
<body class="pace-top">
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

<div class="login-cover">
    <div class="login-cover-image"><img src="{{ asset('resources/img/login-bg/bg-5.jpg') }}" data-id="login-cover-image" alt="" /></div>
    <div class="login-cover-bg"></div>
</div>
<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login login-v2" data-pageload-addclass="animated fadeIn">
        <!-- begin brand -->
        <div class="login-header">
            <div class="brand">
                <span class="logo"></span> {{ env('APP_NAME') }}
                <small>material design backend management system</small>
            </div>
            <div class="icon">
                <i class="material-icons">lock</i>
            </div>
        </div>
        <!-- end brand -->
        <div class="login-content">
            <form action="{{ route('admin.login.submit') }}" method="POST" class="margin-bottom-0" data-parsley-validate="true">
                {{ csrf_field() }}
                <div class="form-group m-b-20">
                    <input name="email" type="email" class="form-control input-lg" value="{{ old('email') }}" placeholder="Email Address" required/>
                    @if($errors->has('email'))<ul class="parsley-errors-list filled"><li>{{ $errors->first('email') }}</li></ul>@endif
                </div>
                <div class="form-group m-b-20">
                    <input name="password" type="password" class="form-control input-lg" placeholder="Password" minlength="6" maxlength="24" required/>
                    @if($errors->has('password'))<ul class="parsley-errors-list filled"><li>{{ $errors->first('password') }}</li></ul>@endif
                </div>
                <div class="checkbox m-b-20">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
                <div class="login-buttons">
                    <button type="submit" class="btn btn-info btn-block btn-lg">Sign me in</button>
                </div>
                <div class="m-t-20">
                    <a href="{{ route('admin.password.request') }}">Forgot Password</a>
                </div>
            </form>
        </div>
    </div>
    <!-- end login -->

    <ul class="login-bg-list">
        <li class="active"><a href="javascript:void (0)" data-click="change-bg"><img src="{{ asset('resources/img/login-bg/bg-5.jpg') }}" alt="" /></a></li>
        <li><a href="javascript:void (0)" data-click="change-bg"><img src="{{ asset('resources/img/login-bg/bg-6.jpg') }}" alt="" /></a></li>
    </ul>

    <!-- begin theme-panel -->
    <div class="theme-panel">
        <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
        <div class="theme-panel-content">
            <h5 class="m-t-0">Color Theme</h5>
            <ul class="theme-list clearfix">
                <li class="active"><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
            </ul>
            <div class="divider"></div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label double-line">Header Styling</div>
                <div class="col-md-7">
                    <select name="header-styling" class="form-control input-sm">
                        <option value="1">default</option>
                        <option value="2">inverse</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label">Header</div>
                <div class="col-md-7">
                    <select name="header-fixed" class="form-control input-sm">
                        <option value="1">fixed</option>
                        <option value="2">default</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label double-line">Sidebar Styling</div>
                <div class="col-md-7">
                    <select name="sidebar-styling" class="form-control input-sm">
                        <option value="1">default</option>
                        <option value="2">grid</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label">Sidebar</div>
                <div class="col-md-7">
                    <select name="sidebar-fixed" class="form-control input-sm">
                        <option value="1">fixed</option>
                        <option value="2">default</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
                <div class="col-md-7">
                    <select name="content-gradient" class="form-control input-sm">
                        <option value="1">disabled</option>
                        <option value="2">enabled</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-12">
                    <a href="#" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage"><i class="fa fa-refresh m-r-3"></i> Reset Local Storage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end theme-panel -->
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
<script src="{{ asset('resources/plugins/parsley/dist/parsley.min.js') }}"></script>
<script src="{{ asset('resources/js/login-v2.demo.min.js') }}"></script>
<script src="{{ asset('resources/js/apps.min.js') }}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        LoginV2.init();
    });
</script>
</body>
</html>
