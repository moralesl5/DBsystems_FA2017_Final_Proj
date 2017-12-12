<!-- WILL CONTAIN VISUAL CODE FOR POSTING A CATEGORY -->

<?php
	include_once 'header.php';
?>

<html>
	<h1>POST NEW CAT PAGE</h1>

	<form action="includes/postCat.inc.php" method="POST">
		<input type="text" name="cat_name" placeholder="Category Name">
		<input type="text" name="cat_image" placeholder="image_url">
		<button type="submit" name="submit">Post Category</button>


	</form>
</html>