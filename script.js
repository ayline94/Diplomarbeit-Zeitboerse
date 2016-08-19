$(document).ready(function(){

    // Mitglieder anzeigen
    function showData()
    {
        $.ajax({
            url:"api/mitglied/show.php",
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
            url:"api/mitglied/insert.php",
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

    // Mitglied löschen
    $(document).on('click', '.btn_delete', function(){
        var id=$(this).data("id3");
        if(confirm("Möchtest du dieses Mitglied wirklich löschen?"))
        {
            $.ajax({
                url:"api/mitglied/delete.php",
                method:"POST",
                data:{id:id},
                dataType:"text",
                success:function(data){
                    alert(data);
                    showData();
                }
            });
        }
    });

    // Mitglied bearbeiten

    function edit_data(id, text, column_name)
    {
        $.ajax({
            url:"api/mitglied/edit.php",
            method:"POST",
            data:{id:id, text:text, column_name:column_name},
            dataType:"text",
            success:function(data){
                alert(data);
            }
        });
    }
    $(document).on('blur', '.vorname', function(){
        var id = $(this).data("id1");
        var vorname = $(this).text();
        edit_data(id, vorname, "vorname");
    });
    $(document).on('blur', '.nachname', function(){
        var id = $(this).data("id2");
        var nachname = $(this).text();
        edit_data(id,nachname, "nachname");
    });


});