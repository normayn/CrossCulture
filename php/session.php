<?php
/**
 * Created by PhpStorm.
 * User: Xiao
 * Date: 18/04/2016
 * Time: 1:04 AM
 * Function: get the session information.
 * If user have not logged in, redirect user to homepage
 */
require 'dbinfo.php';
session_start();
if(!isset($_SESSION['login_username']))
{
    header("Location:../index.php?logged=false");
}
$check=$_SESSION['login_username'];
$conn = new mysqli($hn,$un,$pw,$db);
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) die($conn->connect_error);
$query = "SELECT username FROM users WHERE username='$check' ";
$fetch=$conn->query($query);
foreach($fetch as $row){
    $login_session=$row['username'];
    if(!isset($login_session))
    {
        header("Location:../index.php?logged=false");
    }
}


?>