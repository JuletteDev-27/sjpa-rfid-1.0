$(document).ready(()=>{
    
    let action = "";
    let wait_modal = document.getElementById("wait_dialog");
    $("#log_in").blur()
    $("#log_out").blur()

    $(document).on('keyup', (e) => {
    const modal = $('#ini_modal');
    if (modal.is(':visible') && e.key === 'Enter') {
        e.preventDefault();
    }})
        
    $("#log_in").click((e)=>{
        action = "IN"
        $("#rfid_pbox").focus();
        ini_modal.close();
        $("#ini_modal").css("display","none")
    })

    $("#log_out").click((e)=>{
        action="OUT"
        $("#rfid_pbox").focus();
        ini_modal.close();
        $("#ini_modal").css("display","none")
    })

    $("#return").on("click", (e)=>{
        $("#ini_modal").css("display","flex")
        $("#rfid_pbox").val(""),
        e.preventDefault()
    })

    $("#main_form").on("submit", (e)=>{
        wait_modal.showModal();
        let data = {
            rfid: $("#rfid_pbox").val(),
            action: action
        }

        $.ajax({
            type: "GET",
            url: "backend/rfid_process.php",
            data: data,
            dataType: "json",
            encode: true,
        }).done((data)=>{
            action=""
            if(data.error_type != 'none'){

                $("#error_dialog").css("display", "block")

                setTimeout(()=>{
                    $("#rfid_pbox").val("")
                    $("#error_dialog").css("display", "none")
                    $("#ini_modal").css("display","flex")
                }, 3000)
            }
            wait_modal.close();

            if (data.info_type == "E"){
                $("#employee_dialog").css("display", "block")
                $("#eimg").attr("src",`storage/employee_img/${data.eimg}`)
                $("#eid").val(data.eid)
                $("#ename").val(data.ename)
                $("#edept").val(data.edept)
                $("#epos").val(data.epos)

                setTimeout(()=>{
                    $("#rfid_pbox").val("")
                    $("#employee_dialog").css("display", "none")
                    $("#ini_modal").css("display","flex")
                }, 3000)
            }

            if (data.info_type == "S"){

                $("#student_dialog").css("display", "block")
                $("#simg").attr("src",`storage/student_img/${data.simg}`)
                $("#sid").val(data.sid)
                $("#sname").val(data.sname)
                $("#sgrade").val(data.sgrade)

                setTimeout(()=>{
                    $("#rfid_pbox").val("")
                    $("#student_dialog").css("display", "none")
                    $("#ini_modal").css("display","flex")
                }, 3000)
            }
        }).fail((jqXHR, textStatus, errorThrown) => {
            console.error("AJAX Error:", errorThrown);
        });

        e.preventDefault()
    })

    function updateClock() {
        const currentTime = new Date();
        let hours = currentTime.getHours();
        const minutes = currentTime.getMinutes();
    
        const amPM = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12 || 12; 
      
        const formattedHours = hours < 10 ? '0' + hours : hours;
        const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
      
        $('#time').text(formattedHours + ':' + formattedMinutes + ' ' + amPM);
      }
      
      setInterval(updateClock, 1000);

      updateClock();
})