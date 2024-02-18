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
    <title>SJPA Employee RFID Registration</title>
</head>
<body>
    <dialog class="error-dialog" id="error_dialog">
        <h1 id="error"></h1>
    </dialog>
    <dialog class="success-dialog" id="success_dialog">
        <h1 id="success"></h1>
    </dialog>
    <form id="ereg_form" class="ereg-form">
        <span>Employee ID*</span>
        <input type="text" name="" id="eid" required autocomplete="off">
        <span>Employee Name*</span>
        <input type="text" name="" id="ename" required autocomplete="off" placeholder="ex. Dela Cruz, John A.">
        <span>Employee Department*</span>
        <select id="edept" required autocomplete="off">
            <option value="">-- SELECT ONE --</option>
            <option value="AD">ADMINISTRATIONS</option>
            <option value="FA">FACULTY</option>
            <option value="ST">STAFF</option>
            <option value="MA">MAINTENANCE</option>
        </select>
        <span>Employee Position*</span>
        <input type="text" name="" id="epos" required autocomplete="off" placeholder="ex. Position 1 / Position 2 / Position 3">
        <span>Employee Email*</span>
        <input type="email" name="" id="eemail" required autocomplete="off" placeholder="ex. useremail@emaildomain.com">
        <span>Employee Contact Number*</span>
        <input type="tel" name="" id="enum" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required autocomplete="off" placeholder="ex. 9XX-XXX-XXXX">
        <span>Employee Image*</span>
        <input type="file" name="" id="eimg" accept=".jpg,.png,.jpeg" required autocomplete="off">
        <button type="submit" id="submit_btn">Register</button>
    </form>
    <script src="assets/js/ereg-sys.js"></script>
</body>
</html>