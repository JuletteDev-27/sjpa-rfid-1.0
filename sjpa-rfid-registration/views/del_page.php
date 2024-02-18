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
    <title>SJPA RFID Administrator Dashboard</title>
</head>
<body>
    <dialog class="success-dialog" id="success_dialog">
        <h1 id="success"></h1>
    </dialog>
   <div class="main-del-con">
    <select name="" id="reg_select" class="reg-select">
        <option value="">--PLEASE SELECT ONE--</option>
        <option value="SD">STUDENT RFID</option>
        <option value="EM">EMPLOYEE RFID</option>
        </select>
        <select name="" id="rfid" class="reg-select" disabled>
            <option value="">--PLEASE SELECT ONE--</option>
        </select>
        <button type="button" id="confirm_rfid" class="confirm-rfid" disabled>DELETE THIS RFID</button>
    </div>
    <script src="assets/js/del-sys.js"></script>
</body>
</html>