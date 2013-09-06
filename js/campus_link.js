$(document).ready(function() {
	
	$('.screens, #action-buttons').removeClass("not_visible");
	
	$('#campus').change(function(){
		var id = $(this).val();
		$('#result').html('<a href="http://crave.mycravings.ca?s='+id+'">http://crave.mycravings.ca?s='+id+'</a><br/><img src="http://chart.apis.google.com/chart?chs=180x180&choe=UTF-8&cht=qr&chl=http://crave.mycravings.ca?s='+id+'" />');
	});

	var pre_campus = $('input[name="preselected_campus"]').val();
	if(pre_campus == "") pre_campus = 'none';
	$('#campus').val(pre_campus);

	if(pre_campus != 'none')
	{
		var id = $('#campus').val();
		$('#result').html('<a href="http://crave.mycravings.ca?s='+id+'">http://crave.mycravings.ca?s='+id+'</a><br/><img src="http://chart.apis.google.com/chart?chs=180x180&choe=UTF-8&cht=qr&chl=http://crave.mycravings.ca?s='+id+'" />');		
	}

});