$(document).ready(()=>{
    $("#ini_modal").css("display","flex")
    let user_type = "";
    $("#stud_btn").blur()
    $("#emp_btn").blur()
    
    $(window).on('pageshow', function(event) {
        var form = $('#main-form');
        if (event.originalEvent.persisted) {
          form[0].reset();
        }
      });

    $(document).on('keyup', (e) => {
        const modal = $('#ini_modal');
        if (modal.is(':visible') && e.key === 'Enter') {
            e.preventDefault();
    }})

    $("#stud_btn").click((e)=>{
        user_type = "S"
        $("#rfid_tbox").focus();
        ini_modal.close();
        $("#ini_modal").css("display","none")
    })

    $("#emp_btn").click((e)=>{
        user_type="E"
        $("#rfid_tbox").focus();
        ini_modal.close();
        $("#ini_modal").css("display","none")
    })

    $("#main-form").on("submit", (e)=>{
        let data = {
            rfid: $("#rfid_tbox").val(),
            user_type: user_type
        }

        $.ajax({
            type: "GET",
            url: "backend/rfid_check.php",
            data: data,
            dataType: "json",
            encode: true,
        }).done((data)=>{
            if(data.error_type != "none"){

                $('#error_dialog').css("display", "block")
                $('#error').text(data.error)

                setTimeout(()=>{
                    $('#error_dialog').css("display", "none")
                    $("#rfid_tbox").val("")
                    $("#ini_modal").css("display","flex")
                }, 3000)
                
            }

            if(data.error_type == "none"){
                if(data.user_type == "E"){
                    window.location.href =`?page=employee_registration&rfid=${$("#rfid_tbox").val()}`
                
                } else if (data.user_type == "S") {
                    window.location.href =`?page=student_registration&rfid=${$("#rfid_tbox").val()}`
                }
            }
        })

        e.preventDefault();
    })
})