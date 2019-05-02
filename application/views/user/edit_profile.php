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
<?php 	foreach($userinfo as $frq){
//	print_r($frq);
	?>
	
	
	

	
	<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-sectionspace tg-haslayout">
			<div class="container">
				<div class="row">
					<div id="tg-twocolumns" class="tg-twocolumns">
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
												<li><a href="<?php echo base_url(); ?>index.php/Home/bookingdetail""><i class="icon-basket3"></i><span>My Booking</span></a></li>
												
												<li><a href="<?php echo base_url(); ?>index.php/Home/signout"><i class="icon-lock"></i><span>Sign Out</span></a></li>
										</ul>
										</div>
									</div>
								</aside>
							</div>
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
								<div id="tg-content" class="tg-content">
									<div class="tg-dashboard">
										<div class="tg-box tg-ediprofile">
											<div class="tg-heading">
												<h3>Edit Profile</h3>
											</div>
											<div class="tg-dashboardcontent">
												<div class="tg-imgholder">
												<!--	<figure>
														<img src="images/authorimg.jpg" alt="image description">
													</figure>
													<a class="tg-btn" href="#">Change Profile Picture</a>-->
											 	
<?php	if($userphoto != null) {
	foreach($userphoto as $frqphoto){ ?>

												<?php if($frqphoto->imagename !=null)
											{
												?>
											
												<img src="<?php echo base_url() .'uploads/profile_pic/'.$frqphoto->imagename ;?>" alt="" style="width:127px; height=169px;">
											<?php } else
											{
											?>	  
											
												 <img src="<?php echo base_url() .'uploads/profile_pic/Blank-avatar.png ';?>" alt="" style="width:127px; height=169px;">	
<?php } } } else {?>  
													
							<figure>	   <img src="<?php echo base_url() .'uploads/profile_pic/Blank-avatar.png ';?>" alt="" style="width:127px; height=169px;"></figure>							
													
<?php } ?>  
													      <form method="post" enctype="multipart/form-data" class="form-horizontal"  class="form-horizontal" action="<?php echo base_url(); ?>index.php/Home/UploadProfile" id="myimg" name="myimg">
														  

            <div class="job_descp">
              <br>	
             
             <input  type="file" name="photopro" id="photopro">
			   <button type="submit" name="register" class="btn btn-success upld_pic" >Upload 
              </button>
            </div>
          
          </form>
										
												</div>
												<div class="tg-content">
													<fieldset>
													<form class="tg-formtheme tg-formdashboard" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/Home/update_user" name="editform" id="editform" >
									
														<div class="form-group">
															<label>First name <sup>*</sup></label>
															<input type="text" name="firstname" id="firstname"  value="<?php echo $frq->firstname; ?>" class="form-control" placeholder="">
														</div>
														<div class="form-group">
															<label>Last name <sup>*</sup></label>
															<input type="text" name="lastname" id="lastname"  value="<?php echo $frq->lastname; ?>" class="form-control" placeholder="">
														</div>
														
															<div class="form-group">
															<label>Email Address <sup>*</sup></label>
															<input type="email" name="email" id="email"  value="<?php echo $frq->email; ?>" class="form-control" placeholder="">
														</div>
														<div class="form-group">
															<label>Phone Number <sup>*</sup></label>
															<input type="text" name="phonename" id="phonename" value="<?php echo $frq->mobile; ?>" class="form-control" placeholder="">
														</div>
														
															<div class="form-group">
															<label>Addressline1 <sup>*</sup></label>
															<input type="text" name="address1" id="address1" value="<?php if($add!= null) { echo $frq->address_line1; } ?>" class="form-control" placeholder="">
														</div>	<div class="form-group">
															<label>Addressline2 <sup>*</sup></label>
															<input type="text" name="address2" id="address2" value="<?php if($add!= null) {echo $frq->address_line2; } ?>" class="form-control" placeholder="">
														</div>
													  <input type="hidden" class="form-control" id="addid" name="addid"  value="<?php echo $add;?>" >
														      <div class="form-group">
                                            <label for="exampleInputEmail111">Country </label>
                                         
										 
										 	
                                            <select class="custom-select col-12" id="country" name="country" onChange="change_sub_category();">
                                       
										   <option value = "$pa['']" selected ><?  ?>
										  <?php for($i=0,$l=1;$i<count($countries);$i++,$l++) { ?>
											 
                                                <option value = "<?= $countries[$i]['id'];?>" <?php if($add!= null) { if($frq->id == $countries[$i]['id']){ echo 'selected';} }?>><?= $countries[$i]['name']; ?></option>
                                                <?php } ?>
										
										
										
                                    </select>
                                        
										 
                                        </div>
                                         
										 
										 
										 
										    <div class="form-group">
                                            <label for="exampleInputEmail111">State</label>
											<?php $sid=$frq->s_id ;
											 if($sid!= null)
											 {
											  $query=$this->db->query("select * from states where s_id=$sid");
        $result=$query->result();

        $rows=$query->num_rows();
        if($rows > 0)
        {
         foreach ($result as $val)
          {
                $st= $val->s_id;  $stnm= $val->s_name;
	  }          
        }
											 }		
											?>
                                            <select class="custom-select col-12" id="state" name="state"  onChange="change_city();" >
                                    
                                        <option value="<?php if($add!= null) { if($sid!= null) { echo $st; } } ?>" selected><?php if($add!= null) { if($sid!= null) { echo $stnm; } } ?></option>
                                    </select>
                                        </div>
										 
												      <div class="form-group">
                                            <label for="exampleInputEmail111">City </label>
                                            <select class="custom-select col-12" id="city" name="city">
                                       <?php $cid=$frq->c_id ;
									   
									    if($cid!= null)
											 {
											  $query=$this->db->query("select * from cities where c_id=$cid");
        $result=$query->result();

        $rows=$query->num_rows();
        if($rows > 0)
        {
         foreach ($result as $vala)
          {
                $ct= $vala->c_id;  $ctnm= $vala->c_name;
	  }          
											 }   }
											?>
                                           <option value="<?php if($add!= null) { if($sid!= null) { echo $ct; } } ?>" selected><?php if($add!= null) { if($sid!= null) { echo $ctnm; } } ?></option>
                                    </select>
                                        </div>
                                    

												<div class="form-group">
															<label>Postcode <sup>*</sup></label>
															<input  type="text" name="postcode" id="postcode"  value="<?php if($add!= null) { echo $frq->postalcode; } ?>" class="form-control" placeholder="">
														</div>
													<!--	<div class="form-group">
															<label>Contact Address</label>
															<textarea placeholder="" name="address"   id="address" ></textarea>
														</div>-->
														<button type="submit" class="tg-btn"><span>update profile</span></button>
													</fieldset>
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
	<?php
}?>
	
	
		
		
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
		

	
<!--------------------------------------Form Validation script---------------------------->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="<!?php echo base_url(); ?>js/jquery_validation/jquery.validate.js"></script>
	<script type="text/javascript"> 
	
	
	 $("#updated").validate({

            rules: {
            firstname:"required",
			lastname:"required",
			email:"required",
			statecountry :"required",
			towncity :"required",
			postcode :"required",
			phonename :"required",		
			address :"required"
				
             },
            messages: {
              firstname:"Please enter the first name"    ,
	     lastname:"Please enter the last name" ,
		 email:"Please enter the email" ,
		 statecountry:"Please enter the state/country",
		 towncity:"Please enter the town/city" ,
		 postcode:"Please enter the  postcode"  ,
		 phonename:"Please enter the phonename"  ,
		
address: "Please enter the address"       }
    
	   }); 
	 
	 
	 
	 
	 	 
       $("#editform").validate({
    rules: {
        firstname:"required",
			lastname:"required",
			email:"required",
			statecountry :"required",
			towncity :"required",
			postcode :"required",
			phonename :"required",		
			address :"required"
    }
    ,
    messages: {
      firstname:"Please enter the first name"    ,
	     lastname:"Please enter the last name" ,
		 email:"Please enter the email" ,
		 statecountry:"Please enter the state/country",
		 towncity:"Please enter the town/city" ,
		 postcode:"Please enter the  postcode"  ,
		 phonename:"Please enter the phonename"  ,
		
address: "Please enter the address" 
    }
  }
                      );	
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
		 
       $("#myimg").validate({
    rules: {
      photopro:"required"
    }
    ,
    messages: {
      photopro:"Please choose the image"
    }
  }
                      );			   
		</script>
		
		
		
