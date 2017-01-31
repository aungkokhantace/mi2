<?php

if (! function_exists('generateLists')) {
    function generateLists(array $elements, array $items, $parentId = 0, $indent = 0)
    {
        foreach ($elements as $key => $element) {
            if ($element['parent_id'] == $parentId) {
                echo '<option value ="' . $element['id'] . '" disabled>';
                echo ($indent != 0) ? str_repeat("&mdash; ", $indent) : '';
                echo $element['name'];
                foreach ($items as $key => $item) {
                    if ($item['category_id'] == $element['id']) {
                        echo '<option value="' . $item['id'] . '">';
                        echo ($indent != 0) ? str_repeat("&nbsp;&nbsp; ", $indent) : '';
                        echo $item['name'];
                        echo '</option>';
                    }
                }
                $children = generateLists($elements, $items, $element['id'], $indent + 1);
            }
        }
    }
}

if (! function_exists('generateMenuLists')) {
    function generateMenuLists(array $elements, $parentId = 0,$indent = 0) {
        foreach ($elements as $key => $element) {
            if ($element->parent_id == $parentId && $parentId == 0) {
                echo '<li class="dropdown">';
                echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$element->name.'<b class="caret"></b></a>';
                echo '<ul class="dropdown-menu">';
                echo '<li class="kopie"><a href="#">'.$element->name.'</a></li>';
                echo '</li>';
//                echo '</ul>';
                $children = generateMenuLists($elements, $element->id,$indent + 1);
            }
            elseif ($element->parent_id == $parentId) {
//                echo '<li class="dropdown">';
//                echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$element->name.'<b class="caret"></b></a>';
//                echo '<ul class="dropdown-menu">';
//                echo '<li class="kopie"><a href="#">'.$element->name.'</a></li>';
//                echo '</li>';
//                echo '</ul>';
                echo '<li><a href="#">'.$element->name.'</a></li>';
                $children = generateMenuLists($elements, $element->id,$indent + 1);
            }
//            echo '</ul>';
        }
    }
}

if (! function_exists('generateNav')) {
    function generateNav(array $parents, array $children, $parentId = 0) {
        foreach ($parents as $parent) {
            echo '<li class="dropdown">';
            echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$parent["name"].'<b class="caret"></b></a>';
            echo '<ul class="dropdown-menu">';
            echo '<li class="kopie"><a href="#">'.$parent["name"].'</a></li>';

            foreach($children as $child){
                if($child['parent_id'] == $parentId){
                    echo '<li><a href="#">'.$child["name"].'</a></li>';
                }
            }
            echo '</ul>';
            echo '</li>';

            $children = generateNav($parents, $children, $parent["id"]);
        }
    }
}

if (! function_exists('generateMainTree')) {
    function generateMainTree( $tree) {
        foreach ($tree as $mainBranch) {
            echo '<li class="dropdown">';
            echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$mainBranch->name.'<b class="caret"></b></a>';
            echo '<ul class="dropdown-menu">';
                generateTree($mainBranch->subCategories, $parentId = $mainBranch->id);
            echo '</ul>';
            echo '</li>';
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


