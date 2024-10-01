<?php

require_once './connection.php';

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
    <link rel="icon" href="./images/logo.png" />

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
        <source src="./vids/vid2.mp4" type="video/mp4">
    </video>

    <!-- NAVBAR -->
    <nav class="nav-style navbar navbar-expand-lg bg-transparent ">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">
                <img src="./images/logo.jpg" alt="Bootstrap" width="70" height="60">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li>&nbsp; &nbsp; &nbsp; &nbsp;</li>
                    <li>&nbsp; &nbsp; &nbsp; &nbsp;</li>
                    <li>&nbsp; &nbsp; &nbsp; &nbsp;</li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./solar-system.html">
                            <button type="button" class="btn btn-outline-info">3D Universe</button>
                        </a>
                    </li>
                    <li>&nbsp; &nbsp; &nbsp; &nbsp;</li>
                    <li>&nbsp; &nbsp; &nbsp; &nbsp;</li>
                    <li>&nbsp; &nbsp; &nbsp; &nbsp;</li>
                    <li class="nav-item">
                        <a class="nav-link" href="./game/game.php">
                            <button type="button" class="btn btn-outline-info">Start Learning</button>
                        </a>
                    </li>
                    <li>&nbsp; &nbsp; &nbsp; &nbsp;</li>
                    <li>&nbsp; &nbsp; &nbsp; &nbsp;</li>
                    <li>&nbsp; &nbsp; &nbsp; &nbsp;</li>
                    <li class="nav-item">
                        <a class="nav-link" href="./game/progress.php">
                            <button type="button" class="btn btn-outline-info">Profile</button>
                        </a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a class="nav-link" href="./logout.php">
                        <button class="btn btn-outline-danger" type="button">LogOut</button>
                    </a>
                </form>
            </div>
        </div>
    </nav>


    <div class="container py-5">
        <h1 class="proj-name text-center text-warning mb-5">(:- <b><u><i>SPACE SNAP</i></u></b> -:)</h1>
        <h3 class="text-center text-warning mb-5">The Wonders of the Universe</h3>

        <!-- Universe Section -->
        <section class="my-con mb-5 border border-warning-subtle rounded p-3">
            <a href="https://science.nasa.gov/exoplanets/what-is-the-universe/" target="_blank"
                style="text-decoration: none;">
                <h2 class="text-info">The Universe</h2>
            </a>
            <div class="row">
                <div class="col-md-8">
                    <p class="text-white mt-3">
                        The universe is a vast and mysterious expanse that encompasses everything we know—space, time,
                        matter, energy, and all celestial bodies. It's constantly expanding, and scientists estimate its
                        age to be about 13.8 billion years. Despite our advancements, much of the universe remains a
                        mystery, from dark matter and dark energy to the true nature of black holes.
                        <br>
                        The universe is all of space and time and their contents. It comprises all of existence, any
                        fundamental interaction, physical process and physical constant, and therefore all forms of
                        matter and energy, and the structures they form, from sub-atomic particles to entire galactic
                        filaments. Space and time, according to the prevailing cosmological theory of the Big Bang,
                        emerged together 13.787±0.020 billion years ago, and the universe has been expanding ever since.
                        Today the universe has expanded into an age and size that is physically only in parts observable
                        as the observable universe, which is approximately 93 billion light-years in diameter at the
                        present day, while the spatial size, if any, of the entire universe is unknown.
                    </p>
                </div>
                <div class="col-md-4">
                    <!-- Placeholder for Universe Image -->
                    <img src="./images/universe.jpg" class="img-fluid rounded" alt="Universe Image">
                </div>
            </div>
        </section>


        <!-- Planets Section -->
        <section class="my-con mb-5 border border-warning rounded p-3">
            <a href="https://science.nasa.gov/solar-system/planets/" target="_blank" style="text-decoration: none;">
                <h2 class="text-warning">Planets</h2>
            </a>
            <div class="row ">
                <!-- Placeholder for Planet Image -->
                <div class="col-md-4">
                    <img src="./images/planets.jpg" class="img-fluid rounded mt-5" alt="Planets Image">
                </div>
                <div class="col-md-8">
                    <p class="text-info">
                        Our solar system is home to eight major planets, each unique in its composition and atmosphere.
                        From the rocky terrain of Mars to the gas giants like Jupiter and Saturn, planets offer a
                        diverse glimpse into the formation of celestial bodies.
                    </p>
                    <ul class="list-unstyled text-info">
                        <li><strong class="text-success">
                                <h5>Mercury</h5>
                            </strong> - The smallest planet, closest to the Sun.</li>
                        <li><strong class="text-primary">
                                <h5>Venus</h5>
                            </strong> - A scorching hot planet with a thick atmosphere.</li>
                        <li><strong class="text-info">
                                <h5>Earth</h5>
                            </strong> - The only planet known to support life.</li>
                        <li><strong class="text-danger">
                                <h5>Mars</h5>
                            </strong> - Known as the Red Planet, may have hosted water in the past.</li>
                        <li><strong class="text-warning">
                                <h5>Jupiter</h5>
                            </strong> - The largest planet with iconic storms like the Great Red Spot.</li>
                        <li><strong class="text-light">
                                <h5>Saturn</h5>
                            </strong> - Famous for its magnificent ring system.</li>
                        <li><strong class="text-success">
                                <h5>Uranus</h5>
                            </strong> - A planet tilted on its side, known for its blue-green hue.</li>
                        <li><strong class="text-primary">
                                <h5>Neptune</h5>
                            </strong> - The farthest planet, with supersonic winds.</li>
                    </ul>
                </div>
            </div>
        </section>


        <!-- Stars Section -->
        <section class="my-con mb-5 border border-warning rounded p-3">
            <a href="https://science.nasa.gov/universe/stars/" target="_blank" style="text-decoration: none;">
                <h2 class="text-danger">Stars</h2>
            </a>
            <div class="row">
                <div class="col-md-8">
                    <p class="text-info mt-5">
                        Stars are massive, luminous spheres of plasma, held together by gravity. The closest star to
                        Earth is the Sun, which provides the light and heat necessary for life. Stars form from
                        collapsing clouds of gas and dust, and their life cycles range from millions to billions of
                        years.
                    </p>
                    <p class="text-info">
                        Stars are categorized by their temperature and brightness into classes:
                        <span class="text-primary">
                            <h2 class="h2-class">O</h2>
                        </span>, &nbsp; &nbsp; &nbsp; &nbsp;
                        <span class="text-info">
                            <h2 class="h2-class">B</h2>
                        </span>, <br>
                        <span class="text-light">
                            <h2 class="h2-class">A</h2>
                        </span>, &nbsp; &nbsp; &nbsp; &nbsp;
                        <span class="text-warning">
                            <h2 class="h2-class">F</h2>
                        </span>, <br>
                        <span class="text-warning">
                            <h2 class="h2-class">G</h2>
                        </span>, &nbsp; &nbsp; &nbsp; &nbsp;
                        <span class="text-danger">
                            <h2 class="h2-class">K</h2>
                        </span>, <br>
                        <span class="text-danger">
                            <h2 class="h2-class">M</h2>
                        </span>. &nbsp; &nbsp;
                    </p>
                </div>
                <div class="col-md-4">
                    <!-- Placeholder for Stars Image -->
                    <img src="./images/stars.jpeg" class="img-fluid rounded" alt="Stars Image">
                </div>
            </div>
        </section>


        <!-- Galaxies Section -->
        <section class="my-con mb-5 border border-warning rounded p-3">
            <a href="https://science.nasa.gov/universe/galaxies/" target="_blank" style="text-decoration: none;">
                <h2 class="text-primary mb-5">Galaxies</h2>
            </a>
            <div class="row">
                <div class="col-md-4">
                    <!-- Placeholder for Galaxy Image -->
                    <img src="./images/glaxy.jpg" class="img-fluid rounded" alt="Galaxies Image">
                </div>
                <div class="col-md-8">
                    <p class="text-warning">
                        Galaxies are vast collections of stars, planets, gas, and dust bound together by gravity. Our
                        galaxy, the Milky Way, contains billions of stars, including our Sun. Beyond the Milky Way,
                        there are trillions of other galaxies, each with its own unique structure. Some of the most
                        famous types of galaxies include spiral, elliptical, and irregular galaxies.
                        <br>
                        <br>
                        Types of Galaxies:
                        <br>
                        &nbsp; &nbsp; &nbsp; &nbsp;- Spiral Galaxies
                        <br>
                        &nbsp; &nbsp; &nbsp; &nbsp;- Elliptical Galaxies
                        <br>
                        &nbsp; &nbsp; &nbsp; &nbsp;- Lenticular Galaxies
                        <br>
                        &nbsp; &nbsp; &nbsp; &nbsp;- Irregular Galaxies
                        <br>
                        &nbsp; &nbsp; &nbsp; &nbsp;- Active Galaxies
                    </p>
                </div>
            </div>
        </section>


        <!-- Solar System Section -->
        <section class="my-con mb-5 border border-warning rounded p-3">
            <a href="https://science.nasa.gov/solar-system" target="_blank" style="text-decoration: none;">
                <h2 class="text-primary mb-5">Solar System</h2>
            </a>
            <div class="row">
                <div class="col-md-4">
                    <!-- Placeholder for Solar System Image -->
                    <img src="./images/solar-sys.jpg" class="img-fluid rounded" alt="Galaxies Image">
                </div>
                <div class="col-md-8">
                    <p class="text-warning">
                        The solar system has one star, eight planets, five officially named dwarf planets, hundreds of
                        moons, thousands of comets, and more than a million asteroids.
                        <br>
                        <br>
                        Our solar system is located in the Milky Way, a barred spiral galaxy with two major arms, and
                        two minor arms. Our Sun is in a small, partial arm of the Milky Way called the Orion Arm, or
                        Orion Spur, between the Sagittarius and Perseus arms. Our solar system orbits the center of the
                        galaxy at about 515,000 mph (828,000 kph). It takes about 230 million years to complete one
                        orbit around the galactic center.
                        <br>
                        <br>
                        We call it the solar system because it is made up of our star, the Sun, and everything bound to
                        it by gravity.
                    </p>
                </div>
            </div>
        </section>




        <!-- Footer -->
        <!-- Remove the container if you want to extend the Footer to full width. -->
        <!-- <div class="container my-5"> -->
        <footer class="my-footer text-center text-lg-start bg-transparent" style="background-color: #db6930;">
            <div class="container d-flex justify-content-center py-5">
                <a href="https://www.facebook.com/NASA/" target="_blank">
                    <button type="button" class="btn btn-primary bg-transparent btn-lg btn-floating mx-2"
                        style="background-color: #54456b;">
                        <i class="fab fa-facebook">
                            <img src="./images/facebook logo.png" alt="logo">
                        </i>
                    </button>
                </a>
                <a href="https://www.linkedin.com/company/nasa" target="_blank">
                    <button type="button" class="btn btn-primary bg-transparent btn-lg btn-floating mx-2"
                        style="background-color: #54456b;">
                        <i class="fab fa-linkedin">
                            <img src="./images/linkedin logo.jpg" alt="logo">
                        </i>
                    </button>
                </a>
                <a href="https://www.youtube.com/user/NASAtelevision" target="_blank">
                    <button type="button" class="btn btn-primary bg-transparent btn-lg btn-floating mx-2"
                        style="background-color: #54456b;">
                        <i class="fab fa-linkedin">
                            <img src="./images/youtube logo.png" alt="logo">
                        </i>
                    </button>
                </a>
            </div>

            <!-- Copyright -->
            <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2024 Copyright:
                <a class="text-white" href="#">NASA SPACE</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- </div> -->
        <!-- End of .container -->


        <script src="./js/back-vid.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>