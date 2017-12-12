<?php

session_start();

if (isset($_POST['submit'])) {
	

	include 'dbh.inc.php';

	$userEmail = mysqli_real_escape_string($conn, $_POST['userEmail']);
	$userPassword = mysqli_real_escape_string($conn, $_POST['userPassword']);

	//Error handlers
	//Check if inputs are empty
	if (empty($userEmail) || empty($userPassword))  {
		header("Location: ../index.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE user_email = '$userEmail'";
		$results = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($results);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error");
			exit();
		} else{
			if ($row = mysqli_fetch_assoc($results)) {
				// De-hashing the password
				$hashedPwdCheck = password_verify($userPassword, $row['user_password_digest']);
				if ($hashedPwdCheck == false) {
					header("Location: ../index.php?login=error");
					exit();
				} elseif($hashedPwdCheck == true) {
					// Log in the user here

					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['user_email'] = $row['user_email'];
					$_SESSION['user_first'] = $row['user_first'];
					$_SESSION['user_last'] = $row['user_last'];
					$_SESSION['user_street'] = $row['user_street'];
					$_SESSION['user_town'] = $row['user_town'];
					$_SESSION['user_zip'] = $row['user_zip'];
					$_SESSION['user_state'] = $row['user_state'];
					$_SESSION['user_cart'] = array();

					// sending the user somewhere
					header("Location: ../catIndex.php?login=success");
					exit();
				}
			}
		}
	}
} else{
	header("Location: ../index.php?login=error");
	exit();
}