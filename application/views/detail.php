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
	<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
         <style type="text/css"> .owl-dots {display: none; }</style>
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
	
	<!--************************************
			Mobile Menu Start
	*************************************-->
		<?php $this->load->view('layout/header'); ?>
		<!--************************************
				Header End
		*************************************-->
	<!--************************************
				Inner Banner Start
		*************************************-->
		<!--************************************
				Home Slider Start
		*************************************-->
		<div class="tg-bannerholder">
			<div class="tg-slidercontent">
				<div class="container">
					<div class="row">
						
						
					</div>
				</div>
			</div>
			<div id="tg-homeslider" class="tg-homeslider owl-carousel tg-haslayout">
			
<?php foreach($packsliderss as $frqslid){ 


?>
							

								
				<figure class="item_detail" data-vide-bg="<?php echo base_url() .'uploads/packageslider/'.$frqslid['imagename'] ;?>" data-vide-options="position: 0% 50%"></figure>
				
				<?php } ?>
			</div>
		</div>
		<!--************************************
				Home Slider End
		*************************************-->
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
							
							
							<?php foreach($package as $frq){ ?>
							
									<h2 style="color:#000;"> <?php echo $frq['package']; ?> – 5 Days Mountain Hiking Tour</h2>
									
									<div class="tg-pricearea">
										<!--<span style="color:#fff;">From</span>-->
									<!--	<del style="color:#fff;">$2,800</del>-->
										<h4><sub style="color:#000;"><?php echo $frq['packageprize']; ?> / per person</sub></h4>
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
											
													
															<ul class="tg-tripinfo">
									<!--	<li><span class="tg-tourduration">12 Days 11 Nights</span></li>-->
									<h4><sub style="color:#000; font-weight:bold; font-size:20px;" >Aminities</sub></h4>
								<?php 
								foreach($packaminities as $am)
								{ ?>
										
									<li  style="padding-bottom: 10px;"><span class=" "><i style="font-size: 23px;" class="<?php echo $am['icon']; ?>"></i>&nbsp;<?php echo $am['name']; ?></span></li>
										
								<?php  } ?>
									</ul>
											
													<?php foreach($package as $pakki){ ?>
									<input type="hidden" name="pakkid" id="pakkid" class="form-control" value="<?php echo $pakki['id']; ?>" placeholder="No.of Tents" >
									<?php } ?>
								
									
											
											
										<div class="form-group">
																<label style="color: #000;">No.of Persons</label>
																<input type="text" name="no_person" id="no_person" class="form-control num-person" placeholder="No.of Persons">
																	  <i id="person"> 
						
                            <?php echo "maximum allowed person in  one tent is  ;" ?>
                          </i>
															</div>
															<!--<div class="form-group">
																<label style="color: #fff;">No.of Tents</label>
																<input type="text" name="no_tent" id="no_tent" class="form-control num-tents" placeholder="No.of Tents" >
																		  <i id="tent"> 
						
                            <?php echo "maximum allowed person in  one tent is  ;" ?>
                          </i>
 <i id="ava"> 
						
                            <?php echo "total available tent; " ?>
                          </i>
															</div>-->
															<div class="form-group">
																<label style="color: #000;">Check In</label>
																	 <input type = "text" readonly id = "" name = ""  value=" <?php echo date("d-m-Y", strtotime($chkin));  ?>" class="date_field"> 
															</div>
															<div class="form-group"> 
																 <label style="color: #000;">Check Out</label>
															<!-- <input type="date" class="date_field" id="to" name="to"/>  -->
															 <input type = "text" id = "" readonly name = ""  value=" <?php echo date("d-m-Y", strtotime($chkout));  ?>" class="date_field">
															</div> 
														
														
														

														
														
													
											
											
											
											
											
											
							<?php }?>
											
										
							
													
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

	
											
						<div class="ss">
											<div class="form-group col-lg-offset-2" style="width:30%;" >
											
												<button type="button"  class="tg-btn tg-btn-lg" data-toggle="modal" data-target="#myModal3"><span>proceed booking</span></button>
											</div>
												<!-- <div class="form-group" >
											
												<button type="submit" class="tg-btn tg-btn-lg" ><span>Continue as Guest</span></button>
											</div> -->
										</div>		
											
