<!-- WILL SHOW LIST OF CATEGORIES -->

<?php
	include_once 'header.php';
?>

<html>
	<h1>CAT INDEX</h1>
	<?php  
		if (isset($_SESSION['user_email'])) {
			echo "You are logged in as ";
			echo $_SESSION["user_first"];
			echo " ";
			echo $_SESSION['user_last'];
		};
	?>

	<br>
	<a href="postCat.php">Post a new category</a>
	<a href="postItem.php">Post an Item</a>

	<br>
	<p>Results below</p>

	<?php 
		include_once './includes/dbh.inc.php';

		if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT * FROM categories";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
	    	// output data of each row
	    	while($row = mysqli_fetch_assoc($result)) {
	        	echo "id: " . $row["cat_id"]. " - Name: " . $row["cat_name"]. "<br>" . "<img src=" . $row['cat_image'] . ">" . "<a href=itemIndex.php?catId=" . $row["cat_id"] . ">View Items</a>" . "<br> <a href='editCat.php?catId=" . $row["cat_id"] . "'" . ">Edit Category</a> <hr> ";
	    	}
		} else {
    		echo "0 results";
		}

		mysqli_close($conn);
	?>


</html>