@extends('layouts.all') 
<?php $prefix = Config::get('constants.PREFIX') ?>
@section('content')
<div class="row">
          <div class="col-md-12"> 
            <!--Top header start-->
            
            <h3 class="ls-top-header">Edit/Delete Client</h3>
            <!--Top header end --> 
            <!--Top breadcrumb start -->
            
            <ol class="breadcrumb">
              <li> <a class="fa fa-home" href="#"></a> </li>
              <li class="active">Edit Or Delete Client</li>
            </ol>
            <!--Top breadcrumb start --> 
          </div>
        </div>
        <!-- Main Content Element  Start-->
        
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default userform no-border">
              <div class="panel-heading">
                <h3 class="panel-title">Edit Or Delete Registered Client</h3>
              </div>
              <div class="panel-body">
                @include('notification')
              <form method="post" onsubmit="return confirm('Are you sure want to delete?');">
                <!--Select Box Start-->
                   <div class="row">
                    <div class="col-md-6">
                        <h3 class="ls-header">Select & search from registered client</h3>
                        <p>You can search and select from available clients on this application and perform the actions of editing or deleting their profile</p>
                            <div class="control-group">
                                <select id="select-country" name="id" class="demo-default id" placeholder="Select a client...">
                                    <option value="">Select a client...</option>
                                    @foreach($clients as $client)
                                    <option value="{{ $client['id'] }}">{{ $client['company_name'] }}</option>
                                   @endforeach
                                </select>
                                <input type="hidden" class="editUrl" value="{{ URL::to($prefix . '/client/') }}" >
                                <span class="help_text">Select One Client</span>
                            </div>
                    </div>
                    <div class="col-md-6 padtop100">
                       <!--action buttons-->
                       <div class="col-md-3"><button type="button" class="btn ls-light-blue-btn editSelectedData">Edit Selected Client</button></a></div>
                       <div class="col-md-3"><button type="submit" class="btn btn-danger deleteSelected confirmBox marginl25">Delete Selected Client</button></div>
                       <!--action buttons end-->
                    </div>
                </div>
                </form> 

                <!--Seect Box Finish--> 
              </div>
            </div>
          </div>
        </div>

        
@stop

@section('head')

<title>Amaha - Edit/Delete Client</title>
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
     <script src="{{ URL::asset('assets/js/amaha.js') }}"></script> <!--Demo for Date, Time Color Picker Script End -->

@stop