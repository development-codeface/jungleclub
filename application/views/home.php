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
	<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<?php
 $uid=$this->session->userdata('user_id');
//echo $uid;exit;
if($uid == null)
{
	?>
<body class="tg-home tg-homevone">
<?php
}
else
{
	?>
	<body class="tg-login"> 
<?php }
?>
<?php //print_r($district); exit; ?>

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
							<h1 style="margin-bottom: 71px;" ><img style="width:25%" src="<?php echo base_url(); ?>images/parallax/logo.png" > </h1>
							<h2>People don’t take trips, trips take People</h2>
							
						</div>
						<div class="col-lg-offset-1 col-lg-10">
                    <form class="tg-formtheme tg-formtrip " method="post" action="<?php echo base_url(); ?>index.php/Home/searchpackage" name="signddupform" id="signddupform" enctype="multipart/form-data"  >
					
                                <fieldset>
                                      <div class="form-group">
                                        <div class="tg-select">
                                            <select class="selectpicker" data-live-search="true" data-width="100%" name="district_id" id="district_id" data-check-val="required"  >
                                                <!--option data-tokens="Destinations">Destinations</option-->
                                               
											   <?php foreach($district as $di){ ?>
											  
                                                <option  value = "<?= $di['c_id'];?>" ><?= $di['c_name']; ?></option>
                                                <?php } ?>
                                            </select>
											
											
                                        </div>
                                    </div>
                                
								
									<div class="form-group">
																
																	 <input type = "text" id = "datepickerfr" name = "datepickerfr" class="date_field" placeholder="Check In"> 
															</div>
															<div class="form-group"> 
															
															<!-- <input type="date" class="date_field" id="to" name="to"/>  -->
															 <input type = "text" id = "datepickerto" name = "datepickerto" class="date_field" placeholder="Check Out">
															</div> 
                                    
                                    <div class="form-group">
                                     <!--   <button class="tg-btn serchlist" ><span>find tours</span></button>-->
										
											<button type="submit" name="register" class="tg-btn serchlist">Search</button>
                                    </div>
                               

								

							   </fieldset>
							   
							   <!--	<li><a href="<?php echo $authURL ?>" title="" class="fb"><i class="fa fa-facebook"></i>Login Via Facebook</a></li>-->

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
					Popular Tour Start
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
								

	<?php foreach($package as $po){


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
				<div class="tg-parallax" style="background-color:#060606; ">

				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
					
				</div>
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 in_wa2">
					<div class="row">
						<figure data-vide-bg="poster:images/wa.jpg" data-vide-options="position: 0% 70%" style=" min-height: auto; margin-bottom: 0px !important;" >
							<h2 class="in_wa" > Explore Wayanad </h2>
							<h2 class="in_wa3" > when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. </h2>
                             <h2 class="in_wa4" ><a href="" > Explore More</a></h2>
						</figure>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
				
				</div>	
			</div>

			</section>
			<!--************************************
					Popular Tour End
			*************************************-->

			<!--************************************
					Call To Action Start
			*************************************-->
			<!-- 
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
			</section> -->
			<!--************************************
					Call To Action End
			*************************************-->
<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectiontitle " >
								<h2 >Popular Activities</h2>
							</div>
							<div class="tg-toursdestinations">
								<div class="tg-tourdestination tg-tourdestinationbigbox">
									<figure>
										<a href="javascript:void(0);">
											<img src="images/destination/img-01.jpg" alt="image destinations">
											<div class="tg-hoverbox">
												<div class="tg-adventuretitle">
													<h2>Tent stay</h2>
												</div>
											
											</div>
										</a>
									</figure>
								</div>
								<div class="tg-tourdestination">
									<figure>
										<a href="javascript:void(0);">
											<img src="images/destination/img-02.jpg" alt="image destinations">
											<div class="tg-hoverbox">
												<div class="tg-adventuretitle">
													<h2>Trekking</h2>
												</div>
											</div>
										</a>
									</figure>
								</div>
								<div class="tg-tourdestination">
									<figure>
										<a href="javascript:void(0);">
											<img src="images/destination/img-03.jpg" alt="image destinations">
											<div class="tg-hoverbox">
												<div class="tg-adventuretitle">
													<h2>Off Road Saffri</h2>
												</div>
											</div>
										</a>
									</figure>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>


			<!--************************************
					Destination End
			*************************************-->
			<section class="tg-aboutus" >
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="row">
						<figure data-vide-bg="poster: images/aboutus/img-01.jpg" data-vide-options="position: 0% 50%"></figure>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="row">
						<div class="tg-textbox" style="background-color: #FAFAFA;" >
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
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<!--script type="text/javascript" src="<!?php echo base_url(); ?>js/jquery_validation/jquery.validate.js"></script-->


<!--   --------------------------------------Form Validation script--------------------------->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="<!?php echo base_url(); ?>js/jquery_validation/jquery.validate.js"></script>
	
	<script type="text/javascript"> 
	
	
	 $("#signddupform").validate({

            rules: {
           
			datepickerfr:"required",
			datepickerto:"required",district_id:"required"
				
             },
            messages: {
           
	    datepickerfr:"Please choose the field",
		datepickerto:"Please choose the field",district_id:"Please choose the field"
		
		      }
    
	   }); 
	  
        
		</script>
<script>
$(document).ready(function() {	
	


});

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
		
		var name = $( "#log_name" ).val();	
		var pass = $( "#logpassword" ).val();
			alert(name);
			alert(pass);
					$.ajax({
			type: "POST",
				url: "<?php echo base_url(); ?>index.php/Home/login",
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
				url: "<?php echo base_url(); ?>index.php/Home/resetpass",
				data:{email:email},
				dataType:"text", 
							success: function(result){
					
				
						
					/*var resultObj = JSON.parse(result)
			 window.setTimeout(function(){location.reload()},1000);*/
				}               
		}); 
			
		}); 

		$('.serchlistbk').click(function() { 
		
			var dis_id = $('#district_id').val();
			
		var loc_id = $('#location_id').val();
			alert(dis_id);	alert(loc_id);
			
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
    
</script>




<script language="javascript">
	
		function change_sub_category()
		{
			
				//$("#sub_category_id > option").remove();
			var cat_id = $('#district_id').val();
			//alert (cat_id);
            var section_id;
       // var dept_id = $('#dept_id').val();

        $.ajax({
            type: "POST",
			//index.php/admin/Brand/getSubCategory/"+cat_id,
            url: "<?php echo base_url(); ?>index.php/Home/getSubCategory",
            data: {cat_id: cat_id, section_id: section_id},
            dataType: "json",
            success: function (data)
            {
                if (data)
                {
					
                    $('#location_id').html(data);
                }
				else
				{
					 	redirect(base_url());
				}
            }
        });
			
		}
		</script>





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

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '174194773507842',
      cookie     : true,
      xfbml      : true,
      version    : '{api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

	<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>



    
<script>
         $(function() {
        
			
			
			
			
			
			   $("#datepickerfr").datepicker({
        dateFormat: "mm/dd/yy",
        minDate: 0,
        onSelect: function () {
            var dt2 = $('#datepickerto');
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
    $('#datepickerto').datepicker({
        dateFormat: "mm/dd/yy",
        minDate: 0
    });
			
			
			
			
			
			
			
			
			
         });
      </script>

</body>


</html>