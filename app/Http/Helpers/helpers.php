<?php
//start function for multilevel bootstrap navbar //for head and main menus
if (! function_exists('generateMainTree')) {
    function generateMainTree( $tree) {
        foreach ($tree as $mainBranch) {
            if(isset($mainBranch->subCategories) && count($mainBranch->subCategories)>0) {
                echo '<li class="dropdown">';
                echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $mainBranch->name . '<b class="caret"></b></a>';
                echo '<ul class="dropdown-menu">';
                generateTree($mainBranch->subCategories, $parentId = $mainBranch->id);
                echo '</ul>';
                echo '</li>';
            }
            else{
                if($mainBranch->menu_id == 2 && $mainBranch->name != "Home"){
                    echo '<li><a href="/comingsoon">'. $mainBranch->name .'</a></li>';
                }
                else if($mainBranch->menu_id == 2 && $mainBranch->name == "Home"){
                    echo '<li><a href="/home">'. $mainBranch->name .'</a></li>';
                }
                else{
                    echo '<li><a href="#">'. $mainBranch->name .'</a></li>';
                }
            }
        }
    }
}

if (! function_exists('generateTree')) {
    function generateTree( $mainBranch, $parentId = 0) {
        foreach($mainBranch as $branch){
            if($branch->parent_id == $parentId && $parentId != 0){
                if(isset($branch->subCategories) && count($branch->subCategories)>0){
                    echo '<li class="dropdown dropdown-submenu">';
                    echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$branch->name.'</a>';
                    echo '<ul class="dropdown-menu">';
                    generateTree($branch->subCategories, $branch->id);
                    echo '</ul>';
                    echo '</li>';
                }
                else{
                    echo '<li><a href="#">'.$branch->name.'</a></li>';
                }
            }

        }
        return;
    }
}
//end function for multilevel bootstrap navbar //for head and main menus

//start function for multilevel bootstrap sidebar //for head and side menus
if (! function_exists('generateMainSideTree')) {
    function generateMainSideTree($tree) {
        foreach ($tree as $k=>$mainBranch) {
            if(isset($mainBranch->subCategories) && count($mainBranch->subCategories)>0) {
                if(++$k == count($tree)){ //add border bottom = 0 for last <a> element of sidebar
                    echo '<a href="#'. $mainBranch->id .'_submenu" class="list-group-item list-group-item-success" style="border-bottom:0px !important" data-toggle="collapse" data-parent="#MainMenu">'. $mainBranch->name .'<i class="fa fa-caret-down" style="float:right;"></i></a>';
                    echo '<div class="collapse" id="'.$mainBranch->id .'_submenu">';
                    generateSideTree($mainBranch->subCategories, $parentId = $mainBranch->id);
                    echo '</div>';
                }
                else{
                    echo '<a href="#'. $mainBranch->id .'_submenu" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">'. $mainBranch->name .'<i class="fa fa-caret-down" style="float:right;"></i></a>';
                    echo '<div class="collapse" id="'.$mainBranch->id .'_submenu">';
                    generateSideTree($mainBranch->subCategories, $parentId = $mainBranch->id);
                    echo '</div>';
                }
            }
            else{
                if(++$k == count($tree)){ //add border bottom = 0 for last <a> element of sidebar
                    echo '<a href="/'. $mainBranch->url .'" class="list-group-item list-group-item-success" style="border-bottom:0px !important" data-parent="#MainMenu">'. $mainBranch->name .'</a>';
                }
                else{
                    echo '<a href="/'. $mainBranch->url .'" class="list-group-item list-group-item-success" data-parent="#MainMenu">'. $mainBranch->name .'</a>';
                }

            }
        }
    }
}

if (! function_exists('generateSideTree')) {
    function generateSideTree( $mainBranch, $parentId = 0) {
        foreach($mainBranch as $k=>$branch){
            if($branch->parent_id == $parentId && $parentId != 0){
                if(isset($branch->subCategories) && count($branch->subCategories)>0){
                    echo '<a href="#'. $branch->id .'_submenu" class="list-group-item" data-toggle="collapse" data-parent="#'. $branch->parent_id .'_submenu">'. $branch->name .'<i class="fa fa-caret-down" style="float:right;"></i></a>';
                    echo '<div class="collapse list-group-submenu" id="'. $branch->id .'_submenu">';
                    generateSideTree($branch->subCategories, $branch->id);
                    echo '</div>';
                }
                else{
                    echo '<a href="/'. $branch->url .'" class="list-group-item" data-parent="#'. $branch->parent_id .'_submenu">'. $branch->name .'</a>';
                }
            }
        }
        return;
    }
}
//end function for multilevel bootstrap sidebar //for head and side menus

if (! function_exists('generateSlider')) {
    function generateSlider() {
        echo '<!-- Carousel & header section -->';
        echo '<div class="slider-header slider-image col-md-2">';
        echo '<img style="height:66px !important;" src="/images/slider_logo.png" alt="">';
        echo '</div>';
        echo '<div class="slider-header col-md-10">';
        echo '18th Myanmar Internal Medicine Conference (MIMC) 2017'.'<br>';
        echo '[In conjunction with 4th AFIM Congress and'.'<br>';
        echo '4th ACP South East Asian Chapter Meeting]';
        echo '</div>';
        echo '<!-- Carousel Slider Part -->';
        echo '<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">';
//        echo '<!-- Indicators -->';
//        echo '<ol class="carousel-indicators">';
//        echo '<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';
//        echo '<li data-target="#carousel-example-generic" data-slide-to="1"></li>';
//        echo '<li data-target="#carousel-example-generic" data-slide-to="2"></li>';
//        echo '</ol>';
        echo '<!-- Wrapper for slides -->';
        echo '<div class="carousel-inner" role="listbox">';
        echo '<div class="item">';
        echo '<img src="/images/slider1.png" alt="">';
        echo '<div class="carousel-caption">';
//        echo 'Caption 1';
        echo '</div>';
        echo '</div>';
        echo '<div class="item">';
        echo '<img src="/images/slider2.png" alt="">';
        echo '<div class="carousel-caption">';
//        echo 'Caption 2';
        echo '</div>';
        echo '</div>';
        echo '<div class="item active">';
        echo '<img src="/images/slider3.jpg" alt="">';
        echo '<div class="carousel-caption">';
//        echo 'Caption 3';
        echo '</div>';
        echo '</div>';
        echo '<!-- Controls -->';
        echo '<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">';
        echo '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>';
        echo '<span class="sr-only">Previous</span>';
        echo '</a>';
        echo '<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">';
        echo '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>';
        echo '<span class="sr-only">Next</span>';
        echo '</a>';
        echo '</div>';
        echo '<!-- end of Carousel & header section -->';
        echo '<br>';
    }
}

?>


