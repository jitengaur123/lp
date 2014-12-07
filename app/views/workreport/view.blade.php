@extends('layouts.all') 
<?php $prefix = Config::get('constants.PREFIX') ?>
@section('content')

<div class="row">
    <div class="col-md-12">
        <h3 class="ls-top-header">View Work Report</h3>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to($prefix.'/dashboard') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ URL::to($prefix.'/workreport') }}">workreport</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
      <h2>Client : {{ $report['client']['company_name'] }}</h2>
      <h3>Worksite : {{ $report['worksite']['job_name'] }}</h3>
      <div class="col-md-6 details_right">
        <p>Job No.: {{ $report['job_number'] }}</p>
        <p>Submitted By: {{ $report['submitby']['user_name'] }}</p>
        <p>Status : @if($report['status'] ==0)Pending @else Approved @endif</p>
        <p>Total Amount : ${{ $total }}</p>
        
      </div>

      <div class="col-md-6 details_left">
        <p>Submitted On: {{ date('d/m/Y', strtotime($report['date_create'])) }}</p>
        <h2>Site Address</h2>
        <address>
        {{ $report['worksite']['address'] }}, {{ $report['worksite']['city'] }}<br>
        {{ $report['worksite']['state'] }}, {{ $report['worksite']['country'] }} {{ $report['worksite']['postal_code'] }} 
        </address>
      </div>
    </div>
  </div>

  <div class="row">
    @foreach($report['timesheet'] as  $timesheet)
    <table class="table table-bordered table-striped table-bottomless">
                    <thead>
                      <tr>
                        <th class="id_emp">Labor</th>
                        <th>Class</th>
                        <th>Reg Hours</th>
                        <th>Reg Rate</th>
                        <th>Amount</th>
                        
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>{{$timesheet['labor']['user_name']}}</td>
                        <td>{{$timesheet['class']}}</td>
                        <td>{{$timesheet['reg_hour']}}</td>
                        <td>{{$timesheet['reg_rate']}}</td>
                        <td>{{ $timesheet['reg_hour']*$timesheet['reg_rate'] }}</td>
                        
                      </tr>
                      <tr>
                        <th class="id_emp"></th>
                        <th></th>
                        <th>OT Hours</th>
                        <th>OT Rate</th>
                        <th>Amount</th>
                        
                      </tr>
                    
                    
                      <tr>
                        <td></td>
                        <td></td>
                        <td>{{$timesheet['ot_hour']}}</td>
                        <td>{{$timesheet['ot_rate']}}</td>
                        <td>{{$timesheet['ot_hour']*$timesheet['ot_rate'] }}</td>
                        
                      </tr>

                      <tr>
                        <th class="id_emp"></th>
                        <th></th>
                        <th>DT Hours</th>
                        <th>DT Rate</th>
                        <th>Amount</th>
                        
                      </tr>
                    
                    
                      <tr>
                        <td></td>
                        <td></td>
                      <td>{{$timesheet['dt_hour']}}</td>
                        <td>{{$timesheet['dt_rate']}}</td>
                        <td>{{$timesheet['dt_hour']*$timesheet['dt_rate'] }}</td>
                        
                      </tr>

                    </tbody>
    </table>
    @endforeach
    <a class="ls-light-green-btn btn" href="{{ URL::to($prefix.'/workreport/'.$report['id'].'/edit') }}">Edit This Report</a>
    @if(Auth::user()->role == 1 || Auth::user()->role == 2)
    <a class=" ls-blue-btn btn" href="{{ URL::to($prefix.'/workreport/approve/'.$report['id']) }}">Mark As Approved</a>
    @endif
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