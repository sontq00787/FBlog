$(function(){
	
	//Do what we need to when form is submitted.	
	$('.contactSubmit').click(function(){
	
	//Setup any needed variables.
	var input_name = $('.contactName').val(),
		input_email = $('.contactEmail').val(),
		input_subject = $('.contactSubject').val(),
		input_message = $('.contactMessage').val(),
		response_text = $('#response');
		//Hide any previous response text 
		response_text.hide();
		
		//Change response text to 'loading...'
		response_text.html('Loading...').show();
		
		//Make AJAX request 
		$.post('php/contact-send.html', {name: input_name, email: input_email, subject: input_subject, message: input_message}, function(data){
			response_text.html(data);
		});
		
		//Cancel default action
		return false;
	});

});