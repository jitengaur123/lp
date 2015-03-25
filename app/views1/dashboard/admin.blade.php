@extends('layouts.all')

@section('content')

<div class="row">
    <div class="col-md-12">
        <!--Top header start-->
        <h3 class="ls-top-header">Admin Dashboard</h3>
        <!--Top header end -->

        <!--Top breadcrumb start -->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li class="active">Admin Dashboard</li>
        </ol>
        <!--Top breadcrumb start -->
    </div>
</div>
<div class="row">
    <div class="col-md-9">
        <h2>Welcome To Admin Dashboard</h2>
        <p>Hello Admin ! Welcome to dashboard of Amaha Electricals here you can manage the users and their specific roles, you will be able to create different work locations and assign the users to different work locations on a day to day basis. You can push content to your employees/users privately everyday & attach files that can be downloaded by your employees/users.</p>
        <p>Explore more by making use of the left side options panel that you have & refer to the 
            <a href="#">documentation</a> tab if you get stuck on how to do things.</p>
        <div class="row home-row-top">
            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3">
                <div class="pie-widget">
                    <div id="pie-widget-1" class="chart-pie-widget" data-percent="73">
                        <span class="pie-widget-count-1 pie-widget-count"></span>
                    </div>
                    <p>
                        New Users
                    </p>
                    <h5> 240 </h5>

                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3">
                <div class="pie-widget">
                    <div id="pie-widget-2" class="chart-pie-widget" data-percent="93">
                        <span class="pie-widget-count-2 pie-widget-count"></span>
                    </div>
                    <p>
                        Total Users
                    </p>
                    <h5> 1240 </h5>

                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3">
                <div class="pie-widget">
                    <div id="pie-widget-3" class="chart-pie-widget" data-percent="23">
                        <span class="pie-widget-count-3 pie-widget-count"></span>
                    </div>
                    <p>
                        Total WorkSites
                    </p>
                    <h5> 20 </h5>

                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3">
                <div class="pie-widget">
                    <div id="pie-widget-4" class="chart-pie-widget" data-percent="33">
                        <span class="pie-widget-count-4 pie-widget-count"></span>
                    </div>
                    <p>
                        Total Supervisors
                    </p>
                    <h5> 40 </h5>

                </div>
            </div>
        </div>

    </div>

    <div class="col-md-3">
        <div class="current-status-widget">
            <ul>
                <li>
                    <div class="status-box">
                        <div class="status-box-icon label-light-green white">
                            <i class="fa fa-file"></i>
                        </div>
                    </div>
                    <div class="status-box-content">
                        <h5 id="sale-view">2129</h5>
                        <p class="lightGreen"><i class="fa fa-arrow-up lightGreen"></i>Published Content</p>
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="status-box">
                        <div class="status-box-icon label-red white">
                            <i class="fa fa-paperclip"></i>
                        </div>
                    </div>
                    <div class="status-box-content">
                        <h5 id="download-show">5340</h5>
                        <p class="light-blue"><i class="fa fa-arrow-down light-blue"></i> Total attachments</p>
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="status-box">
                        <div class="status-box-icon label-lightBlue white">
                            <i class="fa fa-building"></i>
                        </div>
                    </div>
                    <div class="status-box-content">
                        <h5 id="deliver-show">10490</h5>
                        <p class="light-blue"><i class="fa fa-arrow-up light-blue"></i> Total Worksites</p>
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="status-box">
                        <div class="status-box-icon label-light-green white">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                    <div class="status-box-content">
                        <h5 id="user-show">132129</h5>
                        <p class="lightGreen"><i class="fa fa-arrow-up lightGreen"></i> Total users</p>
                    </div>
                    <div class="clearfix"></div>
                </li>
                 <li>
                    <div class="status-box">
                        <div class="status-box-icon label-lightBlue white">
                            <i class="fa fa-eye-slash"></i>
                        </div>
                    </div>
                    <div class="status-box-content">
                        <h5 id="deliver-show">10490</h5>
                        <p class="light-blue"><i class="fa fa-arrow-up light-blue"></i> Hidden Content</p>
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="status-box">
                        <div class="status-box-icon label-success white">
                            <i class="fa fa-cloud-upload"></i>
                        </div>
                    </div>
                    <div class="status-box-content">
                        <h5 id="product-up">29</h5>
                        <p class="text-success"><i class="fa fa-arrow-up text-success"></i> Uploaded Documents</p>
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="status-box">
                        <div class="status-box-icon label-light-green white">
                            <i class="fa fa-envelope"></i>
                        </div>
                    </div>
                    <div class="status-box-content">
                        <h5 id="income-show">10299 </h5>
                        <p class="lightGreen"><i class="fa fa-arrow-up lightGreen"></i> Total Enquiries</p>
                    </div>
                    <div class="clearfix"></div>
                </li>
            </ul>
        </div>
    </div>
