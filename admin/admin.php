<?php
    error_reporting(E_ALL^E_NOTICE ); //Hide error messages at the note level
    date_default_timezone_set('Asia/Shanghai'); //setting the default time to beijing time
    $nowdate = date('d-m-y h:i:s');
    include('../connection.php'); // connection to the database
    include('admin_session.php'); // checking the admin session
    include('admin_select.php'); //selecting from the database

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>School</title>
        <link rel="icon" type="image/png" href="../img/webdesign.png"/>
		
        <!-- School Dashboard CSS -->
		<link href="../css/school_dash.css" rel="stylesheet">
        <link href="../css/school_dash2.css" rel="stylesheet">
		<!-- <link href="../css/school_dashboard.css" rel="stylesheet"> -->
		<!-- <link href="../css/school_dashboard.min.css" rel="stylesheet"> -->
        <!-- <link href="../css/school.min.css" rel="stylesheet"> -->
        
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> 
        <!-- Bootstrap v5.3.2 -->
        <!-- <link rel="stylesheet" href="../dist/css/bootstrap.min.css"> -->
        <!-- <script src="../dist/js/bootstrap.min.js"></script>  -->
        <script type="text/javascript" src="../js/jquery-3_6_4/jquery.min.js"></script>
        <!-- Toastr -->
        <link rel="stylesheet" type="text/css" href="../js/toastr/toastr.min.css">
        <!-- Card Slider -->
        <link rel="stylesheet" type="text/css" href="../css/card-slider.css">
        <link rel="stylesheet" type="text/css" href="../css/card-slider-cards.css">
         <!-- Loader -->
        <link rel="stylesheet" type="text/css" href="../css/loader.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" type="text/css" href="../js/sweetalert2/sweetalert2.min.css">
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/6e5fb66345.js" crossorigin="anonymous"></script>
        <!-- Data Tables -->
        <link href="../plugins/data-tables/datatables.min.css" rel="stylesheet">
        <script src="../plugins/data-tables/datatables.min.js"></script>

        <style>
           
        </style>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </head>
    <body>  
        <div class="loading-overlay"> 
            <div class="loading-spinner"> 
                <img src="../img/ligong.jpg" class="img-fluid rounded-circle" width="60" height="60" alt="User logo">
            </div> 
            <div class="loading-text"> 
                Please wait, loading... 
            </div> 
        </div>
        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="school-sidebar-header text-center">
                    <h3>School</h3>
                </div>
                <ul class="list-unstyled components" id="sch_sidenav">
                    <div class="sidebar-user-info">
                        <i class="fa fa-user"></i> Adminstrator
                    </div>
                    <li class="active" id="dashboard_sidenav">
                        <a href="admin.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li id="school_sidenav">
                        <a href="admin.php#view_school"><i class="fa fa-building"></i> School</a>
                    </li>
                    <li id="users_sidenav">
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users"></i> Users</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li id="teachers_sidenav">
                                <a href="#">Teachers</a>
                            </li>
                            <li id="students_sidenav">
                                <a href="#">Students</a>
                            </li>
                            <li>
                                <a href="#">New Users</a>
                            </li>
                        </ul>
                    </li>
                    <li id="materials_sidenav">
                        <a href="#"><i class="fa fa-book"></i> Materials</a>
                    </li>
                    <li>
                        <a href="#" onClick="location.href='../logout.php?destroy'"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                </ul>

                <div class="school-sidefooter text-center">
                    @TED Designs Ug.<br>www.tedug.com
                </div>
            </nav>
            <!-- Page Content  -->
            <div id="content">
                <nav class="school-navbar navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <a id="sidebarCollapse">
                            <img src="../img/ligong.jpg" class="school-nav-logo" alt="User logo">
                        </a>
                        <span class="nav-title">教育管理系统</span>
                        <div class="nav-search-container">
                            <input type="text" placeholder="Search..." class="nav-search-box">
                            <button type="submit" class="nav-search-button"><i class="fa fa-search"></i></button>
                        </div>
                        <!-- <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-align-left"></i>
                            <span>Toggle Sidebar</span>
                        </button> -->
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-align-justify"></i>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-bell"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" onClick="location.href='../logout.php?destroy'">Sign Out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="page-header">
                    Dashboard
                </div>
                <div class="school-content-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="school-card school-shadow-sm text-school-lightgray">
                                <div class="card-body profile-card">
                                    <div class="profile-cover">
                                        <img src="../img/profile-head.jpg" class="img-fluid">
                                    </div>
                                    <div class="profile-user text-center">
                                        <div class="profile-image school-shadow-sm">
                                            <img src="../img/profile_pics/profile-1.jpg" class="rounded-circle" width="80">
                                        </div>
                                    </div>
                                    <div class="mt-5 text-center">
                                        <h4 class="mb-0"><?php echo (strlen($school_session) > 18) ? substr($school_session,0,18).'...' :$school_session;?></h4>
                                        <span class="text-muted d-block mb-2">Admin</span>
                                        <button class="btn btn-flat shadow-sm btn-sm text-school-lightgray">Profile</button>
                                    </div>
                                </div>
                            </div>

                            <div class="school-card school-shadow-sm">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Name</h6>
                                        <span class="text-secondary"><?php echo $school_session; ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Role</h6>
                                        <span class="text-secondary">Adminstrator</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="school-card school-shadow-sm">
                                <div class="sch-navpill-header">
                                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home" onclick="toggle_changes('Dashboard')" role="tab">
                                                <i class="now-ui-icons objects_umbrella-13"></i> Dashboard
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#view_school" onclick="toggle_changes('School')" role="tab">
                                                <i class="now-ui-icons shopping_shop"></i> School
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#view_teachers" onclick="toggle_changes('Teachers')" role="tab">
                                                Teachers
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#view_students" onclick="toggle_changes('Students')" role="tab">
                                                Students
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#view_general_timetable" onclick="toggle_changes('Timetable')" role="tab">
                                                General Timetable
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#view_materials" onclick="toggle_changes('Materials')" role="tab">
                                                Materials
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" role="tabpanel">
                                            <div class="row text-center">
                                                <div class="col-sm-3 mb-3">
                                                    <div class="dash-metrics">
                                                        <div>
                                                            <i class="fas fa-school fa-2x dash-metrics-icon text-ligong-blue"></i>
                                                        </div>
                                                        <h3><span class="dash-metrics-num"><?php echo $dept_cnt; ?></span> <span class="dash-metrics-label">Departments</span> </h3>
                                                        <p class="dash-metrics-sub"></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 mb-3">
                                                    <div class="dash-metrics">
                                                        <div>
                                                            <i class="fas fa-award fa-2x dash-metrics-icon text-ligong-blue"></i>
                                                        </div>
                                                        <h3><span class="dash-metrics-num"><?php echo $courses_cnt; ?></span> <span class="dash-metrics-label">Courses</span> </h3>
                                                        <p class="dash-metrics-sub"></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 mb-3">
                                                    <div class="dash-metrics">
                                                        <div>
                                                            <i class="fas fa-book-reader fa-2x dash-metrics-icon text-ligong-blue"></i>
                                                        </div>
                                                        <h3><span class="dash-metrics-num"><?php echo $courseunit_cnt; ?></span> <span class="dash-metrics-label">Course Units</span> </h3>
                                                        <p class="dash-metrics-sub"><span class="dash-metrics-num"><?php echo "".$tr_cunit_cnt."/".$courseunit_cnt."" ; ?></span> <span class="dash-metrics-label">have teachers</span></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 mb-3">
                                                    <div class="dash-metrics">
                                                        <div>
                                                            <i class="fa fa-building fa-2x dash-metrics-icon text-ligong-blue"></i>
                                                        </div>
                                                        <h3><span class="dash-metrics-num"><?php echo $classroom_cnt; ?></span> <span class="dash-metrics-label">Classrooms</span> </h3>
                                                        <p class="dash-metrics-sub"><span class="dash-metrics-num"><?php echo "".$empty_classroom_cnt."/".$classroom_cnt."" ; ?></span> <span class="dash-metrics-label">are available</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-center">
                                                <div class="col-sm-3 mb-3">
                                                    <div class="dash-metrics">
                                                        <div>
                                                            <i class="fas fa-chalkboard-teacher fa-2x dash-metrics-icon text-ligong-blue"></i>
                                                        </div>
                                                        <h3><span class="dash-metrics-num"><?php echo $teacher_cnt; ?></span> <span class="dash-metrics-label">Teachers</span> </h3>
                                                        <p class="dash-metrics-sub"><span class="dash-metrics-num"><?php echo "".$trunit_cnt."/".$teacher_cnt."" ; ?></span> <span class="dash-metrics-label">have course units</span></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 mb-3">
                                                    <div class="dash-metrics">
                                                        <div>
                                                            <i class="fas fa-shapes fa-2x dash-metrics-icon text-ligong-blue"></i>
                                                        </div>
                                                        <h3><span class="dash-metrics-num"><?php echo $classes_cnt; ?></span> <span class="dash-metrics-label">Classes</span> </h3>
                                                        <p class="dash-metrics-sub"><span class="dash-metrics-num"><?php echo "".$classes_cunit_cnt."/".$classes_cnt."" ; ?></span> <span class="dash-metrics-label">classes been selected</span></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 mb-3">
                                                    <div class="dash-metrics">
                                                        <div>
                                                            <i class="fa fa-book fa-2x dash-metrics-icon text-ligong-blue"></i>
                                                        </div>
                                                        <h3><span class="dash-metrics-num"><?php echo $materials_cnt; ?></span> <span class="dash-metrics-label">Materials</span> </h3>
                                                        <p class="dash-metrics-sub"></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="dash-metrics">
                                                        <div>
                                                            <i class="fa fa-users fa-2x dash-metrics-icon text-ligong-blue"></i>
                                                        </div>
                                                        <h3><span class="dash-metrics-num"><?php echo $student_cnt; ?></span> <span class="dash-metrics-label">Students</span> </h3>
                                                        <p class="dash-metrics-sub"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3" style="border-bottom: 1px dashed #ddd;"></div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <?php
                                                    $sql=mysqli_query($con,"SELECT users.name AS tr_name, users.user_id AS tr_id, users.picture AS tr_pic, AVG(rate_teachers.rating) AS tr_rating FROM users 
                                                                            INNER JOIN rate_teachers ON users.user_id=rate_teachers.teacher_id 
                                                                            GROUP BY rate_teachers.teacher_id ORDER BY tr_rating DESC LIMIT 0,5");
                                                    if(mysqli_num_rows($sql)>0){
                                                        ?><h4 class="text-ligong-blue">Top Rated Teachers</h4><?php
                                                        while($rows=mysqli_fetch_assoc($sql)){
                                                            $teacher_pic=$rows['tr_pic'];
                                                            ?>
                                                            <div class="media">
                                                                <div class="media-left media-top">
                                                                    <img src="<?php echo !empty($teacher_pic)?$teacher_pic:"../img/avatars/avatar-1.png"; ?>" class="media-object rounded-circle" style="width:60px;border: 2px solid gold;">
                                                                </div>
                                                                <div class="media-body" style="padding-inline-start: 10px;">
                                                                    <h5 class="media-heading text-school-lightgray"><a href="admin.php?teacher_view=teacher&tr_id=<?php echo $rows['tr_id']; ?>#view_teachers" class="sch-link"><?php echo $rows['tr_name']; ?></a></h5>
                                                                    <p><?php echo round($rows['tr_rating'],2); ?></p>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }else{
                                                        ?>
                                                        <div class="alert text-center">
                                                            <h4>No Teacher Rated</h4>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-md-4">
                                                <?php
                                                    $sql=mysqli_query($con,"SELECT users.user_id AS std_id, users.name AS std_name, users.picture AS std_pic, AVG(submissions.grade) AS std_grade FROM users 
                                                                            INNER JOIN submissions ON submissions.student_id=users.user_id 
                                                                            WHERE submissions.grade IS NOT NULL GROUP BY users.user_id ORDER BY std_grade DESC LIMIT 0,5");
                                                    if(mysqli_num_rows($sql)>0){
                                                        ?><h4 class="text-ligong-blue">Top Students</h4><?php
                                                        while($rows=mysqli_fetch_assoc($sql)){
                                                            $student_pic=$rows['std_pic'];
                                                            ?>
                                                            <div class="media">
                                                                <div class="media-left media-top">
                                                                    <img src="<?php echo !empty($student_pic)?$student_pic:"../img/avatars/avatar-10.png"; ?>" class="media-object rounded-circle" style="width:60px;border: 2px solid gold;">
                                                                </div>
                                                                <div class="media-body" style="padding-inline-start: 10px;">
                                                                    <h5 class="media-heading text-school-lightgray"><a href="admin.php?student_view=student&std_id=<?php echo $rows['std_id']; ?>#view_students" class="sch-link"><?php echo $rows['std_name']; ?></a></h5>
                                                                    <p><?php echo round($rows['std_grade'],1); ?>%</p>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }else{
                                                        ?>
                                                        <div class="alert text-center">
                                                            <h4>No Assignments Attempted</h4>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-md-5">
                                                    <?php
                                                    $sql=mysqli_query($con,"SELECT classes_view.class_name AS class_name, classes_view.class_teacher AS class_tr, classes_view.class_day AS class_day, 
                                                                            classes_view.class_start_time AS class_start_time, classes_view.class_end_time AS class_end_time, classes_view.maximum_seats AS class_max, COUNT(student_classes.student_id) AS class_stds 
                                                                            FROM student_classes INNER JOIN classes_view ON student_classes.class_id=classes_view.class_id GROUP BY student_classes.class_id ORDER BY class_stds DESC LIMIT 0,5;");
                                                    if(mysqli_num_rows($sql)>0){
                                                        ?><h4 class="text-ligong-blue">Most Choosen Classes</h4><?php

                                                        while($rows=mysqli_fetch_assoc($sql)){
                                                            ?>
                                                            <div class="media">
                                                                <div class="media-body" style="padding-inline-start: 10px;">
                                                                    <h5 class="media-heading text-school-lightgray"><?php echo $rows['class_name']; ?></h5>
                                                                    <p><?php echo "".round($rows['class_stds'],1)."/".$rows['class_max']."" ; ?> students.
                                                                    <?php echo "".$rows['class_tr']." (".ucwords($rows['class_day'])." : ".$rows['class_start_time']." - ".$rows['class_end_time'].")"; ?></p>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }else{
                                                        ?>
                                                        <div class="alert text-center">
                                                            <h4>No Classes Choosen</h4>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="mb-3" style="border-bottom: 1px dashed #ddd;"></div>

                                            <div class="card-slider">
                                                <h4><span class="text-school-lightgray" style="opacity: 50%;"><b><?php echo $tr_dept; ?>老师们</b></span></h4>
                                                <div class="school-wrapper">
                                                    <i id="left" class="fa-solid fa-angle-left"></i>
                                                    <ul class="school-carousel">
                                                        <?php
                                                        $sql=mysqli_query($con,"SELECT users.*,department.name AS teacher_dept FROM users 
                                                                                INNER JOIN department ON users.department=department.department_id 
                                                                                WHERE users.category='Teacher'");
                                                        if(mysqli_num_rows($sql)>0){
                                                            while($result=mysqli_fetch_assoc($sql)){
                                                                $teacher_id=$result['user_id'];
                                                                $teacher_pic=$result['picture'];
                                                                ?>
                                                                <li class="card" style="border:none;height: 450px;">
                                                                    <div class="carousel-card school-shadow-sm">
                                                                        <div class="carousel-card-img">
                                                                            <img src="<?php echo !empty($teacher_pic)?$teacher_pic:"../img/avatars/avatar-1.png"; ?>" class="carousel-img img-responsive" alt="img" draggable="false">
                                                                        </div>
                                                                        <div class="carousel-card-info">
                                                                            <h2><?php echo $result['name']; ?></h2>
                                                                            <?php
                                                                            $view_tr_rate=0;
                                                                            $sql1=mysqli_query($con, "SELECT AVG(rating) AS view_tr_rate FROM rate_teachers WHERE teacher_id='$teacher_id'");
                                                                            if(mysqli_num_rows($sql1)>0){
                                                                                while($result1=mysqli_fetch_assoc($sql1)){
                                                                                    if(is_numeric($result1['view_tr_rate'])){
                                                                                        $view_tr_rate=round($result1['view_tr_rate'],0);
                                                                                    }
                                                                                }

                                                                                if($view_tr_rate!=0){
                                                                                    ?>
                                                                                    <div class="star-rating text-center text-ligong-orange">
                                                                                        <?php
                                                                                        for($tr_i=1;$tr_i<=$view_tr_rate;$tr_i++){
                                                                                            echo '<span class="fa fa-star"></span>';
                                                                                        }
                                                                                        ?>
                                                                                    </div>
                                                                                    <?php
                                                                                }

                                                                            }
                                                                            
                                                                            if($view_tr_rate==0){
                                                                                ?><span style="font-size: 12px;">No Rating</span> <?php
                                                                            }
                                                                            ?>
                                                                            <p class="carousel-card-contact"><?php echo ''.$result['contact'].''; ?></p>
                                                                            <div class="carousel-divider"></div>
                                                                            <p class="carousel-card-more">
                                                                                <?php
                                                                                $query=mysqli_query($con,"SELECT course_unit.name as tr_courseunit FROM teacher_courseunit 
                                                                                                        INNER JOIN course_unit ON teacher_courseunit.course_unit=course_unit.course_unit_id 
                                                                                                        WHERE teacher_courseunit.teacher_id='$teacher_id'");
                                                                                if(mysqli_num_rows($query)>0){
                                                                                    while($rows=mysqli_fetch_assoc($query)){
                                                                                        echo "".$rows['tr_courseunit']." | ";
                                                                                    }
                                                                                }else{
                                                                                    echo "No Courses";
                                                                                }
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                    <i id="right" class="fa-solid fa-angle-right"></i>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="tab-pane" id="view_teachers" role="tabpanel">
                                            <button type="button" class="btn btn-flat shadow-sm btn-sm text-school-lightgray" data-toggle="modal" data-target="#addteacher_modal">Add Teacher</button>
                                            <button type="button" class="btn btn-flat shadow-sm btn-sm text-school-lightgray" data-toggle="modal" data-target="#addteacher_course_modal">Teacher to Course Unit</button>
                                            <button type="button" class="btn btn-flat shadow-sm btn-sm text-school-lightgray" data-toggle="modal" data-target="#addclass_modal">Add Class</button>
                                            
                                            <?php  
                                            if($teacher_cnt==0){
                                                ?>
                                                <div class="alert text-center text-school-lightgrey">
                                                    <i class="fa fa-info fa-2x"></i><br>No Teachers Recorded.
                                                </div>
                                                <?php
                                            }else{
                                                ?>
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <div id="view_alltrs_div" class="table-responsive text-school-lightgrey">
                                                            <table id="view_allteachers" class="table table-sm compact table-striped table-hover">
                                                                <thead>
                                                                    <th>Name</th>
                                                                    <th>Contact</th>
                                                                    <th>Address</th>
                                                                    <th>Department</th>
                                                                    <th>Course Units</th>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $tr_course=0;
                                                                    $sql=mysqli_query($con, "select users.*,department.name as user_dept from users inner join department on users.department=department.department_id where users.category='Teacher'");
                                                                    if(mysqli_num_rows($sql)>0){
                                                                        while($result=mysqli_fetch_assoc($sql)){
                                                                            echo "<tr>";
                                                                                ?><td><a href="admin.php?teacher_view=teacher&tr_id=<?php echo $result['user_id']; ?>#view_teachers" class="sch-link"><?php echo $result['name']; ?></a></td><?php
                                                                                echo "<td>".$result['contact']."</td>";
                                                                                echo "<td>".$result['address']."</td>";
                                                                                echo "<td>".$result['user_dept']."</td>";
                                                                                $tr_id=$result['user_id'];
                                                                                $tr_sql=mysqli_query($con, "select count(*) as tr_c_unit from teacher_courseunit where teacher_id='$tr_id'");
                                                                                if(mysqli_num_rows($tr_sql)>0){
                                                                                    while($tr_rows=mysqli_fetch_assoc($tr_sql)){
                                                                                        $tr_course=$tr_rows['tr_c_unit'];
                                                                                    }
                                                                                }
                                                                                echo "<td>".$tr_course."</td>";
                                                                                $tr_course=0;
                                                                            echo "</tr>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?php
                                                            if(isset($_GET['teacher_view'])){
                                                                if(isset($_GET['tr_id'])){
                                                                    $tr_id = $_GET['tr_id'];

                                                                    $sql=mysqli_query($con, "select * from users where user_id='$tr_id' and category='Teacher'");
                                                                    if(mysqli_num_rows($sql)>0){
                                                                        while($result=mysqli_fetch_assoc($sql)){
                                                                            $tr_name=$result['name'];
                                                                            $tr_contact=$result['contact'];
                                                                            $tr_address=$result['address'];
                                                                            $tr_picture=$result['picture'];
                                                                            $tr_username=$result['username'];
                                                                            $tr_password=$result['password'];
                                                                        }
                                                                        ?>
                                                                        <div class="card-body profile-card text-school-lightgray">
                                                                            <div class="d-flex flex-column align-items-center text-center">
                                                                                <img src="<?php echo !empty($tr_picture)?$tr_picture:"../img/profile_pics/teacher.png"; ?>" alt="Picture" class="rounded-circle" width="100">
                                                                                <div class="mt-3">
                                                                                <h4><?php echo $tr_name; ?></h4>
                                                                                <p class="text-secondary mb-1">Teacher</p>
                                                                                <p class="text-muted font-size-sm"><?php echo "".$tr_contact." | ".$tr_address.""; ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div id="view_tr_accordion">
                                                                                <div class="card">
                                                                                    <div class="card-header" id="edit_tr_heading">
                                                                                        <h5 class="mb-0">
                                                                                            <button class="btn btn-flat shadow-sm btn-sm text-school-lightgray" data-toggle="collapse" data-target="#edit_tr_info" aria-expanded="true" aria-controls="collapseOne">
                                                                                                Edit Information
                                                                                            </button>
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div id="edit_tr_info" class="collapse" aria-labelledby="edit_tr_info" data-parent="#view_tr_accordion">
                                                                                        <div class="card-body">
                                                                                        <form id="edit_teacher_form">
                                                                                            <div class="input-container">
                                                                                                <input type="text" name="edit_teacher_name" value="<?php echo $tr_name; ?>" required>
                                                                                                <label for="input" class="label">Edit Name</label>
                                                                                                <div class="underline"></div>
                                                                                            </div>
                                                                                            <div class="input-container mt-4">
                                                                                                <input type="text" name="edit_teacher_contact" value="<?php echo $tr_contact; ?>" required>
                                                                                                <label for="input" class="label">Edit Contact</label>
                                                                                                <div class="underline"></div>
                                                                                            </div>
                                                                                            <div class="input-container mt-4">
                                                                                                <input type="text" name="edit_teacher_address" value="<?php echo $tr_address; ?>" required>
                                                                                                <label for="input" class="label">Edit Address</label>
                                                                                                <div class="underline"></div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-sm-6">
                                                                                                    <div class="input-container mt-3">
                                                                                                        <input type="text" name="edit_teacher_username" value="<?php echo $tr_username; ?>" required>
                                                                                                        <label for="input" class="label">Edit Username</label>
                                                                                                        <div class="underline"></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-6">
                                                                                                    <div class="input-container mt-3">
                                                                                                        <input type="text" name="edit_teacher_password" value="123" required>
                                                                                                        <label for="input" class="label">Edit Password</label>
                                                                                                        <div class="underline"></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                Edit Picture
                                                                                                <input type="file" name="edit_teacher_pic" accept="image/png">
                                                                                            </div>
                                                                                            <div class="form-check">
                                                                                                <input type="checkbox" class="form-check-input" id="trash_teacher_check">
                                                                                                <label class="form-check-label text-danger" for="trash_teacher_check">Trash Teacher</label>
                                                                                            </div>
                                                                                            <input type="hidden" name="edit_teacher" value="<?php echo $tr_id; ?>">
                                                                                            <span class="text-danger" id="edit_teacher_error"></span>
                                                                                            <div class="dashed-line"></div>
                                                                                            <div class="text-center">
                                                                                                <div class="btn-group">
                                                                                                    <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                                                                                    <button type="submit" id="edit_teacher_btn" class="btn sch-btn-orange">Save</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card">
                                                                                    <div class="card-header" id="tr_unit_heading">
                                                                                        <h5 class="mb-0">
                                                                                            <button class="btn btn-flat shadow-sm btn-sm text-school-lightgray collapsed" data-toggle="collapse" data-target="#tr_courseunits" aria-expanded="false" aria-controls="tr_courseunits">
                                                                                              Courses Units
                                                                                            </button>
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div id="tr_courseunits" class="collapse" aria-labelledby="tr_unit_heading" data-parent="#view_tr_accordion">
                                                                                        <div class="card-body">
                                                                                            <?php
                                                                                            $trc_sql=mysqli_query($con,"SELECT course_unit.name as tr_courseunit FROM teacher_courseunit 
                                                                                            inner join course_unit on teacher_courseunit.course_unit=course_unit.course_unit_id where teacher_courseunit.teacher_id='$tr_id'");
                                                                                            if(mysqli_num_rows($trc_sql)>0){
                                                                                                ?>
                                                                                                 <ul>
                                                                                                    <?php
                                                                                                    while($trc_rows=mysqli_fetch_assoc($trc_sql)){
                                                                                                        echo "<li>".$trc_rows['tr_courseunit']."</li>";
                                                                                                    }
                                                                                                    ?>
                                                                                                </ul>
                                                                                                <?php
                                                                                            }else{
                                                                                                ?>
                                                                                                <div class="alert text-center">
                                                                                                    <i class="fa fa-info fa-2x"></i><br>Teacher does not have course units attached. 
                                                                                                </div>
                                                                                                <?php
                                                                                            }
                                                                                            ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card">
                                                                                    <div class="card-header" id="tr_classes_heading">
                                                                                        <h5 class="mb-0">
                                                                                            <button class="btn btn-flat shadow-sm btn-sm text-school-lightgray collapsed" data-toggle="collapse" data-target="#tr_classes" aria-expanded="false" aria-controls="tr_classes">
                                                                                              Available Classes
                                                                                            </button>
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div id="tr_classes" class="collapse" aria-labelledby="tr_classes_heading" data-parent="#view_tr_accordion">
                                                                                        <div class="card-body">
                                                                                            <?php
                                                                                            $trcl_sql=mysqli_query($con, "SELECT classes.*, course_unit.name as class_course_unit, users.name as class_teacher, classrooms.name as class_room, 
                                                                                            school_calendar.teaching_period as class_startperiod FROM classes inner join course_unit on classes.course_unit_id=course_unit.course_unit_id 
                                                                                            inner join users on users.user_id=classes.teacher_id inner join classrooms on classes.classroom_id=classrooms.classroom_id 
                                                                                            inner join school_calendar on classes.start_teaching_period=school_calendar.school_calendar_id where classes.teacher_id='$tr_id'");
                                                                                            if(mysqli_num_rows($trcl_sql)>0){
                                                                                                echo "<ul>";
                                                                                                while($trcl_result=mysqli_fetch_assoc($trcl_sql)){
                                                                                                        $class_endperiod_id=$trcl_result['end_teaching_period'];
                                                                                                        $tr_cunit_sql=mysqli_query($con,"select * from school_calendar where school_calendar_id='$class_endperiod_id'");
                                                                                                        if(mysqli_num_rows($tr_cunit_sql)>0){
                                                                                                            while($tr_cunit_rows=mysqli_fetch_assoc($tr_cunit_sql)){
                                                                                                                $class_endperiod=$tr_cunit_rows['teaching_period'];
                                                                                                            }
                                                                                                        }
                                                                                                        echo "<li>".$trcl_result['class_course_unit'].", ".$trcl_result['class_room']." ,
                                                                                                        ".$trcl_result['class_day']." (".$trcl_result['class_startperiod']." - ".$class_endperiod.")</li>";
                                                                                                }
                                                                                                echo "</ul>";
                                                                                            }else{
                                                                                                ?>
                                                                                                <div class="alert text-center">
                                                                                                    <i class="fa fa-info fa-2x"></i><br>Teacher does not have classes attached. 
                                                                                                </div>
                                                                                                <?php
                                                                                            }
                                                                                            ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }else{
                                                                        ?>
                                                                        <div class="alert alert-danger text-center">
                                                                            <i class="fa fa-exclamation-triangle fa-2x"></i><br>Teacher does not exist.
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }else{
                                                                ?>
                                                                <div class="text-center" style="opacity: 10%;padding:30px">
                                                                    <img src="../img/webdesign.png" height="300" width="300" class="img-fluid">
                                                                </div>
                                                                <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                
                                                <?php
                                            }
                                            ?>
                                            <div class="modal fade" id="addteacher_modal" tabindex="-1" role="dialog" aria-labelledby="addteacher_modalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header school-modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Add Teacher</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="new_teacher_form">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="input-container">
                                                                            <input type="text" id="new_teacher_name" name="new_teacher_name" required>
                                                                            <label for="input" class="label">Name</label>
                                                                            <div class="underline"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <select class="form-control" name="new_teacher_dept" required>
                                                                                <option value="">Select Department</option>
                                                                                <?php
                                                                                $sql=mysqli_query($con, "select * from department");
                                                                                if(mysqli_num_rows($sql)>0){
                                                                                    while($result=mysqli_fetch_assoc($sql)){
                                                                                        ?><option value="<?php echo $result['department_id']; ?>"><?php echo $result['name']; ?></option><?php
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="input-container">
                                                                            <input type="text" id="new_teacher_contact" name="new_teacher_contact" required>
                                                                            <label for="input" class="label">Contact</label>
                                                                            <div class="underline"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="input-container">
                                                                            <input type="text" id="new_teacher_address" name="new_teacher_address" required>
                                                                            <label for="input" class="label">Address</label>
                                                                            <div class="underline"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="input-container">
                                                                            <input type="text" id="new_teacher_username" name="new_teacher_username" required>
                                                                            <label for="input" class="label">Username</label>
                                                                            <div class="underline"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="input-container">
                                                                            <input type="text" id="new_teacher_password" name="new_teacher_password" required>
                                                                            <label for="input" class="label">Password</label>
                                                                            <div class="underline"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    Picture
                                                                    <input type="file" name="new_teacher_pic" accept="image/png" required>
                                                                </div>
                                                                <input type="hidden" name="new_teacher" value="Add">
                                                                <span class="text-danger" id="new_teacher_error"></span>
                                                                <div class="dashed-line"></div>
                                                                <div class="text-center">
                                                                    <div class="btn-group">
                                                                        <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                                                        <button type="submit" id="new_teacher_btn" class="btn sch-btn-orange">Save</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="addteacher_course_modal" tabindex="-1" role="dialog" aria-labelledby="addteacher_course_modal" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header school-modal-header">
                                                            <h5 class="modal-title">Teacher to Course Unit</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="add_teacher_course_form">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <select class="form-control" name="add_trcourse_teacher" required>
                                                                            <option value="">Select Teacher</option>
                                                                            <?php
                                                                                $sql=mysqli_query($con, "select * from users where category='Teacher'");
                                                                                if(mysqli_num_rows($sql)>0){
                                                                                    while($result=mysqli_fetch_assoc($sql)){
                                                                                        ?><option value="<?php echo $result['user_id']; ?>"><?php echo $result['name']; ?></option> <?php
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <select class="form-control" name="add_trcourse_cunit" required>
                                                                            <option value="">Select Course Unit</option>
                                                                            <?php
                                                                                $sql=mysqli_query($con, "select * from course_unit");
                                                                                if(mysqli_num_rows($sql)>0){
                                                                                    while($result=mysqli_fetch_assoc($sql)){
                                                                                        ?><option value="<?php echo $result['course_unit_id']; ?>"><?php echo $result['name']; ?></option> <?php
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="add_trcourse" value="Add">
                                                                <span class="text-danger" id="add_trcourse_error"></span>
                                                                <div class="dashed-line"></div>
                                                                <div class="text-center">
                                                                    <div class="btn-group">
                                                                        <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                                                        <button type="submit" id="add_trcourse_btn" class="btn sch-btn-orange">Save</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="tab-pane" id="view_school" role="tabpanel">
                                            <button type="button" class="btn btn-flat shadow-sm mt-2 btn-sm text-school-lightgray" data-toggle="modal" data-target="#adddept_modal">Add Department</button>
                                            <button type="button" class="btn btn-flat shadow-sm mt-2 btn-sm text-school-lightgray" data-toggle="modal" data-target="#addcourse_modal">Add Course</button>
                                            <button type="button" class="btn btn-flat shadow-sm mt-2 btn-sm text-school-lightgray" data-toggle="modal" data-target="#addcourseunit_modal">Add Course Unit</button>
                                            <button type="button" class="btn btn-flat shadow-sm mt-2 btn-sm text-school-lightgray" data-toggle="modal" data-target="#addcalendar_modal">Add Teaching Period</button>
                                            <button type="button" class="btn btn-flat shadow-sm mt-2 btn-sm text-school-lightgray" data-toggle="modal" data-target="#addclassroom_modal">Add Classroom</button>
                                            <button type="button" class="btn btn-flat shadow-sm mt-2 btn-sm text-school-lightgray" data-toggle="modal" data-target="#addclass_modal">Add Class</button>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div id="school-accordion">
                                                        <div class="card-header" id="headingOne">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-flat shadow-sm btn-lg text-school-lightgray" data-toggle="collapse" data-target="#sch_depts_view" aria-expanded="true" aria-controls="sch_depts_view">
                                                                Departments
                                                                </button>
                                                            </h5>
                                                        </div>

                                                        <div id="sch_depts_view" class="collapse" aria-labelledby="headingOne" data-parent="#school-accordion">
                                                            <div class="card-body text-school-darkgrey">
                                                                <?php
                                                                if($dept_cnt==0){
                                                                    ?>
                                                                    <div class="alert text-center text-school-lightgrey">
                                                                        <i class="fa fa-info fa-2x"></i><br>No Departments Recorded.
                                                                    </div>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <div class="table-responsive">
                                                                        <table id="view_alldepts" class="table table-striped compact table-hover">
                                                                            <thead>
                                                                                <th>Name</th>
                                                                                <th>Location</th>
                                                                                <th>Email</th>
                                                                                <th>Contact</th>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                $sql=mysqli_query($con, "select * from department");
                                                                                if(mysqli_num_rows($sql)>0){
                                                                                    while($result=mysqli_fetch_assoc($sql)){
                                                                                        echo "<tr>";
                                                                                            ?><td><a href="admin.php?view=dept&q=<?php echo $result['department_id']; ?>#view_school" class="sch-link"><?php echo $result['name']; ?></a></td><?php
                                                                                            echo "<td>".$result['location']."</td>";
                                                                                            echo "<td>".$result['email']."</td>";
                                                                                            echo "<td>".$result['contact']."</td>";
                                                                                        echo "</tr>";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="card-header" id="CoursesHeading">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-flat shadow-sm btn-lg text-school-lightgray collapsed" data-toggle="collapse" data-target="#sch_courses_view" aria-expanded="false" aria-controls="sch_courses_view">
                                                                    Courses
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="sch_courses_view" class="collapse" aria-labelledby="CoursesHeading" data-parent="#school-accordion">
                                                            <div id="view_allcourses_div" class="card-body text-school-darkgrey">
                                                                <?php
                                                                if($courses_cnt==0){
                                                                    ?>
                                                                    <div class="alert text-center text-school-lightgrey">
                                                                        <i class="fa fa-info fa-2x"></i><br>No Courses Recorded.
                                                                    </div>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <div class="table-responsive">
                                                                        <table id="view_allcourses_tbl" class="table table-striped compact table-hover">
                                                                            <thead>
                                                                                <th>Name</th>
                                                                                <th>Department</th>
                                                                                <th>Course Units</th>
                                                                                <th>Students</th>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                $sql=mysqli_query($con, "SELECT courses.course_id as course_id, courses.name as course_name, department.name as dept_name, department.department_id as dept_id, 
                                                                                (SELECT COUNT(*) FROM course_unit WHERE course_unit.course_id=courses.course_id) AS course_unit_cnt, 
                                                                                (SELECT COUNT(*) FROM users WHERE users.course=courses.course_id AND users.category='Student') AS std_cnt FROM courses 
                                                                                INNER JOIN department ON courses.department_id=department.department_id");
                                                                                if(mysqli_num_rows($sql)>0){
                                                                                    while($result=mysqli_fetch_assoc($sql)){
                                                                                        echo "<tr>";
                                                                                            ?><td><a href="admin.php?view=course&q=<?php echo $result['course_id']; ?>#view_school" class="sch-link"><?php echo $result['course_name']; ?></a></td><?php
                                                                                            ?><td><a href="admin.php?view=dept&q=<?php echo $result['dept_id']; ?>#view_school" class="sch-link"><?php echo $result['dept_name']; ?></a></td><?php
                                                                                            echo "<td>".$result['course_unit_cnt']."</td>";
                                                                                            echo "<td>".$result['std_cnt']."</td>";
                                                                                        echo "</tr>";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>

                                                        <div class="card-header" id="CourseunitHeading">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-flat shadow-sm btn-lg text-school-lightgray collapsed" data-toggle="collapse" data-target="#sch_courseunit_view" aria-expanded="false" aria-controls="sch_courseunit_view">
                                                                    Course Units
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="sch_courseunit_view" class="collapse" aria-labelledby="CourseunitHeading" data-parent="#school-accordion">
                                                            <div id="view_allcunits_div" class="card-body text-school-darkgrey">
                                                                <?php
                                                                if($courseunit_cnt==0){
                                                                    ?>
                                                                    <div class="alert text-center text-school-lightgrey">
                                                                        <i class="fa fa-info fa-2x"></i><br>No Course Unit Recorded.
                                                                    </div>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <div class="table-responsive">
                                                                        <table id="view_allcourseunits" class="table table-sm compact table-striped table-hover">
                                                                            <thead>
                                                                                <th>Name</th>
                                                                                <th>Course</th>
                                                                                <th>Department</th>
                                                                                <th>Teachers</th>
                                                                                <th>Classes</th>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                $course_unit_tr=$course_unit_class=0;
                                                                                $sql=mysqli_query($con, "SELECT course_unit.course_unit_id as courseunit_id, course_unit.name as courseunit_name, courses.name as course_name, department.name as dept_name FROM course_unit inner join courses on course_unit.course_id=courses.course_id inner join department on courses.department_id=department.department_id");
                                                                                if(mysqli_num_rows($sql)>0){
                                                                                    while($result=mysqli_fetch_assoc($sql)){
                                                                                        echo "<tr>";
                                                                                            ?><td><a href="admin.php?view=c_unit&q=<?php echo $result['courseunit_id']; ?>#view_school" class="sch-link"><?php echo $result['courseunit_name']; ?></a></td><?php
                                                                                            echo "<td>".$result['course_name']."</td>";
                                                                                            echo "<td>".$result['dept_name']."</td>";
                                                                                            $course_unit_id=$result['courseunit_id'];
                                                                                            $tr_cunit_sql=mysqli_query($con,"select count(*) as course_unit_tr from teacher_courseunit where course_unit='$course_unit_id'");
                                                                                            if(mysqli_num_rows($tr_cunit_sql)>0){
                                                                                                while($tr_cunit_rows=mysqli_fetch_assoc($tr_cunit_sql)){
                                                                                                    $course_unit_tr=$tr_cunit_rows['course_unit_tr'];
                                                                                                }
                                                                                            }
                                                                                            echo "<td>".$course_unit_tr."</td>";

                                                                                            $cl_cunit_sql=mysqli_query($con,"select count(*) as course_unit_class from classes where course_unit_id='$course_unit_id'");
                                                                                            if(mysqli_num_rows($cl_cunit_sql)>0){
                                                                                                while($cl_cunit_rows=mysqli_fetch_assoc($cl_cunit_sql)){
                                                                                                    $course_unit_class=$cl_cunit_rows['course_unit_class'];
                                                                                                }
                                                                                            }
                                                                                            echo "<td>".$course_unit_class."</td>";
                                                                                        echo "</tr>";
                                                                                        $course_unit_tr=$course_unit_class=0;
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="card-header" id="TimingHeading">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-flat shadow-sm btn-lg text-school-lightgray collapsed" data-toggle="collapse" data-target="#sch_timing_view" aria-expanded="false" aria-controls="sch_courseunit_view">
                                                                    Teaching Periods & Classrooms
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="sch_timing_view" class="collapse" aria-labelledby="TimingHeading" data-parent="#school-accordion">
                                                            
                                                            <div class="card-body text-school-darkgrey">
                                                                <div class="row">
                                                                    <div class="col-md-7 border-right">
                                                                        <?php
                                                                        if($classroom_cnt==0){
                                                                            ?>
                                                                            <div class="alert text-center text-school-lightgrey">
                                                                                <i class="fa fa-info fa-2x"></i><br>No Classrooms Recorded.
                                                                            </div>
                                                                            <?php
                                                                        }else{
                                                                            ?>
                                                                            <div class="table-responsive">
                                                                                <table class="table table-sm table-striped table-hover">
                                                                                    <thead>
                                                                                        <th>Classroom</th>
                                                                                        <th>Location</th>
                                                                                        <th>Status</th>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php
                                                                                        $sql=mysqli_query($con, "SELECT * FROM classrooms");
                                                                                        if(mysqli_num_rows($sql)>0){
                                                                                            while($result=mysqli_fetch_assoc($sql)){
                                                                                                echo "<tr>";
                                                                                                    echo "<td>".$result['name']."</td>";
                                                                                                    echo "<td>".$result['location']."</td>";
                                                                                                    echo "<td>".$result['status']."</td>";
                                                                                                echo "</tr>";
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <?php
                                                                        if($calendar_cnt==0){
                                                                            ?>
                                                                            <div class="alert text-center text-school-lightgrey">
                                                                                <i class="fa fa-info fa-2x"></i><br>No Teaching Periods Recorded.
                                                                            </div>
                                                                            <?php
                                                                        }else{
                                                                            ?>
                                                                            <div class="table-responsive">
                                                                                <table class="table table-sm table-striped table-hover">
                                                                                    <thead>
                                                                                        <th>Period</th>
                                                                                        <th>Time</th>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php
                                                                                        $sql=mysqli_query($con, "SELECT * FROM school_calendar");
                                                                                        if(mysqli_num_rows($sql)>0){
                                                                                            while($result=mysqli_fetch_assoc($sql)){
                                                                                                echo "<tr>";
                                                                                                    echo "<td>".$result['teaching_period']."</td>";
                                                                                                    echo "<td>".$result['teaching_time']."</td>";
                                                                                                echo "</tr>";
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="card-header">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-flat shadow-sm btn-lg text-school-lightgray collapsed" data-toggle="collapse" data-target="#classes_view" aria-expanded="false" aria-controls="classes_view">
                                                                    Classes
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div id="classes_view" class="collapse" aria-labelledby="classes_view" data-parent="#school-accordion">
                                                            <div id="view_allclasses_div" class="card-body text-school-darkgrey">
                                                                <?php
                                                                if($classes_cnt==0){
                                                                    ?>
                                                                    <div class="alert text-center text-school-lightgrey">
                                                                        <i class="fa fa-info fa-2x"></i><br>No Classes Recorded.
                                                                    </div>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <div class="table-responsive">
                                                                        <table id="view_allclasses" class="table table-sm compact table-striped table-hover">
                                                                            <thead>
                                                                                <th>Teacher</th>
                                                                                <th>Course Unit</th>
                                                                                <th>Maximum Seats</th>
                                                                                <th>Day</th>
                                                                                <th>Teaching Period</th>
                                                                                <th>Classroom</th>
                                                                                <th>Students</th>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                $sql=mysqli_query($con, "SELECT classes.*, course_unit.name as class_course_unit, users.name as class_teacher, classrooms.name as class_room, 
                                                                                school_calendar.teaching_period as class_startperiod FROM classes inner join course_unit on classes.course_unit_id=course_unit.course_unit_id 
                                                                                inner join users on users.user_id=classes.teacher_id inner join classrooms on classes.classroom_id=classrooms.classroom_id 
                                                                                inner join school_calendar on classes.start_teaching_period=school_calendar.school_calendar_id");
                                                                                if(mysqli_num_rows($sql)>0){
                                                                                    while($result=mysqli_fetch_assoc($sql)){
                                                                                        echo "<tr>";
                                                                                            $class_endperiod_id=$result['end_teaching_period'];
                                                                                            $tr_cunit_sql=mysqli_query($con,"select * from school_calendar where school_calendar_id='$class_endperiod_id'");
                                                                                            if(mysqli_num_rows($tr_cunit_sql)>0){
                                                                                                while($tr_cunit_rows=mysqli_fetch_assoc($tr_cunit_sql)){
                                                                                                    $class_endperiod=$tr_cunit_rows['teaching_period'];
                                                                                                }
                                                                                            }
                                                                                            echo "<td>".$result['class_teacher']."</td>";
                                                                                            ?><td><a href="admin.php?view=classes&q=<?php echo $result['class_id']; ?>#view_school" class="sch-link"><?php echo $result['class_course_unit']; ?></a></td><?php
                                                                                            echo "<td>".$result['maximum_seats']."</td>";
                                                                                            echo "<td>".$result['class_day']."</td>";
                                                                                            echo "<td>".$result['class_startperiod']." - ".$class_endperiod."</td>";
                                                                                            echo "<td>".$result['class_room']."</td>";
                                                                                            $class_stds_cnt=0;
                                                                                            $class_stds_id=$result['class_id'];
                                                                                            $query=mysqli_query($con, "SELECT COUNT(*) AS class_stds_cnt FROM student_classes WHERE class_id='$class_stds_id'");
                                                                                            if(mysqli_num_rows($query)>0){
                                                                                                while($rows=mysqli_fetch_assoc($query)){
                                                                                                    $class_stds_cnt=$rows['class_stds_cnt'];
                                                                                                }
                                                                                            }
                                                                                            echo "<td>".$class_stds_cnt."</td>";
                                                                                        echo "</tr>";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                            
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <?php
                                                        if(isset($_GET['view'])){
                                                            ?>
                                                            <div class="school-card school-shadow-sm">
                                                                <?php
                                                                if($_GET['view']=='dept'){
                                                                    $view_dept_id=$_GET['q'];
                                                                    $sql=mysqli_query($con, "select * from department where department_id='$view_dept_id'");
                                                                    if(mysqli_num_rows($sql)>0){
                                                                        while($result=mysqli_fetch_assoc($sql)){
                                                                            $view_dept_name=$result['name'];
                                                                            $view_dept_location=$result['location'];
                                                                            $view_dept_email=$result['email'];
                                                                            $view_dept_contact=$result['contact'];
                                                                        }
                                                                        ?>
                                                                        <div class="school-card-header">
                                                                            <?php echo $view_dept_name; ?>
                                                                        </div>
                                                                        <div class="card-body">
                                                                        <form id="edit_depts_form">
                                                                            <div class="input-container">
                                                                                <input type="text" name="edit_dept_name" value="<?php echo $view_dept_name; ?>" required>
                                                                                <label for="input" class="label">Edit Name</label>
                                                                                <div class="underline"></div>
                                                                            </div>
                                                                            <div class="input-container mt-4">
                                                                                <input type="text" name="edit_dept_location" value="<?php echo $view_dept_location; ?>" required>
                                                                                <label for="input" class="label">Edit Location</label>
                                                                                <div class="underline"></div>
                                                                            </div>
                                                                            <div class="input-container mt-4">
                                                                                <input type="email" name="edit_dept_email" value="<?php echo $view_dept_email; ?>" required>
                                                                                <label for="input" class="label">Edit Email</label>
                                                                                <div class="underline"></div>
                                                                            </div>
                                                                            <div class="input-container mt-4">
                                                                                <input type="text" name="edit_dept_contact" value="<?php echo $view_dept_contact; ?>" required>
                                                                                <label for="input" class="label">Contact</label>
                                                                                <div class="underline"></div>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input type="checkbox" class="form-check-input" id="edit_dept_trash" value="Trash">
                                                                                <label class="form-check-label text-danger">Trash Department</label>
                                                                            </div>
                                                                            <input type="hidden" name="edit_dept" value="<?php echo $view_dept_id; ?>">
                                                                            <span class="text-danger" id="edit_dept_error"></span>
                                                                            <div class="dashed-line"></div>
                                                                            <div class="text-center">
                                                                                <div class="btn-group">
                                                                                    <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                                                                    <button type="submit" id="edit_dept_btn" class="btn sch-btn-orange">Edit</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }

                                                                if($_GET['view']=='course'){
                                                                    $view_course_id=$_GET['q'];
                                                                    $sql=mysqli_query($con, "select courses.*, department.name as course_dept from courses inner join department on courses.department_id=department.department_id where courses.course_id='$view_course_id'");
                                                                    if(mysqli_num_rows($sql)>0){
                                                                        while($result=mysqli_fetch_assoc($sql)){
                                                                            $view_course_name=$result['name'];
                                                                            $view_course_dept_id=$result['department_id'];
                                                                            $view_course_dept=$result['course_dept'];
                                                                        }
                                                                        ?>
                                                                        <div class="school-card-header">
                                                                            <?php echo $view_course_name; ?>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <form id="edit_course_form">
                                                                                <div class="input-container">
                                                                                    <input type="text" name="edit_course_name" value="<?php echo $view_course_name; ?>" required>
                                                                                    <label for="input" class="label">Edit Name</label>
                                                                                    <div class="underline"></div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <span class="text-secondary">Edit Department</span>
                                                                                    <select class="form-control" name="edit_course_dep" required>
                                                                                        <option value="<?php echo $view_course_dept_id; ?>"><?php echo $view_course_dept; ?></option>
                                                                                        <?php
                                                                                        $sql=mysqli_query($con, "select * from department where department_id!='$view_course_dept_id'");
                                                                                        if(mysqli_num_rows($sql)>0){
                                                                                            while($result=mysqli_fetch_assoc($sql)){
                                                                                                ?><option value="<?php echo $result['department_id']; ?>"><?php echo $result['name']; ?></option><?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                    <input type="checkbox" class="form-check-input" id="edit_course_trash" value="Trash">
                                                                                    <label class="form-check-label text-danger">Trash Course</label>
                                                                                </div>
                                                                                <input type="hidden" name="edit_course" value="<?php echo $view_course_id; ?>">
                                                                                <span class="text-danger" id="edit_course_error"></span>
                                                                                <div class="dashed-line"></div>
                                                                                <div class="text-center">
                                                                                    <div class="btn-group">
                                                                                        <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                                                                        <button type="submit" id="edit_course_btn" class="btn sch-btn-orange">Edit</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }

                                                                if($_GET['view']=='c_unit'){
                                                                    $view_c_unit_id=$_GET['q'];
                                                                    $sql=mysqli_query($con, "SELECT course_unit.*, courses.name AS course_name, courses.course_id AS course_id 
                                                                    FROM course_unit INNER JOIN courses ON course_unit.course_id=courses.course_id WHERE course_unit.course_unit_id='$view_c_unit_id'");
                                                                    if(mysqli_num_rows($sql)>0){
                                                                        while($result=mysqli_fetch_assoc($sql)){
                                                                            $view_c_unit_name=$result['name'];
                                                                            $view_c_unit_course=$result['course_name'];
                                                                            $view_c_unit_course_id=$result['course_id'];
                                                                        }
                                                                        ?>
                                                                        <div class="school-card-header">
                                                                            <?php echo $view_c_unit_name; ?>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <form id="edit_c_unit_form">
                                                                                <div class="input-container">
                                                                                    <input type="text" name="edit_c_unit_name" value="<?php echo $view_c_unit_name; ?>" required>
                                                                                    <label for="input" class="label">Edit Name</label>
                                                                                    <div class="underline"></div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <span class="text-secondary">Edit Course</span>
                                                                                    <select class="form-control" name="edit_c_unit_course" required>
                                                                                        <option value="<?php echo $view_c_unit_course_id; ?>"><?php echo $view_c_unit_course; ?></option>
                                                                                        <?php
                                                                                        $sql=mysqli_query($con, "select * from courses where course_id!='$view_c_unit_course_id'");
                                                                                        if(mysqli_num_rows($sql)>0){
                                                                                            while($result=mysqli_fetch_assoc($sql)){
                                                                                                ?><option value="<?php echo $result['course_id']; ?>"><?php echo $result['name']; ?></option><?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                    <input type="checkbox" class="form-check-input" id="edit_c_unit_trash" value="Trash">
                                                                                    <label class="form-check-label text-danger">Trash Course Unit</label>
                                                                                </div>
                                                                                <input type="hidden" name="edit_c_unit" value="<?php echo $view_c_unit_id; ?>">
                                                                                <span class="text-danger" id="edit_c_unit_error"></span>
                                                                                <div class="dashed-line"></div>
                                                                                <div class="text-center">
                                                                                    <div class="btn-group">
                                                                                        <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                                                                        <button type="submit" id="edit_c_unit_btn" class="btn sch-btn-orange">Edit</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }

                                                                if($_GET['view']=='classes'){
                                                                    $view_class_id=$_GET['q'];
                                                                    $sql=mysqli_query($con, "SELECT * FROM classes_view WHERE class_id='$view_class_id'");
                                                                    if(mysqli_num_rows($sql)>0){
                                                                        while($result=mysqli_fetch_assoc($sql)){
                                                                            $view_class_name=$result['class_name'];
                                                                            $view_class_course=$result['course_unit_id'];
                                                                            $view_class_tr_id=$result['teacher_id'];
                                                                            $view_class_tr=$result['class_teacher'];
                                                                            $view_class_room_id=$result['classroom_id'];
                                                                            $view_class_room=$result['class_room'];
                                                                            $view_class_seats=$result['maximum_seats'];
                                                                            $view_class_day=$result['class_day'];
                                                                            $view_class_start_id=$result['start_teaching_period'];
                                                                            $view_class_start=$result['class_start_time'];
                                                                            $view_class_end_id=$result['end_teaching_period'];
                                                                            $view_class_end=$result['class_end_time'];
                                                                        }
                                                                        ?>
                                                                        <div class="school-card-header">
                                                                            <?php echo $view_class_name; ?>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <form id="edit_class_form">
                                                                                <div class="form-group">
                                                                                    <span class="text-secondary">Edit Teacher</span>
                                                                                    <div class="form-group">
                                                                                        <select class="form-control" name="edit_class_teacher" required>
                                                                                            <option value="<?php echo $view_class_tr_id; ?>"><?php echo $view_class_tr; ?></option>
                                                                                            <?php
                                                                                            $query=mysqli_query($con, "SELECT users.* FROM users INNER JOIN teacher_courseunit on users.user_id=teacher_courseunit.teacher_id
                                                                                            WHERE users.category='Teacher' AND teacher_courseunit.course_unit='$view_class_course' AND users.user_id!='$view_class_tr_id' GROUP BY users.user_id");
                                                                                            if(mysqli_num_rows($query)>0){
                                                                                                while($rows=mysqli_fetch_assoc($query)){
                                                                                                    ?><option value="<?php echo $rows['user_id']; ?>"><?php echo $rows['name']; ?></option> <?php
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <span class="text-secondary">Edit Classroom</span>
                                                                                    <select class="form-control" name="edit_class_room" required>
                                                                                        <option value="<?php echo $view_class_room_id; ?>"><?php echo $view_class_room; ?></option>
                                                                                        <?php
                                                                                        $query=mysqli_query($con, "select * from classrooms where status='Available' and classroom_id!='$view_class_room_id'");
                                                                                        if(mysqli_num_rows($query)>0){
                                                                                            while($rows=mysqli_fetch_assoc($query)){
                                                                                                ?><option value="<?php echo $rows['classroom_id']; ?>"><?php echo $rows['name']; ?></option> <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="input-container mt-4">
                                                                                    <input type="text" name="edit_class_seats" value="<?php echo $view_class_seats; ?>" required>
                                                                                    <label for="input" class="label">Edit Maximum Seats</label>
                                                                                    <div class="underline"></div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <span class="text-secondary">Edit Day</span>
                                                                                    <select class="form-control" name="edit_class_day" required>
                                                                                        <option value="<?php echo $view_class_day; ?>"><?php echo ucwords($view_class_day); ?></option>
                                                                                        <option value="monday">Monday</option>
                                                                                        <option value="tuesday">Tuesday</option>
                                                                                        <option value="wednesday">Wednesday</option>
                                                                                        <option value="thursday">Thursday</option>
                                                                                        <option value="friday">Friday</option>
                                                                                        <option value="saturday">Saturday</option>
                                                                                        <option value="sunday">Sunday</option>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <span class="text-secondary">Edit Edit Start Period</span>
                                                                                    <select class="form-control" name="edit_class_start" required>
                                                                                        <option value="<?php echo $view_class_start_id; ?>"><?php echo $view_class_start; ?></option>
                                                                                        <?php
                                                                                        $query=mysqli_query($con, "select * from school_calendar where school_calendar_id!='$view_class_start_id'");
                                                                                        if(mysqli_num_rows($query)>0){
                                                                                            while($rows=mysqli_fetch_assoc($query)){
                                                                                                ?><option value="<?php echo $rows['school_calendar_id']; ?>"><?php echo "".$rows['teaching_period']." (".$rows['teaching_time'].")";  ?></option> <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
 
                                                                                <div class="form-group">
                                                                                    <span class="text-secondary">Edit Edit End Period</span>
                                                                                    <select class="form-control" name="edit_class_end" required>
                                                                                        <option value="<?php echo $view_class_end_id; ?>"><?php echo $view_class_end; ?></option>
                                                                                        <?php
                                                                                        $query=mysqli_query($con, "select * from school_calendar where school_calendar_id!='$view_class_end_id'");
                                                                                        if(mysqli_num_rows($query)>0){
                                                                                            while($rows=mysqli_fetch_assoc($query)){
                                                                                                ?><option value="<?php echo $rows['school_calendar_id']; ?>"><?php echo "".$rows['teaching_period']." (".$rows['teaching_time'].")";  ?></option> <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                                
                                                                                <div class="form-check">
                                                                                    <input type="checkbox" class="form-check-input" id="edit_class_trash" value="Trash">
                                                                                    <label class="form-check-label text-danger">Trash Class</label>
                                                                                </div>
                                                                                <input type="hidden" name="edit_class" value="<?php echo $view_class_id; ?>">
                                                                                <span class="text-danger" id="edit_class_error"></span>
                                                                                <div class="dashed-line"></div>
                                                                                <div class="text-center">
                                                                                    <div class="btn-group">
                                                                                        <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                                                                        <button type="submit" id="edit_class_btn" class="btn sch-btn-orange">Edit</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <div class="text-center" style="opacity: 10%;padding:30px">
                                                                <img src="../img/webdesign.png" height="300" width="300" class="img-fluid">
                                                            </div>
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="adddept_modal" tabindex="-1" role="dialog" aria-labelledby="adddept_modal" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header school-modal-header">
                                                            <h5 class="modal-title">Add Department</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="new_depts_form">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="input-container">
                                                                            <input type="text" id="new_dept_name" name="new_dept_name" required>
                                                                            <label for="input" class="label">Name</label>
                                                                            <div class="underline"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="input-container">
                                                                            <input type="text" id="new_dept_location" name="new_dept_location" required>
                                                                            <label for="input" class="label">Location</label>
                                                                            <div class="underline"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="input-container">
                                                                            <input type="email" id="new_dept_email" name="new_dept_email" required>
                                                                            <label for="input" class="label">Email</label>
                                                                            <div class="underline"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="input-container">
                                                                            <input type="text" id="new_dept_contact" name="new_dept_contact" required>
                                                                            <label for="input" class="label">Contact</label>
                                                                            <div class="underline"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="new_dept" value="Add">
                                                                <span class="text-danger" id="new_dept_error"></span>
                                                                <div class="dashed-line"></div>
                                                                <div class="text-center">
                                                                    <div class="btn-group">
                                                                        <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                                                        <button type="submit" id="new_dept_btn" class="btn sch-btn-orange">Save</button>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="addcourse_modal" tabindex="-1" role="dialog" aria-labelledby="addcourse_modal" aria-hidden="true">
                                                <div class="modal-dialog modal-xs" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header school-modal-header">
                                                            <h5 class="modal-title">Add Course</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="new_course_form">
                                                                <div class="form-group">
                                                                    <select class="form-control" name="new_course_dep" required>
                                                                        <option value="">Select Department</option>
                                                                        <?php
                                                                        $sql=mysqli_query($con, "select * from department");
                                                                        if(mysqli_num_rows($sql)>0){
                                                                            while($result=mysqli_fetch_assoc($sql)){
                                                                                ?><option value="<?php echo $result['department_id']; ?>"><?php echo $result['name']; ?></option><?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <span class="text-secondary"><small>For multiple inputs, use commas (,) to separate them. <br>对于多个输入，请使用逗号（,）将它们分隔开。</small> </span>
                                                                <div class="input-container mt-4">
                                                                    <input type="text" name="new_course_name" required>
                                                                    <label for="input" class="label">Course Name</label>
                                                                    <div class="underline"></div>
                                                                </div>
                                                                <input type="hidden" name="new_course" value="Add">
                                                                <span class="text-danger" id="new_course_error"></span>
                                                                <div class="dashed-line"></div>
                                                                <div class="text-center">
                                                                    <div class="btn-group">
                                                                        <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                                                        <button type="submit" id="new_course_btn" class="btn sch-btn-orange">Save</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="modal fade" id="addcourseunit_modal" tabindex="-1" role="dialog" aria-labelledby="addcourseunit_modal" aria-hidden="true">
                                                <div class="modal-dialog modal-xs" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header school-modal-header">
                                                            <h5 class="modal-title">Add Course Unit</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="new_courseunit_form">
                                                                <div class="form-group">
                                                                    <select class="form-control" name="new_courseunit_course" required>
                                                                        <option value="">Select Course</option>
                                                                        <?php
                                                                        $sql=mysqli_query($con, "select * from courses");
                                                                        if(mysqli_num_rows($sql)>0){
                                                                            while($result=mysqli_fetch_assoc($sql)){
                                                                                ?><option value="<?php echo $result['course_id']; ?>"><?php echo $result['name']; ?></option><?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <span class="text-secondary"><small>For multiple inputs, use commas (,) to separate them. <br>对于多个输入，请使用逗号（,）将它们分隔开。</small> </span>
                                                                <div class="input-container mt-4">
                                                                    <input type="text" name="new_courseunit_name" required>
                                                                    <label for="input" class="label">Course Unit Name</label>
                                                                    <div class="underline"></div>
                                                                </div>
                                                                <input type="hidden" name="new_courseunit" value="Add">
                                                                <span class="text-danger" id="new_courseunit_error"></span>
                                                                <div class="dashed-line"></div>
                                                                <div class="text-center">
                                                                    <div class="btn-group">
                                                                        <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                                                        <button type="submit" id="new_courseunit_btn" class="btn sch-btn-orange">Save</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="modal fade" id="addcalendar_modal" tabindex="-1" role="dialog" aria-labelledby="addcalendar_modal" aria-hidden="true">
                                                <div class="modal-dialog modal-xs" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header school-modal-header">
                                                            <h5 class="modal-title">Add Teaching Period</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="new_calendar_form">
                                                                <div class="input-container mt-2">
                                                                    <input type="text" name="new_calendar_name" required>
                                                                    <label for="input" class="label">Teaching Period</label>
                                                                    <div class="underline"></div>
                                                                </div>
                                                                <div class="input-container mt-4">
                                                                    <input type="text" name="new_calendar_time" required>
                                                                    <label for="input" class="label">Teaching Period Time</label>
                                                                    <div class="underline"></div>
                                                                </div>
                                                                <input type="hidden" name="new_calendar" value="Add">
                                                                <span class="text-danger" id="new_calendar_error"></span>
                                                                <div class="dashed-line"></div>
                                                                <div class="text-center">
                                                                    <div class="btn-group">
                                                                        <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                                                        <button type="submit" id="new_calendar_btn" class="btn sch-btn-orange">Save</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="addclassroom_modal" tabindex="-1" role="dialog" aria-labelledby="addclassroom_modal" aria-hidden="true">
                                                <div class="modal-dialog modal-xs" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header school-modal-header">
                                                            <h5 class="modal-title">Add Classroom</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="new_classroom_form">
                                                                <div class="input-container mt-2">
                                                                    <input type="text" name="new_classroom_name" required>
                                                                    <label for="input" class="label">Classroom Name</label>
                                                                    <div class="underline"></div>
                                                                </div>
                                                                <div class="input-container mt-4">
                                                                    <input type="text" name="new_classroom_location" required>
                                                                    <label for="input" class="label">Classroom Location</label>
                                                                    <div class="underline"></div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select class="form-control" name="new_classroom_status" required>
                                                                        <option>Available</option>
                                                                        <option>Occupied</option>
                                                                    </select>
                                                                </div>
                                                                <input type="hidden" name="new_classroom" value="Add">
                                                                <span class="text-danger" id="new_classroom_error"></span>
                                                                <div class="dashed-line"></div>
                                                                <div class="text-center">
                                                                    <div class="btn-group">
                                                                        <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                                                        <button type="submit" id="new_classroom_btn" class="btn sch-btn-orange">Save</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="view_students" role="tabpanel">
                                            <button type="button" class="btn btn-flat shadow-sm mt-2 btn-sm text-school-lightgray" data-toggle="modal" data-target="#addstudent_modal">Add Student</button>
                                            <?php  
                                            if($student_cnt==0){
                                                ?>
                                                <div class="alert text-center text-school-lightgrey">
                                                    <i class="fa fa-info fa-2x"></i><br>No Students Recorded.
                                                </div>
                                                <?php
                                            }else{
                                                ?>
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <div id="view_stds_div" class="table-responsive text-school-lightgrey">
                                                            <table id="view_allstudents" class="table table-sm compact table-striped table-hover">
                                                                <thead>
                                                                    <th>No</th>
                                                                    <th>Name</th>
                                                                    <th>Contact</th>
                                                                    <th>Address</th>
                                                                    <th>Department</th>
                                                                    <th>Course</th>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $sql=mysqli_query($con, "select users.*,department.name as std_dept, courses.name as std_course from users inner join department on users.department=department.department_id inner join courses on users.course=courses.course_id where users.category='Student'");
                                                                    if(mysqli_num_rows($sql)>0){
                                                                        while($result=mysqli_fetch_assoc($sql)){
                                                                            echo "<tr>";
                                                                                echo "<td>".$result['user_no']."</td>";
                                                                                ?><td><a href="admin.php?student_view=student&std_id=<?php echo $result['user_id']; ?>#view_students" class="sch-link"><?php echo $result['name']; ?></a></td><?php
                                                                                echo "<td>".$result['contact']."</td>";
                                                                                echo "<td>".$result['address']."</td>";
                                                                                echo "<td>".$result['std_dept']."</td>";
                                                                                echo "<td>".$result['std_course']."</td>";
                                                                            echo "</tr>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?php
                                                            if(isset($_GET['student_view'])){
                                                                if(isset($_GET['std_id'])){
                                                                    $std_id = $_GET['std_id'];

                                                                    $sql=mysqli_query($con, "select users.*,department.name as std_dept, courses.name as std_course from users 
                                                                    inner join department on users.department=department.department_id 
                                                                    inner join courses on users.course=courses.course_id 
                                                                    where users.user_id='$std_id' and users.category='Student'");
                                                                    if(mysqli_num_rows($sql)>0){
                                                                        while($result=mysqli_fetch_assoc($sql)){
                                                                            $std_no=$result['user_no'];
                                                                            $std_name=$result['name'];
                                                                            $std_contact=$result['contact'];
                                                                            $std_address=$result['address'];
                                                                            $std_dept=$result['std_dept'];
                                                                            $std_course=$result['std_course'];
                                                                            $std_pic=$result['picture'];
                                                                            $std_username=$result['username'];
                                                                            $std_password=$result['password'];
                                                                        }
                                                                        ?>
                                                                        <div class="card-body profile-card text-school-lightgray">
                                                                            <div class="d-flex flex-column align-items-center text-center">
                                                                                <img src="<?php echo !empty($std_pic)?$std_pic:"../img/profile_pics/student.jpeg" ?>" alt="Student" class="rounded-circle shadow-sm" width="100">
                                                                                <div class="mt-3">
                                                                                <h4><?php echo $std_name; ?></h4>
                                                                                <p class="text-secondary mb-1"><?php echo "Student ".$std_no.""; ?></p>
                                                                                <p class="text-muted font-size-sm"><?php echo "".$std_dept." | ".$std_course.""; ?></p>
                                                                                <p class="text-muted font-size-sm"><?php echo "".$std_contact." | ".$std_address.""; ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div id="view_std_accordion">
                                                                                <div class="mt-3">
                                                                                    <button class="btn btn-flat shadow-sm btn-sm text-school-lightgray" data-toggle="collapse" data-target="#edit_tr_info" aria-expanded="true" aria-controls="collapseOne">
                                                                                        Edit Information
                                                                                    </button>
                                                                                    <div id="edit_tr_info" class="collapse school-shadow-sm" aria-labelledby="edit_tr_info" data-parent="#view_std_accordion">
                                                                                        <div class="card-body">
                                                                                            <form id="edit_student_form">
                                                                                                <div class="input-container">
                                                                                                    <input type="text" name="edit_student_no" value="<?php echo $std_no; ?>" required>
                                                                                                    <label for="input" class="label">Edit User Number</label>
                                                                                                    <div class="underline"></div>
                                                                                                </div>
                                                                                                <div class="input-container mt-4">
                                                                                                    <input type="text" name="edit_student_name" value="<?php echo $std_name; ?>" required>
                                                                                                    <label for="input" class="label">Edit Name</label>
                                                                                                    <div class="underline"></div>
                                                                                                </div>
                                                                                                <div class="input-container mt-4">
                                                                                                    <input type="text" name="edit_student_contact" value="<?php echo $std_contact; ?>" required>
                                                                                                    <label for="input" class="label">Edit Contact</label>
                                                                                                    <div class="underline"></div>
                                                                                                </div>
                                                                                                <div class="input-container mt-4">
                                                                                                    <input type="text" name="edit_student_address" value="<?php echo $std_address; ?>" required>
                                                                                                    <label for="input" class="label">Edit Address</label>
                                                                                                    <div class="underline"></div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-6">
                                                                                                        <div class="input-container mt-3">
                                                                                                            <input type="text" name="edit_student_username" value="<?php echo $std_username; ?>" required>
                                                                                                            <label for="input" class="label">Edit Username</label>
                                                                                                            <div class="underline"></div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-sm-6">
                                                                                                        <div class="input-container mt-3">
                                                                                                            <input type="text" name="edit_student_password" value="123" required>
                                                                                                            <label for="input" class="label">Edit Password</label>
                                                                                                            <div class="underline"></div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    Edit Picture
                                                                                                    <input type="file" name="edit_student_picture" accept="image/png">
                                                                                                </div>
                                                                                                <div class="form-check">
                                                                                                    <input type="checkbox" class="form-check-input" id="trash_student_check">
                                                                                                    <label class="form-check-label text-danger" for="trash_student_check">Trash Student</label>
                                                                                                </div>
                                                                                                <input type="hidden" name="edit_student" value="<?php echo $std_id; ?>">
                                                                                                <span class="text-danger" id="edit_student_error"></span>
                                                                                                <div class="dashed-line"></div>
                                                                                                <div class="text-center">
                                                                                                    <div class="btn-group">
                                                                                                        <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                                                                                        <button type="submit" id="edit_student_btn" class="btn sch-btn-orange">Save</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <h5 class="mb-2 mt-2">
                                                                                    <button class="btn btn-flat shadow-sm btn-sm text-school-lightgray collapsed" data-toggle="collapse" data-target="#std_assignments" aria-expanded="false" aria-controls="tr_courseunits">
                                                                                        Assignments
                                                                                    </button>
                                                                                </h5>
                                                                                    
                                                                                <div id="std_assignments" class="collapse" aria-labelledby="tr_unit_heading" data-parent="#view_std_accordion">
                                                                                    <div class="card-body">
                                                                                        <?php
                                                                                        $all_subsql=mysqli_query($con, "SELECT assignments.*,classes_view.class_name AS classes_name  FROM assignments 
                                                                                        INNER JOIN student_classes ON assignments.class_id=student_classes.class_id 
                                                                                        INNER JOIN classes_view ON student_classes.class_id=classes_view.class_id 
                                                                                        WHERE student_classes.student_id='$std_id'");
                                                                                        if(mysqli_num_rows($all_subsql)>0){
                                                                                            ?>
                                                                                            <div class="table-responsive">
                                                                                                <table class="table table-sm table-hover table-striped table-borderless">
                                                                                                    <thead>
                                                                                                        <th>Assignment</th>
                                                                                                        <th>Class</th>
                                                                                                        <th>Grade</th>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <?php
                                                                                                        $assignment_grade=$assignment_tot_grade=$assignment_avg_grade=0;
                                                                                                        while($all_subrows=mysqli_fetch_assoc($all_subsql)){
                                                                                                            $assignment_id=$all_subrows['assignment_id'];
                                                                                                            if(is_numeric($all_subrows['total_points'])){
                                                                                                                $assignment_tot_grade+=$all_subrows['total_points'];
                                                                                                            }

                                                                                                            $assignment_std_sub=0;

                                                                                                            $sub_sql=mysqli_query($con, "SELECT * FROM submissions WHERE student_id='$std_id' AND assignment_id='$assignment_id'");
                                                                                                            if(mysqli_num_rows($sub_sql)>0){
                                                                                                                while($sub_rows=mysqli_fetch_assoc($sub_sql)){
                                                                                                                    if(is_numeric($sub_rows['grade'])){
                                                                                                                        $assignment_std_sub=$sub_rows['grade'];
                                                                                                                        $assignment_grade+=$sub_rows['grade'];
                                                                                                                    }
                                                                                                                }
                                                                                                            }
                                                                                                            
                                                                                                            echo "<tr>";
                                                                                                                echo "<td>".$all_subrows['title']."</td>";
                                                                                                                echo "<td>".$all_subrows['classes_name']."</td>";
                                                                                                                echo "<td>".$assignment_std_sub."/".$all_subrows['total_points']."</td>";
                                                                                                            echo "</tr>";
                                                                                                        }

                                                                                                        $assignment_avg_grade=round(($assignment_grade/$assignment_tot_grade)*100,2);
                                                                                                        ?>
                                                                                                        <tr class="footer">
                                                                                                            <td colspan="2"><b>Average Grade</b></td>
                                                                                                            <td><b><?php echo "".$assignment_avg_grade." %"; ?></b></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                            <ul>
                                                                                                <?php
                                                                                                // while($trc_rows=mysqli_fetch_assoc($trc_sql)){
                                                                                                //     echo "<li>".$trc_rows['tr_courseunit']."</li>";
                                                                                                // }
                                                                                                ?>
                                                                                            </ul>
                                                                                            <?php
                                                                                        }else{
                                                                                            ?>
                                                                                            <div class="alert text-center">
                                                                                                <i class="fa fa-info fa-2x"></i><br>Student has not attempted any assignment. <br>学生未尝试任何作业。
                                                                                            </div>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }else{
                                                                        ?>
                                                                        <div class="alert alert-danger text-center">
                                                                            <i class="fa fa-exclamation-triangle fa-2x"></i><br>Student does not exist.
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }else{
                                                                ?>
                                                                <div class="text-center" style="opacity: 10%;padding:30px">
                                                                    <img src="../img/webdesign.png" height="300" width="300" class="img-fluid">
                                                                </div>
                                                                <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="tab-pane" id="view_general_timetable" role="tabpanel">
                                            <?php
                                            if($classes_cnt==0){
                                                ?>
                                                <div class="alert text-center">
                                                    <i class="fa fa-info fa-2x"></i><br>No Classes Added.
                                                </div>
                                                <?php
                                            }else{
                                                ?>
                                                <div class="table-responsive">
                                                    <table class="table table-sm table-striped table-bordered table-hover text-school-lightgray">
                                                        <thead>
                                                            <th>Timing</th>
                                                            <th>Monday</th>
                                                            <th>Tuesday</th>
                                                            <th>Wednesday</th>
                                                            <th>Thursday</th>
                                                            <th>Friday</th>
                                                            <th>Saturday</th>
                                                            <th>Sunday</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $mon_1_session=$tue_1_session=$wed_1_session=$thur_1_session=$fri_1_session=$sat_1_session=$sun_1_session='';
                                                            $mon_2_session=$tue_2_session=$wed_2_session=$thur_2_session=$fri_2_session=$sat_2_session=$sun_2_session='';
                                                            $mon_3_session=$tue_3_session=$wed_3_session=$thur_3_session=$fri_3_session=$sat_3_session=$sun_3_session='';
                                                            $mon_4_session=$tue_4_session=$wed_4_session=$thur_4_session=$fri_4_session=$sat_4_session=$sun_4_session='';
                                                            $mon_5_session=$tue_5_session=$wed_5_session=$thur_5_session=$fri_5_session=$sat_5_session=$sun_5_session='';
                                                            $sql=mysqli_query($con, "SELECT classes.*, course_unit.name as class_course_unit, users.name as class_teacher, classrooms.name as class_room, 
                                                            school_calendar.teaching_period as class_startperiod FROM classes inner join course_unit on classes.course_unit_id=course_unit.course_unit_id 
                                                            inner join users on users.user_id=classes.teacher_id inner join classrooms on classes.classroom_id=classrooms.classroom_id 
                                                            inner join school_calendar on classes.start_teaching_period=school_calendar.school_calendar_id");
                                                            while($rows=mysqli_fetch_assoc($sql)){
                                                                $class_tr=$rows['class_teacher'];
                                                                $class_cunit=$rows['class_course_unit'];
                                                                $class_day=$rows['class_day'];
                                                                $class_startperiod=$rows['class_startperiod'];
                                                                $class_startperiod1=$rows['start_teaching_period'];
                                                                $class_endperiod=$rows['end_teaching_period'];
                                                                $class_room=$rows['class_room'];
                                                                
                                                                $class_pdetails="<li>".$class_cunit."<br>".$class_room." (".$class_startperiod1."-".$class_endperiod." 节)<br><em>".$class_tr."</em><br></li>";

                                                                //-- 第一节 - 第二节 ---
                                                                if($class_day=='monday' && $class_startperiod=1 && ($class_endperiod>=2 && $class_endperiod<3)){ $mon_1_session.=$class_pdetails; }
                                                                if($class_day=='tuesday' && $class_startperiod=1 && ($class_endperiod>=2 && $class_endperiod<3)){ $tue_1_session.=$class_pdetails; }
                                                                if($class_day=='wednesday' && $class_startperiod=1 && ($class_endperiod>=2 && $class_endperiod<3)){ $wed_1_session.=$class_pdetails; }
                                                                if($class_day=='thursday' && $class_startperiod=1 && ($class_endperiod>=2 && $class_endperiod<3)){ $thur_1_session.=$class_pdetails; }
                                                                if($class_day=='friday' && $class_startperiod=1 && ($class_endperiod>=2 && $class_endperiod<3)){ $fri_1_session.=$class_pdetails; }
                                                                if($class_day=='saturday' && $class_startperiod=1 && ($class_endperiod>=2 && $class_endperiod<3)){ $sat_1_session.=$class_pdetails; }
                                                                if($class_day=='sunday' && $class_startperiod=1 && ($class_endperiod>=2 && $class_endperiod<3)){ $sun_1_session.=$class_pdetails; }
                                                                //-- 第一节 - 第二节 ---
                                                                //-- 第三节 - 第五节 ---
                                                                if($class_day=='monday' && $class_startperiod1>=3 && ($class_endperiod>=4 && $class_endperiod<6)){ $mon_2_session.=$class_pdetails; }
                                                                if($class_day=='tuesday' && $class_startperiod1>=3 && ($class_endperiod>=4 && $class_endperiod<6)){ $tue_2_session.=$class_pdetails; }
                                                                if($class_day=='wednesday' && $class_startperiod1>=3 && ($class_endperiod>=4 && $class_endperiod<6)){ $wed_2_session.=$class_pdetails; }
                                                                if($class_day=='thursday' && $class_startperiod1>=3 && ($class_endperiod>=4 && $class_endperiod<6)){ $thur_2_session.=$class_pdetails; }
                                                                if($class_day=='friday' && $class_startperiod1>=3 && ($class_endperiod>=4 && $class_endperiod<6)){ $fri_2_session.=$class_pdetails; }
                                                                if($class_day=='saturday' && $class_startperiod1>=3 && ($class_endperiod>=4 && $class_endperiod<6)){ $sat_2_session.=$class_pdetails; }
                                                                if($class_day=='sunday' && $class_startperiod1>=3 && ($class_endperiod>=4 && $class_endperiod<6)){ $sun_2_session.=$class_pdetails; }
                                                                //-- 第三节 - 第五节 ---
                                                                //-- 第六节 - 第八节 ---
                                                                if($class_day=='monday' && $class_startperiod1>=6 && ($class_endperiod>=7 && $class_endperiod<=8)){ $mon_3_session.=$class_pdetails; }
                                                                if($class_day=='tuesday' && $class_startperiod1>=6 && ($class_endperiod>=7 && $class_endperiod<=8)){ $tue_3_session.=$class_pdetails; }
                                                                if($class_day=='wednesday' && $class_startperiod1>=6 && ($class_endperiod>=7 && $class_endperiod<=8)){ $wed_3_session.=$class_pdetails; }
                                                                if($class_day=='thursday' && $class_startperiod1>=6 && ($class_endperiod>=7 && $class_endperiod<=8)){ $thur_3_session.=$class_pdetails; }
                                                                if($class_day=='friday' && $class_startperiod1>=6 && ($class_endperiod>=7 && $class_endperiod<=8)){ $fri_3_session.=$class_pdetails; }
                                                                if($class_day=='saturday' && $class_startperiod1>=6 && ($class_endperiod>=7 && $class_endperiod<=8)){ $sat_3_session.=$class_pdetails; }
                                                                if($class_day=='sunday' && $class_startperiod1>=6 && ($class_endperiod>=7 && $class_endperiod<=8)){ $sun_3_session.=$class_pdetails; }
                                                                //-- 第六节 - 第八节 ---
                                                                //-- 第九节 - 第十一节 ---
                                                                if($class_day=='monday' && $class_startperiod1>=9 && ($class_endperiod>=10 && $class_endperiod<=11)){ $mon_4_session.=$class_pdetails; }
                                                                if($class_day=='tuesday' && $class_startperiod1>=9 && ($class_endperiod>=10 && $class_endperiod<=11)){ $tue_4_session.=$class_pdetails; }
                                                                if($class_day=='wednesday' && $class_startperiod1>=9 && ($class_endperiod>=10 && $class_endperiod<=11)){ $wed_4_session.=$class_pdetails; }
                                                                if($class_day=='thursday' && $class_startperiod1>=9 && ($class_endperiod>=10 && $class_endperiod<=11)){ $thur_4_session.=$class_pdetails; }
                                                                if($class_day=='friday' && $class_startperiod1>=9 && ($class_endperiod>=10 && $class_endperiod<=11)){ $fri_4_session.=$class_pdetails; }
                                                                if($class_day=='saturday' && $class_startperiod1>=9 && ($class_endperiod>=10 && $class_endperiod<=11)){ $sat_4_session.=$class_pdetails; }
                                                                if($class_day=='sunday' && $class_startperiod1>=9 && ($class_endperiod>=10 && $class_endperiod<=11)){ $sun_4_session.=$class_pdetails; }
                                                                //-- 第九节 - 第十一节 ---
                                                                //-- 第十二节 - 第十三节 ---
                                                                if($class_day=='monday' && $class_startperiod1>=12 && ($class_endperiod>=13 && $class_endperiod<=13)){ $mon_5_session.=$class_pdetails; }
                                                                if($class_day=='tuesday' && $class_startperiod1>=12 && ($class_endperiod>=13 && $class_endperiod<=13)){ $tue_5_session.=$class_pdetails; }
                                                                if($class_day=='wednesday' && $class_startperiod1>=12 && ($class_endperiod>=13 && $class_endperiod<=13)){ $wed_5_session.=$class_pdetails; }
                                                                if($class_day=='thursday' && $class_startperiod1>=12 && ($class_endperiod>=13 && $class_endperiod<=13)){ $thur_5_session.=$class_pdetails; }
                                                                if($class_day=='friday' && $class_startperiod1>=12 && ($class_endperiod>=13 && $class_endperiod<=13)){ $fri_5_session.=$class_pdetails; }
                                                                if($class_day=='saturday' && $class_startperiod1>=12 && ($class_endperiod>=13 && $class_endperiod<=13)){ $sat_5_session.=$class_pdetails; }
                                                                if($class_day=='sunday' && $class_startperiod1>=12 && ($class_endperiod>=13 && $class_endperiod<=13)){ $sun_5_session.=$class_pdetails; }
                                                                //-- 第十二节 - 第十三节 ---
                                                                $class_pdetails=$class_startperiod1='';
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td><b>第一节 - 第二节</b> <br><small> 8:00 - 8:50 AM</small></td>
                                                                <td><?php echo $mon_1_session; ?></td>
                                                                <td><?php echo $tue_1_session; ?></td>
                                                                <td><?php echo $wed_1_session; ?></td>
                                                                <td><?php echo $thur_1_session; ?></td>
                                                                <td><?php echo $fri_1_session; ?></td>
                                                                <td><?php echo $sat_1_session; ?></td>
                                                                <td><?php echo $sun_1_session; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>第三节 - 第五节</b><br><small> 9:55 - 11:35 AM</small></td>
                                                                <td><?php echo $mon_2_session; ?></td>
                                                                <td><?php echo $tue_2_session; ?></td>
                                                                <td><?php echo $wed_2_session; ?></td>
                                                                <td><?php echo $thur_2_session; ?></td>
                                                                <td><?php echo $fri_2_session; ?></td>
                                                                <td><?php echo $sat_2_session; ?></td>
                                                                <td><?php echo $sun_2_session; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="8" style="background-color: #748194;opacity:50%"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>第六节 - 第八节</b><br><small> 2:55 - 3:40 PM</small></td>
                                                                <td><?php echo $mon_3_session; ?></td>
                                                                <td><?php echo $tue_3_session; ?></td>
                                                                <td><?php echo $wed_3_session; ?></td>
                                                                <td><?php echo $thur_3_session; ?></td>
                                                                <td><?php echo $fri_3_session; ?></td>
                                                                <td><?php echo $sat_3_session; ?></td>
                                                                <td><?php echo $sun_3_session; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>第九节 - 第十一节</b><br><small> 4:45 - 7:00 PM</small></td>
                                                                <td><?php echo $mon_4_session; ?></td>
                                                                <td><?php echo $tue_4_session; ?></td>
                                                                <td><?php echo $wed_4_session; ?></td>
                                                                <td><?php echo $thur_4_session; ?></td>
                                                                <td><?php echo $fri_4_session; ?></td>
                                                                <td><?php echo $sat_4_session; ?></td>
                                                                <td><?php echo $sun_4_session; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="8" style="background-color: #748194;opacity:50%"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>第十二节 - 第十三节</b><br><small> 7:50 - 8:40 PM</small></td>
                                                                <td><?php echo $mon_5_session; ?></td>
                                                                <td><?php echo $tue_5_session; ?></td>
                                                                <td><?php echo $wed_5_session; ?></td>
                                                                <td><?php echo $thur_5_session; ?></td>
                                                                <td><?php echo $fri_5_session; ?></td>
                                                                <td><?php echo $sat_5_session; ?></td>
                                                                <td><?php echo $sun_5_session; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="tab-pane" id="view_materials" role="tabpanel">
                                            <button type="button" class="btn btn-flat shadow-sm mt-2 btn-sm text-school-lightgray" data-toggle="modal" data-target="#addmaterial_modal">Add Materials</button>
                                            <?php
                                            if($materials_cnt==0){
                                                ?>
                                                <div class="alert text-center text-school-lightgrey">
                                                    <i class="fa fa-info fa-2x"></i><br>No Materials Recorded
                                                </div>
                                                <?php
                                            }else{
                                                ?>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="table-responsive">
                                                            <table class="table table-sm table-hover table-striped text-school-lightgrey">
                                                                <thead>
                                                                    <th>Name</th>
                                                                    <th>Details</th>
                                                                    <th>Course Unit</th>
                                                                    <th>Course</th>
                                                                    <th>Department</th>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $sql=mysqli_query($con, "SELECT materials.*, courses.name as material_course, course_unit.name as material_course_unit, department.name as material_department FROM materials 
                                                                    inner join courses on materials.course_id=courses.course_id inner join course_unit on materials.course_unit_id=course_unit.course_unit_id 
                                                                    inner join department on courses.department_id=department.department_id");
                                                                    if(mysqli_num_rows($sql)>0){
                                                                        while($result=mysqli_fetch_assoc($sql)){
                                                                            echo "<tr>";
                                                                                ?><td><a href="admin.php?material_view=material&mat_id=<?php echo $result['material_id']; ?>#view_materials" class="sch-link"><?php echo $result['name']; ?></a></td><?php
                                                                                echo "<td>".$result['details']."</td>";
                                                                                echo "<td>".$result['material_course_unit']."</td>";
                                                                                echo "<td>".$result['material_course']."</td>";
                                                                                echo "<td>".$result['material_department']."</td>";
                                                                            echo "</tr>";
                                                                        }
                                                                    }
                                                                    ?>  
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <?php
                                                        if(isset($_GET['material_view'])){
                                                            $mat_id=$_GET['mat_id'];

                                                            $sql=mysqli_query($con, "select * from materials where material_id='$mat_id'");
                                                            if(mysqli_num_rows($sql)>0){
                                                                while($result=mysqli_fetch_assoc($sql)){
                                                                    $mat_name=$result['name'];
                                                                    $mat_attachment=$result['attachment'];
                                                                }
                                                                ?>
                                                                <div class="school-card-header">
                                                                    <?php echo $mat_name; ?>
                                                                </div>
                                                                
                                                                <div class="school-pdf-container" style="position: relative;width: 100%;padding-top: 4px;">
                                                                    <iframe id="pdf-viewer" src="<?php echo $mat_attachment; ?>" frameborder="0" style="width: 100%;height: 700px;"></iframe>
                                                                </div>
                                                                
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <div class="alert text-center text-school-lightgrey"><i class="fa fa-info fa-2x"></i><br>Material Not Found.</div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="modal fade" id="addclass_modal" tabindex="-1" role="dialog" aria-labelledby="addclass_modal" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header school-modal-header">
                                                        <h5 class="modal-title">Add Class</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="new_class_form">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <select class="form-control" name="new_class_courseunit" required>
                                                                            <option value="">Select Course Unit</option>
                                                                            <?php
                                                                            // $sql=mysqli_query($con, "select * from course_unit where course_id='1'");
                                                                            $sql=mysqli_query($con, "select * from course_unit");
                                                                            if(mysqli_num_rows($sql)>0){
                                                                                while($result=mysqli_fetch_assoc($sql)){
                                                                                    ?><option value="<?php echo $result['course_unit_id']; ?>"><?php echo $result['name']; ?></option> <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <select class="form-control" name="new_class_teacher" required>
                                                                            <option value="">Select Teacher</option>
                                                                            <?php
                                                                            // $sql=mysqli_query($con, "select * from users where department='1' and category='Teacher'");
                                                                            $sql=mysqli_query($con, "select * from users where category='Teacher'");
                                                                            if(mysqli_num_rows($sql)>0){
                                                                                while($result=mysqli_fetch_assoc($sql)){
                                                                                    ?><option value="<?php echo $result['user_id']; ?>"><?php echo $result['name']; ?></option> <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <select class="form-control" name="new_class_room" required>
                                                                            <option value="">Select Classroom</option>
                                                                            <?php
                                                                            $sql=mysqli_query($con, "select * from classrooms where status='Available'");
                                                                            if(mysqli_num_rows($sql)>0){
                                                                                while($result=mysqli_fetch_assoc($sql)){
                                                                                    ?><option value="<?php echo $result['classroom_id']; ?>"><?php echo $result['name']; ?></option> <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="input-container mt-2">
                                                                        <input type="text" name="new_class_seats" required>
                                                                        <label for="input" class="label">Maximum Seats</label>
                                                                        <div class="underline"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <select class="form-control" name="new_class_day" required>
                                                                    <option value="">Select Day</option>
                                                                    <option value="monday">Monday</option>
                                                                    <option value="tuesday">Tuesday</option>
                                                                    <option value="wednesday">Wednesday</option>
                                                                    <option value="thursday">Thursday</option>
                                                                    <option value="friday">Friday</option>
                                                                    <option value="saturday">Saturday</option>
                                                                    <option value="sunday">Sunday</option>
                                                                </select>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <select class="form-control" name="new_class_startperiod" required>
                                                                            <option value="">Select Start Period</option>
                                                                            <?php
                                                                            $sql=mysqli_query($con, "select * from school_calendar");
                                                                            if(mysqli_num_rows($sql)>0){
                                                                                while($result=mysqli_fetch_assoc($sql)){
                                                                                    ?><option value="<?php echo $result['school_calendar_id']; ?>"><?php echo "".$result['teaching_period']." (".$result['teaching_time'].")";  ?></option> <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <select class="form-control" name="new_class_endperiod" required>
                                                                            <option value="">Select End Period</option>
                                                                            <?php
                                                                            $sql=mysqli_query($con, "select * from school_calendar");
                                                                            if(mysqli_num_rows($sql)>0){
                                                                                while($result=mysqli_fetch_assoc($sql)){
                                                                                    ?><option value="<?php echo $result['school_calendar_id']; ?>"><?php echo "".$result['teaching_period']." (".$result['teaching_time'].")";  ?></option> <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="new_class" value="Add">
                                                            <span class="text-danger" id="new_class_error"></span>
                                                            <div class="dashed-line"></div>
                                                            <div class="text-center">
                                                                <div class="btn-group">
                                                                    <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                                                    <button type="submit" id="new_class_btn" class="btn sch-btn-orange">Save</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="addstudent_modal" tabindex="-1" role="dialog" aria-labelledby="addstudent_modalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header school-modal-header">
                                                        <h5 class="modal-title">Add Student</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="new_student_form">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="input-container">
                                                                        <input type="text" name="new_teacher_name" required>
                                                                        <label for="input" class="label">Name</label>
                                                                        <div class="underline"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="input-container">
                                                                        <input type="text" id="new_student_no" name="new_student_no" oninput="$('#new_student_username').val($('#new_student_no').val());" required>
                                                                        <label for="input" class="label">Student Number</label>
                                                                        <div class="underline"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                <div class="form-group">
                                                                        <select class="form-control" name="new_student_dept" required>
                                                                            <option value="">Select Department</option>
                                                                            <?php
                                                                            $sql=mysqli_query($con, "select * from department");
                                                                            if(mysqli_num_rows($sql)>0){
                                                                                while($result=mysqli_fetch_assoc($sql)){
                                                                                    ?><option value="<?php echo $result['department_id']; ?>"><?php echo $result['name']; ?></option><?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <select class="form-control" name="new_student_course" required>
                                                                            <option value="">Select Course</option>
                                                                            <?php
                                                                            $sql=mysqli_query($con, "select * from courses");
                                                                            if(mysqli_num_rows($sql)>0){
                                                                                while($result=mysqli_fetch_assoc($sql)){
                                                                                    ?><option value="<?php echo $result['course_id']; ?>"><?php echo $result['name']; ?></option><?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="input-container">
                                                                        <input type="text" name="new_student_contact" required>
                                                                        <label for="input" class="label">Contact</label>
                                                                        <div class="underline"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="input-container">
                                                                        <input type="text" name="new_student_address" required>
                                                                        <label for="input" class="label">Address</label>
                                                                        <div class="underline"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="input-container">
                                                                        <input type="text" id="new_student_username" name="new_student_username" required>
                                                                        <label for="input" class="label">Username</label>
                                                                        <div class="underline"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="input-container">
                                                                        <input type="text" id="new_student_password" name="new_student_password" required>
                                                                        <label for="input" class="label">Password</label>
                                                                        <div class="underline"></div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                Picture
                                                                <input type="file" name="new_student_picture" accept="image/png" required>
                                                            </div>

                                                            <input type="hidden" name="new_student" value="Add">
                                                            <span class="text-danger" id="new_student_error"></span>
                                                            <div class="dashed-line"></div>
                                                            <div class="text-center">
                                                                <div class="btn-group">
                                                                    <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                                                    <button type="submit" id="new_student_btn" class="btn sch-btn-orange">Save</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="addmaterial_modal" tabindex="-1" role="dialog" aria-labelledby="addmaterial_modal" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header school-modal-header">
                                                        <h5 class="modal-title">Add Materials</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="new_materials_form" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <select class="form-control" name="new_materials_course" required>
                                                                            <option value="">Select Course Unit</option>
                                                                            <?php
                                                                            $sql=mysqli_query($con, "select * from courses");
                                                                            if(mysqli_num_rows($sql)>0){
                                                                                while($result=mysqli_fetch_assoc($sql)){
                                                                                    ?><option value="<?php echo $result['course_id']; ?>"><?php echo $result['name']; ?></option> <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <select class="form-control" name="new_materials_courseunit" required>
                                                                            <option value="">Select Course Unit</option>
                                                                            <?php
                                                                            $sql=mysqli_query($con, "select * from course_unit where course_id='1'");
                                                                            if(mysqli_num_rows($sql)>0){
                                                                                while($result=mysqli_fetch_assoc($sql)){
                                                                                    ?><option value="<?php echo $result['course_unit_id']; ?>"><?php echo $result['name']; ?></option> <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="input-container mt-2">
                                                                        <input type="text" name="new_materials_name" required>
                                                                        <label for="input" class="label">Name</label>
                                                                        <div class="underline"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-control">
                                                                        <span class="text-school-lightgrey">Attachment</span>
                                                                        <input type="file" name="new_materials_file" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="input-container mt-2">
                                                                <input type="text" name="new_materials_details" required>
                                                                <label for="input" class="label">Details</label>
                                                                <div class="underline"></div>
                                                            </div>
                                                            <input type="hidden" name="new_materials" value="Add">
                                                            <span class="text-danger" id="new_materials_error"></span>
                                                            <div class="dashed-line"></div>
                                                            <div class="text-center">
                                                                <div class="btn-group">
                                                                    <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                                                    <button type="submit" id="new_materials_btn" class="btn sch-btn-orange">Save</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>     
    </body>
    
    
    <!-- Toastr -->
    <script src="../js/toastr/toastr.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../js/sweetalert2/sweetalert2.min.js"></script>
    <!-- Admin JS -->
    <script type="text/javascript" src="../js/school_dashboard.js"></script>
    <!-- Card Slider JS -->
    <script type="text/javascript" src="../js/card-slider.js"></script>
    <!-- Loader JS -->
    <script type="text/javascript" src="../js/loader.js"></script>
    <script type="text/javascript" src="admin.js"></script>
    <script type="text/javascript" src="admin1.js"></script>

    <script>
        $('#view_allclasses,#view_allcourseunits,#view_alldepts,#view_allteachers,#view_allstudents,#view_allcourses_tbl,#view_allcourses_tbl2').DataTable( {
            colReorder: true,
            order: [],
            "responsive": true,
            "autoWidth": false
        } );

        $('#new_teacher_form').on("submit", function(event){  
            event.preventDefault(); var formData = new FormData(this);
            $('#new_teacher_btn').prop('disabled', true);

            fetch('admin_conn.php', {
                method: 'POST',body: formData,data:formData,processData: false,contentType: false,enctype:'multipart/form-data',
            }).then(function(response){
                return response.text();
            }).then(function(text){
                $('#new_teacher_btn').prop('disabled', false);
                tr_add_text = JSON.parse(text);
                let tr_add_success=tr_add_text.saved;
                if(tr_add_success!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Teacher Added",showConfirmButton: false,timer: 2000});
                    $('#addteacher_modal').modal('hide'); 
                    $('#new_teacher_form')[0].reset();
                    $("#view_alltrs_div").load('admin_more.php?view_trs=div');
                    $('#new_teacher_error').html('');
                }else{
                    $('#new_teacher_error').html(tr_add_text.error);
                } 
                console.log(tr_add_text.error);
                
            }).catch(function(error){
                console.error(error);
            }) 
        }); 

        $('#new_depts_form').on("submit", function(event){  
            event.preventDefault(); var formData = new FormData(this);
            $('#new_dept_btn').prop('disabled', true);
            fetch('admin_conn.php', {
                method: 'POST',body: formData,data:$('#new_depts_form').serialize()
            }).then(function(response){
                return response.text();
            }).then(function(text){
                $('#new_dept_btn').prop('disabled', false);
                dept_add_text = JSON.parse(text);
                let tr_add_success=dept_add_text.saved;
                if(tr_add_success!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Department Added",showConfirmButton: false,timer: 2000});
                    $('#adddept_modal').modal('hide'); setTimeout(function(){window.location.reload(1);}, 2300);toggle_changes('School');$('#new_dept_error').html('');
                }else{
                    $('#new_dept_error').html(dept_add_text.error);
                } 
            }).catch(function(error){
                console.error(error);
            }) 
        }); 

        $('#edit_depts_form').on("submit", function(event){  
            event.preventDefault(); var formData = new FormData(this);
            $('#edit_dept_btn').prop('disabled', true);
            formData.append('edit_dept_trash', $('#edit_dept_trash').is(':checked'));
            fetch('admin_conn.php', {
                method: 'POST',body: formData,data:formData,processData: false,contentType: false, 
            }).then(function(response){
                return response.text();
            }).then(function(text){
                $('#edit_dept_btn').prop('disabled', false);
                dept_edit_text = JSON.parse(text);
                let dept_edit_success=dept_edit_text.saved;
                if(dept_edit_success!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Department Edited",showConfirmButton: false,timer: 2000});
                    setTimeout(function(){window.location.reload(1);}, 2300);toggle_changes('School');$('#edit_dept_error').html('');
                }else if(dept_edit_text.nochanges!=''){
                    var Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false, timer: 2000});
				    Toast.fire({icon: 'info',title: ' No Changes Done'});$('#edit_dept_error').html('');
                }else{
                    $('#edit_dept_error').html(dept_edit_text.error);
                } 
            }).catch(function(error){
                console.error(error);
            }) 
        }); 

        $('#new_course_form').on("submit", function(event){  
            event.preventDefault(); var formData = new FormData(this);
            $('#new_course_btn').prop('disabled', true);
            fetch('admin_conn.php', {
                method: 'POST',body: formData,data:$('#new_course_form').serialize()
            }).then(function(response){
                return response.text();
            }).then(function(text){
                $('#new_course_btn').prop('disabled', false);
                course_add_text = JSON.parse(text);
                let tr_add_success=course_add_text.saved;
                if(tr_add_success!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Course Added",showConfirmButton: false,timer: 2000});
                    $('#addcourse_modal').modal('hide'); 
                    $('#new_course_form')[0].reset();
                    $("#view_allcourses_div").load('admin_more.php?view_courses=div');
                    toggle_changes('School');$('#new_course_error').html('');
                }else{
                    $('#new_course_error').html(course_add_text.error);
                } 
            }).catch(function(error){
                console.error(error);
            }) 
        }); 

        $('#edit_course_form').on("submit", function(event){  
            event.preventDefault(); var formData = new FormData(this);
            $('#edit_course_btn').prop('disabled', true);
            formData.append('edit_course_trash', $('#edit_course_trash').is(':checked'));
            fetch('admin_conn.php', {
                method: 'POST',body: formData,data:formData,processData: false,contentType: false, 
            }).then(function(response){
                return response.text();
            }).then(function(text){
                $('#edit_course_btn').prop('disabled', false);
                course_edit_text = JSON.parse(text);
                let course_edit_success=course_edit_text.saved;
                if(course_edit_success!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Course Edited",showConfirmButton: false,timer: 2000});
                    setTimeout(function(){window.location.reload(1);}, 2300);
                    // $("#view_allcourses_div").load('admin_more.php?view_courses=div');
                    toggle_changes('School');$('#edit_course_error').html('');
                }else if(course_edit_text.nochanges!=''){
                    var Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false, timer: 2000});
				    Toast.fire({icon: 'info',title: ' No Changes Done'});$('#edit_course_error').html('');
                }else if(course_edit_text.trashed!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Course Trashed",showConfirmButton: false,timer: 2000});
                    setTimeout(function() {window.location.href = "admin.php?#view_school";}, 2300);
                    // $("#view_allcourses_div").load('admin_more.php?view_courses=div');
                    toggle_changes('School');$('#edit_course_error').html('');
                }else{
                    $('#edit_course_error').html(course_edit_text.error);
                } 
            }).catch(function(error){
                console.error(error);
            }) 
        }); 

        $('#new_courseunit_form').on("submit", function(event){  
            event.preventDefault(); var formData = new FormData(this);
            $('#new_courseunit_btn').prop('disabled', true);
            fetch('admin_conn.php', {
                method: 'POST',body: formData,data:$('#new_courseunit_form').serialize()
            }).then(function(response){
                return response.text();
            }).then(function(text){
                $('#new_courseunit_btn').prop('disabled', false);
                courseunit_add_text = JSON.parse(text);
                let cu_add_success=courseunit_add_text.saved;
                if(cu_add_success!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Course Unit Added",showConfirmButton: false,timer: 2000});
                    $('#addcourseunit_modal').modal('hide'); 
                    $('#new_courseunit_form')[0].reset();
                    $("#view_allcunits_div").load('admin_more.php?view_cunits=div');
                    toggle_changes('School');$('#new_courseunit_error').html('');
                }else{
                    $('#new_courseunit_error').html(courseunit_add_text.error);
                } 
            }).catch(function(error){
                console.error(error);
            }) 
        });

        $('#edit_c_unit_form').on("submit", function(event){  
            event.preventDefault(); var formData = new FormData(this);
            $('#edit_c_unit_btn').prop('disabled', true);
            formData.append('edit_c_unit_trash', $('#edit_c_unit_trash').is(':checked'));
            fetch('admin_conn.php', {
                method: 'POST',body: formData,data:formData,processData: false,contentType: false, 
            }).then(function(response){
                return response.text();
            }).then(function(text){
                $('#edit_c_unit_btn').prop('disabled', false);
                cunit_edit_text = JSON.parse(text);
                let course_edit_success=cunit_edit_text.saved;
                if(course_edit_success!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Course Unit Edited",showConfirmButton: false,timer: 2000});
                    setTimeout(function(){window.location.reload(1);}, 2300);
                    toggle_changes('School');$('#edit_c_unit_error').html('');
                }else if(cunit_edit_text.nochanges!=''){
                    var Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false, timer: 2000});
				    Toast.fire({icon: 'info',title: ' No Changes Done'});$('#edit_c_unit_error').html('');
                }else if(cunit_edit_text.trashed!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Course Unit Trashed",showConfirmButton: false,timer: 2000});
                    setTimeout(function() {window.location.href = "admin.php?#view_school";}, 2300);
                    toggle_changes('School');$('#edit_c_unit_error').html('');
                }else{
                    $('#edit_c_unit_error').html(cunit_edit_text.error);
                } 
            }).catch(function(error){
                console.error(error);
            }) 
        }); 

        $('#new_calendar_form').on("submit", function(event){  
            event.preventDefault(); var formData = new FormData(this);
            $('#new_calendar_btn').prop('disabled', true);
            fetch('admin_conn.php', {
                method: 'POST',body: formData,data:$('#new_calendar_form').serialize()
            }).then(function(response){
                return response.text();
            }).then(function(text){
                $('#new_calendar_btn').prop('disabled', false);
                calendar_add_text = JSON.parse(text);
                let cal_add_success=calendar_add_text.saved;
                if(cal_add_success!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Teaching Period Added",showConfirmButton: false,timer: 2000});
                    $('#addcalendar_modal').modal('hide'); setTimeout(function(){window.location.reload(1);}, 2300);toggle_changes('School');$('#new_calendar_error').html('');
                }else{
                    $('#new_calendar_error').html(calendar_add_text.error);
                } 
            }).catch(function(error){
                console.error(error);
            }) 
        });

        $('#add_teacher_course_form').on("submit", function(event){  
            event.preventDefault(); var formData = new FormData(this);
            $('#add_trcourse_btn').prop('disabled', true);
            fetch('admin_conn.php', {
                method: 'POST',body: formData,data:$('#add_teacher_course_form').serialize()
            }).then(function(response){
                return response.text();
            }).then(function(text){
                $('#add_trcourse_btn').prop('disabled', false);
                calendar_add_text = JSON.parse(text);
                let cal_add_success=calendar_add_text.saved;
                if(cal_add_success!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Course Added To The Teacher",showConfirmButton: false,timer: 2000});
                    $('#addteacher_course_modal').modal('hide'); 
                    $('#add_teacher_course_form')[0].reset();
                    $("#view_alltrs_div").load('admin_more.php?view_trs=div');
                    toggle_changes('School');$('#add_trcourse_error').html('');
                }else{
                    $('#add_trcourse_error').html(calendar_add_text.error);
                } 
            }).catch(function(error){
                console.error(error);
            }) 
        });

        $('#new_classroom_form').on("submit", function(event){  
            event.preventDefault(); var formData = new FormData(this);
            $('#new_classroom_btn').prop('disabled', true);
            fetch('admin_conn.php', {
                method: 'POST',body: formData,data:$('#new_classroom_form').serialize()
            }).then(function(response){
                return response.text();
            }).then(function(text){
                $('#new_classroom_btn').prop('disabled', false);
                classroom_add_text = JSON.parse(text);
                let classroom_add_success=classroom_add_text.saved;
                if(classroom_add_success!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Classroom Added",showConfirmButton: false,timer: 2000});
                    $('#addclassroom_modal').modal('hide'); setTimeout(function(){window.location.reload(1);}, 2300);toggle_changes('School');$('#new_classroom_error').html('');
                }else{
                    $('#new_classroom_error').html(classroom_add_text.error);
                } 
            }).catch(function(error){
                console.error(error);
            }) 
        });

        $('#new_class_form').on("submit", function(event){  
            event.preventDefault(); var formData = new FormData(this);
            $('#new_class_btn').prop('disabled', true);
            fetch('admin_conn.php', {
                method: 'POST',body: formData,data:$('#new_class_form').serialize()
            }).then(function(response){
                return response.text();
            }).then(function(text){
                $('#new_class_btn').prop('disabled', false);
                class_add_text = JSON.parse(text);
                let class_add_success=class_add_text.saved;
                if(class_add_success!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Class Added",showConfirmButton: false,timer: 2000});
                    $('#addclass_modal').modal('hide'); 
                    $('#new_class_form')[0].reset();
                    $("#view_allclasses_div").load('admin_more.php?view_classes=div');
                    toggle_changes('School');$('#new_class_error').html('');
                }else{
                    $('#new_class_error').html(class_add_text.error);
                } 
            }).catch(function(error){
                console.error(error);
            }) 
        });

        $('#edit_class_form').on("submit", function(event){  
            event.preventDefault(); var formData = new FormData(this);
            $('#edit_class_btn').prop('disabled', true);
            formData.append('edit_class_trash', $('#edit_class_trash').is(':checked'));
            fetch('admin_conn.php', {
                method: 'POST',body: formData,data:formData,processData: false,contentType: false, 
            }).then(function(response){
                return response.text();
            }).then(function(text){
                $('#edit_class_btn').prop('disabled', false);
                class_edit_text = JSON.parse(text);
                let class_edit_success=class_edit_text.saved;
                if(class_edit_success!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Class Edited",showConfirmButton: false,timer: 2000});
                    setTimeout(function(){window.location.reload(1);}, 2300);
                    toggle_changes('School');$('#edit_class_error').html('');
                }else if(class_edit_text.nochanges!=''){
                    var Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false, timer: 2000});
				    Toast.fire({icon: 'info',title: ' No Changes Done'});$('#edit_class_error').html('');
                }else if(class_edit_text.trashed!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Course Unit Trashed",showConfirmButton: false,timer: 2000});
                    setTimeout(function() {window.location.href = "admin.php?#view_school";}, 2300);
                    toggle_changes('School');$('#edit_class_error').html('');
                }else{
                    $('#edit_class_error').html(class_edit_text.error);
                } 
            }).catch(function(error){
                console.error(error);
            }) 
        }); 

        $('#edit_teacher_form').on("submit", function(event){  
            event.preventDefault(); var tr_formData = new FormData(this);
            $('#edit_teacher_btn').prop('disabled', true);
            tr_formData.append('edit_tr_trash', $('#trash_teacher_check').is(':checked'));

            fetch('admin_conn.php', {
                method: 'POST',body: tr_formData,data:tr_formData,processData: false,contentType: false,enctype:'multipart/form-data', 
            }).then(function(response){
                return response.text();
            }).then(function(text){
                $('#edit_teacher_btn').prop('disabled', false);
                tr_edit_text = JSON.parse(text);
                let tr_edit_success=tr_edit_text.saved;
                if(tr_edit_success!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Teacher Information Edited",showConfirmButton: false,timer: 2000});
                    setTimeout(function(){window.location.reload(1);}, 2300);$('#edit_teacher_error').html('');
                }else if(tr_edit_text.nochanges!=''){
                    var Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false, timer: 2000});
				    Toast.fire({icon: 'info',title: ' No Changes Done'});$('#edit_teacher_error').html('');
                }else if(tr_edit_text.trashed!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Teacher Trashed",showConfirmButton: false,timer: 2000});
                    setTimeout(function() {window.location.href = "admin.php?#view_teachers";}, 2300);
                    toggle_changes('School');$('#edit_class_error').html('');
                }else{
                    $('#edit_teacher_error').html(tr_edit_text.error);
                } 
            }).catch(function(error){
                console.error(error);
            }) 
        }); 

        $('#new_materials_form').on("submit", function(event){  
            event.preventDefault(); var formData = new FormData(this);
            $('#new_materials_btn').prop('disabled', true);
            $.ajax({
                method:'post',processData:false,contentType:false,cache:false,data:formData,enctype:'multipart/form-data',url:'admin_conn.php',
                success:function(responseTxt){
                    var nw_materials_return = JSON.parse(responseTxt);
                    $('#new_materials_btn').prop('disabled', false);
                    if(nw_materials_return.saved!==""){
                        Swal.fire({position: "top-end",icon: "success",title: "Material Added",showConfirmButton: false,timer: 2000});
                        $('#addmaterial_modal').modal('hide');setTimeout(function(){window.location.reload(1);},2300);$('#new_materials_error').html('');
                    }else{
                        $('#new_materials_error').html(nw_materials_return.error);
                    }
                },
                Error: function(textMsg){ console.log("error"); }
            });
        });

        $('#new_student_form').on("submit", function(event){  
            event.preventDefault(); var formData = new FormData(this);
            $('#new_student_btn').prop('disabled', true);
            fetch('admin_conn.php', {
                method: 'POST',body: formData,data:formData,processData: false,contentType: false,enctype:'multipart/form-data',
                // method: 'POST',body: formData,data:$('#new_student_form').serialize()
            }).then(function(response){
                return response.text();
            }).then(function(text){
                $('#new_student_btn').prop('disabled', false);
                std_add_text = JSON.parse(text);
                let std_add_success=std_add_text.saved;
                if(std_add_success!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Student Added",showConfirmButton: false,timer: 2000});
                    $('#addstudent_modal').modal('hide'); 
                    $('#new_student_form')[0].reset();
                    $("#view_stds_div").load('admin_more.php?view_stds=div');
                    $('#new_student_error').html('');
                }else{
                    $('#new_student_error').html(std_add_text.error);
                } 
            }).catch(function(error){
                console.error(error);
            }) 
        }); 

        $('#edit_student_form').on("submit", function(event){  
            event.preventDefault(); var std_formData = new FormData(this);
            $('#edit_student_btn').prop('disabled', true);
            std_formData.append('edit_std_trash', $('#trash_student_check').is(':checked'));

            fetch('admin_conn.php', {
                method: 'POST',body: std_formData,data:std_formData,processData: false,contentType: false,enctype:'multipart/form-data', 
            }).then(function(response){
                return response.text();
            }).then(function(text){
                $('#edit_student_btn').prop('disabled', false);
                std_edit_text = JSON.parse(text);
                let std_edit_success=std_edit_text.saved;
                if(std_edit_success!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Student Information Edited",showConfirmButton: false,timer: 2000});
                    setTimeout(function(){window.location.reload(1);}, 2300);$('#edit_student_error').html('');
                }else if(std_edit_text.nochanges!=''){
                    var Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false, timer: 2000});
				    Toast.fire({icon: 'info',title: ' No Changes Done'});$('#edit_student_error').html('');
                }else if(std_edit_text.trashed!=''){
                    Swal.fire({position: "top-end",icon: "success",title: "Student Trashed",showConfirmButton: false,timer: 2000});
                    setTimeout(function() {window.location.href = "admin.php?#view_students";}, 2300);
                    toggle_changes('School');$('#edit_class_error').html('');
                }else{
                    $('#edit_student_error').html(std_edit_text.error);
                } 
            }).catch(function(error){
                console.error(error);
            }) 
        }); 
    </script>
</html>