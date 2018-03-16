<?php
include('includes/db.php');
if(empty($_POST['submit'])){
	$song_id = $_GET['song_id'];
	$read_query="SELECT * FROM `songs` WHERE `date_deleted` IS NULL";
	$result = mysqli_query($conn,$read_query);
	if($result){
		echo "<p>Edit UNIT</p>
		<form action='update.php' method='post'>
	    <input type='hidden' name='song_id' value=" . $row['song_id'] . ">
		<input type='text' name='song_name' value='".$row['song_name']."'>
		<input type='submit' name='submit' value='update'>
		</form>";
	}
}else {
	
	$song_id   = $_POST['song_id'];
	$song_name = $_POST['song_name'];
	$update_query = "UPDATE `songs` SET `song_name`=$song_name WHERE `song_id`=$song_id";
	$update_result= mysqli_query($conn, $update_query);
	
	if ($update_result) {
		echo "Успешно променихте $unit_name в базата данни!";
		echo "<p><a href='index.php'>Read DB</a></p>";
	}else{
		echo "Неуспешна промяна на запис в базата данни! Моля опитайте по-късно!";
		echo "<p><a href='#'>link to somewhere ... </a></p>";
	}
}
