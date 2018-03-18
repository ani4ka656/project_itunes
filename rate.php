<?php
include('includes/db.php');
include('includes/header.php');
if(isset($_POST['submit'])){
	$song_id = $_POST['song_id'];
	$rate = $_POST['rate'];
	$update_query = "UPDATE `users_songs` SET `rate_of _user`=$rate WHERE 1";
	$update_result = mysqli_query($conn, $update_query);
	if($update_result){
		echo "Thank you for your time!";
		$read_query = "SELECT AVG(`rate_of _user`) FROM `users_songs` WHERE 1";
		$result = mysqli_query($conn,$read_query);
		if($result){
			$update_query = "UPDATE `songs` SET `rate`=(SELECT AVG(`rate_of _user`) FROM `users_songs`)WHERE `date_deleted` IS NULL";
		}
	}else{
		echo "<p><a href='index.php'>Get Back</a></p>";
	}
} else{
	$song_id = $_GET['song_id'];
	echo '<h3 class=" col-md-offset-0 text-center">Форма:</h3>
	<form method="post" action="rate.php">
		<div class="form-group text-center col-md-offset-0">
			<label for="rate">
				<input type="text" name="rate" class="form-control" id="rate" autofocus>
			</label>	
			<input type="hidden" " name="song_id">
			<input type="submit" name="submit" class="btn btn-primary>
		</div>
	</form>';
}
include('includes/footer.php');