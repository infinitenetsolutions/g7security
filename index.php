<?php
include 'admin/connection/db.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
				<link href="images/g7_icon.png" rel="shortcut icon" type="image"/>

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
	<body>
		<!-- NAVIGATION STARTS
			========================================================================= -->
		<nav id="navigation">
			<div id="tc" class="container top-contact hidden-sm hidden-xs">
				<div class="row">
					<div class="col-lg-2 col-md-2">
						<!--  Logo Starts -->
						<a class="navbar-brand external" href="index.php"><img src="images/logos/logo-1.png" alt="" style="width:220px;margin-top:-17px;"></a>
						
						<!-- Logo Ends -->
					</div> 
					<div class="col-lg-10 col-md-10">
						<ul class="small-nav">
						    <li><i class="fa fa-certificate"></i>An ISO 9001:2008 Certified</li>
						     <li><i class="fa fa-certificate"></i>An OHSAS 18001:2007 Certified</li>

							<?php
						$sql= mysqli_query($dbcon,"select * from contact");
						$result = mysqli_fetch_assoc($sql);
						?>
							<li><i class="fa fa-phone-square"></i> <?php echo $result['phone']; ?></li>
							<li><i class="fa fa-phone-square"></i> <?php echo $result['mobile']; ?></li>
						<button style="border-radius: 30px;color: green;
    /* background: linear-gradient(45deg, #4c5cbb, #8034bc); */
    background-color: white;
    /* border-color: #8034bc; */
    border-color: orange;
    padding: 10px 20px;
    font-weight: 900;
    box-shadow: 0px 10px 20px #100f0f;"><a href="http://g7securityagency.com/webmail">e-mail</a></button>

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
							<li class="dropdown current">
								<a href="index.php" class="external">HOME</a>
							</li>
							<li><a href="about.php" class="external">ABOUT</a></li>
							<!-- <li><a href="services.html" class="external">SERVICES</a></li> -->
							<li class="dropdown">
								<a href="" class="dropdown-toggle js-activated" data-toggle="dropdown">SERVICES<i class="fa fa-caret-down"></i> </a>
								<ul class="dropdown-menu" role="menu">
									<?php
						$query = mysqli_query($dbcon,"select * from services");
						while ($queresult = mysqli_fetch_assoc($query)) {
							
						?>
								<li><a href="service.php?id=<?php echo $queresult['id']; ?>" class="external" ><?php echo $queresult['services_name']; ?></a></li>
									<?php    
								}
								?>

									
								</ul>
							</li>
							<li><a href="client.php" class="external">CLIENT</a></li>
							<li><a href="gallery.php" class="external">GALLERY</a></li>
							<li><a href="news.php" class="external">NEWS</a></li>
							<li><a href="career.php?page='1'" class="external">CAREER</a></li>

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
		<!-- SLIDER STARTS
			========================================================================= -->		
		<div class="slider">
			<div id="rev_slider_46_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="notgeneric1" style="background-color:transparent;padding:0px;">
				<!-- START REVOLUTION SLIDER 5.0.7 fullscreen mode -->
				<div id="rev_slider_46_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.0.7">
					<ul>
						<!-- SLIDE  -->
						<li data-index="rs-148" data-transition="zoomout" data-slotamount="default"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="images/slider/thumbs/1.jpg"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Agency" data-description="">
							<!-- MAIN IMAGE -->
							<img src="images/slider/1.jpg"  alt="" data-bgposition="center center" data-kenburns="on" data-duration="20000" data-ease="Linear.easeNone" data-scalestart="130" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
							<!-- LAYERS -->
							<!-- LAYER NR. 1 -->
							<div class="tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-0 t-center" 
								id="slide-148-layer-1" 
								data-x="['left','left','left','left']" data-hoffset="['50','50','50','50']" 
								data-y="['center','center','center','center']" data-voffset="['-100','-100','-100','-90']" 
								data-fontsize="['42','42','32','22']"
								data-lineheight="['50','50','36','28']"
								data-width="['600','600','600','300']"
								data-height="none"
								data-whitespace="normal"
								data-transform_idle="o:1;"
								data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" 
								data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
								data-mask_out="x:inherit;y:inherit;" 
								data-start="1000" 
								data-splitin="none" 
								data-splitout="none" 
								data-responsive_offset="on" 
								style="z-index: 6; min-width: 600px; max-width: 1000px; white-space: normal;">Premium Security Services Trusted by Millions 
							</div>
							<!-- LAYER NR. 2 -->
							<div class="tp-caption NotGeneric-SubTitle tp-resizeme rs-parallaxlevel-0" 
								id="slide-148-layer-2" 
								data-x="['left','left','left','left']" data-hoffset="['50','50','50','50']"
								data-y="['center','center','center','center']" data-voffset="['0','0','0','0']" 
								data-fontsize="['18','18','18','16']"
								data-lineheight="['26','26','26','26']"
								data-width="['600','550','500','420']"
								data-height="none"								
								data-letter-spacing="normal"
								data-whitespace="normal"
								data-transform_idle="o:1;"
								data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" 
								data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
								data-mask_out="x:inherit;y:inherit;" 
								data-start="1500" 
								data-splitin="none" 
								data-splitout="none" 
								data-responsive_offset="on" 
								style="z-index: 6; min-width: 600px; max-width: 800px; white-space: normal; font-weight: 300">The only approved contractor of Security Guarding services, providing quality
								security services to many organizations and private companies
							</div>
							<!-- LAYER NR. 2 -->
							<div class="tp-caption NotGeneric-Button rev-btn  rs-parallaxlevel-0" 
								id="slide-148-layer-3" 
								data-x="['left','left','left','left']" data-hoffset="['50','50','50','50']" 
								data-y="['center','center','center','center']" data-voffset="['90','90','90','90']" 
								data-fontsize="['14','14','14','12']"								
								data-width="none"
								data-height="none"
								data-whitespace="nowrap"
								data-transform_idle="o:1;"
								data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
								data-style_hover="c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);cursor:pointer;"
								data-transform_in="y:50px;opacity:0;s:1500;e:Power4.easeInOut;" 
								data-transform_out="y:[175%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
								data-mask_out="x:inherit;y:inherit;" 
								data-start="2000" 
								data-splitin="none" 
								data-splitout="none" 
								data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
								data-responsive_offset="on" 
								data-responsive="off"
								style="z-index: 9; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;">LEARN MORE <i class="fa fa-chevron-right"></i>
							</div>
						</li>
						<!-- /. SLIDE  -->
						<!-- SLIDE  -->
						<li data-index="rs-149" data-transition="zoomout" data-slotamount="default"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="images/slider/thumbs/2.jpg"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Security" data-description="">
							<!-- MAIN IMAGE -->
							<img src="images/slider/2.jpg"  alt="" data-bgposition="center center" data-kenburns="on" data-duration="20000" data-ease="Linear.easeNone" data-scalestart="130" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
							<!-- LAYERS -->
							<!-- LAYER NR. 1 -->
							<div class="tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-0 t-center" 
								id="slide-149-layer-1" 
								data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								data-y="['center','center','center','center']" data-voffset="['-110','-110','-100','-110']" 
								data-fontsize="['16','16','16','16']"
								data-lineheight="['22','22','22','22']"
								data-width="['800','800','600','300']"
								data-height="none"
								data-whitespace="normal"
								data-transform_idle="o:1;"
								data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" 
								data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
								data-mask_out="x:inherit;y:inherit;" 
								data-start="1000" 
								data-splitin="none" 
								data-splitout="none" 
								data-responsive_offset="on" 
								style="z-index: 6; min-width: 600px; max-width: 1000px; white-space: normal; text-align:center; letter-spacing:3px; font-weight: 300;">WELCOME TO G7 SECURITY 
							</div>
							<!-- LAYER NR. 1 -->
							<div class="tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-0 t-center" 
								id="slide-149-layer-2" 
								data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								data-y="['center','center','center','center']" data-voffset="['-50','-50','-50','-50']" 
								data-fontsize="['42','42','38','20']"
								data-lineheight="['50','50','38','26']"
								data-width="['800','800','600','320']"
								data-height="none"
								data-whitespace="normal"
								data-transform_idle="o:1;"
								data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" 
								data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
								data-mask_out="x:inherit;y:inherit;" 
								data-start="1000" 
								data-splitin="none" 
								data-splitout="none" 
								data-responsive_offset="on" 
								style="z-index: 6; min-width: 600px; max-width: 1000px; white-space: normal; text-align:center;">The Most Successful Security Agency 
							</div>
							<!-- LAYER NR. 2 -->
							<div class="tp-caption NotGeneric-SubTitle tp-resizeme rs-parallaxlevel-0" 
								id="slide-149-layer-3" 
								data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								data-y="['center','center','center','center']" data-voffset="['30','30','30','30']" 
								data-fontsize="['18','18','18','18']"
								data-lineheight="['26','26','26','26']"
								data-width="['600','550','500','420']"
								data-height="none"								
								data-letter-spacing="normal"
								data-whitespace="normal"
								data-transform_idle="o:1;"
								data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" 
								data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
								data-mask_out="x:inherit;y:inherit;" 
								data-start="1500" 
								data-splitin="none" 
								data-splitout="none" 
								data-responsive_offset="on" 
								style="z-index: 6; min-width: 600px; max-width: 800px; white-space: normal; font-weight: 300; text-align:center;">The only approved contractor of Security Guarding services, providing quality
								security services to many organizations and private companies
							</div>
							<!-- LAYER NR. 2 -->
							<div class="tp-caption NotGeneric-Button rev-btn  rs-parallaxlevel-0" 
								id="slide-149-layer-4" 
								data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								data-y="['center','center','center','center']" data-voffset="['120','120','120','120']" 
								data-fontsize="['14','14','14','12']"								
								data-width="none"
								data-height="none"
								data-whitespace="nowrap"
								data-transform_idle="o:1;"
								data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
								data-style_hover="c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);cursor:pointer;"
								data-transform_in="y:50px;opacity:0;s:1500;e:Power4.easeInOut;" 
								data-transform_out="y:[175%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
								data-mask_out="x:inherit;y:inherit;" 
								data-start="2000" 
								data-splitin="none" 
								data-splitout="none" 
								data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
								data-responsive_offset="on" 
								data-responsive="off"
								style="z-index: 9; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;">LEARN MORE <i class="fa fa-chevron-right"></i>
							</div>
						</li>
						<!-- /. SLIDE  -->		
					</ul>
					<div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
				</div>
			</div>
			<!-- END REVOLUTION SLIDER -->
		</div>
		<!-- /. SLIDER ENDS
			========================================================================= -->
		<!-- INTRO STARTS
			========================================================================= -->
		<div class="container intro-section grey-bg">
			<div class="row no-gutter no-gutter-4">
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="block overlay-margin-2">
						<div class="picture"><img src="images/intro/123.jpg" class="img-responsive" alt=""></div>
						<div class="info">
							<div class="heading">Enquire now</div>
							<div class="description">-:  Ask a quote about your security needs</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="block overlay-margin-2">
						<div class="picture"><img src="images/IMG_0991.jpg" class="img-responsive" alt=""></div>
						<div class="info">
							<div class="heading">Corporate Security</div>
							<div class="description">-:  Information about Corporate Services</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 hidden-sm">
					<div class="block video overlay-margin-2">
						<div class="picture">
							<img src="images/intro/3.jpg" class="img-responsive" alt="">
							<div class="info-overlay">
								<div class="icon"><a class="popup-vimeo" href="https://vimeo.com/45830194"><i class="fa fa-play"></i></a></div>
								<div class="heading">Watch the tour</div>
								<div class="description">Explore what we do for Security</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ./ INTRO ENDS
			========================================================================= -->
		<!-- SECURITY SOLUTIONS STARTS
			========================================================================= -->
		<div class="home-security-solutions">
			<div class="container">
				<div class="row">
					<!-- Security Solutions Starts -->
					<div class="col-lg-8 col-md-8 col-sm-8">
						<div class="herotext">
							<h2>Reliable protection for you and
