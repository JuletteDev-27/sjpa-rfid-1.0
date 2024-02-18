<?php

require_once 'dbconn.php';
$data = [];

$srfid = mysqli_real_escape_string($conn, $_POST['srfid']);
$sid = mysqli_real_escape_string($conn, $_POST['sid']);
$sname = mysqli_real_escape_string($conn, $_POST['sname']);
$sgrade = mysqli_real_escape_string($conn, $_POST['sgrade']);
$sguardian = mysqli_real_escape_string($conn, $_POST['sguardian']);
$semail = mysqli_real_escape_string($conn, $_POST['semail']);
$snum = mysqli_real_escape_string($conn, $_POST['snum']);
$uploadDirectory = '/wamp64/www/sjpa-rfid-1.0/storage/student_img/';
$dateTimeNow = mysqli_real_escape_string($conn, date('Y-m-d H:i:s'));


$check_sid = "SELECT COUNT(student_id) as result FROM table_students_info WHERE student_id='$sid'";
$check_sid_query = mysqli_query($conn, $check_sid);

if (!$check_sid_query) {
    $data['error_type'] = "query_errors";
    $data['error'] = "Error!" . mysqli_error($conn);
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

$check_sid_result = mysqli_fetch_assoc($check_sid_query);

if($check_sid_result['result'] > 0){
    $data['error_type'] = "check_errors";
    $data['error'] = "student already registered!";
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

$simg = $_FILES['simg'];

$fileName = $simg['name'];
$fileTmpName = $simg['tmp_name'];
$fileSize = $simg['size'];
$fileType = $simg['type'];

try {
    
    $destination = $uploadDirectory . $fileName;

    if (move_uploaded_file($fileTmpName, $destination)) {
       $simg = mysqli_real_escape_string($conn, $fileName);
    } else {
        throw new Exception('Error moving file to destination.');
    }
} catch (Exception $e) {
    $data['error'] = $e->getMessage();
    echo json_encode($data);
    return;
}

$insert_new_rfid = "INSERT INTO table_rfid(rfid, rfid_type, rfid_status) VALUES('$srfid','S','E')";
$insert_new_rfid_query = mysqli_query($conn, $insert_new_rfid);

if (!$insert_new_rfid_query) {
    $data['error_type'] = "query_errors";
    $data['error'] = "Error!" . mysqli_error($conn);
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

$insert_new_student = "INSERT INTO table_students_info(student_rfid, student_id, student_name, student_grade_section, student_guardian_name, student_guardian_email, student_guardian_number, student_img) 
VALUES('$srfid', '$sid', '$sname', '$sgrade', '$sguardian', '$semail', '$snum', '$simg')";
$insert_new_student_query = mysqli_query($conn, $insert_new_student);

if (!$insert_new_student_query) {
    $data['error_type'] = "query_errors";
    $data['error'] = "Error!" . mysqli_error($conn);
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

$insert_new_cs = "INSERT INTO table_students_current_status(scs_srfid, scs_current_status, scs_datetime) 
VALUES('$srfid', 'IN', '$dateTimeNow')";
$insert_new_cs_query = mysqli_query($conn, $insert_new_cs);

if (!$insert_new_cs_query) {
    $data['error_type'] = "query_errors";
    $data['error'] = "Error!" . mysqli_error($conn);
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

$new_attendance = "INSERT INTO table_students_attendance(sattn_srfid, sattn_action, sattn_datetime) 
VALUES ('$srfid','LOGGED IN', '$dateTimeNow')";

$new_attendance_query = mysqli_query($conn, $new_attendance);

if (!$new_attendance_query) {
$data['error_type'] = "query_errors";
$data['error'] = "Error!" . mysqli_error($conn);
mysqli_close($conn);
echo json_encode($data);
return;
}

$data['error_type'] = "none";
$data['response'] = "Student successfully registered";
mysqli_close($conn);
echo json_encode($data);
return;




