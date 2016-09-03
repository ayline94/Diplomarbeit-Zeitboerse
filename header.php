<?php
session_start();
if(!isset($_SESSION["email"]))
{
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Zeitbörse Gemeinschaft Rheintal</title>
    <meta charset="UTF-8">
    <meta name="description" content=" Die Zeitbörse Rheintal">
    <link rel="stylesheet" type="text/css" href="css/foundation.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/app.css">
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


