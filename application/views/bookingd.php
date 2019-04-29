<!doctype html>
<html class="no-js" lang=""> 


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Jungle Clube</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/normalize.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/icomoon.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-select.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/scrollbar.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.mmenu.all.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/prettyPhoto.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/transitions.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/color.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/responsive.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>
	
	<!--************************************
			Mobile Menu Start
	*************************************-->
		<?php $this->load->view('layout/header');?>
		<!--************************************
				Header End
		*************************************-->
		<!--************************************
				Inner Banner Start
		*************************************-->
		<div class="tg-parallax tg-innerbanner" data-appear-top-offset="600" data-parallax="scroll" data-image-src="<?php echo base_url(); ?>images/parallax/bgparallax-06.jpg">
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Inner Banner End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
			<?php {


			}	?>
			<main id="tg-main" class="tg-main tg-haslayout">
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div id="tg-content" class="tg-content">
								<div class="tg-billingdetail">
									<form class="tg-formtheme tg-formbillingdetail"  method="post" action="<?php echo base_url(); ?>index.php/Home/booking_confirm" name="confirm" id="confirm" enctype="multipart/form-data"    >
										<fieldset>
											<div class="tg-bookingdetail">
												<div class="tg-box">
													<div class="tg-heading">
														<h3>Billing Details</h3>
													</div>
													<div class="clearfix"></div>
													<div class="row">
														<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
															<div class="form-group">
																<label>First name <sup>*</sup></label>
																<input type="text" name="firstname" id="firstname" class="form-control" placeholder="">
															</div>
														</div>
														<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
															<div class="form-group">
																<label>Last name <sup>*</sup></label>
																<input type="text" name="lastname" id="lastname" class="form-control" placeholder="">
															</div>
														</div>
														
													
														<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
															<div class="form-group">
																<label>State / County <sup>*</sup></label>
																<input type="text" name="statecountry" id="statecountry" class="form-control" placeholder="">
															</div>
														</div>
														<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
															<div class="form-group">
																<label>Town / City <sup>*</sup></label>
																<input type="text" name="towncity" id="towncity" class="form-control" placeholder="">
															</div>
														</div>
														<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
															<div class="form-group">
																<label>Postcode / ZIP <sup>*</sup></label>
																<input type="text" name="postcode" id="postcode" class="form-control" placeholder="">
															</div>
														</div>
														<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
															<div class="form-group">
																<label>Email Address <sup>*</sup></label>
																<input type="email" name="email" id="email" class="form-control" placeholder="">
															</div>
														</div>
														<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
															<div class="form-group">
																<label>Phone Number <sup>*</sup></label>
																<input type="text" name="phonename" id="phonename" class="form-control" placeholder="">
															</div>
														</div>
														<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
															<div class="form-group">
														<label>Address</label>
														<textarea placeholder="" name="address" id="address" ></textarea>
													</div>
														</div>
														
													</div>
												</div>
											</div>
											<div class="tg-bookingdetail">
												<div class="tg-box tg-addtionalinfo">
													<div class="tg-heading">
														<h3>Additional Information</h3>
													</div>
													<div class="form-group">
														<label>Your Comment</label>
														<textarea placeholder="Notes about your order, e.g." name="additional" id="additional" ></textarea>
													</div>
												</div>
												<div class="tg-box tg-yourorder">
													<div class="tg-heading">
														<h3>Your Order</h3>
													</div>
													<div class="tg-widgetpersonprice">
														<div class="tg-widgetcontent">
															<ul>
															<?php
																											 
															 $date1 = strtotime($to);
$date2 = strtotime($from);
$datediff = $date1 - $date2;

