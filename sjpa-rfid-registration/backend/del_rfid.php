<?php

require_once 'dbconn.php';
$data = [];

$rfid = mysqli_real_escape_string($conn, $_POST['rfid']);

$delete_rfid = "DELETE FROM table_rfid WHERE rfid = '$rfid'";
$delete_rfid_query = mysqli_query($conn, $delete_rfid);

if (!$delete_rfid_query) {
    $data['error_type'] = "query_errors";
    $data['error'] = "Error!" . mysqli_error($conn);
    mysqli_close($conn);
    echo json_encode($data);
    return;
}

$data['error_type'] = "none";
$data['response'] = "RFID successfully deleted";
mysqli_close($conn);
echo json_encode($data);
return;
