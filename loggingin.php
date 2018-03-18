<?php
include('includes/header.php');
include('includes/db.php');
?>
<h3 class=" col-md-offset-0 text-center">Форма:</h3>
<form method="post" action="index.php">
	<div class="form-group text-center col-md-offset-0">
		<label for="user_name">Insert ypur username:
			<input type="text" name="user_name" class="form-control" id="user_name" autofocus>
		</label>
		<label for="user_password">Insert your password:
			<input type="password" name="user_password" class="form-control" id="user_password">
		</label>
		<input type="submit" name="Log in" class="btn btn-danger">
	</div>
</form>
<?php
include('includes/footer.php');
