<?php include('header.php'); ?>

<div class="row">

    <div class="small-12">
        <h2>Benutzerkonto</h2>
        <button id="editMitglied" class="button">bearbeiten</button>
        <button id="saveMitglied" class="button hide">Änderungen speichern</button>
        <button id="deleteMitglied" class="button hide alert">Account Löschen</button>
    </div>

</div>

<div class="row" id="showUser">

</div>


<div class="row">


    <div class="column small-12">
        <h2>Meine Angebote</h2>
        <button class="button">hinzufügen</button><button class="button">bearbeiten</button><button class="button">löschen</button>
        <div id="listeAngebotUser"></div>

        <h2>Meine Merkliste</h2>
        <button class="button">hinzufügen</button><button class="button">bearbeiten</button><button class="button">löschen</button>

    </div>

</div>


<?php include('footer.php'); ?>



