<?php
include ("../connect.php");

$sql = "SELECT * FROM ort ORDER BY titel DESC";
$result = mysqli_query($connect, $sql );

$output = '';
//$sql = "SELECT * FROM tbl_state where country_id = '".$_POST["countryId"]."' ORDER BY state_name";

$output = '<option value="">Ort auswählen</option>';
while($row = mysqli_fetch_array($result))
{
    $output .= '<option value="'.$row["id"].'">'.$row["titel"].'</option>';
}
echo $output;
?>



