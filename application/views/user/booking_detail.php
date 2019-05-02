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
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-sectionspace tg-haslayout">
			<div class="container">
				<div class="row">
					<div id="tg-twocolumns" class="tg-twocolumns">
						<form class="tg-formtheme tg-formdashboard">
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<aside id="tg-sidebar" class="tg-sidebar">
									<div class="tg-widget tg-widgetdashboard">
										<div class="tg-widgettitle">
											<h3>My Account</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>	<li class="selected"><a href="<?php echo base_url(); ?>"><i class="icon-user"></i><span>Home</span></a></li>
													<li class="selected"><a href="<?php echo base_url(); ?>index.php/Home/dasboard"><i class="icon-user"></i><span>Dashboard</span></a></li>
												<li><a href="<?php echo base_url(); ?>index.php/Home/edit_profile"><i class="icon-pen2"></i><span>Edit Profile</span></a></li>
												<li><a href="<?php echo base_url(); ?>index.php/Home/changepass"><i class="icon-lock-open3"></i><span>Change Password</span></a></li>
												<li><a href="<?php echo base_url(); ?>index.php/Home/bookingdetail"><i class="icon-basket3"></i><span>My Booking</span></a></li>
												
												<li><a href="<?php echo base_url(); ?>index.php/Home/signout"><i class="icon-lock"></i><span>Sign Out</span></a></li>
											</ul>
										</div>
									</div>
								</aside>
							</div>
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
								<div id="tg-content" class="tg-content">
									<div class="tg-dashboard">
										
										<div class="tg-box tg-mybooking">
											<div class="tg-heading">
												<h3>My Booking</h3>
											</div>
											<div class="tg-dashboardcontent">
												<div class="tg-content">
													<table class="table table-responsive">
														<tr>
														<th scope="col">Order Date</th>	
															
															<th scope="col">From Date</th>	
															<th scope="col">To Date</th>
															<th scope="col">Location</th>
															<th scope="col">Package</th>
															<th scope="col">No.of person</th>	
														<th scope="col">No.of Package</th>	
														
															<th scope="col">Total</th>
															
															<th scope="col">Actions</th>
														</tr>
													

													<tbody>
													
													<?php 	foreach($bookinginfo as $frq){
	//print_r($frq);
	?>
	
													
															<tr>
																<td data-title="tour name"><?php echo date("m/d/Y", strtotime($frq['orderplacedate'])); ?></td>
																<td data-title="tour date"><?php echo date("m/d/Y", strtotime($frq['bookingstartdate'])); ?></td>
															<td data-title="tour date"><?php echo date("m/d/Y", strtotime($frq['bookingenddate'])); ?></td>
															<td data-title="total"><strong><?php echo $frq['c_name']; ?></strong></td>
															

															<td data-title="total"><strong><?php echo $frq['package']; ?></strong></td>
															
																<td data-title="total"><strong><?php echo $frq['no_persons']; ?></strong></td>
																<td data-title="total"><strong><?php echo $frq['packagecount']; ?></strong></td>
																<td data-title="total"><strong><?php echo $frq['amt']; ?></strong></td>
																
															<?php if(($frq['user_cancel'])==2)
															{
																?>
																
																<td data-title="action"><a href="" ><span class="label label-danger">Canceled</span></a></td>
																
															<?php } else if(($frq['admin_cancel'])==2) {  ?>
															
															<td data-title="action"><a href="" > <span class="label label-danger">Admin canceled</span></a></td>
															
															<?php } else {?>
															
															<td data-title="action"><a href="<?php echo base_url(); ?>index.php/Home/bookingusercancel/<?php echo $frq['oid']; ?>" > <span class="label label-success">cancel</span> </a></td>
															<?php } ?>
															
															</tr>
													<?php } ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										
										
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
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