<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

$DB = "steveyounglion";
$user = "FabianMuli";
$password = "1LoveFabian";
$host = "localhost";

$conn = mysqli_connect($host, $user, $password, $DB);

$sql_supplements = "SELECT * FROM supplements";
$sql_shirts = "SELECT * FROM shirts";
$sql_trousers = "SELECT * FROM trousers";
$sql_shoes = "SELECT * FROM shoes";

$result_supplements = mysqli_query($conn, $sql_supplements);
$result_shirts = mysqli_query($conn, $sql_shirts);
$result_trousers = mysqli_query($conn, $sql_trousers);
$result_shoes = mysqli_query($conn, $sql_shoes);

$supplement_items = mysqli_fetch_array($result_supplements);
$shirts_items = mysqli_fetch_array($result_shirts);
$trousers_items = mysqli_fetch_array($result_trousers);
$shoes_items = mysqli_fetch_array($result_shoes);


//Add
 if (isset($_GET["add_shirt"])) {
     $i = $_GET["add_shirt"];
     $_SESSION["quantity_shirt"]++;
     $qty = $_SESSION["quantity_shirt"];
     $_SESSION["quantity_shirt"] = $qty;
     $_SESSION["shirt"]=$i;
 } else {
     $qty = 0;
 }

?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Steve Younglion | Shop</title>

	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" href="../gallery/css/style.css">

	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/style2.css" />
	<script src="js/modernizr-custom.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<!-- Font Awesome -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<!-- Pixel Fabric clothes icons -->
	<link rel="stylesheet" type="text/css" href="fonts/pixelfabric-clothes/style.css" />
	<!-- General demo styles & header -->
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<!-- Flickity gallery styles -->
	<link rel="stylesheet" type="text/css" href="css/flickity.css" />
	<!-- Component styles -->
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<script src="js/modernizr.custom.js"></script>
</head>


