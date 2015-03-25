<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Viewport metatags -->
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- iOS webapp metatags -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <!-- iOS webapp icons -->
    <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('assets/images/ios/fickle-logo-72.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('assets/images/ios/fickle-logo-72.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('assets/images/ios/fickle-logo-114.png') }}" />

    <!-- TODO: Add a favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/ico/fab.ico') }}">

    <title>Amaha Electrical - Login</title>

    <!--Page loading plugin Start -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/pace.css') }}">
    <script src="{{ URL::asset('assets/js/pace.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/common.js') }}"></script>
    <!--Page loading plugin End   -->

    <!-- Plugin Css Put Here -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/bootstrap-switch.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/ladda-themeless.min.css') }}">

    <link href="{{ URL::asset('assets/css/plugins/humane_themes/bigbox.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/plugins/humane_themes/libnotify.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/plugins/humane_themes/jackedup.css') }}" rel="stylesheet">

    <!-- Plugin Css End -->
    <!-- Custom styles Style -->
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- Custom styles Style End-->

    <!-- Responsive Style For-->
    <link href="{{ URL::asset('assets/css/responsive.css') }}" rel="stylesheet">
    <!-- Responsive Style For-->

    <!-- Custom styles for this template -->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">

        var ae = window.ae || {};
        ae.baseUrl = '{{ URL::to('/') }}/';
        
    </script>
</head>

@yield('content');
    

<script src="{{ URL::asset('assets/js/lib/jquery-2.1.1.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/lib/jquery.easing.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap-switch.min.js') }}"></script>
<!--Script for notification start-->
<script src="{{ URL::asset('assets/js/loader/spin.js') }}"></script>
<script src="{{ URL::asset('assets/js/loader/ladda.js') }}"></script>
<script src="{{ URL::asset('assets/js/humane.min.js') }}"></script>
<!--Script for notification end-->

<script src="{{ URL::asset('assets/js/pages/login.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.validation.js') }}"></script>
</html>
