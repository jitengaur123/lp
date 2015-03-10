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


<?php $prefix = Config::get('constants.PREFIX'); ?>

<?php $segment = Request::segment(2) ?>
<?php $thirdsegment = Request::segment(3) ?>
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

@if(Auth::user()->role != 4 && Auth::user()->role != 5 && Auth::user()->role != 6)
<li @if ($segment == 'users' || $segment == 'adduser' || $segment == "editdeleteuser") class="active" @endif>
    <a href="#">
        <i class="fa fa-group"></i> <span>Users</span> <!-- <span class="badge badge-red">58</span> --></a>
    </a>
    <ul>
        <li><a @if($segment == 'users' ) class="active" @endif href="{{ URL::to('/'.$prefix.'/users') }}">All Users</a></li>
        <li><a @if($segment == 'adduser' ) class="active" @endif href="{{ URL::to('/'.$prefix.'/adduser') }}">Add Users</a></li>
        <li><a @if ($segment == "editdeleteuser") class="active" @endif href="{{ URL::to('/'.$prefix.'/editdeleteuser') }}">Edit/Delete User</a></li>
    </ul>
</li>
    @if(Auth::user()->role != 3 && Auth::user()->role != 4 && Auth::user()->role != 5 && Auth::user()->role != 6) 
    <li @if ($segment == 'client' || $segment == "editdeleteclient") class="active" @endif>
        <a href="#">
            <i class="fa fa-group"></i> <span>Client</span> <!-- <span class="badge badge-red">58</span> --></a>
        </a>
        <ul>
            <li><a @if($segment == 'client' && $thirdsegment == "") class="active" @endif href="{{ URL::to('/'.$prefix.'/client') }}">All Client</a></li>
            <li><a @if($thirdsegment == 'create' ) class="active" @endif href="{{ URL::to('/'.$prefix.'/client/create') }}">Add Client</a></li>
            <li><a @if ($segment == "editdeleteclient") class="active" @endif href="{{ URL::to('/'.$prefix.'/editdeleteclient') }}">Edit/Delete Client</a></li>
        </ul>
    </li>
    <!-- <li @if ($segment == 'contractor' || $segment == "editdeletecontractor") class="active" @endif>
        <a href="#">
            <i class="fa fa-group"></i> <span>Sub Contractor</span> <span class="badge badge-red">58</span></a>
        </a>
        <ul>
            <li><a @if($segment == 'contractor' && $thirdsegment == "") class="active" @endif href="{{ URL::to('/'.$prefix.'/contractor') }}">All Sub Contractor</a></li>
            <li><a @if($thirdsegment == 'create' ) class="active" @endif href="{{ URL::to('/'.$prefix.'/contractor/create') }}">Add Sub Contractor</a></li>
            <li><a @if ($segment == "editdeletecontractor") class="active" @endif href="{{ URL::to('/'.$prefix.'/editdeletecontractor') }}">Edit/Delete Sub Contractor</a></li>
        </ul>
    </li> -->

    <li @if ($segment == 'worksite' || $segment == "editdeletesite") class="active" @endif>
        <a href="#">
            <i class="fa fa-building"></i>
            <span>Work Sites <!-- <span class="badge badge-red">15</span> --></span>
        </a>
        <ul>
            <li><a  @if ($segment == 'worksite' && $thirdsegment == "") class="active" @endif href="{{ URL::to('/'.$prefix.'/worksite') }}">View Work Sites</a></li>
            <li><a @if ($thirdsegment == "create") class="active" @endif href="{{ URL::to('/'.$prefix.'/worksite/create') }}">Add New Sites</a></li>
            <li><a @if ($segment == "editdeletesite") class="active" @endif href="{{ URL::to('/'.$prefix.'/editdeletesite') }}">Edit/Delete Sites</a></li>
        </ul>
    </li>

    <li @if ($segment == 'magnet' || $segment == "editdeletemagnet") class="active" @endif>
        <a href="#">
           <i class="fa fa-magnet"></i>
            <span>Magnet Board <!-- <span class="badge badge-red">15</span> --></span>
        </a>
        <ul>
            <li><a @if ($segment == 'magnet' && $thirdsegment == "") class="active" @endif href="{{ URL::to('/'.$prefix.'/magnet') }}">View Board</a></li>
            <li><a @if ($thirdsegment == "create") class="active" @endif href="{{ URL::to('/'.$prefix.'/magnet/create') }}">Allocate Users</a></li>
        </ul>
    </li>

    <li @if ($segment == 'magnetboard') class="active" @endif>
        <a href="#">
           <i class="fa fa-magnet"></i>
            <span>Magnet Board New <!-- <span class="badge badge-red">15</span> --></span>
        </a>
        <ul>
            <li><a @if ($thirdsegment == "create") class="active" @endif href="{{ URL::to('/'.$prefix.'/magnetboard/create') }}">Allocate Users</a></li>
        </ul>
    </li>

    <li @if ($segment == 'workreport' || $segment == "editdeletereport") class="active" @endif>
        <a href="#">
            <i class="fa fa-building"></i>
            <span>Work Reports <!-- <span class="badge badge-red">15</span> --></span>
        </a>
        <ul>
            <li><a  @if ($segment == 'workreport' && $thirdsegment == "") class="active" @endif href="{{ URL::to('/'.$prefix.'/workreport') }}">View Work Report</a></li>
            <li><a @if ($thirdsegment == "create") class="active" @endif href="{{ URL::to('/'.$prefix.'/workreport/create') }}">Add New Report</a></li>
            <li><a @if ($segment == "editdeletereport") class="active" @endif href="{{ URL::to('/'.$prefix.'/editdeletereport') }}">Edit/Delete Report</a></li>
        </ul>
    </li>

    <li  @if ($segment == 'post') class="active" @endif>
        <a href="#">
            <i class="fa fa-file"></i>
            <span>Posts</span>
        </a>
        <ul>
            <li><a @if ($segment == 'post' && $thirdsegment == "") class="active" @endif href="{{ URL::to('/'.$prefix.'/post') }}">View All Posts</a></li>
            <li><a @if ($thirdsegment == "create") class="active" @endif href="{{ URL::to('/'.$prefix.'/post/create') }}">Add New Post</a></li>
        </ul>
    </li>
    @endif

@if(Auth::user()->role == 1 || Auth::user()->role == 2)
<li>
    <a href="{{ URL::to('/'.$prefix.'/repository') }}">
        <i class="fa fa-copy"></i> <span>Repositories</span>
    </a>
</li>
@endif


<li>
    <a href="#">
        <i class="fa fa-file-text"></i> <span>Forms</span>
    </a>
</li>


@endif
@if(Auth::user()->role == 5 || Auth::user()->role == 6)
<li>
    <a href="{{ URL::to('/'.$prefix.'/repository/upload') }}">
        <i class="fa fa-copy"></i> <span>Upload File</span>
    </a>
</li>
@endif
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
    <a href="{{ URL::to('/'.$prefix.'/safety_instruction') }}">
        <i class="fa fa-flash"></i>
        <span>Safety Instructions</span>
    </a>
</li>
<li>
    <a href="{{ URL::to('/'.$prefix.'/chart') }}">
        <i class="fa fa-random"></i>
        <span>Organizational Chart</span>
    </a>
</li>
<li>
    <a href="{{ URL::to('/'.$prefix.'/document') }}">
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