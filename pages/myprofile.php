<?php
/**
 * Created by PhpStorm.
 * User: Xiao
 * Date: 8/05/2016
 * Time: 2:25 AM
 * Function: shows the profile of users
 */
include '../php/session.php';
require "../php/dbinfo.php";

//get the information of the user to display

$check = $_SESSION['login_username'];
$conn = new mysqli($hn, $un, $pw, $db);
mysqli_set_charset($conn, "utf8");
if ($conn->connect_error) die($conn->connect_error);
$query = "SELECT * FROM users WHERE username='$check' ";
$fetch = $conn->query($query);
foreach ($fetch as $row) {
    $username = $row['username'];
    $realName = $row['firstname'] . ' ' . $row['lastname'];
    $email = $row['email'];
    $nationality = $row['nationality'];
    $dob = $row['dob'];
    $gender = $row['gender'];
    $address = $row['address'];
}
if ($gender == 'Male') {
    $imgsrc = "../images/user_male.svg";
} else {
    $imgsrc = "../images/user_female.svg";
}
$phpdate = strtotime($dob);
$mysqldate = date('Y-m-d', $phpdate);
?>

<!DOCTYPE html>
<html class="" lang="en">
<head>
    <link rel='icon' href='../Resim1.png' type='image/x-icon'/ >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cross Culture</title>
    <link href="../css/header.css" rel="stylesheet">
    <!--    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css" integrity="sha384-XXXXXXXX" crossorigin="anonymous">-->
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"-->
    <!--              integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->

    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <link href="../css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/loginform.css">
    <link rel="stylesheet" href="../css/dropdownbtn.css">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel='stylesheet prefetch' href='https://octicons.github.com/components/octicons/octicons/octicons.css'>
    <link href="../css/organize.css" rel="stylesheet">
    <link href="../css/userprofile.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
</head>
<body style="overflow:scroll">

<!--login popup-->
<div style="width: 100%">
    <div id="popupbox" class="module form-module popuplogin">
        <div class="toggle">
            <a class="fa fa-times" href="javascript:login('hide');"></a>
            <div class="tooltip">Click Me</div>
        </div>
        <div class="form">
            <h2>Login to your account</h2>
            <form method="post" name="login" action="../php/login.php">
                <input type="text" name="username" id="userid" required="required" placeholder="Username"/>
                <input type="password" name="password" id="passid" required="required" placeholder="Password"/>
                <button type="submit" name="submit" id="submit" value="submit">Login</button>
            </form>
        </div>
        <div class="form">
            <h2>Create an account</h2>
            <form>
                <input type="text" placeholder="Username"/>
                <input type="password" placeholder="Password"/>
                <input type="email" placeholder="Email Address"/>
                <input type="tel" placeholder="Phone Number"/>
                <button>Register</button>
            </form>
        </div>
        <div class="cta"><a href="registration.php">Sign Up</a></div>
    </div>
</div>

