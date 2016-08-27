<?php
include ("../connect.php");


// ???????? Funktion um über email an Id zu gelangen
function getId($email){
    $connect = mysqli_connect("localhost","root","root","zeitboerse");

    $sql = 'SELECT id FROM angebot WHERE email = "'.$email.'"';
    $result = mysqli_query($connect, $sql );
    while($row = mysqli_fetch_assoc($result)){
        return $row['id'];
    }
}

// Funktion um über ID an Angebote Daten zu gelangen
function getAngebotData($id){
    $array = array();
    $connect = mysqli_connect("localhost","root","root","zeitboerse");
    $result = mysqli_query($connect, "SELECT * FROM angebot WHERE id =".$id);
    while ($row = mysqli_fetch_assoc($result)){
        $array['id'] = $row['id'];
        $array['kategorie'] = $row['kategorie'];
        $array['beschreibung'] = $row['beschreibung'];
        $array['detailBeschreibung'] = $row['detailBeschreibung'];
        $array['detailBeschreibungBild1_pfad'] = $row['detailBeschreibungBild1_pfad'];
        $array['detailBeschreibungBild2_pfad'] = $row['detailBeschreibungBild2_pfad'];
        $array['plz'] = $row['plz'];
        $array['ort'] = $row['ort'];
        $array['vonDatum'] = $row['vonDatum'];
        $array['bisDatum'] = $row['bisDatum'];
        $array['geschaetzterAufwand'] = $row['geschaetzterAufwand'];
        $array['erstelltAm'] = $row['erstelltAm'];
        $array['erledigt'] = $row['erledigt'];
        $array['zeitgrbrauch'] = $row['zeitgebrauch'];
    }
    return $array;
}
?>