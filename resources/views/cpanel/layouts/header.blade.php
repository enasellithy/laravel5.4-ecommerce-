<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>
	    @if(!empty($title)) {{$title}} @endif
	</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    {!! Html::style('public/cpanel/css/bootstrap.min.css') !!}

    <!-- Animation library for notifications   -->
    {!! Html::style('public/cpanel/css/animate.min.css') !!}

    <!--  Paper Dashboard core CSS    -->
    {!! Html::style('public/cpanel/css/paper-dashboard.css') !!}

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    {!! Html::style('public/cpanel/css/demo.css') !!}

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    {!! Html::style('public/cpanel/css/themify-icons.css') !!}
@yield('css')
</head>
<body>
<div class="wrapper">
