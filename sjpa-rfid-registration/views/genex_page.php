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
    <div class="genex-main-con">
        <form action="" id="genex_form" class="genex-form">
            <label for="ex_type">Attendance Type</label>
            <select name="" id="ex_type" required>
                <option value="">-- PLEASE SELECT ONE --</option>
                <option value="SD">STUDENT ATTENDANCE</option>
                <option value="EM">EMPLOYEE ATTENDANCE</option>
            </select>

            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" required>

            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" required>

            <button type="submit" id="submit_btn">GENERATE EXCEL FILE</button>
        </form>
    </div>
    <script src="assets/js/genex-sys.js"></script>
</body>
</html>