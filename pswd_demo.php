<?php 

//данните на потребителя от формата
$pswd = $_POST['password'];//loginpassword
$user_name = $_POST['username'];
// при регистрация паролата се криптира с password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
//$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
//влизаме в бд и проверяваме за потребител с такова потребителско име, ако има взимаме му данните

$check_query = "SELECT * FROM `users_info` WHERE user_name = '$user_name' LIMIT 1";
	
	$check_result = mysqli_query($conn, $check_query);
	$user = mysqli_fetch_assoc($check_result);


//имаме такова потребителско име и проверяваме дали е верна паролата
//това което е въвел потрелителя в логин формата като парола - loginpassword и това, което сме извадили от базата данни дали съвпадат

if (password_verify($loginpassword, $user['password'])) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}


//вариант 2

//преди сравняване да криптираш паролата въведена в логин формата и да търсиш потребител с такова потребителско име и такава криптирана парола

$user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$check_query = "SELECT * FROM `users_info` WHERE user_name = '$user_name' AND user_password = '$user_password' LIMIT 1";
	
	$check_result = mysqli_query($conn, $check_query);
	$user = mysqli_fetch_assoc($check_result);

echo $user_password;