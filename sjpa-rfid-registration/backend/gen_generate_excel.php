<?php

require 'dbconn.php';
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$attendance_type = $_POST['att_type'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$data = [];

if ($attendance_type != 'EM') {
    return;
}

$get_all_dept = "SELECT DISTINCT employee_department as 'departments' FROM table_employee_info";
$get_all_dept_query = mysqli_query($conn, $get_all_dept);

if (!$get_all_dept_query) {
    $data['error_type'] = "query_errors";
    $data['error'] = "Error!" . mysqli_error($conn);
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

$spreadsheet = new Spreadsheet(); // Initialize the main spreadsheet

while ($row = mysqli_fetch_assoc($get_all_dept_query)) {
    $department = $row['departments'];

    // Skip empty department names
    if (!empty($department)) {
        $sheet = $spreadsheet->createSheet(); // Create a new sheet for each department
        $sheet->setTitle($department); // Set sheet title to the department name

        $get_all_dept_rfid = "SELECT employee_name as ename, employee_position as epos, employee_rfid as erfid FROM table_employee_info WHERE employee_department = '$department'";
        $get_all_dept_rfid_query = mysqli_query($conn, $get_all_dept_rfid);

        if (!$get_all_dept_rfid_query) {
            $data['error_type'] = "query_errors";
            $data['error'] = "Error!" . mysqli_error($conn);
            mysqli_close($conn);
            echo json_encode($data);
            return;
        }

        while ($employeeInfoRow = mysqli_fetch_assoc($get_all_dept_rfid_query)) {
            $ename = $employeeInfoRow['ename'];
            $epos = $employeeInfoRow['epos'];
            $rfid = $employeeInfoRow['erfid'];

            // Add employee info (Name and Position) to the active sheet
            $sheet->setCellValueByColumnAndRow(1, $sheet->getHighestRow() + 1, $rfid);
            $sheet->setCellValueByColumnAndRow(2, $sheet->getHighestRow(), $ename);
            $sheet->setCellValueByColumnAndRow(3, $sheet->getHighestRow(), $epos);

            $get_all_attendance_info = "SELECT eattn_datetime, eattn_action FROM table_employees_attendance WHERE eattn_erfid = '$rfid' 
                AND eattn_datetime BETWEEN '$start_date' AND '$end_date'";

            $get_all_attendance_info_query = mysqli_query($conn, $get_all_attendance_info);

            if (!$get_all_attendance_info_query) {
                $data['error_type'] = "query_errors";
                $data['error'] = "Error!" . mysqli_error($conn);
                mysqli_close($conn);
                echo json_encode($data);
                return;
            }

            // Add data to the active sheet starting from the next row
            while ($attendanceRow = mysqli_fetch_assoc($get_all_attendance_info_query)) {
                // Determine the day of the week
                $date = new DateTime($attendanceRow['eattn_datetime']);
                $dayOfWeek = $date->format('l'); // 'l' returns the full day name
                $datetimeWithDay = $date->format('Y-m-d H:i:s') . ', ' . $dayOfWeek . ', ' . $attendanceRow['eattn_action'];
                
                $sheet->setCellValueByColumnAndRow(4, $sheet->getHighestRow() + 1, $datetimeWithDay);
            }
        }
    }
}

// Save the entire workbook
$name = "attendancefor" . strval($start_date) . "to" . strval($end_date);
$filename = '../generated_excel_files/' . $name;
$writer = new Xlsx($spreadsheet);
$writer->save($filename . ".xlsx");

// Include data in the response
$data['attendance_data'] = null; // Since $attendance_data is not being used

echo json_encode($data);

mysqli_close($conn);
?>