<?php

session_start();

    if (isset($_POST["email"])) {
        $email = strip_tags($_POST["email"]);
        if (empty($email)) {
            $db = "steveyou_users";
            $user = "steveyou_admin";
            $password = "Admin@@2030";
            $host = "localhost";

            $conn = mysqli_connect($user, $password, $host, $db);
            $sql = "SELECT * FROM subscribers WHERE email = ('$email')";

            $result = mysqli_query($conn, $sql);
            $rows = mysqli_num_rows($result);

            if ($rows > 0) {
                $emailErr = "Subscriber already exists";
            } else {
                $sql = "INSERT INTO subscribers (email) VALUES ('$email')";
                mysqli_query($conn, $sql);
                $emailErr = "You have successfully subscribed.";

                // closing the database
                mysqli_close($conn);
            }
        } else {
            $emailErr = "An error occurred, please try again";
        }
    }

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Steve Younglion | Home</title>
    <meta name="description" content="Home page for steve younglion. Fitness trainer, team builder, motivational speaker and events security provider, Winner of the Nairobi Strongest man challenge">
    <meta name="author" content="FabDesignskenya">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css2/base.css" />
    <link rel="stylesheet" href="css2/slider.css" />
    <link rel="stylesheet" href="css/normalize2.css" />
    <link rel="stylesheet" href="css/component.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">



    <!-- Flexislider-CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css" media="all" />
    <!-- Owl-Carousel-CSS -->

    <!-- //For testimonials -->
    <script src="js/modernizr-custom.js"></script>

	<?php // TODO: add google analytics?>

    <script>
        document.documentElement.className = "js";
        var supportsCssVars = function() {
            var e, t = document.createElement("style");
            return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS &&
                window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode.removeChild(
                t), e
        };
        supportsCssVars() || alert("Please view this demo in a modern browser that supports CSS Variables.");
    </script>

    <link rel="stylesheet" href="css/style2.css">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">


    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora:700italic' rel='stylesheet' type='text/css'>

</head>

<?php // TODO: make the website a PWA?>

<?php // TODO: add structured data?>

<body>

    <nav class="navbar navbar-expand-md bg-dark fixed-top pt-3 pb-3 navbar-dark">
        <div class="border ">
            <a href="#" class="navbar-brand text-light text-uppercase pl-3">Steve Younglion</a>

        </div>
        <button class="navbar-toggler text-light " type="button" data-toggle="collapse" data-target="#collapse-navbar">
            <span class="navbar-toggler-icon ">

            </span>
        </button>
        <div id="collapse-navbar" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto mr-5 text-uppercase">
                <li class="nav-item ">

                    <a href="#home" class="nav-link text-light active">
                        Home
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="workouts/workouts.html" class="nav-link text-light">
                        workouts

                    </a>
                </li>
                <li class="nav-item">
                    <a href="nutrition/nutrition.html" class="nav-link text-light">
                        nutrition

                    </a>
                </li>
                <li class="nav-item">

                    <a href="gallery/gallery.html" class="nav-link  text-light">
                        gallery

                    </a>
                </li>
                <li class="nav-item">
                    <a href="shop/shop.php" class="nav-link text-light">
                        shop
                    </a>
                </li>
            </ul>


        </div>

    </nav>

    <!-- =========================
    HOME SECTION
