@extends('layouts_frontend.master_frontend')
@section('title','Test Page')
@section('content')
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

    <h3>Call for Abstracts</h3>
    <p>IMS 2017 is the premier venue to share research, exchange ideas, and network with more than 7,500 anticipated endocrine researchers and practitioners
    </p>
    <a href="#"><button type="button" class="btn btn-primary down">Download Abstract Form</button></a>
    <a href="/abstractform/create"><button type="button" class="btn btn-primary up">Upload Abstract</button></a>
    <p>We will confirm you by email if we accept your abstract. Once you get confirmation, you need to register event from this website again.</p>



</div>
<!-- /.right section -->


@stop

@section('page_script')
    <script type="text/javascript" language="javascript" class="init">
        $(document).ready(function() {
        });
    </script>
@stop