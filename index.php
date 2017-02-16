<?php
/**
 * Created by PhpStorm.
 * User: Xiao
 * Date: 17/04/2016
 * Time: 12:05 AM
 * Home page of Cross Culture website
 */
session_start();

?>

<!DOCTYPE html>
<html class="" lang="en">
<head>
    <link rel='icon' href='Resim1.png' type='image/x-icon'/ >

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Cross Culture</title>

    <!-- Fontawesome -->

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <!-- Animate -->
    <link rel="stylesheet" href="css/animate.css">

    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"-->
    <!--          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->


    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <link rel="stylesheet" href="css/loginform.css">
    <link rel='stylesheet prefetch'
          href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel='stylesheet prefetch' href='https://octicons.github.com/components/octicons/octicons/octicons.css'>
    <link rel="stylesheet" href="css/dropdownbtn.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <script src="js/pace.js"></script>


    <script type="text/javascript" src="js/jquery.bpopup.min.js"></script>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600" rel="stylesheet" type="text/css">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic'
          rel='stylesheet' type='text/css'>
    <!--simple-line-icons-->

</head>

<body class="  pace-done">
<?php


if (!isset($_SESSION['login_username'])) {
    $get_string = $_SERVER['QUERY_STRING'];
    parse_str($get_string, $get_array);
    if (isset($get_array['logged'])) {
        $name = $get_array['logged'];
        if ($name == 'false') {
            echo '
<script type="text/javascript">'
            , " $(document).ready(function () {
    $('#popup').bPopup({
	    easing: 'easeOutBack', //uses jQuery easing plugin
            speed: 450,
            transition: 'slideDown'
        });
    });
    "
            , '</script>';
        } else if ($name == 'wrong') {
            echo '<script type="text/javascript">'
            , " $(document).ready(function () {
    $('#popup2').bPopup({
	    easing: 'easeOutBack', //uses jQuery easing plugin
            speed: 450,
            transition: 'slideDown'
        });
    });
    "
            , '</script>';
        } else if ($name == 'successful') {
            echo '<script type="text/javascript">'
            , " $(document).ready(function () {
    $('#popup3').bPopup({
	    easing: 'easeOutBack', //uses jQuery easing plugin
            speed: 450,
            transition: 'slideDown'
        });
    });
    "
            , '</script>';
        }
    }
}
?>

<!--Popup Login
==================================== -->
<div style="width: 100%">
    <div id="popupbox" class="module form-module popuplogin">
        <div class="toggle">
            <a class="fa fa-times" href="javascript:login('hide');"></a>
            <div class="tooltip">Click Me</div>
        </div>
        <div class="form">
            <h2>Login to your account</h2>
            <form method="post" name="login" action="php/login.php">
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
        <div class="cta"><a href="pages/registration.php">Sign Up</a></div>
    </div>
</div>


