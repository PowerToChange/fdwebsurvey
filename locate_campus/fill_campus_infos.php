
<?php
/*
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>testing for now</title>
		<style>
			tr:nth-child(odd) { background-color: #DDD; }
		</style>
	</head>
	<body>

*/
include('../blackbox.php');




 

	$link = mysqli_connect(GEOLITE_DB_HOST, GEOLITE_DB_USER, GEOLITE_DB_PASSWORD, GEOLITE_DB_DATABASE) or die("Error " . mysqli_error($link));
/*	$query = "select locId, city from locations where country = 'CA'";
	$result = $link->query($query);
	while ($row = mysqli_fetch_array($result)) {
		extract($row);
		$link->query("UPDATE close_universities SET city = '$city' WHERE locId = $locId;");
		echo '.';
	}
	

/* 
	$query = "select locId, longitude, latitude from locations where country = 'CA'";
	$result = $link->query($query);

	while ($row = mysqli_fetch_array($result)) {
		extract($row);
		$ulist = get_closest_universities($link, array('locId' => $locId, 'longitude' => $longitude, 'latitude' => $latitude));
		$link->query("UPDATE close_universities SET universities = '$ulist' WHERE locId = $locId;");
		echo '.';
	}
 */
 
 /*
	$query = "select locId from locations where country = 'CA'";
	$result = $link->query($query);
	while ($row = mysqli_fetch_array($result)) {
		extract($row);
		$ulist = get_closest_universities($link, $locId);
		$link->query("INSERT INTO close_universities(locId,universities) VALUES ($locId, '$ulist');");
		echo '.';
	}
	*/

 //echo get_closest_universities($link, 404049);
/*
 	$query = "select * from close_universities where locId = 39";
	$result = $link->query($query);
	$closest_university = NULL;
	$close_universities = array();
	if($row = mysqli_fetch_array($result))
	{
		$close_universities = explode(',', $row['universities']);
		$campuses = json_decode(file_get_contents('../campuses.json'), true);
	}
 ?>
 <select id="campus" name="submitted[civicrm_2_contact_1_fieldset_fieldset][civicrm_2_contact_1_contact_existing]"><option value="none" disabled selected>Select</option><option value="30412">Other</option><option value="57218">Academy of Applied Pharmaceutical Sciences</option>
 <?php
	if(count($close_universities))
	{
		echo "<optgroup label=\"Close to $city\">";
		
		echo "</optgroup>";
 	}
 ?>
</select>
<?php
  	
	*/
	
	$query = "select * from close_universities limit 40";
	$result = $link->query($query);
	echo "<table>";
	echo "<tr><th>locId</th><th>city</th><th>universities</th></tr>";
	while ($row = mysqli_fetch_array($result)) {
		extract($row);
		echo "<tr><td>$locId</td><td>$city</td><td>$universities</td></tr>";
	}
	echo "</table>";
/*	$query = "select * from universities";
	$result = $link->query($query);
	echo "<table>";
	echo "<tr><th>id</th><th>name</th><th>lng</th><th>lat</th><th>address</th><th>city</th><th>postal_code</th></tr>";
	while ($row = mysqli_fetch_array($result)) {
		extract($row);
		echo "<tr><td>$id</td><td>$name</td><td>$lng</td><td>$lat</td><td>$address</td><td>$city</td><td>$postal_code</td></tr>";
	}
	echo "</table>";
	/*
	$query = "select * from close_universities";
	$result = $link->query($query);
	while ($row = mysqli_fetch_array($result)) {
		extract($row);
		$u = explode(',', $univiersities);
		var_dump($u);
		break;
		$final = array();
		for ($i=0; $i < 8; $i++) { 
			if($u[$i] != '30412' && count($final) < 7) $final[] = $u[$i];
		}
		$list = implode(',', $final);
		$link->query("UPDATE close_universities SET universities = '$list' where locId = $locId;");
		echo '.';
	}

	$query = "select * from close_universities limit 10";
	$result = $link->query($query);
	echo "<table>";
	echo "<tr><th>id</th><th>universities</th></tr>";
	while ($row = mysqli_fetch_array($result)) {
		extract($row);
		echo "<tr><td>$locId</td><td>$universities</td></tr>";
	}
	echo "</table>";
	*/
		
	function get_closest_universities($link, $data)
	{
		global $db_universities;
		$ret = "";
		extract($data);
		
		// get (longitude,latitude) from locId
		//extract(mysqli_fetch_array($link->query("select longitude, latitude from locations where locId = $locId;")));
		
		if(!$db_universities)
		{
			$db_universities = array();
			$query = "select id, lng, lat from universities where id <> 30412;";
			$result = $link->query($query);
			while ($row = mysqli_fetch_array($result)) {
				extract($row);
				$db_universities[] = array('id' => $id, 'lng' => $lng, 'lat' => $lat);
			}
		}
		// get all universities and get square distance

		$universities = array();
		foreach($db_universities as $university) {
			extract($university);
			$universities[$id] = ($longitude - $lng) * ($longitude - $lng) + ($latitude - $lat) * ($latitude - $lat);  
		}
		asort($universities);
		$i = 0;
		foreach ($universities as $key => $value) {
			$i++;
			if($i != 1) $ret .= ',';
			$ret .= $key;
			if($i >= 7) break;
		}
		return $ret;
	}
	
	function get_geodata($name, $address, $city, $postal_code)
	{
		$output = array('lng' => '0', 'lat' => '0');
		// First attempt, name of campus only
		$results = get_geodata_from_google("$name, $city, Canada");
		if(count($results) != 1)
		{
			// If no result or more than 1, attempt with address
			$results = get_geodata_from_google("$address, $city, $postal_code, Canada");
		}
		if(count($results) == 1)
		{
			// If at this point there is no doubt
			$output = $results[0];
		}
		return $output;
	}
	
	function get_geodata_from_google($search)
	{
		$results = array();
		$data = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($search).'&sensor=false');
		$geodata = json_decode($data);
		foreach ($geodata->results as $result) {
			$results[] = array('lng' => $result->geometry->location->lng, 'lat' => $result->geometry->location->lat);
		}
		return $results;
	}

	function fill_campuses_from_connect($link)
	{
		$reply = get_schools();
		if($reply) foreach ($reply as $school => $data) {
			extract($data);
			$query = "INSERT INTO universities(id,name,lng,lat,address,city,postal_code) VALUES ($contact_id,'". mysqli_real_escape_string($link, $organization_name) . "','$geo_code_1','$geo_code_2','". mysqli_real_escape_string($link, $street_address) . "','". mysqli_real_escape_string($link, $city) . "','$postal_code')";
			$link->query($query);
		}
	}

	function update_db_with_geodata($link)
	{
		
		$query = "select * from universities";
		$result = $link->query($query);
		while ($row = mysqli_fetch_array($result)) {
			extract($row);
			$google_results = get_geodata($name, $address, $city, $postal_code);
			if($google_results['lng'] != '0')
			{
				extract($google_results);
				$link->query("UPDATE universities SET lng = '$lng', lat = '$lat' WHERE id = $id;");
			}
		}
	}
	


	/*		
	</body>
</html>*/
	?>
