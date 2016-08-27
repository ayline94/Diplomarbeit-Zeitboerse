<?php
include ("../connect.php");
$id = $_POST["id"];
$vorname = $_POST["vorname"];
$nachname = $_POST["nachname"];
$email = $_POST["email"];
//$passwort = $_POST["passwort"];
$geburtsdatum = $_POST["geburtsdatum"];
$strasse = $_POST["strasse"];
$plz = $_POST["plz"];
$ort = $_POST["ort"];
//$profilbild_pfad = $_POST["profilbild_pfad"];

$sql = "UPDATE mitglieder SET vorname='".$vorname."' , nachname='".$nachname."' , email='".$email."', geburtsdatum='".$geburtsdatum."', strasse='".$strasse."', plz='".$plz."', ort='".$ort."'  WHERE id='".$id."'";
if(mysqli_query($connect, $sql))
{
    echo 'Mitglied wurde geändert';
} else {
    echo 'Fehler beim Ändern des Mitglieds';
}

mysqli_close($connect);

?>