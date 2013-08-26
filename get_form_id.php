<!DOCTYPE html>
<html>
	<head>
		<title>getting form_id</title>
	</head>
	<body>
		<?php
		
		$form = file_get_contents('https://hub.p2c.com/node/11');
		if(preg_match_all('#type="hidden" name="form_build_id" value="([^"]+)"#', $form, $arr, PREG_PATTERN_ORDER))
		{
			file_put_contents('form_build_id.txt', $arr[1][0]);
		}
		if(preg_match_all('#type="hidden" name="form_id" value="([^"]+)"#', $form, $arr, PREG_PATTERN_ORDER))
		{
			file_put_contents('form_id.txt', $arr[1][0]);
		}
		
		?>
	</body>
</html>