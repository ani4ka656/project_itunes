<?php
include('includes/db.php');
include('includes/header.php');
session_start();
if(empty($_POST['submit'])){
	$user_id = $_SESSION['user_id'];
	var_dump($user_id);
	var_dump($_SESSION['username']);
	echo '<h3 class=" col-md-offset-0 text-center">Форма:</h3>
	<form method="post" action="create.php" enctype="multipart/form-data">
		<div class="form-group text-center col-md-offset-0">
			<label for="singer_name">Изберете изпълнител
				<select name="singer_id">';
				$q = "SELECT * from singers";
				$singers = mysqli_query($conn, $q);
				if($singers){
					while($singer = mysqli_fetch_assoc($singers)){
					// var_dump($singer);
						echo '<option value='.$singer["singer_id"].'>'.$singer["singer_name"].'</option>';
					}
				}
				echo '</select>
				</label>
				<label for="song_name">Въведете името на песента:
					<input type="text" name="song_name" class="form-control" id="song_name"/>
				</label>
					<input type="hidden" name="user_id" class="form-control" id="user_id"value=" . $row["user_id"] . "/>
				<label for="song_url"class="form-control" >Choose the song file:
					<input type="file" name="song_url" class="col-md-4 col-md-offset-3" id="song_url"/>
				</label>
				<input type="submit" name="submit" value="Add to the database" class="btn btn-info"/>
			</div>
		</form>';
	echo "<p><a href='index.php'>Get back</a></p>";
	echo '<a href="read_singers.php">Read singers</a>';	
} else {
    if(isset($_POST['submit'])){
    	$date = date('Y-m-d');
    	$user_id = $_POST['user_id'];
		$song_name = $_POST['song_name'];
    	$singer_id = $_POST['singer_id'];
    	//echo $singer_id;
    	$name = $_FILES['song_url']['name'];
    	$size = $_FILES['song_url']['size'];
    	$type= $_FILES['song_url']['type'];
    	$tmp_name = $_FILES['song_url']['tmp_name'];
    	$submitbutton= $_POST['submit'];
    	//$dir = "songs/";
    	// var_dump($_FILES);
   		if($_FILES['song_url']['error'] == 1){
    		echo "Качвате твърде голям файл!";
    		echo("Error description: " . mysqli_error($conn)) . " Error NO - ";
			echo  mysqli_errno($conn);
    	} else{
    		if($type == "audio/mp3" || $type == "audio/wav" || $type == "video/mp4") {
			
    	// var_dump($_FILES);
 		// $time=	time('Y-m-d-h-m-s');
   //  	var_dump($time);
		//if (isset($name)) {
		$path= 'songs/';
		//if (!empty($name)){
		var_dump($song_name);
		var_dump($name);
		var_dump((int)$singer_id);
		var_dump($date);
		var_dump((int)$_SESSION['user_id']);
		if (move_uploaded_file($tmp_name, $path.$name)) {
		//	if(!empty($song_name) && !empty($singer_id)){
				$add_song ="INSERT INTO `songs`(`song_name`, `song_url`, `singer_id`, `date_of_publishing`, `user_id`) VALUES ('$song_name', '$name',".(int)$singer_id .", '$date',".(int)$_SESSION['user_id'].")";
				$add_res =mysqli_query($conn,$add_song);
				//if($add_song)
				//{
					echo 'Успешно качена!';
					echo "<div class='btn btn-dark'><p><a href='index.php'>Songs</a></p></div>";
				//}//end if add song
			//}//end if not emty
		} //if move uploaded file
		// elseif (file_exists($filename)) {
  //   			echo "Файлът $name вече съществува";
		// }
		}//end if file format
		else {
			echo("Error description: " . mysqli_error($conn)) . " Error NO - ";
			echo  mysqli_errno($conn);
    		echo "Качвате файл, различен от формата mp3,mp4,wav!";
    
			}//end if file format
		}//end else file size
		}//end if isset post submit
	}//end else
	
//}
echo '<p><div class="btn btn-default btn-lg"><a href="loggingout.php">Click here to log out</a></div></p>';
include('includes/footer.php');
    	/*$song_path = $dir.basename($_FILES['song_url']['name']);
    	 	var_dump($song_path);
	            move_uploaded_file($tmp_name,$song_path);
    			echo 'you added the song successfully';
    			$date = date('Y-m-d');
				$insert_query = "INSERT INTO `songs`(`song_name`,`song_url`, `singer_id`, `date_of_publishing`, `user_id`) VALUES ('$song_name','$song_path','$singer_name',$date,$user_id)";
				$insert_result= mysqli_query($conn, $insert_query);
				mysqli_query($conn, $insert_query);
				if ($insert_result) {
				echo "<p><a href='index.php'>Read DB</a></p>";
			}else{
				echo "Неуспешно добавяне на запис в базата данни! Моля опитайте по-късно!";
			}
    }	else{
    	echo "<a href='create.php'>Create</a>";
    }
}*/

    	
  

    	

