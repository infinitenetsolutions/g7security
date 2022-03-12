<?php
include 'admin/connection/db.php';
$sql = mysqli_query($dbcon, "select * from contact");
$result = mysqli_fetch_assoc($sql);

$limit = 6;
if (isset($_GET["page"])) {
	$page  = $_GET["page"];
} else {
	$page = 1;
};
// var_dump($_GET["page"]); 
$start_from = ($page - 1) * $limit;
// var_dump($start_from);
// $query = "SELECT * FROM gallery ORDER BY id ASC LIMIT $start_from, $limit";
// // var_dump("SELECT * FROM gallery ORDER BY id ASC LIMIT $start_from, $limit");exit(); 
// $queresult = mysqli_query($dbcon, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="images/g7_icon.png" rel="shortcut icon" type="image" />

	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>G7 Security</title>
	<!-- All Stylesheets -->
	<link href="css/all-stylesheets.css" rel="stylesheet">
	<!-- ALL COLORED STYLESHEETS -->
	<link rel="alternate stylesheet" type="text/css" href="css/colors/orange.css" title="default">
	<link rel="alternate stylesheet" type="text/css" href="css/colors/green.css" title="green">
	<link rel="alternate stylesheet" type="text/css" href="css/colors/red.css" title="red">
	<link rel="alternate stylesheet" type="text/css" href="css/colors/blue.css" title="blue">
	<link rel="alternate stylesheet" type="text/css" href="css/colors/pink.css" title="pink">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body class="about-us">
	<!-- NAVIGATION STARTS
			========================================================================= -->
	<nav id="navigation">
		<div id="tc" class="container top-contact hidden-sm hidden-xs">
			<div class="row">
				<div class="col-lg-2 col-md-2">
					<!--  Logo Starts -->
					<a class="navbar-brand external" href="index.php"><img src="images/logos/logo-1.png" alt="" style="width:220px; margin-top: -17px;"></a>
					<!-- Logo Ends -->
				</div>
				<div class="col-lg-10 col-md-10">
					<ul class="small-nav">
						<li><i class="fa fa-certificate"></i>An ISO 9001:2008 Certified</li>
						<li><i class="fa fa-certificate"></i>An OHSAS 18001:2007 Certified</li>
						<?php
						$sql = mysqli_query($dbcon, "select * from contact");
						$result = mysqli_fetch_assoc($sql);
						?>
						<li><i class="fa fa-phone-square"></i> <?php echo $result['phone']; ?></li>
						<li><i class="fa fa-phone-square"></i> <?php echo $result['mobile']; ?></li>
						<li><a href=""><i class="fa fa-envelope-square"></i> <?php echo $result['email']; ?></a></li>
						<!-- <li class="shop">
							<!-- <li class="shop">
								<i class="fa fa-shopping-bag"></i>
								<div class="cart-item-number">2</div>
							</li> -->
						<!-- <li class="searchlink" id="searchlink">
								<div class="searchform">
									<form id="search-1">
										<input type="text" class="s" id="s-1">
										<button type="submit" class="sbtn"><i class="fa fa-search"></i></button>
									</form>
								</div>
							</li> -->
					</ul>
				</div>
			</div>
		</div>
		<div class="navbar navbar-inverse" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
					<!--  Logo Starts -->
					<a class="navbar-brand external visible-xs" href="index.php"><img src="images/logos/logo-1.png" alt="" style="width:220px;"></a>
					<!-- Logo Ends -->
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown current">
							<a href="index.php" class="external">HOME</a>
						</li>
						<li><a href="about.php" class="external">ABOUT</a></li>
						<!-- <li><a href="services.html" class="external">SERVICES</a></li> -->
						<li class="dropdown">
							<a href="" class="dropdown-toggle js-activated" data-toggle="dropdown">SERVICES<i class="fa fa-caret-down"></i> </a>
							<ul class="dropdown-menu" role="menu" style="width: 600px;">
								<div class="row">
									<div class="col-md-6">

										<?php
										$query = mysqli_query($dbcon, "select * from services limit 11");
										while ($queresult = mysqli_fetch_assoc($query)) {

										?>
											<li><a href="service.php?id=<?php echo $queresult['id']; ?>" class="external" style="font-size: 16px; line-height: 1.9;"><?php echo $queresult['services_name']; ?></a>
											</li>
										<?php
										}
										?>
									</div>
									<div class="col-md-6">

										<?php
										$query = mysqli_query($dbcon, "select * from services where id>=12");
										while ($queresult = mysqli_fetch_assoc($query)) {

										?>
											<li><a href="service.php?id=<?php echo $queresult['id']; ?>" class="external" style="font-size: 16px; line-height: 1.9;"><?php echo $queresult['services_name']; ?></a>
											</li>
										<?php
										}
										?>
									</div>
								</div>
							</ul>

						</li>
						<li><a href="client.php" class="external">CLIENT</a></li>
						<li><a href="gallery.php" class="external">GALLERY</a></li>
						<li><a href="news.php" class="external">NEWS</a></li>
						<li><a href="career.php" class="external">CAREER</a></li>

						<li><a href="contact.php" class="external">CONTACT</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right nav-social-icons hidden-xs">
						<li><a href=""><i class="fa fa-twitter"></i></a></li>
						<li><a href=""><i class="fa fa-facebook"></i></a></li>
						<li><a href=""><i class="fa fa-linkedin"></i></a></li>
						<li><a href=""><i class="fa fa-vimeo"></i></a></li>
						<li><a href=""><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
	</nav>
	<!-- /. NAVIGATION ENDS
			========================================================================= -->
	<!-- INNER BANNER STARTS
			========================================================================= -->
	<div class="inner-banner-style banner-img-01">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="info">
						<h1>Gallery</h1>
						<ol class="breadcrumb">
							<li><a href="index.php">Home</a></li>
							<li class="active">Gallery</li>
						</ol>
						<div class="line"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /. INNER BANNER ENDS
			========================================================================= -->
	<!-- INTRO SECTION STARTS
			========================================================================= -->
	<div class="container intro-section">

		<div class="row no-gutter no-gutter-4">
			<?php
			$gallery = mysqli_query($dbcon, "select * from gallery LIMIT $start_from, $limit");
			while ($res_gallery = mysqli_fetch_assoc($gallery)) {

			?>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="block">
						<div class="picture"><img src="admin/uploads/<?php echo $res_gallery['file'] ?>" class="img-responsive" alt="" style="height: 270px; width: 360px;"></div>
						<div class="info">
							<div class="heading">Gallery</div>
							<!-- <div class="heading-2">-:  We fully understand the retail environment</div>
							<div class="description">Lorem ipsum dolor sit amet, consectetur adip
								elit sed do eiusmod tempor incididunt labore
								at dolore magna aliqua uat enim minim venia
								quis nostrud exercitation
							</div> -->
						</div>
					</div>
				</div>
			<?php
			}
			?>



		</div>

		<?php
		$query = mysqli_query($dbcon, "SELECT COUNT(id) FROM gallery");
		// var_dump("select * from gallery");
		$queresult = mysqli_fetch_row($query);

		// var_dump($queresult);

		$total_records = $queresult[0];
		// var_dump($total_records);
		$total_pages = ceil($total_records / $limit);
		// var_dump($total_pages);exit();
		$pagLink = "<div class='pagging'> <ul class='pagination'> <li>";

		for ($i = 1; $i <= $total_pages; $i++) {

			$pagLink .= "<a href='gallery.php?page=" . $i . "'>" . $i . "</a>";
			// var_dump($i);  
		};

		echo $pagLink . "</li></ul></div>";

		?>

		<br />


	</div>
	<!-- /. INTRO SECTION ENDS
			========================================================================= -->
	<!-- FUNFACTS STARTS
			========================================================================= -->

	<!-- /. FUNFACTS ENDS
			========================================================================= -->
	<!-- WE DELIVER STARTS
			========================================================================= -->
	<!-- <div class="container-fluid">
			<div class="row">
				<section class="we-deliver white-bg">
					<div class="col-lg-6 col-sm-8 col-lg-offset-6 col-sm-offset-4 herotext">
						<h1>With over 15 years of experience</h1>
						<div class="heading2">we deliver premium security solutions at best price</div>
						<div class="line"></div>
						<div class="text">Dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt dolore magna aliq
							sud enimad minim veniam quis exercitation ullamco laboris nisi ut aliquip exea commodo conse-
							quat duis aute irure dolor in reprehenderit in voluptate.
						</div>
					</div>
					<div class="col-lg-6 col-sm-4 img-side img-left">
						<div class="img-holder"><img src="images/wedeliver/2.jpg" alt=""></div>
					</div>
				</section>
			</div>
		</div> -->
	<!-- /. WE DELIVER ENDS
			========================================================================= -->
	<!-- EXCEPTIONAL SECURITY STARTS
			========================================================================= -->
	<div class="parallax-6">
		<div class="container exceptional-security">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 block">
					<div class="icon"><i class="flaticon-shield20"></i></div>
					<div class="details">
						<div class="herotext-2">
							<h1>Exceptional Security</h1>
							<!-- <h2>Ipsum sit amet consectetur usmod</h2> -->
							<div class="line"></div>
						</div>
						<div class="description">We serve a wide range of industries and segments like: Banking, IT/
							ITES, Insurance, Retail, Healthcare, Entertainment, Events, Hospitality, Telecom and
							Manufacturing.
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 block">
					<div class="icon"><i class="flaticon-shield20"></i></div>
					<div class="details">
						<div class="herotext-2">
							<h1>Reliable & Committed</h1>
							<!-- <h2>Ipsum sit amet consectetur usmod</h2> -->
							<div class="line"></div>
						</div>
						<div class="description">G7 is a part of a global company with a local flavor and our network of
							branch offices throughout India allows us to extend that personal touch.

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /. EXCEPTIONAL SECURITY ENDS
			========================================================================= -->
	<!-- OUR TEAM STARTS
			========================================================================= -->
	<div class="container home-our-team">
		<div class="row no-gutter no-gutter-5 no-gutter-6">
			<div class="col-lg-5 col-md-6 col-sm-6">
				<div class="herotext overlay-margin">
					<h2>The Security Leaders</h2>
					<h1>Our Teams</h1>
					<div class="text">-: We have highly trained staff available that implement security measures around
						any Retail, Commercial or Industrial Site.</div>
					<div class="line">&nbsp;</div>
					<ul class="bullets">
						<li><a href="#">The Exectives Team Members</a></li>
						<li><a href="#">Office Management</a></li>
						<li><a href="#">Security Supervisors</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-lg-offset-1">
				<div class="our-team-carousel">
					<!-- Block Starts -->
					<div class="block">
						<div class="picture">
							<img src="images/team/1.jpg" class="img-responsive" alt="">
							<!-- Picture Overlay Starts -->
							<div class="member-overlay">
								<div class="icons">
									<div>
										<span class="icon"><a href="#"><i class="fa fa-facebook"></i></a></span>
										<span class="icon"><a href="#"><i class="fa fa-twitter"></i></a></span>
										<span class="icon"><a href="#"><i class="fa fa-linkedin"></i></a></span>
										<span class="icon"><a href="#"><i class="fa fa-google-plus"></i></a></span>
									</div>
								</div>
							</div>
							<!-- Picture Overlay Ends -->
						</div>
						<div class="info">
							<div class="name">mark S. hasman</div>
							<div class="designation">-: Director & CEO</div>
						</div>
					</div>
					<!-- Block Ends -->
					<!-- Block Starts -->
					<div class="block">
						<div class="picture">
							<img src="images/team/2.jpg" class="img-responsive" alt="">
							<!-- Picture Overlay Starts -->
							<div class="member-overlay">
								<div class="icons">
									<div>
										<span class="icon"><a href="#"><i class="fa fa-facebook"></i></a></span>
										<span class="icon"><a href="#"><i class="fa fa-twitter"></i></a></span>
										<span class="icon"><a href="#"><i class="fa fa-linkedin"></i></a></span>
										<span class="icon"><a href="#"><i class="fa fa-google-plus"></i></a></span>
									</div>
								</div>
							</div>
							<!-- Picture Overlay Ends -->
						</div>
						<div class="info">
							<div class="name">carige J. smith</div>
							<div class="designation">-: Event Manager</div>
						</div>
					</div>
					<!-- Block Ends -->
					<!-- Block Starts -->
					<div class="block">
						<div class="picture">
							<img src="images/team/3.jpg" class="img-responsive" alt="">
							<!-- Picture Overlay Starts -->
							<div class="member-overlay">
								<div class="icons">
									<div>
										<span class="icon"><a href="#"><i class="fa fa-facebook"></i></a></span>
										<span class="icon"><a href="#"><i class="fa fa-twitter"></i></a></span>
										<span class="icon"><a href="#"><i class="fa fa-linkedin"></i></a></span>
										<span class="icon"><a href="#"><i class="fa fa-google-plus"></i></a></span>
									</div>
								</div>
							</div>
							<!-- Picture Overlay Ends -->
						</div>
						<div class="info">
							<div class="name">carige J. smith</div>
							<div class="designation">-: Event Manager</div>
						</div>
					</div>
					<!-- Block Ends -->
					<!-- Block Starts -->
					<div class="block">
						<div class="picture">
							<img src="images/team/4.jpg" class="img-responsive" alt="">
							<!-- Picture Overlay Starts -->
							<div class="member-overlay">
								<div class="icons">
									<div>
										<span class="icon"><a href="#"><i class="fa fa-facebook"></i></a></span>
										<span class="icon"><a href="#"><i class="fa fa-twitter"></i></a></span>
										<span class="icon"><a href="#"><i class="fa fa-linkedin"></i></a></span>
										<span class="icon"><a href="#"><i class="fa fa-google-plus"></i></a></span>
									</div>
								</div>
							</div>
							<!-- Picture Overlay Ends -->
						</div>
						<div class="info">
							<div class="name">carige J. smith</div>
							<div class="designation">-: Event Manager</div>
						</div>
					</div>
					<!-- Block Ends -->
				</div>
			</div>
		</div>
	</div>
	<!-- /. OUR TEAM ENDS
			========================================================================= -->
	<!-- HISTORY TIMELINE STARTS
			========================================================================= -->

	<!-- /. HISTORY TIMELINE ENDS
			========================================================================= -->
	<!-- CLIENTS STARTS
			========================================================================= -->

	<!-- /. CLIENTS ENDS
			========================================================================= -->

	<!-- FOOTER STARTS
			========================================================================= -->
	<?php
	include 'footer.php';
	?>
	<!-- /. FOOTER ENDS
			========================================================================= -->
	<!-- TO TOP STARTS
			========================================================================= -->
	<!-- <a href="#" class="scrollup">Scroll</a>       -->
	<!-- /. TO TOP ENDS
			========================================================================= -->
	<!-- STYLE SWITCHER PANEL STARTS
			========================================================================= -->
	<!-- /.STYLE SWITCHER PANEL 
			========================================================================= -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="https://vardasolution.com/g7/respond.js"></script>
	<!-- Overlay Resize Menu -->
	<script src="js/overlay-resizemenu/js/classie.js"></script>
	<script src="js/overlay-resizemenu/js/hide-top-row.js"></script>
	<!-- Style Switcher -->
	<script src="js/styleswitcher/styleswitcher.js" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
			"use strict";
			$("#hide, #show").click(function() {
				if ($("#show").is(":visible")) {

					$("#show").animate({
						"margin-left": "-400px"
					}, 400, function() {
						$(this).hide();
					});

					$("#switch").animate({
						"margin-left": "0px"
					}, 400).show();
				} else {
					$("#switch").animate({
						"margin-left": "-400px"
					}, 400, function() {
						$(this).hide();
					});
					$("#show").show().animate({
						"margin-left": "0"
					}, 400);
				}
			});
		});
	</script>
	<!-- Isotope Gallery -->
	<script type="text/javascript" src="js/isotope/jquery.isotope.min.js"></script>

	<script type="text/javascript" src="js/response.js"></script>

	<script type="text/javascript" src="js/isotope/custom-isotope-mansory.js"></script>
	<!-- Magnific Popup core JS file -->
	<script type="text/javascript" src="js/magnific-popup/jquery.magnific-popup.js"></script>
	<!-- Owl Carousel -->
	<script type="text/javascript" src="js/owl-carousel/owl.carousel.js"></script>
	<!-- FitVids -->
	<script type="text/javascript" src="js/fitvids/jquery.fitvids.js"></script>
	<!-- ScrollTo -->
	<script type="text/javascript" src="js/nav/jquery.scrollTo.js"></script>
	<script type="text/javascript" src="js/nav/jquery.nav.js"></script>
	<!-- Sticky -->
	<script type="text/javascript" src="js/sticky/jquery.sticky.js"></script>
	<!-- Custom JS -->
	<script src="js/custom/custom.js"></script>
</body>

</html>