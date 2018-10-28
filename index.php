<?php
include('includes/db.php');
include('includes/header.php');
session_start();
// var_dump(isset($_SESSION['user_id']));
if((isset($_POST['user_name']) && isset($_POST['user_password'])) || isset($_SESSION['user_id'])){
	if(!isset($_SESSION['user_id'])){
	
		$user_name = trim($_POST['user_name']);
		$user_password = trim($_POST['user_password']);
		$getpassword = "SELECT * FROM `users_info` WHERE user_name = '$user_name' LIMIT 1";
		$pass = mysqli_query($conn, $getpassword);
		$loginpassword = mysqli_fetch_assoc($pass);
		if (password_verify($user_password, $loginpassword['user_password'])) {
    		echo 'Password is valid!';
		

			$check_query = "SELECT * FROM `users_info` WHERE user_name = '$user_name' LIMIT 1";
	
			$check_result = mysqli_query($conn, $check_query);
	
			// var_dump($check_query);
		
			$user = mysqli_fetch_assoc($check_result);
			// var_dump($user['user_id']);
	
			if ($check_result) {
			
				$_SESSION['username'] 	= $_POST['user_name'];
				$_SESSION['user_id'] 	= $user['user_id'];
			}else {
				echo "<div class='btn btn-dark'><p><a href='loggingin.php'>Try again</a></p></div>";
			}
		} else {
			echo "<div class='btn btn-dark'><p><a href='loggingin.php'>Try again</a></p></div>";
    		echo 'Invalid password.';
		}
	}

	if(isset($_SESSION['user_id'])){
		echo "<h3 class='text-center'>Welcome, ".$_SESSION['username']."</h3>";
		// $row = mysqli_fetch_assoc($check_result);
		echo "<div class='btn btn-default btn-lg'><a href='create.php'>ADD UNIT</a></div>";
		echo '<div>'; 
		$read_query = "SELECT * FROM `songs` JOIN singers ON songs.singer_id=singers.singer_id JOIN users_info ON songs.user_id=users_info.user_id WHERE date_deleted IS NULL";
		// $read_query = "SELECT * FROM `songs` JOIN singers ON songs.singer_id=singers.singer_id JOIN users_info ON songs.user_id=users_info.user_id WHERE date_deleted IS NULL and songs.user_id =" . $_SESSION['user_id'];
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
		echo "<td>Download</td>";
		echo "<td>Delete</td>";
		echo "<td>Rate</td>";
		echo "</tr>";
		if(mysqli_num_rows($result)>0){
			//$one_row = mysqli_fetch_assoc($result);
			//echo "<div class='btn btn-info'><a href='create.php?user_id=" .$one_row['user_id']. "'>ADD UNIT</a></div>";
			while($row = mysqli_fetch_assoc($result)){
				//var_dump($row);
				$_SESSION['song_id'] = $row['song_id'];
				//echo "<div class='btn btn-info'><a href='create.php?user_id=" .$row['user_id']. "'>ADD UNIT</a></div>"; 
				echo "<tr class='info'>";
				echo "<td>" . $row['song_id'] . ' </td><td>'.$row['song_name'] . '</td><td>'.$row['song_url'] . '</td><td>'.$row['singer_name'] . '</td><td>'.$row['date_of_publishing'] . '</td><td>'.$row['user_name'] . '</td><td>'.$row['rate'] . '</td>';

				// echo "<td><a href='update.php?song_id=" . $row['song_id'] . "'>Update</a></td>";
				if($row['user_id'] == $_SESSION['user_id']){
					echo "<td><a href='download.php?song_id=" . $row['song_id'] . "'>Download</a></td>";

					echo "<td><a href='delete.php?song_id=" . $row['song_id'] . "'>Delete</a></td>";
				} else {
					echo "<td><a href='download.php?song_id=" . $row['song_id'] . "'>Download</a></td>"."<td></td>";
				}
				echo "<td><a href='rate.php?song_id=" . $row['song_id'] . "'>Rate</a></td>";
				echo "</tr>";
			}//end while
			echo "</table>";
			echo '</div>';	
			echo '<div class="btn btn-default btn-lg"><a href="read_singers.php">Read singers</a></div>';	
			echo '<p><div class="btn btn-default btn-lg"><a href="loggingout.php">Click here to log out</a></div></p>';;
		}//end if rows
	}//if isset session user_id 
	else {
			echo "<div class='btn btn-dark'><p><a href='loggingin.php'>Try again</a></p></div>";
	}

}
include('includes/footer.php');