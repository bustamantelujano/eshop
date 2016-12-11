@extends('layouts.app')
@section('content')
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>404 - page not found</title>
    
    <link href="http://www.convoyinteractive.com/errorPages/css/screen.css" rel="stylesheet" type="text/css" media="screen" />
    
    <script type="text/javascript" src="http://www.convoyinteractive.com/js/lib.min.js"></script>
    <script type="text/javascript" src="http://www.convoyinteractive.com/errorPages/js/404.js"></script>


</head>
    <div id="mWrapper">
        <img class="fullScreen" src="http://www.convoyinteractive.com/errorPages/img/404.jpg" width="1200" height="800" alt="error 404 - file not found">
    </div>
        
            @if (session('mensaje'))

    
        <a class="h2" href="/">ERROR</a>
        <a href="" type="button" style="font-size: 26px" class="btn btn-success">inicio</a>
        <a class=""> {{session('mensaje')}}</a>
    


@endsection
