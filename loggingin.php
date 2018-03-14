<?php
include('includes/header.php');
include('includes/db.php');
?>
<form method="post" action="index.php">
	<label id="user_name">
		<input type="text" name="user_name" id="user_name">
	</label>
	<label id="user_password">
		<input type="password" name="user_password" id="user_password">
	</label>
	<input type="submit" name="submit">
</form>
