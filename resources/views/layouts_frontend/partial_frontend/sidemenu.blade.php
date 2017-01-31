<?php
$headerMenuFlag = \App\Core\Check::headerMenuFlag();
$sideMenus = \App\Core\Check::getSideMenus();
?>

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
                            <li><a href="#">{{$sideMenu->name}}</a></li>
                        @endforeach
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
