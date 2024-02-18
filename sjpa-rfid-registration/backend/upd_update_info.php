<?php

require_once 'dbconn.php';
$data = [];

$rfid_type =  mysqli_real_escape_string($conn, $_POST['rfid_type']);

if($rfid_type == "SD"){
    $srfid = mysqli_real_escape_string($conn, $_POST['srfid']);
    $sid = mysqli_real_escape_string($conn, $_POST['sid']);
    $sname = mysqli_real_escape_string($conn, $_POST['sname']);
    $sgrade = mysqli_real_escape_string($conn, $_POST['sgrade']);
    $sguardian = mysqli_real_escape_string($conn, $_POST['sguardian']);
    $semail = mysqli_real_escape_string($conn, $_POST['semail']);
    $snum = mysqli_real_escape_string($conn, $_POST['snum']);
    $org_simg = mysqli_real_escape_string($conn, $_POST['org_simg']);
    $img_chg = $_POST['img_chg'];

    $check_sid = "SELECT COUNT(student_id) as result FROM table_students_info WHERE student_id='$sid'";
    $check_sid_query = mysqli_query($conn, $check_sid);
    
    if (!$check_sid_query) {
        $data['error_type'] = "query_errors";
        $data['error'] = "Error!" . mysqli_error($conn);
        mysqli_close($conn);
        echo json_encode($data);
        return;
    }

    if($img_chg == "true"){
        $uploadDirectory = '/wamp64/www/sjpa-rfid-1.0/storage/student_img/';

        // Check if the original image file exists before attempting to delete it
        if (file_exists($uploadDirectory . $org_simg)) {
            unlink($uploadDirectory . $org_simg);
        } else {
            // Handle the case where the file doesn't exist or cannot be deleted
            $data['error'] = "Original image file does not exist or cannot be deleted.";
            echo json_encode($data);
            return;
        }

        $simg = $_FILES['new_simg'];

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
    } else {
        $simg = mysqli_real_escape_string($conn, $org_simg);
    }

    $update_student_info = "UPDATE table_students_info 
                  SET student_id = '$sid', 
                      student_name = '$sname', 
                      student_grade_section = '$sgrade', 
                      student_guardian_name = '$sguardian', 
                      student_guardian_email = '$semail', 
                      student_guardian_number = '$snum', 
                      student_img = '$simg' 
                  WHERE student_rfid = '$srfid'";
    $update_student_info_query = mysqli_query($conn, $update_student_info);

    if (!$update_student_info_query) {
        $data['error_type'] = "query_errors";
        $data['error'] = "Error!" . mysqli_error($conn);
        mysqli_close($conn);
        echo json_encode($data);
        return;
    }

    $data['error_type'] = "none";
    $data['response'] = "Student data successfully updated!";
    mysqli_close($conn);
    echo json_encode($data);
    return;
    
}else if ($rfid_type == "EM"){
    $erfid = mysqli_real_escape_string($conn, $_POST['erfid']);
    $eid = mysqli_real_escape_string($conn, $_POST['eid']);
    $ename = mysqli_real_escape_string($conn, $_POST['ename']);
    $edepartment = mysqli_real_escape_string($conn, $_POST['edepartment']);
    $eposition = mysqli_real_escape_string($conn, $_POST['eposition']);
    $eemail = mysqli_real_escape_string($conn, $_POST['eemail']);
    $enum = mysqli_real_escape_string($conn, $_POST['enum']);
    $org_eimg = mysqli_real_escape_string($conn, $_POST['org_eimg']);
    $img_chg = $_POST['img_chg'];
    
    $check_eid = "SELECT COUNT(employee_id) as result FROM table_employee_info WHERE employee_id='$eid'";
    $check_eid_query = mysqli_query($conn, $check_eid);
    
    if (!$check_eid_query) {
        $data['error_type'] = "query_errors";
        $data['error'] = "Error!" . mysqli_error($conn);
        mysqli_close($conn);
        echo json_encode($data);
        return;
    }
    
    if ($img_chg == "true") {
        $uploadDirectory = '/wamp64/www/sjpa-rfid-1.0/storage/employee_img/';
    
        // Check if the original image file exists before attempting to delete it
        if (file_exists($uploadDirectory . $org_eimg)) {
            unlink($uploadDirectory . $org_eimg);
        } else {
            // Handle the case where the file doesn't exist or cannot be deleted
            $data['error'] = "Original image file does not exist or cannot be deleted.";
            echo json_encode($data);
            return;
        }
    
        $eimg = $_FILES['new_eimg'];
    
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
    } else {
        $eimg = mysqli_real_escape_string($conn, $org_eimg);
    }
    
    $update_employee_info = "UPDATE table_employee_info 
                  SET employee_id = '$eid', 
                      employee_name = '$ename', 
                      employee_department = '$edepartment', 
                      employee_position = '$eposition', 
                      employee_email = '$eemail', 
                      employee_number = '$enum', 
                      employee_img = '$eimg' 
                  WHERE employee_rfid = '$erfid'";
    $update_employee_info_query = mysqli_query($conn, $update_employee_info);
    
    if (!$update_employee_info_query) {
        $data['error_type'] = "query_errors";
        $data['error'] = "Error!" . mysqli_error($conn);
        mysqli_close($conn);
        echo json_encode($data);
        return;
    }
    
    $data['error_type'] = "none";
    $data['response'] = "Employee data successfully updated!";
    mysqli_close($conn);
    echo json_encode($data);
    return;
}