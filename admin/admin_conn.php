<?php
    date_default_timezone_set('Asia/Shanghai');
    $nowdate = date('d-m-Y h:i:s');
    include('../connection.php');
    include('admin_session.php'); 
    include('admin_select.php'); 

    if(isset($_POST['new_teacher'])){
        $saved=$error='';
        $new_tr_name=$_POST['new_teacher_name'];
        $new_tr_dept=$_POST['new_teacher_dept'];
        $new_tr_contact=$_POST['new_teacher_contact'];
        $new_tr_address=$_POST['new_teacher_address'];
        $new_tr_username=$_POST['new_teacher_username'];
        $new_tr_password=md5($_POST['new_teacher_password']);

        $new_teacher_pic=$_FILES['new_teacher_pic']['name'];
        $tr_imgtmp = $_FILES['new_teacher_pic']['tmp_name'];
        move_uploaded_file($tr_imgtmp, "../teachers/" . $new_teacher_pic);
        $tr_pic_path = "../teachers/".$new_teacher_pic;

        if($tr_pic_path=="../teachers/"){
            $tr_pic_path='';
        }

        $sql=mysqli_query($con,"select * from users where name='$new_tr_name' and contact='$new_tr_contact' and address='$new_tr_address' and department='$new_tr_dept' and category='Teacher'");
        if(mysqli_num_rows($sql)>0){
            $error="Teacher already exists.";
        }else{
            mysqli_query($con, "INSERT INTO users SET date='$nowdate', name='$new_tr_name', contact='$new_tr_contact', address='$new_tr_address', department='$new_tr_dept', picture='$tr_pic_path', category='Teacher',username='$new_tr_username',password='$new_tr_password'");
			$saved='Teacher Saved';
        }

        $output=array('saved'=>$saved, 'error'=>$error);
	    echo json_encode($output);
    }

    if(isset($_POST['new_dept'])){
        $saved=$error='';

        $new_dept_name=$_POST['new_dept_name'];
        $new_dept_location=$_POST['new_dept_location'];
        $new_dept_email=$_POST['new_dept_email'];
        $new_dept_contact=$_POST['new_dept_contact'];

        $sql=mysqli_query($con,"select * from department where name='$new_dept_name' and location='$new_dept_location' and email='$new_dept_email' and contact='$new_dept_contact'");
        if(mysqli_num_rows($sql)>0){
            $error="Department already exists.";
        }else{
            mysqli_query($con, "INSERT INTO department SET name='$new_dept_name', location='$new_dept_location', email='$new_dept_email', contact='$new_dept_contact'");
			$saved='Department Saved';
        }

        $output=array('saved'=>$saved, 'error'=>$error);
	    echo json_encode($output);
    }

    if(isset($_POST['edit_dept'])){
        $saved=$nochanges=$error='';
        $edit_dept=$_POST['edit_dept'];
        $edit_dept_name=$_POST['edit_dept_name'];
        $edit_dept_location=$_POST['edit_dept_location'];
        $edit_dept_email=$_POST['edit_dept_email'];
        $edit_dept_contact=$_POST['edit_dept_contact'];
        $edit_dept_trash=$_POST['edit_dept_trash'];

        $sql=mysqli_query($con,"select * from department where department_id='$edit_dept'");
        if(mysqli_num_rows($sql)>0){
            while($result=mysqli_fetch_assoc($sql)){
                $dep_name=$result['name'];
                $dep_location=$result['location'];
                $dep_email=$result['email'];
                $dep_contact=$result['contact'];
            }
            if($edit_dept_trash=='false'){
                if($edit_dept_name!=$dep_name){
                    mysqli_query($con,"update department set name='$edit_dept_name' where department_id='$edit_dept'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }
                if($edit_dept_location!=$dep_location){
                    mysqli_query($con,"update department set location='$edit_dept_location' where department_id='$edit_dept'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }
                if($edit_dept_email!=$dep_email){
                    mysqli_query($con,"update department set email='$edit_dept_email' where department_id='$edit_dept'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }
                if($edit_dept_contact!=$dep_contact){
                    mysqli_query($con,"update department set contact='$edit_dept_contact' where department_id='$edit_dept'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }
            }else{
                $sql = "DELETE FROM department WHERE department_id='$edit_dept'";
                if ($con->query($sql) === TRUE) {
                    $saved='Trashed';
                } else {
                    $error=$conn->error;;
                }
                $conn->close();
            }
        }else{
            $error='Department does not exist';
        }

        if(empty($error) && empty($saved)){$nochanges='No Changes';}

        $output=array('saved'=>$saved, 'nochanges'=>$nochanges, 'error'=>$error);
	    echo json_encode($output);
    }

    if(isset($_POST['new_course'])){
        $saved=$error='';
        $course_arr=[];

        $new_course_dep=$_POST['new_course_dep'];
        $new_course_name=$_POST['new_course_name'];

        $course_arr=explode(",", $new_course_name);

        if (count($course_arr) == 1) {
            ///-- when one course has been input---
            $sql=mysqli_query($con,"select * from courses where name='$new_course_name' and department_id='$new_course_dep'");
            if(mysqli_num_rows($sql)>0){
                $error="Course already exists.";
            }else{
                mysqli_query($con, "INSERT INTO courses SET name='$new_course_name', department_id='$new_course_dep'");
                $saved='Course Saved';
            }
        } else {
            ///-- when multiple courses have been input---
            $course_no=1;
            foreach ($course_arr as $new_course){
                
                $sql=mysqli_query($con,"select * from courses where name='$new_course' and department_id='$new_course_dep'");
                if(mysqli_num_rows($sql)>0){
                    $error.="Course ".$course_no." already exists.";
                }else{
                    mysqli_query($con, "INSERT INTO courses SET name='$new_course', department_id='$new_course_dep'");
                    $saved='Course Saved';
                }
                $course_no+=1;

            }
        }

        $output=array('saved'=>$saved, 'error'=>$error);
	    echo json_encode($output);
    }

    if(isset($_POST['edit_course'])){
        $saved=$nochanges=$error=$trashed='';
        $edit_course=$_POST['edit_course'];
        $edit_course_name=$_POST['edit_course_name'];
        $edit_course_dep=$_POST['edit_course_dep'];
        $edit_course_trash=$_POST['edit_course_trash'];

        $sql=mysqli_query($con,"select * from courses where course_id='$edit_course'");
        if(mysqli_num_rows($sql)>0){
            while($result=mysqli_fetch_assoc($sql)){
                $courses_name=$result['name'];
                $courses_dep=$result['department_id'];
            }

            $exist_course_units=0;
            $query=mysqli_query($con,"SELECT COUNT(*) AS exist_course_units FROM course_unit WHERE course_id='$edit_course'");
            if(mysqli_num_rows($query)>0){
                while($rows=mysqli_fetch_assoc($query)){
                    $exist_course_units=$rows['exist_course_units'];
                }
            }

            if($edit_course_trash=='false'){
                if($edit_course_name!=$courses_name){
                    mysqli_query($con,"update courses set name='$edit_course_name' where course_id='$edit_course'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }
                if($edit_course_dep!=$courses_dep){
                    
                    if($exist_course_units==0){
                        mysqli_query($con,"update courses set department_id='$edit_course_dep' where course_id='$edit_course'") or die(mysqli_error($conn->error));
                        $saved='Updated';
                    }else{
                        $error='Can not edit department, there course units under the course';
                    }
                }
            }else{

                if($exist_course_units==0){
                    mysqli_query($con,"DELETE FROM courses WHERE course_id='$edit_course'") or die(mysqli_error($conn->error));
                    $trashed='Updated';
                }else{
                    $error='Can not trash department, there course units under the course';
                }

                
            }
        }else{
            $error='Course does not exist';
        }

        if(empty($error) && empty($saved) && empty($trashed)){$nochanges='No Changes';}

        $output=array('saved'=>$saved, 'nochanges'=>$nochanges, 'error'=>$error, 'trashed'=>$trashed);
	    echo json_encode($output);
    }

    if(isset($_POST['new_courseunit'])){
        $saved=$error='';
        $cunit_arr=[];

        $new_courseunit_course=$_POST['new_courseunit_course'];
        $new_courseunit_name=$_POST['new_courseunit_name'];

        $cunit_arr=explode(",", $new_courseunit_name);

        if (count($cunit_arr) == 1) {
            ///-- when one course unit has been input---
            $sql=mysqli_query($con,"select * from course_unit where name='$new_courseunit_name' and course_id='$new_courseunit_course'");
            if(mysqli_num_rows($sql)>0){
                $error="Course Unit already exists.";
            }else{
                mysqli_query($con, "INSERT INTO course_unit SET name='$new_courseunit_name', course_id='$new_courseunit_course'");
                $saved='Course Saved';
            }
        } else {
            ///-- when multiple courses have been input---
            $cunit_no=1;
            foreach ($cunit_arr as $new_cunit){
                
                $sql=mysqli_query($con,"select * from course_unit where name='$new_cunit' and course_id='$new_courseunit_course'");
                if(mysqli_num_rows($sql)>0){
                    $error.="Course Unit ".$cunit_no." already exists.";
                }else{
                    mysqli_query($con, "INSERT INTO course_unit SET name='$new_cunit', course_id='$new_courseunit_course'");
                    $saved='Course Unit Saved';
                }
                $cunit_no+=1;
            }
        }

        $output=array('saved'=>$saved, 'error'=>$error);
	    echo json_encode($output);
    }

    if(isset($_POST['edit_c_unit'])){
        $saved=$nochanges=$error=$trashed='';
        $edit_c_unit=$_POST['edit_c_unit'];
        $edit_c_unit_name=$_POST['edit_c_unit_name'];
        $edit_c_unit_course=$_POST['edit_c_unit_course'];
        $edit_c_unit_trash=$_POST['edit_c_unit_trash'];

        $sql=mysqli_query($con,"select * from course_unit where course_unit_id='$edit_c_unit'");
        if(mysqli_num_rows($sql)>0){
            while($result=mysqli_fetch_assoc($sql)){
                $c_unit_name=$result['name'];
                $c_unit_course=$result['course_id'];
            }

            $exist_classes=0;
            $query=mysqli_query($con,"SELECT COUNT(*) AS exist_classes FROM classes WHERE course_unit_id='$edit_c_unit'");
            if(mysqli_num_rows($query)>0){
                while($rows=mysqli_fetch_assoc($query)){
                    $exist_classes=$rows['exist_classes'];
                }
            }

            if($edit_c_unit_trash=='false'){
                if($edit_c_unit_name!=$c_unit_name){
                    mysqli_query($con,"update course_unit set name='$edit_c_unit_name' where course_unit_id='$edit_c_unit'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }
                if($edit_c_unit_course!=$c_unit_course){
                    if($exist_classes==0){
                        mysqli_query($con,"update course_unit set course_id='$edit_c_unit_course' where course_unit_id='$edit_c_unit'") or die(mysqli_error($conn->error));
                        $saved='Updated';
                    }else{
                        $error='Can not edit course unit, there classes under the course unit';
                    }
                }
            }else{

                if($exist_classes==0){
                    mysqli_query($con,"DELETE FROM course_unit WHERE course_unit_id='$edit_c_unit'") or die(mysqli_error($conn->error));
                    $trashed='Updated';
                }else{
                    $error='Can not trash course unit, there classes under the course unit';
                }

                
            }
        }else{
            $error='Course Unit does not exist';
        }

        if(empty($error) && empty($saved) && empty($trashed)){$nochanges='No Changes';}

        $output=array('saved'=>$saved, 'nochanges'=>$nochanges, 'error'=>$error, 'trashed'=>$trashed);
	    echo json_encode($output);
    }

    if(isset($_POST['new_calendar'])){
        $saved=$error='';

        $new_calendar_name=$_POST['new_calendar_name'];
        $new_calendar_time=$_POST['new_calendar_time'];

        $sql=mysqli_query($con,"select * from school_calendar where teaching_period='$new_calendar_name' and teaching_time='$new_calendar_time'");
        if(mysqli_num_rows($sql)>0){
            $error="Teaching Period already exists.";
        }else{
            mysqli_query($con, "INSERT INTO school_calendar SET teaching_period='$new_calendar_name', teaching_time='$new_calendar_time'");
			$saved='Teaching Period Saved';
        }

        $output=array('saved'=>$saved, 'error'=>$error);
	    echo json_encode($output);
    }

    if(isset($_POST['add_trcourse'])){
        $saved=$error='';

        $add_trcourse_teacher=$_POST['add_trcourse_teacher'];
        $add_trcourse_cunit=$_POST['add_trcourse_cunit'];

        $sql=mysqli_query($con,"select * from teacher_courseunit where teacher_id='$add_trcourse_teacher' and course_unit='$add_trcourse_cunit'");
        if(mysqli_num_rows($sql)>0){
            $error="Teacher is already connected to the course unit.";
        }else{
            mysqli_query($con, "INSERT INTO teacher_courseunit SET teacher_id='$add_trcourse_teacher', course_unit='$add_trcourse_cunit'");
			$saved='Connection Saved';
        }

        $output=array('saved'=>$saved, 'error'=>$error);
	    echo json_encode($output);
    }

    if(isset($_POST['new_classroom'])){
        $saved=$error='';

        $new_classroom_name=$_POST['new_classroom_name'];
        $new_classroom_location=$_POST['new_classroom_location'];
        $new_classroom_status=$_POST['new_classroom_status'];

        $sql=mysqli_query($con,"select * from classrooms where name='$new_classroom_name' and location='$new_classroom_location' and status='$new_classroom_status'");
        if(mysqli_num_rows($sql)>0){
            $error="Classroom is already recorded.";
        }else{
            mysqli_query($con, "INSERT INTO classrooms SET name='$new_classroom_name', location='$new_classroom_location', status='$new_classroom_status'");
			$saved='Classroom Saved';
        }

        $output=array('saved'=>$saved, 'error'=>$error);
	    echo json_encode($output);
    }

    if(isset($_POST['new_class'])){
        $saved=$error='';

        $new_class_courseunit=$_POST['new_class_courseunit'];
        $new_class_teacher=$_POST['new_class_teacher'];
        $new_class_room=$_POST['new_class_room'];
        $new_class_seats=$_POST['new_class_seats'];
        $new_class_day=$_POST['new_class_day'];
        $new_class_startperiod=$_POST['new_class_startperiod'];
        $new_class_endperiod=$_POST['new_class_endperiod'];

        
        $sql=mysqli_query($con,"select * from classes where course_unit_id='$new_class_courseunit' and teacher_id='$new_class_teacher' and class_day='$new_class_day' and maximum_seats='$new_class_seats'
         and start_teaching_period='$new_class_startperiod' and end_teaching_period='$new_class_endperiod' and classroom_id='$new_class_room'");
        if(mysqli_num_rows($sql)>0){
            $error="Class already exists.";
        }else{
            // check whether the teacher has that course unit
            $tr_sql=mysqli_query($con, "select * from teacher_courseunit where teacher_id='$new_class_teacher' and course_unit='$new_class_courseunit'");
            if(mysqli_num_rows($tr_sql)>0){
                mysqli_query($con, "INSERT INTO classes SET course_unit_id='$new_class_courseunit', teacher_id='$new_class_teacher', class_day='$new_class_day', maximum_seats='$new_class_seats',
                start_teaching_period='$new_class_startperiod', end_teaching_period='$new_class_endperiod', classroom_id='$new_class_room'");
                $saved='Class Saved';
            }else{
                $error="Teacher does not teach selected course unit.";
            }      
        }

        $output=array('saved'=>$saved, 'error'=>$error);
	    echo json_encode($output);
    }

    if(isset($_POST['edit_class'])){
        $saved=$nochanges=$error=$trashed='';
        $edit_class=$_POST['edit_class'];
        $edit_class_teacher=$_POST['edit_class_teacher'];
        $edit_class_room=$_POST['edit_class_room'];
        $edit_class_seats=$_POST['edit_class_seats'];
        $edit_class_day=$_POST['edit_class_day'];
        $edit_class_start=$_POST['edit_class_start'];
        $edit_class_end=$_POST['edit_class_end'];
        $edit_class_trash=$_POST['edit_class_trash'];

        $sql=mysqli_query($con,"select * from classes where class_id='$edit_class'");
        if(mysqli_num_rows($sql)>0){
            while($result=mysqli_fetch_assoc($sql)){
                $class_tr=$result['teacher_id'];
                $class_room=$result['classroom_id'];
                $class_seats=$result['maximum_seats'];
                $class_day=$result['class_day'];
                $class_start=$result['start_teaching_period'];
                $class_end=$result['end_teaching_period'];
            }

            $exist_stds=0;
            $query=mysqli_query($con,"SELECT COUNT(*) AS exist_stds FROM student_classes WHERE class_id='$edit_class'");
            if(mysqli_num_rows($query)>0){
                while($rows=mysqli_fetch_assoc($query)){
                    $exist_stds=$rows['exist_stds'];
                }
            }

            if($edit_class_trash=='false'){
                if($edit_class_teacher!=$class_tr){
                    mysqli_query($con,"update classes set teacher_id='$edit_class_teacher' where class_id='$edit_class'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }

                if($edit_class_room!=$class_room){
                    mysqli_query($con,"update classes set classroom_id='$edit_class_room' where class_id='$edit_class'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }

                if($edit_class_seats!=$class_seats){
                    mysqli_query($con,"update classes set maximum_seats='$edit_class_seats' where class_id='$edit_class'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }

                if($edit_class_day!=$class_day){
                    mysqli_query($con,"update classes set class_day='$edit_class_day' where class_id='$edit_class'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }

                if($edit_class_start!=$class_start){
                    mysqli_query($con,"update classes set start_teaching_period='$edit_class_start' where class_id='$edit_class'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }

                if($edit_class_end!=$class_end){
                    mysqli_query($con,"update classes set end_teaching_period='$edit_class_end' where class_id='$edit_class'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }
            }else{

                if($exist_stds==0){
                    mysqli_query($con,"DELETE FROM classes WHERE class_id='$edit_class'") or die(mysqli_error($conn->error));
                    $trashed='Updated';
                }else{
                    $error='Can not trash class, there students under the class';
                }

                
            }
        }else{
            $error='Class does not exist';
        }

        if(empty($error) && empty($saved) && empty($trashed)){$nochanges='No Changes';}

        $output=array('saved'=>$saved, 'nochanges'=>$nochanges, 'error'=>$error, 'trashed'=>$trashed);
	    echo json_encode($output);
    }

    if(isset($_POST['edit_teacher'])){
        $saved=$nochanges=$error=$trashed='';
        $edit_teacher=$_POST['edit_teacher'];
        $edit_teacher_name=$_POST['edit_teacher_name'];
        $edit_teacher_contact=$_POST['edit_teacher_contact'];
        $edit_teacher_address=$_POST['edit_teacher_address'];
        $edit_teacher_username=$_POST['edit_teacher_username'];
        $edit_teacher_password=md5($_POST['edit_teacher_password']);
        $edit_tr_trash=$_POST['edit_tr_trash'];

        $edit_teacher_pic=$_FILES['edit_teacher_pic']['name'];
        $tr_imgtmp = $_FILES['edit_teacher_pic']['tmp_name'];
        move_uploaded_file($tr_imgtmp, "../teachers/" . $edit_teacher_pic);
        $tr_pic_path = "../teachers/".$edit_teacher_pic;

        $sql=mysqli_query($con,"select * from users where user_id='$edit_teacher' and category='Teacher'");
        if(mysqli_num_rows($sql)>0){
            while($result=mysqli_fetch_assoc($sql)){
                $tr_name=$result['name'];
                $tr_contact=$result['contact'];
                $tr_address=$result['address'];
                $tr_username=$result['username'];
                $tr_password=$result['password'];
            }
            if($edit_tr_trash=='false'){
                if($edit_teacher_name!=$tr_name){
                    mysqli_query($con,"update users set name='$edit_teacher_name' where user_id='$edit_teacher' and category='Teacher'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }
                if($edit_teacher_contact!=$tr_contact){
                    mysqli_query($con,"update users set contact='$edit_teacher_contact' where user_id='$edit_teacher' and category='Teacher'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }
                if($edit_teacher_address!=$tr_address){
                    mysqli_query($con,"update users set address='$edit_teacher_address' where user_id='$edit_teacher' and category='Teacher'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }
                if($edit_teacher_username!=$tr_username){
                    mysqli_query($con,"update users set username='$edit_teacher_username' where user_id='$edit_teacher' and category='Teacher'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }
                if($edit_teacher_password!=$tr_password){
                    mysqli_query($con,"update users set password='$edit_teacher_password' where user_id='$edit_teacher' and category='Teacher'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }
                if($tr_pic_path!="../teachers/"){
                    mysqli_query($con,"update users set picture='$tr_pic_path' where user_id='$edit_teacher' and category='Teacher'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }
            }else{
                mysqli_query($con,"DELETE FROM users WHERE user_id='$edit_teacher' and category='Teacher'") or die(mysqli_error($conn->error));
                $trashed='Updated';
            }
        }else{
            $error='Teacher does not exist';
        }

        if(empty($error) && empty($saved) && empty($trashed)){$nochanges='No Changes';}

        $output=array('saved'=>$saved, 'nochanges'=>$nochanges, 'error'=>$error, 'trashed'=>$trashed);
	    echo json_encode($output);
    }

    if(isset($_POST['new_materials'])){
        $saved=$error='';
        $new_materials_course=$_POST['new_materials_course'];
        $new_materials_courseunit=$_POST['new_materials_courseunit'];
        $new_materials_name=$_POST['new_materials_name'];
        $new_materials_details=$_POST['new_materials_details'];

        $sql=mysqli_query($con, "select * from materials where name='$new_materials_name' and details='$new_materials_details' and course_id='$new_materials_course' and course_unit_id='$new_materials_courseunit'");
        if(mysqli_num_rows($sql)>0){
            $error='Material already exists';
        }else{
            $new_materials_file=$_FILES['new_materials_file']['name'];
            $materials_imgtmp = $_FILES['new_materials_file']['tmp_name'];
            move_uploaded_file($materials_imgtmp, "../docs/" . $new_materials_file);
	        $materials_path = "../docs/".$new_materials_file;

            mysqli_query($con, "INSERT INTO materials SET name='$new_materials_name', details='$new_materials_details', course_id='$new_materials_course', course_unit_id='$new_materials_courseunit',
                attachment='$materials_path'");
            $saved='Material Saved';
        }

        $output=array('saved'=>$saved, 'error'=>$error);
	    echo json_encode($output);
    }

    if(isset($_POST['new_student'])){
        $saved=$error='';

        $new_std_no=$_POST['new_student_no'];
        $new_std_name=$_POST['new_teacher_name'];
        $new_std_dept=$_POST['new_student_dept'];
        $new_std_course=$_POST['new_student_course'];
        $new_std_contact=$_POST['new_student_contact'];
        $new_std_address=$_POST['new_student_address'];
        $new_std_username=$_POST['new_student_username'];
        $new_std_password=md5($_POST['new_student_password']);
        $new_student_picture=$_FILES['new_student_picture']['name'];
        $std_imgtmp = $_FILES['new_student_picture']['tmp_name'];
        move_uploaded_file($std_imgtmp, "../students/" . $new_student_picture);
        $new_std_pic_path = "../students/".$new_student_picture;

        if($new_std_pic_path=="../students/"){
            $new_std_pic_path='';
        }

        $sql=mysqli_query($con,"select * from users where user_no='$new_std_no' and name='$new_std_name' and contact='$new_std_contact' and address='$new_std_address' 
        and course='$new_std_course' and department='$new_std_dept' and category='Student'");
        if(mysqli_num_rows($sql)>0){
            $error="Student already exists.";
        }else{
            $std_sql=mysqli_query($con,"select * from users where username='$new_std_username' and category='Student'");
            if(mysqli_num_rows($std_sql)>0){
                $error="Student Username already exists.";
            }else{
                mysqli_query($con, "INSERT INTO users SET date='$nowdate', user_no='$new_std_no', name='$new_std_name', contact='$new_std_contact', address='$new_std_address',
             department='$new_std_dept', course='$new_std_course', picture='$new_std_pic_path', category='Student',username='$new_std_username',password='$new_std_password'");
			    $saved='Student Saved';
            }
        }

        $output=array('saved'=>$saved, 'error'=>$error);
	    echo json_encode($output);
    }

    if(isset($_POST['edit_student'])){
        $saved=$nochanges=$error=$trashed='';
        $edit_student=$_POST['edit_student'];
        $edit_student_no=$_POST['edit_student_no'];
        $edit_student_name=$_POST['edit_student_name'];
        $edit_student_contact=$_POST['edit_student_contact'];
        $edit_student_address=$_POST['edit_student_address'];
        $edit_student_username=$_POST['edit_student_username'];
        $edit_student_password=md5($_POST['edit_student_password']);
        $edit_std_trash=$_POST['edit_std_trash'];

        $edit_student_picture=$_FILES['edit_student_picture']['name'];
        $std_imgtmp = $_FILES['edit_student_picture']['tmp_name'];
        move_uploaded_file($std_imgtmp, "../students/" . $edit_student_picture);
        $edit_std_pic_path = "../students/".$edit_student_picture;

        $sql=mysqli_query($con,"select * from users where user_id='$edit_student' and category='Student'");
        if(mysqli_num_rows($sql)>0){
            while($result=mysqli_fetch_assoc($sql)){
                $std_no=$result['user_no'];
                $std_name=$result['name'];
                $std_contact=$result['contact'];
                $std_address=$result['address'];
                $std_username=$result['username'];
                $std_password=$result['password'];
            }
            if($edit_std_trash=='false'){
                if($edit_student_no!=$std_no){
                    mysqli_query($con,"update users set user_no='$edit_student_no' where user_id='$edit_student' and category='Student'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }
                if($edit_student_name!=$std_name){
                    mysqli_query($con,"update users set name='$edit_student_name' where user_id='$edit_student' and category='Student'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }
                if($edit_student_contact!=$std_contact){
                    mysqli_query($con,"update users set contact='$edit_student_contact' where user_id='$edit_student' and category='Student'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }
                if($edit_student_address!=$std_address){
                    mysqli_query($con,"update users set address='$edit_student_address' where user_id='$edit_student' and category='Student'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }
                if($edit_student_username!=$std_username){
                    $user_sql=mysqli_query($con, "select * from users where username='$edit_student_username' and category='Student'");
                    if(mysqli_num_rows($user_sql)>0){

                    }else{
                        mysqli_query($con,"update users set username='$edit_student_username' where user_id='$edit_student' and category='Student'") or die(mysqli_error($conn->error));
                        $saved='Updated';
                    }
                }
                if($edit_student_password!=$std_password){
                    mysqli_query($con,"update users set password='$edit_student_password' where user_id='$edit_student' and category='Student'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }

                if($edit_std_pic_path!="../students/"){
                    mysqli_query($con,"update users set picture='$edit_std_pic_path' where user_id='$edit_student' and category='Student'") or die(mysqli_error($conn->error));
                    $saved='Updated';
                }
            }else{
                mysqli_query($con,"DELETE FROM users WHERE user_id='$edit_student' and category='Student'") or die(mysqli_error($conn->error));
                $trashed='Updated';
            }
        }else{
            $error='Student does not exist';
        }

        if(empty($error) && empty($saved) && empty($trashed)){$nochanges='No Changes';}

        $output=array('saved'=>$saved, 'nochanges'=>$nochanges, 'error'=>$error, 'trashed'=>$trashed);
	    echo json_encode($output);
    }

    

?>