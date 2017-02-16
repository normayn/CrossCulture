<?php
/**
 * Created by PhpStorm.
 * User: Xiao
 * Date: 17/04/2016
 * Time: 1:35 AM
 * Function: User login
 */
require 'dbinfo.php';
session_start();
{
    $data = file_get_contents("php://input");
    parse_str($data, $get_array);
    $user = $get_array['username'];
    $pass = $get_array['password'];
    $pass = md5($pass);
    $conn = new mysqli($hn, $un, $pw, $db);
    mysqli_set_charset($conn, "utf8");
    if ($conn->connect_error) die($conn->connect_error);
    $query = "SELECT id as id FROM users WHERE username='$user' and password='$pass'";
    $fetch = $conn->query($query);
    $count = $fetch->num_rows;
    if ($count != "") {
        foreach ($fetch as $row) {
            $_SESSION['login_userid'] = $row['id'];
        }
        $_SESSION['login_username'] = $user;
        $_SESSION['islogin'] = true;
        if (isset($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            header("Location: ../index.php");
        }
    } else {
        echo 'log out';
        header('Location: ../index.php?logged=wrong');
    }

}
?>