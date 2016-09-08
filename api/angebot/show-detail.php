<?php
include ("../connect.php");
include ("../mitglied/functions.php");


// Daten zu Angebot ID anzeigen

$id = $_GET['id']; // ID von URL

$sql = "SELECT * FROM angebot WHERE id = '".$id."'   ";
$result = mysqli_query($connect, $sql);


if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    // über MitgliederID Daten von Tabelle Mitglieder holen
    $mitgliederData = getUserData($row["mitglieder_id"]);


// Tabellen mit Inhalt ausgeben
    $output = '';
    $output .= '
 <div class="small-6 columns">
       <h4>' . $row["titel"] . '</h4>
       <p>Beschreibung</p>
 </div>
<div class="small-6 columns">
    <table class="benutzerinfo" data-id="' . $id . '">
        <tr>
            <th colspan="2" width="100%"><h3>Benutzerinformationen</h3></th>
        </tr>
        <tr>
            <td>Vorname</td>
            <td class="vorname benutzerdaten">' . $mitgliederData["vorname"] . '</td>
        </tr>
        <tr>
            <td>Nachname</td>
            <td class="nachname benutzerdaten">' . $mitgliederData["nachname"] . '</td>
        </tr>
        <tr>
            <td>Email</td>
            <td class="email benutzerdaten">' . $mitgliederData["email"] . '</td>
        </tr>
        <tr>
            <td>Ort</td>
            <td class="ort benutzerdaten">' . $mitgliederData["ort"] . '</td>
        </tr>

    </table>

</div>
    ';

}

// Meldung wenn keine Datensätze gefunden werden

else {
    echo "Zu diesem Datensatz wurden keine weiteren Informationen gefunden";
}

// Tabelle ausgeben

echo $output;

mysqli_close($connect);

?>