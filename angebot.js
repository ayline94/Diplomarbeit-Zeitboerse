$(document).ready(function(){

     //------------- Angebot hinzufügen-------------------------//

    $(document).on('click', '#btn_add_angebot', function(){


        var beschreibung = $('#beschreibung').val();
        alert(beschreibung);

        $.ajax({
            url:"api/angebot/insert.php",
            method:"POST",
            data:{
                beschreibung:beschreibung
            },
            dataType:"text",
            success:function(data)
            {
                alert(data);
            }
        })
    });
});

