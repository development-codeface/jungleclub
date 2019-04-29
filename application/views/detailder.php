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
		
		
		<main id="tg-main" class="tg-main tg-haslayout">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div id="tg-content" class="tg-content">
							<div class="tg-tourbookingdetail">
								<div class="tg-bookinginfo">
								<?php foreach($details as $frq){

//print_r($frq);
								?>
									<h2 style="color:#fff;">JungleClub – 5 Days Mountain Hiking Tour</h2>
									
									<div class="tg-pricearea">
										<!--<span style="color:#fff;">From</span>-->
									<!--	<del style="color:#fff;">$2,800</del>-->
										<h4><?php echo $frq->tent_rate; ?><sub style="color:#fff;">/ per person</sub></h4>
									</div>
									<div class="tg-description">
										<p style="color:#fff;">There’s only <?php echo $frq->no_tent; ?> spot left. Join With us.</p>
									</div>
									
									<form class="tg-formtheme tg-formbookingdetail"   method="post" action="<?php echo base_url(); ?>index.php/Home/select_details" name="detail" id="detail" enctype="multipart/form-data"     >
										<fieldset>
											<!-- <div class="form-group">
												<div class="tg-formicon"><i class="icon-user-check"></i></div>
												<span class="tg-select">
													<select class="selectpicker" data-live-search="true" data-width="100%">
														<option data-tokens="Number of Rooms">Number of Rooms</option>
														<option data-tokens="2">2</option>
														<option data-tokens="4">4</option>
														<option data-tokens="5">5</option>
														<option data-tokens="6">6</option>
														<option data-tokens="10">10</option>
													</select>
												</span>
											</div> -->
										<div class="form-group">
																<label style="color: #fff;">No.of Persons</label>
																<input type="text" name="no_person" id="no_person" class="form-control num-person" placeholder="No.of Persons">
																	  <i id="person"> 
						
                            <?php echo "maximum allowed person in  one tent is .$frq->allowed_person; " ?>
                          </i>
															</div>
															<div class="form-group">
																<label style="color: #fff;">No.of Tents</label>
																<input type="text" name="no_tent" id="no_tent" class="form-control num-tents" placeholder="No.of Tents" >
																		  <i id="tent"> 
						
                            <?php echo "maximum allowed person in  one tent is $frq->allowed_person; " ?>
                          </i>
 <i id="ava"> 
						
                            <?php echo "total available tent $frq->no_tent; " ?>
                          </i>
															</div>
															<div class="form-group">
																<label style="color: #fff;">Check In</label>
																	<input type="date" class="date_field" id="from" name="from"/> 
															</div>
															<div class="form-group"> 
																<label style="color: #fff;">Check Out</label>
															<input type="date" class="date_field" id="to" name="to"/>
															</div>
														
														
														
														  <?php 
														$lo=  $frq->detail_id;
														  $query=$this->db->query("select * from  location_detail where detail_id=$lo");
        $result=$query->result();

        $rows=$query->num_rows();
        if($rows > 0)
        {
         foreach ($result as $vals)
          {
                $loca_name= $vals->loc_name;
	  }          
        }   
		?>

														
														
														
												<input type="hidden" name="loc_id" id="loc_id" class="form-control" value="<?php echo $frq->detail_id; ?>" placeholder="No.of Tents" >
															
												<input type="hidden" name="no_tent_avail" id="no_tent_avail" value="<?php echo $frq->no_tent; ?>" class="form-control" placeholder="No.of Tents"  >
															
												<input type="hidden" name="tent_rate" id="tent_rate" class="form-control" value="<?php echo $frq->tent_rate; ?>"  placeholder="No.of Tents"  >
														<input type="hidden" name="allowed_person" id="allowed_person" value="<?php echo $frq->allowed_person; ?>" class="form-control" placeholder="No.of Tents"  >
																	
											
											
											
											
											
											
											
											
										
							
													
										</fieldset>
									<br>
								<?php	 $user_id=$this->session->userdata('user_id');
	if($user_id != "")
{ ?>
										<div class="row">
									<div class="sss">		
								

	

									
									<div class="form-group" >
											
												<button type="submit" class="tg-btn tg-btn-lg prcd" ><span>proceed booking</span></button>
											</div>
									</div>
									</div>
<?php } ?>
						
	<div class="row">
<?php 	if($user_id == "")
{ ?>

	<input type="hidden" name="loc_ids" id="loc_ids" class="form-control" value="<?php echo $frq->detail_id; ?>" placeholder="No.of Tents" >
															
												<input type="hidden" name="no_tent_avails" id="no_tent_avails" value="<?php echo $frq->no_tent; ?>" class="form-control" placeholder="No.of Tents"  >
															
												<input type="hidden" name="tent_rates" id="tent_rates" class="form-control" value="<?php echo $frq->tent_rate; ?>"  placeholder="No.of Tents"  >
														<input type="hidden" name="allowed_persons" id="allowed_persons" value="<?php echo $frq->allowed_person; ?>" class="form-control" placeholder="No.of Tents"  >
																	
											
						<div class="ss">
											<div class="form-group col-lg-offset-2" style="width:30%;" >
											
												<button type="button"  class="tg-btn tg-btn-lg" data-toggle="modal" data-target="#myModal2"><span>Login</span></button>
											</div>
												<div class="form-group" >
											
												<button type="submit" class="tg-btn tg-btn-lg" ><span>Continue as Guest</span></button>
											</div>
										</div>		
											
<?php } ?>	
										</div>	
										</form>
										
											
											
								
									
										
									<ul class="tg-tripinfo">
									<!--	<li><span class="tg-tourduration">12 Days 11 Nights</span></li>-->
										<li><span class="tg-tourduration tg-availabilty">Availabile Now</span></li>
										<li><span class="tg-tourduration tg-location"><?php echo $loca_name ?></span></li>
										<li><span class="tg-tourduration tg-peoples"><?php echo $frq->allowed_person; ?> People in Group</span></li>
									</ul>
	<?php	}	?>
								</div>
								<div class="tg-sectionspace tg-haslayout">
									<div class="tg-themetabs tg-bookingtabs">
										<ul class="tg-themetabnav" role="tablist">
											<li role="presentation" class="active">
												<a href="#america" aria-controls="america" role="tab" data-toggle="tab">
													<span><i class="fa fa-newspaper-o" aria-hidden="true"></i>
 Overview</span>
												</a>
											</li>
											
											<li role="presentation">
												<a href="#italy" aria-controls="italy" role="tab" data-toggle="tab">
													<span><i class="fa fa-map-o" aria-hidden="true"></i>
