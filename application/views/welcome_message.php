<!doctype html>
<html class="no-js" lang="zxx"> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Jungle Clube</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/scrollbar.css">
	<link rel="stylesheet" href="css/jquery.mmenu.all.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<?php
if(!empty($this->session->userdata('username')))
{
	?> <body class="tg-login"> <?php

 $username = $this->session->userdata('username');
echo $username;
}
else
{
	?>
	<body class="tg-home tg-homevone">
	<?php
}
?>

<!--<body class="tg-login">-->

	<!--************************************
			Mobile Menu Start
	*************************************-->
	<?php $this->load->view('layout/header');?>
		<!--************************************
				Header End
		*************************************-->
		<!--************************************
				Home Slider Start
		*************************************-->
		<div class="tg-bannerholder">
			<div class="tg-slidercontent">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h1>Experience the Wonder</h1>
							<h2>People don’t take trips, trips take People</h2>
							
						</div>
						<div class="col-lg-offset-2 col-lg-8">
                    <form class="tg-formtheme tg-formtrip ">
                                <fieldset>
                                    <div class="form-group">
                                        <div class="tg-select">
                                            <select class="selectpicker" data-live-search="true" data-width="100%">
                                                <option data-tokens="Destinations">Destinations</option>
                                                <option data-tokens="All Areas">All Areas</option>
                                                <option data-tokens="Bayonne">Bayonne</option>
                                                <option data-tokens="Greenville">Greenville</option>
                                                <option data-tokens="Manhattan">Manhattan</option>
                                                <option data-tokens="Queens">Queens</option>
                                                <option data-tokens="The Heights">The Heights</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="tg-select">
                                            <select class="selectpicker" data-live-search="true" data-width="100%">
                                                <option data-tokens="Adventure Type">Adventure Type</option>
                                                <option data-tokens="Ice Adventure Vacations">Ice Adventure Vacations</option>
                                                <option data-tokens="National Park">National Park</option>
                                                <option data-tokens="Adult Vacations">Adult Vacations</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <button class="tg-btn" type="submit"><span>find tours</span></button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
					</div>
				</div>
			</div>
			<div id="tg-homeslider" class="tg-homeslider owl-carousel tg-haslayout">
				<figure class="item" data-vide-bg="poster: images/parallax/bgparallax-01.jpg" data-vide-options="position: 0% 50%"></figure>
				<figure class="item" data-vide-bg="poster: images/parallax/bgparallax-02.jpg" data-vide-options="position: 0% 50%"></figure>
				<figure class="item" data-vide-bg="poster: images/parallax/bgparallax-04.jpg" data-vide-options="position: 0% 50%"></figure>
			</div>
		</div>
		<!--************************************
				Home Slider End
		*************************************-->

<!--************************************
					About Us Start
			*************************************-->
			<section class="tg-aboutus">
			
				
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right">
					<div class="row">
						<figure data-vide-bg="poster: images/parallax/bgparallax-07.jpg" data-vide-options="position: 0% 50%"></figure>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-left">
					<div class="row">
						<div class="tg-textbox">
							<div class="tg-sectiontitle">
								<h2>A Little About Us</h2>
							</div>
							<div class="tg-description">
								<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
								<p>Electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					About Us End
			*************************************-->
			<!--************************************
					Call To Action Start
			*************************************-->
			
			<section data-appear-top-offset="600"  >
				<div class=" tg-haslayout off">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-calltoaction">
									
									<h2>Get 10% Off on your Next Travel</h2>
									<div class="tg-pattern off_pattern"><img src="images/patternw.png" alt="image destination"></div>
									<div class="tg-description off_desc"><p>Travel between 22 April to 21 May and get existing offers along with a sure 10% cash discount</p></div>
									<a class="tg-btn off_butt" href="#"><span>Explore Tour</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Call To Action End
			*************************************-->