<!--Fixed Navigation
==================================== -->
<header id="navigation" class="nav navbar-static-top">
    <div class="container" style="min-width: 100%;background-color: #D66A05">

        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu">
                <h3><i class="fa fa-bars"></i></h3>
            </button>
            <!-- /responsive nav button -->

            <!-- logo -->
            <a class="navbar-brand" href="../index.php" style="padding-top: 15px;padding-bottom: 15px">
                <img src="../images/logo.png" width="200"  alt="Logo">
            </a>
            <!-- /logo -->

        </div>

        <!-- main nav -->
        <nav id="main-menu" class="collapse navigation navbar-collapse navbar-right"
             style="z-index:1000; position: relative" role="navigation">
            <ul class="nav navbar-nav hidden-xs ">
                <li><a href="../pages/organize.php">
                        <div style="border-style: solid; border-color: gainsboro; border-width: thin">
                            &nbsp&nbsp Organize an event &nbsp&nbsp
                        </div>
                    </a>
                </li>
                <li id="admin2" style="width: 108px;">
                    <a href="#">Service</a>
                    <div id="menu2" class="menu">
                        <div class="arrow"></div>
                        <a href="event.php?clt=test">Event <span
                                class="icon octicon octicon-list-ordered"></span></a>
                        <a href="community.php">Community <span
                                class="icon octicon octicon-organization"></span></a>
                        <a href="story.php">Story <span class="icon octicon octicon-squirrel"></span></a>
                    </div>
                </li>
                <li id="admin1" style="width: auto;">
                    <?php


                    if (isset($_SESSION['login_username'])) {

                        echo '<a href="#">' . $_SESSION['login_username'] . ' </a>';
                        echo '<div id="menu1" class="menu">
                            <div class="arrow"></div>
                            <a href="myprofile.php">My Profile <span class="icon octicon octicon-person"></span></a>
                            <a href="myevent.php">My Events <span class="icon octicon octicon-tasklist"></span></a>
                            <a href="mystory.php">My Stories <span class="icon octicon octicon-rocket"></span></a>
                            <a href="poststory.php">Post Story<span class="icon octicon octicon-pencil"></span></a>
                            <a href="../php/logout.php">Logout <span class="icon octicon octicon-sign-out"></span></a>
                        </div>';
                    } else {
                        echo '<a href="javascript:login(\'show\');">login </a>';
                    }
                    ?>

                </li>
            </ul>

            <ul id="mobnav" class="nav navbar-nav visible-xs">
                <?php
                if (isset($_SESSION['login_username'])) {
                    echo '<li><a href="#">' . $_SESSION['login_username'] . '<i class="fa fa-user pull-right" aria-hidden="true"></i></a></li>';

                    ?>
                    <li><a href="../index.php">Home<i class="fa fa-home pull-right" aria-hidden="true"></i></a></li>
                    <li><a href="event.php?clt=test">Event<i class="fa fa-list-ol pull-right"
                                                             aria-hidden="true"></i></a></li>
                    <li><a href="community.php">Community<i class="fa fa-university pull-right"
                                                            aria-hidden="true"></i></a></li>
                    <li><a href="story.php">Story<i class="fa fa-paper-plane pull-right"
                                                    aria-hidden="true"></i></a></li>

                    <?php
                    echo '<li><a href="../php/logout.php">Logout<i class="fa fa-sign-out pull-right" aria-hidden="true"></i></a></li>';

                } else {
                    echo '<li><a href="../index.php">Home<i class="fa fa-home pull-right" aria-hidden="true"></i></a></li>';
                    echo '<li><a href="event.php?clt=test">Event<i class="fa fa-list-ol pull-right" aria-hidden="true"></i></a></li>';
                    echo '<li><a href="community.php">Community<i class="fa fa-university pull-right" aria-hidden="true"></i></a></li>';
                    echo '<li><a href="story.php">Story<i class="fa fa-paper-plane pull-right" aria-hidden="true"></i></a></li>';
                    echo '<li><a href="javascript:login(\'show\');">Login<i class="fa fa-sign-in pull-right" aria-hidden="true"></i></a></li>';
                }
                ?>
            </ul>
        </nav>
        <!-- /main nav -->


    </div>


</header>


<div class="titlediv">
    <h4></h4>
</div>

<!--user profile information-->
<div class="container">
    <div class="col-md-4" style="text-align: center; color: black">

        <div class="card" style="padding-top: 20px">
            <img class="card-img-top" src="<?= $imgsrc ?>" width="40%" alt="Card image cap">
            <div class="card-block">
                <h4 class="card-title"><?= $username ?></h4>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="fa fa-user" aria-hidden="true"></i> <?= $realName ?></li>
                <li class="list-group-item"><i class="fa fa-birthday-cake" aria-hidden="true"></i> <?= $mysqldate ?>
                </li>
                <li class="list-group-item"><i class="fa fa-envelope" aria-hidden="true"></i> <?= $email ?></li>
                <li class="list-group-item"><i class="fa fa-home" aria-hidden="true"></i> <?= $address ?></li>

            </ul>
            <div class="card-block">
                <a type="button" class="btn btn-success" href="../php/logout.php">Logout</a>
            </div>
        </div>

    </div>
    <div class="col-md-8">

