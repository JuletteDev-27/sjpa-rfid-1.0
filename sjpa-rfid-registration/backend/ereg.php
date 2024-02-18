<?php

require_once 'dbconn.php';
$data = [];

$erfid = mysqli_real_escape_string($conn, $_POST['erfid']);
$eid = mysqli_real_escape_string($conn, $_POST['eid']);
$ename = mysqli_real_escape_string($conn, $_POST['ename']);
$edept = mysqli_real_escape_string($conn, $_POST['edept']);
$epos = mysqli_real_escape_string($conn, $_POST['epos']);
$eemail = mysqli_real_escape_string($conn, $_POST['eemail']);
$enum = mysqli_real_escape_string($conn, $_POST['enum']);
$uploadDirectory = '/wamp64/www/sjpa-rfid-1.0/storage/employee_img/';
$dateTimeNow = mysqli_real_escape_string($conn, date('Y-m-d H:i:s'));


$check_eid = "SELECT COUNT(employee_id) as result FROM table_employee_info WHERE employee_id='$eid'";
$check_eid_query = mysqli_query($conn, $check_eid);

if (!$check_eid_query) {
    $data['error_type'] = "query_errors";
    $data['error'] = "Error!" . mysqli_error($conn);
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

$check_eid_result = mysqli_fetch_assoc($check_eid_query);

if($check_eid_result['result'] > 0){
    $data['error_type'] = "check_errors";
    $data['error'] = "employee already registered!";
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

$eimg = $_FILES['eimg'];

$fileName = $eimg['name'];
$fileTmpName = $eimg['tmp_name'];
$fileSize = $eimg['size'];
$fileType = $eimg['type'];

try {
    
    $destination = $uploadDirectory . $fileName;

    if (move_uploaded_file($fileTmpName, $destination)) {
       $eimg = mysqli_real_escape_string($conn, $fileName);
    } else {
        throw new Exception('Error moving file to destination.');
    }
} catch (Exception $e) {
    $data['error'] = $e->getMessage();
    echo json_encode($data);
    return;
}

$insert_new_rfid = "INSERT INTO table_rfid(rfid, rfid_type, rfid_status) VALUES('$erfid','E','E')";
$insert_new_rfid_query = mysqli_query($conn, $insert_new_rfid);

if (!$insert_new_rfid_query) {
    $data['error_type'] = "query_errors";
    $data['error'] = "Error!" . mysqli_error($conn);
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

$insert_new_employee = "INSERT INTO table_employee_info(employee_rfid, employee_id, employee_name, employee_department, employee_position, employee_email, employee_number, employee_img) 
VALUES('$erfid', '$eid', '$ename', '$edept', '$epos', '$eemail', '$enum', '$eimg')";
$insert_new_employee_query = mysqli_query($conn, $insert_new_employee);

if (!$insert_new_employee_query) {
    $data['error_type'] = "query_errors";
    $data['error'] = "Error!" . mysqli_error($conn);
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

$insert_new_cs = "INSERT INTO table_employees_current_status(ecs_erfid, ecs_current_status, ecs_datetime) 
VALUES('$erfid', 'IN', '$dateTimeNow')";
$insert_new_cs_query = mysqli_query($conn, $insert_new_cs);

if (!$insert_new_cs_query) {
    $data['error_type'] = "query_errors";
    $data['error'] = "Error!" . mysqli_error($conn);
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

$new_attendance = "INSERT INTO table_employees_attendance(eattn_erfid, eattn_action, eattn_datetime) 
VALUES ('$erfid','LOGGED IN', '$dateTimeNow')";

$new_attendance_query = mysqli_query($conn, $new_attendance);

if (!$new_attendance_query) {
$data['error_type'] = "query_errors";
$data['error'] = "Error!" . mysqli_error($conn);
mysqli_close($conn);
echo json_encode($data);
return;
}

$data['error_type'] = "none";
$data['response'] = "Employee successfully registered";
mysqli_close($conn);
echo json_encode($data);
return;




