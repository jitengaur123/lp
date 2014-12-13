@extends('layouts.all') 

@section('content')
 <div class="row">
          <div class="col-md-12"> 
            <!--Top header start-->
            
            <h3 class="ls-top-header">Update Magnet Board</h3>
            <!--Top header end --> 
            <!--Top breadcrumb start -->
            
            <ol class="breadcrumb">
              <li> <a class="fa fa-home" href="#"></a> </li>
              <li class="active">Update  Magnet Board</li>
            </ol>
            <!--Top breadcrumb start --> 
          </div>
        </div>
        <!-- Main Content Element  Start-->
        
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default userform no-border">
              <div class="panel-heading ">
                <h3 class="panel-title">Update  Magnet Board In This Section</h3>

                

              </div>


              <div class="panel-body">
                <p>You can update the  Magnet Board in this section by filling appropriate fields. The  Magnet Board id is an autogenerated field which can not be altered.</p>


                <p>Please add the appropriate client first to have the client populate automatically in the client section.</p>


               @include('notification')
                <form class="ls_form" id="magnetUpdateForm" method="post" action="{{ URL::to(Config::get('constants.PREFIX').'/magnet/update/'.$magnetboard['id']) }}">
                  <!--user profile form ends here--> 
                  <!--form section 1 starts here-->
                  
                  <div class="col-md-6 margint15">
                    <div class="form-group">
                      <label><i class="fa fa-calendar"></i>Date</label>
                      <input class="form-control datePickerOnly" value="{{ date('d/m/Y', strtotime($magnetboard['started_at'])) }}" name="started_at" type="text">
                     </div>
                    
                    <label><i class="fa fa-user"></i>Select Client</label>
                    <div class="control-group">
                        <select id="client" class="demo-default form-control" name="client_id" placeholder="Select client...">
                            <option value="" >Select Client...</option>
                            @foreach($clients as $client )
                            <option value="{{ $client['id'] }}" @if($client['id'] == $magnetboard['client_id']) selected="selected" @endif>{{ $client['first_name'] }} {{ $client['last_name'] }}</option>
                            @endforeach
                        </select>
                    </div>


                    <label><i class="fa fa-user"></i>Select Work site</label>
                    <div class="control-group">
                        <select id="worksite" class="demo-default form-control" name="worksite_id" placeholder="Select  Work site...">
                            <option value="">Select Work site...</option>
                             @foreach($worksite as $site )
                            <option value="{{ $site['id'] }}" @if($site['id'] == $magnetboard['worksite_id']) selected="selected" @endif>{{ $site['job_name'] }}</option>
                            @endforeach

                        </select>
                    </div>

                  </div>


                  <!--form section ends here--> 
                  <!--form section 2 starts here-->
                  <div class="col-md-6 margint15">
                    <div class="form-group">
                        <label><i class="fa fa-home"></i> Engineers</label>

                         <table class="table table-bordered table-striped table-bottomless  no-footer"> 
                           @foreach($users as $user)
                          <tr>
                            <td><input type="checkbox" class="form-control" name="users[]" <?php  if(in_array($user['id'], $magnetuser)): ?>checked="checked" <?php endif ?> value="{{ $user['id'] }}" /></td>
                            <td>{{ $user['first_name'] }} {{ $user['last_name'] }}</td>
                            <td><input type="text" class="form-control" name="start_time[{{$user['id']}}]" value="<?php  if(in_array($user['id'], $magnetuser)): ?>{{ $selectdUser[$user['id']]['start_time'] }}<?php endif ?>" /></td>
                            <td><input type="text" class="form-control" name="end_time[{{$user['id']}}]" value="<?php  if(in_array($user['id'], $magnetuser)): ?>{{ $selectdUser[$user['id']]['end_time'] }}<?php endif ?>" /></td>
                          </tr>
                           @endforeach
                        </table>

                    <!-- <select name="users[]" multiple>
                        @foreach($users as $user)
                        <option value="{{ $user['id'] }}" <?php  if(in_array($user['id'], $magnetuser)): ?>selected="selected" <?php endif ?>>{{ $user['user_name'] }}</option>
                        @endforeach
                    </select><br> -->

                    
                    </div>
                  </div>
                  <!--form section 2 ends here-->
                  
                  <div class="col-md-12">
                    <div class="col-md-12 no-padding">
                      <p class="margint10 marginb15"><i class="fa fa-info-circle"></i> This site/worksite will be created with the details that you have updated above, please review the details and check before adding the worksite. The worksite will auto populate in the magnet board & for foreman to while submiting work reports.</p>
                    </div>
                    <div class="form-group">
                      <button class="btn ls-light-blue-btn" type="submit"> <i class="fa fa-cloud-upload"></i> Allocate Users </button>
                    </div>
                  </div>
                </form>
                
                <!--user profile form ends here--> 
              </div>
            </div>
          </div>
        </div>
        
@stop

@section('head')

<title>Amaha - Edit Profile</title>
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