<?php
include ("../connect.php");

// Felder prüfen
/* if($_POST["beschreibung"] == '' || $_POST["plz"] == '' || $_POST["ort"] == '' ||
    $_POST["vonDatum"] == '' || $_POST["bisDatum"] == '' ||
    $_POST["geschaetzterAufwand"] == '' || $_POST["erledigt"] == '') */
if($_POST["beschreibung"] == '')
{
    echo "Bitte alle Felder ausfüllen";
    return false;
}
else {
    echo "Beschreibung ist abgefüllt";
}

// Datum umwandeln und systemdatum in erstelltAm
/*
// Felder in Datenbank schreiben
$sql = "INSERT INTO angebot(beschreibung, detailBeschreibung, detailBeschreibungBild1_pfad, detailBeschreibungBild2_pfad, plz, ort,
        vonDatum, bisDatum, geschaetzterAufwand, erstelltAm, erledigt, zeitgebrauch)
        VALUES('".$_POST["kategorie"]."', '".$_POST["beschreibung"]."', '".$_POST["detailBeschreibung"]."', '".$_POST["detailBeschreibungBild1_pfad"]."',
               '".$_POST["detailBeschreibungBild2_pfad"]."', '".$_POST["plz"]."', '".$_POST["ort"]."', '".$_POST["vonDatum"]."', '".$_POST["bisDatum"]."',
               '".$_POST["geschaetzterAufwand"]."', '".$_POST["erstelltAm"]."', '".$_POST["erledigt"]."', '".$_POST["zeitgebrauch"]."')";
*/

// Felder in Datenbank schreiben
$sql = "INSERT INTO angebot(beschreibung)
        VALUES('".$_POST["beschreibung"]."')";


// Rückmeldung Benutzer
if(mysqli_query($connect, $sql))
{
    echo 'Ihr Angebot wurde erfolgreich gespeichert';
} else {
    echo 'Fehler beim hinzufügen des Angebots' ;
}

mysqli_close($connect);

?>
