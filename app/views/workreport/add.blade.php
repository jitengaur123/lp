@extends('layouts.all') 

@section('content')
<div class="row">
        <div class="col-md-12">
            <!--Top header start-->

            <h3 class="ls-top-header">Add New Work Report</h3>
            <!--Top header end -->
            <!--Top breadcrumb start -->

            <ol class="breadcrumb">
                <li>
                    <a class="fa fa-home" href="#"></a>
                </li>

                <li class="active">Add New Work Report</li>
            </ol><!--Top breadcrumb start -->
        </div>
    </div><!-- Main Content Element  Start-->

    <div class="row">
        <div class="col-md-12">

            <form class="ls_form" method="post" action="{{ URL::to(Config::get('constants.PREFIX').'/workreport') }}"><!--form starts here-->
            <div class="panel panel-default userform no-border">
                <div class="panel-heading ">
                    <h3 class="panel-title">Add New Work Report In This Section</h3>
                </div>
                <p class="margint15">You can create a new work report in this section by filling up the fields below. The fields with * are required & can not be left empty. For more information please refer to the documentation.<br/>If you are a journeyman the work reports will need the approval from project manager and will remain in pending status, if you are the admin then you can check the reports and change the status of report to available states.</p>
                
                <div class="panel-body">
                    
                        @include('notification')
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fa fa-info-circle"></i> Job Number (Autogenerated)</label>
                                <input class="form-control" readonly placeholder="Job Number" name="job_number" type="text" value="AMA-WR-{{ uniqid() }}">
                            </div>

                            <div class="form-group">
                                    <label><i class="fa fa-user"></i> Client</label>
                                    <select id="client" class="demo-default" name="client" placeholder="Select Client...">

                                        <option value="">Select A Client...</option>
                                        @foreach($clients as  $client)
                                        <option value="{{ $client['id'] }}">{{ $client['company_name'] }}</option>
                                        @endforeach
                                        
                                    </select>
                            </div>

                            <div class="form-group">
                                <label><i class="fa fa-building"></i> Work Site</label>
                                    <select id="worksite" class="demo-default" name="site" placeholder="Select WorkSite...">
                                        <option value="">Select A Site...</option>
                                        
                                        
                                    </select>
                            </div>

                            <div class="form-group">
                                <label><i class="fa fa-calendar"></i> Date</label>
                                <input class="form-control datePickerOnly" type="text" name="date_create">
                            </div>

                        </div><!--form section 1 ends here-->
                        

                        <div class="col-md-6"><!--form section 2 starts here-->
                            <div class="address reportData"><!--this address will generate automatically when the client & worksite will be selected-->
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Client Name</td>
                                            <td><span class="showCompanyName">Quantum Web Solutions</span></td>
                                        </tr>
                                        <tr>
                                            <td>Worksite Name</td>
                                            <td><span class="showWorkSiteName">Reeds Avenue</span></td>
                                        </tr>    
                                        <tr>
                                            <td>Site Address:</td>
                                            <td><span class="showSiteAddress">E 295,LGF</span></td>
                                        </tr>
                                        <tr>
                                            <td>Locality:</td>
                                            <td><span class="showLocality">Greater Kailash Part II</span></td>
                                        </tr>
                                        <tr>
                                            <td>State:</td>
                                            <td><span class="showState">New Delhi</span></td>
                                        </tr>
                                        <tr>
                                            <td>Post Code:</td>
                                            <td><span class="showPostCode">110048</span></td>
                                        </tr>
                                        <tr>
                                            <td>Country:</td>
                                            <td><span class="showCountry">India</span></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>   
                        
                        </div><!--form section 2 ends here-->
                </div><!--panel ends here-->
            </div>

            <div class="panel panel-default userform no-border"><!--time logging panel starts here -->
                <div class="panel-heading ">
                    <h3 class="panel-title">Create TimeSheet</h3>
                </div>
                
                
                <div class="panel-body">
                    
                        
                        <div class="col-md-12"><!--section 1 starts here-->
                            <div id="entry1" class="clonedInput row"><!--clonedinput starts-->
                                <fieldset class="col-md-3 col-md-6"><!--entry 1-->
                                    
                                    <select id="select-labor" class="demo-default" name="labour_id[]" placeholder="Select Labor...">
                                        <option value="">Select Labor...</option>
                                        @foreach($labours as  $labour)
                                        <option value="{{ $labour['id'] }}">{{ $labour['user_name'] }}</option>
                                        @endforeach
                                    </select>
                                </fieldset><!--entry 1 ends-->

                                <fieldset class="col-md-3 col-md-6"><!--entry 2-->
                                    
                                     <input class="form-control" name="class_name[]" placeholder="Enter Class" type="text">                                                    
                                </fieldset><!--entry 2 ends-->

                                <fieldset class="col-md-2 col-md-6"><!--entry 3-->
                                    
                                     <input class="form-control" name="reg_hour[]"  placeholder="Reg Hours" type="text">                                                    
                                </fieldset><!--entry 3 ends-->

                                <fieldset class="col-md-2 col-md-6"><!--entry 4-->
                                    
                                     <input class="form-control" name="reg_rate[]"  placeholder="Reg Rate" type="text">                                                    
                                </fieldset><!--entry 4 ends-->

                                <fieldset class="col-md-2 col-md-6"><!--entry 5-->
                                    <input class="form-control"  placeholder="Amount" type="text">
                                </fieldset><!--entry 5 ends-->

                                
                                <!--ot details start-->
                                <fieldset class="col-md-3 col-md-6"><!--entry 6-->
                                </fieldset><!--entry 6 end-->

                                <fieldset class="col-md-2 col-md-6"><!--entry 7-->
                                    <input class="form-control" name="ot_hour[]"  placeholder="OT Hours" type="text">
                                </fieldset><!--entry 7 end-->

                                <fieldset class="col-md-2 col-md-6"><!--entry 7-->
                                    <input class="form-control" name="ot_rate[]"  placeholder="OT Rate" type="text">
                                </fieldset><!--entry 7 end-->

                                <fieldset class="col-md-2 col-md-6"><!--entry 8-->
                                    <input class="form-control"  placeholder="Amount" type="text">
                                </fieldset><!--entry 8 ends-->
                                <!--ot details end-->

                                <!--dt details start-->
                                <fieldset class="col-md-6 col-md-6"><!--entry 6-->
                                </fieldset><!--entry 6 end-->

                                <fieldset class="col-md-2 col-md-6"><!--entry 7-->
                                    <input class="form-control" name="dt_hour[]"  placeholder="DT Hours" type="text">
                                </fieldset><!--entry 7 end-->

                                <fieldset class="col-md-2 col-md-6"><!--entry 7-->
                                    <input class="form-control" name="dt_rate[]"  placeholder="DT Rate" type="text">
                                </fieldset><!--entry 7 end-->

                                <fieldset class="col-md-2 col-md-6"><!--entry 8-->
                                    <input class="form-control" placeholder="Amount" type="text">
                                </fieldset><!--entry 8 ends-->
                                <!--dt details end-->
                                <fieldset class="col-md-10">
                                </fieldset>
                                <fieldset class="col-md-2">
                                    <label><i class="fa fa-plus"></i> Total Labor</label>
                                    <input class="form-control auto" placeholder="Amount" type="text" value="00.00" disabled>
                                    <!--total labor will be calculated autmatically by multiplying reg, ot and dt hours with rate-->
                                </fieldset>


                            </div><!-- cloned input ends -->

                            
                            
                            <div id="addDelButtons" class="margint15 col-md-6">
                                <input type="button" id="btnAdd" value="add section" class="btn ls-light-green-btn"> 
                                <input type="button" id="btnDel" value="remove section above" class="btn ls-red-btn">
                            </div>

                            

                
                        </div><!--section ends here-->
                        

                </div><!--panel ends here-->
            </div><!--time logging ends here-->

            <!--additional comments-->
            <div class="col-md-12 message">
                <p>additional comments</p>
                <textarea name="description" class="form-control autogrow" placeholder="Type your comments & additional notes here....."></textarea>
            </div>
            <!--additiona comments end-->

             
           
            <div class="row marginb50">
            <div class="col-md-6 total_all">
                                <h3>Grand Total : $<span>1200</span></h3>
                            </div>

             <div class="col-md-6 total_all">
            <input type="submit" value="Submit Report" class="btn btn-primary">
            </div>
            </div>
            </form><!--form ends here-->
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
     <script src="{{ URL::asset('assets/js/amaha.js') }}"></script> <!--Demo for Date, Time Color Picker Script End -->

     <script src="{{ URL::asset('assets/js/pages/pickerTool.js') }}"></script> <!--Demo for Date, Time Color Picker Script End -->
      <script src="{{ URL::asset('assets/js/pages/addfieldset.js') }}"></script>
@stop