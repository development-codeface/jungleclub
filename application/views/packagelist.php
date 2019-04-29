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
		
		<section class="tg-parallax tg-innerbanner" data-appear-top-offset="600" data-parallax="scroll" data-image-src="<?php echo base_url(); ?>images/parallax/bgparallax-05.jpg">
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h1>Experience the Wonder</h1>
							<h2>People don’t take trips, trips take People</h2>
							
						</div>
						<div class="col-lg-offset-1 col-lg-10">
                    <form class="tg-formtheme tg-formtrip " method="post" action="<?php echo base_url(); ?>index.php/Home/searchpackage" name="signddupform" id="signddupform" enctype="multipart/form-data"  >
					
                                <fieldset>
                                      <div class="form-group">
                                        <div class="tg-select">
                                            <select class="selectpicker" data-live-search="true" data-width="100%" name="district_id" id="district_id" data-check-val="required"  >
                                                <!--option data-tokens="Destinations">Destinations</option-->
                                             <!--   <option data-tokens="Destinations"></option>-->
											   <?php foreach($district as $di){ ?>
											  
                                                <option  value = "<?= $di['c_id'];?>" ><?= $di['c_name']; ?></option>
                                                <?php } ?>
                                            </select>
											
											
                                        </div>
                                    </div>
                                
								
									<div class="form-group">
																
																	 <input type = "text" id = "datepickerfr" name = "datepickerfr"  value=" <?php echo date("d-m-Y", strtotime($chkin));  ?>" class="date_field" placeholder="Check In"> 
															</div>
															<div class="form-group"> 
															
															<!-- <input type="date" class="date_field" id="to" name="to"/>  -->
															 <input type = "text" id = "datepickerto" name = "datepickerto" class="date_field"  value=" <?php echo date("d-m-Y", strtotime($chkout));  ?>" placeholder="Check Out">
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
		</section>
		
		<main id="tg-main" class="tg-main tg-sectionspace tg-haslayout">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div id="tg-content" class="tg-content">
							<div class="tg-listing tg-listingvtwo">
								<div class="tg-sectiontitle">
									<h2>Packages</h2>
								</div>
								<div class="clearfix"></div>
								<div class="row">
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
								
							
								</div></div>
								<div class="clearfix"></div>
								
								<!--<nav class="tg-pagination">
									<ul>
										<li class="tg-active"><a href="javascript:void(0);">1</a></li>
										<li><a href="javascript:void(0);">2</a></li>
										<li><a href="javascript:void(0);">3</a></li>
										<li><a href="javascript:void(0);">4</a></li>
										<li class="tg-nextpage"><a href="javascript:void(0);"><i class="fa fa-angle-right"></i></a></li>
									</ul>
								</nav> -->
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
    $('#datepickerfr').datepicker({
        dateFormat: "mm/dd/yy",
        minDate: 0
    });
			
			
			
			
			
			
			
			
			
         });
      </script>

</html>