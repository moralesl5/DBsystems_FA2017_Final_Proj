<?php
	include_once 'header.php';
?>

<section>
	<h2>Home</h2>
	<div class="nav-login">
		<form>
			<input type="text" name="uid" placeholder="Username/email">
			<input type="password" name="pwd" placeholder="Password">
			<button type="submit" name="submit">Login</button>
		</form>
		<a href="signup.php">Sign up</a>
	</div>
</section>

<?php
	include_once 'footer.php';
?>