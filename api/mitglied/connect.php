<?php
// Verbindung zu DB herstellen
$connect = mysqli_connect("localhost","root","root","zeitboerse"); //or die("Verbindung zu DB fehlgeschlagen");
// Verbindung prüfen
if (mysqli_connect_errno())
{
    echo "Verbindung zu MySQL fehlgeschlagen: " . mysqli_connect_error();
}

?>