location</span>
												</a>
											</li>
											<li role="presentation">
												<a href="#india" aria-controls="india" role="tab" data-toggle="tab">
													<span><i class="fa fa-picture-o" aria-hidden="true"></i>
Gallery</span>
												</a>
											</li>
										</ul>
										<div class="tab-content tg-themetabcontent">
											<div role="tabpanel" class="tab-pane active tg-overviewtab" id="america">
												<div class="tg-bookingdetail">
													<div class="tg-box">
														<h2>About this listing</h2>
														<div class="tg-description">
															<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy Etiam porta sem malesuada magna mollis euismod.</p>
															<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue Sed non mauris vitae;erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo.</p>
															<p>Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi.</p>
															<p>Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam.</p>
														</div>
													</div>
													
												</div>
												
											
												
											</div>
											
											<div role="tabpanel" class="tab-pane tg-locationtab" id="italy">
												<div class="tg-box tg-location">
													<h3>The neighborhood</h3>
													<div class="tg-description">
														<p>Curabitur blandit tempus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis consectetur purus sit amet fermentum. Etiam porta sem malesuada magna mollis
euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
													</div>
													<div id="tg-locationmap" class="tg-locationmap tg-map"></div>
												</div>
											</div>
											
											<div role="tabpanel" class="tab-pane tg-gallerytab" id="india">
												<div class="tg-gallery">
													<ul>
														<li>
															<figure>
																<a href="<?php echo base_url(); ?>images/gallery/img-01.jpg" data-rel="prettyPhoto[instagram]">
																	<img src="<?php echo base_url(); ?>images/gallery/img-01.jpg" alt="image decruoton">
																</a>
															</figure>
														</li>
														<li>
															<figure>
																<a href="<?php echo base_url(); ?>images/gallery/img-02.jpg" data-rel="prettyPhoto[instagram]">
																	<img src="<?php echo base_url(); ?>images/gallery/img-02.jpg" alt="image decruoton">
																</a>
															</figure>
														</li>
														<li>
															<figure>
																<a href="<?php echo base_url(); ?>images/gallery/img-03.jpg" data-rel="prettyPhoto[instagram]">
																	<img src="<?php echo base_url(); ?>images/gallery/img-03.jpg" alt="image decruoton">
																</a>
															</figure>
														</li>
														<li>
															<figure>
																<a href="<?php echo base_url(); ?>images/gallery/img-04.jpg" data-rel="prettyPhoto[instagram]">
																	<img src="<?php echo base_url(); ?>images/gallery/img-04.jpg" alt="image decruoton">
																</a>
															</figure>
														</li>
														<li>
															<figure>
																<a href="<?php echo base_url(); ?>images/gallery/img-05.jpg" data-rel="prettyPhoto[instagram]">
																	<img src="<?php echo base_url(); ?>images/gallery/img-05.jpg" alt="image decruoton">
																</a>
															</figure>
														</li>
														<li>
															<figure>
																<a href="<?php echo base_url(); ?>images/gallery/img-06.jpg" data-rel="prettyPhoto[instagram]">
																	<img src="<?php echo base_url(); ?>images/gallery/img-06.jpg" alt="image decruoton">
																</a>
															</figure>
														</li>
														<li>
															<figure>
																<a href="<?php echo base_url(); ?>images/gallery/img-07.jpg" data-rel="prettyPhoto[instagram]">
																	<img src="<?php echo base_url(); ?>images/gallery/img-07.jpg" alt="image decruoton">
																</a>
															</figure>
														</li>
														<li>
															<figure>
																<a href="<?php echo base_url(); ?>images/gallery/img-08.jpg" data-rel="prettyPhoto[instagram]">
																	<img src="<?php echo base_url(); ?>images/gallery/img-08.jpg" alt="image decruoton">
																</a>
															</figure>
														</li>
														<li>
															<figure>
																<a href="<?php echo base_url(); ?>images/gallery/img-09.jpg" data-rel="prettyPhoto[instagram]">
																	<img src="<?php echo base_url(); ?>images/gallery/img-09.jpg" alt="image decruoton">
																</a>
															</figure>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!--************************************
					Top Destination Start
			*************************************-->
			<section class="tg-sectionspace tg-zerotoppadding tg-haslayout" style="padding-top: 0px;">
				<div class="container">
					<div class="row">
						<div id="tg-destinationsslider" class="tg-destinationsslider tg-destinations owl-carousel">
							<div class="item tg-destination">
								<figure>
									<a href="tourbookingdetail.html"><img src="<?php echo base_url(); ?>images/destination/img-04.jpg" alt="image description"></a>
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
									<a href="tourbookingdetail.html"><img src="<?php echo base_url(); ?>images/destination/img-04.jpg" alt="image description"></a>
									<figcaption>
										<h2><a href="tourbookingdetail.html">Egypt</a></h2>
										<div class="tg-description">
											<p>in the streets of London</p>
										</div>
									</figcaption>
								</figure>
								<!-- <figure>
									<a href="tourbookingdetail.html"><img src="images/destination/img-06.jpg" alt="image description"></a>
									<figcaption>
										<h2><a href="tourbookingdetail.html">London</a></h2>
										<div class="tg-description">
											<p>in the streets of London</p>
										</div>
									</figcaption>
								</figure> -->
							</div>
							<div class="item tg-destination">
								<figure>
									<a href="javascript:void(0);"><img src="<?php echo base_url(); ?>images/destination/img-07.jpg" alt="image description"></a>
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
									<a href="javascript:void(0);"><img src="<?php echo base_url(); ?>images/destination/img-04.jpg" alt="image description"></a>
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
									<a href="tourbookingdetail.html"><img src="<?php echo base_url(); ?>images/destination/img-04.jpg" alt="image description"></a>
									<figcaption>
										<h2><a href="tourbookingdetail.html">Egypt</a></h2>
										<div class="tg-description">
											<p>in the streets of London</p>
										</div>
									</figcaption>
								</figure>
								
							</div>
							<div class="item tg-destination">
								<figure>
									<a href="javascript:void(0);"><img src="<?php echo base_url(); ?>images/destination/img-07.jpg" alt="image description"></a>
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
					Top Destination End
			*************************************-->	
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
<div class="mymodule">
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" z-index="10000">
    <div class="modal-dialog " style="top:13%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    x</button>
                <h4 class="modal-title" id="myModalLabel">
                    Login/Registration </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-offset-1 col-md-10" style="padding-right: 30px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Login1" data-toggle="tab">Login</a></li>
                            <li><a href="#Registration1" data-toggle="tab">Registration</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="Login1">
                                <form role="form" class="form-horizontal"  method="post" action="<?php echo base_url(); ?>index.php/Home/loginbook" name="signiid" id="signiid" enctype="multipart/form-data"  >
                                <div class="form-group">
								      <?php echo validation_errors('<div class = "alert alert-danger">', '</div>'); ?>
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="passwordid" name="passwordid" placeholder="password" />
                                    </div>
                                </div>
																<?php foreach($details as $frq){

//print_r($frq);
								?>
								<input type="hidden" name="loc" id="loc" class="form-control" value="<?php echo $frq->detail_id; ?>" placeholder="No.of Tents" >
								
								
																<?php } ?>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary" style="background-color: #9b9e06;border: none" name="fre"
										id="fre">
                                            Login</button>
                                        <a href="javascript:;">Forgot your password?</a>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="Registration1">
                                <form role="form" class="form-horizontal"  method="post" action="<?php echo base_url(); ?>index.php/Home/registerbook" name="signupid" id="signupid" enctype="multipart/form-data">
                              <div class="form-group">
							  	<?php foreach($details as $frq){

//print_r($frq);
								?>
								<input type="hidden" name="locm" id="locm" class="form-control" value="<?php echo $frq->detail_id; ?>" placeholder="No.of Tents" >
								
								
																<?php } ?>
                                    <label for="name" class="col-sm-3 control-label">
                                       First Name</label>
                                    <div class="col-sm-9">
                                        <input type="name" class="form-control" id="fname" name="fname" placeholder="First name" />
                                    </div>
                                </div> 
								<div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">
                                       Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="name" class="form-control" id="lname" name="lname" placeholder="Last name" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-3 control-label">
                                        Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="emailidsp" name="emailidsp" placeholder="Email" />
                                    </div>
									<div class="alert alert-danger"  id="alertis" >Email Already Exist !!!</div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-3 control-label">
                                        Mobile</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-3 control-label">
                                        Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                          <button type="submit" class="btn btn-primary" style="background-color: #9b9e06;border: none">
                                            Register</button>
                                        <button type="reset" class="btn btn-default">
                                            Cancel</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                       
                    </div>
                  
                </div>
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
	