</h2>
							<h1> your organization</h1>
							<div class="line">&nbsp;</div>
						</div>
						<div class="description">G7 is a global leader in security knowledge. In India, we are one of the leading and largest security services providers, with an established national network with 20,000 employees. We excel in providing security solutions to Customers across Industry segments and serve large corporates with global operations in various customer segments. Our security services include Specialized Guarding, Event Security, Executive Protection and Transport Security. 

						</div>
						<div class="button"><a href="about.php" class="btn-orange">Who we are <i class="fa fa-chevron-right"></i></a></div>
					</div>
					<!-- Security Solutions Ends -->
					<!-- Why Choose Us Starts -->
					<div class="col-lg-4 col-md-4 col-sm-4 why-choose-us">
						<div class="herotext-2">
							<h2>Why Choose Us</h2>
							<h1>Guard Master Features</h1>
							<div class="line">&nbsp;</div>
						</div>
						<ul>
							<li>Technical Security Surveys & Audits</li>
							<li>Best CCTV Systems Network</li>
							<li>Mobile Patrol Management Team</li>
							<li>Licensed, Experienced & Qualified Security Staff</li>
							<li>All Types of Security Barriers Included</li>
							<li>Mobile Surveilence of Vehicles</li>
							<li>Access Control Systems</li>
							<li>Fully Insured & Legal Company</li>
						</ul>
					</div>
					<!-- Why Choose Us Starts -->
				</div>
			</div>
		</div>
		<!-- /. SECURITY SOLUTIONS ENDS
			========================================================================= -->
		<!-- FUNFACTS STARTS
			========================================================================= -->
		<div class="parallax-1 funfacts">
			<div class="container">
				<div class="row">
					<!-- Block Starts -->
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="block">
							<div class="box">
								<h2>Events Served</h2>
								<h1>1K+</h1>
								<div class="caret-down"><i class="fa fa-caret-down"></i></div>
							</div>
						</div>
					</div>
					<!-- Block Ends -->
					<!-- Block Starts -->
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="block">
							<div class="box">
								<h2>Qualified Staff</h2>
								<h1>450</h1>
								<div class="caret-down"><i class="fa fa-caret-down"></i></div>
							</div>
						</div>
					</div>
					<!-- Block Ends -->
					<!-- Block Starts -->
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="block">
							<div class="box">
								<h2>Our Locations</h2>
								<h1>1200</h1>
								<div class="caret-down"><i class="fa fa-caret-down"></i></div>
							</div>
						</div>
					</div>
					<!-- Block Ends -->
					<!-- Block Starts -->
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="block">
							<div class="box">
								<h2>Area Serving</h2>
								<h1>550</h1>
								<div class="caret-down"><i class="fa fa-caret-down"></i></div>
							</div>
						</div>
					</div>
					<!-- Block Ends -->
				</div>
				<div class="row intro">
					<div class="col-lg-12">
						<h2>With over 5 decades of experience, We deliver</h2>
						<h1>premium security solutions at best price</h1>
						<div class="description">Specialized Guarding, Executive Protection, Event Security and Transport Security, Background Checks with specialization in Pre & Post Employment Verification</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /. FUNFACTS ENDS
			========================================================================= -->
		<!-- PICTURES STARTS
			========================================================================= -->
		<div class="container-fluid home-pictures">
			<div class="row no-gutter-4">
				<div class="col-lg-4 col-md-4 col-sm-4"><img src="images/gallery/home/1.jpg" class="img-responsive" alt=""></div>
				<div class="col-lg-4 col-md-4 col-sm-4"><img src="images/gallery/home/2.jpg" class="img-responsive" alt=""></div>
				<div class="col-lg-4 col-md-4 col-sm-4"><img src="images/IMG_0985.JPG" class="img-responsive" alt=""></div>
			</div>
		</div>
		<!-- /. PICTURES ENDS
			========================================================================= -->
		<!-- OUR SERVICES STARTS
			========================================================================= -->
		<div class="container home-our-services">
			<div class="row no-gutter no-gutter-5 no-gutter-6">
				<div class="col-lg-5 col-md-5 col-sm-6">
					<div class="herotext overlay-margin">
						<!-- <h2>What We Offers</h2> -->
						<h1>Our Services</h1>
						<div class="text">-: We have highly trained staff available that implement security measures around any Retail, Commercial or Industrial Site.</div>
						<div class="line">&nbsp;</div>
						<div class="desciption"><li>Industrial Security</li>
												<li>Residential Security</li>
												<li>Hotel Security</li>
												<li>Corporate Security</li>
												

													<li>Investigation Services</li>
													<li>Training Services</li>
													<li>Close Protection</li>
													<li>Bank Security</li>
													<li>Security for Archaeological Sites</li>
													<li>Fire Squad</li>
													<li>Dog Squad</li>
												
						</div>
						<!-- <div class="button"><a href="" class="btn-orange">View more services <i class="fa fa-chevron-right"></i></a></div> -->
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<ul class="services">
								<li>
									<div class="icon"><i class="flaticon-camera113"></i></div>
									<h1>CCTV System</h1>
									<div class="line2"></div>
									<div class="desciption"></div>
								</li>
								<li>
									<div class="icon"><i class="flaticon-shield20"></i></div>
									<h1>On-Site Security</h1>
									<div class="line2"></div>
									<div class="desciption"></div>
								</li>
								<li>
									<div class="icon"><i class="flaticon-computer347"></i></div>
									<h1>Threat & Rist Assessment</h1>
									<div class="line2"></div>
									<div class="desciption"></div>
								</li>
							</ul>
						</div>
						<div class="col-lg-6 col-md-6">
							<ul class="services">
								<li>
									<div class="icon"><i class="flaticon-bell60"></i></div>
									<h1>Alarm Monitoring</h1>
									<div class="line2"></div>
									<div class="desciption"></div>
								</li>
								<li>
									<div class="icon"><i class="flaticon-flame7"></i></div>
									<h1>Life & Fire Protection</h1>
									<div class="line2"></div>
									<div class="desciption"></div>
								</li>
								<li>
									<div class="icon"><i class="flaticon-globe11"></i></div>
									<h1>Network Security</h1>
									<div class="line2"></div>
									<div class="desciption"></div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /. OUR SERVICES ENDS
			========================================================================= -->
		<!-- FUNFACTS STARTS
			========================================================================= -->
		<div class="parallax-2 testimonials">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1">
						<div class="herotext-3">
							<div class="boxed-heading">
								<h2>What Our Client's Say</h2>
								<h1>Services Feedback</h1>
							</div>
						</div>
					</div>
					<div class="col-lg-10 col-lg-offset-1">
						<div class="testimonials-carousel">
							<!-- Block Starts -->
							<div class="block">
								<div class="description">When dealing with The Security Company it was for the main reason to have a complete packing of monitoring, security consulting, and installation. I highly recommend using this company for home or business owners who want a no-nonsense approach to security.</div>
								<div class="name">Tata Motors, Jamshedpur</div>
								<div class="designation">Director.</div>
							</div>
							<!-- Block Ends -->
							<!-- Block Starts -->
							<div class="block">
								<div class="description">They understood what was needed and exceeded my expectations in delivering a very timely alarm service. It was an impressive demonstration of teamwork from when the original call request was placed to the great communication the guys displayed with their supportive actions to have our home showroom ready. There’s not many businesses that can stand the test of time, but with the values shared by your staff and the reliability of your products I will have no hesitation in recommending you to family and friends. My heartfelt thanks as I just wanted to share our appreciation and recognise a truly great Company</div>
								<div class="name">Infinite Net Solutions</div>
								<div class="designation">CEO</div>
							</div>
							<!-- Block Ends -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /. FUNFACTS ENDS
			========================================================================= -->
		<!-- OUR SERVICES STARTS
			========================================================================= -->
		<div class="container home-our-team">
			<div class="row no-gutter no-gutter-5 no-gutter-6">
				<div class="col-lg-5 col-md-6 col-sm-6">
					<div class="herotext overlay-margin">
						<h2>The Security Leaders</h2>
						<h1>Our Teams</h1>
						<div class="text">-: We have highly trained staff available that implement security measures around any Retail, Commercial or Industrial Site.</div>
						<div class="line">&nbsp;</div>
						<ul class="bullets">
							<li><a href="">The Exectives Team Members</a></li>
							<li><a href="">Office Management</a></li>
							<li><a href="">Security Supervisors</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-lg-offset-1">
					<div class="our-team-carousel">
						<!-- Block Starts -->
						<div class="block">
							<div class="picture">
								<img src="images/team/ajay_tripathi.jpg" class="img-responsive" alt="">
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
								<div class="name">AJAY TRIPATHI</div>
								<div class="designation">-: Director & CEO</div>
							</div>
						</div>
						<!-- Block Ends -->
						<!-- Block Starts -->
						<div class="block">
							<div class="picture">
								<img src="images/team/suraj_tripathi.jpg" class="img-responsive" alt="">
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
								<div class="name">SURAJ TRIPATHI</div>
								<div class="designation">-: Director & CEO</div>
							</div>
						</div>
						<!-- Block Ends -->
						<!-- Block Starts -->
						<div class="block">
							<div class="picture">
								<img src="images/team/ajay_tripathi.jpg" class="img-responsive" alt="">
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
							<div class="name">AJAY TRIPATHI</div>
								<div class="designation">-: Director & CEO</div>
							</div>
						</div>
						<!-- Block Ends -->
						<!-- Block Starts -->
						<div class="block">
							<div class="picture">
								<img src="images/team/suraj_tripathi.jpg" class="img-responsive" alt="">
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
							<div class="name">SURAJ TRIPATHI</div>
								<div class="designation">-: Director & CEO</div>
							</div>
						</div>
						<!-- Block Ends -->
					</div>
				</div>
			</div>
		</div>
		<!-- /. OUR SERVICES ENDS
			========================================================================= -->
		
		<!-- CALL US STARTS
			========================================================================= -->
		<div class="callus parallax-3">
			<div class="container">
				<div class="row intro">
					<div class="col-lg-12">
						<h1>call us on  <span><?php echo $result['phone']; ?></span>  to discuss your security requirements</h1>
						<div class="description">You can also email us at , We usually reply within 48 hours.</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /. CALL US ENDS
			========================================================================= -->
		<!-- LATEST NEWS STARTS
			========================================================================= -->
		<div class="latest-news">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1">
						<div class="herotext-3">
							<div class="boxed-heading">
								<h2>What's Happening</h2>
								<h1>Read Latest News</h1>
							</div>
							<div class="description">We offer best security services</div>
						</div>
					</div>
				</div>
				<div class="news-carousel">
					<!-- News Starts -->
					<div class="news">
						<div class="picture"><img src="images/news/thumbs/1.jpg"  class="img-responsive" alt=""></div>
						<div class="block">
							<div class="date">-: Jan 20, 2016   /   Admin</div>
							<h1>Services</h1>
							<div class="description">The services offered are Specialized Guarding, Executive Protection, Event Security and Transport Security, Background Checks with specialization in Pre & Post Employment Verification.The key success component and a cornerstone in our business philosophy is Knowledge.</div>
							<!-- <div class="button"><a href="" class="btn-orange">Read More <i class="fa fa-chevron-right"></i></a></div> -->
						</div>
					</div>
					<!-- News Ends -->
					<!-- News Starts -->
					<div class="news">
						<div class="picture"><img src="images/news/thumbs/2.jpg"  class="img-responsive" alt=""></div>
						<div class="block">
							<div class="date">-: Jan 20, 2016   /   Admin</div>
							<h1>Global Knowledge Leader</h1>
							<div class="description"> G7's long-term strategy of continuous benchmarking, transfer of best practices, knowledge about the customers and their needs and tailored training programmes across all levels in the organization has resulted into a solid base of industry know-how</div>
							<!-- <div class="button"><a href="" class="btn-orange">Read More <i class="fa fa-chevron-right"></i></a></div> -->
						</div>
					</div>
					
					<!-- News Ends -->
				</div>
			</div>
		</div>
		<!-- /. LATEST NEWS ENDS
			========================================================================= -->
		<!-- WORKING WITH US STARTS
			========================================================================= -->
		<div class="white-bg working-with-us">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-5"><img src="images/workingwithus/1.jpg" class="img-responsive center-block" alt=""></div>
					<div class="col-lg-7 col-md-7 herotext">
						<h1>Are You Interested In Working With Us!</h1>
						<div class="line"></div>
						<div class="text"> Join our team & start your career as a G7 Security Officer. It’s our mission to recruit the best as we always recruiting professionals, highly motivated & well presented Security Officers to join our team!</div>
						<div class="button"><a href="career.php" class="btn-orange">View the Jobs <i class="fa fa-chevron-right"></i></a></div>
					</div>
				</div>
			</div>
		</div>
		<!-- /. WORKING WITH US ENDS
		
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
		<!-- REVOLUTION JS FILES -->
		<script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js"></script>
		<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
			(Load Extensions only on Local File Systems !  
			The following part can be removed on Server for On Demand Loading) -->	
		<script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
		<script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
		<script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
		<script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
		<script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
		<script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
		<script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
		<script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
		<script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>
		<script type="text/javascript">
			var tpj=jQuery;			
			var revapi4;
			tpj(document).ready(function() {
				if(tpj("#rev_slider_46_1").revolution == undefined){
					revslider_showDoubleJqueryError("#rev_slider_46_1");
				}else{
					revapi4 = tpj("#rev_slider_46_1").show().revolution({
						sliderType:"standard",
						jsFileLocation:"revolution/js/",
						sliderLayout:"fullscreen",
						dottedOverlay:"none",
						delay:9000,
						navigation: {
							keyboardNavigation:"off",
							keyboard_direction: "horizontal",
							mouseScrollNavigation:"off",
							onHoverStop:"off",
							touch:{
								touchenabled:"on",
								swipe_threshold: 75,
								swipe_min_touches: 1,
								swipe_direction: "horizontal",
								drag_block_vertical: false
							}
							,
							arrows: {
							style:"erinyen",
							enable:true,
							hide_onmobile:true,
							hide_under:600,
							hide_onleave:true,
							hide_delay:200,
							hide_delay_mobile:1200,
							tmp:'<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div>    <div class="tp-arr-img-over"></div>	<span class="tp-arr-titleholder">{{title}}</span> </div>',
							left: {
								h_align:"left",
								v_align:"center",
								h_offset:30,
								v_offset:0
							},
							right: {
								h_align:"right",
								v_align:"center",
								h_offset:30,
								v_offset:0
							}
						}
						
						},
						viewPort: {
							enable:true,
							outof:"pause",
							visible_area:"80%"
						},
						responsiveLevels:[1240,1024,778,480],
						gridwidth:[1240,1024,778,480],
						gridheight:[600,600,500,400],
						lazyType:"none",
						parallax: {
							type:"mouse",
							origo:"slidercenter",
							speed:2000,
							levels:[2,3,4,5,6,7,12,16,10,50],
						},
						shadow:0,
						spinner:"off",
						stopLoop:"off",
						stopAfterLoops:-1,
						stopAtSlide:-1,
						
						fullScreenAlignForce:"off",
						fullScreenOffsetContainer: "",
						fullScreenOffset: "0px",
						disableProgressBar:"on",
						hideThumbsOnMobile:"off",
						
						shuffle:"off",
						autoHeight:"off",
						hideThumbsOnMobile:"off",
						hideSliderAtLimit:0,
						hideCaptionAtLimit:0,
						hideAllCaptionAtLilmit:0,
						debugMode:false,
						fallbacks: {
							simplifyAll:"off",
							nextSlideOnWindowFocus:"off",
							disableFocusListener:false,
						}
					});
				}
			});	/*ready*/
		</script>
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