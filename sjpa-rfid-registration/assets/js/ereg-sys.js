$(document).ready(() => {

    $(window).on('pageshow', function(event) {
        var form = $('#ereg_form');
        if (event.originalEvent.persisted) {
          form[0].reset();
        }
      });
    
    let urlParams = new URLSearchParams(window.location.search);
    let rfid = urlParams.get('rfid');

    if(rfid == ""){
        window.location.href =`?`
    }
    

    $("#ereg_form").on("submit", (e) => {
        e.preventDefault(); // Prevent the default form submission
        
        let formData = new FormData();
        formData.append('erfid', rfid);
        formData.append('eid', $("#eid").val());
        formData.append('ename', $("#ename").val());
        formData.append('edept', $("#edept").val());
        formData.append('epos', $("#epos").val());
        formData.append('eemail', $("#eemail").val());
        formData.append('enum', $("#enum").val());
        formData.append('eimg', $("#eimg")[0].files[0]);

        $.ajax({
            type: "POST",
            url: "backend/ereg.php",
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
                    $("#eid").val("")
                    $("#ename").val("")
                    $("#edept").val("")
                    $("#epos").val("")
                    $("#eemail").val("")
                    $("#enum").val("")
                    $("#eimg").after($("#eimg").clone())
                    $("#eimg").remove()
                    window.location.href =`?page=reg_home`
                }, 3000)
                return
            }

            $('#success_dialog').css("display", "block")
            $('#success').text(data.response)

            setTimeout(()=>{
                $('#success_dialog').css("display", "none")
                $("#eid").val("")
                $("#ename").val("")
                $("#edept").val("")
                $("#epos").val("")
                $("#eemail").val("")
                $("#enum").val("")
                $("#eimg").after($("#eimg").clone())
                $("#eimg").remove()
                window.location.href =`?page=reg_home`
            }, 3000)

        }).fail((jqXHR, textStatus, errorThrown) => {
            console.error("AJAX Error:", errorThrown);
        });
    });
});