<?php
include ("../connect.php");

$sql = "SELECT * FROM angebot WHERE kategorie LIKE '%".$_POST["search"]."%' OR beschreibung LIKE '%".$_POST["search"]."%'";
$result = mysqli_query($connect, $sql);

include ("show-part.php");

?>