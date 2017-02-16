<?php
/**
 * Created by PhpStorm.
 * User: nerminyildiz
 * Date: 20.04.2016
 * Time: AM 12:39
 * Function: Registration page, enter personel information the register
 */
session_start();
if (isset($_SESSION['login_username'])) {
    header("Location:../index.php");
}
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js" type="text/
javascript"></script>
    <script src="../jQuery-Validation-Engine/js/jquery.validationEngine.js"></script>
    <script src="../jQuery-Validation-Engine/js/languages/jquery.validationEngine-en.js"></script>
    <link rel="stylesheet" href="../jQuery-Validation-Engine/css/validationEngine.jquery.css" type="text/css"/>




</head>
<body>

<!--popup login-->
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
                            <a href="#">My Profile <span class="icon octicon octicon-person"></span></a>
                            <a href="myevent.php">My Events <span class="icon octicon octicon-tasklist"></span></a>
                            <a href="#">My stories <span class="icon octicon octicon-rocket"></span></a>
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
    <h2>Registration</h2>
    <h4>Register as a new user and join us.</h4>
</div>

<!--registration form for user to fill to register-->
<div class="container-fluid contentdiv">
    <div class="row">
        <div class="col-md-11 col-md-offset-1 col-xs-12 col-xs-offset-0">

        <form id="regform" class="formdiv" action="insertuser.php" method="POST" name="input" accept-charset="utf-8">
            <fieldset class="form-group row">
                <div class="col-md-5">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="validate[required] form-control">
                </div>
            </fieldset>
            <div class="row">
                <fieldset class="form-group col-md-5 col-xs-12">
                    <label for='regpwd'>Password</label>
                    <input type='password' id='regpwd' name='regpwd' class="form-control">
                    <script type="text/javascript">
                        var pwdwidget = new PasswordWidget('thepwddiv', 'regpwd');
                        pwdwidget.txtShow = 'Display';
                        pwdwidget.txtMask = 'Hide';
                        pwdwidget.MakePWDWidget();
                    </script>
                </fieldset>
                <div class="col-md-1"></div>
                <fieldset class="form-group col-md-5 col-xs-12">
                    <label for="repassword">Re-type Password</label>
                    <input type="password" name="repassword" id="repassword" class="form-control">
                </fieldset>
            </div>
            <div class="row">
                <fieldset class="form-group col-md-5 col-xs-12">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" id="firstname" class="form-control">
                </fieldset>
                <div class="col-md-1"></div>
                <fieldset class="form-group col-md-5 col-xs-12">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" id="lastname" class="form-control">
                </fieldset>
            </div>
            <fieldset class="form-group row">
                <div class="col-md-5">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email" class="form-control"/>
                </div>
            </fieldset>
            <fieldset class="form-group row">
                <div class="col-md-5">
                    <label for="dob">Date of Birth</label>
                    <div class='input-group date'>
                        <input type="text" name="dob" id="dob" class="form-control"/>
                    </div>
                </div>
                <script type="text/javascript">
                    var date = new Date(2006,0,1);
                    $(function () {
                        $('#dob').datetimepicker({
                            format: "DD-MM-YYYY",
                            maxDate: date
                        });
                    });

                </script>
            </fieldset>
            <fieldset class="form-group row">
                <div class="col-md-5">
                    <label for="nationality">Country</label>

                    <div class="bfh-selectbox bfh-countries" data-country="AU" data-flags="true">
                        <input type="hidden" value="">
                        <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                            <span class="bfh-selectbox-option input-medium" data-option=""></span>
                            <b class="caret"></b>
                        </a>
                        <div class="bfh-selectbox-options">
                            <input type="text" name="nationality" id="nationality" class="bfh-selectbox-filter">
                            <div role="listbox">
                                <ul role="option">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset class="form-group row">
                <div class="col-md-5">
                    <label for="gender">Gender</label>
                    <br>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="radio" name="gender" id="gender" value="Male" autocomplete="off"
                                   checked="true"> Male
                            <i class="fa fa-male" aria-hidden="true"></i>
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="gender" id="gender" value="Female" autocomplete="off"> Female
                            <i class="fa fa-female" aria-hidden="true"></i>
                        </label>
                    </div>
                </div>
            </fieldset>
            <fieldset class="form-group row">
                <div class="col-md-10">
                    <label for="gender">Interest</label>
                    <br>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="radio" id="interest" name="interest" value="Chinese" autocomplete="off"
                                   checked="true"> Chinese
                            <span class="flag-icon flag-icon-cn"></span>
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" id="interest" name="interest" value="Greek" autocomplete="off"
                            > Greek
                            <span class="flag-icon flag-icon-gr"></span>
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" id="interest" name="interest" value="Indian" autocomplete="off"
                            > Indian
                            <span class="flag-icon flag-icon-in"></span>
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" id="interest" name="interest" value="Italian" autocomplete="off"> Italian
                            <span class="flag-icon flag-icon-it"></span>
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" id="interest" name="interest" value="Turkish" autocomplete="off">
                            Turkish
                            <span class="flag-icon flag-icon-tr"></span>
                        </label>
                    </div>
                </div>
            </fieldset>
            <fieldset class="form-group row">
                <div class="col-md-6">
                    <label for="autocomplete">Address</label>
                    <div class="input-group input-group-lg" style="height: 34px">
                        <span class="input-group-addon" id="sizing-addon1" style="padding-bottom: 4px;padding-top: 4px"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                        <input id="autocomplete" placeholder="Enter your address"
                               type="text" class="form-control" style="position: relative; padding-bottom: 6px;padding-top: 6px">
                    </div>

                </div>
                <div class="row" style="margin-top: 10px" hidden="true">
                    <div id="map" class="col-lg-5 col-md-6 col-sm-8 col-xs-12"></div>
                </div>
                <div class="row" hidden="true">
                    <table id="address">
                        <tr>
                            <td class="label">Street address</td>
                            <td class="slimField">
                                <input class="field" id="street_number" name="street_number"></td>
                            <td class="wideField" colspan="2">
                                <input class="field" id="route" name="route"></td>
                        </tr>
                        <tr>
                            <td class="label">City</td>
                            <td class="wideField" colspan="3">
                                <input class="field" id="locality" name="locality"></td>
                        </tr>
                        <tr>
                            <td class="label">State</td>
                            <td class="slimField">
                                <input class="field" id="administrative_area_level_1"
                                       name="administrative_area_level_1"></td>
                            <td class="label">Zip code</td>
                            <td class="wideField">
                                <input class="field" id="postal_code" name="postal_code"></td>
                        </tr>
                        <tr>
                            <td class="label">Country</td>
                            <td class="wideField" colspan="3">
                                <input class="field" id="country" name="country"></td>
                        </tr>
                        <tr>
                            <td class="label">Longitude</td>
                            <td class="wideField" colspan="3">
                                <input class="field" id="longitude" name="longitude"></td>
                        </tr>
                        <tr>
                            <td class="label">Latitude</td>
                            <td class="wideField" colspan="3">
                                <input class="field" id="latitude" name="latitude"></td>
                        </tr>
                    </table>
                </div>
            </fieldset>

            <fieldset class="form-group row">
                <div class="col-md-6">
                <img id="captcha" src="../php/captcha.php" width="160" height="45" border="1" class="img-rounded" alt="CAPTCHA">
                    <small><a href="#" onclick="document.getElementById('captcha').src = '../php/captcha.php?' + Math.random();
  document.getElementById('captcha_code').value = '';
  return false;
