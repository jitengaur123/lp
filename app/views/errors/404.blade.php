@extends('layouts.master') 
                    
@section('content')
<body class="single-page">
<div id="outer-wrapper">
    <div id="inner-wrapper">
        <div class="not-found">
            <h1>4 <i class="fa fa-meh-o"></i> 4</h1>
            <p>Oops, Page not found</p>
            <a href="{{ url('/') }}"><i class="fa fa-arrow-left"></i> Go Back</a>
        </div>
    </div>
</div>
@stop