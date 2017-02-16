<!DOCTYPE html>
<html>
<head>
    <title>My Now Amazing Webpage</title>
    <link rel="stylesheet" type="text/css" href="../css/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="../css/slick/slick-theme.css"/>
</head>
<body>
<div style="width: 80%; margin: auto">
    <div class="sliderc">

        <?php

        /**
         * Created by PhpStorm.
         * User: nerminyildiz
         * Date: 7.04.2016
         * Time: PM 2:02
         */


        require "zomato.php";

        //change the zomato api key when using
        $zmt_client = new zomato('c31173bf9d57bbc6aeee69445019a82f');

        //Set the options for searching events
        $info = array(
            'data' => array(
                'lat' => '-37.814396',
                'lon' => '144.963616',
                'cuisines' => '25',
                'sort' => 'rating'
            )
        );

        $result = $zmt_client->restaurants('search', $info)["restaurants"];
        ?>

        <div >
            <div id="" class="slick-img"
                 style="background-image: url('<?= $result[0]->restaurant->featured_image ?>');">
            </div>
            <h3> <?= $result[0]->restaurant->name ?> </h3>
            <p> <?= $result[0]->restaurant->user_rating->aggregate_rating ?></p>
        </div>

        <div>
            <div id="" class="slick-img"
                 style="background-image: url('<?= $result[1]->restaurant->featured_image ?>');">
            </div>
            <h3> <?= $result[1]->restaurant->name ?> </h3>
            <p> <?= $result[1]->restaurant->user_rating->aggregate_rating ?></p>
        </div>
        <div>
            <div id="" class="slick-img"
                 style="background-image: url('<?= $result[2]->restaurant->featured_image ?>');">
            </div>
            <h3> <?= $result[2]->restaurant->name ?> </h3>
            <p> <?= $result[2]->restaurant->user_rating->aggregate_rating ?></p>
        </div>
        <div>
            <div id="" class="slick-img"
                 style="background-image: url('<?= $result[3]->restaurant->featured_image ?>');">
            </div>
            <h3> <?= $result[3]->restaurant->name ?> </h3>
            <p> <?= $result[3]->restaurant->user_rating->aggregate_rating ?></p>
        </div>
        <div>
            <div id="" class="slick-img"
                 style="background-image: url('<?= $result[4]->restaurant->featured_image ?>');">
            </div>
            <h3> <?= $result[4]->restaurant->name ?> </h3>
            <p> <?= $result[4]->restaurant->user_rating->aggregate_rating ?></p>
        </div>
        <div>
            <div id="" class="slick-img"
                 style="background-image: url('<?= $result[5]->restaurant->featured_image ?>');">
            </div>
            <h3> <?= $result[5]->restaurant->name ?> </h3>
            <p> <?= $result[5]->restaurant->user_rating->aggregate_rating ?></p>
        </div>
        <div>
            <div id="" class="slick-img"
                 style="background-image: url('<?= $result[6]->restaurant->featured_image ?>');">
            </div>
            <h3> <?= $result[6]->restaurant->name ?> </h3>
            <p> <?= $result[6]->restaurant->user_rating->aggregate_rating ?></p>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../css/slick/slick.min.js"></script>
<!---->
<!--<script type="text/javascript">-->
<!--    $(document).ready(function(){-->
<!--        $('.sliderc').slick({-->
<!--            slidesToShow: 3,-->
<!--            centerMode: true,-->
<!--            centerPadding: '60px',-->
<!--            responsive: [-->
<!--                {-->
<!--                    breakpoint: 768,-->
<!--                    settings: {-->
<!--                        arrows: false,-->
<!--                        centerMode: true,-->
<!--                        centerPadding: '40px',-->
<!--                        slidesToShow: 3-->
<!--                    }-->
<!--                },-->
<!--                {-->
<!--                    breakpoint: 480,-->
<!--                    settings: {-->
<!--                        arrows: false,-->
<!--                        centerMode: true,-->
<!--                        centerPadding: '40px',-->
<!--                        slidesToShow: 1-->
<!--                    }-->
<!--                }-->
<!--            ]-->
<!--    });-->
<!--    });-->
<!--</script>-->
<script type="text/javascript">
    $(document).ready(function () {

        $('.sliderc').slick({
// dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 1,
                }

            }, {
                breakpoint: 800,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2,
                    dots: true,
                    infinite: true,

                }


            }, {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: true,
                    infinite: true,

                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 2000,
                }
            }]
        });


    });
</script>

</body>
</html>
