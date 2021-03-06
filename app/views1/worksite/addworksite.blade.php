@extends('layouts.all') 

@section('content')
      <div class="row">
          <div class="col-md-12"> 
            <!--Top header start-->
            
            <h3 class="ls-top-header">Add New Worksite</h3>
            <!--Top header end --> 
            <!--Top breadcrumb start -->
            
            <ol class="breadcrumb">
              <li> <a class="fa fa-home" href="#"></a> </li>
              <li class="active">Add New Worksite</li>
            </ol>
            <!--Top breadcrumb start --> 
          </div>
        </div>
        <!-- Main Content Element  Start-->
        
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default userform no-border">
              <div class="panel-heading ">
                <h3 class="panel-title">Add New Worksite/Jobsite In This Section</h3>

                

              </div>


              <div class="panel-body">
                <p>You can add new worklocations/jobsites in this section by filling appropriate fields. The worklocation id is an autogenerated field which can not be altered.</p>


                <p>Please add the appropriate client first to have the client populate automatically in the client section.</p>

                 @include('notification')
                
                <form class="ls_form" method="post" id="worksiteForm" action="{{ URL::to(Config::get('constants.PREFIX').'/worksite') }}">
                  <!--user profile form ends here--> 
                  <!--form section 1 starts here-->
                  
                  <div class="col-md-6 margint15">
                    <div class="form-group">
                      <label><i class="fa fa-calendar"></i> Starting Date</label>
                      <input class="form-control datePickerOnly" name="started_at" type="text">
                     </div>
                    
                    <label><i class="fa fa-user"></i>Select Client</label>
                    <div class="control-group">
                        <select id="client" class="demo-default form-control" name="client_id" placeholder="Select client...">
                            <option value="">Select Client...</option>
                            @foreach($clients as $client )
                            <option value="{{ $client['id'] }}">{{ $client['first_name'] }} {{ $client['last_name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label><i class="fa fa-bullhorn"></i> Job Name</label>
                      <input class="form-control" placeholder="Provide A Job Name" name="job_name" type="text">
                    </div>



                    <div class="form-group">
                      <label><i class="fa fa-user"></i> Job Description</label>
                      <textarea class="animatedTextArea form-control validate[required]" id="job_desc" name="description" placeholder="Enter The Job Description Here...."></textarea>
                    </div>


                       <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-dot-circle-o"></i> PM</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6 inline">
                                            <label class="radio">
                                                <input class="icheck-blue" type="radio" name="pm"
                                                       id="radioRedCheckbox1" value="MJM" checked="checked"> MJM
                                            </label>
                                            <label class="radio">
                                                <input class="icheck-blue" type="radio" name="pm"
                                                       id="radioRedCheckbox2" value="KH"> KH
                                            </label>
                                            <label class="radio">
                                                <input class="icheck-blue" type="radio" name="pm"
                                                       id="radioRedCheckbox3" value="TA"> TA
                                            </label>
                                        </div>
                                     
                                    </div>
                                </div>

                                <!---->

                                 
                       </div>


                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-dot-circle-o"></i> CERT PR</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6 inline">
                                            <label class="radio">
                                                <input class="icheck-blue" type="radio" name="cret_pr"
                                                       id="radioRedCheckbox4" value="YES" checked="checked"> YES
                                            </label>
                                            <label class="radio">
                                                <input class="icheck-blue" type="radio" name="cret_pr"
                                                       id="radioRedCheckbox5" value="NO"> NO
                                            </label>
                                            
                                        </div>
                                     
                                    </div>
                                </div>

                                <!---->
                        </div>

                  </div>


                  <!--form section ends here--> 
                  <!--form section 2 starts here-->
                  
                  <div class="col-md-6 margint15">
                    <div class="form-group">
                    <label><i class="fa fa-home"></i> Site Address</label>
                    <input class="form-control" name="address" placeholder="First Line Of Address" type="text"><br>

                    <label><i class="fa fa-thumb-tack"></i> Locality</label>
                    <input class="form-control"  placeholder="locality / city" name="city" type="text"><br>
                    <label><i class="fa fa-map-marker"></i> State</label>
                    <div class="form-group">
                    
                    <div class="control-group">
                       @include('layouts.states', array('selected_state'=>""))
                    </div>
                
                </div>

               
                    <label><i class="fa fa-pencil"></i> Postal Code</label>
                    <input class="form-control" placeholder="Postal Code" type="text" name="postal_code">
                    
                </div>

                <div class="form-group">
                     <label><i class="fa fa-flag"></i> Country</label>
                    <div class="control-group">
                                <select id="country" class="demo-default form-control" name="country" placeholder="Select a country...">
                                    <option value="">Select a country...</option>
                                    <option value="United States">United States</option>
                                    
                                </select>
          
                          </div>

                          <label><i class="fa fa-flag"></i> Labour Rate</label>
                    <div class="control-group">
                                <input class="form-control" placeholder="Labour Rate" value="0.00" type="text" name="labour_rate">
          
                          </div>


                          <label><i class="fa fa-flag"></i> OT Rate</label>
                    <div class="control-group">
                               <input class="form-control" placeholder="OT Rate" type="text" value="0.00" name="ot_rate">
          
                          </div>

                          <label><i class="fa fa-flag"></i> DT Rate</label>
                    <div class="control-group">
                                <input class="form-control" placeholder="DT Rate" value="0.00" type="text" name="dt_rate">
          
                          </div>
                      
                      </div>

                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-dot-circle-o"></i> OCIP</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6 inline">
                                            <label class="radio">
                                                <input class="icheck-blue" type="radio" name="ocip" id="radioRedCheckbox4" value="YES" checked="checked"> YES
                                            </label>
                                            <label class="radio">
                                                <input class="icheck-blue" type="radio" name="ocip" id="radioRedCheckbox5" value="NO"> NO
                                            </label>
                                       </div>
                                    </div>
                                </div>

                                <!---->
                              </div>


                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-dot-circle-o"></i> BILLING TYPE</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-6 col-xs-6 inline">
                                            <label class="radio">
                                                <input class="icheck-blue" type="radio" name="billing_type" id="radioRedCheckbox4" value="T&M" checked="checked"> T&M
                                            </label>
                                            <label class="radio">
                                                <input class="icheck-blue" type="radio" name="billing_type" id="radioRedCheckbox5" value="LUMP SUM"> LUMP SUM
                                            </label>
                                            <label class="radio">
                                                <input class="icheck-blue" type="radio" name="billing_type" id="radioRedCheckbox6" value="CONTRACT"> CONTRACT
                                            </label>
                                       </div>
                                    </div>
                                </div>

                                <!---->
                              </div>

                                


                  </div>
                  <!--form section 2 ends here-->
                  
                  <div class="col-md-12">
                    <div class="col-md-12 no-padding">
                      <p class="margint10 marginb15"><i class="fa fa-info-circle"></i> This site/worksite will be created with the details that you have updated above, please review the details and check before adding the worksite. The worksite will auto populate in the magnet board & for foreman to while submiting work reports.</p>
                    </div>
                    <div class="form-group">
                      <button class="btn ls-light-blue-btn" type="submit"> <i class="fa fa-cloud-upload"></i> Create The Worksite & Add It To Database </button>
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

<title>Amaha - Add New WorkSite</title>

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

     <script src="{{ URL::asset('assets/js/pages/pickerTool.js') }}"></script> <!--Demo for Date, Time Color Picker Script End -->
@stop