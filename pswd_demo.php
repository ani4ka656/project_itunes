<?php 
include('includes/db.php');
include('includes/header.php');
session_start();
//данните на потребителя от формата
$pswd = trim($_POST['user_password']);//loginpassword
$user_name = trim($_POST['user_name']);

// при регистрация паролата се криптира с password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
// $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
// влизаме в бд и проверяваме за потребител с такова потребителско име, ако има взимаме му данните
$loginpassword = password_hash($pswd, PASSWORD_DEFAULT);
 //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$check_query = "SELECT user_name FROM `users_info` WHERE  `user_name` = '$user_name' LIMIT 1";
	
$check_result = mysqli_query($conn, $check_query);

//var_dump($check_result->num_rows);

if ( $check_result->num_rows ) {		
	
			echo "<p>There is already user with such name get another </p>";

	} else {

		$add_user = "INSERT INTO `users_info`( `user_name`, `user_password`) VALUES ('$user_name','$loginpassword')";

		$add_res = mysqli_query($conn,$add_user); 				

		if ( $add_res ) {		
	
			echo "<p>Success!</p>";
			echo "<div class='btn btn-dark'><p><a href='loggingin.php'>Log In</a></p></div>";
		} else {
			echo "<div class='btn btn-dark'><p><a href='loggingin.php'>Try again</a></p></div>";
		}
}