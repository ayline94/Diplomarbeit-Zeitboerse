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

// Felder schützen & bearbeiten
$vorname = mysqli_real_escape_string($connect, $_POST["vorname"]);
$nachname = mysqli_real_escape_string($connect, $_POST["nachname"]);
$email = mysqli_real_escape_string($connect, $_POST["email"]);
$passwort = md5(mysqli_real_escape_string($connect, $_POST["passwort"])); // Passwort verschlüsseln
$profilbild = mysqli_real_escape_string($connect, $_POST["profilbild_pfad"]);
$datum = new DateTime(mysqli_real_escape_string($connect, $_POST["geburtsdatum"]));
$geburtsdatum = $datum->format('Y-m-d'); //
$strasse = mysqli_real_escape_string($connect, $_POST["strasse"]);
$plz = mysqli_real_escape_string($connect, $_POST["plz"]);
$ort = mysqli_real_escape_string($connect, $_POST["ort"]);


// Felder in Datenbank schreiben
$sql = "INSERT
        INTO mitglieder(vorname, nachname, email, passwort, profilbild_pfad, geburtsdatum, strasse, plz, ort_id)
        VALUES('".$vorname."', '".$nachname."', '".$email."', '".$passwort."', '".$profilbild."', '".$geburtsdatum."', '".$strasse."', '".$plz."', '".$ort."')";

// Rückmeldung Benutzer
if(mysqli_query($connect, $sql))
{
    echo 'Ihre Registrierung war erfolgreich';
} else {
    echo 'Fehler beim hinzufügen des Mitglieds' ;
}

mysqli_close($connect);

?>
