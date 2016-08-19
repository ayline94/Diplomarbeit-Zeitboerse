<?php
include ("connect.php");

// Tabellen Kopfzeile ausgeben
$output = '';
$output .= '
       <table class="table table-bordered">
            <tr>
                 <th width="20%">Id</th>
                 <th width="40%">Vorname</th>
                 <th width="40%">Nachname</th>
            </tr>';

// Mitglieder ausgeben
$result = mysqli_query($connect, "SELECT * FROM mitglieder ORDER BY id DESC");
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
        $output .= '
            <tr>
                 <td>'.$row["id"].'</td>
                 <td class="first_name" data-id1="'.$row["id"].'" contenteditable>'.$row["vorname"].'</td>
                 <td class="last_name" data-id2="'.$row["id"].'" contenteditable>'.$row["nachname"].'</td>
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
?>