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
             @include('notification')
           <div class="panel-body"> 
                <!--form Wrapper Start-->
                  <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Allocate users to different work sites in this section.</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="formular form-horizontal ls_form" id="magnetUpdateForm" method="post" action="{{ URL::to(Config::get('constants.PREFIX').'/magnet/update/'.$magnetboard['id']) }}">
                                            <div id="verticalWizard" class="swMainVertical">
                                            <ul>
                                                <li>
                                                    <a href="#step-1">
                                                        <span class="stepNumber">1</span>
                                                        <span class="stepDesc">
                                                            Step 1<br/>
                                                            <small>select the client</small>

                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-2">
                                                        <span class="stepNumber">2</span>
                                                        <span class="stepDesc">
                                                            Step 2<br/>
                                                            <small>select worksites</small>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-3">
                                                        <span class="stepNumber">3</span>
                                                        <span class="stepDesc">
                                                            Step 3<br/>
                                                            <small>Allocate the Users</small>
                                                        </span>
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                            <div id="step-1">
                                                <h2 class="StepTitle">Select The Client & Date You Want To Create Board For</h2>
                                                <p>Please select the client for which you want to create the board for, based upon this selection the worksites will be made available in the next section.</p>

                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                          <label><i class="fa fa-user"></i> Client</label>
                                                          <select id="client" class="demo-default form-control" name="client_id" placeholder="Select client...">
                                                              <option value="" selected="selected">Select Client...</option>
                                                            @foreach($clients as $client )
                                                            <option value="{{ $client['id'] }}" @if($client['id'] == $magnetboard['client_id']) selected="selected" @endif>{{ $client['first_name'] }} {{ $client['last_name'] }}</option>
                                                            @endforeach
                                                          </select>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                          <div class="form-group">
                                                          <label><i class="fa fa-calendar marginl25"></i> Date</label>
                                                          <input class="form-control datePickerOnly marginl25" value="{{ date('d/m/Y', strtotime($magnetboard['started_at'])) }}" name="started_at" type="text">

                                                       
                                                          </div>

                                                        </div>

                                                  </div>

                                                </div>
                                            </div>
                                            <div id="step-2">
                                                <h2 class="StepTitle">Select Worksites</h2>
                                                <p>Select form the worksites that are registered under selected client in step one.</p>

                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                          <label><i class="fa fa-user"></i> Worksite</label>
                                                          <select id="worksite" class="demo-default form-control" name="worksite_id" placeholder="Select  Work site...">
                                                               @foreach($worksite as $site )
                                                                <option value="{{ $site['id'] }}" @if($site['id'] == $magnetboard['worksite_id']) selected="selected" @endif>{{ $site['job_name'] }}</option>
                                                                @endforeach
                                                          </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div id="step-3">
                

                                                <div class="container-fluid">
                                                     <div class="panel panel-default userform no-border"><!--time logging panel starts here -->
                                                      <div class="panel-heading ">
                                                          <h3 class="panel-title">Select Users & Shift Time</h3>
                                                      </div>
                                                      <!--section 1 starts here-->
                                        <div class="col-md-12">
                                            
                                            @foreach($m_users as $index => $muser)
                                            <div id="entry{{$index}}" class="clonedInput row"><!--clonedinput starts-->
                                                <fieldset class="col-md-6 col-md-6"><!--entry 1-->
                                                    
                                                    <select id="select-labor" name="users[]" class="demo-default" placeholder="Select Labor...">
                                                          @foreach($users as $user)
                                                           <option value="{{ $user['id'] }}" @if($muser['user_id'] == $user['id'])selected="selected" @endif>{{ $user['first_name'] }} {{ $user['last_name'] }}</option>
                                                          @endforeach
                                                           
                                                    </select>
                                                </fieldset><!--entry 1 ends-->

                                                <fieldset class="col-md-2 col-md-6"><!--entry 3-->
 
                                                  <input class="form-control" name="start_time[]" type="text" value="{{ $muser['start_time'] }}"/>
                                                </fieldset><!--entry 3 ends-->

                                                <div class="col-md-1"><span class="seper">To</span></div>

                                                
                                                <fieldset class="col-md-2 col-md-6"><!--entry 3-->
                                                  <input class="form-control" name="end_time[]" type="text" value="{{ $muser['end_time'] }}"/>
                                                 
                                                </fieldset><!--entry 3 ends-->


                                                <fieldset class="col-md-10">
                                                </fieldset>
                                           </div><!-- cloned input ends -->
                                          @endforeach

                                          <div id="addDelButtons" class="margint15 col-md-6">
                                            <input type="button" id="btnAdd" value="add section" class="btn ls-light-green-btn"> 
                                            <input type="button" id="btnDel" value="remove section above" class="btn ls-red-btn">
                                          </div>
                                        </div>
                                        <!--section ends here-->
                                
                                                      <div class="panel-body">
                                    

                                        

                                </div><!--panel ends here-->
                            </div><!--time logging ends here-->

                                                   
                                                </div>
                                            </div>
                                       
                                            </div>
                                            <!-- End SmartWizard Content -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!--form Wrapper Finish--> 
              </div>
          </div>
        </div>
         <script type="text/javascript">
        $(document).ready(function(){
          $(document).on('change','#client', changeWorksite);
        });
        </script>
  



@stop

@section('head')

<title>Amaha - Edit Board</title>

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
   
 <!--Editable-table Start--> 
    <script src="{{ URL::asset('assets/js/editable-table/jquery.dataTables.js') }}"></script> 
    <script src="{{ URL::asset('assets/js/editable-table/jquery.validate.js') }}"></script> 
    <script src="{{ URL::asset('assets/js/editable-table/jquery.jeditable.js') }}"></script> 
    <script src="{{ URL::asset('assets/js/editable-table/jquery.dataTables.editable.js') }}"></script> 

<!--Editable-table Finish --> 
<script src="{{ URL::asset('assets/js/jquery.smartWizard.js') }}"></script>
    <!--Form Wizard CSS End-->

    <!--Demo Wizard Script Start-->
    <script src="{{ URL::asset('assets/js/pages/formWizard.js') }}"></script>

    <!--Demo Wizard Script End-->
     <script src="{{ URL::asset('assets/js/jquery.datetimepicker.js') }}"></script> <!-- Date & Time Picker Library Script End -->
     <script src="{{ URL::asset('assets/js/pages/pickerTool.js') }}"></script> <!--Demo for Date, Time Color Picker Script End -->
    <script src="{{ URL::asset('assets/js/pages/addfieldset.js') }}"></script><!--for adding fields-->


     <!--selectize Library start-->
     <script src="{{ URL::asset('assets/js/selectize.min.js') }}"></script>
     <!--selectize Library End-->

     <!--Select & Tag demo start-->
     <script src="{{ URL::asset('assets/js/pages/selectTag.js') }}"></script>
     <!--Select & Tag demo end-->


     <script src="{{ URL::asset('assets/js/amaha.js') }}"></script> <!--Demo for Date, Time Color Picker Script End -->
s
@stop