$days =  floor($datediff / (60 * 60 * 24));
if($days == 0){

															 $tot=$no_person*$tent_rate;
}
else
{
 $tot=$no_person*$tent_rate*$days;
}														?>
															<li class="tg-personprice"><div class="tg-perperson"style="width:50%;"><span>Checkin</span><label style="display:inline-block;margin-left:10px;color:#9b9e06;font-weight: bold;"><?php  echo date("d-m-Y", strtotime($from));  ?></label></div><div class="tg-perperson"style="width:50%;"><span>Checkout</span><label style="display:inline-block;margin-left:10px;color:#9b9e06;font-weight: bold;"><?php echo date("d-m-Y", strtotime($to)); ?></label></div></li>
                                                           <li class="tg-personprice"><div class="tg-perperson"><span>Total no person  </span><em><?php echo $no_person; ?></em></div></li>
																														

															<li class="tg-personprice"><div class="tg-perperson"><span>Person Base Price  (<?php echo $no_person; ?> x <?php echo $tent_rate; ?>)</span><em><?php echo $tot; ?></em></div></li>
																<li><span>Sub Total</span><em><?php echo $tot; ?></em></li>
															<?php	$tax=500; ?>
																<li><span>Tax Rate</span><em><?php echo $tax; ?> </em></li>
																<?php $sum= $tot+$tax; ?>
																<li class="tg-totalprice"><div class="tg-totalpayment"><span>Total Price</span><em>₹<?php echo $sum; ?></em></div></li>
															</ul>
															
																<input type="hidden" name="in" id="in" class="form-control" value="<?php  echo date("d-m-Y", strtotime($from));  ?>" placeholder="No.of Tents" >
															
												<input type="hidden" name="out" id="out" value="<?php  echo date("d-m-Y", strtotime($to));  ?>" class="form-control" placeholder="No.of Tents"  >
															
												<input type="hidden" name="noperson" id="noperson" class="form-control" value="<?php echo $no_person; ?>"  placeholder="No.of Tents"  >
														<input type="hidden" name="no_tent" id="no_tent" class="form-control" value="<?php echo $no_tent; ?>"  placeholder="No.of Tents"  >
											

													<input type="hidden" name="totamt" id="totamt" value=" <?php echo $sum; ?>" class="form-control" placeholder="No.of Tents"  >
																	
																
													<input type="hidden" name="loc_id" id="loc_id" value=" <?php echo $loc_id; ?>" class="form-control" placeholder="No.of Tents"  >
															
															

														</div>
														
													</div>
												</div>
												
												<fieldset>
											<button class="tg-btn" type="submit" ><span>Instant Book</span></button>
										</fieldset>
											</div>
										</fieldset>
										
										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		
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
	<div id="tg-loginsingup" class="tg-loginsingup" data-vide-bg="poster: <?php echo base_url(); ?>images/singup-img.jpg" data-vide-options="position: 0% 50%">
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
							<li role="presentation"><a href="#profile" data-toggle="tab">New to Travleu ?</a></li>
						</ul>
						<div class="tg-tabcontent tab-content">
							<div role="tabpanel" class="tab-pane active fade in" id="home">
								<form class="tg-formtheme tg-formlogin">
									<fieldset>
										<div class="form-group">
											<label>Name or Email <sup>*</sup></label>
											<input type="text" name="firstname" class="form-control" placeholder="">
										</div>
										<div class="form-group">
											<label>Password <sup>*</sup></label>
											<input type="password" name="password" class="form-control" placeholder="">
										</div>
										<div class="form-group">
											<div class="tg-checkbox">
												<input type="checkbox" name="remember" id="rememberpass">
												<label for="rememberpass">Remember Me</label>
											</div>
											<span><a href="#">Lost your password?</a></span>
										</div>
										<button class="tg-btn tg-btn-lg"><span>update profile</span></button>
									</fieldset>
								</form>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="profile">
								<form class="tg-formtheme tg-formlogin">
									<fieldset>
										<div class="form-group">
											<label>Name or Email <sup>*</sup></label>
											<input type="text" name="firstname" class="form-control" placeholder="">
										</div>
										<div class="form-group">
											<label>Password <sup>*</sup></label>
											<input type="password" name="password" class="form-control" placeholder="">
										</div>
										<div class="form-group">
											<div class="tg-checkbox">
												<input type="checkbox" name="remember" id="remember">
												<label for="remember">Remember Me</label>
											</div>
											<span><a href="#">Lost your password?</a></span>
										</div>
										<button class="tg-btn tg-btn-lg"><span>update profile</span></button>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
					<div class="tg-shareor"><span>or</span></div>
					<div class="tg-signupwith">
						<h2>Sign in With...</h2>
						<ul class="tg-sharesocialicon">
							<li class="tg-facebook"><a href="#"><i class="icon-facebook-1"></i><span>Facebook</span></a></li>
							<li class="tg-twitter"><a href="#"><i class="icon-twitter-1"></i><span>Twitter</span></a></li>
							<li class="tg-googleplus"><a href="#"><i class="icon-google4"></i><span>Google+</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--************************************
			Login Singup End
	*************************************-->
	<script src="<?php echo base_url(); ?>js/vendor/jquery-library.js"></script>
	<script src="<?php echo base_url(); ?>js/vendor/bootstrap.min.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap-select.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery-scrolltofixed.js"></script>
	<script src="<?php echo base_url(); ?>js/owl.carousel.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.mmenu.all.js"></script>
	<script src="<?php echo base_url(); ?>js/packery.pkgd.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.vide.min.js"></script>
	<script src="<?php echo base_url(); ?>js/scrollbar.min.js"></script>
	<script src="<?php echo base_url(); ?>js/prettyPhoto.js"></script>
	<script src="<?php echo base_url(); ?>js/countdown.js"></script>
	<script src="<?php echo base_url(); ?>js/parallax.js"></script>
	
	<script src="<?php echo base_url(); ?>js/main.js"></script>
</body>


</html>