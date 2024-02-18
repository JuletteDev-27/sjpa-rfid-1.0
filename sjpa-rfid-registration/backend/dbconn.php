<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sjpa_rfid_db_comp";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
