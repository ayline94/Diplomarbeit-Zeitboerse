<?php
include ("../connect.php");

// Felder prüfen
if($_POST["vorname"] == '' || $_POST["nachname"] == '' || $_POST["email"] == '' || $_POST["passwort"] == '' || $_POST["geburtsdatum"] == '' || $_POST["strasse"] == '' || $_POST["plz"] == '' || $_POST["ort"] == '')
{
    echo "Bitte alle Felder ausfüllen";
    return false;
}

// Profilbild prüfen
if($_POST["profilbild_pfad"] == '')
{
    echo "Bitte Profilbild auswählen & hochladen";
    return false;
}




// Felder definieren oder bearbeiten
$email = mysqli_real_escape_string($connect, $_POST["email"]); // unterschied herausfinden
$email1 = $_POST["email"]; // Unterschied herausfinden

$passwort = md5(mysqli_real_escape_string($connect, $_POST["passwort"])); // Passwort verschlüsseln
$profilbild = $_POST["profilbild_pfad"];

// Felder in Datenbank schreiben
$sql = "INSERT INTO mitglieder(vorname, nachname, email, passwort, profilbild_pfad, geburtsdatum, strasse, plz, ort) VALUES('".$_POST["vorname"]."', '".$_POST["nachname"]."', '".$email."', '".$passwort."', '".$profilbild."', '".$_POST["geburtsdatum"]."', '".$_POST["strasse"]."', '".$_POST["plz"]."', '".$_POST["ort"]."')";

// Rückmeldung Benutzer
if(mysqli_query($connect, $sql))
{
    echo 'Ihre Registrierung war erfolgreich';
} else {
    echo 'Fehler beim hinzufügen des Mitglieds' ;
}

mysqli_close($connect);

?>
