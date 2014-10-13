<!--Left navigation user details start-->
<div class="user-image">
    <img src="{{ URL::asset('assets/images/demo/avatar-80.png') }}" alt=""/>
    
</div>
<ul class="social-icon">
    <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
    <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
    <li><a href="javascript:void(0)"><i class="fa fa-youtube"></i></a></li>
    <li><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>
</ul>
<!--Left navigation user details end-->

<!--Phone Navigation Menu icon start-->
<div class="phone-nav-box visible-xs">
    <a class="phone-logo" href="index.html" title="">
        <h1>Amaha</h1>
    </a>
    <a class="phone-nav-control" href="javascript:void(0)">
        <span class="fa fa-bars"></span>
    </a>
    <div class="clearfix"></div>
</div>
<!--Phone Navigation Menu icon start-->


<?php $prefix = Helpers::prefixUrl() ?>

<?php $segment = Request::segment(2) ?>

<ul class="mainNav">
<li>
    <a @if($segment == 'dashbord') class="active" @endif href="{{ URL::to('/'.$prefix.'/dashboard') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
</li>
<li @if ($segment == 'profile' || $segment == 'editprofile') class="active" @endif>
    <a href="#">
        <i class="fa fa-user"></i> <span>My Profile</span>
    </a>
    <ul>
        <li><a @if($segment == 'profile' ) class="active" @endif href="{{ URL::to('/'.$prefix.'/profile') }}">View Profile</a></li>
        <li><a @if($segment == 'editprofile' ) class="active" @endif href="{{ URL::to('/'.$prefix.'/editprofile') }}">Edit Profile</a></li>
    </ul>
</li>
<li @if ($segment == 'users' || $segment == 'adduser') class="active" @endif>
    <a href="#">
        <i class="fa fa-group"></i> <span>Users</span> <span class="badge badge-red">58</span></a>
    </a>
    <ul>
        <li><a @if($segment == 'users' ) class="active" @endif href="{{ URL::to('/'.$prefix.'/users') }}">All Users</a></li>
        <li><a @if($segment == 'adduser' ) class="active" @endif href="{{ URL::to('/'.$prefix.'/adduser') }}">Add Users</a></li>
    </ul>
</li>
<li>
    <a href="#">
        <i class="fa fa-building"></i>
        <span>Work Sites <span class="badge badge-red">15</span></span>
    </a>
    <ul>
        <li><a href="#">View Work Sites</a></li>
        <li><a href="#">Add New Sites</a></li>
        <li><a href="#">Edit/Delete Sites</a></li>
    </ul>
</li>
<li>
    <a href="#">
        <i class="fa fa-file"></i>
        <span>Posts</span>
    </a>
    <ul>
        <li><a href="#">Add New Post</a></li>
        <li><a href="#">View All Posts</a></li>
    </ul>
</li>
<li>
    <a href="#">
        <i class="fa fa-clock-o"></i> <span>TimeLine View</span>
    </a>
</li>
<li>
    <a href="#">
        <i class="fa fa-copy"></i> <span>Repositories</span>
    </a>
</li>
<li>
    <a href="#">
        <i class="fa fa-file-text"></i> <span>Forms</span>
    </a>
</li>
<li>
    <a href="#">
        <i class="fa fa-magnet"></i> <span>Magnet Board</span>
    </a>
</li>
<li>
    <a href="#">
        <i class="fa fa-calendar-o"></i> <span>Calender</span>
    </a>
</li>
<li>
    <a href="#">
        <i class="fa fa-gears"></i>
        <span>Settings</span>
    </a>
</li>
<li>
    <a href="#">
        <i class="fa fa-flag-o"></i>
        <span>Policies/Update</span> <span class="badge badge-red"> 15</span>
    </a>
    <ul>
        <li><a href="#">View All</a></li>
        <li><a href="#">Add New Policy Update</a></li>
    </ul>
</li>
<li>
    <a href="#">
        <i class="fa fa-flash"></i>
        <span>Safety Instructions</span>
    </a>
</li>
<li>
    <a href="#">
        <i class="fa fa-random"></i>
        <span>Organizational Chart</span>
    </a>
</li>
<li>
    <a href="#">
        <i class="fa fa-list-alt"></i>
        <span>Documentation</span>
    </a>
</li>
<li>
    <a href="{{ URL::to('/logout') }}">
        <i class="fa fa-power-off"></i>
        <span>Logout</span>
    </a>
</li>
</ul>   