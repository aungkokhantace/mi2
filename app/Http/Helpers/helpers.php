<?php

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
                echo '<li><a href="#">'. $mainBranch->name .'</a></li>';
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

?>


