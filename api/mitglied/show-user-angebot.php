<?php
session_start();

include ("../connect.php");
require("functions.php");

// Benutzerdaten von aktueller Session anzeigen
$id = getId($_SESSION['email']);
$mitgliederData = getUserData($id);

$id = $mitgliederData['id'];

// Angebote des Benuters laden

$sql = "SELECT * FROM angebot WHERE mitglieder_id = '".$id."'   ";
$result = mysqli_query($connect, $sql);

// Angebote des Benuters ausgeben

include ("../angebot/show-part.php");



mysqli_close($connect);




?>