<!-- WILL CONTAIN VISUAL CODE FOR POSTING AN ITEM -->

<?php
	include_once 'header.php';
?>

<html>
	<h1>POST NEW ITEM PAGE</h1>

	<form action="includes/postItem.inc.php" method="POST">
		<input type="text" name="item_name" placeholder="Item Name">
		<input type="text" name="item_image" placeholder="Item Image">
		<input type="number" name="item_price" step="0.01" placeholder="Item Price">
		<select name="cat_id">
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
	        			echo "<option id=" . $row["cat_id"]. " ". "value=" . $row['cat_id'] . ">" . $row["cat_name"] ."</option>";
	    			}
				} else {
    				echo "0 results";
				}
			?>
		</select>
		<button type="submit" name="submit">Post Item</button>


	</form>
</html>