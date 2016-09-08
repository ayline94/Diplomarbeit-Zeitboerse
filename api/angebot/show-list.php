<?php
include ("../connect.php");

$sql = "SELECT * FROM angebot ORDER BY id DESC";
$result = mysqli_query($connect, $sql );

$output= '';
include ("show-part.php");

mysqli_close($connect);
?>