<!--Fixed Navigation
==================================== -->
<header id="navigation" class="nav navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu">
                <h3><i class="fa fa-bars"></i></h3>
            </button>

            <!-- /responsive nav button -->

            <!-- logo -->
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.png" width="200" alt="Logo">
            </a>
            <!-- /logo -->
            <p></p>

        </div>

        <!-- main nav -->
        <nav id="main-menu" class="collapse navigation navbar-collapse navbar-right" role="navigation">
            <ul class="nav navbar-nav hidden-xs ">
                <li><a href="pages/organize.php">
                        <div style="border-style: solid; border-color: white; border-width: thin">
                            &nbsp&nbsp Organize an event &nbsp&nbsp
                        </div>
                    </a>
                </li>
                <li id="admin2" style="width: 105px">
                    <a href="#">Service</a>
                    <div id="menu2" class="menu">
                        <div class="arrow"></div>
                        <a href="pages/event.php?clt=test">Event <span
                                class="icon octicon octicon-list-ordered"></span></a>
                        <a href="pages/community.php">Community <span class="icon octicon octicon-organization"></span></a>
                        <a href="pages/story.php">Story <span class="icon octicon octicon-squirrel"></span></a>
                    </div>
                </li>
                <li id="admin1" style="width: auto;">
                    <?php


                    if (isset($_SESSION['login_username'])) {

                        echo '<a href="#">' . $_SESSION['login_username'] . ' </a>';
                        echo '<div id="menu1" class="menu">
                            <div class="arrow"></div>
                            <a href="pages/myprofile.php">My Profile <span class="icon octicon octicon-person"></span></a>
                            <a href="pages/myevent.php">My Events <span class="icon octicon octicon-tasklist"></span></a>
                            <a href="pages/mystory.php">My Stories <span class="icon octicon octicon-rocket"></span></a>
                            <a href="pages/poststory.php">Post Story<span class="icon octicon octicon-pencil"></span></a>
                            <a href="php/logout.php">Logout <span class="icon octicon octicon-sign-out"></span></a>
                        </div>';
                    } else {
                        echo '<a href="javascript:login(\'show\');">login </a>';
                    }
                    ?>

                </li>
            </ul>


            <!-------------- mobile----------------- --->
            <ul id="mobnav" class="nav navbar-nav visible-xs">
                <?php
                if (isset($_SESSION['login_username'])) {
                    echo '<li><a href="#">' . $_SESSION['login_username'] . '<i class="fa fa-user pull-right" aria-hidden="true"></i></a></li>';

                    ?>
                    <li><a href="index.php">Home<i class="fa fa-home pull-right" aria-hidden="true"></i></a></li>
                    <li><a href="pages/event.php?clt=test">Event<i class="fa fa-list-ol pull-right"
                                                                   aria-hidden="true"></i></a></li>
                    <li><a href="pages/community.php">Community<i class="fa fa-university pull-right"
                                                                  aria-hidden="true"></i></a></li>
                    <li><a href="pages/story.php">Story<i class="fa fa-paper-plane pull-right"
                                                          aria-hidden="true"></i></a></li>

                    <?php
                    echo '<li><a href="php/logout.php">Logout<i class="fa fa-sign-out pull-right" aria-hidden="true"></i></a></li>';

                } else {
                    echo '<li><a href="index.php">Home<i class="fa fa-home pull-right" aria-hidden="true"></i></a></li>';
                    echo '<li><a href="pages/event.php?clt=test">Event<i class="fa fa-list-ol pull-right" aria-hidden="true"></i></a></li>';
                    echo '<li><a href="pages/community.php">Community<i class="fa fa-university pull-right" aria-hidden="true"></i></a></li>';
                    echo '<li><a href="pages/story.php">Story<i class="fa fa-paper-plane pull-right" aria-hidden="true"></i></a></li>';
                    echo '<li><a href="javascript:login(\'show\');">Login<i class="fa fa-sign-in pull-right" aria-hidden="true"></i></a></li>';
                }
                ?>
            </ul>
        </nav>


    </div>

</header>
<!--
End Fixed Navigation
==================================== -->

<!---->
<!--<div style="display: none;" class="preloader">-->
<!--    <div class="pace  pace-inactive">-->
<!--        <div data-progress="99" data-progress-text="100%" style="width: 100%;" class="pace-progress">-->
<!--            <div class="pace-progress-inner"></div>-->
<!--        </div>-->
<!--        <div class="pace-activity"></div>-->
<!--    </div>-->
<!--</div>-->
<!---->

<!-- -- ******************** Banner SECTION ******************** ---->
<main id="top" class="masthead" role="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 ">
                <div class="logo"><a href="index.php#"><img src="images/logo.png" style="width: 80%" alt="logo"></a>
                </div>
            </div>
        </div>


        <h1>The Most Excellent <strong>Cultural Event Platform</strong> <br>
            to <strong>enjoy</strong> your new life.</h1>

        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3 subscribe">
                <!--                <form class="form-horizontal" role="form" id="subscribeForm">-->
                <!--                    <div class="form-group">-->
                <!--                        <div class="col-md-7 col-sm-6 col-sm-offset-1 col-md-offset-0">-->
                <div id="eventmenu" class="dropdown">
                    <button data-toggle="dropdown" class="form-control drop-cl" type="button"
                            id="dropdownMenu1" aria-haspopup="true" aria-expanded="true">- Find Event -<span
                            class="caret pull-right"
                            style="border-left-width: 8px; border-right-width: 8px; border-top-width: 10px; margin-top: 7px"></span>
                    </button>
                    <ul class="dropdown-menu form-control drop-item" aria-labelledby="dropdownMenu1">
                        <li><a id="aclt">All Cultures</a></li>
                        <li role="separator" class="divider" style="margin: 0px;"></li>
                        <li><a id="cnclt">Chinese</a></li>
                        <li><a id="inclt">Indian</a></li>
                        <li><a id="grclt">Greek</a></li>
                        <li><a id="itclt">Italian</a></li>
                        <li><a id="trclt">Turkish</a></li>

                    </ul>
                </div>
                <!--                        </div>-->
                <!--                        <div class="col-md-5 col-sm-4">-->
                <!--                            <button id="febtn" type="button" class="btn btn-success btn-lg">FIND EVENTS</button>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </form>-->
            </div>

            <span id="result" class="alertMsg"></span>
        </div>

        <a href="#community" class="scrollto">
            <p>SCROLL DOWN TO EXPLORE</p>
            <p class="scrollto--arrow"><img src="images/scroll_down.png" alt="scroll down arrow"></p>
        </a>
    </div><!-- --/container ---->
