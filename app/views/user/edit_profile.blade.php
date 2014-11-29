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
                <h3 class="panel-title">Update or Edit User
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
                            <input class="form-control"
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
                            "radio col-lg-4"><input @if ($data['gender'] == 'male') checked @endif
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
                            <input value="{{ $data['dob'] }}" class=
                            "form-control datePickerOnly"
                            type="text" name="dob">
                        </div>

                       

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
                                <input class=
                            "form-control" name=
                            "state" placeholder=
                            "State" type="name" value="{{ $data['state'] }}">
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
                <option value="">Select a country...</option>
                <option value="AF">Afghanistan</option>
                <option value="AX">&Aring;land Islands</option>
                <option value="AL">Albania</option>
                <option value="DZ">Algeria</option>
                <option value="AS">American Samoa</option>
                <option value="AD">Andorra</option>
                <option value="AO">Angola</option>
                <option value="AI">Anguilla</option>
                <option value="AQ">Antarctica</option>
                <option value="AG">Antigua and Barbuda</option>
                <option value="AR">Argentina</option>
                <option value="AM">Armenia</option>
                <option value="AW">Aruba</option>
                <option value="AU">Australia</option>
                <option value="AT">Austria</option>
                <option value="AZ">Azerbaijan</option>
                <option value="BS">Bahamas</option>
                <option value="BH">Bahrain</option>
                <option value="BD">Bangladesh</option>
                <option value="BB">Barbados</option>
                <option value="BY">Belarus</option>
                <option value="BE">Belgium</option>
                <option value="BZ">Belize</option>
                <option value="BJ">Benin</option>
                <option value="BM">Bermuda</option>
                <option value="BT">Bhutan</option>
                <option value="BO">Bolivia, Plurinational State of</option>
                <option value="BA">Bosnia and Herzegovina</option>
                <option value="BW">Botswana</option>
                <option value="BV">Bouvet Island</option>
                <option value="BR">Brazil</option>
                <option value="IO">British Indian Ocean Territory</option>
                <option value="BN">Brunei Darussalam</option>
                <option value="BG">Bulgaria</option>
                <option value="BF">Burkina Faso</option>
                <option value="BI">Burundi</option>
                <option value="KH">Cambodia</option>
                <option value="CM">Cameroon</option>
                <option value="CA">Canada</option>
                <option value="CV">Cape Verde</option>
                <option value="KY">Cayman Islands</option>
                <option value="CF">Central African Republic</option>
                <option value="TD">Chad</option>
                <option value="CL">Chile</option>
                <option value="CN">China</option>
                <option value="CX">Christmas Island</option>
                <option value="CC">Cocos (Keeling) Islands</option>
                <option value="CO">Colombia</option>
                <option value="KM">Comoros</option>
                <option value="CG">Congo</option>
                <option value="CD">Congo, the Democratic Republic of the</option>
                <option value="CK">Cook Islands</option>
                <option value="CR">Costa Rica</option>
                <option value="CI">C&ocirc;te d'Ivoire</option>
                <option value="HR">Croatia</option>
                <option value="CU">Cuba</option>
                <option value="CY">Cyprus</option>
                <option value="CZ">Czech Republic</option>
                <option value="DK">Denmark</option>
                <option value="DJ">Djibouti</option>
                <option value="DM">Dominica</option>
                <option value="DO">Dominican Republic</option>
                <option value="EC">Ecuador</option>
                <option value="EG">Egypt</option>
                <option value="SV">El Salvador</option>
                <option value="GQ">Equatorial Guinea</option>
                <option value="ER">Eritrea</option>
                <option value="EE">Estonia</option>
                <option value="ET">Ethiopia</option>
                <option value="FK">Falkland Islands (Malvinas)</option>
                <option value="FO">Faroe Islands</option>
                <option value="FJ">Fiji</option>
                <option value="FI">Finland</option>
                <option value="FR">France</option>
                <option value="GF">French Guiana</option>
                <option value="PF">French Polynesia</option>
                <option value="TF">French Southern Territories</option>
                <option value="GA">Gabon</option>
                <option value="GM">Gambia</option>
                <option value="GE">Georgia</option>
                <option value="DE">Germany</option>
                <option value="GH">Ghana</option>
                <option value="GI">Gibraltar</option>
                <option value="GR">Greece</option>
                <option value="GL">Greenland</option>
                <option value="GD">Grenada</option>
                <option value="GP">Guadeloupe</option>
                <option value="GU">Guam</option>
                <option value="GT">Guatemala</option>
                <option value="GG">Guernsey</option>
                <option value="GN">Guinea</option>
                <option value="GW">Guinea-Bissau</option>
                <option value="GY">Guyana</option>
                <option value="HT">Haiti</option>
                <option value="HM">Heard Island and McDonald Islands</option>
                <option value="VA">Holy See (Vatican City State)</option>
                <option value="HN">Honduras</option>
                <option value="HK">Hong Kong</option>
                <option value="HU">Hungary</option>
                <option value="IS">Iceland</option>
                <option value="IN">India</option>
                <option value="ID">Indonesia</option>
                <option value="IR">Iran, Islamic Republic of</option>
                <option value="IQ">Iraq</option>
                <option value="IE">Ireland</option>
                <option value="IM">Isle of Man</option>
                <option value="IL">Israel</option>
                <option value="IT">Italy</option>
                <option value="JM">Jamaica</option>
                <option value="JP">Japan</option>
                <option value="JE">Jersey</option>
                <option value="JO">Jordan</option>
                <option value="KZ">Kazakhstan</option>
                <option value="KE">Kenya</option>
                <option value="KI">Kiribati</option>
                <option value="KP">Korea, Democratic People's Republic of</option>
                <option value="KR">Korea, Republic of</option>
                <option value="KW">Kuwait</option>
                <option value="KG">Kyrgyzstan</option>
                <option value="LA">Lao People's Democratic Republic</option>
                <option value="LV">Latvia</option>
                <option value="LB">Lebanon</option>
                <option value="LS">Lesotho</option>
                <option value="LR">Liberia</option>
                <option value="LY">Libyan Arab Jamahiriya</option>
                <option value="LI">Liechtenstein</option>
                <option value="LT">Lithuania</option>
                <option value="LU">Luxembourg</option>
                <option value="MO">Macao</option>
                <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                <option value="MG">Madagascar</option>
                <option value="MW">Malawi</option>
                <option value="MY">Malaysia</option>
                <option value="MV">Maldives</option>
                <option value="ML">Mali</option>
                <option value="MT">Malta</option>
                <option value="MH">Marshall Islands</option>
                <option value="MQ">Martinique</option>
                <option value="MR">Mauritania</option>
                <option value="MU">Mauritius</option>
                <option value="YT">Mayotte</option>
                <option value="MX">Mexico</option>
                <option value="FM">Micronesia, Federated States of</option>
                <option value="MD">Moldova, Republic of</option>
                <option value="MC">Monaco</option>
                <option value="MN">Mongolia</option>
                <option value="ME">Montenegro</option>
                <option value="MS">Montserrat</option>
                <option value="MA">Morocco</option>
                <option value="MZ">Mozambique</option>
                <option value="MM">Myanmar</option>
                <option value="NA">Namibia</option>
                <option value="NR">Nauru</option>
                <option value="NP">Nepal</option>
                <option value="NL">Netherlands</option>
                <option value="AN">Netherlands Antilles</option>
                <option value="NC">New Caledonia</option>
                <option value="NZ">New Zealand</option>
                <option value="NI">Nicaragua</option>
                <option value="NE">Niger</option>
                <option value="NG">Nigeria</option>
                <option value="NU">Niue</option>
                <option value="NF">Norfolk Island</option>
                <option value="MP">Northern Mariana Islands</option>
                <option value="NO">Norway</option>
                <option value="OM">Oman</option>
                <option value="PK">Pakistan</option>
                <option value="PW">Palau</option>
                <option value="PS">Palestinian Territory, Occupied</option>
                <option value="PA">Panama</option>
                <option value="PG">Papua New Guinea</option>
                <option value="PY">Paraguay</option>
                <option value="PE">Peru</option>
                <option value="PH">Philippines</option>
                <option value="PN">Pitcairn</option>
                <option value="PL">Poland</option>
                <option value="PT">Portugal</option>
                <option value="PR">Puerto Rico</option>
                <option value="QA">Qatar</option>
                <option value="RE">R&eacute;union</option>
                <option value="RO">Romania</option>
                <option value="RU">Russian Federation</option>
                <option value="RW">Rwanda</option>
                <option value="BL">Saint Barth&eacute;lemy</option>
                <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                <option value="KN">Saint Kitts and Nevis</option>
                <option value="LC">Saint Lucia</option>
                <option value="MF">Saint Martin (French part)</option>
                <option value="PM">Saint Pierre and Miquelon</option>
                <option value="VC">Saint Vincent and the Grenadines</option>
                <option value="WS">Samoa</option>
                <option value="SM">San Marino</option>
                <option value="ST">Sao Tome and Principe</option>
                <option value="SA">Saudi Arabia</option>
                <option value="SN">Senegal</option>
                <option value="RS">Serbia</option>
                <option value="SC">Seychelles</option>
                <option value="SL">Sierra Leone</option>
                <option value="SG">Singapore</option>
                <option value="SK">Slovakia</option>
                <option value="SI">Slovenia</option>
                <option value="SB">Solomon Islands</option>
                <option value="SO">Somalia</option>
                <option value="ZA">South Africa</option>
                <option value="GS">South Georgia and the South Sandwich Islands</option>
                <option value="ES">Spain</option>
                <option value="LK">Sri Lanka</option>
                <option value="SD">Sudan</option>
                <option value="SR">Suriname</option>
                <option value="SJ">Svalbard and Jan Mayen</option>
                <option value="SZ">Swaziland</option>
                <option value="SE">Sweden</option>
                <option value="CH">Switzerland</option>
                <option value="SY">Syrian Arab Republic</option>
                <option value="TW">Taiwan, Province of China</option>
                <option value="TJ">Tajikistan</option>
                <option value="TZ">Tanzania, United Republic of</option>
                <option value="TH">Thailand</option>
                <option value="TL">Timor-Leste</option>
                <option value="TG">Togo</option>
                <option value="TK">Tokelau</option>
                <option value="TO">Tonga</option>
                <option value="TT">Trinidad and Tobago</option>
                <option value="TN">Tunisia</option>
                <option value="TR">Turkey</option>
                <option value="TM">Turkmenistan</option>
                <option value="TC">Turks and Caicos Islands</option>
                <option value="TV">Tuvalu</option>
                <option value="UG">Uganda</option>
                <option value="UA">Ukraine</option>
                <option value="AE">United Arab Emirates</option>
                <option value="GB">United Kingdom</option>
                <option value="US">United States</option>
                <option value="UM">United States Minor Outlying Islands</option>
                <option value="UY">Uruguay</option>
                <option value="UZ">Uzbekistan</option>
                <option value="VU">Vanuatu</option>
                <option value="VE">Venezuela, Bolivarian Republic of</option>
                <option value="VN">Viet Nam</option>
                <option value="VG">Virgin Islands, British</option>
                <option value="VI">Virgin Islands, U.S.</option>
                <option value="WF">Wallis and Futuna</option>
                <option value="EH">Western Sahara</option>
                <option value="YE">Yemen</option>
                <option value="ZM">Zambia</option>
                <option value="ZW">Zimbabwe</option>
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

                    <div class="col-md-12 ls-group-input">
                        <textarea class="form-control" id=
                        "bio1" name="bio" value="{{ $data['about'] }}" placeholder=
                        "About Yourself">
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
                                "col-md-4 col-sm-12 col-xs-12 margint15"><input checked name="has_disablity" class=
                                "icheck-green" id=
                                "optionsRadios4"  type=
                                "radio" value="0">
                                No, I do not have a disability</label>
                                <label class=
                                "col-md-4 col-sm-12 col-xs-12 margint15"><input class="icheck-green"
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
                            "form-control datePickerOnly"
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