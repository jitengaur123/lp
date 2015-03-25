@extends('layouts.all') 
<?php $prefix = Config::get('constants.PREFIX') ?>
@section('content')
<div class="row">
    <div class="col-md-12">
        <h3 class="ls-top-header">View Profile</h3>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to($prefix.'/dashboard') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ URL::to($prefix.'/profile') }}">View Profile</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p>You can view your profile in this section, please use the edit/update button to update the profile details, we prefer the users to please keep their profile updated in order to have the most accurate data in our databases & help the management to keep the records up to date. Thank you.</p><br/>
        <div class="col-md-3 userpic">
            <img src="{{URL::asset('assets/images/demo/avatar.png') }}">
            <a href="{{ URL::to($prefix.'/edituser/'.$data['id']) }}" class="btn btn-sm ls-red-btn js_update">Update/Edit Profile</a>
        </div>
        <div class="col-md-4 details_left">
            <h2>{{ $data['first_name'] }} {{ $data['last_name'] }}</h2>
            <?php 
                switch($data['level']){
                    case '1':
                    default: 
                        $title = 'President';
                        $userRole = 'Administrator';
                        break;
                    case '2':
                        $title = 'Vice-President';
                        $userRole = 'Project Manager';
                        break;
                    case '3':
                        $title = 'Foreman';
                        $userRole = 'Supervisor';
                        break;
                    case '4':
                        $title = 'Engineer';
                        $userRole = 'End User';
                        break;
                }
             ?>
            <p>Position/Job Title : {{ $title }}</p>
            <p>User Role : {{ $userRole }}</p>
            <p>Employee Id : {{ $data['user_auth_id'] }}</p>
            <h3>Address</h3>
            <address>
                <i class="fa fa-map-marker"></i>
                {{ $data['address'] }}, {{ $data['city'] }}<br>
                {{ $data['state'] }}, {{ $data['country'] }} {{ $data['postcode'] }} <br>               
            </address>
            <p><i class="fa fa-phone"></i> Phone (Home): {{ $data['phone_number'] }}</p>
            <p><i class="fa fa-mobile"></i> Phone (mobile): {{ $data['mobile_number'] }}</p>
            <p>Account Created On : <?php echo date('d/m/Y', strtotime($data['created_at'])); ?></p>
            <p>Emergency Contact Number : {{ $data['emergency_contact_number'] }}</p>
            <p>Date Of Birth : <?php if(isset($data['dob'])) echo date('m/d/Y', strtotime($data['dob'])); ?></p>
            <p>Name Of Spouse : {{ $data['spouse_name'] }}</p>


        </div>
        <div class="col-md-5 ls-user-details">
            <h2>Date Of Joining: <?php echo date('d/m/Y', strtotime($data['created_at'])); ?></h2>
            <p><a href="#">Supervisor : None</a></p>
            <p>About : {{ $data['about'] }} </p>
            <p><i class="fa fa-envelope"></i> Email: {{ $data['email'] }}</p>
            <p>Disabilities : <?php if(!empty($data['disability'])) implode(', ',json_decode($data['disability'], true)); else echo 'No, I do not have a disability'; ?></p>
            <p>Race : {{ $data['race'] }}</p>
            <p>Gender : {{ $data['gender'] }}</p>
            
            
            <?php if(!empty($data['veterun_status'])): ?>
                <p>Veteran Status : <?php  implode(', ', json_decode($data['veterun_status'], true)); ?></p>
            <?php endif; ?>
           
            <div class="ls-user-links">
            
            </div>

        </div>
        
    </div>
</div>
@stop


@section('head')

<title>Amaha - View Profile</title>
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