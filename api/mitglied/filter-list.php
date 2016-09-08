<?php
include ("../connect.php");


$sql = "SELECT * FROM mitglieder WHERE ort_id = '".$_POST["ort_id"]."' ";
$result = mysqli_query($connect, $sql );

include ("show-part.php");

?>


