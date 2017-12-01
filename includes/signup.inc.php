<?php
 
 // IF PEOPLE PRESS THE SIGN UP BUTTON THEY WELL HAVE ACCESS
if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	// Converting potential code input to text, more secure
	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$street = mysqli_real_escape_string($conn, $_POST['street']);
	$town = mysqli_real_escape_string($conn, $_POST['town']);
	$zip = mysqli_real_escape_string($conn, $_POST['zip']);
	$state = mysqli_real_escape_string($conn, $_POST['state']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error Handlers
	//Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($street) || empty($town) || empty($zip) || empty($state) || empty($pwd)) {
		
		header("Location: ../signup.php?signup=empty");
		exit();

	} else{
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
			
			header("Location: ../signup.php?signup=invalid");
			exit();

		} else{
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				
				header("Location: ../signup.php?signup=email");
				exit();
			} else{
				$sql = "SELECT * FROM users WHERE user_email='$email'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: ../signup.php?signup=emailtaken");
					exit();
				} else{
					//Password Hash
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

					//Insert user into the database
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_street, user_town, user_zip, user_state, user_password_digest) VALUES ('$first','$last','$email','$street','$town','$zip','$state','$hashedPwd');"; 

					mysqli_query($conn, $sql);

					header("Location: ../signup.php?signup=sucess");
					exit();
				}
			}
		}
	}



} else{ // OTHERWISE, REDIRECTED TO SIGNUP
	header("Location: ../signup.php");
	exit();
}