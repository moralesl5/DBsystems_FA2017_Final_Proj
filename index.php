<?php
	include_once 'header.php';
?>

<section>
	<h2>Home</h2>
	<div class="nav-login">
		<?php 
			if (isset($_SESSION['user_email'])) {

				echo '<form action="includes/logout.inc.php" method="POST">
					<button type="submit" name="submit">Logout</button>
				</form>';
			} else {
				echo '<form action="includes/login.inc.php" method="POST">
					<input type="text" name="userEmail" placeholder="Email">
					<input type="password" name="userPassword" placeholder="Password">
					<button type="submit" name="submit">Login</button>
					</form>
					<a href="signup.php">Sign up</a>';
			}
		?>
		
	</div>
</section>

<?php
	include_once 'footer.php';
?>