============================== -->

    <section class="demo-1" id="home">

        <div class="header" data-aos="fade-in">

            <br />
            <br/>
            <br />
            <div class="agile-logo">
                <h1>
                <a href="index.html">Steve</a>
                <span>Younglion</span>
            </h1>
            </div>
            <div class="clearfix"></div>


        </div>

        <main>
            <div class="content">
                <!-- Pieces Slider -->
                <div class="row">

                    <div class="pieces-slider ">
                        <!-- Each slide with corresponding image and text -->
                        <div class="pieces-slider__slide ">
                            <img class="pieces-slider__image " src="gallery/images/workouts/IMG_20180428_103233.jpg " alt=" ">
                            <h2 class="pieces-slider__text ">Personal Training</h2>
                        </div>
                        <div class="pieces-slider__slide ">
                            <img class="pieces-slider__image " src="images/home-flex.jpg" alt=" ">
                            <h2 class="pieces-slider__text ">Event security provider</h2>
                        </div>

                        <div class="pieces-slider__slide ">
                            <img class="pieces-slider__image " src="gallery/images/hike/IMG-20170725-WA0022.jpg" alt=" ">
                            <h2 class="pieces-slider__text ">Team building</h2>
                        </div>

                        <!-- Canvas to draw the pieces -->
                        <canvas class="pieces-slider__canvas col-md-12 "></canvas>
                        <!-- Slider buttons: prev and next -->
                        <button class="pieces-slider__button pieces-slider__button--prev ">prev</button>
                        <button class="pieces-slider__button pieces-slider__button--next ">next</button>
                    </div>
                </div>
            </div>
        </main>

    </section>

    <!-- =========================
    TRAINER SECTION
============================== -->
    <section id="trainer" class="container-fluid mt-5 pt5">
        <!-- team -->
        <div id="trainers" class="team">
            <h3 class="heading text-capitalize" data-aos="fade-down" data-aos-duration="2000">Meet The Younglion</h3>
            <div class="container">
                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-5 text-center" data-aos="fade-right" data-aos-duration="2000">
                        <div class="hover14 column ">
                            <figure>
                                <img src="images/raising_hands.jpg" alt=" " class="img-fluid" />
                            </figure>
                        </div>


                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4 about-steve" data-aos="fade-left" data-aos-duration="2000">
                        <p>Steve Younglion is one of the most influential professional fitness trainers in the world. Owner of Younglion fitness sportsware and winner of the strongest man competitions (2018), he is a fitness entrepreneur, motivational speaker, personal fitness trainer and an events security provider. Steve has immense popularity not just because of his amazing physique, but for his character and high standards in representing the sports fitness industry.

                            <div class="text-center">
								<span class="pt-3">Get in touch with him:</span>
								<br>
								<br>

                                <a href="https://www.facebook.com/Steve-Young-Lion-1675044742798058/">
                                <i class="fa fa-facebook " aria-hidden="true "></i>
                            </a>
                                <a href="https://www.youtube.com/channel/UC5epRbc5wYxaGVWQGc5PQEw">
                                <i class="fa fa-youtube" aria-hidden="true "></i>
                            </a>
                                <a href="https://www.instagram.com/steve_younglion/">
                                <i class="fa fa-instagram " aria-hidden="true "></i>
                            </a>

                                <br />
                                <br />

                            </div>


                        </p>
                    </div>

                    <br />
                    <br />

                    <div class="clearfix "> </div>
                </div>
            </div>
        </div>

        <br />
        <br />

        <!-- team -->
    </section>

    <!-- =========================
    NUTRITION SECTION
============================== -->
    <section id="nutrition " class="jumbotron jumbotron-fluid ">
        <div class="row ">

            <div class="col-md-1 "></div>

            <div class="col-md-5 " data-aos="fade-right" data-aos-duration="2000">
                <img src="images/food.jpg" class="img-fluid pt-5 ml-auto d-block rounded pl-20 " alt="nutrition plans ">
            </div>

            <div class="col-md-1 "></div>

            <div class="wow fadeInUp col-md-4 col-sm-12 text-center " data-wow-delay="1s ">
                <div class="overview-detail " data-aos="fade-left" data-aos-duration="2000">
                    <br />
                    <br />
                    <h2 class="Nutrition font-weight-light text-center ">Nutrition</h2>
                    <p>Nutrition has a significant impact on your results. Abs are built in the kitchen, you are what you eat, and all the rest. "Yeah, yeah," you mutter, "I've heard it all before."</p>
                    <p>Seriously, though: You might be wreaking utter havoc in the gym, but research indicates that what you eat before, during, and after your workout may be the difference between meeting your goals and falling short.We'll show you how
                        to harness the power of peri-workout nutrition so you can perform, recover, and grow faster than a weed.</p>
                    <a href="nutrition/nutrition.html" class="btn btn-primary">Diet Plans</a>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================
    items SECTION
