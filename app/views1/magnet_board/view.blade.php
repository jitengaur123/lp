@extends('layouts.all') 
<?php $prefix = Config::get('constants.PREFIX') ?>
@section('content')

<div class="row">
    <div class="col-md-12">
        <h3 class="ls-top-header">View Magnet Board</h3>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to($prefix.'/dashboard') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ URL::to($prefix.'/magnet') }}">Magnet Board</a></li>
        </ol>
    </div>
</div>
<?php $Magnetboard = $Magnetboard[0]; ?>
<div class="row">
    <div class="col-md-12">

        <p>You can view your magnet in this section, please use the edit/update button to update the magnet details, we prefer the users to please keep their profile updated in order to have the most accurate client in our clientbases & help the management to keep the records up to date. Thank you.</p><br/>
        <div class="col-md-4 details_left">
            <p>Date : {{ date('d/m/Y', strtotime($Magnetboard['started_at'])) }}</p>
            <h2>Client: {{ $Magnetboard['client']['company_name'] }} </h2>
            <p>Work Site: {{ $Magnetboard['worksite']['job_name'] }}</p>
            <a href="{{ URL::to($prefix.'/magnet/'.$Magnetboard['id'].'/edit') }}" class="btn btn-sm ls-red-btn js_update">Update/Edit Magnet Board</a>

        </div>
        <div class="clear"></div>
         <div class="ls-editable-table table-responsive ls-table">

                  <table class="table table-bordered table-striped table-bottomless" id="ls-editable-table">
                    <thead>
                      <tr>
                        <th class="id_emp">Employee Id</th>
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>Job Title</th>
                        <th>Created On</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($MagnetboardUser as $user)
                      <tr>
                        <td>{{ $user['users']['user_auth_id'] }}</td>
                        <td>{{ $user['users']['user_name'] }}</td>
                        <td>{{ $user['users']['first_name'] }} {{ $user['users']['last_name'] }}</td>
                        <td>{{ $user['users']['userrole']['title'] }}</td>
                        <td>{{ date('d/m/y', strtotime($user['users']['created_at'])) }}</td>
                      
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
      
    </div>
</div>
@stop


@section('head')

<title>Amaha - View Magnet Board</title>
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
