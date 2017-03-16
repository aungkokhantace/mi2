@extends('layouts_frontend.master_frontend')
@section('title','Local Information')
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

    <!-- Right section -->
    <div class="col-md-9 right">
        {{--{!! generateSlider() !!}--}}

        {{--Start Slider View--}}
        <!-- Carousel & header section -->
        <div class="slider-header slider-image col-md-2">
            <img style="height:66px !important;" src="/images/Slider_logo.png" alt="">
        </div>
        <div class="slider-header col-md-10">
            18th Myanmar Internal Medicine Conference (MIMC) 2017<br>
            [In conjunction with 4th AFIM Congress and<br>
            4th ACP South East Asian Chapter Meeting]
        </div>
        <!-- Carousel Slider Part -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @if(isset($images) && count($images)>0)
                    @foreach($images as $k=>$image)
                        <div class="item @if($k == 0) active @endif">
                            <img src="/{{$image->image_url}}" alt="Image">
                        </div>
                    @endforeach
                @else
                    <div class="item active">
                        <img src="/images/aceplus_logo.png" alt="Image">
                    </div>
                @endif
            </div>
            <!-- Controls -->
            {{--<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">--}}
            {{--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>--}}
            {{--<span class="sr-only">Previous</span>--}}
            {{--</a>--}}
            {{--<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">--}}
            {{--<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>--}}
            {{--<span class="sr-only">Next</span>--}}
            {{--</a>--}}
        </div>
        <!-- end of Carousel & header section -->
        <br>
        {{--End Slider View--}}

        @if(isset($page->content) && $page->content !== "")
        {!! $page->content !!}
        <br>
        @endif
        @foreach($posts as $post)
            {!! $post->content !!}<br>
        @endforeach
    </div>
@stop

@section('page_script')
    <script type="text/javascript" language="javascript" class="init">
        $(document).ready(function() {
        });
    </script>
@stop