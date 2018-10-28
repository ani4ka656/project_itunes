<?php
include('includes/header.php');
include('includes/db.php');
?>
<h3 class=" col-md-offset-0 text-center">Форма:</h3>
<form method="post" action="pswd_demo.php">
	<h2>Register</h2>
	<div class="form-group text-center col-md-offset-0">
		<label for="user_name">Insert your username:
			<input type="text" name="user_name" class="form-control" id="user_name">
		</label>
		<label for="user_password">Insert your password:
			<input type="password" name="user_password" class="form-control" id="user_password">
		</label>
		<input type="submit" name="Register" class="btn btn-danger">
	</div>
</form>
<?php
include('includes/footer.php');
