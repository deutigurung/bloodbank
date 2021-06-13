<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blood Bank Management System</title>
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link href="{{ asset('assets/css/style2.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min(1).css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawsom-all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/grid-gallery.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
</head>

<body>
<header class="continer-fluid ">
    <div class="header-top">
        <div class="container">
            <div class="row col-det">
                <div class="col-lg-6 d-none d-lg-block">
                    <ul class="ulleft">
                        <li>
                            <i class="far fa-envelope"></i>
                            info@cite.com
                            <span>|</span></li>
                        <li>
                            <i class="far fa-clock"></i>
                            Service Time : 12:AM</li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12">
                    <ul class="ulright">
                        <li>
                            <a href="{{ route('login') }}"><i class="fas fa-user"></i>Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="menu-jk" class="header-bottom scroll-to-fixed-fixed" style="z-index: 1000; /*position: fixed;*/ top: 0px; margin-left: 0px; width: 1349px; left: 0px;">
        <div class="container">
            <div class="row nav-row">
                <div class="col-md-3 logo">
                    <img src="{{ asset('assets/images/logo.jpg') }}" alt="">
                </div>
                <div class="col-md-9 nav-col">
                    <nav class="navbar navbar-expand-lg navbar-light">

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('/') }}">Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">About Us</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#gallery">Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#process">Process</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#blog">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">Contact US</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
{{--    <div style="display: block; width: 1349px; height: 84px; float: none;"></div>--}}
</header>
@include('layouts.notification')
