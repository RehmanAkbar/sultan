<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">


    <link rel="stylesheet" href="{{ URL::asset('css/perfume_header.css') }}" />

    <link href="{{URL::asset('css/starter.css') }}" rel="stylesheet">
    <link href="{{URL::asset('css/admininfo.css') }}" rel="stylesheet">
    <link href="{{URL::asset('css/style.css') }}" rel="stylesheet">
    <link href="{{URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{URL::asset('css/skin-blue.min.css') }}" rel="stylesheet">
    <link href="{{URL::asset('css/skin-purple.min.css') }}" rel="stylesheet">
    <link href="{{URL::asset('css/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{URL::asset('Font-Awesome-master/Font-Awesome-master/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/skins/_all-skins.min.css')}}">


    <script src="{{URL::asset('js/jquery-3.1.1.js') }}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{URL::asset('js/dashboard.js') }}"></script>
    {{--<script src="{{URL::asset('js/jquery-2.1.3.min.js') }}"></script>--}}

    <script src="{{asset('js/bootbox.min.js')}}"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">



    <title> @yield('title')</title>

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">