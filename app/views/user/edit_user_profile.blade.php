@extends('layouts.all') 

@section('content')
 <div class="row">
    <div class="col-md-12">
        <!--Top header start-->

        <h3 class="ls-top-header">Edit Profile</h3>
        <!--Top header end -->
        <!--Top breadcrumb start -->

        <ol class="breadcrumb">
            <li>
                <a class="fa fa-home" href="#"></a>
            </li>

            <li class="active">Edit Profile</li>
        </ol><!--Top breadcrumb start -->
    </div>
</div><!-- Main Content Element  Start-->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default userform no-border">
            <div class="panel-heading ">
                <h3 class="panel-title">Update or Edit Your
                Profile</h3>
            </div>

            <div class="panel-body">

                @include('notification')
                <form class="ls_form" name="edit_profile" id="editProfile" method="post"  enctype="multipart/form-data">
                    <!--user profile form ends here-->
                    <!--form section 1 starts here-->

                    <div class="col-md-6">
                        <div class="form-group">
                            <label><i class="fa fa-quote-left"></i> Your First Name</label>
                            <input class="form-control" placeholder="Enter first name" name="first_name" type="text" value="{{ $data['first_name'] }}">
                        </div>

                        <div class="form-group">
                            <label><i class="fa fa-quote-right"></i> Your Last Name</label>
                            <input class="form-control" name="last_name"
                            placeholder=
                            "Enter last name" type="text"
                            value="{{ $data['last_name'] }}">
                        </div>

                        <div class="form-group">
                            <label class=
                            "col-md-3 control-label no-padding padtop5">
                            <i class="fa fa-file-photo-o"></i> Profile Picture</label>

                            <div class=
                            "col-md-9 ls-group-input">
                                <input id="file-3"
                                multiple="false" type=
                                "file" name="profile_pic">
                            </div>
                        </div>

                        <div class="form-group">
                            <label><i class="fa fa-envelope-o"></i> Email address</label>
                            <input class="form-control" value="{{ $data['email'] }}"
                            placeholder="Enter email" name="email" type=
                            "email">
                        </div>

                        <div class="form-group">
                            <label><i class="fa fa-user"></i> Username</label>
                            <input class="form-control"
                            disabled placeholder="Username"
                            type="username" value="{{ $data['user_name'] }}">
                        </div>

                        <div class="form-group">
                            <label><i class="fa fa-key"></i> Change Password</label>
                            <input class="form-control" id="password"
                            name="password" placeholder=
                            "Enter New Password" type=
                            "password" >
                        </div>

                        <div class="form-group">
                            <label><i class="fa fa-random"></i> Confirm New
                            Password</label> <input class=
                            "form-control" name="cnf_password"
                            placeholder=
                            "Enter New Password Again"
                            type="password">
                        </div>

                        <div class="form-group">
                            <label><i class="fa fa-phone"></i> Emergency Contact
                            Number</label> <input class=
                            "form-control" value="{{ $data['emergency_contact_number'] }}" name="emergency"
                            placeholder=
                            "Emergency Contact Number"
                            type="tel">
                        </div>

                        <div class="form-group">
                            <div class=
                            "col-lg-4 no-padding">
                                <i class="fa fa-check-circle-o"></i> Gender
                            </div><label class=
                            "radio col-lg-4"><input @if ($data['gender'] == 'male' || $data['gender'] == '') checked @endif
                            class="icheck-green" id=
                            "optionsRadios4" name=
                            "gender" type="radio"
                            value="male"> <i class="fa fa-male"></i> Male</label>
                            <label class=
                            "radio col-lg-4"><input  @if ($data['gender'] == 'female') checked @endif class=
                            "icheck-green" id=
                            "gender4" name=
                            "gender" type="radio"
                            value="male"> <i class="fa fa-female"></i> Female</label>
                        </div>

                        <div class="form-group">
                            <label><i class="fa fa-calendar"></i> Date Of Birth</label>
                            <input value="{{ date('d/m/Y', strtotime($data['dob'])) }}" class=
                            "form-control datePickerOnly"
                            type="text" name="dob">
                        </div>
                        @if(Auth::user()->role==1)
                        <div class="form-group">
                            <label><i class="fa fa-calendar"></i> Rating</label>
                            <input value="0" @if($data['dob'] ==0)checked @endif type="radio" name="rating"> 0
                            <input value="1" @if($data['dob'] ==1)checked @endif type="radio" name="rating"> 1
                            <input value="2" @if($data['dob'] ==2)checked @endif type="radio" name="rating"> 2
                            <input value="3" @if($data['dob'] ==3)checked @endif type="radio" name="rating"> 3
                            <input value="4" @if($data['dob'] ==4)checked @endif type="radio" name="rating"> 4
                            <input value="5" @if($data['dob'] ==5)checked @endif type="radio" name="rating"> 5
                        </div>
                        @endif
                       

                    </div><!--form section ends here-->
                    <!--form section 2 starts here-->

                    <div class="col-md-6">
                        <div class="form-group">
                            <label><i class="fa fa-home"></i> Your Address</label>
                            <input class="form-control" value="{{ $data['address'] }}" name="address"
                            placeholder=
                            "House no. & street name" type=
                            "text"><br>
                            <label><i class="fa fa-thumb-tack"></i> Locality</label>
                            <input class="form-control"  name="locality"
                            placeholder="locality / city"
                            type="text" value="{{ $data['city'] }}"><br>

                            <label><i class="fa fa-map-marker"></i> State</label>
                            <div class="form-group">
                            
                            <div class="control-group">
                                 @include('layouts.states', array('selected_state'=>$data['state']))
                            </div>
                        
                        </div>

                       
                            <label><i class="fa fa-pencil"></i> Postal Code</label>
                            <input class="form-control" name="postal_code"
                            placeholder="Postal Code" value="{{ $data['postcode'] }}" type=
                            "text">
                            
                        </div>

                        <div class="form-group">
                             <label><i class="fa fa-flag"></i> Country</label>
                            <div class="control-group">
            <select id="select-country" name="country" class="demo-default" placeholder="Select a country...">
               
                <option value="United States">United States</option>
               
            </select>
            
                            </div>
                        
                        </div>

                        <div class="form-group">
                            <label><i class="fa fa-fax"></i> Phone Number
                            (Home)</label> <input name="phone_number" value="{{ $data['phone_number'] }}" class=
                            "form-control" placeholder=
                            "Home phone number" type="tel">
                        </div>

                        <div class="form-group">
                            <label><i class="fa fa-mobile-phone"></i> Phone Number
                            (Mobile)</label> <input name="mobile_number" value="{{ $data['mobile_number'] }}" class=
                            "form-control" placeholder=
                            "Mobile phone number" type=
                            "tel">
                        </div>

                        <!-- <div class="form-group">
                            <label><i class="fa fa-paper-plane"></i> Position/Job
                            Title</label> <select class=
                            "form-control" disabled>
                                <option>
                                    option one
                                </option>

                                <option selected=
                                "selected">
                                    option two
                                </option>

                                <option>
                                    option three
                                </option>

                                <option>
                                    option four
                                </option>

                                <option>
                                    option five
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><i class="fa fa-sitemap"></i> Immediate
                            Supervisor</label>
                            <select class="form-control"
                            disabled>
                                <option>
                                    option one
                                </option>

                                <option>
                                    option two
                                </option>

                                <option>
                                    option three
                                </option>

                                <option selected=
                                "selected">
                                    option four
                                </option>

                                <option>
                                    option five
                                </option>
                            </select>
                        </div> -->





                        <div class="form-group">
                            <label><i class="fa fa-globe"></i> Race</label>
                            <select class="form-control" name="race">
                                <option @if($data['race'] == 'American Indian/Alaska Native') selected="selected" @endif >
                                    American Indian/Alaska Native
                                </option>

                                <option @if($data['race'] == 'Asian') selected="selected" @endif>
                                    Asian
                                </option>

                                <option @if($data['race'] == 'Black or African American') selected="selected" @endif>
                                    Black or African American
                                </option>

                                <option @if($data['race'] == 'Hispanic or Latino') selected="selected" @endif selected=
                                "selected">
                                    Hispanic or Latino
                                </option>

                                <option @if($data['race'] == 'Native Hawaiian or Other') selected="selected" @endif>
                                    Native Hawaiian or Other
                                </option>

                                <option @if($data['race'] == 'Pacific Islander') selected="selected" @endif>
                                    Pacific Islander
                                </option>

                                <option @if($data['race'] == 'White') selected="selected" @endif>
                                    White
                                </option>

                                <option @if($data['race'] == 'Two or more races') selected="selected" @endif>
                                    Two or more races
                                </option>
                            </select>
                        </div>

                         <div class="form-group margint10">
                            <label><i class="fa fa-check"></i> Full Name Of
                            Spouse</label> <input class=
                            "form-control" value="{{ $data['spouse_name'] }}" name=
                            "spouse_name" placeholder=
                            "Name of spouse" type="name">
                        </div>

                        
                    </div><!--form section 2 ends here-->
                    @if(Auth::user()->role==1)
                    <div class="col-md-12 ls-group-input">
                        <textarea class="form-control" id=
                        "user_note" name="user_note" placeholder=
                        "Note">{{ $data['user_note'] }}
