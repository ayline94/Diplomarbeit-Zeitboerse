<?php
session_start();

include ("../connect.php");
require("functions.php");

// Benutzerdaten von aktueller Session anzeigen
$id = getId($_SESSION['angebot']);
$angebotData = getAngebotData($id);

$id = $angebotData['id'];


// Tabellen mit Inhalt ausgeben
$output = '';
$output .= '
 <div class="small-5 columns">
            <img src="'.$angebotData["detailBeschreibungBild1_pfad"].'">
 </div>
  <div class="small-5 columns">
            <img src="'.$angebotData["detailBeschreibungBild2_pfad"].'">
 </div>
<div class="small-7 columns">
    <table class="angebot" data-id="'.$id.'">
        <tr>
            <th colspan="2" width="100%"><h3>Angebotinformationen</h3></th>
        </tr>
        <tr>
            <td>Kategorie</td>
            <td class="kategorie">'.$angebotData["kategorie"].'</td>
        </tr>
        <tr>
            <td>Beschreibung</td>
            <td class="beschreibung">'.$angebotData["beschreibung"].'</td>
        </tr>
        <tr>
            <td>Detail Beschreibung</td>
            <td class="detailBeschreibung">'.$angebotData["detailBeschreibung"].'</td>
        </tr>
        <tr>
            <td>Postleitzahl</td>
            <td class="plz">'.$angebotData["plz"].'</td>
        </tr>
        <tr>
            <td>Ortschaft</td>
            <td class="ort">'.$angebotData["ort"].'</td>
        </tr>
        <tr>
            <td>Datum von</td>
            <td class="vonDatum">'.$angebotData["vonDatum"].'</td>
        </tr>
        <tr>
            <td>Datum bis</td>
            <td class="bisDatum">'.$angebotData["bisDatum"].'</td>
        </tr>
        <tr>
            <td>Geschätzter Aufwand</td>
            <td class="geschaetzterAufwand">'.$angebotData["geschaetzterAufwand"].'</td>
        </tr>
        <tr>
            <td>Erstellt am</td>
            <td class="erstelltAm">'.$angebotData["erstelltAm"].'</td>
        </tr>
        <tr>
            <td>Erledigt</td>
            <td class="erledigt">'.$angebotData["erledigt"].'</td>
        </tr>
        <tr>
            <td>Zeitgebrauch</td>
            <td class="zeitgebrauch">'.$angebotData["zeitgebrauch"].'</td>
        </tr>
    </table>

</div>
    ';


// Meldung wenn keine Datensätze gefunden werden


// Tabelle ausgeben
echo $output;


mysqli_close($connect);

?>