<?php

// Als Entwicklung
ini_set('display_errors', true);

// Verbindung zu DB herstellen
$connect = mysqli_connect("localhost","root","root","zeitboerse01");

// Verbindung prüfen
if (mysqli_connect_errno())
{
    echo "Verbindung zu MySQL fehlgeschlagen: " . mysqli_connect_error();
}

?>
