<?php
include ("../connect.php");

$sql = "SELECT * FROM angebot WHERE titel LIKE '%".$_POST["search"]."%'";
$result = mysqli_query($connect, $sql);

include ("show-part.php");

?>