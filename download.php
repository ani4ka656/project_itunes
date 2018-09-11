<?php
include('includes/db.php');
include('includes/header.php');
session_start(); 
    
$song_id = $_GET['song_id'];
// if id is set then get the file with the id from database

$query = "SELECT song_url FROM songs WHERE song_id = $song_id";
$rs = mysqli_query($conn, $query);

if ($rs) {
	$row = mysqli_fetch_assoc($rs);
	$name = $row['song_url'];



function download($name){


if (file_exists($name)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($name));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($name));
    ob_clean();
    flush();
    readfile($name);
    exit;
}
}
download($name);
}




	
//}
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

    	
  

    	

