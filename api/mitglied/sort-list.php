<?php
include ("../connect.php");

$sql = "SELECT * FROM mitglieder ORDER BY vorname ".$_POST["sortierung_vorname"];
$result = mysqli_query($connect, $sql );

include ("show-part.php");

?>


