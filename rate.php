<?php
include('includes/db.php');
include('includes/header.php');
session_start();
if(empty($_POST['submit'])){
	$song_id = $_GET['song_id'];
	// var_dump($song_id);
	$read_rate = "SELECT `song_id`, `rate`  FROM `songs` WHERE song_id = $song_id";
	$rate_result = mysqli_query($conn, $read_rate);
	$row = mysqli_fetch_assoc($rate_result);
	// var_dump($row);
	echo '<h3 class=" col-md-offset-0 text-center">Форма:</h3>
	<form method="post" action="rate.php">
		<div class="form-group text-center col-md-offset-0">
			<label for="rate">Въведете вашият рейтинг
				<input type="number" name="rate" class="form-control" id="rate" autofocus>
			</label>	
		    <input type="hidden" name="song_id" value=' . $row['song_id'] . '>
			<input type="submit" name="submit" class="btn btn-primary>
		</div>
	</form>';
}
else{
	$song_id = $_POST['song_id'];
	var_dump($song_id);
	$rate = $_POST['rate'];
	var_dump($rate);
	//select за да извадиш рейтинга към момента на тази песен
	$read_rate = "SELECT `rate`  FROM `songs` WHERE song_id = $song_id";
	$rate_result = mysqli_query($conn, $read_rate);
	//var_dump($rate_result);
	if($rate_result){
	$row = mysqli_fetch_assoc($rate_result);
	$current_song_rate= $row['rate'];
	//var_dump($current_song_rate);
	//echo("Error description: " . mysqli_error($conn)) . " Error NO - ";
	//echo  mysqli_errno($conn);
	$new_song_rate = ($current_song_rate+ $rate)/2;
	var_dump($new_song_rate);
	$update_query = "UPDATE `songs` SET `rate`= $new_song_rate WHERE song_id = $song_id";
	$update_result = mysqli_query($conn, $update_query);
	if($update_result){
		echo "Thank you for your time!";
		echo "<p><a href='index.php'>Get Back</a></p>";
	}else{
			echo "<p><a href='index.php'>Get Back</a></p>";
	}
}
}
include('includes/footer.php');