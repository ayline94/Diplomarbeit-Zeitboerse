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

        // Definition Felder
        var vorname = $('#vorname').val();
        var nachname = $('#nachname').val();
        var email = $('#email').val();
        var passwort = $('#passwort').val();
        var geburtsdatum = $('#geburtsdatum').val();
        var strasse = $('#strasse').val();
        var plz = $('#plz').val();
        var ort = $('#ort').val();
        var profilbild = $('.profilbild').data("path");

        $.ajax({
            url:"api/mitglied/insert.php",
            method:"POST",
            data:{
                vorname:vorname,
                nachname:nachname,
                email:email,
                passwort:passwort,
                geburtsdatum:geburtsdatum,
                strasse:strasse,
                plz:plz,
                ort:ort,
                profilbild_pfad:profilbild
            },
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








    //-------- Mitglieder Detailansicht -----------------//


    // Detailansicht Mitglied anzeigen
    function showMitgliedDetail()
    {
        $.ajax({
            url:"api/mitglied/show-detail.php",
            method:"POST",
            success:function(data){
                $('#showMitgliedDetail').html(data);
            }
        });
    }
    showMitgliedDetail();


    // Detailansicht Mitglied - Bearbeitungsmodus
    $('#editMitglied').on('click', function(){

        $('.benutzerdaten').addClass('edit');
        $('.edit').attr("contenteditable","true");

        // Save & Delete Button einblenden
        $('#saveMitglied').removeClass('hide');
        $('#deleteMitglied').removeClass('hide');
        $('#editMitglied').addClass('hide');

    });


    // Detailansicht Mitglied - Änderungen speichern
    $('#saveMitglied').on('click', function(){

        var id = $('.benutzerinfo').data('id');
        var vorname = $('.vorname').text();
        var nachname = $('.nachname').text();
        var email = $('.email').text();
        //var passwort = $('.passwort').text();
        var geburtsdatum = $('.geburtsdatum').text();
        var strasse = $('.strasse').text();
        var plz = $('.plz').text();
        var ort = $('.ort').text();
        //var profilbild = $('.profilbild').data("path");

        $('.edit').attr('contenteditable','false');

        $.ajax({
            url:"api/mitglied/edit.php",
            method:"POST",
            data:{
                id:id,
                vorname:vorname,
                nachname:nachname,
                email:email,
                //passwort:passwort,
                geburtsdatum:geburtsdatum,
                strasse:strasse,
                plz:plz,
                ort:ort
                //profilbild_pfad:profilbild
            },
            dataType:"text",
            success:function(data)
            {
                alert(data);
                showData();

                $('.benutzerdaten').removeClass('edit');
                $('#editMitglied').removeClass('hide');
                $('#saveMitglied').addClass('hide');
                $('#deleteMitglied').addClass('hide');
            }

        })

    });

    // Detailansicht Mitglied Löschen
    $(document).on('click', '.deleteMitglied', function(){
        var id = $('.benutzerinfo').data('id');
        if(confirm("Willst du deinen Benutzeraccount wirklich löschen?"))
        {
            $.ajax({
                url:"api/mitglied/delete.php",
                method:"POST",
                data:{id:id},
                dataType:"text",
                success:function(data){
                    alert(data);

                    if(data=='Dein Account wurde Gelöscht'){
                        $("body").load("index.php").hide().fadeIn(1500);

                    }
                }
            });
        }
    });








});