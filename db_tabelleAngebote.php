<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Angebotstabelle</title>
</head>
<body>
<?php
    $con = mysqli_connect("localhost", "root", "root");
    mysqli_select_db($con, "zeitboerse01");
    $res = mysqli_query($con, "select * from angebot");

    // Tabellen beginn
    echo "<table border='1'>";

    // Überschrift
    echo "<tr><td>Lfd. Nr. </td> <td>Kategorie</td> <td>Beschreibung</td>";
    echo "<td>Ort</td> <td>Von Datum</td> <td>Bis Datum</td> <td>Geschaetzer Aufwand</td>";
    echo "<td>Erstellt am</td> <td>Erledigt</td> <td>Zeitgebrauch</td> </tr>";
    $lf = 1;
    while ($dsatz = mysqli_fetch_assoc($res))
    {
        echo "<tr>";
        echo "<td>$lf</td>";
        echo "<td>" . $dsatz["Kategorie"] . "</td>";
        echo "<td>" . $dsatz["Beschreibung"] . "</td>";
        echo "<td>" . $dsatz["Ort"] . "</td>";
        echo "<td>" . $dsatz["VonDatum"] . "</td>";
        echo "<td>" . $dsatz["BisDatum"] . "</td>";
        echo "<td>" . $dsatz["GeschaetzterAufwand"] . "</td>";
        echo "<td>" . $dsatz["ErstelltAm"] . "</td>";
        echo "<td>" . $dsatz["Erledigt"] . "</td>";
        echo "<td>" . $dsatz["Zeitgebrauch"] . "</td>";
        echo "</tr>";
        $lf = $lf + 1;
    }

    // Tabellenende
    echo "</table>";

    mysqli_close($con);
?>
</body>
</html>