<?php


// Tabellen Kopfzeile ausgeben
$output = '';
$output .= '
<table>
    <tr>
        <th width="10%">Bild</th>
        <th width="30%">Vorname
            <select id="filter_vorname">
                <option value="ASC">Aufsteigend</option>
                <option value="DESC">Absteigend</option>
                <option value="0">Sortierung Entfernen</option>
            </select>
        </th>
        <th width="30%">Nachname</th>
        <th width="30%">Ort</th>
    </tr> ';

    // Mitglieder ausgeben
    if(mysqli_num_rows($result) > 0)
    {
    while($row = mysqli_fetch_array($result))
    {

    // Ort von Tabelle holen
    $sql = "SELECT * FROM ort WHERE id = '".$row['ort_id']."'   ";
    $result_ort = mysqli_query($connect, $sql);
    $rowOrt = mysqli_fetch_array($result_ort);

    $id = $row['id'];

    $output .= '
    <tr class="mitglied mitglied-'.$id.'" data-id="'.$id.'" >
        <td class="profilbild" ><img class="profilbild" src=" '.$row["profilbild_pfad"].' "></td>
        <td class="vorname">'.$row["vorname"].'</td>
        <td class="nachname">'.$row["nachname"].'</td>
        <td class="ort">'.$rowOrt["name"].' </td>
        <td class="link"> <a class="button" href="mitglied.php?id='. $id .'">Detail</a></td>

    </tr>
    ';
    }

    }
    // Meldung wenn keine Datensätze gefunden werden
    else
    {
    $output .= '<tr>
        <td colspan="4">Keine Mitglieder gefunden</td>
    </tr>';
    }

    // Tabelle schliessen & ausgeben
    $output .= '</table>';
echo $output;


mysqli_close($connect);