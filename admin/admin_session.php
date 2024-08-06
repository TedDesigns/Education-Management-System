<?php
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION["school_username"];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($con, "select name from users where username='$user_check' and category='Admin'");
$row = mysqli_fetch_assoc($ses_sql);
$school_session =$row['name'];
if(!isset($school_session)){
 mysqli_close($con); // Closing Connection
 header('Location: ../index.php'); // Redirecting To Home Page
}
?>