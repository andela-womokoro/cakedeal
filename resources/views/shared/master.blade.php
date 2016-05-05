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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.12.0/bootstrap-social.min.css">
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
                    @if (Auth::check())
                    <a href="/dashboard">
                    @else
                    <a href="/">
                    @endif
                        <span class="title-left"><i class="fa fa-birthday-cake" aria-hidden="true"></i>&nbsp;CAKE</span>
                        <span class="title-right">DEAL</span>
                    </a>
                </div>
                <div class="col-md-9">
                @if( ! Auth::check() )
                    <a href="" data-toggle="modal" data-target="#LoginModal"><i class="fa fa-sign-in" aria-hidden="true"></i></i>&nbsp;Login</a>
                @else
                    <a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Log Out</a>
                @endif
                </div>
            </div>
        </div>
    </nav>
    <nav class="navbar bottom-navbar">
        <div class="container">
           <div class="row">
                <div class="col-md-12"> 
                    @if (Auth::check())
                        <a href="/dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="/product/upload"><i class="fa fa-star" aria-hidden="true"></i>&nbsp;Sell Cakes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="/product"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Order Cake</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="/profile"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;My Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @else
                        <a href="">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="">About Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="">Our range</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="">Contact</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Modal -->
    <div id="LoginModal" class="modal fade in" role="dialog">
      <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <br /><br />
      <h4 class="modal-title"></h4>
      <a href="/auth/facebook" class="btn btn-block btn-social btn-facebook">
        <span class="fa fa-facebook"></span>
        Login with Facebook
      </a>
      <a href="/auth/google" class="btn btn-block btn-social btn-google">
        <span class="fa fa-google"></span>
        Login with Google
      </a>
          </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    @include('sweet::alert')

    @yield('content')

    <!-- Footer -->
    <nav class="navbar navbar-default footer-top">
        <div class="container">
           @if (! Auth::check())
               <div class="row" style="padding-top: 25px; padding-bottom: 50px; border-bottom:1px ridge #ddd;">
                    <div class="col-md-2">
                        <span class="title-left">CAKE</span>
                        <span class="title-right">DEAL</span>
                        <br clear="left" />
                        <span style="font-size:11px; color: #898783">
                        Top cake merchants
                        </span>
                    </div>
                    @for($i = 0; $i < 4; $i++)
                        <div class="col-md-2">
                            <center>
                                 <img src="images/dealer_thumb.jpeg" class="dealer-thumbs shadow1" />
                                 <br />
                                 <span style="font-size:11px; color: #898783;">
                                     <b>Jane Doe</b>
                                     <br />Since 23 Dec 2015
                                 </span>
                             </center>
                        </div>
                    @endfor
                    <div class="col-md-2"></div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12" style="padding: 25px; text-align: center; font-size:12px;">
                    <a href="">Privacy Policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="">Refund Policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="">About</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="">Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="">FAQs</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="">Careers</a>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
</body>
</html>
