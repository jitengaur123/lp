@extends('layouts.all') 

@section('content')
 <div class="row">
          <div class="col-md-12"> 
            <!--Top header start-->
            
            <h3 class="ls-top-header">View All  Magnet Board</h3>
            <!--Top header end --> 
            <!--Top breadcrumb start -->
            
            <ol class="breadcrumb">
              <li> <a class="fa fa-home" href="#"></a> </li>
              <li class="active">View All  Magnet Board</li>
            </ol>
            <!--Top breadcrumb start --> 
          </div>
        </div>
        <!-- Main Content Element  Start-->
        
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default userform no-border">
              <div class="panel-heading">
                <h3 class="panel-title">View All Magnet Board</h3>
              </div>
              <div class="panel-body"> 
                @include('notification') 
                <!--Table Wrapper Start-->
                <div class="ls-editable-table table-responsive ls-table">
                  <table class="table table-bordered table-striped table-bottomless" id="ls-editable-table">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Supervisor Name</th>
                        <th>WorkSite Name</th>
                        <th class="text-center">View/Edit/Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($magnetboard as $row)
                      <tr>
                        <td>{{ date('d/m/Y',strtotime($row['started_at'])) }}</td>
                        <td>{{ $row['supervisor']['first_name'] }} {{ $row['supervisor']['last_name'] }}</td>
                        <td>{{ $row['worksite']['job_name'] }}</td>
                        <td class="text-center">
                          <a data-id="{{ $row['id'] }}" class="viewsiteModel viewMagnetDataModel" href="#reModal"><!--  {{ URL::to(Config::get('constants.PREFIX') . '/magnet/'.$row['id']) }} -->
                          <button class="btn btn-xs btn-success"><i class="fa fa-eye"></i></button> </a> 
                          <a href="{{ URL::to(Config::get('constants.PREFIX') . '/magnet/'.$row['id']) }}/edit">
                          <button class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o"></i></button> </a>
                           <a onclick="return confirm('Are you sure want to delete?');" href="{{ URL::to(Config::get('constants.PREFIX') . '/magnet/delete/'.$row['id']) }}">
                          <button class="btn btn-xs btn-danger"><i class="fa fa-minus"></i></button>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!--Table Wrapper Finish--> 
              </div>
            </div>
          </div>
        </div>


 <!--modal start-->
<div class="remodal" data-remodal-id="reModal">
  <h3>View Magnet Board</h3>
  <div class="viewMagnetData">
    <div class="row">
      <div class="col-md-12 ">
        Loading...
      </div>
    </div>
    <br>
    <a class="remodal-cancel ls-red-btn btn" href="#">Close</a> 
  </div>
</div><!--modal ends--> 
@stop

@section('head')

<title>Amaha - Magnet List</title>
<!--Page loading plugin Start -->


    <script src="{{ URL::asset('assets/js/pace.min.js') }}"></script><!--Page loading plugin End   -->
    <!-- Plugin Css Put Here -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/jquery.remodal.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/dndTable.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/tsort.css') }}">

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

     <!--Drag & Drop & Sort  table start--> 
      <script src="{{ URL::asset('assets/js/tsort.js') }}"></script> 
      <script src="{{ URL::asset('assets/js/jquery.tablednd.js') }}"></script> 
      <script src="{{ URL::asset('assets/js/jquery.dragtable.js') }}"></script> 
      <!--Drag & Drop & Sort table end--> 

      <!--Editable-table Start--> 
      <script src="{{ URL::asset('assets/js/editable-table/jquery.dataTables.js') }}"></script> 
      <script src="{{ URL::asset('assets/js/editable-table/jquery.validate.js') }}"></script> 
      <script src="{{ URL::asset('assets/js/editable-table/jquery.jeditable.js') }}"></script> 
      <script src="{{ URL::asset('assets/js/editable-table/jquery.dataTables.editable.js') }}"></script> 
      <!--Editable-table Finish --> 

      <!--Demo table script start--> 
      <script src="{{ URL::asset('assets/js/pages/table.js') }}"></script> 
      <!--Demo table script end--> 

      <!-- Remodal Js Start--> 
      <script src="{{ URL::asset('assets/js/jquery.remodal.js') }}"></script> 
      <!-- Remodal Js Finished-->
     <script src="{{ URL::asset('assets/js/amaha.js') }}"></script> <!--Demo for Date, Time Color Picker Script End -->
@stop