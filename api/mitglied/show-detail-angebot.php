<?php
session_start();
include ("../connect.php");
require("../functions.php");

// Alle Variablen mit leerem Wert definieren
$name = $vorname = $email = $passwort = $profilbild = $datum = $gender = $comment = $website = "";

// Sonderzeichen die für eine MYSQL Abfrage relevant sind entfernen
$vorname = mysqli_real_escape_string($connect, $_POST["vorname"]);
$nachname = mysqli_real_escape_string($connect, $_POST["nachname"]);
$email = mysqli_real_escape_string($connect, $_POST["email"]);
$profilbild = mysqli_real_escape_string($connect, $_POST["profilbild"]);
$datum = new DateTime(mysqli_real_escape_string($connect, $_POST["geburtsdatum"]));
$geburtsdatum = $datum->format('Y-m-d'); //
$strasse = mysqli_real_escape_string($connect, $_POST["strasse"]);
$plz = mysqli_real_escape_string($connect, $_POST["plz"]);
$ort = mysqli_real_escape_string($connect, $_POST["ort"]);


// prüfen ob Inhalt
if($vorname == '' || $nachname == '' || $email == '' || $geburtsdatum == '' || $strasse == '' || $plz == '' || $ort == '')
{
    echo "Bitte alle Felder ausfüllen";
    return false;
}

// Profilbild prüfen
if($profilbild == '')
{
    echo "Bitte Profilbild auswählen & hochladen";
    return false;
}

//Name Prüfen - Nur Buchstaben und Leerzeichen
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    echo "Nur Buchstaben & Leerzeichen erlaubt.";
    return false;
}
// E-Mail Prüfen
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Ungültiges E-Mail-Format";
    return false;
}

// Prüfen ob E-Mai bereits vorhanden
$sql = "SELECT * FROM mitglieder WHERE email = '".$_POST["email"]."'";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0)
{
    echo "E-Mail wird bereits verwendet";
    return false;
}


// Benutzerid von aktueller Session anzeigen

$id = $_GET['id'];


// Angebote des Benuters laden

$sql = "SELECT * FROM angebot WHERE mitglieder_id = '".$id."'   ";
$result = mysqli_query($connect, $sql);

// Angebote des Mitglieds ausgeben
include ("../angebot/show-part.php");



mysqli_close($connect);

?>