</main><!-- --/main ---->
<div id="down" style="margin-bottom: 3%"></div>

<!-- -- ******************** Community SECTION ******************** ---->
<div>
    <div id="community" class="section-title">
        <h2>Communities</h2>
        <p>Find your own community and meet people of your culture </p>
    </div>

    <section class="row">
        <div class="container">
            <div class="row">

                <!-- PORTFOLIO IMAGE 1 -->
                <div class="col-md-4 col-sm-6">
                    <div class="grid mask">
                        <figure>
                            <a href="pages/community.php?clt=test"><img class="img-responsive"
                                                                        src="images/community/cworld.jpg" alt=""></a>
                            <figcaption>
                                <h5>All Communities</h5>
                                <a data-toggle="modal" href="pages/community.php?clt=test"
                                   class="btn btn-primary btn-lg">Take a
                                    Look</a>
                            </figcaption><!-- /figcaption -->
                        </figure><!-- /figure -->
                    </div><!-- /grid-mask -->
                </div><!-- /col -->


                <!-- PORTFOLIO IMAGE 2 -->
                <div class="col-md-4 col-sm-6">
                    <div class="grid mask">
                        <figure>
                            <a href="pages/community.php?clt=China"><img class="img-responsive"
                                                                         src="images/community/cnc.jpg" alt=""></a>
                            <figcaption>
                                <h5>Chinese Communities</h5>
                                <a data-toggle="modal" href="pages/community.php?clt=China"
                                   class="btn btn-primary btn-lg">Take a
                                    Look</a>
                            </figcaption><!-- /figcaption -->
                        </figure><!-- /figure -->
                    </div><!-- /grid-mask -->
                </div><!-- /col -->

                <!-- PORTFOLIO IMAGE 3 -->
                <div class="col-md-4 col-sm-6">
                    <div class="grid mask">
                        <figure>
                            <a href="pages/community.php?clt=Italian"><img class="img-responsive"
                                                                           src="images/community/cit.jpg" alt=""></a>
                            <figcaption>
                                <h5>Italian Communities</h5>
                                <a data-toggle="modal" href="pages/community.php?clt=Italian"
                                   class="btn btn-primary btn-lg">Take a
                                    Look</a>
                            </figcaption><!-- /figcaption -->
                        </figure><!-- /figure -->
                    </div><!-- /grid-mask -->
                </div><!-- /col -->

                <!-- PORTFOLIO IMAGE 1 -->
                <div class="col-md-4  col-sm-6">
                    <div class="grid mask">
                        <figure>
                            <a href="pages/community.php?clt=Greek"><img class="img-responsive"
                                                                         src="images/community/cgr.jpg" alt=""></a>
                            <figcaption>
                                <h5>Greece Communities</h5>
                                <a data-toggle="modal" href="pages/community.php?clt=Greek"
                                   class="btn btn-primary btn-lg">Take a
                                    Look</a>
                            </figcaption><!-- /figcaption -->
                        </figure><!-- /figure -->
                    </div><!-- /grid-mask -->
                </div><!-- /col -->


                <!-- PORTFOLIO IMAGE 2 -->
                <div class="col-md-4 col-sm-6">
                    <div class="grid mask">
                        <figure>
                            <a href="pages/community.php?clt=Indian"><img class="img-responsive"
                                                                          src="images/community/cin.jpg" alt=""></a>
                            <figcaption>
                                <h5>Indian Communities</h5>
                                <a data-toggle="modal" href="pages/community.php?clt=Indian"
                                   class="btn btn-primary btn-lg">Take a
                                    Look</a>
                            </figcaption><!-- /figcaption -->
                        </figure><!-- /figure -->
                    </div><!-- /grid-mask -->
                </div><!-- /col -->

                <!-- PORTFOLIO IMAGE 3 -->
                <div class="col-md-4 col-sm-6">
                    <div class="grid mask">
                        <figure>
                            <a href="pages/community.php?clt=Turkish"><img class="img-responsive"
                                                                           src="images/community/ctr.jpg" alt=""></a>
                            <figcaption>
                                <h5>Turkish Communities</h5>
                                <a data-toggle="modal" href="pages/community.php?clt=Turkish"
                                   class="btn btn-primary btn-lg">Take a
                                    Look</a>
                            </figcaption><!-- /figcaption -->
                        </figure><!-- /figure -->
                    </div><!-- /grid-mask -->
                </div><!-- /col -->
            </div><!-- /row -->

        </div><!-- /row -->
    </section><!-- --/section ---->

