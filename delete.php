<?php 
include('includes/header.php');
include('includes/db.php');
session_start();
$song_id = $_GET['song_id'];
$date = date('Y-m-d');
$delete_query = "UPDATE songs SET date_deleted ='$date' WHERE song_id = $song_id";
$delete_result = mysqli_query($conn, $delete_query);
if ($delete_result) {
	echo "Успешно изтрихте песентта!";
	echo "<p><a href='index.php'>Get back</a></p>";
}else{
		echo "Неуспешно изтриване в базата данни. Моля опитайте по-късно!";
		echo "<p><a href='index.php'>Get Back </a></p>";
	}
include('includes/footer.php');	