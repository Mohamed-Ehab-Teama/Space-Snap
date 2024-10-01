<?php

require_once '../connection.php';

if ($_SESSION['login'] != true) {
    header('location:login.php');
    exit();
}

$name = $_SESSION['username'];
$email = $_SESSION['email'];
$user_id = $_SESSION['user_id'];


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="./images/logo.jpg" />

    <style>
        #myVideo {
            z-index: -10;
        }

        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -100;
        }

        /* Add some content at the bottom of the video/page */
        .content {
            position: fixed;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #f1f1f1;
            width: 100%;
            padding: 20px;
        }

        /* Style the button used to pause/play the video */
        #myBtn {
            width: 200px;
            font-size: 18px;
            padding: 10px;
            border: none;
            background: #000;
            color: #fff;
            cursor: pointer;
        }

        #myBtn:hover {
            background: #ddd;
            color: black;
        }

        ul li h5,
        .h2-class {
            display: inline-block;
        }
    </style>

    <link rel="stylesheet" href="./css/index.css">

</head>

<!-- <body style=" background-image: url(./images/solar-system-bg.jpg); background-size: cover; "> -->

<body>
    <video autoplay muted loop id="myVideo">
        <source src="../vids/vid2.mp4" type="video/mp4">
    </video>


    <div class="container py-5">
        <h1 class="proj-name text-center text-warning mb-5">(:- <b><u><i>SPACE SNAP</i></u></b> -:)</h1>
        <h3 class="text-center text-warning mb-5">ASTROIDS</h3>

        <!-- Universe Section -->
        <section class="my-con mb-5 border border-warning-subtle rounded p-3">
            <a href="https://science.nasa.gov/exoplanets/what-is-the-universe/" target="_blank"
                style="text-decoration: none;">
                <h2 class="text-info">Asteroids</h2>
            </a>
            <div class="row">
                <div class="col-md-8">
                    <p class="text-white mt-3">
                        Asteroids, sometimes called minor planets, are rocky, airless remnants left over from the early formation of our solar system about 4.6 billion years ago.
                        <br>
                        Most asteroids can be found orbiting the Sun between Mars and Jupiter within the main asteroid belt. Asteroids range in size from Vesta – the largest at about 329 miles (530 kilometers) in diameter – to bodies that are less than 33 feet (10 meters) across. The total mass of all the asteroids combined is less than that of Earth's Moon.
                    </p>
                </div>
                <div class="col-md-4">
                    <!-- Placeholder for Universe Image -->
                    <img src="../images/astr.jpeg" class="img-fluid rounded" alt="Universe Image">
                </div>
            </div>
        </section>


        <!-- Planets Section -->
        <section class="my-con mb-5 border border-warning rounded p-3">
            <a href="https://science.nasa.gov/solar-system/planets/" target="_blank" style="text-decoration: none;">
                <h2 class="text-warning">Comets</h2>
            </a>
            <div class="row ">
                <!-- Placeholder for Planet Image -->
                <div class="col-md-4">
                    <img src="../images/com.jpeg" class="img-fluid rounded mt-5" alt="Planets Image">
                </div>
                <div class="col-md-8">
                    <p class="text-info">
                        Comets are frozen leftovers from the formation of the solar system composed of dust, rock, and ices. They range from a few miles to tens of miles wide, but as they orbit closer to the Sun, they heat up and spew gases and dust into a glowing head that can be larger than a planet. This material forms a tail that stretches millions of miles.
                    </p>
                </div>
            </div>
        </section>


        <!-- Stars Section -->
        <section class="my-con mb-5 border border-warning rounded p-3">
            <a href="https://science.nasa.gov/universe/stars/" target="_blank" style="text-decoration: none;">
                <h2 class="text-danger">Meteors</h2>
            </a>
            <div class="row">
                <div class="col-md-8">
                    <p class="text-info mt-5">
                        Asteroids, comets, and meteors are chunks of rock, ice, and metal left over from the formation of our solar system about 4.6 billion years ago.
                    </p>
                </div>
                <div class="col-md-4">
                    <!-- Placeholder for Stars Image -->
                    <img src="../images/metor.jpeg" class="img-fluid rounded" alt="Stars Image">
                </div>
            </div>
        </section>



        <center>
            <a href="../index.php" class="btn btn-secondary btn-block mt-3">Back to Home</a>
        </center>


        <script src="./js/back-vid.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>