<?php
include('includes/db.php');
include('includes/header.php');
if(empty($_POST['submit'])){
	$song_id = $_GET['song_id'];
	$read_query="SELECT * FROM `songs` WHERE `date_deleted` IS NULL";
	$result = mysqli_query($conn,$read_query);
	if($result){
		$row = mysqli_fetch_assoc($result);
		echo "<h2 class='text-center'>Edit song name</h2>
		<h3 class='col-md-offset-0 text-center'>Форма:</h3>
		<form action='update.php' method='post'>
			<div class='form-group text-center col-md-offset-0'>
	    		<input type='hidden' name='song_id' value=" . $row['song_id'] . ">
	    		<label for='song_name' class='form-control'>Add the new name of the song:
					<input type='text' name='song_name' id='song_name'>
				</label>
				<input type='submit' name='submit' value='Update' class='btn btn-succes'>
			</div>
		</form>";
	}
}else {
	$song_id   = $_POST['song_id'];
	$song_name = $_POST['song_name'];
	$update_query = "UPDATE `songs` SET `song_name`=$song_name WHERE `song_id`=$song_id";
	$update_result= mysqli_query($conn, $update_query);
	
	if ($update_result) {
		echo "You successffully changed the name of the song";
		echo "<p><a href='index.php'>Read DB</a></p>";
	}else{
		echo "You did not succeed in changing the song name!";
		echo "<p><a href='update.php'>Try again</a></p>";
	}
}
include('includes/footer.php');