<!--   --------------------------------------Form Validation script-------------------------
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="<!?php echo base_url(); ?>js/jquery_validation/jquery.validate.js"></script>-->
	
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
	

                                            <script type="text/javascript">
$(document).ready(function(){
	
	$('#alertis').hide();

	 	$("#person" ).hide();	$("#tent" ).hide(); 	$("#ava" ).hide();
                                    var numperson;
                                    var numtents;
                                    var totnumtends;
									var avail = $('#no_tent_avail').val();
    var allowed = $('#allowed_person').val();
    
                                        $('.num-person').focusout(function() {
                                            numperson=this.value;
												$("#person" ).hide();
												numtents=Math.ceil(numperson/allowed);
												
												if (numtents>$('.num-tents').val())
												{
                                                $('.num-tents').val('');
											//$('#no_tent').attr('placeholder','allowed person for 1 tent is 4');
											//$("#person" ).show();
													$("#tent" ).show();	
													//	$("#ava" ).show();
												}
											
											
											
                                        
                                        });
                                        $( ".num-tents" ).focusout(function() {
                                            numtents=Math.ceil(numperson/allowed);
											
                                           	$("#tent" ).hide();
                                            totnumtends=this.value;
                                            if (numtents>totnumtends)
                                            {
                                                $('.num-tents').val('');
													$("#tent" ).show();
													$("#ava" ).hide();
                                            }
										// if ($('.num-tents').val() > avail)
                                         //   {
                                        ////     
										//	  $('.num-tents').val('');
											//		$("#ava" ).show();
                                           // }
											
											
                                         });
});
                                     </script>
		
	
	

