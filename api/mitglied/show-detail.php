<?php
session_start();
include ("../connect.php");
require("../functions.php");

if(isset($_SESSION['email'])):

// Benutzerdaten von aktueller Session anzeigen

$id = $_GET['id'];
$mitgliederData = getUserData($id);


// Ort von Tabelle holen
$sql = "SELECT * FROM ort WHERE id = '".$mitgliederData['ort_id']."'";
$result_ort = mysqli_query($connect, $sql);
$rowOrt = mysqli_fetch_array($result_ort);


// Tabellen mit Inhalt ausgeben
$output = '';
$output .= '
 <div class="small-5 columns">
            <img src="'.$mitgliederData["profilbild_pfad"].'">
 </div>
<div class="small-7 columns">
    <table class="benutzerinfo" data-id="'.$id.'">
        <tr>
            <th colspan="2" width="100%"><h3>Benutzerinformationen</h3></th>
        </tr>
        <tr>
            <td>Vorname</td>
            <td class="vorname benutzerdaten">'.$mitgliederData["vorname"].'</td>
        </tr>
        <tr>
            <td>Nachname</td>
            <td class="nachname benutzerdaten">'.$mitgliederData["nachname"].'</td>
        </tr>
        <tr>
            <td>Ort</td>
            <td class="ort benutzerdaten">'.$rowOrt["name"].'</td>
        </tr>

    </table>

    <div id="map"></div>


    <a class="button" href="mailto:'.$mitgliederData["email"].'">Mitglied kontaktieren</a>

</div>
    ';


// Meldung wenn keine Datensätze gefunden werden


// Tabelle ausgeben
echo $output;

endif;

mysqli_close($connect);

?>