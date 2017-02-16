<?php
/**
 * Created by PhpStorm.
 * User: nerminyildiz
 * Date: 8/05/2016
 * Time: 6:40 PM
 * Function: insert stories from post story form into the database
 */
require "dbinfo.php";
include "session.php";
$path = '';

if(isset($_FILES['image'])){
    $errors= array();
    $file_name = uniqid(). $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $path = __DIR__ . "/photos/" . basename($file_name);
    $pic = "../php/photos/". basename($file_name);;

    if($file_size > 5097152){
        $errors[]='File size must be no more than 5 MB';
    }

    if(empty($errors)==true){
        move_uploaded_file($file_tmp, $path);
        header("Location:../pages/mystory.php");
    }else{
        print_r($errors);
    }
}
else{
    echo "no image";
    exit;
}

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

//$title = $_POST["title"];
//$content = $_POST["content"];
//$culture = $_POST["culture"];

$title = $_POST['title'];
$content = $_POST['content'];
$content = addslashes($content);
$culture = $_POST['culture'];

$image = $pic;
$time = mktime(date("m")  , date("d"), date("Y"));
$tarih = gmdate('Y-m-d\TH:i:s', $time);

$user_ip = getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$latitude = $geo["geoplugin_latitude"];
$longitude = $geo["geoplugin_longitude"];
$user = $_SESSION['login_username'];


$sql = "INSERT INTO Story(title, content, image, latitude, longtitude, postdate, culture, username) " .
"VALUES ('$title', '$content', '$image', '$latitude','$longitude', '$tarih', '$culture', '$user')";

$result = $conn->query($sql);

if (!$result) {
    echo "INSERT failed: $sql<br>" .
        $conn->error . "<br><br>";
}

?>
