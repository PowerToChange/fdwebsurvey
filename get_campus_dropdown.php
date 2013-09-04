<?php
include_once('civi_constants.php');

$link = mysqli_connect(GEOLITE_DB_HOST, GEOLITE_DB_USER, GEOLITE_DB_PASSWORD, GEOLITE_DB_DATABASE) or die("Error " . mysqli_error($link));


	$closest_university = NULL;
	
	// outputs: $close_universities and $city
	extract(get_close_campuses($link)); // testing ips: 209.183.150.61 70.73.16.228
	
	$campuses = json_decode(file_get_contents('campuses.json'), true);
 ?>
 <select id="campus" name="submitted[civicrm_2_contact_1_fieldset_fieldset][civicrm_2_contact_1_contact_existing]"><option value="none" disabled selected>Select</option><option value="30412">Other</option>
 <?php
	if(count($close_universities))
	{
		echo "<optgroup label=\"Close to $city\">";
		foreach($close_universities as $id)
		{
			if(!$closest_university) $closest_university = $id;
			$name = $campuses[$id];
			unset($campuses[$id]);
			echo "<option value=\"$id\">$name</option>";
		}
		echo "</optgroup>";
 	}
	foreach ($campuses as $id => $name) echo "<option value=\"$id\">$name</option>";
 ?>
</select>
<?php
$preselected_campus = '';
if(isset($_GET['s'])) $preselected_campus = $_GET['s'];
if($preselected_campus == '' && !is_null($closest_university)) $preselected_campus = $closest_university;
?>
<input type="hidden" name="preselected_campus" value="<?php echo $preselected_campus; ?>"/><?php
  	


//get_close_campuses($link);

function startsWith($haystack, $needle)
{
    return $needle === "" || strpos($haystack, $needle) === 0;
}

function get_close_campuses($link, $ip = NULL)
{
	$res = array('city' => 'you', 'close_universities' => array());
	
	// get current ip for sql request
	if(!$ip) $ip = $_SERVER['REMOTE_ADDR'];
	
	// make sure that this ip is not local
	if(!startsWith($ip, '10.10.1.') && !startsWith($ip, '192.168.'))
	{
		// transform ip in a number for database search
		$mult = 16777216; // =256*256*256
		$ips = explode('.', $ip);
		$total = 0;
		foreach ($ips as $num) {
			$total += $mult * $num;
			$mult = $mult / 256;
		}
		
		// get locId
		$query = "select locId from blocks where $total between startIpNum and endIpNum;";
		$result = $link->query($query);
		if($row = mysqli_fetch_array($result))
		{
			extract($row); // $locId is now made available;
			$query = "select locId, city, universities from close_universities where locId = $locId;";
			$result = $link->query($query);
			if($row = mysqli_fetch_array($result))
			{
				// this should run in most cases, closest universities are already calculated
				extract($row);
				$res['city'] = $city;
				$res['close_universities'] = explode(',', $universities);
			}
			else 
			{
				// unknown location so far, probably not in Canada
				// calculate closest universities
				$ulist = calculate_closest_universities($link, $locId);
				// get the city
				$city = 'you';
				$result = $link->query("select city from locations where locId = $locId");
				if($row = mysqli_fetch_array($result)) $city = $row['city'];
				
				// update database
				$link->query("insert into close_universities(locId, city, universities) values ($locId, '$city', '$ulist');");
				// update res
				$res['city'] = $city;
				$res['close_universities'] = explode(',', $ulist);
			}
			
		}
	}
	return $res;
}

function calculate_closest_universities($link, $locId)
{
	$ret = "";
	// get (longitude,latitude) from locId
	extract(mysqli_fetch_array($link->query("select longitude, latitude from locations where locId = $locId;")));
	
	// get all universities and get square distance
	$universities = array();
	$query = "select id, lng, lat from universities where id <> 30412;"; // 30412 is 'Other' and not a real university
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
		if($i >= 7) break;
	}
	return $ret;
}


?>
