$(document).ready(function(){

    // Anmelden
    $('#login').click(function(){
        var email = $('#email').val();
        var passwort = $('#passwort').val();

        if($.trim(email).length > 0 && $.trim(passwort).length > 0) // Weissraum entfernen & checken ob nicht leer
        {
            $.ajax({
                url:"api/mitglied/login.php",
                method:"POST",
                data:{email:email, passwort:passwort},
                cache: false,
                beforeSend:function()
                {
                    $('#login').val("Daten werden überprüft");
                },
                success:function(data)
                {
                    if(data)
                    {
                        $("body").load("benutzer.php").hide().fadeIn(1500);
                    }
                    else {

                        $("#error").fadeIn(500);
                        $('#login').val("Anmelden");
                    }
                }
            });
        }
        else
        {
            $("#error").fadeIn(500);
            return false;
        }
    });

    // Mitglieder - Prüfen ob Email bereits vorhanden & gültig
    $('#email').blur(function(){
        var email = $(this).val();
        $.ajax({
            url:"api/mitglied/check.php",
            method:"POST",
            data:{email:email},
            dataType:"text",
            success:function(data)
            {
                $('#availability').html(data);
            }
        });
    });


    //------------- Mitglieder hinzufügen-------------------------//

    $(document).on('click', '#btn_add_mitglied', function(){
        var vorname = $('#vorname').val();
        var nachname = $('#nachname').val();
        var email = $('#email').val();
        var passwort = $('#passwort').val();
        var profilbild = $('.profilbild').data("path");

        // Überprüfung der Felder

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
        if(email == '')
        {
            alert("Bitte Email eingeben");
            return false;
        }
        if(passwort == '')
        {
            alert("Bitte Passwort eingeben");
            return false;
        }

        if(profilbild == '')
        {
            alert("Bitte Passwort eingeben");
            return false;
        }


        $.ajax({
            url:"api/mitglied/insert.php",
            method:"POST",
            data:{vorname:vorname, nachname:nachname, email:email, passwort:passwort, profilbild:profilbild},
            dataType:"text",
            success:function(data)
            {
                alert(data);
                showData();
            }
        })
    });

    // Bild upload & anzeigen
    $('#form_upload_bild').on('submit', function(e){
        e.preventDefault(); // verhindert Default Event
        $.ajax({
            url:"upload_image.php",
            method:"POST",
            data:new FormData(this),
            contentType:false, //keinen Contentyp senden
            processData:false, // False da sonst als Obejekt gesendet, mit False wird es als string gesendet
            success:function(data)
            {
                $('#bild_vorschau').html(data);

            }
        })
    });
    //Bild löschen
    $(document).on('click', '#remove_button', function(){
        if(confirm("Bild wirklich löschen?"))
        {
            var path = $('.profilbild').data("path");
            $.ajax({
                url:"delete_image.php",
                type:"POST",
                data:{path:path},
                success:function(data){
                    if(data != '')
                    {
                        $('#bild_vorschau').html('');
                    }
                }
            });
        }
        else
        {
            return false;
        }
    });



    //------------- Mitglieder hinzufügen Ende -------------------------//


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

    // Mitglied suchen
    $('#search_text').keyup(function(){
        var txt = $(this).val();
        if(txt != '')
        {
            $.ajax({
                url:"api/mitglied/search.php",
                method:"post",
                data:{search:txt},
                dataType:"text",
                success:function(data)
                {
                    $('#showData').html(data);
                }
            });
        }
        else
        {
            showData();
        }
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