</div>






<div class="row home-row-top">
    <div class="col-md-4 col-sm-6">
        <div class="contact_block white">
        <H2>CONTACT & LOCATION</H2>
        <p><strong>Amaha Electrical Inc.</strong><br/>Cohoes, New York<br/>1217 Loudon Road, Cohoes, New York 12047<br>Telephone (518) 782 7400<br>Fax (518) 782 0617<br>Email Support : <a href="#">Support@amahaelectricals.com</a><br/>Email Sales : <a href="#">Sales@amahaelectricals.com</a><br/>Email Safety : <a href="#">Safety@amahaelectricals.com</a></p>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="skyWeather label-light-green white">
            <div class="current-weather">
                <div class="current-weather-icon">
                    <canvas id="rain" width="128" height="128">
                    </canvas>
                </div>
                <div class="current-weather-details">
                    <h2>20°c</h2>
                    <span>Heavy Rain</span>
                    <p>24°c / 12°c</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="feature-weather">
                <ul>
                    <li>
                        <a href="javascript:void(0)">
                            <canvas id="clear-day" width="32" height="32">
                            </canvas>
                            <span>Sat</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <canvas id="clear-night" width="32" height="32">
                            </canvas>
                            <span>Sun</span>
                        </a>

                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <canvas id="partly-cloudy-day" width="32" height="32">
                            </canvas>
                            <span>Mon</span>
                        </a>

                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <canvas id="cloudy" width="32" height="32">
                            </canvas>
                            <span>Tue</span>
                        </a>

                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <canvas id="fog" width="32" height="32">
                            </canvas>
                            <span>Wed</span>
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-12">
        <div class="social-share-box">
            <div class="container-fluid">
                <div class="row">
                    <div class="ls-fb-share social-share col-md-6 col-sm-3 col-xs-6">
                        <i class="fa fa-facebook"></i>
                        
                    </div>
                    <div class="ls-tw-share social-share col-md-6 col-sm-3 col-xs-6">
                        <i class="fa fa-twitter"></i>
                        
                    </div>
                    <div class="ls-google-plus social-share col-md-6 col-sm-3 col-xs-6">
                        <i class="fa fa-google-plus"></i>
                        
                    </div>
                    <div class="ls-dribble-plus social-share col-md-6 col-sm-3 col-xs-6">
                        <i class="fa fa-youtube"></i>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop


@section('head')

<title>Amaha Electricals - Dashboard</title>

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



@section('footerjs')


<!--easypie Library Script Start -->
<script src="{{ URL::asset('assets/js/jquery.easypiechart.min.js') }}"></script>
<!--easypie Library Script Start -->

<!--bootstrap-progressbar Library script Start-->
<script src="{{ URL::asset('assets/js/bootstrap-progressbar.min.js') }}"></script>
<!--bootstrap-progressbar Library script End-->

<!--FLoat library Script Start -->
<script type="text/javascript" src="{{ URL::asset('assets/js/chart/flot/jquery.flot.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/chart/flot/jquery.flot.pie.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/chart/flot/jquery.flot.resize.js') }}"></script>
<!--FLoat library Script End -->



<script src="{{ URL::asset('assets/js/countUp.min.js') }}"></script>

<!-- skycons script start -->
<script src="{{ URL::asset('assets/js/skycons.js') }}"></script>
<!-- skycons script end   -->

<!--Vector map library start-->
<script src="{{ URL::asset('assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!--Vector map library end-->

<!--AmaranJS library script Start -->
<script src="{{ URL::asset('assets/js/jquery.amaran.js') }}"></script>
<!--AmaranJS library script End   -->
<script src="{{ URL::asset('assets/js/pages/dashboard.js') }}"></script>
@stop