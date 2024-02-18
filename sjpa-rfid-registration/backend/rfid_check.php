<?php

    require_once "dbconn.php";

    $rfid = $_GET['rfid'];
    $user_type = $_GET['user_type'];

    $data = [];

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

    if ($check_result['result'] > 0) {
        $data['error_type'] = "check_errors";
        $data['error'] = "ID already registered!";
        mysqli_close($conn);
        echo json_encode($data);
        return;
    }
    
    

    $data = [
        "error_type"=>'none',
        "user_type"=>$user_type
    ];

    mysqli_close($conn);
    echo json_encode($data);
    return;
