
<?php
include 'admin/connection/db.php';
$sql = mysqli_query($dbcon,"select * from contact");
$result = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html lang="en">
	
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
				<link href="images/g7_icon.png" rel="shortcut icon" type="image"/>

		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>G7Security</title>
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
		<style>
          @media only screen and (min-width: 768px)  {
          	#gseven{ height: 300px; }
          	.img-responsive{ height: 300px;width:400px; }
          }
	    </style>
	</head>
	<body class="blog">
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
							<li><i class="fa fa-phone-square"></i> <?php echo $result['phone']; ?></li>
							<li><i class="fa fa-phone-square"></i> <?php echo $result['mobile']; ?></li>
							
							<li><a href=""><i class="fa fa-envelope-square"></i> <?php echo $result['email']; ?></a></li>
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
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
						<!--  Logo Starts -->
						<a class="navbar-brand external visible-xs" href="index.php"><img src="images/logos/logo-1.png" alt="" style="width:220px;"></a>
						<!-- Logo Ends -->
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li>
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
						$query = mysqli_query($dbcon,"select * from services limit 11");
						while ($queresult = mysqli_fetch_assoc($query)) {
							
						?>
								<li><a href="service.php?id=<?php echo $queresult['id']; ?>" class="external" style="font-size: 16px; line-height: 1.9;"><?php echo $queresult['services_name']; ?></a></li>
									<?php    
								}
								?>
                            	</div>
                            	  <div class="col-md-6">
    
									<?php
						$query = mysqli_query($dbcon,"select * from services where id>=12");
						while ($queresult = mysqli_fetch_assoc($query)) {
							
						?>
								<li><a href="service.php?id=<?php echo $queresult['id']; ?>" class="external" style="font-size: 16px; line-height: 1.9;" ><?php echo $queresult['services_name']; ?></a></li>
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
							<li class="current"><a href="career.php" class="external">CAREER</a></li>

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
							<h1>Career with Us</h1>
							<ol class="breadcrumb">
								<li><a href="#">Home</a></li>
								<li class="active">Career</li>
							</ol>
							<div class="line"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /. INNER BANNER ENDS
			========================================================================= -->
		<div class="container contents">
			<div class="row no-gutter-8 no-gutter no-gutter-4">
				<!-- RIGHT COLUMN STARTS
					========================================================================= -->
				<div class="col-lg-12 col-md-12">
					<!-- Post Starts -->
					<div class="row blog-post no-gutter-5" id="gseven">
						<div class="col-lg-5 col-md-5 col-sm-5 post-picture">
							<img src="images/blog/thumbs/1.jpg" class="img-responsive" alt="">
						</div>
						<div class="col-lg-7 col-md-7 col-sm-7 post-contents">
							<div class="meta">-:Admin</div>
							<h1>Want a career in G7 Security Services</h1>
							<div class="description">Drop us your resume at the mail given or visit our corporate office.
							</div>
							<!-- <div class="clearfix">
								<div class="button"><a href="#" class="btn-orange">Read More <i class="fa fa-chevron-right"></i></a></div>
								<div class="comments">20</div>
							</div> -->
						</div>
					</div>
					<!-- Post Ends -->
					
					<!-- Pagging Starts -->
					
					<!-- Pagging Ends --> 
				</div>
				<!-- /. RIGHT COLUMN ENDS
					========================================================================= -->
			</div>
		</div>
		
		<!-- FOOTER STARTS
			========================================================================= -->
		<?php
         include'footer.php';
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