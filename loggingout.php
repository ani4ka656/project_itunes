<?php
session_start();
session_unset();
session_destroy();
ob_start();
header("location:loggingin.php");
ob_end_flush(); 
include 'loggingin.php';
exit();