<script>


		$('.unfrhide').click(function() { 
		
		var name = $( "#rename" ).val();	
		var pass = $( "#password" ).val();
		var confirmpass = $( "#cpassword" ).val();
			
					$.ajax({
			type: "POST",
				url:"<?php echo base_url(); ?>index.php/Home/register",
				data:{name:name,pass:pass,confirmpass:confirmpass},
				dataType:"text", 
							success: function(result){
					
				
						
					/*var resultObj = JSON.parse(result)
			 window.setTimeout(function(){location.reload()},1000);*/
				}               
		}); 
			
		}); 
	
	
	
	
		$('.logcheck').click(function() { 
		
		var email = $( "#emailid" ).val();	
		var password = $( "#passwordid" ).val();
		var no_person = $( "#no_person" ).val();
		var no_tent = $( "#no_tent" ).val();
		var from = $( "#from" ).val();
		var to = $( "#to" ).val();
		var loc_id =$( "#loc_id" ).val();
	var	no_tent_avail=$( "#no_tent_avail" ).val();
var	tent_rate=$( "#tent_rate" ).val();
	var	allowed_person=$( "#allowed_person" ).val();		

		$.ajax({
			type: "POST",
				url: "<?php echo base_url(); ?>index.php/Home/logindetail",
				data:{email:email,password:password,no_person:no_person,no_tent:no_tent,from:from,to:to,loc_id:loc_id,no_tent_avail:no_tent_avail,tent_rate:tent_rate,allowed_person:allowed_person},
				dataType:"text", 
							success: function(result){
					
				//alert(result);
						window.location.href = "<?php echo base_url(); ?>index.php/Home/select_login_details";
					/*var resultObj = JSON.parse(result)
			 window.setTimeout(function(){location.reload()},1000);*/
				}               
		}); 
			
		}); 	
		
		
		$('.mailcl').click(function() { 
		
		var email = $( "#femail" ).val();	
		
			//alert(email);
			
					$.ajax({
			type: "POST",
				url: "<?php echo base_url(); ?>index.php/Home/resetpass",
				data:{email:email},
				dataType:"text", 
							success: function(result){
					
				
						
					/*var resultObj = JSON.parse(result)
			 window.setTimeout(function(){location.reload()},1000);*/
				}               
		}); 
			
		}); 

		$('.serchlist').click(function() { 
		
			var dis_id = $('#district_id').val();
			
		var loc_id = $('#location_id').val();
		//	alert(dis_id);	alert(loc_id);
			
					$.ajax({
			type: "POST",
				url: "<?php echo base_url(); ?>index.php/Home/detail_loc",
				data:{dis_id:dis_id,loc_id:loc_id},
				dataType:"text", 
							success: function(result){
					
				
						
					/*var resultObj = JSON.parse(result)
			 window.setTimeout(function(){location.reload()},1000);*/
				}               
		}); 
			
		}); 
	

  $("#logform").validate({

            rules: {
            log_name:"required",
			lo_password:"required",
		
             },
            messages: {
              
		 log_name:"Please enter the username"  ,
		 lo_password:"Please enter the password"  ,      }
    
	   });
	   
	   
	   
	   
	   
	   
	
		$('.regcheck').click(function() { 
		
		var fname = $( "#fnamere" ).val();	
		var lname = $( "#lnamere" ).val();
		var email = $( "#emailre" ).val();	
		var password = $( "#passwordre" ).val();
		var mobile = $( "#mobilere" ).val();
		
		
		var no_person = $( "#no_person" ).val();
		var no_tent = $( "#no_tent" ).val();
		var from = $( "#from" ).val();
		var to = $( "#to" ).val();
		var loc_id =$( "#loc_id" ).val();
	var	no_tent_avail=$( "#no_tent_avail" ).val();
var	tent_rate=$( "#tent_rate" ).val();
	var	allowed_person=$( "#allowed_person" ).val();		

		$.ajax({
			type: "POST",
				url: "<?php echo base_url(); ?>index.php/Home/registerdetail",
				data:{fname:fname,lname:lname,mobile:mobile,email:email,password:password,no_person:no_person,no_tent:no_tent,from:from,to:to,loc_id:loc_id,no_tent_avail:no_tent_avail,tent_rate:tent_rate,allowed_person:allowed_person},
				dataType:"text", 
							success: function(result){
					
			//	alert(result);
				window.location.href = "<?php echo base_url(); ?>index.php/Home/select_login_details";
					
					/*var resultObj = JSON.parse(result)
			 window.setTimeout(function(){location.reload()},1000);*/
				}               
		}); 
			
		}); 	
		
	   
	   
    
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<!--script type="text/javascript" src="<!?php echo base_url(); ?>js/jquery_validation/jquery.validate.js"></script-->
	

	<script type="text/javascript"> 
	
	
	 $("#detail").validate({

            rules: {
            no_person:"required",
			no_tent:"required",
			from:"required"	,to:"required"
				
             },
            messages: {
              no_person:"Please choose the field"    ,
	     no_tent:"Please choose the field" ,
		 from:"Please select the date",  to:"Please select the date" 

		      }
    
	   }); 
	  
        
		</script>
	

	
	
</script>
	<script type="text/javascript"> 	

	  $( "#emailidsp" ).blur(function() {
		 
	var email=this.value;
  if(email!=""){
    $.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>index.php/Home/checkmail",
		data:'email='+email,
		dataType: 'json',
        success: function(data) {
            if(data.status==1){
					
				 $( "#emailidsp" ).val("");
				$('#alertis').show();
              }else{
				$('#alertis').hide();
			  }

        },

		});
  }
});	</script>




<script type="text/javascript"> 
	 $("#signiid").validate({

            rules: {
           emailid:"required",
			passwordid:"required"
			
             },
            messages: {
                emailid:"Please enter the Email"    ,
	     passwordid:"Please enter the Password" 
		
      }
    
	   }); 
		
		</script>
		<script type="text/javascript"> 
	 $("#signupid").validate({

            rules: {
           fname:"required",
			lname:"required",   emailids:"required",
			mobile:"required" ,  password:"required"
			
             },
            messages: {
               fname:"Please enter first name"    ,
	     lname:"Please enter the last name",  emailids:"Please enter the Email"    ,
	     mobile:"Please enter the Mobile number" ,
	     password:"Please enter the Password" 
		
      }
    
	   }); 
		
		</script>
	

</body>


</html>