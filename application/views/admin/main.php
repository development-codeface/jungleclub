<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>/assets/images/favicon.png">
    <title>Jungel club</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="<?php echo base_url(); ?>/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="<?php echo base_url(); ?>/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/pages/dashboard1.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Jungle Club</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
     <?php $this->load->view('admin/header');?>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
     <?php $this->load->view('admin/slidebar');?>
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles ">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Jungle Club</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Jungle Club</li>
                            </ol>
                           <!--  <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button> -->
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-screen-desktop"></i></h3>
                                            <p class="text-muted">Total Bookings </p>
                                        </div>
										<?php $product_detw=$this->db->query("SELECT COUNT(id) as am from `order`");
$prow=$product_detw->result();
                                     foreach($prow as $detpro)
                                     {
                                       $suma= $detpro->am;
}
?>
                                        <div class="ml-auto">
                                            <h2 class="counter text-primary fonz"><?php echo $suma; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-credit-card"></i></h3>
                                            <p class="text-muted">Total Sales</p>
                                        </div>
											<?php 
										$month = date('m');
										$product_detsdd=$this->db->query("SELECT SUM(amount) as ids from `order`  where admin_cancel IS NULL and user_cancel IS NULL");
$provd=$product_detsdd->result();
                                     foreach($provd as $detprovd)
                                     {
                                       $totusmnd= $detprovd->ids;
}
?>
										
                                        <div class="ml-auto">
                                            <h2 class="counter text-cyan font_bold fonz "><i class="fa fa-inr"></i><?php echo $totusmnd; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-user"></i></h3>
                                            <p class="text-muted">Total Users</p>
                                        </div>
                                        <div class="ml-auto">
									<?php $product_det=$this->db->query("SELECT COUNT(id) as id from `users`");
$pro=$product_det->result();
                                     foreach($pro as $detpro)
                                     {
                                       $totus= $detpro->id;
}
?>
										
										
										
                                            <h2 class="counter text-purple fonz"><?php echo $totus ; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted"> New Bookings</p>
                                        </div>
										
										<?php 
										$month = date('m');
										$product_dets=$this->db->query("SELECT COUNT(id) as ids from `order` where MONTH(orderplacedate)=$month");
