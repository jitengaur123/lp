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


<!-- Main Content Element  Start-->
                <div class="row">
                <div class="col-md-12">
                    @include('notification')
                    <form class="ls_form" method="post" action="{{ URL::to(Config::get('constants.PREFIX').'/post') }}"><!--form starts here-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Post Title</h3>
                        </div>
                        <div class="panel-body">
                         
                                <div class="form-group">
                                    <label>Give A Title To Your Post</label>
                        <input class="form-control" placeholder="Page name" name="page_name" type="text" value="">
                                </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Post Body</h3>
                            <ul class="panel-control">
                                <li><a class="minus" href="javascript:void(0)"><i class="fa fa-minus"></i></a></li>
                                <li><a class="refresh" href="javascript:void(0)"><i class="fa fa-refresh"></i></a></li>
                                <li><a class="close-panel" href="javascript:void(0)"><i class="fa fa-times"></i></a></li>
                            </ul>
                        </div>
                        <div class="panel-body no-padding">
                            <textarea name="description" class="form-control autogrow summernote" placeholder="description"></textarea>
                        </div>

                  

                    </div>
                    <button type="submit" class="btn btn-primary" ><i class="glyphicon glyphicon-folder-open"></i> &nbsp; Publish Post</button>
                    </form>
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
     <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/summernote.css') }}">

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
 <!-- summernote Editor Script For Layout start-->
    <script src="{{ URL::asset('assets/js/summernote.min.js') }}"></script>
    <!-- summernote Editor Script For Layout End-->

    <!-- Demo Ck Editor Script For Layout Start-->
    <script src="{{ URL::asset('assets/js/pages/editor.js') }}"></script>
    <!-- Demo Ck Editor Script For Layout ENd-->
     <script src="{{ URL::asset('assets/js/amaha.js') }}"></script> <!--Demo for Date, Time Color Picker Script End -->

@stop