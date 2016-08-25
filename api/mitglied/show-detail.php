<?php
session_start();

include ("../connect.php");
require("functions.php");

// Benutzerdaten von aktueller Session anzeigen
$id = getId($_SESSION['email']);
$mitgliederData = getUserData($id);

$id = $mitgliederData['id'];


// Tabellen mit Inhalt ausgeben
$output = '';
$output .= '
 <div class="small-5 columns">
            <img src="'.$mitgliederData["profilbild_pfad"].'">
 </div>
<div class="small-7 columns">
    <table>
        <tr>
            <th colspan="2" width="100%"><h3>Benutzerinformationen</h3></th>
        </tr>
        <tr>
            <td>Vorname</td>
            <td class="vorname" data-id1="'.$id.'">'.$mitgliederData["vorname"].'</td>
        </tr>
        <tr>
            <td>Nachname</td>
            <td class="nachname" data-id2="'.$id.'">'.$mitgliederData["nachname"].'</td>
        </tr>
        <tr>
            <td>Email</td>
            <td class="email" data-id2="'.$id.'">'.$mitgliederData["email"].'</td>
        </tr>
        <tr>
            <td>Geburtsdatum</td>
            <td class="geburtsdatum" data-id2="'.$id.'">'.$mitgliederData["geburtsdatum"].'</td>
        </tr>
        <tr>
            <td>Strasse & Hausnummer</td>
            <td class="strasse" data-id2="'.$id.'">'.$mitgliederData["strasse"].'</td>
        </tr>
        <tr>
            <td>PLZ</td>
            <td class="strasse" data-id2="'.$id.'">'.$mitgliederData["plz"].'</td>
        </tr>
        <tr>
            <td>Ort</td>
            <td class="ort" data-id2="'.$id.'">'.$mitgliederData["ort"].'</td>
        </tr>
    </table>
</div>
    ';


// Meldung wenn keine Datensätze gefunden werden


// Tabelle ausgeben
echo $output;


mysqli_close($connect);




?>