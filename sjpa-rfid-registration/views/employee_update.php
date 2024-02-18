<div class="employee-update-con">
    <form action="" id="update_employee" class="ereg-form">
        <span>Employee ID*</span>
        <input type="text" name="" id="eid" required autocomplete="off" disabled class="eid">
        <span>Employee Name*</span>
        <input type="text" name="" id="ename" required autocomplete="off" placeholder="ex. Doe, John A.">
        <span>Employee Department*</span>
        <input type="text" name="" id="edepartment" required autocomplete="off" placeholder="ex. IT Department">
        <span>Employee Position*</span>
        <input type="text" name="" id="eposition" required autocomplete="off" placeholder="ex. Software Engineer">
        <span>Employee Email*</span>
        <input type="email" name="" id="eemail" required autocomplete="off" placeholder="ex. useremail@emaildomain.com">
        <span>Employee Contact Number*</span>
        <input type="tel" name="" id="enum" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required autocomplete="off" placeholder="ex. 9XX-XXX-XXXX">
        <span>Employee Image* (TO EDIT, CLICK ON CHOOSE FILE BUTTON)</span>
        <input type="text" name="" id="eimg" required autocomplete="off" readonly>
        <input type="file" name="" id="eimg_new" accept=".jpg,.png,.jpeg" autocomplete="off">
        <button type="button" id="clear_eimg">Revert Employee Image</button>
        <button type="submit" id="submit_btn">UPDATE ID</button>
    </form>
</div>