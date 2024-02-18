<?php

require_once 'dbconn.php';
$data = [];
$rfid_type = $_POST['rfid_type'];
$rfid = $_POST['rfid'];

if ($rfid_type == "SD") {
    // Use a prepared statement to prevent SQL injection
    $get_student_data = "SELECT 
        student_id as 'sid',
        student_name as 'sname',
        student_grade_section as 'sgrade',
        student_guardian_name as 'sguardian',
        student_guardian_email as 'semail',
        student_guardian_number as 'snum',
        student_img as 'simg' 
        FROM table_students_info 
        WHERE student_rfid = ?";

    $stmt = mysqli_prepare($conn, $get_student_data);
    
    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "s", $rfid);
    
    // Execute the statement
    mysqli_stmt_execute($stmt);

    $get_student_data_query = mysqli_stmt_get_result($stmt);

    if (!$get_student_data_query) {
        $data['error_type'] = "query_errors";
        $data['error'] = "Error!" . mysqli_error($conn);
        mysqli_close($conn);
        echo json_encode($data);
        return;
    }

    $student_data = mysqli_fetch_assoc($get_student_data_query);

    $data = [
        "sid"=>$student_data['sid'],
        "sname"=>$student_data['sname'],
        "sgrade"=>$student_data['sgrade'],
        "sguardian"=>$student_data['sguardian'],
        "semail"=>$student_data['semail'],
        "snum"=>$student_data['snum'],
        "simg"=>$student_data['simg'],
    ];

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    $get_employee_data = "SELECT 
    employee_id as 'eid',
    employee_name as 'ename',
    employee_department as 'edepartment',
    employee_position as 'eposition',
    employee_email as 'eemail',
    employee_number as 'enum',
    employee_img as 'eimg' 
    FROM table_employee_info 
    WHERE employee_rfid = ?";

    $stmt = mysqli_prepare($conn, $get_employee_data);

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "s", $rfid);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    $get_employee_data_query = mysqli_stmt_get_result($stmt);

    if (!$get_employee_data_query) {
        $data['error_type'] = "query_errors";
        $data['error'] = "Error!" . mysqli_error($conn);
        mysqli_close($conn);
        echo json_encode($data);
        return;
    }

    $employee_data = mysqli_fetch_assoc($get_employee_data_query);

    $data = [
        "eid" => $employee_data['eid'],
        "ename" => $employee_data['ename'],
        "edepartment" => $employee_data['edepartment'],
        "eposition" => $employee_data['eposition'],
        "eemail" => $employee_data['eemail'],
        "enum" => $employee_data['enum'],
        "eimg" => $employee_data['eimg'],
    ];

    // Close the statement
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
echo json_encode($data);
return;