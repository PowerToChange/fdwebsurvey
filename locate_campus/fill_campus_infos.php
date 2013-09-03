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

	define('GEOLITE_DB_HOST', 'localhost');
	define('GEOLITE_DB_USER', 'root');
	define('GEOLITE_DB_PASSWORD', '');
	define('GEOLITE_DB_DATABASE', 'geolite');



 

	$link = mysqli_connect(GEOLITE_DB_HOST, GEOLITE_DB_USER, GEOLITE_DB_PASSWORD, GEOLITE_DB_DATABASE) or die("Error " . mysqli_error($link));
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
	$query = "select * from universities";
	$result = $link->query($query);
	echo "<table>";
	echo "<tr><th>id</th><th>name</th><th>lng</th><th>lat</th><th>address</th><th>city</th><th>postal_code</th></tr>";
	while ($row = mysqli_fetch_array($result)) {
		extract($row);
		echo "<tr><td>$id</td><td>$name</td><td>$lng</td><td>$lat</td><td>$address</td><td>$city</td><td>$postal_code</td></tr>";
	}
	echo "</table>";
	*/
	
	function get_closest_universities($link, $locId)
	{
		$ret = "";
		// get (longitude,latitude) from locId
		extract(mysqli_fetch_array($link->query("select longitude, latitude from locations where locId = $locId;")));
		
		// get all universities and get square distance
		$universities = array();
		$query = "select id, lng, lat from universities where id <> 30412;";
		$result = $link->query($query);
		while ($row = mysqli_fetch_array($result)) {
			extract($row);
			$universities[$id] = ($longitude - $lng) * ($longitude - $lng) + ($latitude - $lat) * ($latitude - $lat);  
		}
		asort($universities);
		$i = 0;
		foreach ($universities as $key => $value) {
			$i++;
			if($i != 1) $ret .= ',';
			$ret .= $key;
			if($i >= 40) break;
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
