<!DOCTYPE html>
<html>
	<head>
		
	</head>
	<body>
<?php
include_once('civi_constants.php');

ob_start();
var_dump($_POST);
//$params = convertArray($_POST);
//createTableSQL($_POST);
insertDataInDB($_POST['submitted']);
//http_call($params);
$data = ob_get_clean();

$fp = fopen("survey.html", "w");
fwrite($fp, $data);
fclose($fp);  


function insertDataInDB($arr)
{
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die("Error " . mysqli_error($link));
	$f = "";
	$v = "";
	createInsertParts($arr, $f, $v, $link);
	$query = "INSERT INTO survey2013($f) VALUES ($v);";
	echo $query;
	$link->query($query);
	
}

function createInsertParts($arr, &$fields, &$values, &$link)
{
	foreach ($arr as $key => $value) {
		if(is_array($value)) createInsertParts($value, $fields, $values, $link);
		else
		{
			if($fields != "") $fields .= ", ";
			if($values != "") $values .= ", ";
			$fields .= "`" . $key . "`";
			$values .= "'" . mysqli_real_escape_string($link, $value) . "'";
		}
	}
}

function createTableSQL($arr) {
	foreach ($arr as $key => $value) {
		if(is_array($value)) createTableSQL($value);
		else echo "`$key` VARCHAR(40), ";
	}
}

function &convertArray(&$arr, &$out = null, $prefix = '')
{
	if(!$out) $out = array();
	foreach ($arr as $key => $value) {
		if(is_array($value)) convertArray($value, $out, get_my_key($key, $prefix));
		else $out[get_my_key($key, $prefix)] = $value;
	}
	return $out;
}

function get_my_key($key, $prefix)
{
	if($prefix == '') return $key;
	return $prefix . '[' . $key . ']';
}

function http_call($params){
  $ch = curl_init('https://stagehub.p2c.com/node/15');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POST,count($params));
  curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
  if(! $reply = curl_exec($ch))
	{
		var_dump(curl_error($ch));
	}
  curl_close($ch);
  echo json_decode($reply, TRUE);
}


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