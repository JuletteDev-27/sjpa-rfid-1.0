$(document).ready(()=>{

    $("#end_date").on("change", (e)=>{
        if($("#start_date").val() > $("#end_date").val()){
            $("#end_date").val($("#start_date").val())
            console.log($("#end_date").val())
        }
        e.preventDefault()
    })

    $("#genex_form").on("submit", (e)=>{

        var data = new FormData()
        data.append("att_type", $("#ex_type").val())
        data.append("start_date", $("#start_date").val())
        data.append("end_date", $("#end_date").val())

        $.ajax({
            type: "POST",
            url: "backend/gen_generate_excel.php",
            data: data,
            contentType: false, 
            processData: false, 
            dataType: "json",
        }).done((data)=>{
            console.log(data)
        }).fail((jqXHR, textStatus, errorThrown) => {
            console.error("AJAX Error:", jqXHR.responseText);
        });
        
        e.preventDefault()
    })
})