<?php
$headerMenuFlag = \App\Core\Check::headerMenuFlag();
$mainMenus = \App\Core\Check::getMainMenus();
?>


 <!-- Navigation -->
<section class="header">
    <div class="container">
        <img src="images/mi2logo.png">
        &nbsp;&nbsp;&nbsp;University of Medicine 2, Yangon
    </div>
</section>
<!-- Page Content -->
<div class="container">
    <div class="row">
        {{--<div class="col-md-12">--}}
            {{--<ol class="breadcrumb nav-head">--}}
                {{--@foreach($mainMenus as $mainMenu)--}}
                    {{--<li><a href="#">{{$mainMenu->name}}</a></li>--}}
                {{--@endforeach--}}
            {{--</ol>--}}
        {{--</div>--}}

        {{--Multilevel Nav Bar--}}
        <div id="navbar">
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        {!! generateMainTree($mainMenus) !!}
                    </ul>
                </div>
            </nav>

        </div>
        {{--Multilevel Nav Bar--}}
    </div>