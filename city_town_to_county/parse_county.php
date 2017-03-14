<?php
//This is just to have access to the file via JsFiddle.
header('Access-Control-Allow-Origin: http://fiddle.jshell.net');

/**
 * Takes a county from Geonames and parses it to fix it and make sure its actually a county.
 *
 * @param $county
 *
 * @return string
 */
function parseCounty($county)
{
    //Our searches to fix weirdness.
    $stringsToRemove = [" City", "South ", "Co ", "County"];

    foreach ($stringsToRemove as $string) {
        if (strpos($county, $string) !== false) {
            $county = str_replace($string, "", $county);
        }
    }

    $actualCounties = [
        "Antrim",
        "Armagh",
        "Carlow",
        "Cavan",
        "Clare",
        "Cork",
        "Donegal",
        "Down",
        "Dublin",
        "Fermanagh",
        "Galway",
        "Kerry",
        "Kildare",
        "Kilkenny",
        "Laois",
        "Leitrim",
        "Limerick",
        "Londonderry",
        "Longford",
        "Louth",
        "Mayo",
        "Meath",
        "Monaghan",
        "Offaly",
        "Roscommon",
        "Sligo",
        "Tipperary",
        "Tyrone",
        "Waterford",
        "Westmeath",
        "Wexford",
        "Wicklow",
    ];

    //We've sorted out geonames wierdness, now make sure we have a county.
    if ( ! in_array($county, $actualCounties)) {
        $county = "Not a county";
    }

    return $county;
}

$county = $_GET['county'];
if ($county != null) {
    $county = parseCounty($county);
    echo $county;
} else {
    echo "Not a county";
}