$prov=$product_dets->result();
                                     foreach($prov as $detprov)
                                     {
                                       $totusmn= $detprov->ids;
}
?>
                                        <div class="ml-auto">
                                            <h2 class="counter text-success fonz "><?php echo $totusmn; ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Info box -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Over Visitor, Our income , slaes different and  sales prediction -->
                <!-- ============================================================== -->
              
                <!-- ============================================================== -->
                <!-- Comment - table -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- Comment widgets -->
                    <!-- ============================================================== -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Recent Bookings </h5>
                            </div>
                            <!-- ============================================================== -->
                            <!-- Comment widgets -->
                            <!-- ============================================================== -->
                            <div class="comment-widgets" id="comment" style="height: 630px;position: relative;">
                                <!-- Comment Row -->
								
								<?php foreach($details as $val)
								{
									?>
								
								
                                <div class="d-flex no-block comment-row border-top">
								
								<?php if($val['imagename']!= null)
								{
									?>
								
                                    <div class="p-2"><span class="round"><img src="<?php echo base_url() .'uploads/profile_pic/'.$val['imagename'] ;?>" alt="user" width="50"></span></div>
                                <?php } else {
									?>
									   <div class="p-2"><span class="round"><img src="<?php echo base_url() .'uploads/profile_pic/Blank-avatar.png ';?>" alt="user" width="50"></span></div>
								<?php } ?>

								<div class="comment-text w-100">
                                        <h5 class="font-medium"><?php echo $val['fr'].' '.$val['lr'];?></h5>
                                        <p class="m-b-10 text-muted">Booked <?php echo $val['packagedays'] ;?> day camping at <?php echo $val['c_name'] ;?> for <?php echo $val['no_persons'] ;?> people.from <?php echo date("m/d/Y", strtotime($val['bookingstartdate']));?>  to <?php echo date("m/d/Y", strtotime($val['bookingenddate']));?></p>
										
									<?php if($val['admin_cancel']==2) { ?>
                                        <div class="comment-footer">
                                         <span class="text-muted pull-right"></span>   <span class="badge badge-pill badge-danger">Rejected</span>
                                        </div>
									<?php } else if( $val['user_cancel']==2) {  ?>
										 <div class="comment-footer">
                                      <span class="text-muted pull-right"></span>   <span class="badge badge-pill badge-danger">User canceled</span>
                                        </div>
										
									<?php } else { ?>
									 <div class="comment-footer">
                                       <a href="<?php echo base_url(); ?>index.php/Home/bookingadmincancel/<?php echo $val['oid']; ?>">   <span class="text-muted pull-right"></span> <span class="badge badge-pill badge-info">cancel</span> </a>
                                        </div>
									<?php } ?>
										
                                    </div>
                                </div>
                                <!-- Comment Row -->
								<?php } ?>
                               
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Table -->
                    <!-- ============================================================== -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="card-title">Sales Overview</h5>
                                        <h6 class="card-subtitle">Check the monthly sales </h6>
                                    </div>
									
									  <div class="ml-auto">
                                        <select class="form-control b-0" name="location" id="location">
                                           
                                          <?php foreach($location as $di){ ?>
											  
                                                <option  value = "<?= $di['c_id'];?>" ><?= $di['c_name']; ?></option>
                                                <?php } ?>
                                          
                                        </select>
                                    </div>
									
                                    <div class="ml-auto">
                                        <select class="form-control b-0" name="month" id="month">
                                           
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
										
                                            <option value="4">April</option>
                                            <option value="5" >May</option>
                                            <option value="6">June</option>
											
                                            <option value="7">July</option>
                                            <option value="8">	August</option>
                                            <option value="9">	September</option>  
											<option value="10">	October</option>
                                            <option value="11">	November</option>
                                            <option value="12">	December</option>
                                        </select>
                                    </div>
									
											
									  <div class="ml-auto">
                                        <button type="button" class="btn btn-info serched"> search</button> 
                                    </div>
                                </div>
                            </div>
							
							<div id=result>
							
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-6">
                                        <h3></h3>
										 <?php $sm=0; foreach($resultall as $frqala){ $sm=$sm+$frqala['am'] ?>
										 
										 <?php } ?>
                                        <h5 class="font-light m-t-0">Report for this month</h5></div>
                                    <div class="col-6 align-self-center display-6 text-right">
                                        <h2 class="text-success fonz"><i class="fa fa-inr"></i> <?php echo $sm ;?></h2></div>
                                </div>
                            </div>
                            <div class="table-responsive " style="height: 510px; position: relative;" >
                                <table class="table table-hover no-wrap table-striped " >
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>NAME</th>
                                            <th>PACKAGE</th>
                                            <th>DATE</th>
                                            <th>PRICE</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                               <?php $i=1; foreach($resultall as $frqal){  ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i; ?></td>
                                            <td class="txt-oflo"><?php echo $frqal['fr'].' '.$frqal['lr'];?></td>
                                            <td><span class="badge badge-success badge-pill"><?php echo $frqal['package'] ;?></span> </td>
                                            <td class="txt-oflo"><?php echo date("m/d/Y", strtotime($frqal['bookingenddate']));?></td>
                                            <td><span class="text-success fonz"><i class="fa fa-inr"></i><?php echo $frqal['am'];?></span></td>
                                        </tr>
                                  <?php $i++; } ?>
                                       
                                      
                                    </tbody>
                                </table>
                            </div>
							</div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Comment - chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2019 Eliteadmin by themedesigner.in
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/node_modules/popper/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>/assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>/assets/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/node_modules/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Popup message jquery -->
    <script src="<?php echo base_url(); ?>/assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Chart JS -->
    <script src="<?php echo base_url(); ?>/assets/js/dashboard1.js"></script>
    <script src="<?php echo base_url(); ?>/assets/node_modules/toast-master/js/jquery.toast.js"></script>
</body>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	

                                            <script type="text/javascript">

											
											
		$('.serched').click(function() { 
		
		var location = $( "#location" ).val();	
		var month = $( "#month" ).val();
			
					$.ajax({
			type: "POST",
				url:"<?php echo base_url(); ?>index.php/Home/serachmonth",
				data:{location:location,month:month},
				  // serializes the form's elements.
          success: function(data)
          {
              $("#result").html(data); // show response from the php script.
          }
        });

    e.preventDefault(); // avoid to execute the actual submit of the form.
			
		}); 
	
	
											
                                     </script>
		
	
	





</html>