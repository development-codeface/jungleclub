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
		<div class="tg-parallax tg-innerbanner" data-appear-top-offset="600" data-parallax="scroll" data-image-src="<?php echo base_url(); ?>images/parallax/bgparallax-06.jpg">
			<div class="tg-sectionspace tg-haslayout booking_form">
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
			<?php 
			$user_id=$this->session->userdata('user_id');
$uid=$this->session->userdata('user_id');

if($uid!=null)
{
	
 $query=$this->db->query("select * from  user_details where user_id=$uid ");
 
        $result=$query->result();

        $rows=$query->num_rows();
        if($rows > 0)
        {
         foreach ($result as $val)
          {
                $first_name= $val->first_name;
                $last_name= $val->last_name;
                 $state_country= $val->state_country;
                 $town_city= $val->town_city;
				 $email= $val->email;
                $pin= $val->pin;
                 $address= $val->address;
                 $mobile= $val->mobile;
	  }          
        }   

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
																<input type="text" name="firstname" id="firstname" <?php if($uid!= null){ ?> value="<?php echo $first_name; ?>" <?php } else { ?> value= ""<?php  } ?> class="form-control" placeholder="">
																	 <?php echo form_error('firstname'); ?>
															</div>
														</div>
														<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
															<div class="form-group">
																<label>Last name <sup>*</sup></label>
																<input type="text" name="lastname" id="lastname" <?php if($uid!= null){ ?> value="<?php echo $last_name; ?>" <?php } else { ?> value= ""<?php  } ?> class="form-control" placeholder="">
																 <?php echo form_error('lastname'); ?>
															</div>
														</div>
														<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
															<div class="form-group">
																<label>Address <sup>*</sup></label>
																<input type="text" name="address" id="address" <?php if($uid!= null){ ?> value="<?php echo $state_country; ?>" <?php } else { ?> value= ""<?php  } ?>  class="form-control" placeholder="">
																 <?php echo form_error('statecountry'); ?>
															</div>
														</div>
													
														<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
															<div class="form-group">
																<label>State / County <sup>*</sup></label>
																<input type="text" name="statecountry" id="statecountry" <?php if($uid!= null){ ?> value="<?php echo $state_country; ?>" <?php } else { ?> value= ""<?php  } ?>  class="form-control" placeholder="">
																 <?php echo form_error('statecountry'); ?>
															</div>
														</div>
														<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
															<div class="form-group">
																<label>Town / City <sup>*</sup></label>
																<input type="text" name="towncity" id="towncity" <?php if($uid!= null){ ?> value="<?php echo $town_city; ?>" <?php } else { ?> value= ""<?php  } ?>  class="form-control" placeholder="">
																 <?php echo form_error('towncity'); ?>
															</div>
														</div>
														<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
															<div class="form-group">
																<label>Postcode / ZIP <sup>*</sup></label>
																<input type="text" name="postcode" id="postcode" <?php if($uid!= null){ ?> value="<?php echo $pin; ?>" <?php } else { ?> value= ""<?php  } ?>  class="form-control" placeholder="">
																 <?php echo form_error('postcode'); ?>
															</div>
														</div>
														<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
															<div class="form-group">
																<label>Email Address <sup>*</sup></label>
																<input type="email" name="email" id="email" <?php if($uid!= null){ ?> value="<?php echo $email; ?>" <?php } else { ?> value= ""<?php  } ?>  class="form-control" placeholder="">
																 <?php echo form_error('email'); ?>
															</div>
														</div>
														<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
															<div class="form-group">
																<label>Phone Number <sup>*</sup></label>
																<input type="text" name="phonename" id="phonename" <?php if($uid!= null){ ?> value="<?php echo $mobile; ?>" <?php } else { ?> value= ""<?php  } ?>  class="form-control" placeholder="">
																 <?php echo form_error('phonename'); ?>
															</div>
														</div>
														<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
															<div class="form-group">
														<label>Address</label>
														<textarea placeholder="" name="address"   id="address" ><?php if($uid!= null){ ?> <?php echo $address; ?>" <?php } else { ?> <?php  } ?></textarea>
														 <?php echo form_error('address'); ?>
													</div>
														</div> -->
														
													</div>
												</div>
											</div>
											<div class="tg-bookingdetail">
												
												<div class="tg-box tg-yourorder">
													<div class="tg-heading">
														<h3>Your Order</h3>
													</div>
													<div class="tg-widgetpersonprice">
														<div class="tg-widgetcontent">
															<ul>
															<?php
																		//////////////////session//////////////


if( $this->session->userdata('no_persons') != null)
{
  $no_person=$this->session->userdata('no_persons');
}
else{
	$no_person=0;
}

if( $this->session->userdata('no_tents') != null)
{
	    $no_tent=$this->session->userdata('no_tents');
}	
else{
	$no_tent=0;
}
if( $this->session->userdata('froms') != null)
{
	$from=$this->session->userdata('froms');
}	
else{
	$from=0;
}  
if( $this->session->userdata('tos') != null)
{
		  $to=$this->session->userdata('tos');
}	
else{
	$to=0;
}		
if( $this->session->userdata('loc_ids') != null)
{
			$loc_id=$this->session->userdata('loc_ids');
}	

if( $this->session->userdata('no_tent_avails') != null)
{
			$no_tent_avail=$this->session->userdata('no_tent_avails');
}	

if( $this->session->userdata('tent_rates') != null)
{
			$tent_rate=$this->session->userdata('tent_rates');
}
	




		
			

if($loc_id!=null)
{
	
 $query=$this->db->query("select * from  location_detail where detail_id=$loc_id ");
 
        $resultnt=$query->result();

        $rows=$query->num_rows();
        if($rows > 0)
        {
         foreach ($resultnt as $valnt)
          {
                $gst= $valnt->gst;
               
	  }          
        }   

			}	
	

//if( $allowed_person== null)
//{
//				 $allowed_person=$this->session->userdata('allowed_person');
			
//}












//////session/////////////////////																		
															 $date1 = strtotime($to);
$date2 = strtotime($from);
$datediff = $date1 - $date2;

$days =  floor($datediff / (60 * 60 * 24));
if($days == 0){
$days=1;
															 $tot=$no_person*$tent_rate;
}
else
{
 $tot=$no_person*$tent_rate*$days;
}														?>
															 <li class="tg-personprice"><div class="tg-perperson"style="width:50%;" ><span>Checkin</span><!-- <label style="display:inline-block;margin-left:10px;color:#9b9e06;font-weight: bold;"><?php  echo date("d-m-Y", strtotime($from));  ?></label> --><!-- <input type="date" class="date_field" id="to" name="to"/ style="width:80%;height:30px; "> --><p> <input type = "text" id ="datepicker-12" name ="datepicker-12" class="calend_input chngdate" value=" <?php echo date("d-m-Y", strtotime($from));  ?>"></p></div>
															 
															 
															 
															 <div class="tg-perperson"style="width:50%;"><span>Checkout</span><!-- <input type="date" class="date_field" id="to" name="to"/ style="width:80%;height: 30px;"></div> --><p>
															 <input type = "text" id = "datepicker-13" name ="datepicker-13" class="calend_input chngdate" value=" <?php echo date("d-m-Y", strtotime($to));  ?>"></p></li> 

															<!-- <div class="form-group">
																<label style="color: #fff;">Check In</label>
																	<input type="date" class="date_field" id="from" name="from"/> 
															</div>
															<div class="form-group"> 
																<label style="color: #fff;">Check Out</label>
															<input type="date" class="date_field" id="to" name="to"/>
															</div> -->
 <li class="tg-personprice"><div class="tg-perperson" ><span>Total no of days  </span><em id="full"><?php echo $days; ?></em></div></li>
															
                                                           <!--<li class="tg-personprice"><div class="tg-perperson"><span>Total no person  </span><em><?php echo $no_person; ?></em></div></li>-->
															
															<li class="tg-personprice"><div class="tg-perperson"><span>Total no person  </span><em><div class="quantity">
    <a href="#" class="quantity__minus"><span>-</span></a>
    <input name="quantity" id="quantity" type="text" class="quantity__input" value="<?php echo $no_person; ?>">
    <a href="#" class="quantity__plus"><span>+</span></a>
  </div></em></div></li>
																



															

															<li class="tg-personprice"><div class="tg-perperson"><span>Person Base Price  (<div id="ww" style="display:inline-block;"><?php echo $no_person; ?></div> x <?php echo $tent_rate; ?>)</span><em id="baseprice"><?php echo $tot; ?></em></div></li>
																<li><span>Sub Total</span><em id="subtotal"><?php echo $tot; ?></em></li>
														
																<li><span>Tax Rate</span><em><?php echo $gst; ?> </em></li>
																<?php $sum= $tot+$gst; ?>
																<li class="tg-totalprice"><div class="tg-totalpayment"><span>Total Price</span><input type="text" id="tot" name="tot" value="<?php echo $sum; ?>" class="tot_price"></div></li>
															</ul>
															
																<input type="hidden" name="in" id="in" class="form-control" value="<?php  echo date("d-m-Y", strtotime($from));  ?>" placeholder="No.of Tents" >
															
												<input type="hidden" name="out" id="out" value="<?php  echo date("d-m-Y", strtotime($to));  ?>" class="form-control" placeholder="No.of Tents"  >
															
												<input type="hidden" name="noperson" id="noperson" class="form-control" value="<?php echo $no_person; ?>"  placeholder="No.of Tents" >
														<input type="hidden" name="no_tent" id="no_tent" class="form-control" value="<?php echo $no_tent; ?>"  placeholder="No.of Tents" >
											

													<input type="hidden" name="totamt" id="totamt" value=" <?php echo $sum; ?>" class="form-control" placeholder="No.of Tents"  >
																	
																
													<input type="hidden" name="loc_id" id="loc_id" value=" <?php echo $loc_id; ?>" class="form-control" placeholder="No.of Tents"  >
															
															
					
													<input type="hidden" name="tentrate" id="tentrate" value=" <?php echo $tent_rate; ?>" class="form-control" placeholder="No.of Tents"  >
															
												
													<input type="hidden" name="gst" id="gst" value=" <?php echo $gst; ?>" class="form-control" placeholder="No.of Tents"  >
													
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
	
	
	 $("#confirm").validate({

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
		//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
	</script>
	
	
	
	

			

  <script>

		
		
		var checkin, checkout;
			$('.chngdate').on("change", function() {
				checkin=$('#datepicker-12').val();
				checkout=$('#datepicker-13').val();
				noperson=$('#quantity').val();
				no_tent=$('#no_tent').val();
				totamt=$('#totamt').val();
				tentrate=$('#tentrate').val();
				gst=$('#gst').val();
			//	alert(checkin);alert(checkout);
						$.ajax({
			type: "POST",
				url: "<?php echo base_url(); ?>index.php/Home/datechangecal",
				data:{checkin:checkin,checkout:checkout,noperson:noperson,no_tent:no_tent,totamt:totamt,tentrate:tentrate,gst:gst},
				dataType:"json", 
						
						  success: function(data) {
			
           if(data.status==1){
				//alert("ddd");
			
			//	$("#full" ).val(data.days);
			$("#full" ).html(data.days);
			$("#tot" ).val(data.gstsum);
				$("#totamt" ).html(data.gstsum);
				
			$("#subtotal" ).html(data.total);
				$("#baseprice" ).html(data.total);

			

              }else{
				
      }

					/*var resultObj = JSON.parse(result)
			 window.setTimeout(function(){location.reload()},1000);*/
				}               
		}); 
 });

	</script>
	<script >
	 $(document).ready(function() {
  const minus = $('.quantity__minus');
  const plus = $('.quantity__plus');
  const input = $('.quantity__input');
  minus.click(function(e) {
	   
    e.preventDefault();
    var value = input.val();
    if (value > 1) {
      value--;
    }
   input.val(value);
	
	checkin=$('#datepicker-12').val();
				checkout=$('#datepicker-13').val();
				noperson= value;
				no_tent=$('#no_tent').val();
				totamt=$('#totamt').val();
				tentrate=$('#tentrate').val();
	gst=$('#gst').val();
	
					$.ajax({
			type: "POST",
				url: "<?php echo base_url(); ?>index.php/Home/persomminimise",
				data:{checkin:checkin,checkout:checkout,noperson:noperson,no_tent:no_tent,totamt:totamt,tentrate:tentrate,gst:gst},
				dataType:"json", 
						
						  success: function(data) {
			
           if(data.status==1){
				//alert("ddd");
			
			$("#full" ).html(data.days);
			$("#tot" ).val(data.gstsum);
				
				
			$("#subtotal" ).html(data.total);
				$("#baseprice" ).html(data.total);
$("#ww" ).html(data.noperson);
$("#noperson" ).html(data.noperson);
$("#tot" ).html(data.gstsum);
              }else{
				
      }

					/*var resultObj = JSON.parse(result)
			 window.setTimeout(function(){location.reload()},1000);*/
				}               
		}); 
	
	
	
	
	
	
	
  });
  
  plus.click(function(e) {
	 
    e.preventDefault();
    var value = input.val();
    value++;
     input.val(value);
	
	checkin=$('#datepicker-12').val();
				checkout=$('#datepicker-13').val();
				noperson= value;
				no_tent=$('#no_tent').val();
				totamt=$('#totamt').val();
				tentrate=$('#tentrate').val();
	
	gst=$('#gst').val();
					$.ajax({
			type: "POST",
				url: "<?php echo base_url(); ?>index.php/Home/persomminimise",
				data:{checkin:checkin,checkout:checkout,noperson:noperson,no_tent:no_tent,totamt:totamt,tentrate:tentrate,gst:gst},
				dataType:"json", 
						
						  success: function(data) {
			
           if(data.status==1){
				//alert("ddd");
			
			//	$("#full" ).val(data.days);
			$("#full" ).html(data.days);
			$("#tot" ).val(data.gstsum);
				
				
			$("#subtotal" ).html(data.total);
				$("#baseprice" ).html(data.total);
$("#ww" ).html(data.noperson);
$("#noperson" ).html(data.noperson);

              }else{
				
      }

					/*var resultObj = JSON.parse(result)
			 window.setTimeout(function(){location.reload()},1000);*/
				}               
		}); 
	
	
	
	
	
	
  })
  
  
})
;</script>
	
	</body>


</html>





