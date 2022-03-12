

<?php
include 'admin/connection/db.php';

$con = mysqli_query($dbcon,"select * from contact");
$conresult =mysqli_fetch_assoc($con);
	
$sql= mysqli_query($dbcon,"select * from services where id= '".$_REQUEST['id']."'");
$result =mysqli_fetch_assoc($sql);



?>
<!DOCTYPE html>
<html lang="en">
	
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>G7 Security</title>
		<!-- All Stylesheets -->
		<link href="css/all-stylesheets.css" rel="stylesheet">
		<!-- ALL COLORED STYLESHEETS -->
		<link rel="alternate stylesheet" type="text/css" href="css/colors/orange.css" title="default">
				<link href="images/g7_icon.png" rel="shortcut icon" type="image"/>

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
	<body>
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
							<li><i class="fa fa-phone-square"></i> <?php echo $conresult['phone']; ?></li>
							<li><i class="fa fa-phone-square"></i> <?php echo $conresult['mobile']; ?></li>
							<li><a href=""><i class="fa fa-envelope-square"></i> <?php echo $conresult['email']; ?></a></li>
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
							
							<h1><?php echo $result['services_name']; ?></h1>
							
							<ol class="breadcrumb">
								<li><a href="#">Home</a></li>
								<li class="active">Services</li>
							</ol>
							<div class="line"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /. INNER BANNER ENDS
			========================================================================= -->
		<!-- OUR EXPERTISE STARTS
			========================================================================= -->
		<div class="expertise">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="herotext">
							<h2>Our Expertise</h2>
							<h1>& Experience</h1>
							<div class="line">&nbsp;</div>
							<div class="text">-: With a comprehensive range of service G7 not only provide quality guarding and executive protection but also has an investigating wing, cash management service and electronic security system division. Further it also provides consultancy service and training at its academics. In short G7 is the answer to all your security needs.</div>
						</div>
							<h2>Guarding Services</h2>
								<div class="line">&nbsp;</div>

						<div class="description" style="text-align:justify;text-size:14px;">  G7 provides Guarding Services to a wide range of clients keeping \'total customer satisfaction \' as its goal. Our security personnel are deployed in Five Hundred industries and establishments in Five States in the country.<br>

     At G7 we believe that only a properly trained guard can be an effective guard. After stringent screening and rigorous training, our guards become capable of making the decisions in cases of emergency. This enables them to prevent or curtail the loss and damage to men, metal an valuable information.
						</div>
					</div>
					<div class="col-lg-5 col-md-5 col-lg-offset-1 col-md-offset-1 picture">
						<img src="images/expertise/1.jpg" class="img-responsive" alt="" style="height:530px;">
					</div>
				</div>
			</div>
		</div>
		<!-- /. OUR EXPERTISE ENDS
			========================================================================= -->
		<!-- SECURITY SOLUTIONS STARTS
			========================================================================= -->
		
		<!-- /. SECURITY SOLUTIONS ENDS
			========================================================================= -->
		<!-- PICTURES STARTS
			========================================================================= -->
		<div class="container-fluid home-pictures">
			<div class="row no-gutter-4">
				<div class="col-lg-4 col-md-4 col-sm-4"><img src="images/gallery/home/1.jpg" class="img-responsive" alt=""></div>
				<div class="col-lg-4 col-md-4 col-sm-4"><img src="images/gallery/home/2.jpg" class="img-responsive" alt=""></div>
				<div class="col-lg-4 col-md-4 col-sm-4"><img src="images/gallery/home/3.jpg" class="img-responsive" alt=""></div>
			</div>
		</div>
		<!-- /. PICTURES ENDS
			========================================================================= -->
		<!-- SERVICES BENEFITS STARTS
			========================================================================= -->
		<div class="services-benefits parallax-1">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-lg-offset-3">
						<div class="herotext-3">
							<div class="boxed-heading">
								<h2>Take a Look at</h2>
								<h1>Services Benefits</h1>
							</div>
							<div class="description">Our highly trained & qualified teams available to implement security measures around any Retail, Commercial or Industrial Site</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<ul class="left">
							<li>
								<div class="icon"><i class="fa fa-circle"></i></div>
								<div class="info">
									<h1>Technical Security Surveys</h1>
									<!-- <div class="description">Lorem ipsum dolor sit amet adipisicing elit eiusod tempor incididunt dolor semagna aliqua</div> -->
								</div>
							</li>
							<li>
								<div class="icon"><i class="fa fa-circle"></i></div>
								<div class="info">
									<h1>CCTV Systems Network</h1>
									<!-- <div class="description">Lorem ipsum dolor sit amet adipisicing elit eiusod tempor incididunt dolor semagna aliqua</div> -->
								</div>
							</li>
						</ul>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 picture"><img src="images/services-benefits/1.png" class="img-responsive center-block" alt=""></div>
					<div class="col-lg-4 col-md-4 col-sm-4">
						<ul class="right">
							<li>
								<div class="icon"><i class="fa fa-circle"></i></div>
								<div class="info">
									<h1>Alarm Monitoring</h1>
									<!-- <div class="description">Lorem ipsum dolor sit amet adipisicing elit eiusod tempor incididunt dolor semagna aliqua</div> -->
								</div>
							</li>
							<li>
								<div class="icon"><i class="fa fa-circle"></i></div>
								<div class="info">
									<h1>Life & Fire Protection</h1>
									<!-- <div class="description">Lorem ipsum dolor sit amet adipisicing elit eiusod tempor incididunt dolor semagna aliqua</div> -->
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /. SERVICES BENEFITS ENDS
			========================================================================= -->
		<!-- BEST SKILLS STARTS
			========================================================================= -->
		<div class="container best-skills">
			<div class="row no-gutter no-gutter-5 no-gutter-6">
				<div class="col-lg-6 col-md-6 col-sm-7">
					<div class="herotext overlay-margin">
						<h2>We Got the</h2>
						<h1>Best Skills</h1>
						<div class="text">-: G7 provides Guarding Services to a wide range of clients keeping total customer satisfaction as its goal. Our security personnel are deployed in Five Hundred industries and establishments in Five States in the country.</div>
						<div class="line">&nbsp;</div>
						<div class="description"><?php echo $result['details']; ?></div>
						<!-- <div class="button"><a href="#" class="btn-orange">Ask a Quote <i class="fa fa-chevron-right"></i></a></div> -->
					</div>
				</div>
				<div class="col-lg-5 col-md-5 col-sm-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 progress-01">
					<div class="skills-graph">
						<!-- Block Starts -->
						<div class="skill">
							<div class="percentage">
								<div class="count">85%</div>
								<div class="line2"></div>
							</div>
							<div class="info">
								<div class="caption">Mobile patroling</div>
								<div class="progress-label clearfix" style="width: 85%;">
									<div class="icon"><i class="fa fa-circle"></i></div>
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="85" style="width: 85%;">
									</div>
								</div>
							</div>
						</div>
						<!-- Block Ends -->
						<!-- Block Starts -->
						<div class="skill">
							<div class="percentage">
								<div class="count">90%</div>
								<div class="line2"></div>
							</div>
							<div class="info">
								<div class="caption">CCTV SYSTEM</div>
								<div class="progress-label clearfix" style="width: 90%;">
									<div class="icon"><i class="fa fa-circle"></i></div>
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="90" style="width: 90%;">
									</div>
								</div>
							</div>
						</div>
						<!-- Block Ends -->
						<!-- Block Starts -->
						<div class="skill">
							<div class="percentage">
								<div class="count">80%</div>
								<div class="line2"></div>
							</div>
							<div class="info">
								<div class="caption">ON-SITE SECURITY</div>
								<div class="progress-label clearfix" style="width: 50%;">
									<div class="icon"><i class="fa fa-circle"></i></div>
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="80" style="width: 80%;">
									</div>
								</div>
							</div>
						</div>
						<!-- Block Ends -->
						<!-- Block Starts -->
						<div class="skill">
							<div class="percentage">
								<div class="count">70%</div>
								<div class="line2"></div>
							</div>
							<div class="info">
								<div class="caption">THREAT & RISK ASSESSMENT</div>
								<div class="progress-label clearfix" style="width: 70%;">
									<div class="icon"><i class="fa fa-circle"></i></div>
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70" style="width: 70%;">
									</div>
								</div>
							</div>
						</div>
						<!-- Block Ends -->
						<!-- Block Starts -->
						<div class="skill">
							<div class="percentage">
								<div class="count">65%</div>
								<div class="line2"></div>
							</div>
							<div class="info">
								<div class="caption">NETWORK SECURITY</div>
								<div class="progress-label clearfix" style="width: 65%;">
									<div class="icon"><i class="fa fa-circle"></i></div>
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="65" style="width: 65%;">
									</div>
								</div>
							</div>
						</div>
						<!-- Block Ends -->			
					</div>
				</div>
			</div>
		</div>
		<!-- /. BEST SKILLS ENDS
			========================================================================= -->
		<!-- WORKING WITH US STARTS
			========================================================================= -->
		<div class="white-bg working-with-us">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-5"><img src="images/workingwithus/1.jpg" class="img-responsive center-block" alt=""></div>
					<div class="col-lg-7 col-md-7 herotext">
						<h1>Are You Interested In Working With Us!</h1>
						<div class="line hidden-sm"></div>
						<div class="text">-: Join our team & start your career as a Guard Master Officer. It’s our mission to	recruit the best as we always recruiting professionals, highly motivated & well presented Security Officers to join our team!</div>
						<div class="button"><a href="career.php" class="btn-orange">View the Jobs <i class="fa fa-chevron-right"></i></a></div>
					</div>
				</div>
			</div>
		</div>
		<!-- /. WORKING WITH US ENDS
			========================================================================= -->
		
		<!-- FOOTER STARTS
			========================================================================= -->
		<?php
          include'footer.php';
		?>
		<!-- /. FOOTER ENDS
			========================================================================= -->
		<!-- TO TOP STARTS
			========================================================================= -->
		<a href="#" class="scrollup">Scroll</a>      
		<!-- /. TO TOP ENDS
			========================================================================= -->
		<!-- STYLE SWITCHER PANEL STARTS
			========================================================================= -->
		<!-- <div id="switch">
			<div class="content-switcher">
				<h4>STYLE SWITCHER</h4>
				<p>COLOR SKINS</p>
				<ul class="header">
					<li><a href="#" onClick="setActiveStyleSheet('default'); return false;" class="c-btn color switch" style="background-color:#ff974f"></a></li>
					<li><a href="#" onClick="setActiveStyleSheet('green'); return false;" class="c-btn color switch" style="background-color:#27ae60"></a></li>
					<li><a href="#" onClick="setActiveStyleSheet('red'); return false;" class="c-btn color switch" style="background-color:#f83131"></a></li>
					<li><a href="#" onClick="setActiveStyleSheet('blue'); return false;" class="c-btn color switch" style="background-color:#44b4dc"></a></li>
					<li><a href="#" onClick="setActiveStyleSheet('pink'); return false;" class="c-btn color switch" style="background-color:#cd7399"></a></li>
				</ul>
				<p>VERSIONS</p>
				<div class="styled-select">
					<select onChange="window.document.location.href=this.options[this.selectedIndex].value;" >
						<option selected="selected">Home 01</option>
						<option value="index-02.html">Home 02</option>
						<option value="index-03.html">Home 03</option>
						<option value="index-04.html">Home 04</option>
						<option value="index-05.html">Home 05</option>
					</select>
				</div>
				<p>SLIDER OPTIONS</p>
				<div class="styled-select">
					<select onChange="window.document.location.href=this.options[this.selectedIndex].value;" >
						<option selected="selected">FullScreen Parallax Slider</option>
						<option value="index-fullwidth-slider-1.html">FullWidth Slider 1</option>
						<option value="index-fullwidth-slider-2.html">FullWidth Slider 2</option>
						<option value="index-kenburns.html">FullScreen Ken Burn</option>
						<option value="index-news-gallery.html">FullWidth News Gallery</option>
						<option value="index-HTML5-video.html">HTML5 Video</option>
						<option value="index-vimeo-video.html">Vimeo Video</option>
						<option value="index-youtube-video.html">YouTube Video</option>
					</select>
				</div>
				<div class="clear"></div>
				<div id="hide"><i class="fa fa-times"></i></div>
			</div>
		</div>
		<div id="show" style="display: block;">
			<div id="setting"><i class="fa fa-cog"></i></div>
		</div> -->
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