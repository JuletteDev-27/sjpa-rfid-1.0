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
    <title>SJPA Student RFID Registration</title>
</head>
<body>
    <dialog class="error-dialog" id="error_dialog">
        <h1 id="error"></h1>
    </dialog>
    <dialog class="success-dialog" id="success_dialog">
        <h1 id="success"></h1>
    </dialog>
    <form id="sreg_form" class="ereg-form">
        <span>Student ID*</span>
        <input type="text" name="" id="sid" required autocomplete="off">
        <span>Student Name*</span>
        <input type="text" name="" id="sname" required autocomplete="off" placeholder="ex. Dela Cruz, John A.">
        <span>Student Grade and Section*</span>
        <input type="text" name="" id="sgrade" required autocomplete="off" placeholder="ex. Grade-1 Honesty">
        <span>Student Guardian Name*</span>
        <input type="text" name="" id="sguardian" required autocomplete="off" placeholder="ex. Dela Cruz, John A.">
        <span>Student Guardian Email*</span>
        <input type="email" name="" id="semail" required autocomplete="off" placeholder="ex. useremail@emaildomain.com">
        <span>Student Guardian Contact Number*</span>
        <input type="tel" name="" id="snum" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required autocomplete="off" placeholder="ex. 9XX-XXX-XXXX">
        <span>Student Image*</span>
        <input type="file" name="" id="simg" accept=".jpg,.png,.jpeg" required autocomplete="off">
        <button type="submit" id="submit_btn">Register</button>
    </form>
    <script src="assets/js/sreg-sys.js"></script>
</body>
</html>