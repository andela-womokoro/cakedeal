<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The 3 meta tags above *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')</title>
    <!--<link href="/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <!-- Navigation bar -->
    <nav class="navbar navbar-default top-navbar">
        <div class="container">
           <div class="row">
                <div class="col-md-4" style="padding-top: 15px; text-align: left;">
                    <a href=""><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;+234 803 000 0000</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href=""><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;info@cakedeal.com</a>
                </div>
                <div class="col-md-8" style="padding-top: 15px; text-align: right;">
                    <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href=""><i class="fa fa-google" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <nav class="navbar mid-navbar">
        <div class="container">
           <div class="row">
                <div class="col-md-3">
                    <a href="/">
                        <span class="title-left"><i class="fa fa-birthday-cake" aria-hidden="true"></i>&nbsp;CAKE</span>
                        <span class="title-right">DEAL</span>
                    </a>
                </div>
                <div class="col-md-9">
                    <a href="auth/login"><i class="fa fa-sign-in" aria-hidden="true"></i></i>&nbsp;Login</a>
                </div>
            </div>
        </div>
    </nav>
    <nav class="navbar bottom-navbar">
        <div class="container">
           <div class="row">
                <div class="col-md-12">
                    <a href="">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="">About Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="">Our range</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <nav class="navbar navbar-default footer-top">
        <div class="container">
           <div class="row" style="padding-top: 25px;">
                <div class="col-sm-2">
                    <span class="title-left">CAKE</span>
                    <span class="title-right">DEAL</span>
                    <br clear="left" />
                </div>
                <div class="col-sm-2">
                     <div class="dealer-thumbs"></div>
                </div>
                <div class="col-sm-2">
                     <div class="dealer-thumbs"></div>
                </div>
                <div class="col-sm-2">
                     <div class="dealer-thumbs"></div>
                </div>
                <div class="col-sm-2">
                     <div class="dealer-thumbs"></div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12" style="padding-top: 25px; text-align: center;">
                    <br />
                </div>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-default footer-bottom">
        <div class="container">
           <div class="row">
                <div class="col-md-12" style="padding-top: 25px; text-align: center; font-size:12px;">
                    Copyright &copy; 2016 cakedeal.com. All rights reserved. Powered by <a href="https://laravel.com/">Laravel</a>. Designed by <a href="https://github.com/andela-womokoro">Wilson Omokoro</a> and <a href="https://github.com/andela-sakande">Surajudeen Akande</a>, from <a href="http://www.andela.com/">Andela</a>.
                </div>
            </div>
        </div>
    </nav>

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <script src="/js//jquery-2.1.4.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
</body>
</html>
