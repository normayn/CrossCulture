<?php
/**
 * Created by PhpStorm.
 * User: Xiao
 * Date: 8/05/2016
 * Time: 6:40 PM
 * Function: unlike event function
 */
include 'session.php';
require "dbinfo.php";


$get_string = $_SERVER['QUERY_STRING'];

parse_str($get_string, $get_array);


$eid = $get_array['eid'];
$uid = $get_array['uid'];

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
$query = "Delete From UserEvent WHERE " .
    "eventid = $eid and userid = $uid";
$result = $conn->query($query);
if (!$result) {
    echo "Delete failed: $query<br>" .
        $conn->error . "<br><br>";
}
if(isset($_SERVER['HTTP_REFERER'])) {
    header('Location: '.$_SERVER['HTTP_REFERER']);
} else {
    header("Location: ../index.php");
}
?>