<?php

 /*
 * This script loads all campuses from the connect system 
 * and puts the results in a json file named campuses.json
 * 
 * This campuses.json file is later used to construct the 
 * campus dropdown in the survey. The campuses will the 
 * be reordered so that the closests campuses are listed first 
 * and then all remaining campuses will be ordered alphabetically.
 * 
 * */


include_once('blackbox.php');

$campuses = array();
$reply = get_schools();
if($reply) foreach ($reply as $school => $data) {
	$campuses[$data["contact_id"]] = $data["organization_name"];
}

file_put_contents('campuses.json', json_encode($campuses));

?>