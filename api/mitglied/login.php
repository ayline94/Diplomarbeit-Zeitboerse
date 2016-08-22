<?php
session_start();

include ("../connect.php");

if(isset($_POST["email"]) && isset($_POST["passwort"]))
{
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
    $passwort = md5(mysqli_real_escape_string($connect, $_POST["passwort"]));
    $sql = "SELECT * FROM mitglieder WHERE email = '".$email."' AND passwort = '".$passwort."'";
    $result = mysqli_query($connect, $sql);
    $num_row = mysqli_num_rows($result);
    if($num_row > 0)
    {
        $data = mysqli_fetch_array($result);
        $_SESSION["email"] = $data["email"];
        echo $data["email"];
    }
}
?>
