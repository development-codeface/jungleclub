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
    <link href="../assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
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
                        <h4 class="text-themecolor">View location</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">View location</li>
                            </ol>
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i style=" font-weight: bold;"></i></button> 
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- start PAge Content -->
                <!-- ============================================================== -->


<div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Booking Details</h4>
                                            <h6 class="card-subtitle"></h6>
                                            <table class="table table-striped table-bordered editable-table" id="editable-datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Order Date</th>
                                                        <th>Book (from)</th>
                                                        <th>Book  (To) </th>
                                                        <th>Booked by</th>
                                                        <th>No of PKG</th>
                                                        <th>Price</th>
                                                        <th>No of People</th>
                                                        <th>View</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
											<?php	foreach($details as $de) {?>
												
                                                    <tr id="1" class="gradeX">
                                                        <td><?php echo date("m/d/Y", strtotime($de['orderplacedate']));  ?></td>
                                                        <td><?php echo date("m/d/Y", strtotime($de['bookingstartdate'])); ?></td>
														  <td ><?php echo date("m/d/Y", strtotime($de['bookingenddate']));  ?></td>
                                                        <td><?php echo $de['fr'].' '.$de['lr']; ?></td>
                                                        <td><?php echo $de['packagecount']; ?> </td>
                                                        <td><?php echo $de['amount']; ?></td>
                                                        <td><?php echo $de['no_persons']; ?></td>
                                                      <td>   <a class="btn default btn-outline" href="<?php echo base_url(); ?>index.php/Home/orderview/<?php echo $de['oid']; ?>"><button type="submit" class="btn btn-primary">View</a>
                                        </td>
                                                     </tr>
                                                
											<?php } ?>
                                                   
                                                   
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                    </div>










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
    <script src="<?php echo base_url(); ?>/assets/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Plugins for this page -->
    <!-- ============================================================== -->
    <!-- jQuery file upload -->
    <!-- Editable -->
                <script src="<?php echo base_url(); ?>/assets/node_modules/jquery-datatables-editable/jquery.dataTables.js"></script>
                <script src="<?php echo base_url(); ?>/assets/node_modules/datatables/media/js/dataTables.bootstrap.html"></script>
                <script src="<?php echo base_url(); ?>/assets/node_modules/tiny-editable/mindmup-editabletable.js"></script>
                <script src="<?php echo base_url(); ?>/assets/node_modules/tiny-editable/numeric-input-example.js"></script>
                <script>
                $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
                $('#editable-datatable').editableTableWidget().numericInputExample().find('td:first').focus();
                $(function () {
                $('#editable-datatable').DataTable();
                });
                </script>
</body>

</html>