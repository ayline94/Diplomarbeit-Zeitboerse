<?php
include ("../connect.php");
if(mysqli_query($connect, "INSERT INTO mitglieder(vorname, nachname) VALUES('".$_POST["vorname"]."', '".$_POST["nachname"]."')"))
{
    echo 'Neues Mitglied wurde hinzugefügt';
} else {
    echo 'Fehler beim hinzufügen des Mitglieds';
}

mysqli_close($connect);

?>