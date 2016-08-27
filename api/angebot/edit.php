<?php
include ("../connect.php");
$id = $_POST["id"];
$kategorie = $_POST["kategorie"];
$beschreibung = $_POST["beschreibung"];
$detailBeschreibung = $_POST["detailBeschreibung"];
$detailBeschreibungBild1_pfad = $_POST["detailBeschreibungBild1_pfad"];
$detailBeschreibungBild2_pfad = $_POST["detailBeschreibungBild2_pfad"];
$plz = $_POST["plz"];
$ort = $_POST["ort"];
$vonDatum = $_POST["vonDatum"];
$bisDatum = $_POST["bisDatum"];
$geschaetzterAufwand = $_POST["geschaetzterAufwand"];
$erstelltAm = $_POST["erstelltAm"];
$erledigt = $_POST["erledigt"];
$zeitgebrauch = $_POST["zeitgebrauch"];


$sql = "UPDATE angebot SET kategorie='".$kategorie."' , beschreibung='".$beschreibung."' , detailBeschreibung='".$detailBeschreibung."' , 
          $detailBeschreibungBild1_pfad='".$detailBeschreibungBild1_pfad."' , detailBeschreibungBild2_pfad='".$detailBeschreibungBild2_pfad."' , 
          plz='".$plz."' , ort='".$ort."' , vonDatum='".$vonDatum."' , bisDatum='".$bisDatum."' , geschaetzterAufwand='".$geschaetzterAufwand."' ,
          erstelltAm='".$erstelltAm."' , erledigt='".$erledigt."' , zeitgebrauch='".$zeitgebrauch."' WHERE id='".$id."'";

if(mysqli_query($connect, $sql))
{
    echo 'Angebot wurde geändert';
} else {
    echo 'Fehler beim Ändern des Angebots';
}

mysqli_close($connect);

?>