<?php
header('Access-Control-Allow-Origin: http://fiddle.jshell.net'); 
//This is just to have access to the file via JsFiddle.

/*
* Takes a county from Geonames and parses it to fix it and make sure its actually a county.
*/
function parseCounty($unparsedCounty) {
	//Our searches to fix wierdness.
	$cityPos = strpos($unparsedCounty, " City");
	$southPos = strpos($unparsedCounty, "South ");
	$coPos = strpos($unparsedCounty, "Co ");
	$countyPos = strpos($unparsedCounty, "County");

	if($cityPos !== false) {
		$parsedCounty = str_replace(" City", "", $unparsedCounty);
	}
	elseif($southPos !== false) {
		$parsedCounty = str_replace("South ", "", $unparsedCounty);
	}
	elseif($coPos !== false) {
		$parsedCounty = str_replace("Co ", "", $unparsedCounty);
	}
	elseif($countyPos !== false) {
		$parsedCounty = str_replace("County ", "", $unparsedCounty);
	}
	else {
		$parsedCounty = $unparsedCounty;
	}

	//We've sorted out geonames wierdness, now make sure we have a county.
	if($parsedCounty !== "Antrim" && $parsedCounty !== "Armagh" && $parsedCounty !== "Carlow" && $parsedCounty !== "Cavan" && $parsedCounty !== "Clare" && $parsedCounty !== "Cork" && $parsedCounty !== "Donegal" && $parsedCounty !== "Down" && $parsedCounty !== "Dublin" && $parsedCounty !== "Fermanagh" && $parsedCounty !== "Galway" && $parsedCounty !=="Kerry" && $parsedCounty !== "Kildare" && $parsedCounty !== "Kilkenny" && $parsedCounty !== "Laois" && $parsedCounty !== "Leitrim" && $parsedCounty !== "Limerick" && $parsedCounty !== "Londonderry" && $parsedCounty !== "Longford" && $parsedCounty = "Louth" && $parsedCounty !== "Mayo" && $parsedCounty !== "Meath" && $parsedCounty !== "Monaghan" && $parsedCounty !== "Offaly" && $parsedCounty !== "Roscommon" && $parsedCounty !== "Sligo" && $parsedCounty !== "Tipperary" && $parsedCounty !== "Tyrone" && $parsedCounty !== "Waterford" && $parsedCounty !== "Westmeath" && $parsedCounty !== "Wexford" && $parsedCounty !== "Wicklow") {
		$parsedCounty = "Not a county";
	}
	return $parsedCounty;
}
$county = $_GET['county'];
if($county != null ) {
	$parsedCounty =  parseCounty($county);
	echo $parsedCounty;
}
?>