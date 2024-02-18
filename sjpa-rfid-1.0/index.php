<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/94d8d33acf.js" crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>
    <link href="
    https://cdn.jsdelivr.net/npm/reset-css@5.0.2/reset.min.css
    " rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://kit.fontawesome.com/94d8d33acf.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>St. John Paul II Academy RFID System</title>
</head>
<body>
    <dialog id="ini_modal" class="ini-modal">
        <button type="button" id="log_in">Log in</button>
        <button type="button" id="log_out">Log out</button>
    </dialog>
    <dialog id="error_dialog" class="error-dialog">
        <h1>INVALID ID!</h1>
    </dialog>
    <?php
        include 'components/dialog_employee.php';
    ?>
     <?php
        include 'components/dialog_student.php';
    ?>
     <dialog class="wait_dialog" id="wait_dialog">
        <h1><i class="fa-solid fa-spinner fa-spin"></i> Analyzing ID</h1>
    </dialog>
    <div class="main-container">
        <img src="assets/media/images/emblem.png" alt="" srcset="">
        <h1>Welcome to St. John Paul II Academy</h1>
        <p><i class="fa-solid fa-down-long"></i> Please Scan Your RFID in the Indicated Area <i class="fa-solid fa-down-long"></i></p>
        <form method="get" class="main-form" id="main_form">
            <input type="text" name="" id="rfid_pbox" autocomplete="off">
        </form>
    </div>
    <button id="return" class="return-button">return</button>
    <div class="time-container">
        <h1 id="time"></h1>
    </div>
    <script src="assets/js/main-sys.js"></script>
</body>
</html>