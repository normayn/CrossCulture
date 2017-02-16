<?php
/**
 * Created by PhpStorm.
 * User: Xiao
 * Date: 18/04/2016
 * Time: 12:51 AM
 * Function: User logout
 */
session_start();
if(session_destroy())
{
    if(isset($_SERVER['HTTP_REFERER'])) {
        header('Location: '.$_SERVER['HTTP_REFERER']);
    } else {
        header("Location: ../index.php");
    }
}
?>