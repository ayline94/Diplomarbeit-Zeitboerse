$(document).ready(function(){

    // Mitglieder anzeigen
    function showData()
    {
        $.ajax({
            url:"includes/show.php",
            method:"POST",
            success:function(data){
                $('#showData').html(data);
            }
        });
    }
    showData();

    // Mitglieder hinzufügen
    $(document).on('click', '#btn_add', function(){
        var vorname = $('#vorname').val();
        var nachname = $('#nachname').val();
        if(vorname == '')
        {
            alert("Bitte Vorname eingeben");
            return false;
        }
        if(nachname == '')
        {
            alert("Bitte Nachnamen eingeben");
            return false;
        }
        $.ajax({
            url:"includes/insert.php",
            method:"POST",
            data:{vorname:vorname, nachname:nachname},
            dataType:"text",
            success:function(data)
            {
                alert(data);
                showData();
            }
        })
    });

});