<!-- php nicht vergessen

session_start();
if(!isset($_SESSION["email"]))
{
    header("location: index.php");
}
?>
-->

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Zeitbörse Gemeinschaft Rheintal</title>
    <link rel="stylesheet" type="text/css" href="css/foundation.min.css">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="mitglieder.js"></script>
    <script src="angebot.js"></script>
    <?php
        include("api/angebot/functions.php");
    ?>

</head>

<body>

<div class="row">

    <ul class="menu">
        <li><a href="angebot.php">Angebot</a></li>
        <li><a href="suchanfrage.php">Suchanfrage</a></li>
        <li><a href="mitglieder.php">Mitgliederliste</a></li>
        <li><a href="benutzer.php">Benutzeraccount</a></li>
        <li><a href="logout.php">Abmelden</a></li>
    </ul>

</div>