<!--************************************
					Popular Destination Start
			*************************************-->
			<section class="tg-parallax" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-01.jpg">
				<div class="tg-sectionspace tg-haslayout">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
								<div class="tg-sectionhead">
									<div class="tg-sectiontitle">
										<h2>Popular Destinations for Honeymoon</h2>
									</div>
									<div class="tg-description">
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam consectetuer adipiscing elit, sed diam nonummy.</p>
									</div>
								</div>
								<div id="tg-populardestinationslider" class="tg-populardestinationslider tg-populardestinations owl-carousel">
									<div class="item tg-populardestination">
										<figure>
											<a href="javascript:void(0);"><img src="images/tours/img-11.jpg" alt="image destinations"></a>
											<figcaption>
												<h3><a href="javascript:void(0);">Paris</a></h3>
												<div class="tg-description">
													<p>Beautiful City in the World</p>
												</div>
											</figcaption>
										</figure>
									</div>
									<div class="item tg-populardestination">
										<figure>
											<a href="javascript:void(0);"><img src="images/tours/img-12.jpg" alt="image destinations"></a>
											<figcaption>
												<h3><a href="javascript:void(0);">Dubai</a></h3>
												<div class="tg-description">
													<p>in the streets of London</p>
												</div>
											</figcaption>
										</figure>
									</div>
									<div class="item tg-populardestination">
										<figure>
											<a href="javascript:void(0);"><img src="images/tours/img-13.jpg" alt="image destinations"></a>
											<figcaption>
												<h3><a href="javascript:void(0);">Istanbul</a></h3>
												<div class="tg-description">
													<p>in the streets of London</p>
												</div>
											</figcaption>
										</figure>
									</div>
									<div class="item tg-populardestination">
										<figure>
											<a href="javascript:void(0);"><img src="images/tours/img-14.jpg" alt="image destinations"></a>
											<figcaption>
												<h3><a href="javascript:void(0);">london</a></h3>
												<div class="tg-description">
													<p>in the streets of London</p>
												</div>
											</figcaption>
										</figure>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Popular Tour End
			*************************************-->


			<!--************************************
					Destination Start
			*************************************-->
			<section class="tg-sectionspace tg-zerotoppadding tg-haslayout">
				<div class="container">
					<div class="row">
						<div id="tg-destinationsslider" class="tg-destinationsslider tg-destinations owl-carousel">
							<div class="item tg-destination">
								<figure>
									<a href="tourbookingdetail.html"><img src="images/destination/img-04.jpg" alt="image description"></a>
									<figcaption>
										<h2><a href="tourbookingdetail.html">Paris</a></h2>
										<div class="tg-description">
											<p>in the streets of London</p>
										</div>
									</figcaption>
								</figure>
							</div>
							<div class="item tg-destination">
								<figure>
									<a href="tourbookingdetail.html"><img src="images/destination/img-05.jpg" alt="image description"></a>
									<figcaption>
										<h2><a href="tourbookingdetail.html">Egypt</a></h2>
										<div class="tg-description">
											<p>in the streets of London</p>
										</div>
									</figcaption>
								</figure>
								<figure>
									<a href="tourbookingdetail.html"><img src="images/destination/img-06.jpg" alt="image description"></a>
									<figcaption>
										<h2><a href="tourbookingdetail.html">London</a></h2>
										<div class="tg-description">
											<p>in the streets of London</p>
										</div>
									</figcaption>
								</figure>
							</div>
							<div class="item tg-destination">
								<figure>
									<a href="javascript:void(0);"><img src="images/destination/img-07.jpg" alt="image description"></a>
									<figcaption>
										<h2><a href="javascript:void(0);">Istanbul</a></h2>
										<div class="tg-description">
											<p>Beautiful Mosque</p>
										</div>
									</figcaption>
								</figure>
							</div>
							<div class="item tg-destination">
								<figure>
									<a href="javascript:void(0);"><img src="images/destination/img-04.jpg" alt="image description"></a>
									<figcaption>
										<h2><a href="javascript:void(0);">Paris</a></h2>
										<div class="tg-description">
											<p>in the streets of London</p>
										</div>
									</figcaption>
								</figure>
							</div>
							<div class="item tg-destination">
								<figure>
									<a href="javascript:void(0);"><img src="images/destination/img-05.jpg" alt="image description"></a>
									<figcaption>
										<h2><a href="javascript:void(0);">Egypt</a></h2>
										<div class="tg-description">
											<p>in the streets of London</p>
										</div>
									</figcaption>
								</figure>
								<figure>
									<a href="javascript:void(0);"><img src="images/destination/img-06.jpg" alt="image description"></a>
									<figcaption>
										<h2><a href="javascript:void(0);">London</a></h2>
										<div class="tg-description">
											<p>in the streets of London</p>
										</div>
									</figcaption>
								</figure>
							</div>
							<div class="item tg-destination">
								<figure>
									<a href="javascript:void(0);"><img src="images/destination/img-07.jpg" alt="image description"></a>
									<figcaption>
										<h2><a href="javascript:void(0);">Istanbul</a></h2>
										<div class="tg-description">
											<p>Beautiful Mosque</p>
										</div>
									</figcaption>
								</figure>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Destination End
			*************************************-->
			<!--************************************
					Call To Action Start
			*************************************-->
			<!-- <section class="tg-parallax" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-02.jpg">
				<div class="tg-sectionspace tg-haslayout">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-calltoaction">
									<div class="tg-pattern"><img src="images/patternw.png" alt="image destination"></div>
									<h2>Get 10% Off on your Next Travel</h2>
									<div class="tg-description"><p>Travel between 22 April to 21 May and get existing offers along with a sure 10% cash discount</p></div>
									<a class="tg-btn" href="javascript:void(0);"><span>Explore Tour</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section> -->
			<!--************************************
					Call To Action End
			*************************************-->
			<!--************************************
					Our Guides Start
			*************************************-->
			<!-- <section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<div class="tg-sectiontitle">
									<h2>Meet The Guides</h2>
								</div>
								<div class="tg-description">
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam consectetuer.</p>
								</div>
							</div>
							<div id="tg-guidesslider" class="tg-guidesslider tg-guides owl-carousel">
								<div class="item tg-guide">
									<figure><img src="images/Guides/img-01.jpg" alt="image destination"></figure>
									<div class="tg-guidecontent">
										<div class="tg-guidecontenthead">
											<h3>Martin Blake</h3>
											<h4>Adventure Master</h4>
											<ul class="tg-socialicons tg-socialiconsvtwo">
												<li><a href="javascript:void(0);"><i class="icon-facebook-logo-outline"></i></a></li>
												<li><a href="javascript:void(0);"><i class="icon-instagram-social-outlined-logo"></i></a></li>
												<li><a href="javascript:void(0);"><i class="icon-twitter-social-outlined-logo"></i></a></li>
											</ul>
										</div>
										<div class="tg-description">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
										</div>
									</div>
								</div>
								<div class="item tg-guide">
									<figure><img src="images/Guides/img-02.jpg" alt="image destination"></figure>
									<div class="tg-guidecontent">
										<div class="tg-guidecontenthead">
											<h3>Martin Blake</h3>
											<h4>Adventure Master</h4>
											<ul class="tg-socialicons tg-socialiconsvtwo">
												<li><a href="javascript:void(0);"><i class="icon-facebook-logo-outline"></i></a></li>
												<li><a href="javascript:void(0);"><i class="icon-instagram-social-outlined-logo"></i></a></li>
												<li><a href="javascript:void(0);"><i class="icon-twitter-social-outlined-logo"></i></a></li>
											</ul>
										</div>
										<div class="tg-description">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
										</div>
									</div>
								</div>
								<div class="item tg-guide">
									<figure><img src="images/Guides/img-03.jpg" alt="image destination"></figure>
									<div class="tg-guidecontent">
										<div class="tg-guidecontenthead">
											<h3>Martin Blake</h3>
											<h4>Adventure Master</h4>
											<ul class="tg-socialicons tg-socialiconsvtwo">
												<li><a href="javascript:void(0);"><i class="icon-facebook-logo-outline"></i></a></li>
												<li><a href="javascript:void(0);"><i class="icon-instagram-social-outlined-logo"></i></a></li>
												<li><a href="javascript:void(0);"><i class="icon-twitter-social-outlined-logo"></i></a></li>
											</ul>
										</div>
										<div class="tg-description">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
										</div>
									</div>
								</div>
								<div class="item tg-guide">
									<figure><img src="images/Guides/img-01.jpg" alt="image destination"></figure>
									<div class="tg-guidecontent">
										<div class="tg-guidecontenthead">
											<h3>Martin Blake</h3>
											<h4>Adventure Master</h4>
											<ul class="tg-socialicons tg-socialiconsvtwo">
												<li><a href="javascript:void(0);"><i class="icon-facebook-logo-outline"></i></a></li>
												<li><a href="javascript:void(0);"><i class="icon-instagram-social-outlined-logo"></i></a></li>
												<li><a href="javascript:void(0);"><i class="icon-twitter-social-outlined-logo"></i></a></li>
											</ul>
										</div>
										<div class="tg-description">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
										</div>
									</div>
								</div>
								<div class="item tg-guide">
									<figure><img src="images/Guides/img-02.jpg" alt="image destination"></figure>
									<div class="tg-guidecontent">
										<div class="tg-guidecontenthead">
											<h3>Martin Blake</h3>
											<h4>Adventure Master</h4>
											<ul class="tg-socialicons tg-socialiconsvtwo">
												<li><a href="javascript:void(0);"><i class="icon-facebook-logo-outline"></i></a></li>
												<li><a href="javascript:void(0);"><i class="icon-instagram-social-outlined-logo"></i></a></li>
												<li><a href="javascript:void(0);"><i class="icon-twitter-social-outlined-logo"></i></a></li>
											</ul>
										</div>
										<div class="tg-description">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
										</div>
									</div>
								</div>
								<div class="item tg-guide">
									<figure><img src="images/Guides/img-03.jpg" alt="image destination"></figure>
									<div class="tg-guidecontent">
										<div class="tg-guidecontenthead">
											<h3>Martin Blake</h3>
											<h4>Adventure Master</h4>
											<ul class="tg-socialicons tg-socialiconsvtwo">
												<li><a href="javascript:void(0);"><i class="icon-facebook-logo-outline"></i></a></li>
												<li><a href="javascript:void(0);"><i class="icon-instagram-social-outlined-logo"></i></a></li>
												<li><a href="javascript:void(0);"><i class="icon-twitter-social-outlined-logo"></i></a></li>
											</ul>
										</div>
										<div class="tg-description">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section> -->
			<!--************************************
					Our Guides End
			*************************************-->
			<!--************************************
					Our Partners Start
			*************************************-->
			<section class="tg-parallax" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-03.jpg">
				<div class="tg-sectionspace tg-haslayout">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-ourpartners">
									<div class="tg-pattern"><img src="images/patternw.png" alt="image destination"></div>
									<h2>Our Partners</h2>
									<ul class="tg-partners">
										<li><figure><a href="javascript:void(0);"><img src="images/partners/img-01.png" alt="image destinations"></a></figure></li>
										<li><figure><a href="javascript:void(0);"><img src="images/partners/img-02.png" alt="image destinations"></a></figure></li>
										<li><figure><a href="javascript:void(0);"><img src="images/partners/img-03.png" alt="image destinations"></a></figure></li>
										<li><figure><a href="javascript:void(0);"><img src="images/partners/img-04.png" alt="image destinations"></a></figure></li>
										<li><figure><a href="javascript:void(0);"><img src="images/partners/img-05.png" alt="image destinations"></a></figure></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Our Partners End
			*************************************-->

		<!--************************************
				Main End
		*************************************-->
	
		<?php $this->load->view('layout/footer');?>
	
	
	
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<!--************************************
			Search Start
	*************************************-->
	<div id="tg-search" class="tg-search">
		<button type="button" class="close"><i class="icon-cross"></i></button>
		<form>
			<fieldset>
				<div class="form-group">
					<input type="search" name="search" class="form-control" value="" placeholder="search here">
					<button type="submit" class="tg-btn"><span class="icon-search2"></span></button>
				</div>
			</fieldset>
		</form>
		<ul class="tg-destinations">
			<li>
				<a href="javascript:void(0);">
					<h3>Europe</h3>
					<em>(05)</em>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);">
					<h3>Africa</h3>
					<em>(15)</em>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);">
					<h3>Asia</h3>
					<em>(12)</em>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);">
					<h3>Oceania</h3>
					<em>(02)</em>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);">
					<h3>North America</h3>
					<em>(08)</em>
				</a>
			</li>
		</ul>
	</div>
	<!--************************************
			Search End
	*************************************-->
	<!--************************************
			Login Singup Start
	*************************************-->
	<div id="tg-loginsingup" class="tg-loginsingup" data-vide-bg="poster: images/singup-img.jpg" data-vide-options="position: 0% 50%">
		<div class="tg-contentarea tg-themescrollbar">
			<div class="tg-scrollbar">
				<button type="button" class="close">x</button>
				<div class="tg-logincontent">
					<nav id="tg-loginnav" class="tg-loginnav">
						<ul>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">My Account</a></li>
							<li><a href="#">My Wishlist</a></li>
						</ul>
					</nav>
					<div class="tg-themetabs">
						<ul class="tg-navtbs" role="tablist">
							<li role="presentation" class="active"><a href="#home" data-toggle="tab">Already Registered</a></li>
							<li role="presentation"><a href="#profile" data-toggle="tab">New to Jungle Clube ?</a></li>
						</ul>
						<div class="tg-tabcontent tab-content">
							<div role="tabpanel" class="tab-pane active fade in" id="home">
								<form class="tg-formtheme tg-formlogin"  name="logform" id="logform" action="welcome.php/Auth/" name="logform">
									<fieldset>
										<div class="form-group">
											<label class="pop_form">Name or Email <sup>*</sup></label>
											<input type="text" name="log_name" id="log_name" class="form-control" placeholder="">
										</div>
										<div class="form-group">
											<label class="pop_form">Password <sup>*</sup></label>
											<input type="logpassword" name="logpassword" id="logpassword" class="form-control" placeholder="">
										</div>
										<div class="form-group">
										
											<span><a href="#">Lost your password?</a></span>
										</div>
										<button class="tg-btn tg-btn-lg logcheck" ><span>update profile</span></button>
									</fieldset>
								</form>
								<form>
								<div class="form-group">
                                        <fieldset class="tg-paymentarea">
                                            <div id="tg-accordion" class="tg-accordion" role="tablist" aria-multiselectable="true">
                                                <div class="tg-panel">
                                                    <h4 class="tg-radio">
                                                        
                                                    
                                                    </h4>
                                                    
                                                </div>
                                                
                                                
                                                <div class="tg-panel">
                                                    <h4>
                                                
                                                        <label for="creditcard"style="color:black;"> Forgot password?</label>
                                                        
                                                    </h4>
                                                    <div class="tg-panelcontent">
                                                        <div class="tg-description">
                                                                        <input type="femail"  name="femail" id="femail" class="form-control" placeholder="Enter your email id">
                                                                        <button class="forget_butt mailcl"><span>Submit</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        </div>
										</form>
							</div>
							
							<div role="tabpanel" class="tab-pane fade" id="profile">
								<form  class="tg-formtheme tg-formlogin" method="post" action="welcome" name="signupform" id="signupform" >
									<fieldset>
										<div class="form-group">
											<label class="pop_form">Name or Email <sup>*</sup></label>
											<input type="text" name="rename" id="rename" class="form-control" placeholder="">
										</div>
										<div class="form-group">
											<label class="pop_form">Password <sup>*</sup></label>
											<input type="password" name="password" id="password" class="form-control" placeholder="">
										</div>
										<div class="form-group">
											<label class="pop_form">Confirm Password <sup>*</sup></label>
											<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="">
										</div>
									
									
										<button type="submit" value="submit"  class="tg-btn tg-btn-lg unfrhide"  name="register">update profile</button>
									</fieldset>
								</form>
								
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script>
$(document).ready(function() {	
	


});

		$('.unfrhide').click(function() { 
		
		var name = $( "#rename" ).val();	
		var pass = $( "#password" ).val();
		var confirmpass = $( "#cpassword" ).val();
			
					$.ajax({
			type: "POST",
				url: "Welcome/register",
				data:{name:name,pass:pass,confirmpass:confirmpass},
				dataType:"text", 
							success: function(result){
					
				
						
					/*var resultObj = JSON.parse(result)
			 window.setTimeout(function(){location.reload()},1000);*/
				}               
		}); 
			
		}); 
	
	
	
	
		$('.logcheck').click(function() { 
		
		var name = $( "#log_name" ).val();	
		var pass = $( "#logpassword" ).val();
			alert(name);
			alert(pass);
					$.ajax({
			type: "POST",
				url: "Welcome/login",
				data:{name:name,pass:pass},
				dataType:"text", 
							success: function(result){
					
				
						
					/*var resultObj = JSON.parse(result)
			 window.setTimeout(function(){location.reload()},1000);*/
				}               
		}); 
			
		}); 	
		
		
		$('.mailcl').click(function() { 
		
		var email = $( "#femail" ).val();	
		
			alert(email);
			
					$.ajax({
			type: "POST",
				url: "Welcome/resetpass",
				data:{email:email},
				dataType:"text", 
							success: function(result){
					
				
						
					/*var resultObj = JSON.parse(result)
			 window.setTimeout(function(){location.reload()},1000);*/
				}               
		}); 
			
		}); 
	


</script>







	<!--************************************
			Login Singup End
	*************************************-->
	<script src="js/vendor/jquery-library.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/jquery-scrolltofixed.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.mmenu.all.js"></script>
	<script src="js/packery.pkgd.min.js"></script>
	<script src="js/jquery.vide.min.js"></script>
	<script src="js/scrollbar.min.js"></script>
	<script src="js/prettyPhoto.js"></script>
	<script src="js/countdown.js"></script>
	<script src="js/parallax.js"></script>
	<script src="js/gmap3.js"></script>
	<script src="js/main.js"></script>
</body>


</html>