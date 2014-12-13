@extends('layouts.all')

@section('content')

<div class="row">
    <div class="col-md-12">
        <!--Top header start-->
        <h3 class="ls-top-header">Organizational Chart</h3>
        <!--Top header end -->

        <!--Top breadcrumb start -->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li class="active">Organizational Chart</li>
        </ol>
        <!--Top breadcrumb start -->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h2>Organizational Chart</h2>
        

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac tristique sem, sit amet tincidunt erat. Donec tincidunt eu nunc in gravida. Sed orci ante, placerat eget eros nec, eleifend feugiat orci. In convallis eros eget sem interdum, sed fermentum mauris pretium. Aliquam nisi mauris, feugiat et dui in, consectetur eleifend est. Quisque dui arcu, euismod vel tortor eget, facilisis consectetur justo. Aenean eget consequat nisl. Nulla at enim nibh.
        </p>
        <p>Fusce sollicitudin rutrum mattis. Quisque hendrerit massa metus, vel rhoncus sem elementum ac. Duis eu tortor vitae tortor ornare rhoncus. Donec scelerisque sodales diam, sed tristique mi fermentum id. Fusce hendrerit tortor tortor, eget molestie sapien scelerisque in. Nullam nec est pulvinar tellus volutpat varius. Nunc feugiat tortor vel justo aliquam fermentum.
        </p>
        <p>Mauris euismod sollicitudin tincidunt. Vestibulum sagittis imperdiet leo et pellentesque. Quisque at augue vel nisi commodo maximus. In hac habitasse platea dictumst. Curabitur felis lorem, dignissim quis elit nec, fermentum faucibus quam. Nam posuere in libero at commodo. Integer fringilla elementum libero. Etiam eget orci vehicula, condimentum massa non, rhoncus augue. Mauris a tortor dolor. Phasellus diam nibh, ultrices vel eleifend eu, luctus vel diam. Sed finibus tincidunt ullamcorper. Fusce at leo non turpis rutrum feugiat sit amet sit amet mi. Vivamus ut elit nisi.
        </p>
        <p>Vestibulum fringilla erat orci, eleifend convallis ipsum cursus vitae. Nulla facilisi. Etiam sit amet ante auctor turpis scelerisque tincidunt. In hac habitasse platea dictumst. Morbi euismod semper quam, at sagittis purus auctor ac. Praesent dictum nibh non placerat pulvinar. Integer commodo dolor nibh, vitae commodo ex mollis et. In varius tortor sagittis nibh rutrum, non rhoncus lacus tempor. Vestibulum sed urna sit amet libero imperdiet volutpat. Suspendisse faucibus massa ac blandit viverra. Etiam ante lacus, vulputate et placerat non, ullamcorper ut est. Sed consectetur tortor non metus fringilla dictum.
        </p>
        <p>Nam eget sapien pretium, cursus libero mollis, vestibulum metus. Praesent est dui, iaculis dignissim blandit feugiat, dictum id enim. Maecenas lobortis euismod leo, ac scelerisque quam malesuada ut. Duis ut felis felis. Donec efficitur, sapien vel gravida volutpat, orci ante maximus nisl, ac aliquet dui urna hendrerit est. Praesent laoreet hendrerit varius. In euismod ut massa lobortis posuere. Phasellus ullamcorper ullamcorper libero a sollicitudin. 
        </p>
    </div>

    
</div>


@stop


@section('head')

<title>Amaha Electricals - Documentation</title>

<!--Page loading plugin Start -->
<link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/pace.css') }}">
<script src="{{ URL::asset('assets/js/pace.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/common.js') }}"></script>
<!--Page loading plugin End   -->

<!-- Plugin Css Put Here -->
<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/bootstrap-progressbar-3.1.1.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/jquery-jvectormap.css') }}">

<!--AmaranJS Css Start-->
<link href="{{ URL::asset('assets/css/plugins/amaranjs/jquery.amaran.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/plugins/amaranjs/theme/all-themes.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/plugins/amaranjs/theme/awesome.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/plugins/amaranjs/theme/default.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/plugins/amaranjs/theme/blur.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/plugins/amaranjs/theme/user.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/plugins/amaranjs/theme/rounded.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/plugins/amaranjs/theme/readmore.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/plugins/amaranjs/theme/metro.css') }}" rel="stylesheet">
<!--AmaranJS Css End -->

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

@stop
