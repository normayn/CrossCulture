<?php
/**
 * Created by PhpStorm.
 * User: Xiao
 * Date: 21/04/2016
 * Time: 3:56 AM
 * Function: Get Information from form in organize.php. Store it in database.
 *
 */

require "dbinfo.php";
include "session.php";
$path = '';

//************ get Files, make sure its size is not too large.
//************ Move image to a folder
if(isset($_FILES['image'])){
    $errors= array();
    $file_name = uniqid(). $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $path = __DIR__ . "/uploads/" . basename($file_name);
    $pic = "../php/uploads/". basename($file_name);
    if($file_size > 5097152){
        $errors[]='File size must be no more than 5 MB';
    }

    if(empty($errors)==true){
        move_uploaded_file($file_tmp, $path);
        header("Location:../pages/myevent.php");
    }else{
        print_r($errors);
    }
}

//Access database to store the event
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$name = $_POST["nametext"];
$descp = $_POST["comment"];
$descp = addslashes($descp);
$eid = 0;
$startdate = date_create_from_format('d m Y - g:i A', $_POST["starttime"]);
$start = date_format($startdate, 'Y-m-d').'T'.date_format($startdate, 'H:i:s');
$enddate = date_create_from_format('d m Y - g:i A', $_POST["endtime"]);
$end = date_format($enddate, 'Y-m-d').'T'.date_format($enddate, 'H:i:s');$capacity = $_POST["capacity"];
$logo = $pic;
$organizer = $_SESSION['login_username'];
$venue = hexdec(uniqid());

$venuename = $_POST["venuetext"];
$venuename = addslashes($venuename);
$latitude = $_POST["latitude"];
$longitude = $_POST["longitude"];
$address1 = $_POST["route"];
$address2 = $_POST["street_number"];
$city = $_POST["locality"];
$postal_code = $_POST["postal_code"];
$culture = $_POST["radio"];

$query = "INSERT INTO Events(name, descp, eid, start, end, capacity, logo, organizer, venue, culture) VALUES" .
    "('$name', '$descp', $eid, '$start', '$end', $capacity, '$logo', '$organizer', '$venue', '$culture')";

$result = $conn->query($query);

if (!$result) {
    echo "INSERT failed: $query<br>" .
        $conn->error . "<br><br>";
}

//****** insert into Venue****
//****** Judge if the Venue id exist
$query3 = "SELECT * FROM Venues WHERE id = " . "'$venue'";
$result = $conn->query($query3);
if (!$result) die($conn->error);

$rows = $result->num_rows;

//****** Inserting
if ($rows != 0) {
    $venue = hexdec(uniqid());
}
$query2 = "INSERT INTO Venues VALUES" .
    "($venue, '$venuename', '$address1', '$address2', '$city', '$postal_code', $latitude, $longitude)";

$result2 = $conn->query($query2);

if (!$result2) {
    echo "INSERT failed: $query2<br>" .
        $conn->error . "<br><br>";
}

?>