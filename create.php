<?php
if(empty($_POST['submit'])){
echo '<form method="post" action="create.php" ">
		<label id=" singer_name">Добавете изпълнител
			<input type="text" name="singer_name" id="singer_name">
		</label>
	</form>
	<form method="post" action="create.php" enctype="multipart/form-data>
		<p>изберете музекален файл
			<input type="file" name="song_name">
		</p>
		<input type="submit" name="submit" value="Добявете към базата данни">
	</form>';
} else {
	$song_name = $_POST['song_name'];
    $singer_name = $_POST['singer_name'];
    if(isset($_POST['song_name'])){
    	$song_path = 'songs/'.basename($_FILES)['song_name']['name'];
    	if (move_uploaded_file($_FILES['song_name']['na,e'],'songs/')) {
    		echo 'you added the song successfully'
    	}
    }
	$date = date('Y-m-d');
	$insert_query = "INSERT INTO `songs`(`song_name`, `singer_id`=(SELECT singer_name FROM singers), `date_of_publishing`, `user_id`=(SELECT user_name FROM users)) VALUES ($song_name,$singer_name,$date,$user_name)";
	$insert_result= mysqli_query($conn, $insert_query);
	if ($insert_result) {
				echo "Успешно добавихте в базата данни!";
				echo "<p><a href='index.php'>Read DB</a></p>";
			}else{
				echo "Неуспешно добавяне на запис в базата данни! Моля опитайте по-късно!";
			}
}
