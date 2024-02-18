<?php

require_once 'dbconn.php';
$data = [];
$rfid_type = $_POST['rfid_type'];

if($rfid_type == "SD"){
    $get_all_student_rfid = "SELECT rfid FROM table_rfid where rfid_type='S'";
    $get_all_student_rfid_query = mysqli_query($conn, $get_all_student_rfid);

    if (!$get_all_student_rfid_query) {
        $data['error_type'] = "query_errors";
        $data['error'] = "Error!" . mysqli_error($conn);
        mysqli_close($conn);
        echo json_encode($data);
        return;
    }

    $student_rfid = mysqli_fetch_all($get_all_student_rfid_query);

    $data = $student_rfid;
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

if($rfid_type == "EM"){
    $get_all_employee_rfid = "SELECT rfid FROM table_rfid where rfid_type='E'";
    $get_all_employee_rfid_query = mysqli_query($conn, $get_all_employee_rfid);

    if (!$get_all_employee_rfid_query) {
        $data['error_type'] = "query_errors";
        $data['error'] = "Error!" . mysqli_error($conn);
        mysqli_close($conn);
        echo json_encode($data);
        return;
    }

    $employee_rfid = mysqli_fetch_all($get_all_employee_rfid_query);

    $data = $employee_rfid;
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

