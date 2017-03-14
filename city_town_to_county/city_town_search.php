<?php
//This is just to have access to the file via JsFiddle.
header('Access-Control-Allow-Origin: http://fiddle.jshell.net');

/**
 * Takes user input and returns applicable results in JSON.
 * @param $search
 */
function showLocation($search) {
	// Username for Geonames API
	$username = "seanmcnamara";
	//Service URL for search, we are biasing results towards Ireland, grabbing six rows and using feature codes: PPLC, PPLA2, PPLA, PPL.	
	$service_url = 'http://api.geonames.org/searchJSON?formatted=true&q='.$search.'&countryBias=IE&maxRows=6&lang=en&username='.$username.'&style=full&featureCode=PPLC&featureCode=PPLA2&featureCode=PPLA&featureCode=PPL';
	//Setting up CURL
	$curl = curl_init($service_url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$curl_response = curl_exec($curl);
	//Check if we got a response, if not provide the error.
	if ($curl_response === false) {
	    $info = curl_getinfo($curl);
	    curl_close($curl);
	    die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}
	curl_close($curl);
	//Decode our response
	$decoded = json_decode($curl_response);
	$locations = array();

	//Loop our way into a nicer array for our frontend form.
	foreach($decoded->geonames as $geoname) {
		$locations[] = array (
			"name" => $geoname->name,
			"countryName" => $geoname->countryName,
			"adminName"	=>	$geoname->adminName2
		);
	}
	//Return the data to our frontend.
	echo json_encode($locations);
}

$search = $_GET['search'];

if($search != null) {
	showLocation($search);
}