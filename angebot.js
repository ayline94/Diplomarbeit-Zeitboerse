$(document).ready(function(){

    //------------- Angebotsliste -------------------------//


    // Angebote anzeigen
    function displayAngebotsListe()
    {
        $.ajax({
            url:"api/angebot/show-list.php",
            method:"POST",
            success:function(data){
                $('#angebotsliste').html(data);
            }
        });
    }
    displayAngebotsListe();


});

