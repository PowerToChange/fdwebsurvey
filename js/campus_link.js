$(document).ready(function() {
	
	$('.screens, #action-buttons').removeClass("not_visible");
	
	$('#campus').change(function(){
		var id = $(this).val();
		$('#result').html('<a href="http://crave.mycravings.ca?s='+id+'">http://crave.mycravings.ca?s='+id+'</a><br/><img src="http://chart.apis.google.com/chart?chs=180x180&choe=UTF-8&cht=qr&chl=http://crave.mycravings.ca?s='+id+'" />');
	});
});