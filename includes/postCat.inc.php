<!-- WILL CONTAIN PHP FOR POSTING A CATEGORY -->

<?php 

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	$cat_name = mysqli_real_escape_string($conn, $_POST['cat_name']);
	$cat_image = mysqli_real_escape_string($conn, $_POST['cat_image']);

	//Error handlers
	//Check for empty fields
	if (empty($cat_name) || empty($cat_image)) {
		
		header("Location: ../postCat.php?field=empty");
		exit();
	} else{

		$sql = "INSERT INTO categories (cat_name, cat_image) VALUES ('$cat_name', '$cat_image');";

		mysqli_query($conn, $sql);

		header("Location: ../catIndex.php?postCat=success");
		exit();
	}
} else{ //otherwise, redirect to form
	header("Location: ../postCat.php");
	exit();

}