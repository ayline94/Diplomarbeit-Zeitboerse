<?php
include ("connect.php");
$id = $_POST["id"];
$text = $_POST["text"];
$column_name = $_POST["column_name"];
if(mysqli_query($connect, "UPDATE mitglieder SET ".$column_name."='".$text."' WHERE id='".$id."'"))
{
    echo 'Mitglied wurde geändert';
} else {
    echo 'Fehler beim Ändern des Mitglieds';
}
?>