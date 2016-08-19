<?php
// Verbingung zu DB herstellen
$connect = mysql_connect('localhost','root','root' )
or die ("Verbindung zu Server fehlgeschlagen");

$connect_db = mysql_select_db('zeitboerse',$connect);


// Verbindung überprüfen (Testzwecke)
if($connect_db) {
    echo "Verbindung DB funktionert";
} else {
    echo "Verbindung DB funktioniert nicht";
}


if(isset($_POST['saverecord']))
{
    mysql_query("INSERT INTO mitglieder(vorname, nachname) VALUES('{$_POST['vorname']}','{$_POST['nachname']}')");
    echo 0;
    exit();
}

if(isset($_POST['show']))
{
    $sql = mysql_query("SELECT * FROM mitglieder");
    while($row = mysql_fetch_object($sql)) {
        ?>
        <?php echo $row->id ?><br>
        <?php echo $row->vorname ?><br>
        <?php echo $row->nachname ?><br>
        <?php
    }
    exit();
}

?>