<?php include('header.php'); ?>

<div class="column small-12">
    <h2>Angebot hinzufügen</h2>

    <p>Geben Sie bitte einen vollständigen Datensatz ein<br>
        und sende Sie das Formular ab:</p>

    <label for="kategorie">Wählen Sie bitte die Kategorie</label>
    <select name="kategorie" id="kategorie">
    <?php
        include("api/angebot/kategorie.php");
    ?>
    </select>

    <label for="beschreibung">Beschreibung:</label>
    <input type="text" id="beschreibung">

    <label for="detailBeschreibung">detailBeschreibung:</label>
    <input type="text" id="detailBeschreibung">

    <label for="plz">Postleitzahl</label>
    <input type="text" id="plz">

    <label for="ort">Ortschaft bis</label>
    <input type="text" id="ort">

    <label for="vonDatum">Datum von</label>
    <input type="date" id="vonDatum">

    <label for="bisDatum">Datum bis</label>
    <input type="date" id="bisDatum">

    <label for="geschaetzterAufwand">Geschaetzter Aufwand</label>
    <input type="text" id="geschaetzterAufwand">
    <!--
            systemdatum nicht erfassen
            <label for=ea>Erstellt Am</label>
            <input type="date" id="erstelltAm">
    -->

    <label for="erledigt">Erledigt</label>
    <input type="text" id="erledigt">

    <label for="zeitgebrauch">Effektiver Zeitgebrauch</label>
    <input type="text" id="zeitgebrauch">

    <button type="button" name="btn_add_angebot" id="btn_add_angebot" class="success button">hinzufügen</button>

</div>


<div class="column small-12">
    <h2>Angebotsliste</h2>

 </div>

<?php include('footer.php'); ?>
