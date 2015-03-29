@extends('layouts.all') 

@section('content')
      <div class="row">
          <div class="col-md-12"> 
            <!--Top header start-->
            
            <h3 class="ls-top-header">Export Work Report</h3>
            <!--Top header end --> 
            <!--Top breadcrumb start -->
            
            <ol class="breadcrumb">
              <li> <a class="fa fa-home" href="#"></a> </li>
              <li class="active">Export Work Report</li>
            </ol>
            <!--Top breadcrumb start --> 
          </div>
        </div>
        <!-- Main Content Element  Start-->
        
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default userform no-border">
              <div class="panel-heading ">
                <h3 class="panel-title">Export Work Report In This Section</h3>

                

              </div>


              <div class="panel-body">
                

                 @include('notification')
                <form class="ls_form" id="magnetForm" method="get" action="{{ URL::to(Config::get('constants.PREFIX').'/export/workreport') }}">
                  <!--user profile form ends here--> 
                  <!--form section 1 starts here-->
                  <div class="col-md-6 margint15">
                    <div class="form-group">
                      <label><i class="fa fa-calendar"></i>Start Date</label>
                      <input class="form-control datePickerOnly boardStartedAt" name="start_date" value="{{ date('d/m/Y') }}" type="text">
                     </div>
                    

                  </div>

                  <div class="col-md-6 margint15">
                    <div class="form-group">
                      <label><i class="fa fa-calendar"></i>End Date</label>
                      <input class="form-control datePickerOnly boardStartedAt" name="end_date" value="" type="text">
                     </div>
                  </div>
                
                  <!--form section 2 ends here-->
                  <div class="col-md-12">
                    
                    <div class="form-group">
                      <button class="btn ls-light-blue-btn" type="submit"> <i class="fa fa-cloud-upload"></i> Export </button> or 
                      <a href="{{ URL::to(Config::get('constants.PREFIX').'/export/workreport') }}" class="btn ls-light-blue-btn" type="submit"> <i class="fa fa-cloud-upload"></i> Export All</a>
                      <div class="exists"></div>
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

<title>Amaha - Export Work Report</title>

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