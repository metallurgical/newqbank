<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "qb";

$connect = new mysqli($host, $username, $password, $db_name);
if($connect->connect_errno)
{
	echo "Failed to connect to MySQL : ".$connect->error;
}

//$password = $connect->real_escape_string(stripslashes($_POST['password']));

@$username = $connect->real_escape_string(stripslashes($_POST['username']));
@$password = $connect->real_escape_string(stripslashes($_POST['password']));

@$admin_id = $connect->real_escape_string(stripslashes($_POST['admin_id']));
@$admin_password = $connect->real_escape_string(stripslashes($_POST['admin_password']));
@$admin_name = $connect->real_escape_string(stripslashes($_POST['admin_name']));
@$admin_username = $connect->real_escape_string(stripslashes($_POST['admin_username']));

@$teacher_id = $connect->real_escape_string(stripslashes($_POST['teacher_id']));
@$teacher_name = $connect->real_escape_string(stripslashes($_POST['teacher_name']));
@$teacher_username = $connect->real_escape_string(stripslashes($_POST['teacher_username']));
@$teacher_password = $connect->real_escape_string(stripslashes($_POST['teacher_password']));
@$teacher_staffid = $connect->real_escape_string(stripslashes($_POST['teacher_staffid']));
@$teacher_ic = $connect->real_escape_string(stripslashes($_POST['teacher_ic']));
@$teacher_email = $connect->real_escape_string(stripslashes($_POST['teacher_email']));
@$teacher_sub = $connect->real_escape_string(stripslashes($_POST['teacher_sub']));
@$teacher_add = $connect->real_escape_string(stripslashes($_POST['teacher_add']));
@$teacher_pos = $connect->real_escape_string(stripslashes($_POST['teacher_pos']));
@$teacher_daerah = $connect->real_escape_string(stripslashes($_POST['teacher_daerah']));
@$teacher_state = $connect->real_escape_string(stripslashes($_POST['teacher_state']));

@$student_id = $connect->real_escape_string(stripslashes($_POST['student_id']));
@$student_name = $connect->real_escape_string(stripslashes($_POST['student_name']));
@$student_username = $connect->real_escape_string(stripslashes($_POST['student_username']));
@$student_password = $connect->real_escape_string(stripslashes($_POST['student_password']));
@$student_ic = $connect->real_escape_string(stripslashes($_POST['student_ic']));
@$student_state = $connect->real_escape_string(stripslashes($_POST['student_state']));
@$student_add = $connect->real_escape_string(stripslashes($_POST['student_add']));
@$student_form = $connect->real_escape_string(stripslashes($_POST['student_form']));
@$student_phone = $connect->real_escape_string(stripslashes($_POST['student_phone']));
?>