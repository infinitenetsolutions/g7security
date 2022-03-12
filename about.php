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
	<body class="about-us">
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
							<h1>About Us</h1>
							<ol class="breadcrumb">
								<li><a href="index.php">Home</a></li>
								<li class="active">About Us</li>
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
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="block">
						<div class="picture"><img src="images/intro/4.jpg" class="img-responsive" alt=""></div>
						<div class="info">
							<div class="heading"> Our Vision</div>
							<!-- <div class="heading-2">-:  We fully understand the retail environment</div> -->
							<div class="description">G7 is one of the leading Security Services and Background Verification providers in India and presently employs approx 22,000 trained personnel across India. With our deep commitment on being responsive to clients and being the number 1 employer of choice within our industry (taking good care of our people so they take better care of you), we strive persistently to remain the market leader in client satisfaction and retention. 
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 hidden-sm">
					<div class="block video">
						<div class="picture">
							<img src="images/intro/6.jpg" class="img-responsive" alt="">
							<div class="info-overlay">
								<div class="icon"><a class="popup-vimeo" href="https://vimeo.com/45830194"><i class="fa fa-play"></i></a></div>
								<div class="heading">Watch the tour</div>
								<div class="description">Explore what we do for Security</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="block">
						<div class="picture"><img src="images/intro/5.jpg" class="img-responsive" alt=""></div>
						<div class="info">
							<div class="heading">Our Mission</div>
							<div class="heading-2">-:  Information about Our Corporate Services</div>
							<div class="description">We serve a wide range of industries and segments like: Banking, IT/ ITES, Insurance, Retail, Healthcare, Entertainment, Events, Hospitality, Telecom and Manufacturing. 
G7 is a part of a global company with a local flavor and our network of branch offices throughout India allows us to extend that personal touch.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /. INTRO SECTION ENDS
			========================================================================= -->
		<!-- FUNFACTS STARTS
			========================================================================= -->
		<div class="funfacts">
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
								<h1>1+</h1>
								<div class="caret-down"><i class="fa fa-caret-down"></i></div>
							</div>
						</div>
					</div>
					<!-- Block Ends -->
					<!-- Block Starts -->
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="block">
							<div class="box">
								<h2>Industry Serving</h2>
								<h1>550</h1>
								<div class="caret-down"><i class="fa fa-caret-down"></i></div>
							</div>
						</div>
					</div>
					<!-- Block Ends -->
				</div>
			</div>
		</div>
		<!-- /. FUNFACTS ENDS
			========================================================================= -->
		<!-- WE DELIVER STARTS
			========================================================================= -->
		<div class="container-fluid">
			<div class="row">
				<section class="we-deliver white-bg">
					<div class="col-lg-6 col-sm-8 col-lg-offset-6 col-sm-offset-4 herotext">
						<h1>With years of experience</h1>
						<div class="heading2">Our Service Offering are</div>
						<div class="line"></div>
						<div class="text">Specialized Guarding, Executive Protection, Event Security and Transport Security, Background Checks with specialization in Pre & Post Employment Verification
						</div>

						<div class="heading2">Global Knowledge Leader</div>
						
						<div class="text">The key success component and a cornerstone in our business philosophy is Knowledge. G7's long-term strategy of continuous benchmarking, transfer of best practices, knowledge about the customers and their needs and tailored training programmes across all levels in the organization has resulted into a solid base of industry know-how.
						</div>
					</div>
					<div class="col-lg-6 col-sm-4 img-side img-left">
						<div class="img-holder"><img src="images/wedeliver/2.jpg" alt=""></div>
					</div>
				</section>
			</div>
		</div>
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
								<h1>Focus on Specialization</h1>
								<!-- <h2>Ipsum sit amet consectetur usmod</h2> -->
								<div class="line"></div>
							</div>
							<div class="description">G7 services a wide range of customers in a variety of industries and segments. As the size of the customers varies from the "shop on the corner" to multi-billion industries, the security solutions are as multi-faceted as the number of assignments. At G7, we emphasize on verticalization of services to enable us to meet our client's specific expectations.
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 block">
						<div class="icon"><i class="flaticon-shield20"></i></div>
						<div class="details">
							<div class="herotext-2">
								<h1>Customized Training</h1>
								<!-- <h2>Ipsum sit amet consectetur usmod</h2> -->
								<div class="line"></div>
							</div>
							<div class="description">To meet customer demand and increased operational network, we emphasize on talent hiring and specialized training. Our trained security personnel perform services that are tailored to suit each client's needs, since the services require customer knowledge and close relationships. Regular refresher training modules are imparted to workforce in order to continuously upgrade and improve their service delivery. The workforce is equipped to assess activities, movements and handle vulnerable situations at their client site.
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
						<h2>Our Approach</h2>
						
						<div class="text">-:
G7 is a client-focused organization. We thoroughly screen and train our security personnel and ensure that our workforce provides responsive and thorough security services, we thrust on:</div>
						<div class="line">&nbsp;</div>
						<ul class="bullets">
							<li><a href="#">Redefining Security Services
