<?php
include ("../connect.php");


// Funktion um über email an Id zu gelangen
function getId($email){
    $connect = mysqli_connect("localhost","root","root","zeitboerse01");

    $sql = 'SELECT id FROM mitglieder WHERE email = "'.$email.'"';
    $result = mysqli_query($connect, $sql );
    while($row = mysqli_fetch_assoc($result)){
        return $row['id'];
    }
}




// Funktion um über ID an Mitglieder Daten zu gelangen
function getUserData($id){

    $array = array();
    $connect = mysqli_connect("localhost","root","root","zeitboerse01");
    $result = mysqli_query($connect, "SELECT * FROM mitglieder WHERE id =".$id);
    while ($row = mysqli_fetch_assoc($result)){
        $array['id'] = $row['id'];
        $array['vorname'] = $row['vorname'];
        $array['nachname'] = $row['nachname'];
        $array['email'] = $row['email'];
        $array['passwort'] = $row['passwort'];
        $array['geburtsdatum'] = $row['geburtsdatum'];
        $array['strasse'] = $row['strasse'];
        $array['plz'] = $row['plz'];
        $array['ort'] = $row['ort'];
        $array['profilbild_pfad'] = $row['profilbild_pfad'];
    }
    return $array;

}



?>