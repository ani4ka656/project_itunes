<?php
include('includes/db.php');
include('includes/header.php');
if(empty($_POST['submit'])){
	$user_id = $_GET['user_id'];
	var_dump($user_id);
	echo '<h3 class=" col-md-offset-0 text-center">Форма:</h3>
	<form method="post" action="create.php" enctype="multipart/form-data">
		<div class="form-group text-center col-md-offset-0">
			<label for="singer_name">Добавете изпълнител
				<input type="text" name="singer_name" class="form-control" id="singer_name"/>
			</label>
			<label for="song_name">Add the name of the song:
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
} else {
    if(isset($_POST['submit'])){
    	$user_id = $_POST['user_id'];
		$song_name = $_POST['song_name'];
    	$singer_name = $_POST['singer_name'];
    	//$dir = "songs/";
    	$name = $_FILES['song_url']['name'];
    	$size = $_FILES['song_url']['size'];
    	$type= $_FILES['song_url']['type'];
    	$tmp_name = $_FILES['song_url']['tmp_name'];
    	$submitbutton= $_POST['submit'];

		$position= strpos($name, "."); 
		$fileextension= substr($name, $position + 1);
		$fileextension= strtolower($fileextension);
		if (isset($name)) {
		$path= 'songs/';
		if (!empty($name)){
			echo "Almost";
			if (move_uploaded_file($tmp_name, $path.$name)) {
			echo 'Uploaded!';
			if(!empty($song_name) && !empty($singer_name)){
				mysql_query('INSERT INTO `songs`(`song_name`,`song_url`, `singer_id`, `date_of_publishing`, `user_id`) VALUES ("$song_name","$path.$name","$singer_name","$date","$user_id)');
			}
		}
		}
		}
	}
}
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

    	
  

    	

