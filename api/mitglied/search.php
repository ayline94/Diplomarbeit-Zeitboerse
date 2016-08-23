<?php
include ("../connect.php");

$sql = "SELECT * FROM mitglieder WHERE vorname LIKE '%".$_POST["search"]."%' OR nachname LIKE '%".$_POST["search"]."%'";
$result = mysqli_query($connect, $sql);

include ("show-part.php");

?>