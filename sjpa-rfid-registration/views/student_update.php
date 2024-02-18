<div class="student-update-con">
    <form action="" id="update_student" class="ereg-form">
        <span>Student ID*</span>
        <input type="text" name="" id="sid" required autocomplete="off" disabled class="sid">
        <span>Student Name*</span>
        <input type="text" name="" id="sname" required autocomplete="off" placeholder="ex. Dela Cruz, John A.">
        <span>Student Grade and Section*</span>
        <input type="text" name="" id="sgrade" required autocomplete="off" placeholder="ex. Grade-1 Honesty">
        <span>Student Guardian Name*</span>
        <input type="text" name="" id="sguardian" required autocomplete="off" placeholder="ex. Dela Cruz, John A.">
        <span>Student Guardian Email*</span>
        <input type="email" name="" id="semail" required autocomplete="off" placeholder="ex. useremail@emaildomain.com">
        <span>Student Guardian Contact Number*</span>
        <input type="tel" name="" id="snum" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required autocomplete="off" placeholder="ex. 9XX-XXX-XXXX">
        <span>Student Image* (TO EDIT, CLICK ON CHOOSE FILE BUTTON)</span>
        <input type="text" name="" id="simg" required autocomplete="off" readonly>
        <input type="file" name="" id="simg_new" accept=".jpg,.png,.jpeg" autocomplete="off">
        <button type="button" id="clear_simg">Revert Student Image</button>
        <button type="submit" id="submit_btn">UPDATE ID</button>
       
    </form>
</div>