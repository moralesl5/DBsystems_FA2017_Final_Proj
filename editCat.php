<!-- WILL CONTAIN VISUAL CODE FOR EDITING A CATEGORY -->

<?php  
	include_once 'header.php';
?>

<html>
	<h1>EDIT CAT PAGE</h1>

	<form action="includes/editCat.inc.php" method="POST">
		<input type="text" name="cat_name" placeholder=
			<?php  
				include_once './includes/dbh.inc.php';

				$cat_id = $_GET['catId'];

				if (!$conn) {
    				die("Connection failed: " . mysqli_connect_error());
				}

				$sql = "SELECT * FROM categories WHERE cat_id = $cat_id";
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
			    	// output data of each row
			    	while($row = mysqli_fetch_assoc($result)) {
			        	echo $row['cat_name'];
			    	}
				} else {
	    			echo "0 results";
				}
			?>
		>
		<input type="text" name="cat_image" placeholder=
			<?php  
				include_once './includes/dbh.inc.php';

				$cat_id = $_GET['catId'];

				if (!$conn) {
    				die("Connection failed: " . mysqli_connect_error());
				}

				$sql = "SELECT * FROM categories WHERE cat_id = $cat_id";
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
			    	// output data of each row
			    	while($row = mysqli_fetch_assoc($result)) {
			        	echo $row['cat_image'];
			    	}
				} else {
	    			echo "0 results";
				}			?>

		>
		<input type="number" name="catId" value = <?php 
		include_once './includes/dbh.inc.php';

				$cat_id = $_GET['catId'];

				if (!$conn) {
    				die("Connection failed: " . mysqli_connect_error());
				}

				$sql = "SELECT * FROM categories WHERE cat_id = $cat_id";
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
			    	// output data of each row
			    	while($row = mysqli_fetch_assoc($result)) {
			        	echo $row['cat_id'];
			    	}
				} else {
	    			echo "0 results";
				}			?>

		 style="display: none">
		<button type="submit" name="submit">Update Category</button>
	</form>
</html>