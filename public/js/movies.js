$(document).ready(function(){

    // Hide the inputs for display boxes on document ready
	
    $('#movieRating').hide();
	
    $('#moviePriority').hide();

    // Displays priority or rating inputs, if checked, after validation fails

    if($('#watched_yes').is(':checked')) { $('#movieRating').show(); }

    if($('#watched_no').is(':checked')) { $('#moviePriority').show(); }

    // Event handler to show or hide prioirity/rating inputs

  	$("input[name='watched']").click(function() {
    	if ($(this).attr('value') =='no') {
        	$('#moviePriority').show();
            $('#movieRating').hide();
    	} 
    	else if ($(this).attr('value') == 'yes') {
            $('#movieRating').show();
            $('#moviePriority').hide();
    	}
    });

});