</div><!-- --/highlight Testimonials ---->


<!-- -- ******************** FOOTER ******************** ---->
<main class="footercta" role="main">
    <div class="container">
        <h1>The <strong> Easiest Way </strong> to Get <br>
            to Your Own <strong> Culture</strong></h1>
    </div><!-- --/container ---->
</main><!-- --/main ---->

<section class="rowfooter breath">
    <div class="col-md-12" style="background-color: black; text-align: center">
        <p><br>© 2016 Dream Builders. All Rights Reserved</p>
    </div>
</section>

<div id="popup">
    <span class="button b-close"><span>X</span></span>
    <span class="logo">Sorry. <br> Please log in first.</span><br>

</div>
<div id="popup2">
    <span class="button b-close"><span>X</span></span>
    <span class="logo">Sorry. <br> Your username or password was wrong.</span><br>

</div>

<div id="popup3">
    <span class="button b-close"><span>X</span></span>
    <span class="logo">Registration Successful<br>You can login now</span><br>

</div>

<script src="js/easing.js"></script>
<script src="js/nicescroll.js"></script>
<!-- main jQuery -->

<!-- Bootstrap -->
<script src="js/jquery.nav.js"></script>
<!-- Portfolio Filtering -->
<script src="js/jquery.mixitup.min.js"></script>
<!-- Fancybox -->
<script src="js/jquery.fancybox.pack.js"></script>
<!-- Parallax sections -->
<script src="js/jquery.parallax-1.1.3.js"></script>
<!-- jQuery Appear -->
<script src="js/jquery.appear.js"></script>
<!-- countTo -->
<script src="js/jquery-countTo.js"></script>
<!-- owl carousel -->
<script src="js/owl.carousel.min.js"></script>
<!-- WOW script -->
<script src="js/wow.min.js"></script>
<!-- theme custom scripts -->
<script src="js/main.js"></script>

<!--Control dropdown menu and community links-->

<script type="text/javascript">
    var culture = 'select';
    $(function () {
        $('.scrollto, .gototop').bind('click', function (event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
    });
    document.getElementById('aclt').addEventListener("click", function () {
        culture = 'test';
        document.getElementById('dropdownMenu1').innerHTML = 'All Cultures';
        window.location = "pages/event.php?clt=" + culture;
    });
    document.getElementById('cnclt').addEventListener("click", function () {
        culture = 'Chinese OR China';
        document.getElementById('dropdownMenu1').innerHTML = 'Chinese';
        window.location = "pages/event.php?clt=" + culture;
    });
    document.getElementById('inclt').addEventListener("click", function () {
        culture = 'Indian OR India';
        document.getElementById('dropdownMenu1').innerHTML = 'Indian';
        window.location = "pages/event.php?clt=" + culture;
    });
    document.getElementById('grclt').addEventListener("click", function () {
        culture = 'Greek OR Greece';
        document.getElementById('dropdownMenu1').innerHTML = 'Greek';
        window.location = "pages/event.php?clt=" + culture;
    });
    document.getElementById('trclt').addEventListener("click", function () {
        culture = 'Turkish OR Turkey';
        document.getElementById('dropdownMenu1').innerHTML = 'Turkish';
        window.location = "pages/event.php?clt=" + culture;
    });
    document.getElementById('itclt').addEventListener("click", function () {
        culture = 'Italian OR Italy';
        document.getElementById('dropdownMenu1').innerHTML = 'Italian';
        window.location = "pages/event.php?clt=" + culture;
    });
    //    document.getElementById('febtn').addEventListener("click", function () {
    //        if (culture === 'select') {
    //            alert('Please select one option');
    //        } else {
    //            window.location = "pages/event.php?clt=" + culture;
    //        }
    //
    //    });

</script>
<script type="text/javascript" src="js/loginform.js"></script>
<script src="js/dropdownbtn.js"></script>


</body>
</html>