<body>

	<div class="container">
		<div class="header">


			<div class="agile-logo text-center">
				<h1>
					<a href="../index.php">Steve</a>
					<span>Younglion</span>
				</h1>
				<br />
				<h2>
					<em>&mdash; Shop Now &mdash;</em>
				</h2>

			</div>


		</div>
		<br>


		<div class="mobile-nav-button" id="button">
			<div class="mobile-nav-button__line"></div>
			<div class="mobile-nav-button__line"></div>
			<div class="mobile-nav-button__line"></div>
		</div>
		<nav class="mobile-menu" id="mobile-menu">

			<ul>
				<li>
					<a href="../index.php" class="scroll">Home</a>
				</li>
				<li>
					<a href="../workouts/workouts.html" class="scroll">workouts</a>
				</li>
				<li>
					<a href="../nutrition/nutrition.html" class="scroll">nutrition</a>
				</li>

				<li>
					<a href="../gallery/gallery.html" class="scroll">gallery</a>
				</li>
				<li>
					<a href="#" class="scroll">shop</a>
				</li>

			</ul>
		</nav>

	</div>
	<br>



	<!-- Bottom bar with filter and cart info -->
	<div class="bar">
		<br>
		<div class="filter">
			<span class="filter__label">Filter: </span>
			<button class="action filter__item filter__item--selected" data-filter="*">All</button>
			<button class="action filter__item" data-filter=".supplements">
				<i class="icon icon--jacket"></i>
				<span class="action__text">Supplements</span>
			</button>
			<button class="action filter__item" data-filter=".shirts">
				<i class="icon icon--shirt"></i>
				<span class="action__text">Shirts</span>
			</button>
			<button class="action filter__item" data-filter=".trousers">
				<i class="icon icon--trousers"></i>
				<span class="action__text">Trousers</span>
			</button>
			<button class="action filter__item" data-filter=".shoes">
				<i class="icon icon--shoe"></i>
				<span class="action__text">Shoes</span>
			</button>
		</div>
		<button class="cart">
			<a href="cart.php">
			<i class="cart__icon fa fa-shopping-cart"></i>
			<span class="text-hidden">Shopping cart</span>
			<span class="cart__count"><?php
                echo $qty;
            ?></span>
			</a>
		</button>
	</div>
	<!-- Main view -->
	<div class="view">

		<!-- Grid -->
		<section class="grid grid--loading">
			<!-- Loader -->
			<img class="grid__loader" src="images/grid.svg" width="60" alt="Loader image" />
			<!-- Grid sizer for a fluid Isotope (Masonry) layout -->
			<div class="grid__sizer "></div>
			<!-- Grid items -->



                <?php
                $row = $db_handle->runQuery($sql_shirts);
                if (!empty($row)) {
                    foreach ($row as $key => $value) {
                        ?>
			<div class="grid__item shirts ">
				<div class="slider">
					<div class="slider__item">
						<img src="images/shirt.png" alt="Dummy" />
					</div>
					<div class="slider__item">
						<img src="images/shirt.png" alt="Dummy" />
					</div>
					<div class="slider__item">
						<img src="images/shirt.png" alt="Dummy" />
					</div>
				</div>
				<div class="meta">
						<h3 class="meta__title"><?php echo $row[$key]["name"]; ?></h3>
						<span class="meta__brand"><?php echo $row[$key]["brand"]; ?></span>
						<span class="meta__price"><?php echo $row[$key]["price"]; ?></span>

				</div>
				<button class="action action--button action--buy">
					<a onclick="myFunction()" href="?add_shirt=<?php echo $row[$key]["name"]; ?>"><i class="fa fa-shopping-cart"></i></a>
					<span class="text-hidden">Add to cart</span>

				</button>
			</div>
				<?php
                    }
                }
    ?>

			<?php
        $row = $db_handle->runQuery($sql_shoes);
        if (!empty($row)) {
            foreach ($row as $key => $value) {
                ?>
			<div class="grid__item shoes">
				<div class="slider">
					<div class="slider__item">
						<img src="images/shoe.png" alt="Dummy" />
					</div>
					<div class="slider__item">
						<img src="images/shoe.png" alt="Dummy" />
					</div>
					<div class="slider__item">
						<img src="images/shoe.png" alt="Dummy" />
					</div>
				</div>
				<div class="meta">
					<h3 class="meta__title"><?php echo $row[$key]["name"]; ?></h3>
					<span class="meta__brand"><?php echo $row[$key]["brand"]; ?></span>
					<span class="meta__price"><?php echo $row[$key]["price"]; ?></span>
				</div>
				<button class="action action--button action--buy">
					<i class="fa fa-shopping-cart"></i>
					<span class="text-hidden">Add to cart</span>
				</button>
			</div>
			<?php
            }
        } ?>

			<?php
        $row = $db_handle->runQuery($sql_trousers);
        if (!empty($row)) {
            foreach ($row as $key => $value) {
                ?>
				<div class="grid__item trousers">
				<div class="slider">
					<div class="slider__item">
						<img src="images/trousers.png" alt="Dummy" />
					</div>
					<div class="slider__item">
						<img src="images/trousers.png" alt="Dummy" />
					</div>
					<div class="slider__item">
						<img src="images/trousers.png" alt="Dummy" />
					</div>
				</div>
				<div class="meta">
					<h3 class="meta__title"><?php echo $row[$key]["name"]; ?>																									</h3>
					<span class="meta__brand"><?php echo $row[$key]["brand"]; ?></span>
					<span class="meta__price"><?php echo $row[$key]["price"]; ?></span>
				</div>
				<button class="action action--button action--buy">
					<i class="fa fa-shopping-cart"></i>
					<span class="text-hidden">Add to cart</span>
				</button>
			</div>
			<?php
            }
        } ?>
			<?php
        $row = $db_handle->runQuery($sql_supplements);
        if (!empty($row)) {
            foreach ($row as $key => $value) {
                ?>
	        <div class="grid__item grid__item--size-a supplements">
				<div class="slider">
					<div class="slider__item">
						<img src="images/jacket.png" alt="Supplement" />
					</div>
					<div class="slider__item">
						<img src="images/jacket.png" alt="Supplement" />
					</div>
					<div class="slider__item">
						<img src="images/jacket.png" alt="Supplement" />
					</div>
				</div>
				<div class="meta">
					<h3 class="meta__title"><?php echo $row[$key]["name"]; ?></h3>																									</h3>
					<span class="meta__brand"><?php echo $row[$key]["brand"]; ?></span>
					<span class="meta__price"><?php echo $row[$key]["price"]; ?></span>
				</div>
				<button class="action action--button action--buy">
					<i class="fa fa-shopping-cart"></i>
					<span class="text-hidden">Add to cart</span>
				</button>
			</div>
			<?php
            }
        } ?>

			</div>
		</section>
		<!-- /grid-->
	</div>
	<!-- what w-->
	<!-- /view -->

	<script src="js/isotope.pkgd.min.js"></script>
	<script src="js/flickity.pkgd.min.js"></script>


	<script src="js/main.js"></script>
	<script>
		$(document).ready(function () {
			$('.mobile-nav-button').on('click', function () {
				$(".mobile-nav-button .mobile-nav-button__line:nth-of-type(1)").toggleClass(
					"mobile-nav-button__line--1");
				$(".mobile-nav-button .mobile-nav-button__line:nth-of-type(2)").toggleClass(
					"mobile-nav-button__line--2");
				$(".mobile-nav-button .mobile-nav-button__line:nth-of-type(3)").toggleClass(
					"mobile-nav-button__line--3");

				$('.mobile-menu').toggleClass('mobile-menu--open');
				return false;
			});
		});
	</script>
	<script>
		$('.cart').on('click',function(){
			$('.').show();

		});
	</script>
	<script src="js/ajax.js">

	</script>

</body>

</html>
