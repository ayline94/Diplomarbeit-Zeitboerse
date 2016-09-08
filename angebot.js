$(document).ready(function(){

    //------------- Angebotsliste -------------------------//


    // Angebote anzeigen
    function displayAngebotListe()
    {
        $.ajax({
            url:"api/angebot/show-list.php",
            method:"POST",
            success:function(data){
                $('#angebotsliste').html(data);
            }
        });
    }
    displayAngebotListe();


    //-------- Angebot Detailansicht -----------------//


    // Einzelansicht Angebot anzeigen
    function showAngebotDetail(id)
    {
        $.ajax({
            url:"api/angebot/show-detail.php",
            method:"GET",
            data: {
                id:id

            },
            success:function(data){
                $('#showAngebotDetail').html(data);
            }
        });
    }
    showAngebotDetail(getParam('id'));


    //----------- Facebook Sharing ------------//
    $(document).on('click', '#facebookShare', function(){
        var sharer = "https://www.facebook.com/sharer/sharer.php?u=";
        window.open(sharer + location.href,'sharer', 'width=226,height=236');
    });





});




