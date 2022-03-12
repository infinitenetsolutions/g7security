<?php
include 'admin/connection/db.php';

    if(isset($_REQUEST['submitf'])){
    if ($_REQUEST['name'] != '' && $_REQUEST['name'] != NULL 
          
            && $_REQUEST['email'] != '' && $_REQUEST['email'] != NULL
            && $_REQUEST['phone'] != '' && $_REQUEST['phone'] != NULL
            && $_REQUEST['website'] != '' && $_REQUEST['website'] != NULL
            && $_REQUEST['comment'] != '' && $_REQUEST['comment'] != NULL

//            && $_REQUEST['program'] != '' && $_REQUEST['program'] != NULL && isset($_REQUEST['send'])
    ) {
        //send email
        $email = $_REQUEST['email'];
        $subject = 'Registration from ' . $_REQUEST['name']
//                . '| Regarding ' . $_REQUEST['subject']
        ;
        $message = "Name : " . $_REQUEST['name']
              
        . "\r\n Email : " . $_REQUEST['email']
        . ",\r\n Phone : " . $_REQUEST['phone']
        . ",\r\n Website : " . $_REQUEST['website']
        . ",\r\n Comment : " . $_REQUEST['comment'];


        $message = wordwrap($message, 70, "\r\n");
        mail(" info@g7securityagency.com", $subject, $message);
        ?>
        <script>
            alert('Mail Sent. Thank you for contacting us!');
            document.getElementById("contact").reset();
            document.getElementById('name') = "";</script>
        <?php
    }}

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
	<body class="contact-us">
		<!-- NAVIGATION STARTS
			========================================================================= -->
		<nav id="navigation">
			<div id="tc" class="container top-contact hidden-sm hidden-xs">
				<div class="row">
					<div class="col-lg-2 col-md-2">
						<!--  Logo Starts -->
						<a class="navbar-brand external" href="index.php"><img src="images/logos/logo-1.png" alt="" style="width:220px;margin-top: -17px;"></a>
						<!-- Logo Ends -->
					</div> 
					<div class="col-lg-10 col-md-10">
						<?php
						$sql= mysqli_query($dbcon,"select * from contact");
						$result = mysqli_fetch_assoc($sql);
						?>
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
		<div class="inner-banner-style banner-img-02">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="info">
							<h1>Contact Us</h1>
							<ol class="breadcrumb">
								<li><a href="#">Home</a></li>
								<li class="active">Get in Touch</li>
							</ol>
							<div class="line"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /. INNER BANNER ENDS
			========================================================================= -->
		<!-- ADDRESS STARTS
			========================================================================= -->
		<div class="container address">
			<div class="row no-gutter no-gutter-5 no-gutter-6">
				<div class="col-lg-5 col-md-5 col-sm-5">
					<div class="herotext overlay-margin">
						<h2>We Always Send</h2>
						<h1>Quick Response</h1>
						<div class="text">-: We have highly trained staff available that implement security measures around any Retail, Commercial or Industrial Site.</div>
						<div class="line">&nbsp;</div>
						<ul class="bullets-contact">
							<li><i class="fa fa-phone-square"></i> : 9835226882,8969779654</li>
							<li><a href="mailto:info@companyname.com"><i class="fa fa-envelope-square"></i> : info@g7securityagency.com</a></li>
							<li><i class="fa fa-home"></i> : Tirupurari Colony, Near Hari Mandir, Aditypur 1, S Type, Housing Colony, Adityapur, Jamshedpur, Jharkhand 831013</li>
							9835226882
							<li><i class="fa fa-clock-o"></i> : Monday to Sunday: 24 Hours Available</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
					<div class="google-map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3678.366574396917!2d86.15597731454086!3d22.78887698507196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f5e4958e55554d%3A0xe7b025e1fea4db28!2sG+Seven+Industrial+Security+Agency+Pvt.+Ltd.!5e0!3m2!1sen!2sin!4v1520925895244" height="405" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
		<!-- /. ADDRESS ENDS
			========================================================================= -->	
		<!-- SEND US MESSAGE START
			========================================================================= -->
		<div class="send-us-message white-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2>Providing security solutions that makes your life easier </h2>
						<h1>send us a message</h1>
						<div class="line"></div>
						<!-- Form Starts -->
						<form action="" method="post" name="ContactForm" id="ContactForm" >
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" id="name" name="name" placeholder="Full Name *">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="form-group">
										<input type="email" class="form-control" id="email" name="email" placeholder="Email Address *">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" id="website" name="website" placeholder="Website">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<textarea rows="5" class="form-control" name="comment" id="comment" placeholder="Your Message *" style="height:150px;"></textarea>
									</div>
								</div>
								<div class="col-lg-12 butn">
									<div id='message_post'></div>
									<button type="submit" class="btn btn-default" name="submitf" id="submitf">Send Message <i class="fa fa-chevron-right"></i></button>
								</div>
							</div>
						</form>
						<!-- Form Ends -->
					</div>
				</div>
			</div>
		</div>
		<!-- /. SEND US MESSAGE ENDS
			========================================================================= -->
		<!-- DOWNLOAD STARTS
			========================================================================= -->
		
		<!-- /. DOWNLOAD ENDS
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
		<!-- AJAX Contact Form --> 			
		<!--<script type="text/javascript" src="js/contact/contact-form.js"></script>-->
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