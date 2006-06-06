@extends('layouts.all') 

@section('content')


<div class="row">
          <div class="col-md-12"> 
            <!--Top header start-->
            
            <h3 class="ls-top-header">Create New Board</h3>
            <!--Top header end --> 
            <!--Top breadcrumb start -->
            
            <ol class="breadcrumb">
              <li> <a class="fa fa-home" href="#"></a> </li>
              <li class="active">Create New Board</li>
            </ol>
            <!--Top breadcrumb start --> 
          </div>
        </div>
        <!-- Main Content Element  Start-->
        
         <div class="row">
          <div class="col-md-3 userlist_brd">
          <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="input-group">
                                    <input type="text" class="form-control" placeholder="search from users...">
                                    <span class="input-group-btn">
                                                            <button type="button" class="btn btn-default">Go!</button>
                                                        </span>
                                    </div>
                                </div>
                                <div class="panel-body no-padding nano">
                                    <ul class="nano-content">
                                      @foreach($users as $user)
                                      <li data-id="{{ $user['id'] }}">{{ $user['user_name'] }} <span><i class="fa fa-arrows"></i></span></li>
                                      @foreach
                                    </ul>
                                </div>
          </div>
          </div>

        <div class="col-md-9 ">
          <div class="row site_det"> 
            <div class="col-md-4"><label>Date</label><input class="form-control datePickerOnly" type="text"/></div>
            <div class="col-md-6 site_sel">
              <label>Site</label>
              <div class="control-group">
                                <select id="select-country" class="demo-default" placeholder="Select a country...">
                                    <option value="">Select Work Site...</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AX">&Aring;land Islands</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                </select>
              </div>

            </div>
            <div class="col-md-2">
              <button class="btn ls-light-blue-btn"><i class="fa fa-arrow-right"></i> Go !</button>
            </div>

          </div>

          <div class="wrksite_drop"><!--worksite drop box start (where the users will be dropped)-->

            <!--this is where the users will start-->
            <div class="panel panel-default"><!--first user starts-->
                  <div class="panel-heading">
                    <h3 class="panel-title">User Number One</h3>
                      <ul class="panel-control">
                        <li><a class="minus" href="javascript:void(0)"><i class="fa fa-minus"></i></a></li>
                        <li><a class="close-panel" href="javascript:void(0)"><i class="fa fa-times"></i></a></li>
                      </ul>
                  </div>
                  <div class="panel-body usrshft">
                    <div id="wrk_1">
                       <div class="row">
                        <div class="col-md-3">
                            <h6>Shift Start Time</h6>
                            <input class="form-control timePickerOnly" type="text"/>
                        </div>
                        <div class="col-md-3">
                            <h6>Shift End Time</h6>
                            <input class="form-control timePickerOnly" type="text"/>
                        </div>
                        <div class="col-md-3">
                            
                          <button class="btn ls-light-green-btn"><i class="fa fa-save"></i> Save The Shift</button>
                        </div>

                      </div>
                    </div>
                  </div>
            </div><!--user ends-->

            <div class="panel panel-default"><!--second user starts-->
              <div class="panel-heading">
                <h3 class="panel-title">User Number Two</h3>
                  <ul class="panel-control">
                    <li><a class="minus" href="javascript:void(0)"><i class="fa fa-minus"></i></a></li>
                    <li><a class="close-panel" href="javascript:void(0)"><i class="fa fa-times"></i></a></li>
                  </ul>
              </div>
              <div class="panel-body usrshft">
                <div id="wrk_1">
                  <div class="row">
                    <div class="col-md-3">
                        <h6>Shift Start Time</h6>
                        <input class="form-control timePickerOnly" type="text"/>
                    </div>
                    <div class="col-md-3">
                        <h6>Shift End Time</h6>
                        <input class="form-control timePickerOnly" type="text"/>
                    </div>
                    <div class="col-md-3">
                        
                      <button class="btn ls-light-green-btn"><i class="fa fa-save"></i> Save The Shift</button>
                    </div>

                  </div>
                </div>
              </div>
                </div><!--user ends-->
            </div>
            <!--this is where the users will end-->

            <!--this is a static button to save the worksite-->
            <div class="svwrkst"><button class="btn ls-light-green-btn staticsv">Save The User Allocation For Worksite One</button></div>
          </div><!--worksite drop box end (where the users will be dropped)-->
        </div>
  
        
@stop

@section('head')

<title>Amaha - Create New Board</title>


<!--Page loading plugin Start -->
    <link href="{{ URL::asset('assets/css/plugins/pace.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('assets/js/pace.min.js') }}"></script><!--Page loading plugin End   -->
    <!-- Plugin Css Put Here -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/jquery.remodal.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/dndTable.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/tsort.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/selectize.bootstrap3.css') }}">
    <link href="{{ URL::asset('assets/css/plugins/jquery.datetimepicker.css') }}" rel="stylesheet">

    <!-- Plugin Css End -->


    <!-- Plugin Css Put Here -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/custom_smart_wizard.css') }}">

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

<script type="text/javascript" src="{{ URL::asset('assets/js/lib/jquery-1.11.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/lib/jquery-migrate-1.1.0.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery-ui-1.8.custom.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/max_js.min.js') }}"></script>
<!-- Max Javascript END -->

<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('assets/js/multipleAccordion.js') }}"></script> 
 
<!--<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>-->
<!--jqueryui for table end--> 

<!--easing Library Script Start --> 
<script src="{{ URL::asset('assets/js/lib/jquery.easing.js') }}"></script> 
<!--easing Library Script End --> 
<!--Nano Scroll Script Start -->
<script src="{{ URL::asset('assets/js/jquery.nanoscroller.min.js') }}"></script>
    <!--Nano Scroll Script End -->



<script type="text/javascript" src="{{ URL::asset('assets/js/pages/layout.js') }}"></script> 
<!--Layout Script End --> 
<!--selectize Library start-->
<script src="{{ URL::asset('assets/js/selectize.min.js') }}"></script>
<!--selectize Library End-->

<!--Select & Tag demo start-->
<script src="{{ URL::asset('assets/js/pages/selectTag.js') }}"></script>
<!--Select & Tag demo end-->


<!--Demo Wizard Script End-->
<script src="{{ URL::asset('assets/js/jquery.datetimepicker.js') }}"></script> <!-- Date & Time Picker Library Script End -->
<script src="{{ URL::asset('assets/js/pages/pickerTool.js') }}"></script> <!--Demo for Date, Time Color Picker Script End -->




<script src="{{ URL::asset('assets/js/amaha.js') }}"></script> <!--Demo for Date, Time Color Picker Script End -->


@stop