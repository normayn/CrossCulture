<?php
/**
 * Created by PhpStorm.
 * User: nerminyildiz
 * Date: 14.05.2016
 * Time: PM 10:17
 * Function: delete function for posted stories
 */
include 'session.php';
require "dbinfo.php";


$get_string = $_SERVER['QUERY_STRING'];

parse_str($get_string, $get_array);


$title = $get_array['story'];
$title = addslashes($title);


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
$query = "Delete FROM Story WHERE title='$title'";
$result = $conn->query($query);
if (!$result) die($conn->error);
if(isset($_SERVER['HTTP_REFERER'])) {
    header('Location: '.$_SERVER['HTTP_REFERER']);
} else {
    header("Location: ../index.php");
}
?>