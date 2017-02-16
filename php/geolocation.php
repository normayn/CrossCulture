<?php
/**
 * Created by PhpStorm.
 * User: nerminyildiz
 * Date: 29/03/2016
 * Time: 4:24 PM
 * Function: Using geolocation to get the location of the user to pin the stories on the map
 */
$user_ip = getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$city = $geo["geoplugin_city"];
$region = $geo["geoplugin_regionName"];
$country = $geo["geoplugin_countryName"];
$latitude = $geo["geoplugin_latitude"];
$longitude = $geo["geoplugin_longitude"];
echo "City: ".$city."<br>";
echo "Region: ".$region."<br>";
echo "Country: ".$country."<br>";
echo "Latitude: ".$latitude."<br>";
echo "Longitude: ".$longitude."<br>";
/*
geoplugin_request
geoplugin_status
geoplugin_credit
geoplugin_city
geoplugin_region
geoplugin_areaCode
geoplugin_dmaCode
geoplugin_countryCode
geoplugin_countryName
geoplugin_continentCode
geoplugin_latitude
geoplugin_longitude
geoplugin_regionCode
geoplugin_regionName
geoplugin_currencyCode
geoplugin_currencySymbol
geoplugin_currencySymbol_UTF8
geoplugin_currencyConverter
*/
?>