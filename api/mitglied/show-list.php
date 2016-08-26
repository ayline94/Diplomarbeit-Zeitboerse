<?php
include ("../connect.php");

$sql = "SELECT * FROM mitglieder ORDER BY id DESC";
$result = mysqli_query($connect, $sql );

include ("show-part.php");

?>


