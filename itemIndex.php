<!-- WILL INCLUDE ALL ITEMS BELONGING TO AN INDEX -->

<?php  
	include_once 'header.php';
?>

<html>
	<h1>ITEM INDEX</h1>

	<?php  
		if (isset($_SESSION['user_email'])) {
			echo "You are logged in as ";
			echo $_SESSION["user_first"];
			echo " ";
			echo $_SESSION['user_last'];
		};
	?>

	<br>
	<p>Results below</p>

	<?php  
		include_once './includes/dbh.inc.php';

		if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
		}

		$cat_id = $_GET['catId'];
		
		$sql = "SELECT * FROM items WHERE cat_id = $cat_id";
		$result = mysqli_query($conn, $sql);

		if (isset($_POST["submit"])) {

			$productId = $_POST['productId'];
	        
	        array_push($_SESSION['user_cart'], strval($productId));

	    };

		if (mysqli_num_rows($result) > 0) {
	    	// output data of each row
	    	while($row = mysqli_fetch_assoc($result)) {
	        	echo "id: " . $row["item_id"] . 
	        	" - Name: " . $row["item_name"]. 
	        	"<br>" . 
	        	"<img src=" . $row['item_image'] . ">" . 
	        	"<br>" .
	        	"<form action='itemIndex.php?catId=" . $cat_id . "' "  . "method='POST'>" .
	        		"<input type='hidden' name='productId' value=" . $row['item_id'] .">"  .
		        	"<button itemId='" . $row["item_id"] . "' " .
		        		"type='submit' name='submit'>Add to cart
		        	</button>" .
		        "</form>" .
	        	"<hr>"
	        	;
	    	}
		} else {
    		echo "0 results";
		}
	?>
</html>