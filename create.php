<?php
include('includes/db.php');
if(empty($_POST['submit'])){
	$user_id = $_GET['user_id'];
	var_dump($user_id);
echo '<form method="post" action="create.php" enctype="multipart/form-data">
		<label id="singer_name">Добавете изпълнител
			<input type="text" name="singer_name" id="singer_name"/>
		</label>
		<label id="song_name">Добавете име на песента
			<input type="text" name="song_name" id="song_name"/>
		</label>
		<input type="hidden" name="user_id" id="user_id"value=" . $row["user_id"] . "/>
		<p>изберете музекален файл
			<input type="file" name="song_url" id="song_url"/>
		</p>
		<input type="submit" name="submit" value="Add to the database"/>
	</form>';
} else {
    if(isset($_POST['submit'])){
    	$user_id = $_POST['user_id'];
		$song_name = $_POST['song_name'];
    	$singer_name = $_POST['singer_name'];
    	$dir = "songs/";
    	$name = $_FILES['song_url']['name'];
    	$size = $_FILES['song_url']['size'];
    	$type= $_FILES['song_url']['type'];
    	$tmp_name = $_FILES['song_url']['tmp_name'];
    	$song_path = $dir.basename($_FILES['song_url']['name']);
   
    	 //if ((($type == "mp3") || ($type == "video/mp4") || ($type == "wav")) && ($size < 1000000)){
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
		//}
    }	else{
    	echo "<a href='create.php'>Create</a>";
    }
}

    	
  

    	

