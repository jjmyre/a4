$(document).ready(function(){

    // Hide the inputs for display boxes on document ready
	$('#ratingOption').hide();


    // Displays rating inputs, if checked, after validation fails

    if($('#watched_yes').is(':checked')) { $('#movieRating').show(); }

    // Event handler to show or hide prioirity/rating inputs

  	$("#showSelect").change(function() {
    	if ($('option:selected').val() == 'watched') 
            $('#ratingOption').show();
    });
});


