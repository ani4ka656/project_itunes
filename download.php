<?php
include('includes/db.php');
include('includes/header.php');
session_start(); 
    
$song_id = $_GET['song_id'];
$read_song = "SELECT `song_id`, `song_url`  FROM `songs` WHERE song_id = $song_id";
$result = mysqli_query($conn, $read_song);
$row = mysqli_fetch_assoc($result);
$filename = $row['song_url']; 
header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private', false); // required for certain browsers 
header('Content-Type: application/pdf');

header('Content-Disposition: attachment; filename="'. basename($filename) . '";');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($filename));

readfile($filename);

exit;

include('includes/footer.php');
    	