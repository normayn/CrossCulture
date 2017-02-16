<?php
/**
 * Created by PhpStorm.
 * User: nerminyildiz
 * Date: 7.05.2016
 * Time: PM 3:27
 * Function: adding events to google calendar, not used currently
 */
session_start();
require_once '../vendor/autoload.php';
require("../php/dbinfo.php");
//require_once '../vendor/google/apiclient/src/Google/Client.php';
//require_once '../vendor/google/apiclient/src/Google/Service.php';


$get_string = $_SERVER['QUERY_STRING'];

parse_str($get_string, $get_array);


$name = $get_array['event'];
$name = addslashes($name);

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
$query = "SELECT E.name as ename, E.descp as description, E.capacity as cap, V.name as vname, E.start as start, E.end as end, E.logo as logo,
 V.latitude as lat, V.longitude as lon, E.culture as culture, V.address1 as ad1, V.address2 as ad2, V.postal_code as postcode, V.city as city
  FROM Events E ,Venues V WHERE E.Venue = V.id and E.name='$name'";
$result = $conn->query($query);
if (!$result) die($conn->error);

$event;
foreach($result as $row){
    //print_r($row);
    $event = $row;
    $eventname = $row['ename'];
    $eventstart = $row['start'];
    $eventend = $row['end'];
    $venue = $row['vname'];
    $pic = $row['logo'];
    $address = $row['ad2']. ' '. $row['ad1']. ' '. $row['city'];
    break;
}


// ********************************************************  //
// Get these values from https://console.developers.google.com
// Be sure to enable the Analytics API
// ********************************************************    //
$client_id = '578478015916-n8fkslfr9gm26g9ev6a7a3han72q97cv.apps.googleusercontent.com';
$client_secret = 'uKYk5fkf0NzKDCs0a8oIsKvh';
$redirect_uri = 'http://localhost:63342/crossculture-master-4/php/calendar.php';

$client = new Google_Client();
$client->setApplicationName("Client_Library_Examples");
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->setAccessType('offline');   // Gets us our refreshtoken

$client->setScopes(array('https://www.googleapis.com/auth/calendar'));


//For loging out.
if (isset($_GET['logout'])) {
    unset($_SESSION['token']);
}


// Step 2: The user accepted your access now you need to exchange it.
if (isset($_GET['code'])) {

    $client->authenticate($_GET['code']);
    $_SESSION['token'] = $client->getAccessToken();
    $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

// Step 1:  The user has not authenticated we give them a link to login
if (!isset($_SESSION['token'])) {

    $authUrl = $client -> createAuthUrl();
    header("Location:$authUrl");

    //$authUrl = $client->createAuthUrl();

    //print "<a class='login' href='$authUrl'>Connect Me!</a>";
}


// Step 3: We have access we can now create our service
if (isset($_SESSION['token'])) {
    $client->setAccessToken($_SESSION['token']);
}
if ($client->getAccessToken()) {
//        print "<a class='logout' href='$authUrl?logout=1'>LogOut</a><br>";
//
    $service = new Google_Service_Calendar($client);
//
//        $calendarList  = $service->calendarList->listCalendarList();;
//
//        while(true) {
//            foreach ($calendarList->getItems() as $calendarListEntry) {
//
//                echo $calendarListEntry->getSummary()."<br>\n";
//
//
//                // get events
//                $events = $service->events->listEvents($calendarListEntry->id);
//
//
//                foreach ($events->getItems() as $event) {
//                    echo "-----".$event->getSummary()."<br>";
//                }
//            }
//            $pageToken = $calendarList->getNextPageToken();
//            if ($pageToken) {
//                $optParams = array('pageToken' => $pageToken);
//                $calendarList = $service->calendarList->listCalendarList($optParams);
//            } else {
//                break;
//            }
//        }



//        $event = new Google_Service_Calendar_Event(array(
//            'summary' => 'Google I/O 2015',
//            'location' => '800 Howard St., San Francisco, CA 94103',
//            'description' => 'A chance to hear more about Google\'s developer products.',
//            'start' => array(
//                'dateTime' => '2016-05-28T09:00:00-07:00',
//                'timeZone' => 'America/Los_Angeles',
//            ),
//            'end' => array(
//                'dateTime' => '2016-05-28T17:00:00-07:00',
//                'timeZone' => 'America/Los_Angeles',
//            ),
//            'recurrence' => array(
//                'RRULE:FREQ=DAILY;COUNT=2'
//            ),
//            'attendees' => array(
//                array('email' => 'lpage@example.com'),
//                array('email' => 'sbrin@example.com'),
//            ),
//            'reminders' => array(
//                'useDefault' => FALSE,
//                'overrides' => array(
//                    array('method' => 'email', 'minutes' => 24 * 60),
//                    array('method' => 'popup', 'minutes' => 10),
//                ),
//            ),
//        ));
//
//        $calendarId = 'primary';
//        $event = $service->events->insert($calendarId, $event);
//        printf('Event created: %s\n', $event->htmlLink);

    $event = new Google_Service_Calendar_Event();
    $event->setSummary($eventname);
    $event->setLocation($address);
    $start = new Google_Service_Calendar_EventDateTime();
    $start->setDateTime('2016-05-10T10:00:00.000-07:00');
    $event->setStart($start);
    $end = new Google_Service_Calendar_EventDateTime();
    $end->setDateTime('2016-05-10T10:25:00.000-07:00');
    $event->setEnd($end);
    $event->setICalUID('originalUID');

//        $createdEvent = $service->events->insert('primary', $event);
//        echo $createdEvent->getId();

    $importedEvent = $service->events->import('primary', $event);
    //echo $importedEvent->getId();
    header('Location:../pages/eventDetail.php?event=' . $name . '');


}
?>

