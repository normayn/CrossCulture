<?php
/**
 * Created by PhpStorm.
 * User: nerminyildiz
 * Date: 20.04.2016
 * Time: AM 12:21
 * Function: Post Story Page, Enter story information to post
 */
include '../php/session.php';
?>
<!DOCTYPE>
<html>
<head>
    <link rel='icon' href='../Resim1.png' type='image/x-icon'/ >
    <meta charset="utf-8">
    <title>CrossCulture</title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="../css/pwdwidget.css"/>
    <link rel="stylesheet" href="../css/animate.css">
    <link href="../css/main.css" rel="stylesheet">

    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-formhelpers.css" rel="stylesheet" media="screen">

    <!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"-->
    <!--              integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->

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
    <link href="../css/organize.css" rel="stylesheet">


    <link href="../css/flag-icon.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <!--    <script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script type="text/javascript" src="../bower_components/moment/min/moment.min.js"></script>
    <script src="../js/pwdwidget.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->
    <script src="../js/pace.js"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>

    <script src="../js/bootstrap-formhelpers.min.js"></script>

    <script type="text/javascript"
            src="../bower_components/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.css" rel="stylesheet"/>
    <link href="../bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"
          rel="stylesheet"/>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--simple-line-icons-->
    <script src="../js/gen_validatorv4.js" type="text/javascript"></script>

    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>



</head>
<body>

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



<header id="navigation" class="navbar-static-top" style="background-color: black;">
    <div class="container" style="background-color: #D66A05">

        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- /responsive nav button -->

            <!-- logo -->
            <h1 class="navbar-brand">
                <a href="#body">
                    <a href="../index.php"><img src="../images/logo.png" width="200"  alt="Logo"></a>
                </a>
            </h1>
            <!-- /logo -->

        </div>

        <!-- main nav -->
        <nav class="collapse navigation navbar-collapse navbar-right" role="navigation">
            <ul class="nav navbar-nav">
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
                        <a href="../pages/event.php?clt=test">Event <span
                                class="icon octicon octicon-list-ordered"></span></a>
                        <a href="../pages/community.php">Community <span class="icon octicon octicon-organization"></span></a>
                        <a href="../pages/story.php">Story <span class="icon octicon octicon-squirrel"></span></a>
                    </div>
                </li>
                <li id="admin1" style="width: auto;">
                    <a href="javascript:login('show');">
                        <?php
                        if (isset($_SESSION['login_username'])) {
                            echo $_SESSION['login_username'] . ' </a>';
                            echo '<div id="menu1" class="menu">
                            <div class="arrow"></div>
                            <a href="myprofile.php">My Profile <span class="icon octicon octicon-person"></span></a>
                            <a href="myevent.php">My Events <span class="icon octicon octicon-tasklist"></span></a>
                            <a href="mystory.php">My Stories <span class="icon octicon octicon-rocket"></span></a>
                            <a href="poststory.php">Post Story<span class="icon octicon octicon-pencil"></span></a>
                            <a href="../php/logout.php">Logout <span class="icon octicon octicon-sign-out"></span></a>
                        </div>';
                        } else {
                            echo 'login </a>';
                        }
                        ?>

                </li>
            </ul>
        </nav>
        <!-- /main nav -->
    </div>

</header>

<div class="titlediv">
    <h2>Post Story</h2>
    <h4>You can post your own stories here.</h4>
</div>

<!--story form for user to fill to post-->
<div class="container-fluid contentdiv">
    <div class="row">
        <div class="col-md-11 col-md-offset-1 col-xs-12 col-xs-offset-0">

            <form id="storyform" class="formdiv" action="../php/upload.php" enctype="multipart/form-data" method="POST" name="input">

                <div class="formrow">
<!--                    <div class="rowtitle">-->
<!--                        Title of the Story-->
<!--                    </div>-->
                    <div>
                        <label for="title">Title of Story</label><br>
                        <input type="text" name="title" id="title">
                    </div>
                </div>

                <div class="formrow">
<!--                    <div class="rowtitle">-->
<!--                        Story-->
<!--                    </div>-->
                    <div>
                        <label for="content">Story</label><br>
                        <textarea id="content" name="content" class="inputfield" rows="12" cols="60"></textarea><br><br>
                        <script type="text/javascript">
                            CKEDITOR.replace( 'content' );
                        </script>
                    </div>
                </div>

                <div class="formrow">
<!--                    <div class="rowtitle">-->
<!--                        Culture-->
<!--                    </div>-->
                    <label for="culture">Culture</label><br>
                    <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary active">
                                <input type="radio" id="culture" name="culture" value="Chinese" autocomplete="off"
                                       checked="true"> Chinese
                                <span class="flag-icon flag-icon-cn"></span>
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" id="culture" name="culture" value="Greek" autocomplete="off"
                                > Greek
                                <span class="flag-icon flag-icon-gr"></span>
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" id="culture" name="culture" value="Indian" autocomplete="off"
                                > Indian
                                <span class="flag-icon flag-icon-in"></span>
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" id="culture" name="culture" value="Italian" autocomplete="off"> Italian
                                <span class="flag-icon flag-icon-it"></span>
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" id="culture" name="culture" value="Turkish" autocomplete="off">
                                Turkish
                                <span class="flag-icon flag-icon-tr"></span>
                            </label>
                    </div>
                </div>


                <div class="formrow">
<!--                    <div class="rowtitle">-->
<!--                        Image-->
<!--                    </div>-->
                    <div class="forminput">
                        <label for="image">Story Image</label><br>
                        <input type='file' onchange="readURL(this);" name="image" accept="image/*"/>
                        <img id="blah" src="" alt="Please upload an image..."/>
                    </div>
                </div>

                <div class="formrow">
                    <button type="submit" name="submit" value="Post Now" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--footer-->
<section class="rowfooter breath" >
    <div class="col-md-12 footerlinks"  style="background-color: #D66A05;bottom: 0;color: white;">
        <p><br>© 2016 Dream Builders. All Rights Reserved</p>
    </div>
</section>
</body>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script type="text/javascript">
    function OnDropDownChange(dropDown) {
        var selectedValue = dropDown.options[dropDown.selectedIndex].value;
        document.getElementById("culture").value = selectedValue;
    }

</script>
<script src="../js/maporganize.js"></script>
<script type="text/javascript" src="../js/loginform.js"></script>
<script src="../js/dropdownbtn.js"></script>

</html>