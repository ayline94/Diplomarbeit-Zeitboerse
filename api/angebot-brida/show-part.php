<?php

// Tabellen Kopfzeile ausgeben
$output = '';
$output .= '
<table>
    <tr>
        <th width="20%">Id</th>
        <th width="40%">Kategorie</th>
        <th width="40%">Beschreibung</th>
    </tr>';

    // Mitglieder ausgeben
    if(mysqli_num_rows($result) > 0)
    {
    while($row = mysqli_fetch_array($result))
    {
    $output .= '
    <tr>
        <td>'.$row["id"].'</td>
        <td class="kategorie" data-id1="'.$row["id"].'" contenteditable>'.$row["kategorie"].'</td>
        <td class="beschreibung" data-id2="'.$row["id"].'" contenteditable>'.$row["beschreibung"].'</td>
        <td><button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="alert button btn_delete">x</button></td>
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