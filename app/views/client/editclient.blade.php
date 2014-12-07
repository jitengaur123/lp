@extends('layouts.all') 

@section('content')
 <div class="row">
    <div class="col-md-12">
        <!--Top header start-->

        <h3 class="ls-top-header">Edit Client</h3>
        <!--Top header end -->
        <!--Top breadcrumb start -->

        <ol class="breadcrumb">
            <li>
                <a class="fa fa-home" href="#"></a>
            </li>

            <li class="active">Edit Client</li>
        </ol><!--Top breadcrumb start -->
    </div>
</div><!-- Main Content Element  Start-->
<div class="row">
          <div class="col-md-12">

            <div class="panel panel-default userform no-border">
              @include('notification')
              <div class="panel-heading ">
                <h3 class="panel-title">Edit Client</h3>
              </div>
              <div class="panel-body client">
                <p><i class="fa fa-users"></i> You can add edit client in this section in order to create a work site. Please note that you will not get the select option in worksite if you have not added the client first. Please refer to documentation for reference</p>

                <h5 class="emp_code">Generated Client Id : {{ $client['client_auto_id'] }}</h5>
              <form class="ls_form" method="post" action="{{ URL::to(Config::get('constants.PREFIX').'/client/updateclient/'.$client['id']) }}">
                <!--user profile form ends here--> 
                <!--form section 1 starts here-->
                
                <div class="col-md-6">
               
                  <div class="form-group">
                    <label><i class="fa fa-quote-left"></i>First Name</label>
                    <input class="form-control"  placeholder="Enter first name" value="{{ $client['first_name'] }}" name="first_name" type="text" >
                  </div>
                  <div class="form-group">
                    <label><i class="fa fa-quote-right"></i>Last Name</label>
                    <input class="form-control" placeholder= "Enter last name" value="{{ $client['last_name'] }}" type="text" name="last_name" >
                  </div>
                  <div class="form-group margint10">
                    <label><i class="fa fa-check"></i> Company Name</label>
                    <input class="form-control" name="company_name"  value="{{ $client['company_name'] }}" placeholder="Name of company" type="text">
                  </div>
                  <div class="form-group">
                    <label><i class="fa fa-fax"></i> Phone Number
                      (Office)</label>
                    <input class="form-control" placeholder="Office phone number"  value="{{ $client['phone_office'] }}" name="phone_office" type="tel">
                  </div>
                  <div class="form-group">
                    <label><i class="fa fa-mobile-phone"></i> Phone Number
                      (Mobile)</label>
                    <input class="form-control" placeholder="Mobile phone number"  value="{{ $client['mobile1'] }}" type="tel"  name="mobile1">
                  </div>

                   <div class="form-group">
                    <label><i class="fa fa-mobile-phone"></i> Phone Number
                      (Mobile 2)</label>
                    <input class="form-control" placeholder="Mobile phone number"  value="{{ $client['mobile2'] }}" type="tel" name="mobile2">
                  </div>

                  <div class="form-group">
                    <label><i class="fa fa-envelope-o"></i> Email address</label>
                    <input class="form-control" placeholder="Enter email"  value="{{ $client['email'] }}" type="email" name="email">
                  </div>

                  
                </div>
                <!--form section ends here--> 
                <!--form section 2 starts here-->
                
                <div class="col-md-6">
                  

                   <label><i class="fa fa-fax"></i>Fax</label>
                    <input class="form-control"  placeholder="Fax Number"  value="{{ $client['fax'] }}" type="text"  name="fax">
                    <br>

                  <div class="form-group">
                    <label><i class="fa fa-home"></i>Address</label>
                    <input class="form-control" placeholder="block name/number or street name"  value="{{ $client['address'] }}" type="text"  name="address">
                    <br>
                    <label><i class="fa fa-thumb-tack"></i> Locality</label>
                    <input class="form-control" placeholder="locality / city"  type="text"  value="{{ $client['city'] }}" name="city">
                    <br>
                    <label><i class="fa fa-map-marker"></i> State</label>
                    <div class="form-group">
                      <div class="control-group">
                        <select id="select-your-state" class="demo-default" name="state"  placeholder="Select a state...">
                          <option value="">Select a state...</option>
                          
                        </select>
                      </div>
                    </div>
                    <label><i class="fa fa-pencil"></i> Postal Code</label>
                    <input class="form-control" placeholder="Postal Code"  value="{{ $client['postal_code'] }}" type="text" name="postal_code">
                  </div>
                  <div class="form-group">
                    <label><i class="fa fa-flag"></i> Country</label>
                    <div class="control-group">
                      <select id="select-country" class="demo-default" name="country" placeholder="Select a country...">
                        <option value="">Select a country...</option>
                       
                        <option value="United States" selected="selected">United States</option>
                        
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn ls-light-blue-btn margint5" type="submit"><i class="fa fa-cloud-upload"></i> Update
                    Client</button>
                  </div>
                </div>
                <!--form section 2 ends here-->
                
                </div>
              </form>
            </div>
            <!--veteran section ends here--> 
            
            <!--user profile form ends here--> 
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
     <script src="{{ URL::asset('assets/js/pages/pickerTool.js') }}"></script> <!--Demo for Date, Time Color Picker Script End -->
@stop