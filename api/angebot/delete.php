<?php
include ("../connect.php");
if(mysqli_query($connect, "DELETE FROM angebot WHERE id = '".$_POST["id"]."'"))
{
    echo 'Das Angebot wurde Gelöscht';
} else {
    echo 'Fehler beim Löschen des Angebots';
}

mysqli_close($connect);

?>