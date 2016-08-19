$(document).ready(function(){


$(function(){
    // Daten anzeigen
    showdata();


    //Daten speichern
    $('#speichern').click(function(){
        var vorname = $('#vorname').val();
        var nachname = $('#nachname').val();


        $.ajax({
            url : 'index.php',
            type : 'POST',
            async: false,
            data: {
                'saverecord' : 1,
                'vorname'    :vorname,
                'nachname'   :nachname
            },
            success:function(re)
            {
                if(re==0){
                    alert("Daten wurden erfolgreich eingegeben");
                    $('#vorname').val('');
                    $('#nachname').val('');
                    showdata();
                }
            }
        });
    });
    // Daten speichern ende
});

function showdata()
{
    $.ajax({
        url : "index.php",
        type : 'POST',
        async: false, // warum?
        data: {
            'show' : 1

        },
        success:function(data)
        {
           $('#showdata').html(data);
        }
    })
}


});// Document ready - end