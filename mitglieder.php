<?php include('header.php'); ?>

<div class="row">

    <div class="column small-12">


        <h2>Mitgliederliste</h2>
        <label for="filter_ort">Nach Ort filtern</label>
        <select name="country" id="filter_ort">
            <option value="0">alle Orte</option>
            <?php echo ort_laden($connect); ?>
        </select>
        <div class="input-group">
            <button class="input-group-label">Suche</button>
            <input type="text" name="search_mitglied" id="search_mitglied" placeholder="Nach Vor- oder Nachname" class="input-group-field" />
        </div>
        <div id="mitgliederliste"></div>
    </div>

</div>



<?php include('footer.php'); ?>