<?php
/**
 * Created by PhpStorm.
 * User: Xiao
 * Date: 22/04/2016
 * Time: 3:09 AM
 * Function: delete function for organized events
 */
include 'session.php';
require "dbinfo.php";


$get_string = $_SERVER['QUERY_STRING'];

parse_str($get_string, $get_array);


$name = $get_array['event'];
$name = addslashes($name);

$venue = $get_array['venue'];

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
$query = "Delete FROM Events WHERE name='$name'";
$result = $conn->query($query);
if (!$result) die($conn->error);
$query = "Delete FROM Venues WHERE id = '$venue'";
$result = $conn->query($query);
if (!$result) die($conn->error);
if(isset($_SERVER['HTTP_REFERER'])) {
    header('Location: '.$_SERVER['HTTP_REFERER']);
} else {
    header("Location: ../index.php");
}
?>