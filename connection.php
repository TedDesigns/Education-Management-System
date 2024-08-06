<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "school";

$con=mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);
if(!$con){
	die("Connection failed:".mysqli_connect_error());
}
?>