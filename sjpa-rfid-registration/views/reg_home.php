<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="
    https://cdn.jsdelivr.net/npm/reset-css@5.0.2/reset.min.css
    " rel="stylesheet">
    <script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SJPA RFID Registration</title>
</head>
<body>
    <dialog class="ini-dialog" id="ini_modal">
        <button type="button" id="stud_btn">Register a Student</button>
        <button type="button" id="emp_btn">Register an Employee</button>
    </dialog>
    <dialog class="error-dialog" id="error_dialog">
        <h1 id="error"></h1>
    </dialog>
    <div class="main-container">
        <h1>Please scan the RFID / manually input the RFID number</h1>
        <form id="main-form" class="main_form">
            <input type="text" name="" id="rfid_tbox" required autocomplete="off">
        </form>
    </div>
    <script src="assets/js/ini-sys.js"></script>
</body>
</html>