<!--------------------------------------Form Validation script---------------------------->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="<!?php echo base_url(); ?>js/jquery_validation/jquery.validate.js"></script>
	
	

<script language="javascript">
	
		function change_sub_category()
		{
		//	alert("dfsdf");
				//$("#sub_category_id > option").remove();
			var co_id = $('#country').val();
		//	alert (co_id);
            var section_id;
       // var dept_id = $('#dept_id').val();
	   
	   
        $.ajax({
            type: "POST",
			//index.php/admin/Brand/getSubCategory/"+cat_id,
            url: "<?php echo base_url(); ?>index.php/Home/getstate",
            data: {co_id: co_id, section_id: section_id},
            dataType: "json",
            success: function (data)
            {
                if (data)
                {
					
                    $('#state').html(data);
                }
				else
				{
					 	redirect(base_url());
				}
            }
        });
			

		}
		</script>
		
		
		
	
<script language="javascript">
	
		function change_city()
		{
			//alert("dfsdf");
				//$("#sub_category_id > option").remove();
			var st_id = $('#state').val();
		//	alert (st_id);
            var section_id;
       // var dept_id = $('#dept_id').val();
	   
	   
        $.ajax({
            type: "POST",
			//index.php/admin/Brand/getSubCategory/"+cat_id,
            url: "<?php echo base_url(); ?>index.php/Home/getcity",
            data: {st_id: st_id, section_id: section_id},
            dataType: "json",
            success: function (data)
            {
                if (data)
                {
					
                    $('#city').html(data);
                }
				else
				{
					 	redirect(base_url());
				}
            }
        });
			

		}
		</script>	
		
</body>


</html>