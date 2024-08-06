<?php
    date_default_timezone_set('Asia/Shanghai');
    $nowdate = date('d-m-y h:i:s');
    include('connection.php');
    include('access.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>School</title>
        <link rel="icon" type="image/png" href="img/webdesign.png"/>
        <!-- School CSS -->
        <link href="css/school.css" rel="stylesheet">
        <link href="css/school.min.css" rel="stylesheet">
        
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> 
        
        <script type="text/javascript" src="js/jquery-3_6_4/jquery.min.js"></script>
        <!-- Toastr -->
        <link rel="stylesheet" type="text/css" href="js/toastr/toastr.min.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" type="text/css" href="js/sweetalert2/sweetalert2.min.css">
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/6e5fb66345.js" crossorigin="anonymous"></script>
        
        <!-- Bootstrap v4.1.0 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> 
        <style>

        </style>
    </head>
    <body>
        <div class="container">
            <div class="login-wrapper">
                <div class="justify-content-center login-view">
                    <div class="text-center">
                        <h1 class="text-lightgray">Education Management System</h1>
                    </div>
                    <div class="login-card shadow-lg">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="ligongimages_carousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                        <img src="img/library3.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                        <img src="img/library2.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                        <img src="img/ligong4.jpeg" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="login-card-body card-body">
                                    <div id="login_view">
                                        <div class="text-center text-deepblue"><h2>Login</h2></div>
                                        <form action="" method="post">
                                            <div class="school-form-group">
                                                <input class="school-input" placeholder="Username" required="" type="text" id="user_name" name="username">
                                                <span class="school-input-border"></span>
                                            </div>
                                            <div class="school-form-group">
                                                <input class="school-input" placeholder="Password" required="" type="password" id="password" name="password">
                                                <span class="school-input-border"></span>
                                            </div>
                                            <div class="text-danger" id="login_error"><?php echo $login_error; ?></div>
                                            <div style="text-align: right;">
                                                <div class="btn-group">
                                                    <!-- <button type="button" class="btn shadow-lg" id="forgot_pwd"><i class="fa-solid fa-pen-line"></i> Forgot Password <i class="fa-solid fa-pen-nib"></i></button> 
                                                    <button type="button" class="btn shadow-lg" id="register"><i class="fa-solid fa-pen-line"></i> Register <i class="fa-solid fa-pen-nib"></i></button>  -->
                                                    <button type="submit" name="login_access" class="btn btn-bottom-round bg-orange shadow-lg">Login <i class="fa-solid fa-chevron-right"></i></button> 
                                                </div>
                                            </div>
                                        </form>
                                        <hr class="dashed text-lightgray">
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-weixin btn-sm"><i class="fa fa-weixin fa-2x" aria-hidden="true"></i></button>
                                                <button type="button" class="btn btn-qq btn-sm"><i class="fa fa-qq fa-2x" aria-hidden="true"></i></button>
                                                <button type="button" class="btn btn-ligong-blue btn-sm"><i class="fa fa-qrcode fa-2x" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="register_view" style="display: none;">
                                        <div class="text-center text-deepblue"><h2>Register</h2></div>
                                        <form id="form-register">
                                            <div class="form-group">
                                                <label class="text-deepblue">Name</label>
                                                <input type="text" class="form-control form-control-round" id="register_name" name="username" placeholder="Username" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-deepblue">Email</label>
                                                        <input type="email" class="form-control form-control-round" id="register_email" name="email" placeholder="Email" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-deepblue">Date of Birth</label>
                                                        <input type="date" class="form-control form-control-round" name="birth" placeholder="Email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-deepblue">Password</label>
                                                        <input type="password" class="form-control form-control-round" name="password" id="register_password" placeholder="Password" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-deepblue">Confirm Password</label>
                                                        <input type="password" class="form-control form-control-round" name="rePassword" id="register_rePassword" placeholder="Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="balance" value="0">
                                            
                                            <div class="float-left">
                                                <div class="btn-group">
                                                    <button type="button" class="btn shadow-lg" id="loginview"><i class="fa-solid fa-pen-line"></i> Login</button> 
                                                    <button type="submit" class="btn btn-bottom-round bg-orange shadow-lg">Register</button> 
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="forgot_view" style="display: none;">
                                        <div class="text-center text-deepblue"><h2>Forgot Password</h2></div>
                                        <form id="form-pwd-find">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-deepblue">Name</label>
                                                        <input type="text" class="form-control form-control-round" id="forgot_name" name="username" placeholder="Username" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-deepblue">Old Password</label>
                                                        <input type="password" class="form-control form-control-round" id="f_pass" name="oldPassword" placeholder="Old Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-deepblue">Password</label>
                                                        <input type="password" class="form-control form-control-round" id="newPassword" name="newPassword" placeholder="Password" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-deepblue">Confirm Password</label>
                                                        <input type="password" class="form-control form-control-round" id="c_newPassword" placeholder="Password" required>
                                                        <span id="f_cpass_error" class="text-red"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="float-left">
                                                <div class="btn-group">
                                                    <button type="button" class="btn shadow-lg" id="login2view"><i class="fa-solid fa-pen-line"></i> Login</button> 
                                                    <button type="submit" class="btn btn-bottom-round bg-orange shadow-lg">Reset</button> 
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="login-card-footer">
                                    @TED Designs Ug，www.tedug.com
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <!-- Login JS -->
    <script type="text/javascript" src="js/login.js"></script>
    <!-- Toastr -->
    <script src="js/toastr/toastr.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="js/sweetalert2/sweetalert2.min.js"></script>

    <script>
        function test(){
            toastr.error('You are now offline');

            Swal.fire({
                    title: 'Hello!',
                    text: 'This is a SweetAlert example.',
                    icon: 'success',
                    confirmButtonText: 'Cool'
                });
        }
        // to avoid resubmitting the form
        $(document).ready(function(){window.history.replaceState("","",window.location.href)});
    </script>
</html>