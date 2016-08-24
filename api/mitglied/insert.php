<?php
include ("../connect.php");

// Felder definieren oder bearbeiten
$email = mysqli_real_escape_string($connect, $_POST["email"]); // unterschied herausfinden
$email1 = $_POST["email"]; // Unterschied herausfinden
$passwort = md5(mysqli_real_escape_string($connect, $_POST["passwort"])); // Passwort verschlüsseln
$profilbild = $_POST["profilbild"];

// Felder in Datenbank schreiben
$sql = "INSERT INTO mitglieder(vorname, nachname, email, passwort, profilbild_pfad) VALUES('".$_POST["vorname"]."', '".$_POST["nachname"]."', '".$email."', '".$passwort."', '".$profilbild."')";

// Rückmeldung Benutzer
if(mysqli_query($connect, $sql))
{
    echo 'Neues Mitglied wurde hinzugefügt';
} else {
    echo 'Fehler beim hinzufügen des Mitglieds';
}

mysqli_close($connect);

?>