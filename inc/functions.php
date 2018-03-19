<?php 

    function get_item_html($id, $item) {
        $output = 
                "<li><a href='details.php?id="
                .$id
                ."'><img src='" 
                . $item["img"] . "' alt ='"
                . $item["title"] . "' />"
                . "<p>View details</p>"
                . "</a></li>"
            ;
        return $output;
    }

    function array_category($catalog, $category = null){
        if ($category == null) {return array_keys($catalog);}
        $output = array();
        foreach ($catalog as $id => $item)
        {
            if (strtolower($category) == strtolower($item["category"])){
                $output[] = $id;
            }
        }
        return $output;
    }
?>