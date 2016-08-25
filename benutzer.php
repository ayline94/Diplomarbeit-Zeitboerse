<?php
session_start();
require("api/mitglied/functions.php");

?>

<?php include('header.php'); ?>

<div class="row">

    <div class="small-12">
        <h2>Mitglied Detailansicht</h2>

    </div>

</div>

<div class="row" id="showMitgliedDetail">

</div>

<div class="row">


    <div class="column small-12">
        <h2>Meine Angebote</h2>
        <button class="button">hinzufügen</button><br><button class="button">bearbeiten</button><br><button class="button">löschen</button>


        <h2>Meine Suchanfragen</h2>
        <button class="button">hinzufügen</button><br><button class="button">bearbeiten</button><br><button class="button">löschen</button>

    </div>

</div>


<?php include('footer.php'); ?>



