@extends('layouts_frontend.master_frontend')
@section('title','Test Page')
@section('content')

    <style>
        /*For Multilevel Nav*/

        .dropdown-menu > li.kopie > a {
            padding-left:5px;
        }

        .dropdown-submenu {
            position:relative;
        }
        .dropdown-submenu>.dropdown-menu {
            top:0;left:100%;
            margin-top:-6px;margin-left:-1px;
            -webkit-border-radius:0 6px 6px 6px;-moz-border-radius:0 6px 6px 6px;border-radius:0 6px 6px 6px;
        }

        .dropdown-submenu > a:after {
            border-color: transparent transparent transparent #333;
            border-style: solid;
            border-width: 5px 0 5px 5px;
            content: " ";
            display: block;
            float: right;
            height: 0;
            margin-right: -10px;
            margin-top: 5px;
            width: 0;
        }

        .dropdown-submenu:hover>a:after {
            border-left-color:#555;
        }

        .dropdown-menu > li > a:hover, .dropdown-menu > .active > a:hover {
            text-decoration: underline;
        }

        @media (max-width: 767px) {
            .navbar-nav  {
                display: inline;
            }
            .navbar-default .navbar-brand {
                display: inline;
            }
            .navbar-default .navbar-toggle .icon-bar {
                background-color: #fff;
            }
            .navbar-default .navbar-nav .dropdown-menu > li > a {
                color: red;
                background-color: #ccc;
                border-radius: 4px;
                margin-top: 2px;
            }
            .navbar-default .navbar-nav .open .dropdown-menu > li > a {
                color: #333;
            }
            .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
            .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
                background-color: #ccc;
            }

            .navbar-nav .open .dropdown-menu {
                border-bottom: 1px solid white;
                border-radius: 0;
            }
            .dropdown-menu {
                padding-left: 10px;
            }
            .dropdown-menu .dropdown-menu {
                padding-left: 20px;
            }
            .dropdown-menu .dropdown-menu .dropdown-menu {
                padding-left: 30px;
            }
            li.dropdown.open {
                border: 0px solid red;
            }

        }

        @media (min-width: 768px) {
            ul.nav li:hover > ul.dropdown-menu {
                display: block;
            }
            #navbar {
                text-align: center;
            }
        }

        /*For Multilevel Nav*/
    </style>

    {{--Multilevel Nav Bar--}}
    {{--<div id="navbar">--}}
    {{--<nav class="navbar navbar-default navbar-static-top" role="navigation">--}}
    {{--<div class="collapse navbar-collapse" id="navbar-collapse-1">--}}
    {{--<ul class="nav navbar-nav">--}}
    {{--{!! generateMainTree($mainResult) !!}--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</nav>--}}

    {{--</div>--}}
    {{--Multilevel Nav Bar--}}

    <!-- begin #content -->
    {{--<div id="content" class="content" style="overflow: auto;">--}}
    <!-- Right section -->
    <div class="col-md-9 right">

        <!-- Carousel & header section -->
        <div class="slider-header">
            18th IMS conference 23rd AFIM Meeting
        </div>

        <!-- Carousel Slider Part -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="/images/slider1.png" alt="">
                    <div class="carousel-caption">
                        Caption 1
                    </div>
                </div>
                <div class="item">
                    <img src="/images/slider2.png" alt="">
                    <div class="carousel-caption">
                        Caption 2
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- end of Carousel & header section -->

        <h3>Local Information</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>

        <h3>Visa Information</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>

        <h3>Housing and Travel</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>





    </div>
    <!-- /.right section -->
    {{--</div>--}}
@stop

@section('page_script')
    <script type="text/javascript" language="javascript" class="init">
        $(document).ready(function() {
        });
    </script>
@stop