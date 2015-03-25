@extends('layouts.all') 

@section('content')
 <div class="row">
          <div class="col-md-12"> 
            <!--Top header start-->
            
            <h3 class="ls-top-header">View files and folders</h3>
            <!--Top header end --> 
            <!--Top breadcrumb start -->
            
            <ol class="breadcrumb">
              <li> <a class="fa fa-home" href="#"></a> </li>
              <li class="active">View files and folders</li>
            </ol>
            <!--Top breadcrumb start --> 
          </div>
        </div>
        <!-- Main Content Element  Start-->
        
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default userform no-border">
              <div class="panel-heading">
                <h3 class="panel-title">View & manage All files and folders of users</h3>
              </div>
              <div class="panel-body"> 
                @include('notification') 
                <!--Table Wrapper Start-->
                <!--Table Wrapper Start-->
                <div class="ls-editable-table table-responsive ls-table">
                  <h1>File Manager</h1>
                  <div id="elfinder"></div>
                </div>
                <!--Table Wrapper Finish--> 
                <!--Table Wrapper Finish--> 
              </div>
            </div>
          </div>
        </div>
<!--modal ends--> 
@stop

@section('head')

<title>Amaha - Repositories</title>
<!--Page loading plugin Start -->


    <script src="{{ URL::asset('assets/js/pace.min.js') }}"></script><!--Page loading plugin End   -->
  
    <!-- Plugin Css Put Here -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('assets/css/plugins/elfinder/css/elfinder.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('assets/css/plugins/elfinder/css/theme.css') }}">




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
     <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

<!--Layout Script End --> 

<!--file manager el finder script-->
<!--file manager el finder script ends-->

<!-- elFinder initialization (REQUIRED) -->
    <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        var elf = $('#elfinder').elfinder({
          url : '{{ URL::asset("/")."php/connector.php" }}'  // connector URL (REQUIRED)
          // lang: 'ru',             // language (OPTIONAL)
        }).elfinder('instance');
      });
    </script>
    <!-- elFinder JS (REQUIRED) -->
    <script type="text/javascript" src="{{ URL::asset('assets/js/elfinder/elfinder.min.js') }}"></script>


@stop