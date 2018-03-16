<?php
include('includes/db.php');
if(isset($_POST['user_name']) && isset($_POST['user_password'])){
	$user_name = $_POST['user_name'];
	$user_password = $_POST['user_password'];
	$check_query = "SELECT * FROM `users_info` WHERE user_name = '$user_name' AND user_password = '$user_password'";
	$result = mysqli_query($conn,$check_query);
	if ($result) {
		echo "Welcome";
		$read_query = "SELECT * FROM `songs` JOIN singers ON songs.singer_id=singers.singer_id JOIN users_info ON songs.user_id=users_info.user_id WHERE 1";
		$read_query= mysqli_query($conn,$read_query);
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){ 
				echo "<a href='create.php?user_id=" .$row['user_id']. "'>ADD UNIT</a>";
				echo "<tr>";
				echo "<td>" . $row['song_id'] . ' </td><td>'.$row['song_name'] . '</td><td>'.$row['singer_id'] . '</td><td>'.$row['date_of_publishing'] . '</td><td>'.$row['user_id'] . '</td><td>'.$row['rate'] . '</td></td>';

				echo "<td><a href='update.php?unit_id=" . $row['song_id'] . "'>Update</a></td>";
				echo "<td><a href='soft_delete.php?unit_id=" . $row['song_id'] . "'>SoftDelete</a></td>";
				echo "</tr>";
			}
		} else {
			echo "no";
		}
	}
}
