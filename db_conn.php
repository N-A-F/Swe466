<?php  

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "task";
// $password = "admin";
// $db_name = "project466";
$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}