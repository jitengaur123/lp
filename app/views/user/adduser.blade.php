@extends('layouts.all') 

@section('content')
 <div class="row">
  <div class="col-md-12"> 
    <!--Top header start-->
    
    <h3 class="ls-top-header">Add Users</h3>
    <!--Top header end --> 
    <!--Top breadcrumb start -->
    
    <ol class="breadcrumb">
      <li> <a class="fa fa-home" href="#"></a> </li>
      <li class="active">Add Users</li>
    </ol>
    <!--Top breadcrumb start --> 
  </div>
</div>
<!-- Main Content Element  Start-->

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default userform no-border">
      <div class="panel-heading ">
        <h3 class="panel-title">Add New Users In This Section</h3>
      </div>
      <div class="panel-body">
        <p>You can add new users by entering the information in the fields below, the new users will have the ability to complete their profile by logging in and edit/update user profile section. New users will be sent the user details with the username and password that you will set below on their email address.</p>
        <p>The automated email will have the instructions for changing the password after logging in for the first time and completing their profile using the appropriate section.</p>
        @include('notification')
        <form class="ls_form" name="addUser" id="addUser" action="{{ url(Config::get('constants.PREFIX').'/adduser') }}" method="post">
          <!--user profile form ends here--> 
          <!--form section 1 starts here-->
          
          <div class="col-md-6 margint15">
            <div class="form-group">
              <label><i class="fa fa-quote-left"></i>First Name</label>
              <input class="form-control" placeholder="Enter users first name" name="first_name" type="text">
            </div>
            <div class="form-group">
              <label><i class="fa fa-quote-right"></i> Last Name</label>
              <input class="form-control" placeholder="Enter users last name" name="last_name" type="text">
            </div>
            <div class="form-group">
              <label><i class="fa fa-envelope-o"></i> Email address</label>
              <input class="form-control" placeholder="Enter email" name="email" type="email">
            </div>
            <div class="form-group">
              <label><i class="fa fa-user"></i> Username</label>
              <input class="form-control" placeholder="Username" name="user_name" type="username">
            </div>
          </div>
          <!--form section ends here--> 
          <!--form section 2 starts here-->
          
          <div class="col-md-6 margint15">

            <div class="form-group">
              <label><i class="fa fa-key"></i>Password</label>
              <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password">
            </div>

            <div class="form-group">
              <label><i class="fa fa-random"></i> Confirm Password</label>
              <input class="form-control" name="password_confirmation"  placeholder="Enter Password Again"  type="password">
            </div>

            <div class="form-group">
              <label><i class="fa fa-paper-plane"></i> Position/Job
                Title</label>
              <select class="form-control roleClass" name="role">

                @foreach($roles as $role)
                  @if($role['id'] != 5) 
                  <option value="{{$role['id']}}"> {{ $role['title'] }} </option>
                  @endif
                @endforeach
              </select>
            </div>

            <div class="form-group" style="display:none;">
              <label><i class="fa fa-sitemap"></i> Assign Supervisor/Manager</label>
              <select class="form-control parentUserData" name="parent_id">
                @foreach($parentUser as $puser)
                  <option value="{{ $puser['id'] }}"> {{ $puser['first_name'] }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <!--form section 2 ends here-->
          
          <div class="col-md-12">
            <div class="col-md-12 no-padding">
              <p class="margint10 marginb15"><i class="fa fa-info-circle"></i> This user will be created and an email will be sent with the welcome instructions and abilities to update the profile and complete the questionaire in order to be successfully added as an active user</p>
            </div>
            <div class="form-group">
              <button class="btn ls-light-blue-btn" type="submit"> <i class="fa fa-cloud-upload"></i> Create User & Send Invite To The User </button>
            </div>
          </div>
        </form>
        
        <!--user profile form ends here--> 
      </div>
    </div>
  </div>
</div>
<!-- Main Content Element  End-->

@stop

@section('head')

<title>Amaha - Add Users</title>
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