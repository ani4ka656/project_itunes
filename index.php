<?php
include('includes/db.php');
include('includes/header.php');
if(isset($_POST['user_name']) && isset($_POST['user_password'])){
	$user_name = $_POST['user_name'];
	$user_password = $_POST['user_password'];
	$check_query = "SELECT * FROM `users_info` WHERE user_name = '$user_name' AND user_password = '$user_password'";
	$result = mysqli_query($conn,$check_query);
	if ($result) {
		echo "<h3 class='text-center'>Welcome</h3>";
		$row = mysqli_fetch_assoc($result);
		echo "<div class='btn btn-default btn-lg'><a href='create.php?user_id=" .$row['user_id']. "'>ADD UNIT</a></div>";
		echo '<div>'; 
		$read_query = "SELECT * FROM `songs` JOIN singers ON songs.singer_id=singers.singer_id JOIN users_info ON songs.user_id=users_info.user_id WHERE date_deleted IS NULL";
		$result= mysqli_query($conn,$read_query);
		echo "<table border=1 class='table table-striped'>";
		echo "<tr>";
		echo "<td>Song id</td>";
		echo "<td>Song name </td>";
		echo "<td>Song url</td>";
		echo "<td>Song artist</td>";
		echo "<td>Date of publishing</td>";
		echo "<td>User who published it</td>";
		echo "<td>Rate</td>";
		echo "<td>Update</td>";
		echo "<td>Delete</td>";
		echo "<td>Rate</td>";
		echo "</tr>";
		if(mysqli_num_rows($result)>0){
			//$one_row = mysqli_fetch_assoc($result);
			//echo "<div class='btn btn-info'><a href='create.php?user_id=" .$one_row['user_id']. "'>ADD UNIT</a></div>";
			while($row = mysqli_fetch_assoc($result)){
				//echo "<div class='btn btn-info'><a href='create.php?user_id=" .$row['user_id']. "'>ADD UNIT</a></div>"; 
				echo "<tr class='info'>";
				echo "<td>" . $row['song_id'] . ' </td><td>'.$row['song_name'] . '</td><td>'.$row['song_url'] . '</td><td>'.$row['singer_name'] . '</td><td>'.$row['date_of_publishing'] . '</td><td>'.$row['user_name'] . '</td><td>'.$row['rate'] . '</td>';

				echo "<td><a href='update.php?song_id=" . $row['song_id'] . "'>Update</a></td>";
				echo "<td><a href='delete.php?song_id=" . $row['song_id'] . "'>Delete</a></td>";
				echo "<td><a href='rate.php?song_id=" . $row['song_id'] . "'>Rate</a></td>";
				echo "</tr>";
			}
			echo "</table>";
				echo '</div>';		}
	}  else {
			echo "<a href='logggingin.php'>Try again</a>";
	}
}
include('includes/footer.php');