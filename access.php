<?php
date_default_timezone_set('Asia/Shanghai');
$nowdate = date('d-m-y h:i:s');
include('connection.php');
session_start();
$login_error='';


if(isset($_POST['login_access'])){
    if (empty($_POST['username']) || empty($_POST['password'])) {
		$login_error = "Username or Password is invalid";
	}else{
		$username=$_POST['username'];
		$password=md5($_POST['password']);

        $query = mysqli_query($con, "select * from users where password='$password' AND username='$username'");
        // $query = mysqli_query($con, "select * from users where password='".md5($password)."' AND username='$username'");
		if(mysqli_num_rows($query)==1){
            while($result=mysqli_fetch_assoc($query)){
                $user_category=$result['category'];
            }

            if($user_category=='Admin'){
                $_SESSION["school_username"]=$username; // Initializing Session
				header("location: admin/admin.php"); 
            }elseif($user_category=='Student'){
                $_SESSION["school_username"]=$username; // Student Username
				header("location: student/student.php"); 
            }elseif($user_category=='Teacher'){
                $_SESSION["teacher_username"]=$username; // Teacher ID
                header("location: teacher/teacher.php");
            }else{
                $login_error = "Username or Password is invalid";
            }
        }else{
            $login_error = "Username or Password is invalid";
        }
	}
}
?>