$(document).ready(function() {
	
	$('.screens, #action-buttons').removeClass("not_visible");
	
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
			survey_submit();
		}
	});

	$('#retry-button').click(function(){
		survey_clear_messages();
		survey_submit();
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

/*
 * 
 * THIS CODE BREAKS THE USABILITY OF RADIO BUTTON ON IPODS AND IPHONES
 *  
 	// requires jquery.touchSwipe.min.js
	$('.container').swipe({
		swipe:function(event, direction, distance, duration, fingerCount){
			if(direction == 'left')
			{
				$('.forward-button:visible').click();
			}
			else if(direction == 'right')
			{
				$('#back-button:visible').click();
			}
		}, 
		threshold:50,
		allowPageScroll:"vertical"
	});
	
	// Trying to fix radio buttons on ipods and iphones
	$('input').swipe("disable");
	$('a').swipe("disable");
	$('.selector').swipe("disable");
*/

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
	$('#visit-button').hide();
	
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
			$('#visit-button').show();
			break;
			
		case 'error-submitting':
			$('#back-button').hide();
			$('#next-button').hide();
			$('#retry-button').show();
			$('#reset-button').show();
			break;
			
		case 'submitting':
			$('#back-button').hide();
			$('#next-button').hide();
			$('#reset-button').hide();
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
	//return true;
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

function survey_show_screen(order)
{
	$('.screen:visible').hide();
	$('.screen[order="' + order + '"]').show();
	survey_update_buttons();
}

/*

	<select id="campus" name="campus">
	<input id="radio-cwf" type="radio" name="cravemost" value="warmup-fun" />
	<input id="radio-msc" type="radio" name="magazine" value="spiritual-connection" />
	<input id="radio-1" type="radio" name="interested" value="1" />
	<input id="radio-wec" type="radio" name="wouldliketo" value="explore-cravings" />
	<input name="first_name" display-name="first name" type="text" />
	<input name="last_name" display-name="last name" type="text" />
	<input id="radio-male" type="radio" name="gender" value="male">
	<input name="cellphone" type="tel" />
	<input name="email" type="email" />
	<input name="faculty" type="text" display-name="faculty or degree" />
	<input id="radio-yg" type="radio" name="year" value="Grad" />
	<input id="international" type="checkbox" name="international"/>
*/

function survey_submit()
{
	
	survey_show_screen('submitting');
    // AJAX form submit. This controls what fields and values are sent back to 
    // the server.
	$.post("post-data.php",
		{
			campus : $('#campus').val(),

			cravemost : $('input[name=cravemost]:checked').val(),
			magazine : $('input[name=magazine]:checked').val(),
			interested : $('input[name=interested]:checked').val(),
			wouldliketo : $('input[name=wouldliketo]:checked').val(),

			first_name :$('input[name=first_name]').val(),
			last_name :$('input[name=last_name]').val(),
			gender : $('input[name=gender]:checked').val(), 
			email : $('input[name=email]').val(),
			cellphone : $('input[name=cellphone]').val(),
			year : $('input[name=year]:checked').val(), 
			faculty : $('input[name=faculty]').val(),
			international: $('#international').attr('checked') ? 'Yes' : 'No'

		}, function(data, status, request) {
			survey_show_screen('thankyou');
	}, "json").error(function() {
		survey_show_screen('error-submitting');
	});
}
