<?php
include ("../connect.php");
if(mysqli_query($connect, "DELETE FROM mitglieder WHERE id = '".$_POST["id"]."'"))
{
    echo 'Dein Account wurde Gelöscht';
} else {
    echo 'Fehler beim Löschen des Mitglieds';
}

mysqli_close($connect);

?>