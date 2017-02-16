<?php
/**
 * Created by PhpStorm.
 * User: Xiao
 * Date: 7/05/2016
 * Time: 1:56 PM
 * Function: like event function for users
 */
require "dbinfo.php";
session_start();

$eid = $_POST['eventid'];
$conn = new mysqli($hn, $un, $pw, $db);
//$query = "SELECT * FROM UserEvent WHERE eventid='$eid'";
//$result = $conn->query($query);
//if (!$result) die($conn->error);
//$countLike = $result->num_rows;

$userid = $_SESSION['login_userid'];
$query = "SELECT * FROM UserEvent WHERE userid='$userid' and eventid=$eid";
$result = $conn->query($query);
if (!$result) die($conn->error);
$likeStatus = $result->num_rows;
if($likeStatus == 0){
    $euid = hexdec(uniqid());
    $query = "INSERT INTO  UserEvent(userid, eventid) VALUES " .
        "($userid , $eid)";
    $result = $conn->query($query);
//    $countLike = $countLike + 1;
    if (!$result) {
        echo "INSERT failed: $query<br>" .
            $conn->error . "<br><br>";
    }
//    $return_data = array('likeStatus'=>1,'countLike'=>$countLike);
    echo '1';

    exit;
}else{
    $query = "Delete From UserEvent WHERE " .
        "eventid = $eid and userid = $userid";
    $result = $conn->query($query);
//    $countLike = $countLike - 1;
    if (!$result) {
        echo "Delete failed: $query<br>" .
            $conn->error . "<br><br>";
    }
    echo "0";
    exit;
}

?>
