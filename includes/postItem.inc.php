<!-- WILL CONTAIN PHP FOR POSTING AN ITEM -->

<?php 

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	$cat_id = $_POST['cat_id'];
	$item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
	$item_image = mysqli_real_escape_string($conn, $_POST['item_image']);
	$item_price = floatval(str_replace(',', '', trim($_POST['item_price'])));

	//Error handlers
	//Check for empty fields
	if (empty($item_name) || empty($item_image) || empty($item_price) || empty($cat_id)){
		
		header("Location: ../postItem.php?field=empty");
		exit();
	} else{

		$sql = "INSERT INTO items (cat_id, item_name, item_image, item_price) VALUES ('$cat_id', '$item_name', '$item_image', '$item_price');";

		mysqli_query($conn, $sql);

		header("Location: ../catIndex.php?postItem=success");
		exit();
	}
} else{ //otherwise, redirect to form
	header("Location: ../postCat.php");
	exit();

}