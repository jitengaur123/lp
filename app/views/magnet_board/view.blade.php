@extends('layouts.all') 
<?php $prefix = Config::get('constants.PREFIX') ?>
@section('content')

<div class="row">
    <div class="col-md-12">
        <h3 class="ls-top-header">View Worksite</h3>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to($prefix.'/dashboard') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ URL::to($prefix.'/worksite') }}">Worksite</a></li>
        </ol>
    </div>
</div>
<?php $worksite = $worksite[0]; ?>
<div class="row">
    <div class="col-md-12">

        <p>You can view your worksite in this section, please use the edit/update button to update the worksite details, we prefer the users to please keep their profile updated in order to have the most accurate client in our clientbases & help the management to keep the records up to date. Thank you.</p><br/>
        <div class="col-md-4 details_left">
            <h2>{{ $worksite['job_name'] }}</h2>
            <p>Started at : {{ date('d/m/Y', strtotime($worksite['started_at'])) }}</p>
            <h3>Address</h3>
            <address>
                <i class="fa fa-map-marker"></i>
                {{ $worksite['address'] }}, {{ $worksite['city'] }}<br>
                {{ $worksite['state'] }}, {{ $worksite['country'] }} {{ $worksite['postal_code'] }} <br>               
            </address>

            <p>Worksite Created On : <?php echo date('d/m/Y', strtotime($worksite['created_at'])); ?></p>
            <a href="{{ URL::to($prefix.'/worksite/'.$worksite['id'].'/edit') }}" class="btn btn-sm ls-red-btn js_update">Update/Edit Worksite</a>

        </div>
        <div class="col-md-5 ls-user-details">
            <h2>Client: {{ $worksite['client']['company_name'] }} </h2>
            <p>Description: {{ $worksite['description'] }}</p>
            <p>OCIP : {{ $worksite['ocip'] }}</p>
            <p>PM : {{ $worksite['pm'] }}</p>
            <p>Billing Type : {{ $worksite['billing_type'] }}</p>
            <p>CERT PR : {{ $worksite['cret_pr'] }}</p>
          
           
            <div class="ls-user-links">
            
            </div>

        </div>
        
    </div>
</div>
@stop


@section('head')

<title>Amaha - View Worksite</title>
<!--Page loading plugin Start -->
    <link href="{{ URL::asset('assets/css/plugins/pace.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('assets/js/pace.min.js') }}"></script><!--Page loading plugin End   -->
    <!-- Plugin Css Put Here -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/plugins/fileinput.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/plugins/icheck/skins/all.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/plugins/jquery.datetimepicker.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/selectize.bootstrap3.css') }}">
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
    <script src="{{ URL::asset('assets/js/color.js') }}" type="text/javascript"></script> 
    <script src="{{ URL::asset('assets/js/lib/jquery-1.11.min.js') }}" type="text/javascript"></script> 
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script> 
    <script src="{{ URL::asset('assets/js/multipleAccordion.js') }}" type="text/javascript"></script>

    <script src="{{ URL::asset('assets/js/lib/jqueryui.js') }}"></script>
    <!--easing Library Script Start -->


     <script src="{{ URL::asset('assets/js/lib/jquery.easing.js') }}"></script> <!--easing Library Script End -->
     <!--Nano Scroll Script Start -->
     <script src="{{ URL::asset('assets/js/jquery.nanoscroller.min.js') }}"></script> <!--Nano Scroll Script End -->
     <!--switchery Script Start -->
     <script src="{{ URL::asset('assets/js/switchery.min.js') }}"></script> <!--switchery Script End -->
     <!--bootstrap switch Button Script Start-->
     <script src="{{ URL::asset('assets/js/bootstrap-switch.js') }}"></script> <!--bootstrap switch Button Script End-->
     <!--easypie Library Script Start -->
     <script src="{{ URL::asset('assets/js/jquery.easypiechart.min.js') }}"></script> <!--easypie Library Script Start -->
     <!--bootstrap-progressbar Library script Start-->
     <script src="{{ URL::asset('assets/js/bootstrap-progressbar.min.js') }}"></script> <!--bootstrap-progressbar Library script End-->
     <script src="{{ URL::asset('assets/js/pages/layout.js') }}" type="text/javascript"></script> <!--Layout Script End -->
     <!--Upload button Script Start-->

     <!--selectize Library start-->
     <script src="{{ URL::asset('assets/js/selectize.min.js') }}"></script>
     <!--selectize Library End-->

     <!--Select & Tag demo start-->
     <script src="{{ URL::asset('assets/js/pages/selectTag.js') }}"></script>
     <!--Select & Tag demo end-->

     <script src="{{ URL::asset('assets/js/fileinput.min.js') }}"></script> <!--Upload button Script End-->
     <!--Auto resize  text area Script Start-->
     <script src="{{ URL::asset('assets/js/jquery.autosize.js') }}"></script> <!--Auto resize  text area Script Start-->
     <script src="{{ URL::asset('assets/js/pages/sampleForm.js') }}"></script> <!-- Script For Icheck -->
     <script src="{{ URL::asset('assets/js/icheck.min.js') }}"></script> <!-- Script For Icheck -->
     <!--Advance Radio and checkbox demo start-->
     <script src="{{ URL::asset('assets/js/pages/checkboxRadio.js') }}"></script> <!--Advance Radio and checkbox demo start-->
     <!-- Date & Time Picker Library Script Start -->
     <script src="{{ URL::asset('assets/js/jquery.datetimepicker.js') }}"></script> <!-- Date & Time Picker Library Script End -->
     <!--Demo for Date, Time Color Picker Script Start -->
     <script src="{{ URL::asset('assets/js/pages/pickerTool.js') }}"></script> <!--Demo for Date, Time Color Picker Script End -->
@stop