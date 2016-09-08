<?php
session_start();
include ("../connect.php");
require("functions.php");



// Benutzerid von aktueller Session anzeigen

$id = $_GET['id'];


// Angebote des Benuters laden

$sql = "SELECT * FROM angebot WHERE mitglieder_id = '".$id."'   ";
$result = mysqli_query($connect, $sql);

// Angebote des Mitglieds ausgeben
include ("../angebot/show-part.php");



mysqli_close($connect);

?>
