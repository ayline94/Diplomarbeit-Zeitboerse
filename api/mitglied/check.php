<?php
include ("../connect.php");

if(isset($_POST["email"])) {
    $sql = "SELECT * FROM mitglieder WHERE email = '".$_POST["email"]."'";
    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        echo '<span class="callout alert">E-Mail bereits vergeben</span>';
    }

    $email = ($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        echo '<span class="callout alert">E-Mail ungültig</span>';
    }
}


?>


