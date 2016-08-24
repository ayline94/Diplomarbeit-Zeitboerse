<?php

$sql = "INSERT INTO mitglieder(vorname, nachname, email, passwort, geburtsdatum ) VALUES('".$_POST["vorname"]."', '".$_POST["nachname"]."', '".$email."', '".$passwort."', '".$_POST["geburtsdatum"]."')";


// Felder prüfen
if($_POST["vorname"] == '' || $_POST["nachname"] == '')
{
    echo "Bitte alle Felder ausfüllen";
    return false;
}

// Profilbild prüfen
if($_POST["profilbild_pfad"] == '')
{
    echo "Bitte Profilbild auswählen & hochladen";
    return false;
}


?>


