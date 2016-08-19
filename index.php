<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Zeitbörse Gemeinschaft Rheintal</title>
    <link rel="stylesheet" type="text/css" href="css/foundation.min.css">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="script.js"></script>
</head>

<body>
<div class="row">

    <div class="column small-12">
        <h2>Mitglied hinzufügen</h2>
        <label for="vorname">Vorname:</label>
        <input type="text" id="vorname">
        <label for="nachname">Nachname:</label>
        <input type="text" id="nachname">
        <button type="button" name="btn_add" id="btn_add" class="success button">hinzufügen</button>
    </div>

    <div class="column small-12">
        <h2>Mitgliederliste</h2>
        <div id="showData"></div>
    </div>




</div>
</body>
</html>