<?php
session_start();
include ("../connect.php");
require("functions.php");

if(isset($_SESSION['email'])):

// Benutzerdaten von aktueller Session anzeigen

$id = $_GET['id'];
$mitgliederData = getUserData($id);




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
            <td class="ort benutzerdaten">'.$mitgliederData["ort"].'</td>
        </tr>

    </table>

</div>
    ';


// Meldung wenn keine Datensätze gefunden werden


// Tabelle ausgeben
echo $output;

endif;

mysqli_close($connect);

?>