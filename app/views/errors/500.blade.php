@extends('layouts.master') 
                    
@section('content')
<body class="single-page">
<div id="outer-wrapper">
    <div id="inner-wrapper">
        <div class="not-found">
            <h1>5 <i class="fa fa-meh-o"></i> <i class="fa fa-meh-o"></i></h1>
            <p>Sorry, its not you, it's us</p>
            <a href="{{ url('/') }}"><i class="fa fa-arrow-left"></i> Go Back</a>
        </div>
    </div>
</div>
@stop