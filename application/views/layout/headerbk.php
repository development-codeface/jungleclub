 	
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
<?php
//Set no caching
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
	<!-- <nav id="menu">
		<ul>
			<li><a href="index.html">Home</a>
			
			
			
			</li>
			<li><a href="aboutus.html">About</a></li>
			<li><a href="javascript:void(0);">Destinations</a>
				<div>
					<ul>
						<li><a href="tourbookingdetail.html">IDUKKI</a></li>
						<li><a href="listingvtwo.html">list style two</a></li>
						<li><a href="listingvthree.html">list style three</a></li>
						<li><a href="listingvfour.html">list style four</a></li>
						<li><a href="listingvfive.html">list style five</a></li>
						<li><a href="listingvsix.html">list style six</a></li>
					</ul>
					
				</div>
			</li>
			
			<li><a href="contactus.html">Contact Us</a>
				
			</li>
		</ul>
	</nav> -->
	<!--************************************
			Mobile Menu End
	*************************************-->
	<!--************************************
			Wrapper Start
	*************************************-->
	
	<?php
	 $user_id=$this->session->userdata('user_id');
	if($user_id != "")
{ 



       	$this->db->select('users.*,userprofile.*,file.*');
	    $this->db->from('users');
		
		 $this->db->join('userprofile','userprofile.useid =  users.id','left');
	 $this->db->join('file','userprofile.profilepic =  file.id','left');
	
	    
	 $this->db->where('users.id',$user_id);
		$query = $this->db->get();
	//	$row = $query->result_array();







       //$query = $this->db->query("select * FROM users where id= $user_id");
       $result=$query->result();

        $rows=$query->num_rows();
        if($rows > 0)
        {
         foreach ($result as $val)
          {
                $first= $val->firstname;
				$last= $val->lastname;
				$profile_pic= $val->imagename;
				
				
	  }          
        }   

        else
        {
              redirect(base_url());
        }


}

	?>
	
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start
		*************************************-->
		<header id="tg-header" class="tg-header tg-haslayout">
			<div class="container-fluid">
				
				<div class="row">
				
					<div class="tg-navigationarea tg-headerfixed">
						
						<strong class="tg-logo"><a href="<?php //echo base_url(); ?>"><img src="<?php //echo base_url(); ?>images/logo.png" alt="company logo here"></a></strong>
						
						<div class="tg-socialsignin">
							
							<div class="tg-userbox">
									<button class=" tg-btn" data-toggle="modal" data-target="#myModal">