============================== -->
    <h2 class="heading text-center text-underline text-secondary text-uppercase " data-aos="fade-down" data-aos-duration="2000">
        Our products
    </h2>
    <br>
    <br>
    <section id="products " class="mask " data-aos="fade-up" data-aos-duration="2000">
        <div class="row mt-4">
            <main class="col-sm-12 ">

                <div class="page-view ">
                    <div class="project ">
                        <div class="text ">
                            <h1>Supplements
                                <br />

                                <a href="shop/shop.php" class="btn btn-primary ">order now</a>
                            </h1>
                        </div>
                    </div>
                    <div class="project ">
                        <div class="text ">
                            <h1>Gym shoes
                                <br />

                                <a href="shop/shop.php" class="btn btn-primary ">order now</a>
                            </h1>

                        </div>
                    </div>
                    <div class="project ">
                        <div class="text ">
                            <h1>Gym apparel
                                <br />

                                <a href="shop/shop.php" class="btn btn-primary ">order now</a>
                            </h1>
                        </div>
                    </div>
                    <div class="project ">
                        <div class="text ">
                            <h1>jerseys
                                <br />

                                <a href="shop/shop.php" class="btn btn-primary ">order now</a>
                            </h1>

                        </div>
                    </div>
                    <nav class="arrows ">
                        <div class="arrow previous ">
                            <svg viewBox="208.3 352 4.2 6.4 ">
                                <polygon class="st0 " points="212.1,357.3 211.5,358 208.7,355.1 211.5,352.3 212.1,353 209.9,355.1 " />
                            </svg>
                        </div>
                        <div class="arrow next ">
                            <svg viewBox="208.3 352 4.2 6.4 ">
                                <polygon class="st0 " points="212.1,357.3 211.5,358 208.7,355.1 211.5,352.3 212.1,353 209.9,355.1 " />
                            </svg>
                        </div>
                    </nav>
                </div>
            </main>
        </div>
    </section>



    <h2 class="text-center text-uppercase mt-3 heading" data-aos="fade-down" data-aos-duration="2000" id="workouts">Workout articles</h2>

    <div class="w3ls-about-grids ">
        <div class="row ">
            <div class="col-md-4 col-sm-4 abt-btm-grid w3ls-ma " data-aos="fade-right" data-aos-duration="2000">
				<a href="workouts/4-physique-problems.html">
	                <img src="images/flex-1.jpg " class="img-fluid " alt="worouts article" />
					<div class="container">
						<div class="layer ">
		                    <h3>Four physique problems and how to solve them</h3>
		                    <p>The four most common flaws in the male physique have some proven fixes!</p>
		                </div>
					</div>
				</a>

            </div>
            <div class="col-md-4 col-sm-4 abt-btm-grid w3ls-ma " data-aos="fade-up" data-aos-duration="2000">
				<a href="workouts/build-killer-bench.html">
	                <img src="images/team-2.jpg" class="img-fluid " alt="images " />
	                <div class="layer ">
	                    <h3>Build Bench With Fewer Injuries Using Conjugate Training</h3>
	                    <p>How to build a crazy bench with fewer injuries on yourself.</p>
	                </div>
				</a>
            </div>
            <div class="col-md-4 col-sm-4 abt-btm-grid w3ls-ma " data-aos="fade-left" data-aos-duration="2000">
				<a href="workouts/transform-from-dad-to-rad.html">
	                <img src="images/pool.jpg" class="img-fluid" alt="images " />
	                <div class="layer">
	                    <h3>Transform your bod from dad to rad</h3>
	                    <p>If you're a dad, you want to do more than just talk to your kids. You gotta be fit.</p>
	                </div>
				</a>
            </div>


        </div>
		<div class="text-center pt-4">
			<a href="workouts/workuts.html" class="text-center text-capitalize">more workout articles <i class="fa fa-arrow-right text-primary"></i></a>
		</div>
    </div>


    <!-- clients section
    <div data-target="clients " class="clients " id="clients ">
        <!-- clients
        <div class="w3agile-spldishes ">
            <h3 class="heading animated infinite bounce">What client's say</h3>
            <div class="container ">
                <div class="spldishes-agileinfo ">
                    <div class="spldishes-grids ">
                        <!-- Owl-Carousel
                        <div id="owl-demo " class="owl-carousel text-center agileinfo-gallery-row ">
                            <div class="item g1 ">
                                <img class="lazyOwl " src="images/c1.jpg " title="Our latest gallery " alt=" " />
                                <div class="agile-dish-caption ">
                                    <h4>marie ker</h4>
                                    <span>Neque porro quisquam est qui dolorem Lorem ipsum dolor sit amet when an unknown printer
                                        took a galley of type. </span>
                                </div>
                            </div>
                            <div class="item g1 ">
                                <img class="lazyOwl " src="images/c2.jpg " title="Our latest gallery " alt=" " />
                                <div class="agile-dish-caption ">
                                    <h4>John reo</h4>
                                    <span>Neque porro quisquam est qui dolorem Lorem ipsum dolor sit amet when an unknown printer
                                        took a galley of type. </span>
                                </div>
                            </div>
                            <div class="item g1 ">
                                <img class="lazyOwl " src="images/p1.jpg " title="Our latest gallery " alt=" " />
                                <div class="agile-dish-caption ">
                                    <h4>Honey Jisa</h4>
                                    <span>Neque porro quisquam est qui dolorem Lorem ipsum dolor sit amet when an unknown printer
                                        took a galley of type. </span>
                                </div>
                            </div>
                            <div class="item g1 ">
                                <img class="lazyOwl " src="images/c3.jpg " title="Our latest gallery " alt=" " />
                                <div class="agile-dish-caption ">
                                    <h4>Hoeld rich</h4>
                                    <span>Neque porro quisquam est qui dolorem Lorem ipsum dolor sit amet when an unknown printer
                                        took a galley of type. </span>
                                </div>
                            </div>

                            <div class="item g1 ">
                                <img class="lazyOwl " src="images/c1.jpg " title="Our latest gallery " alt=" " />
                                <div class="agile-dish-caption ">
                                    <h4>Marie ker</h4>
                                    <span>Neque porro quisquam est qui dolorem Lorem ipsum dolor sit amet when an unknown printer
                                        took a galley of type. </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix "> </div>
                </div>
            </div>
        </div>
        <!-- //clients -->
    </div>
    <!-- clients section -->
    <!-- footer -->
    <div class="footer mt-5">
        <div class="footer-top ">
            <div class="container ">
                <div class="footer-grids row ">
                    <div class="col-md-5 agile-footer-grid foooter-grid ">
                        <h3>follow us</h3>
                        <div class="" style="font-size: 1.5em;">
                            <a href="https://www.youtube.com/channel/UC5epRbc5wYxaGVWQGc5PQEw">
                                <i class="fa fa-youtube text-light pl-3"></i>
                            </a>
                            <a href="https://www.facebook.com/Steve-Young-Lion-1675044742798058/?ref=br_rs">
                                <i class="fa fa-facebook text-light pl-3"></i>
                            </a>
                            <a href="https://www.instagram.com/steve_younglion/">
                                <i class="fa fa-instagram text-light pl-3"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 footer-grid ">
                        <h3>Navigation</h3>
                        <ul>
                            <li>
                                <a href="#home " class="scroll ">Home</a>
                            </li>
                            <li>
                                <a href="workouts/workouts.php" class="scroll ">Workouts</a>
                            </li>
                            <li>
                                <a href="nutrition/nutrition.html" class="scroll ">Nutrition</a>
                            </li>
                            <li>
                                <a href="gallery/gallery.html" class="scroll ">Gallery</a>
                            </li>
                            <li>
                                <a href="shop/shop.php" class="scroll ">Shop</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-1 "></div>
                    <div class="col-md-4 agile-footer-grid ">
                        <h3>Subscribe</h3>
						<?php echo $emailErr; ?>
                        <form action="index.php" method="post" class="form">
                            <input type="email" name="Email" placeholder="subscribe to our mailing list " required>
                            <input type="submit" value="Send">
                        </form>

                    </div>
                    <div class="clearfix "> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //footer -->

    <!-- copyright -->
    <div class="wthree_copy_right ">
        <div class="container ">
            <p>Copyright &copy; 2018 Steve Younglion. All rights reserved.</p>

        </div>
    </div>

    <!-- //copyright -->
    <!-- =========================
                SCRIPTS
                    ===
                    === === === === === === === === === -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js "></script>


    <script src="js/custom.js "></script>
    <script src='js2/anime.min.js'></script>
    <script src='js2/pieces.min.js'></script>
    <script src='js2/demo.js'></script>
    <script src="js/zepto.min.js "></script>
    <script src="js/imagesloaded.pkgd.min.js "></script>
    <script src="js/demo2.js "></script>
    <!-- Testimonials script js -->
    <script defer src="js/jquery.flexslider.js "></script>
    <script src="js/aos.js" charset="utf-8"></script>
    <script>
        AOS.init();
    </script>
    <!--Start-slider-script-->
    <script type="text/javascript ">
        $(window).on('load', function() {
            $('.flexslider').flexslider({
                animation: "slide ",
                start: function(slider) {
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
    <!--End-slider-script-->
    <!-- //Testimonials script js -->

    <!-- Owl-Carousel-JavaScript -->
    <script src="js/owl.carousel.js "></script>
    <script>
        $(document).ready(function() {
            $("#owl-demo ").owlCarousel({
                items: 3,
                lazyLoad: true,
                autoPlay: true,
                pagination: true,
            });
        });
    </script>
    <!-- //Owl-Carousel-JavaScript -->



    <script type="text/javascript " src="js/simple-lightbox.js "></script>
    <script>
        $(function() {
            var $gallery = $('.gallery a').simpleLightbox();

            $gallery.on('show.simplelightbox', function() {
                    console.log('Requested for showing');
                })
                .on('shown.simplelightbox', function() {
                    console.log('Shown');
                })
                .on('close.simplelightbox', function() {
                    console.log('Requested for closing');
                })
                .on('closed.simplelightbox', function() {
                    console.log('Closed');
                })
                .on('change.simplelightbox', function() {
                    console.log('Requested for change');
                })
                .on('next.simplelightbox', function() {
                    console.log('Requested for next');
                })
                .on('prev.simplelightbox', function() {
                    console.log('Requested for prev');
                })
                .on('nextImageLoaded.simplelightbox', function() {
                    console.log('Next image loaded');
                })
                .on('prevImageLoaded.simplelightbox', function() {
                    console.log('Prev image loaded');
                })
                .on('changed.simplelightbox', function() {
                    console.log('Image changed');
                })
                .on('nextDone.simplelightbox', function() {
                    console.log('Image changed to next');
                })
                .on('prevDone.simplelightbox', function() {
                    console.log('Image changed to prev');
                })
                .on('error.simplelightbox', function(e) {
                    console.log('No image found, go to the next/prev');
                    console.log(e);
                });
        });
    </script>


</body>

</html
