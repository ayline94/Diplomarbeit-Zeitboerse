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


    //------------- Mitglieder registrieren-------------------------//



    // Formular Daten in DB schreiben
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
                profilbild:profilbild
            },
            dataType:"text",
            success:function(data)
            {
                alert(data);
                if(data=='Ihre Registrierung war erfolgreich'){
                    $("body").load("index.php").hide().fadeIn(1500);

                }
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

    //------------- Mitgliederliste -------------------------//


    // Mitglieder anzeigen
    function displayMitgliederListe()
    {
        $.ajax({
            url:"api/mitglied/show-list.php",
            method:"POST",
            success:function(data){
                $('#mitgliederliste').html(data);
            }
        });
    }
    displayMitgliederListe();

    // Mitglied suchen
    $('#search_mitglied').keyup(function(){
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
                    $('#mitgliederliste').html(data);
                }
            });
        }
        else
        {
            displayMitgliederListe();
        }
    });

    // Mitgliederliste ort filtern

    $('#filter_ort').change(function(){
        var ort_id = $(this).val();
        if(ort_id != 0) {
            $.ajax({
                url: "api/mitglied/filter-list.php",
                method: "POST",
                data: {ort_id: ort_id},
                dataType: "text",
                success: function (data) {
                    $('#mitgliederliste').html(data);
                }
            });
        }
        else
        {
            // Alle Anzeigen
            displayMitgliederListe();
        }
    });

    // Vorname sortieren
    $(document).on('change', '#filter_vorname', function(){
        var sortierung_vorname = $(this).val();
        if(sortierung_vorname != 0) {
            $.ajax({
                url: "api/mitglied/sort-list.php",
                method: "POST",
                data: {sortierung_vorname: sortierung_vorname},
                dataType: "text",
                success: function (data) {
                    $('#mitgliederliste').html(data);
                }
            });
        }
        else
        {
            // Standardsortierung
            displayMitgliederListe();
        }
    });




    //-------- Mitglied Detailansicht -----------------//


    // Detailansicht Mitglied anzeigen
    function showMitgliedDetail(id)
    {
        $.ajax({
            url:"api/mitglied/show-detail.php",
            method:"GET",
            data: {
                id:id

            },
            success:function(data){
                $('#showMitgliedDetail').html(data);
            }
        });

        $.ajax({
            url:"api/mitglied/show-detail-angebot.php",
            method:"GET",
            data: {
                id:id

            },
            success:function(data){
                $('#showMitgliedAngebot').html(data);
            }
        });
    }
    showMitgliedDetail(getParam('id'));

    //-------- Benutzerkonto -----------------//


    // Detailansicht Mitglied anzeigen
    function showUser()
    {
        $.ajax({
            url:"api/mitglied/show-user.php",
            method:"POST",
            success:function(data){
                $('#showUser').html(data);
            }
        });

        $.ajax({
            url:"api/mitglied/show-user-angebot.php",
            method:"POST",
            success:function(data){
                $('#listeAngebotUser').html(data);
            }
        });

    }
    showUser();


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
                //profilbild:profilbild
            },
            dataType:"text",
            success:function(data)
            {
                alert(data);

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


//----------- Allgemeine Funktionen------------------------//


// Datepicker
$( function() {
    $( "#geburtsdatum" ).datepicker({
        dateFormat: "dd.mm.yy",
        firstDay: 1,
        maxDate: "0",
        monthNames: [ "Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember" ],
        monthNamesShort: [ "Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez" ],
        dayNames: [ "Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag" ],
        dayNamesMin: [ "So", "Mo", "Di", "Mi", "Do", "Fr", "Sa" ],
        changeMonth: true,
        changeYear: true,
        showAnim:"slide"

    });
} );



