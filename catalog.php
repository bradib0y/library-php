<?php 
include("inc/data.php");
include("inc/functions.php");
$pageTitle ="Catalog";
$section = null;
$category = null;
if (isset($_GET["cat"])){
    $category = $_GET["cat"];
    if ($_GET["cat"] == "books")
        {
            $pageTitle ="Books";
            $section = "books";
        }
    else if ($_GET["cat"] =="movies")
        {
            $pageTitle ="Movies";
            $section = "movies";
        }    
    else if ($_GET["cat"] =="music")
        {
            $pageTitle ="Music";
            $section = "music";
        }
    }
include("inc/header.php"); ?>

<div class="section catalog page">
    <div class="wrapper">
        <h1><?php echo $pageTitle;?></h1>
    
        <ul class="items">
        <?php
        if($category != null){
        foreach(array_category($catalog, $category) as $id){
            echo get_item_html($id, $catalog[$id]);
        }}
        else{
        foreach(array_category($catalog) as $id){
            echo get_item_html($id, $catalog[$id]);
        }}
        ?>
        </ul> 
    </div>   
</div>

<?php include("inc/footer.php"); ?>