</textarea>
                    </div>
                    @endif

                    <div class="col-md-12 ls-group-input">
                        <textarea class="form-control" id=
                        "bio1" name="bio" placeholder=
                        "About Yourself">{{ $data['about'] }}
</textarea>
                    </div>

                    <div class="col-md-12">
                        <!--disabilities section starts here-->

                        <h3><i class="fa fa-wheelchair"></i> Disabilities</h3>

                        <p>You are considered to have a
                        disability if you have a physical
                        or mental impairment or medical
                        condition that substantiallylimits
                        a major life activity, or if you
                        have a history or record of such an
                        impairment or medical
                        condition.Disabilities include, but
                        are not limited to</p>

                        <div class="row disabilities">
                            <div class=
                            "col-md-3 col-sm-12 col-xs-12">
                                <label class=
                                "checkbox"><input name="disablity[]" class=
                                "icheck-green" id=
                                "inlineCheckboxNew" type=
                                "checkbox" value="Blindness">
                                Blindness</label>
                                <label class=
                                "checkbox"><input name="disablity[]" class=
                                "icheck-green" id=
                                "inlineCheckboxNew2" type=
                                "checkbox" value="Multiple sclerosis (MS)">
                                Multiple sclerosis
                                (MS)</label> <label class=
                                "checkbox"><input name="disablity[]" class=
                                "icheck-green" id=
                                "inlineCheckboxNew3" type=
                                "checkbox" value="Muscular dystrophy">
                                Muscular dystrophy</label>
                                <label class=
                                "checkbox"><input name="disablity[]" class=
                                "icheck-green" id=
                                "inlineCheckboxNew3" type=
                                "checkbox" value="Intellectual disability">
                                Intellectual disability</label>
                                <label class=
                                "checkbox"><input name="disablity[]" class=
                                "icheck-green" id=
                                "inlineCheckboxNew3" type=
                                "checkbox" value="Obsessive compulsive disorder">
                                Obsessive compulsive disorder</label>
                            </div>

                            <div class=
                            "col-md-3 col-sm-12 col-xs-12">
                                <label class=
                                "checkbox"><input name="disablity[]" class=
                                "icheck-green" id=
                                "inlineCheckbox4" type=
                                "checkbox" value="Cancer">
                                Cancer</label>
                                <label class="checkbox"><input class="icheck-green"
                                id="inlineCheckbox5" type=
                                "checkbox" value="Diabetes">
                                Diabetes</label>
                                <label class=
                                "checkbox"><input name="disablity[]" class=
                                "icheck-green" id=
                                "inlineCheckbox6" type=
                                "checkbox" value="Epilepsy">
                                Epilepsy</label>
                                <label class=
                                "checkbox"><input name="disablity[]" class=
                                "icheck-green" id=
                                "inlineCheckboxNew3" type=
                                "checkbox" value="Missing limbs or partially missing limbs">
                                Missing limbs or partially missing limbs</label>
                            </div>

                            <div class=
                            "col-md-3 col-sm-12 col-xs-12">
                                <label class=
                                "checkbox"><input name="disablity[]" class=
                                "icheck-green" id=
                                "inlineCheckbox4" type=
                                "checkbox" value="Autism">
                                Autism</label>
                                <label class="checkbox"><input class="icheck-green"
                                id="inlineCheckbox5" type=
                                "checkbox" value="HIV/AIDS">
                                HIV/AIDS</label>
                                <label class=
                                "checkbox"><input name="disablity[]" class=
                                "icheck-green" id=
                                "inlineCheckbox6" type=
                                "checkbox" value="Cerebral palsy">
                                Cerebral palsy</label>
                                <label class=
                                "checkbox"><input name="disablity[]" class=
                                "icheck-green" id=
                                "inlineCheckboxNew3" type=
                                "checkbox" value="Post‐traumatic stress disorder (PTSD)">
                                Post‐traumatic stress disorder (PTSD)
                                </label>
                            </div>

                            <div class=
                            "col-md-3 col-sm-12 col-xs-12">
                                <label class=
                                "checkbox"><input name="disablity[]" class=
                                "icheck-green" id=
                                "inlineCheckbox4" type=
                                "checkbox" value="Major depression">
                                Major depression</label>
                                <label class=
                                "checkbox"><input name="disablity[]" class=
                                "icheck-green" id=
                                "inlineCheckbox5" type=
                                "checkbox" value="Deafness">
                                Deafness</label>
                                <label class=
                                "checkbox"><input name="disablity[]" class=
                                "icheck-green" id=
                                "inlineCheckbox6" type=
                                "checkbox" value="Bipolar disorder">
                                Bipolar disorder</label>
                                <label class=
                                "checkbox"><input name="disablity[]" class=
                                "icheck-green" id=
                                "inlineCheckboxNew3" type=
                                "checkbox" value="Impairments requiring the use of a wheelchair">
                                Impairments requiring the use of a wheelchair</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label class=
                                "col-md-4 col-sm-12 col-xs-12 margint15 withoutDisablities"><input checked name="has_disablity" class=
                                "icheck-green withoutDisablities" id=
                                "optionsRadios4"  type=
                                "radio" value="0">
                                No, I do not have a disability</label>
                                <label class=
                                "col-md-4 col-sm-12 col-xs-12 margint15 withDisablities"><input class="icheck-green withDisablities"
                                id="optionsRadios4" name=
                                "has_disablity" type=
                                "radio" value="1">
                                Yes, I have or have had a
                                disability</label>
                            </div>
                        </div>
                    </div>
                    <!--disabilities section ends here-->

                    <div class="col-md-12 whitebox">
                        <!--veteran status starts-->

                        <h3><i class="fa fa-star-o"></i> Veteran Status</h3>

                         <div class=
                        "veteran">
                            <label class=
                            "checkbox"><input name="veterun_status[]" class=
                            "icheck-green" id=
                            "inlineCheckboxNew" type=
                            "checkbox" value="I am not a protected veteran."> I am not a protected veteran.</label> 

                            <label class=
                            "checkbox"><input name="veterun_status[]" class=
                            "icheck-green" id=
                            "inlineCheckboxNew2" type=
                            "checkbox" value="I am a protected veteran but I choose not to self‐identify the classifications to which I belong."> I
                            am a protected veteran but I
                            choose not to self‐identify the
                            classifications to which I
                            belong.</label> 

                            <label class=
                            "checkbox"><input name="veterun_status[]" class=
                            "icheck-green" id=
                            "inlineCheckboxNew3" type=
                            "checkbox" value="Disabled Veteran: a veteran of the U.S. military, ground, naval or air service who is entitled to compensation (or who but for the receipt of military retired pay would be entitled to compensation) under as administered by the Secretary of Veterans Affairs; or a person who was discharged or released from active duty because of a serviceconnect disability.">
                            Disabled Veteran: a veteran of
                            the U.S. military, ground,
                            naval or air service who is
                            entitled to compensation (or
                            who but for the receipt of
                            military retired pay would be
                            entitled to compensation) under
                            as administered by the
                            Secretary of Veterans Affairs;
                            or a person who was discharged
                            or released from active duty
                            because of a serviceconnect
                            disability.</label>

                            <label class=
                            "checkbox"><input name="veterun_status[]" class=
                            "icheck-green" id=
                            "inlineCheckboxNew3" type=
                            "checkbox" value="Active duty wartime or campaign badge veteran: a veteran who served on active duty in the U.S. military, ground, naval,or air service during a war, or in a campaigned or expedition for which a campaign badge has been authorized under the laws administered by the Department of Defense.">
                            Active duty wartime or campaign
                            badge veteran: a veteran who
                            served on active duty in the
                            U.S. military, ground, naval,
                            or air service during a war, or
                            in a campaigned or expedition
                            for which a campaign badge has
                            been authorized under the laws
                            administered by the Department
                            of Defense.</label>

                            <label class=
                            "checkbox"><input name="veterun_status[]" class=
                            "icheck-green" id=
                            "inlineCheckboxNew3" type=
                            "checkbox" value=" Armed forces service medal veteran: a veteran who, while services on active duty in the U.S. military, ground,naval, or air service, participated in a U.S. military operation for which an Armed Forces service medal was awarded pursuant to Executive Order 12985.">
                            Armed forces service medal
                            veteran: a veteran who, while
                            services on active duty in the
                            U.S. military, ground,naval, or
                            air service, participated in a
                            U.S. military operation for
                            which an Armed Forces service
                            medal was awarded pursuant to
                            Executive Order 12985.</label>

                            <label class=
                            "checkbox"><input name="veterun_status[]" class=
                            "icheck-green" id=
                            "inlineCheckboxNew3" type=
                            "checkbox" value="Recently separated veteran:a veteran who was discharged or released from active duty in the U.S. military,ground,  naval, or air service within the last three years.">
                            Recently separated veteran:a veteran who was discharged or released from active duty in the U.S. military,ground,  naval, or air service within the last three years.</label>
                        </div>
                        <div class="padtop15"><div class="form-group">
                            <label><i class="fa fa-calendar"></i> Date Of Discharge (if recently seperated veteran)</label>
                            <input name="date_of_discharge" class=
                            "form-control datePickerOnly" value="{{ date('d/m/Y', strtotime($data['date_of_discharge'])) }}"
                            type="text">
                        </div>

                        <div class="row">
                            <div class="col-md-12 no-padding">
                            
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn ls-light-blue-btn" type="submit"><i class="fa fa-cloud-upload"></i> Update Profile</button>                        </div>
                        </div>
                    </div>

                       

                </form>
            </div><!--veteran section ends here-->


            <!--user profile form ends here-->
        </div>
    </div>
</div>


</div>
<script type="text/javascript">
  $(function(){

    $('.withoutDisablities').on('click', function(){
      $('.disabilities').slideUp();
    });

    $('.withDisablities').on('click', function(){
      $('.disabilities').slideDown();
    });
  });
</script>

<!-- Main Content Element  End-->
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