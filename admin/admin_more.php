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
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/6e5fb66345.js" crossorigin="anonymous"></script>
        <!-- Data Tables -->
        <link href="../plugins/data-tables/datatables.min.css" rel="stylesheet">
        <script src="../plugins/data-tables/datatables.min.js"></script>
    </head>
    <body>
        <?php
        ///--- upon saving divs ----
        if(isset($_GET['view_courses'])){
            ?>
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
                        <table id="view_allcourses_tbl2" class="table table-striped compact table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Course Units</th>
                                <th>Students</th>
                            </thead>
                            <tbody>
                                <?php
                                $sql=mysqli_query($con, "SELECT courses.course_id as course_id, courses.name as course_name, department.name as dept_name, 
                                (SELECT COUNT(*) FROM course_unit WHERE course_unit.course_id=courses.course_id) AS course_unit_cnt, 
                                (SELECT COUNT(*) FROM users WHERE users.course=courses.course_id AND users.category='Student') AS std_cnt FROM courses 
                                INNER JOIN department ON courses.department_id=department.department_id");
                                if(mysqli_num_rows($sql)>0){
                                    while($result=mysqli_fetch_assoc($sql)){
                                        echo "<tr>";
                                        ?><td><a href="admin.php?course_view=course&q=<?php echo $result['course_id']; ?>#view_school" class="sch-link"><?php echo $result['course_name']; ?></a></td><?php
                                            echo "<td>".$result['dept_name']."</td>";
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
            <?php
        }

        if(isset($_GET['view_cunits'])){
            ?>
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
                        <table id="view_allcourseunits2" class="table table-sm compact table-striped table-hover">
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
            <?php
        }

        if(isset($_GET['view_classes'])){
            ?>
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
                        <table id="view_allclasses2" class="table table-sm compact table-striped table-hover">
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
            <?php
        }

        if(isset($_GET['view_stds'])){
            ?>
            <div id="view_stds_div" class="table-responsive text-school-lightgrey">
                <table id="view_allstudents2" class="table table-sm compact table-striped table-hover">
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
            <?php
        }

        if(isset($_GET['view_trs'])){
            ?>
            <div id="view_alltrs_div" class="table-responsive text-school-lightgrey">
                <table id="view_allteachers2" class="table table-sm compact table-striped table-hover">
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
            <?php
        }
        ?>

        <script>
            $('#view_allcourses_tbl2,#view_allcourseunits2,#view_allclasses2,#view_allstudents2,#view_allteachers2').DataTable( {
                colReorder: true,
                order: [],
                "responsive": true,
                "autoWidth": false
            } );
        </script>
    </body>
</html>