<?php } ?>	
										</div>	
										
										
										
										
										
										
										
										
										
							
										
										
										
										
										
										
										</form>
										
											
											
								
									
										
								<!--	<ul class="tg-tripinfo">
										<li><span class="tg-tourduration">12 Days 11 Nights</span></li>
										<li><span class="tg-tourduration tg-availabilty">Availabile Now</span></li>
										<li><span class="tg-tourduration tg-location"><?php echo $loca_name ?></span></li>
										<li><span class="tg-tourduration tg-peoples"><?php echo $frq->allowed_person; ?> People in Group</span></li>
									</ul>-->

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
										<?php foreach($package as $frqs){ ?>
										<div class="tab-content tg-themetabcontent">
											<div role="tabpanel" class="tab-pane active tg-overviewtab" id="america">
												<div class="tg-bookingdetail">
													<div class="tg-box">
														<h2>About </h2>
														<div class="tg-description">
															<p> 
															
															
															<?php echo $frqs['packagedescription']; ?>
															
															
															
															</p>
														</div>
													</div>
													
												</div>
												
											
												
											</div>
												
							
											<div role="tabpanel" class="tab-pane tg-locationtab" id="italy">
												<div class="tg-box tg-location">
													<h3></h3>
													<div class="tg-description">
													
													</div>
													<?php foreach($package as $frm){ 
													
													$sid=$frm['location']; 
													}
											
									 $query=$this->db->query("SELECT b.*,a.*  FROM `address` b, location a WHERE b.`id` = a.locationaddress  and b.`city` = $sid ");
        $result=$query->result();

        $rows=$query->num_rows();
        if($rows > 0)
        {
         foreach ($result as $ral)
          {
                $rt= $ral->map; 
	  }          
        }   
											?>
													
<?php // echo $frq->map;?>	<?php echo $rt; ?>
														
														<iframe src="" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
														
													
												</div>
											</div>
											
											<div role="tabpanel" class="tab-pane tg-gallerytab" id="india">
												<div class="tg-gallery">
													<ul>
													
													
												
													
													
												<?php } ?>		
														
														
														<section id="gallery">
  <div class="container">
    <div id="image-gallery">
      <div class="row">
	  
	  
	 	<?php foreach($package as $fim){ 
													
													
		//	print_r($val);exit;
			$aa[]=$fim['packageImages'];
			
			
		}
			$val[]  = implode(",", $aa);
	
			foreach($val as $va)
			{
				$v = $va;
				
				
			}
				$va="1,2,3";
			$amm= explode(",", $v);
		
				foreach($amm as $am)
			{
				
				$gall=$am;
			?>
			
			   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image dez" >
          <div class="img-wrapper">
            <a href="<?php echo base_url() .'uploads/packageimages/'.$gall ;?>"><img src="<?php echo base_url() .'uploads/packageimages/'.$gall ;?>" class="img-responsive"></a>
            <div class="img-overlay">
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </div>
          </div>
        </div>
       
        
			
			<?php
				
			}
			
	?>		
		
		
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 




												
												
	  
     
														
       
        
       
        
      </div><!-- End row -->
    </div><!-- End image gallery -->
  </div><!-- End container --> 
