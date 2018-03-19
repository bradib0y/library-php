<?php 
include("inc/functions.php");
include("inc/data.php");
$pageTitle = "Welcome";
$section = null;
include("inc/header.php"); ?>

<div class="section catalog random">
	<div class="wrapper">
		<h2>May we suggest something?</h2>
		<ul class="items">
		<?php 
			foreach(array_rand($catalog, 4) as $id){
				echo get_item_html($id, $catalog[$id]);
			}
			?>
			</li>
		</ul>
	</div>
</div>

<?php include("inc/footer.php"); ?>