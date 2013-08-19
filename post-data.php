<!DOCTYPE html>
<html>
	<head>
		
	</head>
	<body>
<?php
ob_start();
var_dump($_POST);
$data = ob_get_clean();
$fp = fopen("survey.html", "w");
fwrite($fp, $data);
fclose($fp);  


?>		
	</body>
</html>
<?php

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
	<input id="radio-yg" type="radio" name="year" value="Grad" />
  <input name="faculty" type="text" display-name="faculty or degree" />
	<input id="international" type="checkbox" name="international"/>
*/