">refresh</a></small>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-3" style="margin-top: 10px">
                <input id="captcha_code" type="text" name="captcha" class="form-control " size="6" maxlength="5"
                          onkeyup="this.value = this.value.replace(/[^\d]+/g, '');">
                    <small>copy the digits from the image into this box</small>
                </div>

            </fieldset>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">
                Submit
            </button>
        </form>
        </div>
    </div>
</div>

<!--footer-->
<section class="rowfooter breath container-fluid" style="padding: 0px">
    <div class="row">
        <div class="col-md-12"
             style="background-color: #D66A05; color:white; text-align: center; height: 60px;">
            <p><br>© 2016 Dream Builders. All Rights Reserved</p>
        </div>
    </div>
</section>

<script type="text/javascript">
    function OnDropDownChange(dropDown) {
        var selectedValue = dropDown.options[dropDown.selectedIndex].value;
        document.getElementById("interest").value = selectedValue;
    }

</script>
<script type="text/javascript">
    //validation for the registration form
    var frmvalidator = new Validator("regform");
    frmvalidator.addValidation("username", "req", "Please enter username");
    frmvalidator.addValidation("username", "maxlen=10  ", "Username length should be maximum 10");
    frmvalidator.addValidation("regpwd", "req", "Please enter password");
    frmvalidator.addValidation("firstname", "req", "Please enter your firstname");
    frmvalidator.addValidation("lastname", "req", "Please enter your lastname");
    frmvalidator.addValidation("email", "email");
    frmvalidator.addValidation("regpwd", "minlen=6  ", "Password length should be at least 6");
    frmvalidator.addValidation("regpwd", "eqelmnt=repassword", "Password should match re-type password");
    frmvalidator.addValidation("firstname", "alpha");
    frmvalidator.addValidation("lastname", "alpha");
    frmvalidator.addValidation("nationality", "alpha");
    frmvalidator.addValidation("suburb", "alpha");
    frmvalidator.addValidation("captcha", "req", "Please enter the captcha digits in the box provided");
</script>
</body>
<script type="text/javascript" src="../js/loginform.js"></script>
<script src="../js/dropdownbtn.js"></script>

<script src="../js/maporganize.js"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAohlvHFSdn17Csms1_VTA-BNkvc4aJ9YY&libraries=places&callback=initAutocomplete"
        async defer></script>

</html>
