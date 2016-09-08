<?php

// Tabellen Kopfzeile ausgeben
$output = '';
$output .= '
<table>
    <tr>
        <th width="30%">Id</th>
        <th width="30%">Titel</th>
        <th width="30%">Detail</th>
    </tr>';

    // Mitglieder ausgeben
    if(mysqli_num_rows($result) > 0)
    {
    while($row = mysqli_fetch_array($result))
    {

    $id = $row['id'];

    $output .= '
    <tr class="angebot angebot-'.$id.'" data-id="'.$id.'" >
        <td class="id">'.$row["id"].'</td>
        <td class="titel">'.$row["titel"].'</td>
        <td class="link"> <a class="button" href="angebot.php?id='. $id .'">Detail</a></td>

    </tr>
    ';
    }

    }
    // Meldung wenn keine Datensätze gefunden werden
    else
    {
    $output .= '<tr>
        <td colspan="3">Keine Angebote gefunden</td>
    </tr>';
    }

    // Tabelle schliessen & ausgeben
    $output .= '</table>';
echo $output;


mysqli_close($connect);