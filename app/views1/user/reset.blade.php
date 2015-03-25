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
                            <img src="assets/images/logo.png">

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
                       
                    <div class="forgot-pass-box" style="display:block">
                       @include('notification')
                        <form action="{{ url('resetpass') }}" method="POST" class="form-horizontal ls_form">

                            <input type="hidden" name="token" value="{{ $token }}">
    
                            <div class="input-group ls-group-input">
                                <input class="form-control" name="email" type="text" placeholder="someone@mail.com">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            </div>

                            <div class="input-group ls-group-input">
                                <input class="form-control" name="password" type="password" >
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            </div>

                            <div class="input-group ls-group-input">
                                <input class="form-control" name="password_confirmation" type="password" >
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            </div>

                            <div class="input-group ls-group-input login-btn-box">
                                <button type="submit" class="btn ls-dark-btn col-md-12 col-sm-12 col-xs-12">
                                    <i class="fa fa-rocket"></i> Reset Password
                                </button>

                                <a class="login-view" href="{{ URL::to('/login') }}">Login</a>

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