</a></li>
							<li><a href="#">CRU: Customer Relations Unit</a></li>
							<li><a href="#">Recruitment</a></li>
							<li><a href="#">Training</a></li>
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
		<!-- /. OUR TEAM ENDS
			========================================================================= -->	
		<!-- HISTORY TIMELINE STARTS
			========================================================================= -->
		<div class="white-bg">
			<div class="history-timeline">
				<div class="container">
					<div class="row">
						<div class="col-lg-10 col-lg-offset-1">
							<div class="herotext-3">
								<div class="boxed-heading">
									<h2>Year's in Business</h2>
									<h1>Best of the services</h1>
								</div>
								<!-- <div class="description">To ensure that we deliver best of the services and meet our client’s expectations, we believe in :</div> -->
							</div>
						</div>
					</div>
					
					<div class="row">
				<div class="col-lg-10 col-lg-offset-1 history-timeline-tabs">
					<!-- Nav tabs -->
					<ul class="nav nav-justified icon-tabs" role="tablist">
						<li role="presentation" class="active">
							<a href="#1995" aria-controls="1995" role="tab" data-toggle="tab">								
								<div class="caption"><h4>Redefining Security Services</h4>
</div>
								<div class="icon"><i class="fa fa-caret-down"></i></div>
							</a>
						</li>
						<li role="presentation">
							<a href="#2002" aria-controls="2002" role="tab" data-toggle="tab">								
								<div class="caption"><h4>CRU: Customer Relations Unit</h4></div>
								<div class="icon"><i class="fa fa-caret-down"></i></div>
							</a>
						</li>
						<li role="presentation">
							<a href="#2007" aria-controls="2007" role="tab" data-toggle="tab">								
								<div class="caption"><h4>Recruitment</h4></div>
								<div class="icon"><i class="fa fa-caret-down"></i></div>
							</a>
						</li>
						<li role="presentation">
							<a href="#2012" aria-controls="2012" role="tab" data-toggle="tab">								
								<div class="caption"><h4>Training</h4></div>
								<div class="icon"><i class="fa fa-caret-down"></i></div>
							</a>
						</li>
						
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="1995">
							<h1>Identifying, assessing, conceptualizing, designing & implementing security solutions</h1>
							<div class="description">
								Threat assessment, risk analysis and recommendations for upgradation of security measures at the facility
Independent security audits of complexes and recommendations
Provision of trained, uniformed and responsive security personnel
Conducting awareness capsules and practical training for management staff and employees on the following security aspects:
- Fire prevention, detection, control and premises evacuation plans
- Executive security, residential security & women self defence
- Office/ Workplace security
- Security aspects of reception and visitor management
- Various aspects of corporate, industrial and personnel security
Assisting managements to formulate/ upgrade crisis management, emergency response and business continuity plans and manuals.
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="2002">
							<h1>We have achieved a Milestone</h1>
							<div class="description">
								
								<li>Vision to exceed customer satisfaction</li>
								<li>Quick response with Turn Around</li>
								<li>Understanding the client's need</li>
								<li>Anticipating their requirements</li>
								<li>Checking on client's satisfaction levels</li>
								<li>Crisis management</li>
								<li>Proactive approach</li>
								<li>Evaluation</li>
								<li>Action and Resolution</li> 
								<li>Recruitment and Selection</li>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="2007">
							<h1>The recruitment of workforce involves strict & stringent selection parameters:
</h1>
							<div class="description">
								<li>Physical fitness</li>
								<li>Medical fitness</li>
								<li>Qualification and skills</li>
								<li>Background screening</li>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="2012">
							<!-- <h5>G7 has a state-of-the-art training academy in New Delhi & Bangalore, besides having training schools at various regional centres. The training curriculum involves physical fitness training, classroom training, power point presentations, case studies, demonstrations, role plays and table top exercises. </h5> -->
							<div class="description">
								Training program includes:
								<li>15 days of pre-deployment training</li>
								<li>2 days of first aid training</li>
								<li>7 days of on-the-job training</li>
								<li>At least 6 training days every quarter</li>
								<li>Accumulating to 48 days of training in a calendar year, in the first operational year</li>
								<li>Supervision</li>
								A well worked out supervision process to ensure that our quality standards are being met & delivered through our services. It Includes:
								<li>Patrolling/ Roaming supervision</li>
								<li>Surprise night checks by middle & senior management</li> 
								<li>Quick Response Team</li>
								<li>24 x 7 Control Room</li>
								Our Quick Response Vehicles deputed across India are equipped with communication tools and trained security personnel
								QRT vehicles are operational 24x7, in close coordination with the control room to provide assistance to our valued customers in times of emergency and crisis situations
							</div>
						</div>
						
					</div>
				</div>
			</div>				
				
					
					
				</div>
			</div>
		</div>
		<!-- /. HISTORY TIMELINE ENDS
			========================================================================= -->
		<!-- CLIENTS STARTS
			========================================================================= -->
		<div class="container clients">
			<div class="row">
				<div class="col-lg-12 clients-carousel">
					<?php
					$sql= mysqli_query($dbcon,"select * from clients");
					while ($result = mysqli_fetch_assoc($sql)) {
					
					?>
					<div class="block"><img src="admin/clients/<?php echo $result['file']; ?>" class="img-responsive center-block" alt="" style="height: 80px; width: 150px;"></div>
				<?php }	?>
					
			</div>
		</div>
	</div>
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