<?php
include ("connect.php");
if(mysqli_query($connect, "DELETE FROM mitglieder WHERE id = '".$_POST["id"]."'"))
{
    echo 'Mitglied wurde gelöscht';
} else {
    echo 'Fehler beim löschen des Mitglieds';
}
?>