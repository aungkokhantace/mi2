<?php
$headerMenuFlag = \App\Core\Check::headerMenuFlag();
$sideMenus = \App\Core\Check::getSideMenus();
$url = Request::path();
$breadCrumbArr = explode("/",$url);
$breadCrumbLink = "/";
?>

<!-- Container Start and will end in footermenu.blade page -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            {{--Render Breadcrumb--}}
            @if(isset($breadCrumbArr) && $breadCrumbArr[0] != "")
            <ol class="breadcrumb nav-head" style="margin-top: 0px;">
                @foreach($breadCrumbArr as $bread)
                    {{--skip page_id section for breadcrumb--}}
                    @if(!is_numeric($bread))
                    <?php $breadCrumbLink .= $bread.'/'; ?>
                    <li><a href="{{$breadCrumbLink}}">{{ucwords($bread)}}</a></li>
                    @endif
                @endforeach
            </ol>
            @else
                <ol class="breadcrumb nav-head" style="margin-top: 0px;">
                    <li></li>
                </ol>
            @endif
            {{--Render Breadcrumb--}}
        </div>
    </div>
    <!-- Div within Container Start and will end in footermenu.blade page -->
    <div class="row">

        {{--Render multilevel sidebar--}}
                <div class="col-md-3 left">
                    <div id="MainMenu">
                        <div class="list-group panel">
                            {!! generateMainSideTree($sideMenus) !!}
                        </div>
                    </div>
                </div>
        {{--Render multilevel sidebar--}}

