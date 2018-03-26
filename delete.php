<?php 
include('includes/header.php');
include('includes/db.php');
session_start();
$song_id = $_GET['song_id'];
$date = date('Y-m-d');
$delete_query = "UPDATE songs SET date_deleted ='$date' WHERE song_id = $song_id";
$delete_result = mysqli_query($conn, $delete_query);
if ($delete_result) {
	echo "You successfully deleted the song";
	echo "<p><a href='index.php'>Get back</a></p>";
}else{
		echo "Unsuccessful deletion of song in database. Please try again later!";
		echo "<p><a href='index.php'>Get Back </a></p>";
	}
include('includes/footer.php');	