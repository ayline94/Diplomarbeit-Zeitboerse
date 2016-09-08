<?php
session_start();

include ("../connect.php");
require("../functions.php");

// Benutzerdaten von aktueller Session anzeigen
$id = getId($_SESSION['email']);
$mitgliederData = getUserData($id);

// Ort von Tabelle holen
$sql = "SELECT * FROM ort WHERE id = '".$mitgliederData['ort_id']."'   ";
$result = mysqli_query($connect, $sql);
$rowOrt = mysqli_fetch_array($result);

// Benutzerinformationen ausgeben
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
            <td>Email</td>
            <td class="email benutzerdaten">'.$mitgliederData["email"].'</td>
        </tr>
        <tr>
            <td>Geburtsdatum</td>
            <td class="geburtsdatum benutzerdaten">'.$mitgliederData["geburtsdatum"].'</td>
        </tr>
        <tr>
            <td>Strasse & Hausnummer</td>
            <td class="strasse benutzerdaten">'.$mitgliederData["strasse"].'</td>
        </tr>
        <tr>
            <td>PLZ</td>
            <td class="plz benutzerdaten">'.$mitgliederData["plz"].'</td>
        </tr>
        <tr>
            <td>Ort</td>
            <td class="ort benutzerdaten">'.$rowOrt["name"].'</td>
        </tr>
    </table>

</div>
    ';

echo $output;


mysqli_close($connect);




?>