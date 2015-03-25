@extends('layouts.master') 
                    
@section('content')

<body class="login-screen">
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="login-box">
                    <div class="login-content">
                        <div class="login-user-icon">
                            <!--<i class="glyphicon glyphicon-user"></i>-->
                            <img src="{{ URL::asset('assets/images/logo.png') }}">

                        </div>
                        <h3>Identify Yourself</h3>
                        <div class="social-btn-login">
                            <ul>
                                <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-github"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-bitbucket"></i></a></li>
                            </ul>
                            
                        </div>
                    </div>
                       
                   <div class="login-form">
                        @include('notification')
                        <form id="form-login" action="{{ url('login') }}" method="post" class="form-horizontal ls_form">
                            <div class="input-group ls-group-input">
                                <input class="form-control" placeholder="Username" name="user_name" type="text" autofocus>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>


                            <div class="input-group ls-group-input">
                               <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            </div>

                            <div class="remember-me">
                                <input name="remember" class="switchCheckBox" type="checkbox" checked data-size="mini"
                                       data-on-text="<i class='fa fa-check'><i>"
                                       data-off-text="<i class='fa fa-times'><i>">
                                <span>Remember me</span>
                            </div>
                            <div class="input-group ls-group-input login-btn-box">
                                <button type="submit" class="btn ls-dark-btn ladda-button col-md-12 col-sm-12 col-xs-12" data-style="slide-down">
                                    <span class="ladda-label"><i class="fa fa-key"></i></span>
                                </button>

                                <a href="{{url('/forgotpass')}}">Forgot password</a>
                                | <a class="forgot-password" href="{{url('/')}}">Back To Amaha Electricals</a>

                            </div>
                        </form>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
    <p class="copy-right big-screen hidden-xs hidden-sm">
        <span>&#169;</span> Amaha Electricals <span class="footer-year">2014</span>
    </p>
</section>
</body>
@stop