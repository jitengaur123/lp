@extends('layouts.all') 

@section('content')
<div class="row">
        <div class="col-md-12">
            <!--Top header start-->

            <h3 class="ls-top-header">Add New Post</h3>
            <!--Top header end -->
            <!--Top breadcrumb start -->

            <ol class="breadcrumb">
                <li>
                    <a class="fa fa-home" href="#"></a>
                </li>

                <li class="active">Add New Post</li>
            </ol><!--Top breadcrumb start -->
        </div>
    </div><!-- Main Content Element  Start-->

    <div class="row">
        <div class="col-md-12">

            <form class="ls_form" method="post" action="{{ URL::to(Config::get('constants.PREFIX').'/post') }}"><!--form starts here-->
            <div class="panel panel-default userform no-border">
                <div class="panel-heading ">
                    <h3 class="panel-title">Add New Post In This Section</h3>
                </div>
                <p class="margint15">You can create a new work report in this section by filling up the fields below. The fields with * are required & can not be left empty. For more information please refer to the documentation.<br/>If you are a journeyman the work reports will need the approval from project manager and will remain in pending status, if you are the admin then you can check the reports and change the status of report to available states.</p>
                
                <div class="panel-body">
                    
                        @include('notification')
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fa fa-info-circle"></i> Page name </label>
                                <input class="form-control" placeholder="Page name" name="page_name" type="text" value="">
                            </div>

                           
                        </div><!--form section 1 ends here-->
                        

                </div><!--panel ends here-->
            </div>


            <!--additional comments-->
            <div class="col-md-12 message">
                <p>Description</p>
                <textarea name="description" class="form-control autogrow" placeholder="description"></textarea>
            </div>
            <!--additiona comments end-->

             
           
            <div class="row marginb50">
        
             <div class="col-md-6 total_all">
            <input type="submit" value="Submit Report" class="btn btn-primary">
            </div>
            </div>
            </form><!--form ends here-->
        </div>
    </div>

        
@stop

@section('head')

<title>Amaha - Add New Post</title>

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
      <script src="{{ URL::asset('assets/js/pages/addfieldset.js') }}"></script>
@stop