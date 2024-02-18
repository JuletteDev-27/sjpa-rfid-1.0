$(document).ready(()=>{
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

        var data = new FormData();
        data.append('rfid', $("#rfid").val());

            $.ajax({
                type: "POST",
                url: "backend/del_rfid.php",
                data: data,
                contentType: false, 
                processData: false, 
                dataType: "json",
            }).done((data)=>{
                $('#success_dialog').css("display", "block")
                $('#success').text(data.response)

                setTimeout(()=>{
                    $('#success_dialog').css("display", "none")
                    location.reload()
                },1000)
            }).fail((jqXHR, textStatus, errorThrown) => {
                // console.error("AJAX Error:", errorThrown);
                console.log(jqXHR.responseText);
            });
        e.preventDefault()
    })
})