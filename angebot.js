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

    // Angebot suchen
    $('#search_angebot').keyup(function(){
        var txt = $(this).val();
        if(txt != '')
        {
            $.ajax({
                url:"api/angebot/search.php",
                method:"post",
                data:{search:txt},
                dataType:"text",
                success:function(data)
                {
                    $('#angebotsliste').html(data);
                }
            });
        }
        else
        {
            displayAngebotListe();
        }
    });


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




