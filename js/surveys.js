$(document).ready(function() {
	
	survey_reset_screen();
	
	// Buttons' functions
	$('#next-button').click(function(){
		survey_clear_messages();
		if(survey_run_validations()) {
			$('.screen:visible').hide().next().show();
			survey_update_buttons();
		}
	});

	$('#back-button').click(function(){
		survey_clear_messages();
		$('.screen:visible').hide().prev().show();
		survey_update_buttons();
	});

	$('#submit-button').click(function(){
		survey_clear_messages();
		if(survey_run_validations()) {
			$('.screen:visible').hide();
			$('.screen[order="error-submitting"]').show();
			survey_update_buttons();
		}
	});

	$('#retry-button').click(function(){
		survey_clear_messages();
		$('.screen:visible').hide();
		$('.screen[order="thankyou"]').show();
		survey_update_buttons();
	});

	$('#reset-button').click(function(){
		survey_reset_screen();
	});

	$('body').keypress(function(e) {
    if(e.which == 13) {
    		e.preventDefault();
    		$('.forward-button:visible').click();
    }
	});

	$('.selector').click(function(){
		$('#'+$(this).attr('activates')).click();
	});
	
	//removing error class when input changes
	$(':input').change(function(){
		$(this).removeClass('input_error');
		$(this).parent().removeClass('input_error');
	});

	// requires jquery.touchSwipe.min.js
//	$('.container').swipe({
//		swipe:function(event, direction, distance, duration, fingerCount){
//			if(direction == 'left')
//			{
//				$('.forward-button:visible').click();
//			}
//			else if(direction == 'right')
//			{
//				$('#back-button:visible').click();
//			}
//		}, 
//		threshold:50,
//		allowPageScroll:"vertical"
//	});

});



// set every input to default value
function survey_reset_screen()
{
	$('.screen').hide();
	$('.screens').children().first().show();
	$('input[type="email"],input[type="tel"],input[type="text"]').val('').removeClass('input_error');
	$('input[type="radio"],input[type="checkbox"]').prop('checked', false);
	$('input[type="radio"]').parent().removeClass('input_error');
	$('#campus').val('none').removeClass('input_error');
	survey_clear_messages();
	survey_update_buttons();	
}

function survey_update_buttons()
{
	
	$('#back-button').show();
	$('#next-button').show();
	$('#retry-button').hide();
	$('#reset-button').show();
	$('#submit-button').hide();

	switch($('.screen:visible').attr('order')) {
		
		case 'first':
			$('#reset-button').hide();
			$('#back-button').hide();
			break;
			
		case 'last':
			$('#next-button').hide();
			$('#submit-button').show();
			break;
			
		case 'thankyou':
			$('#back-button').hide();
			$('#next-button').hide();
			$('#reset-button').show();
			break;
			
		case 'error-submitting':
			$('#back-button').hide();
			$('#next-button').hide();
			$('#retry-button').show();
			$('#reset-button').show();
			break;
			
		default:
			break;
	}
}

function survey_clear_messages() { $('#messages').html(''); }
function smsg(str) { $('#messages').html($('#messages').html() + '<br/>' + str) }
function serror(str) { smsg('<span class="errors">' + str + '</span>'); }

function survey_run_validations()
{
	var is_valid = true;
	
	// for each telephone input
	$('.screen:visible input[type="tel"]').each(function(){
		var phone = /^[\d\(\)-]{7,14}$/;

		//required 
		if($(this).val() == '')
		{
			is_valid = false;
			serror('Please enter a cell phone number');
			$('.screen:visible input[type="tel"]').addClass('input_error');
		}
		// invalid
		else if(!phone.test($(this).val())){
			is_valid = false;
			serror('Please enter a valid cell phone number');
			$(this).addClass('input_error');
		}
	});
	
	// for each email input
	$('.screen:visible input[type="email"]').each(function(){
		var email = /^[\w.%-]+@[\w.-]+\.\w{2,5}$/;

		//required 
		if($(this).val() == '')
		{
			is_valid = false;
			serror('Please enter an email');
			$(this).addClass('input_error');
		}
		// invalid
		else if(!email.test($(this).val())){
			is_valid = false;
			serror('Please enter a valid email');
			$(this).addClass('input_error');
		}
	});
	
	// for each text input
	$('.screen:visible input[type="text"]').each(function(){
		//required 
		if($(this).val() == '' && !$(this).attr('is-required') != 'false')
		{
			is_valid = false;
			if($(this).attr('display-name')) serror('Please enter your ' + $(this).attr('display-name'));
			else serror('This field is required, please enter something');
			$(this).addClass('input_error');
		}
	});
	
	// for each radio button
	var radio_missing = false;
	$('.screen:visible input[type="radio"]').each(function(){
		var nm = $(this).attr('name');
		//required 
		if(!$('input[name='+nm+']:checked').length)
		{
			is_valid = false;
			radio_missing = true;
			$(this).parent().addClass('input_error');
		}
	});
	if(radio_missing) serror('Please make a selection');
	
	$('.screen:visible select').each(function(){
		//required 
		if($(this).val() == '' || $(this).val() == 'none')
		{
			is_valid = false;
			serror('Please make a selection');
			$(this).addClass('input_error');
		}
	});
	
	return is_valid;
}