</section>
														
														
														
														
														
														
														
														
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
				<section class="tg-parallax" style="background-image: url('images/wa2.jpg');
  background-repeat: no-repeat;
  background-attachment:scroll;">
				<div class="tg-sectionspace tg-haslayout">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-sectiontitle tg-sectiontitleleft">
									<h2 style="color: #000;">Popular Packages</h2>
									
								</div>
								<div id="tg-populartoursslider" class="tg-populartoursslider tg-populartours owl-carousel">
								

	<?php foreach($packages as $po){


	?>


								<div class="item tg-populartour">
										<figure style=" min-height:auto;">
											<a href="<?php echo base_url(); ?>index.php/Home/packagedetailshome/<?php echo $po['packid']; ?>"><img src="<?php echo base_url(); ?>/uploads/packagethumbnail/<?php echo $po['imagename']; ?>" alt="image destinations"></a>
											<span class="tg-descount">25% Off</span>
										</figure>
										<div class="tg-populartourcontent">
											<div class="tg-populartourtitle">
												<h3><a href="<?php echo base_url(); ?>index.php/Home/packagedetails/<?php echo $po['packid']; ?>"><?php echo $po['package']; ?></a></h3>
											</div>
										<a href="<?php echo base_url(); ?>index.php/Home/packagedetails/<?php echo $po['packid']; ?>">	<div class="tg-description">
												<p><?php echo $po['packagedescription']; ?></p>
											</div>
											<div class="tg-populartourfoot" >
												<div class="tg-durationrating">
													<span class="tg-tourduration" style="color:#000;" ><?php echo $po['packagedays']; ?> days</span>
													
												</div>
												<div class="tg-pricearea">
													<span>Price</span>
													<h4>₹<?php echo $po['packageprize']; ?></h4>
												</div></a>
											</div>
											
											
												<a href="<?php echo base_url(); ?>index.php/Home/packagedetails/<?php echo $po['packid']; ?>">	<div class="sec_book">
													 Book Now
                                     
                                    </div></a>
											
										</div>
									</div>
	<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			
			</section>
			
			<!--------form--------------------->
			
			
			
			
			
													
										<!----form-->
										
										
										
									
	<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
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
                               <div class="form-group modl_login">
								      <?php echo validation_errors('<div class = "alert alert-danger">', '</div>'); ?>
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Email" />
                                    </div>
                                </div> 
                              <div class="form-group modl_login" >
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="passwordid" name="passwordid" placeholder="password" />
                                    </div>
                                </div> 
								
								<?php foreach($package as $rtes){ ?>
									<input type="hidden" name="loeid" id="loeid" class="form-control" value="<?php echo $rtes['id']; ?>" placeholder="No.of Tents" >
									<?php } ?>
								
								
                                <div class="row">
                                    <div class="col-sm-2">

                                    </div>
                                    <div class="col-sm-10">
                                    	<a href="javascript:;" style="display: block;">Forgot your password?</a><br>
                                        <button type="submit" class="btn btn-primary" style="background-color: #9b9e06;border: none" name="fre"
										id="myModal4">
                                            Login</button>

                                            &nbsp;&nbsp;OR &nbsp;&nbsp;
                                            <button type="button" class="btn btn-primary guestchk" style="background-color: #d24655;border: none" name="fre"
										id="fre">
                                            Continue As Guest</button>
                                        
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="Registration1">
                                <form role="form" class="form-horizontal"  method="post" action="<?php echo base_url(); ?>index.php/Home/registerbook" name="signupid" id="signupid" enctype="multipart/form-data">
                              <div class="form-group modl_login" >
							  
                                    <label for="name" class="col-sm-4 control-label">
                                       First Name</label>
                                    <div class="col-sm-8">
                                        <input type="name" class="form-control" id="fname" name="fname" placeholder="First name" />
                                    </div>
                                </div> 
								 <div class="form-group modl_login" >
                                    <label for="name" class="col-sm-4 control-label">
                                       Last Name</label>
                                    <div class="col-sm-8">
                                        <input type="name" class="form-control" id="lname" name="lname" placeholder="Last name" />
                                    </div>
                                </div>
                              <div class="form-group modl_login" >
                                    <label for="email" class="col-sm-4 control-label">
                                        Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="emailids" name="emailids" placeholder="Email" />
                                    </div>
									<div class="alert alert-danger"  id="alertis" >Email Already Exist !!!</div>
                                </div> 
                               <div class="form-group modl_login" >
                                    <label for="mobile" class="col-sm-4 control-label">
                                        Mobile</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" />
                                    </div>
                                </div> 
                                <div class="form-group modl_login" >
                                    <label for="password" class="col-sm-4 control-label">
                                        Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                                    </div>
                                </div> 
									
							<?php foreach($package as $rte){ ?>
									<input type="hidden" name="loid" id="loid" class="form-control" value="<?php echo $rte['id']; ?>" placeholder="No.of Tents" >
									<?php } ?>
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

	<!--************************************
			Login Singup Start
	*************************************-->

	
	
	
	
	
	
							 
	<!--************************************
			Login Singup End
	*************************************-->
	<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>



    
<script>
         $(function() {
      //      $( "#datepicker-12" ).datepicker({showAnim:"slide" });
      //      $( "#datepicker-12" ).datepicker("setDate", "10w+1");
         });
      </script>
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
	

<!--   --------------------------------------Form Validation script--------------------------->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="<!?php echo base_url(); ?>js/jquery_validation/jquery.validate.js"></script>
	
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
		
	   
	 	
		$('.guestchk').click(function() { 
		
	//	var email = $( "#emailid" ).val();	
	//	var password = $( "#passwordid" ).val();
		var no_person = $( "#no_person" ).val();
		var no_tent = $( "#no_tent" ).val();
	var from = $( "#datepicker-12" ).val();
		var to = $( "#datepicker-13" ).val();
		var loc_id =$( "#loc_id" ).val();
	

	

		$.ajax({
			type: "POST",
				url: "<?php echo base_url(); ?>index.php/Home/continueguest",
				data:{no_person:no_person,no_tent:no_tent,from:from,to:to,loc_id:loc_id},
				dataType:"text", 
							success: function(result){
					
				//alert(result);
					window.location.href = "<?php echo base_url(); ?>index.php/Home/guestbooking";
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
		<script >
$('.tg-destinationsslider').owlCarousel({
                autoplay: true,
                autoplayTimeout: 6000,
                navigation: false,
                margin: 10,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            })
</script>
	
	<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>



    
<script>
         $(function() {
        
			
			
			
			
			
			   $("#datepicker-12").datepicker({
        dateFormat: "mm/dd/yy",
        minDate: 0,
        onSelect: function () {
            var dt2 = $('#datepicker-13');
            var startDate = $(this).datepicker('getDate');
            //add 30 days to selected date
            startDate.setDate(startDate.getDate() + 30);
            var minDate = $(this).datepicker('getDate');
            var dt2Date = dt2.datepicker('getDate');
            //difference in days. 86400 seconds in day, 1000 ms in second
            var dateDiff = (dt2Date - minDate)/(86400 * 1000);

            //dt2 not set or dt1 date is greater than dt2 date
            if (dt2Date == null || dateDiff < 0) {
               //     dt2.datepicker('setDate', minDate);
            }
            //dt1 date is 30 days under dt2 date
            else if (dateDiff > 30){
               //     dt2.datepicker('setDate', startDate);
            }
            //sets dt2 maxDate to the last day of 30 days window
            dt2.datepicker('option', 'maxDate', startDate);
            //first day which can be selected in dt2 is selected date in dt1
            dt2.datepicker('option', 'minDate', minDate);
        }
    });
    $('#datepicker-13').datepicker({
        dateFormat: "mm/dd/yy",
        minDate: 0
    });
			
			
			
			
			
			
			
			
			
         });
      </script>
	<script >
	// Gallery image hover
$( ".img-wrapper" ).hover(
  function() {
    $(this).find(".img-overlay").animate({opacity: 1}, 600);
  }, function() {
    $(this).find(".img-overlay").animate({opacity: 0}, 600);
  }
);

// Lightbox
var $overlay = $('<div id="overlay"></div>');
var $image = $("<img>");
var $prevButton = $('<div id="prevButton"><i class="fa fa-chevron-left"></i></div>');
var $nextButton = $('<div id="nextButton"><i class="fa fa-chevron-right"></i></div>');
var $exitButton = $('<div id="exitButton"><i class="fa fa-times"></i></div>');

// Add overlay
$overlay.append($image).prepend($prevButton).append($nextButton).append($exitButton);
$("#gallery").append($overlay);

// Hide overlay on default
$overlay.hide();

// When an image is clicked
$(".img-overlay").click(function(event) {
  // Prevents default behavior
  event.preventDefault();
  // Adds href attribute to variable
  var imageLocation = $(this).prev().attr("href");
  // Add the image src to $image
  $image.attr("src", imageLocation);
  // Fade in the overlay
  $overlay.fadeIn("slow");
});

// When the overlay is clicked
$overlay.click(function() {
  // Fade out the overlay
  $(this).fadeOut("slow");
});

// When next button is clicked
$nextButton.click(function(event) {
  // Hide the current image
  $("#overlay img").hide();
  // Overlay image location
  var $currentImgSrc = $("#overlay img").attr("src");
  // Image with matching location of the overlay image
  var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
  // Finds the next image
  var $nextImg = $($currentImg.closest(".image").next().find("img"));
  // All of the images in the gallery
  var $images = $("#image-gallery img");
  // If there is a next image
  if ($nextImg.length > 0) { 
    // Fade in the next image
    $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
  } else {
    // Otherwise fade in the first image
    $("#overlay img").attr("src", $($images[0]).attr("src")).fadeIn(800);
  }
  // Prevents overlay from being hidden
  event.stopPropagation();
});

// When previous button is clicked
$prevButton.click(function(event) {
  // Hide the current image
  $("#overlay img").hide();
  // Overlay image location
  var $currentImgSrc = $("#overlay img").attr("src");
  // Image with matching location of the overlay image
  var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
  // Finds the next image
  var $nextImg = $($currentImg.closest(".image").prev().find("img"));
  // Fade in the next image
  $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
  // Prevents overlay from being hidden
  event.stopPropagation();
});

// When the exit button is clicked
$exitButton.click(function() {
  // Fade out the overlay
  $("#overlay").fadeOut("slow");
});
	</script>

</body>


</html>