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
        foreach ($tree as $mainBranch) {
            if(isset($mainBranch->subCategories) && count($mainBranch->subCategories)>0) {
                echo '<a href="#'. $mainBranch->id .'_submenu" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">'. $mainBranch->name .'<i class="fa fa-caret-down" style="float:right;"></i></a>';
                echo '<div class="collapse" id="'.$mainBranch->id .'_submenu">';
                generateSideTree($mainBranch->subCategories, $parentId = $mainBranch->id);
                echo '</div>';
            }
            else{
                echo '<a href="/'. $mainBranch->url .'" class="list-group-item list-group-item-success" data-parent="#MainMenu">'. $mainBranch->name .'</a>';
            }
        }
    }
}

if (! function_exists('generateSideTree')) {
    function generateSideTree( $mainBranch, $parentId = 0) {
        foreach($mainBranch as $branch){
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

?>


