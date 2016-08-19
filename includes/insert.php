<?php
include ("connect.php");
$sql = "INSERT INTO mitglieder(vorname, nachname) VALUES('".$_POST["vorname"]."', '".$_POST["nachname"]."')";
if(mysqli_query($connect, $sql))
{
    echo 'Neues Mitglied wurde hinzugefügt';
} else {
    echo 'Fehler beim hinzufügen des Mitglieds';
}
?>