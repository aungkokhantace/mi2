<?php
$headerMenuFlag = \App\Core\Check::headerMenuFlag();
$sideMenus = \App\Core\Check::getSideMenus();
?>

<!-- Container Start and will end in footermenu.blade page -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb nav-head" style="margin-top: 0px;">
                <li><a href="#">Home</a></li>
                <li><a href="#">Library</a></li>
                <li class="active">Data</li>
            </ol>
        </div>
    </div>
    <!-- Div within Container Start and will end in footermenu.blade page -->
    <div class="row">
        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3 left">
            <div class="sidebar-nav">
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <span class="visible-xs navbar-brand">Sidebar menu</span>
                    </div>
                    <div class="navbar-collapse collapse sidebar-navbar-collapse">
                        <ul class="nav navbar-nav">
                            @foreach($sideMenus as $sideMenu)
{{--                                <li><a href="/{{$sideMenu->page_url}}">{{$sideMenu->name}}</a></li>--}}
                                <li><a href="/{{$sideMenu->page->url}}">{{$sideMenu->name}}</a></li>
                            @endforeach
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

