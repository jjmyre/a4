$(document).ready(function(){

    // Displays rating inputs, if checked, after validation fails

    $('#movieRating').hide(); 

    if($('#watched').is(':checked')) { 
        $('#movieRating').show(); 
    }

    // Event handler to show or hide rating inputs

     $("input[name='watched']").click(function() {
        $('#movieRating').toggle();
    });

});

