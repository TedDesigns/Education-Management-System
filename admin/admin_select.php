<?php
$dept_cnt=$courses_cnt=$courseunit_cnt=$tr_cunit_cnt=$calendar_cnt=$teacher_cnt=$trunit_cnt=0;
$classroom_cnt=$empty_classroom_cnt=$classes_cnt=$classes_cunit_cnt=$materials_cnt=$student_cnt=0;

$sql=mysqli_query($con, "select * from users where category='Teacher'");
if(mysqli_num_rows($sql)>0){
    while($result=mysqli_fetch_assoc($sql)){
        $teacher_cnt+=1;
        $teacher_id=$result['user_id'];

        $tr_sql=mysqli_query($con, "select * from teacher_courseunit where teacher_id='$teacher_id'");
        if(mysqli_num_rows($tr_sql)>0){
            $trunit_cnt+=1;
        }
    }
}

$sql=mysqli_query($con, "select count(*) as dept_cnt from department");
if(mysqli_num_rows($sql)>0){
    while($result=mysqli_fetch_assoc($sql)){
        $dept_cnt=$result['dept_cnt'];
    }
}

$sql=mysqli_query($con, "select count(*) as courses_cnt from courses");
if(mysqli_num_rows($sql)>0){
    while($result=mysqli_fetch_assoc($sql)){
        $courses_cnt=$result['courses_cnt'];
    }
}

$sql=mysqli_query($con, "select * from course_unit");
if(mysqli_num_rows($sql)>0){
    while($result=mysqli_fetch_assoc($sql)){
        $courseunit_cnt+=1;
        $cunit_id=$result['course_unit_id'];

        $cunit_sql=mysqli_query($con, "select * from teacher_courseunit where course_unit='$cunit_id'");
        if(mysqli_num_rows($cunit_sql)>0){
            $tr_cunit_cnt+=1;
        }
    }
}

$sql=mysqli_query($con, "select count(*) as calendar_cnt from school_calendar");
if(mysqli_num_rows($sql)>0){
    while($result=mysqli_fetch_assoc($sql)){
        $calendar_cnt=$result['calendar_cnt'];
    }
}

$sql=mysqli_query($con, "select * from classrooms");
if(mysqli_num_rows($sql)>0){
    while($result=mysqli_fetch_assoc($sql)){
        $classroom_cnt+=1;
        $classroom_status=$result['status'];

        if($classroom_status=='Available'){
            $empty_classroom_cnt+=1;
        }
    }
}

$sql=mysqli_query($con, "select * from classes");
if(mysqli_num_rows($sql)>0){
    while($result=mysqli_fetch_assoc($sql)){
        $classes_cnt+=1;
        $classes_cunit_id=$result['course_unit_id'];

        $class_cunit_sql=mysqli_query($con, "select * from course_unit where course_unit_id='$classes_cunit_id'");
        if(mysqli_num_rows($class_cunit_sql)>0){
            $classes_cunit_cnt+=1;
        }
    }
}

$sql=mysqli_query($con, "select count(*) as materials_cnt from materials");
if(mysqli_num_rows($sql)>0){
    while($result=mysqli_fetch_assoc($sql)){
        $materials_cnt=$result['materials_cnt'];
    }
}

$sql=mysqli_query($con, "select count(*) as student_cnt from users where category='Student'");
if(mysqli_num_rows($sql)>0){
    while($result=mysqli_fetch_assoc($sql)){
        $student_cnt=$result['student_cnt'];
    }
}
?>