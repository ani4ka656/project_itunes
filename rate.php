<?php
include('includes/db.php');
include('includes/header.php');
session_start();
if(isset($_POST['submit'])){
	$song_id = $_POST['song_id'];
	$rate = $_POST['rate'];
	//select за да извадиш рейтинга към момента на тази песен
	$current_song_rate= "SELECT `rate`  FROM `songs` WHERE song_id = $song_id";
	$read_rate = mysqli_query($conn, $current_song_rate);
	var_dump($read_rate);
	if($read_rate){
	var_dump($current_song_rate);
	$new_song_rate = ($current_song_rate + $rate)/2;
	$update_query = "UPDATE `songs` SET `rate`= $new_song_rate WHERE song_id = $song_id";
	$update_result = mysqli_query($conn, $update_query);
	if($update_result){
		echo "Thank you for your time!";
		echo "<p><a href='index.php'>Get Back</a></p>";
		
	}else{
		echo "<p><a href='index.php'>Get Back</a></p>";
	}
}
else{
		echo("Error description: " . mysqli_error($conn)) . " Error NO - ";
		echo  mysqli_errno($conn);

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