<!--        My Story Card-->
        <div class="card">
            <div class="card-header">
                <h4>My Stories</h4>
            </div>
            <ul class="list-group list-group-flush">
                <?php
                $author = $_SESSION['login_username'];
                $conn = new mysqli($hn, $un, $pw, $db);
                if ($conn->connect_error) die($conn->connect_error);
                $query1 = "SELECT * FROM Story WHERE username = " . "'$author'";
                $result = $conn->query($query1);
                $count = 0;
                foreach ($result as $row) {
                    $count++;
                    if ($count > 3){
                        break;
                    }
                    $pdate = $row['postdate'];
                    echo '<li class="list-group-item row">';
                    echo '<div class="col-md-2">';
                    echo '<img width=130px src="../photos/' . $row['image'] . '"">';
                    echo '</div>';
                    echo '<div class="col-md-9 col-md-offset-1">';
                    echo '<h4>' . $row['title'] . '</h4>';
                    echo 'Posted on: ' .
                        substr($pdate, 8, 2) . '/' .
                        substr($pdate, 5, 2) . '/' .
                        substr($pdate, 0, 4);
                    echo '<br>';
                    echo '</div>';
                    echo '</li>';
                }
                if ($count == 0) {
                    echo '<li class="list-group-item"><h6>You have not posted any story.</h6></li>';
                }
                ?>
            </ul>
            <div class="card-block">
                <a href="mystory.php" class="btn btn-primary">See More</a>
            </div>
        </div>

        <!--        My Event Card-->
        <div class="card">
            <div class="card-header">
                <h4>My Organized Events</h4>
            </div>
            <ul class="list-group list-group-flush">
                <?php
                $organizer = $_SESSION['login_username'];
                $conn = new mysqli($hn, $un, $pw, $db);
                if ($conn->connect_error) die($conn->connect_error);
                $query1 = "SELECT * FROM Events WHERE eid = 0 AND organizer = " . "'$organizer'";
                $result = $conn->query($query1);
                $count = 0;
                foreach ($result as $row) {
                    $count++;
                    if ($count > 3){
                        break;
                    }
                    $eventstart = $row['start'];
                    $eventend = $row['end'];
                    echo '<li class="list-group-item row">';
                    echo '<div class="col-md-2">';
                    echo '<img width="100%" src="' . $row['logo'] . '" style="margin-top:20%">';
                    echo '</div>';
                    echo '<div class="col-md-8">';
                    echo '<h6>' . $row['name'] . '</h6>';
                    echo 'From: ' .
                        substr($eventstart, 8, 2) . '/' .
                        substr($eventstart, 5, 2) . '/' .
                        substr($eventstart, 0, 4) . '  ' .
                        substr($eventstart, 11, 5);
                    echo '<br>';
                    echo 'To: ' .
                        substr($eventend, 8, 2) . '/' .
                        substr($eventend, 5, 2) . '/' .
                        substr($eventend, 0, 4) . '  ' .
                        substr($eventend, 11, 5);
                    echo '</div>';
                    echo '<div class="col-md-2" >';
                    echo '<a href="eventDetail.php?event=' . $row['name'] . '" class="btn btn-info btn-sm" style="margin-top: 20%; width:70px">Detail</a>';
                    echo '<a href="../php/deleteevent.php?event=' . $row['name'] . '&venue=' . $row['venue'] . '" class="btn btn-danger btn-sm" style="margin-top: 20%; width:70px">Delete</a>';
                    echo '</div>';
                    echo '</li>';

                }
                if ($count == 0) {
                    echo '<li class="list-group-item"><h6>You have not organized any event.</h6></li>';
                }
                ?>
            </ul>
            <div class="card-block">
                <a href="myevent.php" class="btn btn-primary">See More</a>
            </div>
        </div>

        <!--        My Favourite Event Card-->
        <div class="card">
            <div class="card-header">
                <h4>My Favourite Events</h4>
            </div>
            <ul class="list-group list-group-flush">
                <?php
                $userid = $_SESSION['login_userid'];
                $query = "SELECT * FROM Events, UserEvent UE WHERE UE.userid='$userid' and id = UE.eventid";
                $result = $conn->query($query);
                if (!$result) die($conn->error);
                $count = 0;
                foreach ($result as $row) {
                    $count++;
                    if ($count > 3){
                        break;
                    }
                    $eventstart = $row['start'];
                    $eventend = $row['end'];
                    echo '<li class="list-group-item row">';
                    echo '<div class="col-md-2">';
                    echo '<img width="100%" src="' . $row['logo'] . '" style="margin-top:20%">';
                    echo '</div>';
                    echo '<div class="col-md-8">';
                    echo '<h6>' . $row['name'] . '</h6>';
                    echo 'From: ' .
                        substr($eventstart, 8, 2) . '/' .
                        substr($eventstart, 5, 2) . '/' .
                        substr($eventstart, 0, 4) . '  ' .
                        substr($eventstart, 11, 5);
                    echo '<br>';
                    echo 'To: ' .
                        substr($eventend, 8, 2) . '/' .
                        substr($eventend, 5, 2) . '/' .
                        substr($eventend, 0, 4) . '  ' .
                        substr($eventend, 11, 5);
                    echo '</div>';
                    echo '<div class="col-md-2" >';
                    echo '<a href="eventDetail.php?event=' . $row['name'] . '" class="btn btn-info btn-sm" style="margin-top: 20%; width:70px"> Detail </a>';
                    echo '<a href="../php/unlikeevent.php?eid=' . $row['id'] . '&uid=' . $userid . '" class="btn btn-danger btn-sm" style="margin-top: 20%; width:70px">Unlike</a>';
                    echo '</div>';
                    echo '</li>';

                }
                if ($count == 0) {
                    echo '<li class="list-group-item"><h6>You have not liked any event.</h6></li>';
                }
                ?>
            </ul>
            <div class="card-block">
                <a href="myevent.php" class="btn btn-primary">See More</a>
            </div>
        </div>
    </div>

</div>

<!--footer-->
<section class="rowfooter breath container-fluid" style="padding: 0px">
    <div class="row">
        <div class="col-md-12"
             style="background-color: #D66A05; color:white; text-align: center; height: 60px">
            <p><br>© 2016 Dream Builders. All Rights Reserved</p>
        </div>
    </div>
</section>

<script type="text/javascript" src="../js/loginform.js"></script>
<script src="../js/dropdownbtn.js"></script>
</body>
</html>