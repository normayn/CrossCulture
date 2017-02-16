<?php
/**
 * Created by PhpStorm.
 * User: nerminyildiz
 * Date: 20.04.2016
 * Time: AM 12:31
 * Function: Story page, show the user stories on a map with popup window and sidebar
 */
session_start();

?>

<!DOCTYPE>
<html>
<head>
    <link rel='icon' href='../Resim1.png' type='image/x-icon'/ >
    <meta charset="UTF-8">
    <title>CrossCulture</title>

    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/Infowindow.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic'
          rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../assets/css/icomoon.css">
    <link href="../assets/css/animate-custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <link href="../css/header.css" rel="stylesheet">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="../css/loginform.css">
    <link rel="stylesheet" href="../css/dropdownbtn.css">
    <link rel='stylesheet prefetch' href='https://octicons.github.com/components/octicons/octicons/octicons.css'>
    <link rel="stylesheet" href="../css/storypop.css">

    <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->
    <script src="../js/pace.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- [profolio B] -->
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="../themes/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--simple-line-icons-->

    <!--    change the google maps api key at the end of the url in order to use-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAohlvHFSdn17Csms1_VTA-BNkvc4aJ9YY"
            type="text/javascript"></script>
    <script src="../js/story.js"></script>

    <link href='http://static.tumblr.com/blpgwiz/usPm404d2/bounce_normal.css' rel='stylesheet' type='text/css'>


</head>
<body id="deneme" onload="firstLoad()">

<!--popup for stories-->
<div class="pop-up" id="popupdiv"></div>


<div id="back" style="height: 100%">

<!--popup login    -->
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
        <div class="cta"><a href="../pages/registration.php">Sign Up</a></div>
    </div>
</div>


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
    <div class="container" style="background-color: #D66A05">

        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu">
                <h3><i class="fa fa-bars"></i></h3>
            </button>
            <!-- /responsive nav button -->

            <!-- logo -->
            <a class="navbar-brand" href="../index.php">
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

<!--story map, culture buttons and sidebar-->
<div id="container" style="margin-left: 7%; margin-right: 7%; margin-top: 30px;" style="z-index:100">
    <div class="row">
        <div id="buttonculture" class="col-lg-1 col-md-2 col-sm-3 col-xs-3">
            <button class="denem hvr-grow" onclick="load('test')" data-toggle="tooltip" title="ALL"></button>
            <br>
            <button class="denem1 hvr-grow" onclick="load('Chinese')" data-toggle="tooltip" title="Chinese"></button>
            <br>
            <button class="denem2 hvr-grow" onclick="load('Greek')" data-toggle="tooltip" title="Greek"></button>
            <br>
            <button class="denem3 hvr-grow" onclick="load('Indian')" data-toggle="tooltip" title="Indian"></button>
            <br>
            <button class="denem4 hvr-grow" onclick="load('Italian')" data-toggle="tooltip" title="Italian"></button>
            <br>
            <button class="denem5 hvr-grow" onclick="load('Turkish')" data-toggle="tooltip" title="Turkish"></button>
        </div>
        <div id="map-canvas" class="col-lg-9 col-md-9 col-sm-8 col-xs-8"></div>

        <div id="sidebar" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"
             style="padding-left: 0px;padding-right: 0px"></div>
    </div>
</div>


    </div>

<!--footer-->
<section class="rowfooter breath container-fluid" style="padding: 0px">
    <div class="row">
        <div class="col-md-12"
             style="background-color: #D66A05; color:white; text-align: center; height: 60px; margin-top: 30px;">
            <p><br>© 2016 Dream Builders. All Rights Reserved</p>
        </div>
    </div>
</section>
<script type="text/javascript" src="../js/story.js"></script>
<script src="../js/storymap.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/loginform.js"></script>
<script src="../js/dropdownbtn.js"></script>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

</body>
</html>
