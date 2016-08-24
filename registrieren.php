<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Zeitbörse Gemeinschaft Rheintal</title>
    <link rel="stylesheet" type="text/css" href="css/foundation.min.css">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="mitglieder.js"></script>

</head>

<body>
<div class="row">

    <div class="column small-12">
        <h2>Registrieren</h2>
    </div>

    <div class="column small-6">
        <label for="vorname">Vorname:</label>
        <input type="text" id="vorname">
        <label for="nachname">Nachname:</label>
        <input type="text" id="nachname">
        <label for="email">Email</label>
        <input type="email" id="email">
        <span id="availability"></span>
        <label for="passwort">Passwort</label>
        <input type="password" id="passwort">

        <button type="button" name="btn_add_mitglied" id="btn_add_mitglied" class="success button">hinzufügen</button>
    </div>

    <div class="column small-6">

        <form id="form_upload_bild" action="upload.php" method="post">
            <label for="profilbild">Bild Auswahl - jpg, jpeg, png </label>
            <input type="file" name="file" id="profilbild" />
            <input type="submit" name="bild_upload_button" class="button" value="hochladen & anzeigen" />
        </form>
        <br />
        <div id="bild_vorschau">
        </div>

    </div>


    <div class="column small-12">
        <h2>Mitgliederliste</h2>
        <div id="showData"></div>
    </div>


<?php include('footer.php'); ?>