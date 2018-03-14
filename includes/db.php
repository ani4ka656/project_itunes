<?php
$conn = mysqli_connect('localhost','root','','project_itunes');
if($conn){
	echo "success!";
} else {
	echo "no";
}