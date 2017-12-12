<!-- WILL CONTAIN PHP CODE FOR EDITING A CATEGORY -->

<?php 

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	$cat_id = $_POST['catId'];
	$cat_name = mysqli_real_escape_string($conn, $_POST['cat_name']);
	$cat_image = mysqli_real_escape_string($conn, $_POST['cat_image']);

	//Error handlers
	//Check for empty fields
	if (empty($cat_name) || empty($cat_image)) {
		
		header("Location: ../editCat.php?field=empty");
		exit();
	} else{

		$sql = ("UPDATE categories SET cat_name = '$cat_name', cat_image = '$cat_image' WHERE cat_id = '$cat_id'");

		mysqli_query($conn, $sql);

		header("Location: ../catIndex.php?editCat=success");
		exit();
	}
} else{ //otherwise, redirect to form
	header("Location: ../editCat.php");
	exit();

}