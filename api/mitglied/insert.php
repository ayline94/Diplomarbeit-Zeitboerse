<?php
include ("../connect.php");

$email = mysqli_real_escape_string($connect, $_POST["email"]); // unterschied herausfinden
$email1 = $_POST["email"]; // Unterschied herausfinden

$passwort = md5(mysqli_real_escape_string($connect, $_POST["passwort"])); // Passwort verschlüsseln

$sql = "INSERT INTO mitglieder(vorname, nachname, email, passwort) VALUES('".$_POST["vorname"]."', '".$_POST["nachname"]."', '".$email."', '".$passwort."')";

if(mysqli_query($connect, $sql))
{
    echo 'Neues Mitglied wurde hinzugefügt';
} else {
    echo 'Fehler beim hinzufügen des Mitglieds';
}

mysqli_close($connect);

?>