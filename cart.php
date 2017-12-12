<?php 
	include_once 'header.php'
?>

<html>
	
	<?php
		if (isset($_SESSION['user_email'])) {
			echo "You are logged in as ";
			echo $_SESSION["user_first"];
			echo " ";
			echo $_SESSION['user_last'];
		};

		include_once './includes/dbh.inc.php';

		$cartCount = count($_SESSION['user_cart']);
		echo "<p> Cart items: $cartCount <p>";

		if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
		}

		$count = 0;
		while($count < $cartCount){

			echo "<p>" . gettype($_SESSION) . "</p>";
			$sql = "SELECT * FROM items WHERE item_id =" . $_SESSION['user_cart'][$count];
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
	    	// output data of each row
		    	while($row = mysqli_fetch_assoc($result)) {
		        	echo "id: " . $row["item_id"] . 
		        	" - Name: " . $row["item_name"];
		    	}
			} else {
	    		echo "0 results";
			}
			$count = $count+1;
		}



	?>

</html>