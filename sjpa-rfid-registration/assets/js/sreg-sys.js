$(document).ready(() => {

    $(window).on('pageshow', function(event) {
        var form = $('#sreg_form');
        if (event.originalEvent.persisted) {
          form[0].reset();
        }
      });
    
    let urlParams = new URLSearchParams(window.location.search);
    let rfid = urlParams.get('rfid');

    if(rfid == ""){
        window.location.href =`?`
    }
    

    $("#sreg_form").on("submit", (e) => {
        e.preventDefault(); // Prevent the default form submission
        
        let formData = new FormData();
        formData.append('srfid', rfid);
        formData.append('sid', $("#sid").val());
        formData.append('sname', $("#sname").val());
        formData.append('sgrade', $("#sgrade").val());
        formData.append('sguardian', $("#sguardian").val());
        formData.append('semail', $("#semail").val());
        formData.append('snum', $("#snum").val());
        formData.append('simg', $("#simg")[0].files[0]);

        $.ajax({
            type: "POST",
            url: "backend/sreg.php",
            data: formData,
            contentType: false, 
            processData: false, 
            dataType: "json",
        }).done((data) => {
            if(data.error_type != "none"){

                $('#error_dialog').css("display", "block")
                $('#error').text(data.error)

                setTimeout(()=>{
                    $('#error_dialog').css("display", "none")
                    $("#sid").val("")
                    $("#sname").val("")
                    $("#sgrade").val("")
                    $("#sguardian").val("")
                    $("#semail").val("")
                    $("#snum").val("")
                    $("#simg").after($("#simg").clone())
                    $("#simg").remove()
                    window.location.href =`?page=reg_home`
                }, 3000)
                return
            }

            $('#success_dialog').css("display", "block")
            $('#success').text(data.response)

            setTimeout(()=>{
                $('#success_dialog').css("display", "none")
                $("#sid").val("")
                $("#sname").val("")
                $("#sgrade").val("")
                $("#sguardian").val("")
                $("#semail").val("")
                $("#snum").val("")
                $("#simg").after($("#simg").clone())
                $("#simg").remove()
                window.location.href =`?page=reg_home`
            }, 3000)

        }).fail((jqXHR, textStatus, errorThrown) => {
            console.error("AJAX Error:", errorThrown);
        });
    });
});