<span>sign in</span> </button>
								<div class="dropdown tg-dropdown">
									<button class="tg-btndropdown" id="tg-dropdowndashboard" type="button" data-toggle="dropdown">
									
									<?php	if($user_id != "")
									{
										if($profile_pic !=null)
									{?>
									
										<img src="<?php echo base_url() .'uploads/profile_pic/'.$profile_pic ;?>" style="width:35px; height:35px;" alt="image description">
										<?php 
										}
										else {	?>
												
												<img src="<?php echo base_url() .'uploads/profile_pic/Blank-avatar.png '?>" style="width:35px; height:35px;" alt="image description">
												
											<?php
											}
?>											
												
										
										<span style="color:#ffff;"><?php echo $first.' '.$last; ?></span>
									<?php }
									?>
										<i style="color:#ffff;" class="fa fa-caret-down"></i>
									</button>
									<ul class="dropdown-menu tg-dropdownusermenu" aria-labelledby="tg-dropdowndashboard">
										<li><a href="<?php echo base_url(); ?>index.php/Home/dasboard">Dashboard</a></li>
										
										<li><a href="<?php echo base_url(); ?>index.php/Home/signout">Sign Out</a></li>
									</ul>
								</div>
							</div>
						</div>
						<!-- <nav id="tg-nav" class="tg-nav">
							<div class="navbar-header">
								<a href="#menu" class="navbar-toggle collapsed">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</a>
							</div>
							<div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
								<ul>
									<li class="menu-item-has-children current-menu-item"><a href="<?php echo base_url(); ?>">Home</a>
										
									</li>
									<li><a href="<?php echo base_url(); ?>index.php/About">About</a></li>
									
									
									<li class="menu-item-has-children"><a href="javascript:void(0);">Destinations</a>
										<ul class="sub-menu">
			
										
							 <?php// $qry=$this->db->query("select * FROM location_detail where status=1");
                                         //   $result=$qry->result();
                                        ////    foreach($result as $val)
                                            { ?>
													<li><a href="<?php //echo base_url() .'index.php/Home/destination/'.$val->loc_id;?>"><?php //echo $val->loc_name;?></a></li>
                                          
                                            <?php// } ?>			
										
										

										
										</ul>
									</li>
									<li><a href="<?php echo base_url(); ?>index.php/Contact">Contact Us</a></li>
							
								</ul>
							</div>
						</nav> -->
					</div>
				</div>
				
			</div>
			
			
			
			
		</header>
		<!--************************************
			Login Singup Start
	*************************************-->
<div class="mymodule">
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
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
                            <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                            <li><a href="#Registration" data-toggle="tab">Registration</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="Login">
                                <form role="form" class="form-horizontal"  method="post" action="<?php echo base_url(); ?>index.php/Home/login" name="signinoru" id="signinoru" enctype="multipart/form-data"  >
                                <div class="form-group">
								      <?php echo validation_errors('<div class = "alert alert-danger">', '</div>'); ?>
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="password" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary" style="background-color: #9b9e06;border: none" name="fr"
										id="fr">
                                            Login</button>
                                    
										
                                    </div>
                                </div>
                                </form>
								
								
								
								<form style="text-align:center;"  class="form-horizontal"  method="post" action="<?php echo base_url(); ?>index.php/Home/resetpass" name="forgot" id="forgot" enctype="multipart/form-data" >
								<a href="#" id="anchr" >Forgot Your password?</a>
<br><br><input type="text" value="" id="reemail" name="reemail" placeholder="Enter Your Mail ID" style="display:none;"/>
<input type="Submit"class="btn btn-primary" value="Submit" id="btn" style="display:none;background-color: #9b9e06;border: none"/>

								</form>
                            </div>
                            <div class="tab-pane" id="Registration">
                                <form role="form" class="form-horizontal"  method="post" action="<?php echo base_url(); ?>index.php/Home/register" name="signupdv" id="signupdv" enctype="multipart/form-data">
                              <div class="form-group">
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
                                        <input type="email" class="form-control" id="emailids" name="emailids" placeholder="Email" />
                                    </div>
									<div class="alert alert-danger"  id="alertE" >Email Already Exist !!!</div>
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
		
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<!--script type="text/javascript" src="<!?php echo base_url(); ?>js/jquery_validation/jquery.validate.js"></script-->
	
	<script>
$(document).ready(function(){
  $('#alertE').hide();
});
</script>

	
	
</script>
	<script type="text/javascript"> 	

	  $( "#emailids" ).blur(function() {
		 
	var email=this.value;
  if(email!=""){
    $.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>index.php/Home/checkmail",
		data:'email='+email,
		dataType: 'json',
        success: function(data) {
            if(data.status==1){
					
				 $( "#emailids" ).val("");
				$('#alertE').show();
              }else{
				$('#alertE').hide();
			  }

        },

		});
  }
});	</script>


<!--------------------------------------Form Validation script---------------------------->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<!--script type="text/javascript" src="<!?php echo base_url(); ?>js/jquery_validation/jquery.validate.js"></script-->
<script type="text/javascript"> 
	 $("#signinoru").validate({

            rules: {
           email:"required",
			password:"required"
			
             },
            messages: {
                email:"Please enter the Email"    ,
	     password:"Please enter the Password" 
		
      }
    
	   }); 
		
		</script>
		<script type="text/javascript"> 
	 $("#signupdv").validate({

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
		<script>
		$(document).ready(function(){ 
  $('#anchr').click(function(){  
    $('#reemail').show(); // show textbox
    $('#btn').show(); //show button
  });
  $('#btn').click(function(){
    $('#anchr').html($('#anchr').html() + $('#reemail').val()); // Anchor tag HTML + Value of Textbox
  });
});
		</script>
		
	