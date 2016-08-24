<?php
if($_FILES['file']['name'] != '')
{
    $dateiendung = end(explode(".", $_FILES['file']['name'])); // Dateiendung rausfiltern
    $dateityp_erlaubt = array("jpg", "jpeg", "JPG", "JPEG", "png");
    if(in_array($dateiendung, $dateityp_erlaubt))
    {
        $neuer_name = rand() . "." . $dateiendung; //neuer Name um doppelte zu verhindern
        $pfad = "uploads/" . $neuer_name;
        if(move_uploaded_file($_FILES['file']['tmp_name'], $pfad)) //Bild in Verzeichnis laden
        {
            echo '
                     <div class="small-6">
                          <img data-path="'.$pfad.'" src="'.$pfad.'" class="profilbild" />
                          <button type="button" id="remove_button" class="button alert">x</button>
                     </div>

                     ';
        }
    }
    else
    {
        echo '<script>alert("Ungültiges Dateiformat")</script>';
    }
}
else
{
    echo '<script>alert("Bitte Bild auswählen")</script>';
}
?>