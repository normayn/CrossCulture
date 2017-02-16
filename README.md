CROSS CULTURE WEBSITE

Cross Culture is a website allows you to have various information about cultural events,
communities and cultural stories. You can organize your own events and post stories to 
connect with other people.
http://crossculture.tk


HOW TO USE?
First thing that should be done to use our website is changing the database information in dbinfo.php file 
under the 'php' folder.

$hn = 'WRITE YOUR HOST NAME';
$db = 'WRITE YOUR DATABASE NAME';
$un = 'WRITE YOUR USERNAME';
$pw = 'WRITE YOUR PASSWORD';


Second, api keys should be replaced with yours.
For Google Maps api, change the following line in files 'community.php', 'event.php', 'story.php' under the
'pages' folder.
<script src="https://maps.googleapis.com/maps/api/js?key= ADD YOUR KEY HERE"
type="text/javascript"></script>

For Eventbrite api, change the following line in 'eventDB.php' under the 'php' folder.
$eb_client = new Eventbrite('ADD YOUR API KEY');

For Zomato api, change the following line in 'zomato.php' under the 'php' folder.
var $token = 'ADD YOUR API KEY HERE';

For OpenWeatherMap api, change the following line in 'eventDetail.php' under the 'pages' folder.
$json = file_get_contents('http://api.openweathermap.org/data/2.5/forecast/daily?lat=' . $lati . '&lon=' . $long . '&count=7&units=metric&APPID=ADD YOUR API KEY HERE');

ALL DONE! ENJOY YOUR WEBSITE!