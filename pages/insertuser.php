<html>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: nerminyildiz
 * Date: 17.04.2016
 * Time: PM 11:18

 * Function: inserting user information onto database after registration
 */

require("../php/dbinfo.php");


//get data from the registration form
$data = file_get_contents("php://input");
parse_str($data, $get_array);

//print_r($get_array);


    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $usrname = $get_array['username'];
    $pwd = $get_array['regpwd'];
    $fname = $get_array['firstname'];
    $lname = $get_array['lastname'];
    $mail = $get_array['email'];
    $nation = $get_array['nationality'];
    $birthdate = date_create_from_format('d-m-Y', $get_array["dob"]);
    $birth = date_format($birthdate, 'Y-m-d').'T'.date_format($birthdate, 'H:i:s');
    $sex = $get_array['gender'];
//    $adr = $get_array['address'];
//    $sub = $get_array['suburb'];
    $adr = $get_array['streetnumber'].' '.$get_array['route'].' '.$get_array['locality'];
    $sub= $get_array['locality'];
    $int = $get_array['interest'];
    $pwd = md5($pwd);
//    $dob = date("Y-m-d", strtotime($birth));


session_start();
if($get_array['captcha'] != $_SESSION['digit']) die("Sorry, the CAPTCHA code entered was incorrect!");
session_destroy();

//INSERT DATA INTO DATABASE
    $sql = "INSERT INTO Users(username, password, firstname, lastname, email, nationality, dob, gender, address, suburb, interest) VALUES ('$usrname', '$pwd', '$fname', '$lname','$mail', '$nation', '$birth', '$sex', '$adr', '$sub', '$int')";


    $retval = mysqli_query($conn, $sql);

    if (!$retval) {
        die('Could not enter data: ' . mysqli_error($conn));
    }

//    echo "Entered data successfully\n";

mysqli_close($conn);

//direct user to homwpage with registration successful alert
    header("Location:../index.php?logged=successful");




?>
</body>
</html>