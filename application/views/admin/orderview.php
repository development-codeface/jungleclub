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
    <title>List location</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/node_modules/dropify/dist/css/dropify.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Popup CSS -->
    <link href="<?php echo base_url(); ?>/assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/style.min.css" rel="stylesheet">
    <!-- page css -->
    <link href="<?php echo base_url(); ?>/assets/css/pages/user-card.css" rel="stylesheet">
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
            <p class="loader__label">Elite admin</p>
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
        <!-- End Topbar header -->
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
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">User Profile</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">User profile</li>
                            </ol>
                          <!--   <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i style=" font-weight: bold;" class="ti-plus "></i>&nbsp; Add New Location</button>  -->
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
              <!-- Row -->
                <div class="row">
                    <!-- Column -->
						<?php $i=0; foreach($details as $der)
{
	//print_r($de);
	
	?>
					
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
							
							
							
							
							
                                <center class="m-t-30"> <img src="<?php echo base_url(); ?>/assets/images/users/5.jpg" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?php echo $der['firstname'].' '.$der['lastname']; ?></h4>
                                   
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6><?php echo $der['email'];?></h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6><?php echo $der['mobile'];?></h6> <small class="text-muted p-t-30 db">Address</small>
                                <h6><?php echo $der['address_line1'];?></h6>
                                <small class="text-muted p-t-30 db">Address</small>
                                <h6><?php echo $der['address_line1'];?></h6>
                                <small class="text-muted p-t-30 db">country</small>
                                <h6><?php echo $der['name'];?></h6>
                                <small class="text-muted p-t-30 db">state</small>
                                <h6><?php echo $der['s_name'];?></h6>
                               <small class="text-muted p-t-30 db">city</small>
                                <h6><?php echo $der['c_name'];?></h6>
                                
                            
                            </div>
                        </div>
                    </div>
<?php } ?>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                          
                    
                            <div class="card-body">
                                <h4 class="card-title">Total bookings</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Booked date</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>No of PKG</th>
                                                <th>PKG Name</th>
												   <th>Amount</th>
												      <th>No person</th>
                                                <th>Bill</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php $i=0; foreach($details as $de)
{
	//print_r($de);
	
	?>
										
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo date("m/d/Y", strtotime($de['orderplacedate'])); ?></td>
                                                <td><?php echo date("m/d/Y", strtotime($de['bookingstartdate']));?></td>
                                                <td><?php echo date("m/d/Y", strtotime($de['bookingenddate']));  ?></td>
                                                <th><?php echo $de['packagecount']; ?></th>
                                                <th><?php echo $de['package']; ?></th>
												 <th><?php echo $de['amount']; ?></th>
												  <th><?php echo $de['no_persons']; ?></th>
                                                <td> <a class="btn default btn-outline" href="<?php echo base_url(); ?>index.php/Home/billingorder/<?php echo $de['oid']; ?>" ><button type="submit" class="btn btn-primary">Bill</button></td>
                                            </tr>

										<?php
$i=$i+1;

										} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                      
                   
                            
                         
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
               
                <!-- ============================================================== -->
                <!-- End PAge Content -->
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
            © 2019 codeface
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
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/node_modules/popper/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>/assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>/assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Plugins for this page -->
    <!-- ============================================================== -->
    <!-- jQuery file upload -->
    <script src="<?php echo base_url(); ?>/assets/node_modules/dropify/dist/js/dropify.min.js"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
</body>

</html>