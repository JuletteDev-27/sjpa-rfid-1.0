$(document).ready(()=>{

    var img_chg = false
    var org_img = ""

    $("#reg_select").change((e)=>{

        if($("#reg_select").val() == ""){
            $("#rfid").empty()
            let defOption = $("<option>", {
                value: "",
                text: "--PLEASE SELECT ONE--"
            })
            $("#rfid").append(defOption)
            $("#rfid").val("")
            $("#rfid").prop('disabled', true)
            return
        }
    
        var data = new FormData();
        data.append('rfid_type', $("#reg_select").val())

        $.ajax({
            type: "POST",
            url: "backend/upd_get_rfids.php",
            data: data,
            contentType: false, 
            processData: false, 
            dataType: "json",
        }).done((data)=>{
            $("#rfid").empty()
            let defOption = $("<option>", {
                value: "",
                text: "--PLEASE SELECT ONE--"
            })
            $("#rfid").append(defOption)
            
            data.forEach((array)=>{
                array.forEach((item)=>{
                    let newOption = $("<option>", {
                        value: item,
                        text: item
                    })
                    $("#rfid").append(newOption)
                })
            })

        }).fail((jqXHR, textStatus, errorThrown) => {
            // console.error("AJAX Error:", errorThrown);
            console.log(jqXHR.responseText);
        });

        $("#rfid").prop('disabled', false)
        
    
        e.preventDefault();
    })

    $("#rfid").change((e)=>{

        if($("#rfid").val()==""){
            $("#confirm_rfid").prop("disabled", true)
            $("#confirm_rfid").css("background-color", "rgba(19, 1, 1, 0.3)")
            return
        }
        $("#confirm_rfid").prop("disabled", false)
        $("#confirm_rfid").css("background-color", "green")

        e.preventDefault()
    })

    $("#confirm_rfid").on("click", (e)=>{

        $("#reg_select").prop("disabled", true)
        $("#rfid").prop("disabled", true)
        $("#confirm_rfid").prop("disabled", true)
        $("#confirm_rfid").css("background-color", "rgba(19, 1, 1, 0.3)")
        $("#change_rfid").css("background-color", "red")
        $("#change_rfid").prop("disabled", false)

        $(".update-placeholder").css("opacity", "0%")

        setTimeout(()=>{
            $(".update-placeholder").css("display", "none")
            
            if($("#reg_select").val() == "SD"){

                data = new FormData();
                data.append('rfid_type', $("#reg_select").val())
                data.append('rfid', $("#rfid").val());

                $.ajax({
                    type: "POST",
                    url: "backend/upd_get_rfid_info.php",
                    data: data,
                    contentType: false, 
                    processData: false, 
                    dataType: "json",
                }).done((data)=>{
                    $("#sid").val(data.sid)
                    $("#sname").val(data.sname)
                    $("#sgrade").val(data.sgrade)
                    $("#sguardian").val(data.sguardian)
                    $("#semail").val(data.semail)
                    $("#snum").val(data.snum)
                    $("#simg").val(data.simg)
                    org_img = data.simg
                }).fail((jqXHR, textStatus, errorThrown) => {
                    // console.error("AJAX Error:", errorThrown);
                    console.log(jqXHR.responseText);
                });

                $(".student-update-con").css("display", "block")
                return
            }

            if($("#reg_select").val() == "EM"){

                data = new FormData();
                data.append('rfid_type', $("#reg_select").val())
                data.append('rfid', $("#rfid").val());

                $.ajax({
                    type: "POST",
                    url: "backend/upd_get_rfid_info.php",
                    data: data,
                    contentType: false, 
                    processData: false, 
                    dataType: "json",
                }).done((data)=>{
                    $("#eid").val(data.eid);
                    $("#ename").val(data.ename);
                    $("#edepartment").val(data.edepartment);
                    $("#eposition").val(data.eposition);
                    $("#eemail").val(data.eemail);
                    $("#enum").val(data.enum);
                    $("#eimg").val(data.eimg);
                    org_img = data.eimg;
                }).fail((jqXHR, textStatus, errorThrown) => {
                    // console.error("AJAX Error:", errorThrown);
                    console.log(jqXHR.responseText);
                });

                $(".employee-update-con").css("display", "block")
                return
            }
           
        },200)
        e.preventDefault()
    })

    $("#change_rfid").on("click", (e)=>{
        $("form")[0].reset()
        $(".update-placeholder").css("opacity", "100%")
        $(".update-placeholder").css("display", "block")
        $(".student-update-con").css("display", "none")
        $(".employee-update-con").css("display", "none")
        $("#reg_select").prop("disabled", false)
        $("#rfid").prop("disabled", false)
        $("#confirm_rfid").prop("disabled", false)
        $("#change_rfid").css("background-color", "rgba(19, 1, 1, 0.3)")
        $("#confirm_rfid").css("background-color", "green")
        $("#change_rfid").prop("disabled", true)
        img_chg = false
        e.preventDefault();
    })

    $("#simg_new").change((e)=>{
        $("#simg").val($("#simg_new").val().split('\\')[2])
        img_chg = true
        e.preventDefault()
    })

    $("#eimg_new").change((e)=>{
        $("#eimg").val($("#eimg_new").val().split('\\')[2])
        img_chg = true
        e.preventDefault()
    })

    $("#clear_simg").on("click", (e)=>{
        $("simg_new").val('')
        $("#simg").val(org_img)
        img_chg = false
        e.preventDefault()
    })

    $("#clear_eimg").on("click", (e)=>{
        $("eimg_new").val('')
        $("#eimg").val(org_img)
        img_chg = false
        e.preventDefault()
    })

    $("#update_student").on("submit", (e)=>{
        let formData = new FormData();
        formData.append('rfid_type', $("#reg_select").val())
        formData.append('srfid', $("#rfid").val());
        formData.append('sid', $("#sid").val());
        formData.append('sname', $("#sname").val());
        formData.append('sgrade', $("#sgrade").val());
        formData.append('sguardian', $("#sguardian").val());
        formData.append('semail', $("#semail").val());
        formData.append('snum', $("#snum").val());
        formData.append('org_simg', org_img);
        formData.append('new_simg', $("#simg_new")[0].files[0]);
        formData.append('img_chg', img_chg.toString());

        $.ajax({
            type: "POST",
            url: "backend/upd_update_info.php",
            data: formData,
            contentType: false, 
            processData: false, 
            dataType: "json",
        }).done((data)=>{
            $('#success_dialog').css("display", "block")
            $('#success').text(data.response)

            setTimeout(()=>{
                $('.success-dialog').css("display", "none")
                $("form")[0].reset()
                $(".update-placeholder").css("opacity", "100%")
                $(".update-placeholder").css("display", "block")
                $(".student-update-con").css("display", "none")
                $(".employee-update-con").css("display", "none")
                $("#reg_select").prop("disabled", false)
                $("#rfid").prop("disabled", false)
                $("#confirm_rfid").prop("disabled", false)
                $("#change_rfid").css("background-color", "rgba(19, 1, 1, 0.3)")
                $("#confirm_rfid").css("background-color", "green")
                $("#change_rfid").prop("disabled", true)
                img_chg = false
            }, 3000)
        }).fail((jqXHR, textStatus, errorThrown) => {
            // console.error("AJAX Error:", errorThrown);
            console.log(jqXHR.responseText);
        });

        e.preventDefault()
    })

    $("#update_employee").on("submit", (e) => {
        let formData = new FormData();
        formData.append('rfid_type', $("#reg_select").val());
        formData.append('erfid', $("#rfid").val());
        formData.append('eid', $("#eid").val());
        formData.append('ename', $("#ename").val());
        formData.append('edepartment', $("#edepartment").val());
        formData.append('eposition', $("#eposition").val());
        formData.append('eemail', $("#eemail").val());
        formData.append('enum', $("#enum").val());
        formData.append('org_eimg', org_img);
        formData.append('new_eimg', $("#eimg_new")[0].files[0]);
        formData.append('img_chg', img_chg.toString());
    
        $.ajax({
            type: "POST",
            url: "backend/upd_update_info.php",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
        }).done((data) => {
            $('#success_dialog').css("display", "block")
            $('#success').text(data.response)

            setTimeout(()=>{
                $('.success-dialog').css("display", "none")
                $("form")[0].reset()
                $(".update-placeholder").css("opacity", "100%")
                $(".update-placeholder").css("display", "block")
                $(".student-update-con").css("display", "none")
                $(".employee-update-con").css("display", "none")
                $("#reg_select").prop("disabled", false)
                $("#rfid").prop("disabled", false)
                $("#confirm_rfid").prop("disabled", false)
                $("#change_rfid").css("background-color", "rgba(19, 1, 1, 0.3)")
                $("#confirm_rfid").css("background-color", "green")
                $("#change_rfid").prop("disabled", true)
                img_chg = false
            }, 3000)
        }).fail((jqXHR, textStatus, errorThrown) => {
            console.log(jqXHR.responseText);
        });
    
        e.preventDefault();
    });
})