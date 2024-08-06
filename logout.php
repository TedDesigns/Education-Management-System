<?php
date_default_timezone_set('Asia/Shanghai');
$nowdate = date('d-m-y h:i:s');
include('connection.php');
if (isset($_GET['destroy'])){
	session_start();
	if(session_destroy()) 
	{
		header('Location: index.php');
	}
}else{
	header('Location: index.php');
}
?>