<?php

// Tabellen Kopfzeile ausgeben
$output = '';
$output .= '
<table>
    <tr>
        <th width="20%">Id</th>
        <th width="40%">Vorname</th>
        <th width="40%">Nachname</th>
        <th width="40%">Ort</th>
    </tr>';

    // Mitglieder ausgeben
    if(mysqli_num_rows($result) > 0)
    {
    while($row = mysqli_fetch_array($result))
    {

    $id = $row['id'];

    $output .= '
    <tr class="mitglied mitglied-'.$id.'" data-id="'.$id.'" >
        <td class="profilbild" ><img class="profilbild" src=" '.$row["profilbild_pfad"].' "></td>
        <td class="vorname">'.$row["vorname"].'</td>
        <td class="nachname">'.$row["nachname"].'</td>
        <td class="ort">'.$row["ort"].' </td>
        <td><button class="button" id="openMitglied">Detail</button></td>
    </tr>
    ';
    }

    }
    // Meldung wenn keine Datensätze gefunden werden
    else
    {
    $output .= '<tr>
        <td colspan="3">Keine Mitglieder gefunden</td>
    </tr>';
    }

    // Tabelle schliessen & ausgeben
    $output .= '</table>';
echo $output;


mysqli_close($connect);