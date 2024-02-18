<?php

    require_once "dbconn.php";
    require_once "email_func.php";

    date_default_timezone_set('Asia/Manila');
    $datetimeNow = mysqli_real_escape_string($conn, date('Y-m-d H:i:s'));
    $data = [];
    $rfid = mysqli_real_escape_string($conn, $_GET['rfid']);
    $action = mysqli_real_escape_string($conn, $_GET['action']);

    $check_exist = "SELECT COUNT(rfid) as result from table_rfid where rfid='$rfid'";
    $check_exist_query = mysqli_query($conn, $check_exist);

if (!$check_exist_query) {
    $data['error_type'] = "query_errors";
    $data['error'] = "Error!" . mysqli_error($conn);
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

    $check_result = mysqli_fetch_assoc($check_exist_query);

if ($check_result['result'] < 1) {
    $data['error_type'] = "check_errors";
    $data['error'] = "INVALID ID";
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

    $check_status = "SELECT rfid_status as result from table_rfid where rfid='$rfid'";
    $check_status_query = mysqli_query($conn, $check_status);

if (!$check_status_query) {
    $data['error_type'] = "query_errors";
    $data['error'] = "Error!" . mysqli_error($conn);
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

    $check_result = mysqli_fetch_assoc($check_status_query);

if ($check_result['result'] != "E") {
    $data['error_type'] = "check_errors";
    $data['error'] = "INVALID ID";
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

    $get_type = "SELECT rfid_type as result from table_rfid where rfid='$rfid'";
    $get_type_query = mysqli_query($conn, $get_type);

if (!$get_type_query) {
    $data['error_type'] = "query_errors";
    $data['error'] = "Error!" . mysqli_error($conn);
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

    $get_result = mysqli_fetch_assoc($get_type_query);

if ($get_result['result'] == "S") {
    if ($action == "IN") {
        $update_cs = "UPDATE table_students_current_status 
        SET scs_current_status='IN' , scs_datetime='$datetimeNow'
        WHERE scs_srfid='$rfid'";
        $update_cs_query = mysqli_query($conn, $update_cs);

        if (!$update_cs_query) {
            $data['error_type'] = "query_errors";
            $data['error'] = "Error!" . mysqli_error($conn);
            mysqli_close($conn);
            echo json_encode($data);
            return;
        }

        $new_attendance = "INSERT INTO table_students_attendance(sattn_srfid, sattn_action, sattn_datetime) 
        VALUES ('$rfid','LOGGED IN', '$datetimeNow')";

        $new_attendance_query = mysqli_query($conn, $new_attendance);

        if (!$new_attendance_query) {
            $data['error_type'] = "query_errors";
            $data['error'] = "Error!" . mysqli_error($conn);
            mysqli_close($conn);
            echo json_encode($data);
            return;
        }

        $get_info = "SELECT student_id as `sid`, student_name as sname, student_grade_section as sgrade, student_guardian_email as semail ,student_img as simg 
        from table_students_info where student_rfid='$rfid'";
        $get_info_query = mysqli_query($conn, $get_info);

        if (!$get_info_query) {
            $data['error_type'] = "query_errors";
            $data['error'] = "Error!" . mysqli_error($conn);
            mysqli_close($conn);
            echo json_encode($data);
            return;
        }

        $student_info = mysqli_fetch_assoc($get_info_query);

        $data = [
        'error_type' => 'none',
        'info_type' => 'S',
        'sid' => $student_info['sid'],
        'sname' => $student_info['sname'],
        'sgrade' => $student_info['sgrade'],
        'simg' => $student_info['simg'],
        ];

        $send_email =  new MailFunctionality('no-reply@stjohnpaul2academy.edu.ph', 'bvvv hagv pmwe zocw', $student_info['semail'], $student_info['sname'], $datetimeNow);
        $send_email->sendLoggedInEmail();
    } elseif ($action == "OUT") {
        $update_cs = "UPDATE table_students_current_status 
        SET scs_current_status='OUT' , scs_datetime='$datetimeNow'
        WHERE scs_srfid='$rfid'";
        $update_cs_query = mysqli_query($conn, $update_cs);

        if (!$update_cs_query) {
            $data['error_type'] = "query_errors";
            $data['error'] = "Error!" . mysqli_error($conn);
            mysqli_close($conn);
            echo json_encode($data);
            return;
        }

        $new_attendance = "INSERT INTO table_students_attendance(sattn_srfid, sattn_action, sattn_datetime) 
        VALUES ('$rfid','LOGGED OUT', '$datetimeNow')";

        $new_attendance_query = mysqli_query($conn, $new_attendance);

        if (!$new_attendance_query) {
            $data['error_type'] = "query_errors";
            $data['error'] = "Error!" . mysqli_error($conn);
            mysqli_close($conn);
            echo json_encode($data);
            return;
        }

        $get_info = "SELECT student_id as `sid`, student_name as sname, student_grade_section as sgrade, student_guardian_email as semail, student_img as simg 
        from table_students_info where student_rfid='$rfid'";
        $get_info_query = mysqli_query($conn, $get_info);

        if (!$get_info_query) {
            $data['error_type'] = "query_errors";
            $data['error'] = "Error!" . mysqli_error($conn);
            mysqli_close($conn);
            echo json_encode($data);
            return;
        }

        $student_info = mysqli_fetch_assoc($get_info_query);

        $data = [
        'error_type' => 'none',
        'info_type' => 'S',
        'sid' => $student_info['sid'],
        'sname' => $student_info['sname'],
        'sgrade' => $student_info['sgrade'],
        'simg' => $student_info['simg'],
        ];

        $send_email =  new MailFunctionality('no-reply@stjohnpaul2academy.edu.ph', 'bvvv hagv pmwe zocw', $student_info['semail'], $student_info['sname'], $datetimeNow);
        $send_email->sendLoggedOutEmail();
    }
} else {
    if ($action == "IN") {
            $update_cs = "UPDATE table_employees_current_status 
            SET ecs_current_status='IN' , ecs_datetime='$datetimeNow'
            WHERE ecs_erfid='$rfid'";
        $update_cs_query = mysqli_query($conn, $update_cs);

        if (!$update_cs_query) {
            $data['error_type'] = "query_errors";
            $data['error'] = "Error!" . mysqli_error($conn);
            mysqli_close($conn);
            echo json_encode($data);
            return;
        }

        $new_attendance = "INSERT INTO table_employees_attendance(eattn_erfid, eattn_action, eattn_datetime) 
            VALUES ('$rfid','LOGGED IN', '$datetimeNow')";

        $new_attendance_query = mysqli_query($conn, $new_attendance);

        if (!$new_attendance_query) {
            $data['error_type'] = "query_errors";
            $data['error'] = "Error!" . mysqli_error($conn);
            mysqli_close($conn);
            echo json_encode($data);
            return;
        }

        $get_info = "SELECT employee_id as eid, employee_name as ename, employee_department as edept, employee_position as epos, employee_img as eimg 
        from table_employee_info where employee_rfid='$rfid'";
        $get_info_query = mysqli_query($conn, $get_info);

        if (!$get_info_query) {
            $data['error_type'] = "query_errors";
            $data['error'] = "Error!" . mysqli_error($conn);
            mysqli_close($conn);
            echo json_encode($data);
            return;
        }

        $employee_info = mysqli_fetch_assoc($get_info_query);

        $data = [
            'error_type' => 'none',
            'info_type' => 'E',
            'eid' => $employee_info['eid'],
            'ename' => $employee_info['ename'],
            'edept' => $employee_info['edept'],
            'epos' => $employee_info['epos'],
            'eimg' => $employee_info['eimg'],
        ];
    } elseif ($action == "OUT") {
        $update_cs = "UPDATE table_employees_current_status 
        SET ecs_current_status='OUT' , ecs_datetime='$datetimeNow'
        WHERE ecs_erfid='$rfid'";
        $update_cs_query = mysqli_query($conn, $update_cs);

        if (!$update_cs_query) {
            $data['error_type'] = "query_errors";
            $data['error'] = "Error!" . mysqli_error($conn);
            mysqli_close($conn);
            echo json_encode($data);
            return;
        }

        $new_attendance = "INSERT INTO table_employees_attendance(eattn_erfid, eattn_action, eattn_datetime) 
        VALUES ('$rfid','LOGGED OUT', '$datetimeNow')";

        $new_attendance_query = mysqli_query($conn, $new_attendance);

        if (!$new_attendance_query) {
            $data['error_type'] = "query_errors";
            $data['error'] = "Error!" . mysqli_error($conn);
            mysqli_close($conn);
            echo json_encode($data);
            return;
        }

        $get_info = "SELECT employee_id as eid, employee_name as ename, employee_department as edept, employee_position as epos, employee_img as eimg 
        from table_employee_info where employee_rfid='$rfid'";
        $get_info_query = mysqli_query($conn, $get_info);

        if (!$get_info_query) {
            $data['error_type'] = "query_errors";
            $data['error'] = "Error!" . mysqli_error($conn);
            mysqli_close($conn);
            echo json_encode($data);
            return;
        }

        $employee_info = mysqli_fetch_assoc($get_info_query);

        $data = [
        'error_type' => 'none',
        'info_type' => 'E',
        'eid' => $employee_info['eid'],
        'ename' => $employee_info['ename'],
        'edept' => $employee_info['edept'],
        'epos' => $employee_info['epos'],
        'eimg' => $employee_info['eimg'],
        ];
    }
}

mysqli_close($conn);
echo json_encode($data);
return;
