<?php
include ("../connect.php");

$sql = "SELECT * FROM angebot ORDER BY id DESC";
$result = mysqli_query($connect, $sql );

include ("show-part.php");

?>