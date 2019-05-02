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
    <title>Elite Admin Template - The Ultimate Multipurpose admin template</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/node_modules/dropify/dist/css/dropify.min.css">
    <!-- Custom CSS -->
   <link href="<?php echo base_url(); ?>/assets/css/style.min.css" rel="stylesheet">
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
                        <h4 class="text-themecolor">Edit location</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                   <li class="breadcrumb-item"><a href="javascript:void(0)">List location</a></li>
                                <li class="breadcrumb-item active">Edit location</li>
                            </ol>
                           <!--  <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button> -->
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
           
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                              <div class=" card-body">
                            <h4 class="card-title">Add location</h4>
                           <!--  <h5 class="card-subtitle"> Bootstrap Elements </h5> -->
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                       <form class="tg-formtheme tg-formtrip " method="post" action="<?php echo base_url(); ?>index.php/Home/updatelocations" name="saveloc" id="saveloc" enctype="multipart/form-data" >
                                    <!--    <div class="form-group">
                                            <label for="exampleInputEmail12">Location name</label>
                                            <input type="text" class="form-control" id="location" name="location" value="<?php echo $pa['address_line1'];?>" placeholder="Location name">
                                        </div> -->
										 <?php foreach($package as $pa) { ?>
										  <div class="form-group">
                                       
                                           <input type="hidden" class="form-control" id="lid" name="lid" value="<?php echo $pa['lood'];?>" placeholder="Location address ">
										  <input type="hidden" class="form-control" id="sid" name="sid" value="<?php echo $pa['s_id'];?>" placeholder="Location address ">
											  <input type="hidden" class="form-control" id="cid" name="cid" value="<?php echo $pa['c_id'];?>" placeholder="Location address ">
										  <input type="hidden" class="form-control" id="co_id" name="co_id" value="<?php echo $pa['country_id'];?>" placeholder="Location address ">
										  <input type="hidden" class="form-control" id="add" name="add" value="<?php echo $pa['locationaddress'];?>" placeholder="Location address ">
										  <input type="hidden" class="form-control" id="fid" name="fid" value="<?php echo $pa['file'];?>" placeholder="Location address ">
										
                                        </div>
										
                                        <div class="form-group">
                                            <label for="exampleInputPassword11">Location address 1</label>
                                            <input type="text" class="form-control" id="address1" name="address1" value="<?php echo $pa['address_line1'];?>" placeholder="Location address 1">
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputPassword11">Location address 2</label>
                                            <input type="text" class="form-control" id="address2" name="address2"  value="<?php echo $pa['address_line2'];?>" placeholder="Location address 2">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword11">PIN</label>
                                            <input type="text" class="form-control" id="pin" name="pin"  value="<?php echo $pa['postalcode'];?>" placeholder="Pincode">
                                        </div>
										
                                        <div class="form-group">
                                            <label for="exampleInputEmail111">Country </label>
                                            <select class="custom-select col-12" id="country" name="country" onChange="change_sub_category();">
                                       
										   <option value = "$pa['']" selected ><?  ?>
										  <?php for($i=0,$l=1;$i<count($countries);$i++,$l++) { ?>
											 
                                                <option value = "<?= $countries[$i]['id'];?>" <?php if($pa['contid'] == $countries[$i]['id']){ echo 'selected';} ?>><?= $countries[$i]['name']; ?></option>
                                                <?php } ?>
										
										
										
                                    </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail111">State</label>
											<?php $sid=$pa['s_id'] ;
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
											?>
                                            <select class="custom-select col-12" id="state" name="state"  onChange="change_city();" >
                                    
                                        <option value="<?php echo $st;?>" selected><?php echo $stnm;?></option>
                                    </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail111">City </label>
                                            <select class="custom-select col-12" id="city" name="city">
                                       <?php $cid=$pa['c_id'] ;
											  $query=$this->db->query("select * from cities where c_id=$cid");
        $result=$query->result();

        $rows=$query->num_rows();
        if($rows > 0)
        {
         foreach ($result as $val)
          {
                $ct= $val->c_id;  $ctnm= $val->c_name;
	  }          
        }   
											?>
                                           <option value="<?php echo $ct;?>" selected><?php echo $ctnm;?></option>
                                    </select>
                                        </div>
                                    
                                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                                        <button type="submit" class="btn btn-dark">Cancel</button>
                                  
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                              <div class="card-body">
                                <h4 class="card-title">&nbsp;</h4>
                                <label for="input-file-now-custom-2">Location Image</label>

						  
						  
						  
						    
						  
						  <div class="col-lg-4 col-md-4 imgUp">  <!-- <i class=" icon-plus imgAdd"></i>    -->

    <div class="imagePreview" style="background: url(<?php echo base_url(); ?>uploads/location/<?php echo $pa['imagename'] ; ?>); "><a href="<?php echo base_url(); ?>index.php/Home/deletelocationimages/<?php echo $pa['fid']; ?>"> <div style="    color: #fff;
    text-align: center;
    padding: 10px;
    background-color: #de6845;
    height: 40px;">Delete </div></a> </div>
	
	
<label class="btn btn-primary bbbn">
Upload <input type="file" id="ssss" name="ssss" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                </label>
 
                          </div>
						  
                            </div>
                           
                            <div class="card-body p-b-0">
                                <h6 class="card-subtitle">Tent size </h6> </div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span class="hidden-xs-down" style="font-weight: bold;">Small</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span class="hidden-xs-down" style="font-weight: bold;">Medium</span></a> </li>
                                <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#messages2" role="tab" aria-selected="true"><span class="hidden-sm-up"></span> <span class="hidden-xs-down" style="font-weight: bold;">Large</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
							
							  <?php $cids=$pa['lood'] ;
											  $query=$this->db->query("select * from locationtent  where locationid=$cids and tenttype=1");
        $result=$query->result();

        $rows=$query->num_rows();
        if($rows > 0)
        {
         foreach ($result as $vale)
          {
                $sc= $vale->count;   $sa= $vale->amount;  $samw= $vale->tenttype;
	  }          
        }   
											?>
							
							
							
							
							  <?php $cids=$pa['lood'] ;
											  $query=$this->db->query("select * from locationtent  where locationid=$cids and tenttype=2");
        $result=$query->result();

        $rows=$query->num_rows();
        if($rows > 0)
        {
         foreach ($result as $valm)
          {
                $scm= $valm->count;   $sam= $valm->amount;  $samw= $valm->tenttype; 
	  }          
        }   
											?>
							
							
							  <?php $cids=$pa['lood'] ;
											  $query=$this->db->query("select * from locationtent  where locationid=$cids and tenttype=3");
        $result=$query->result();

        $rows=$query->num_rows();
        if($rows > 0)
        {
         foreach ($result as $vall)
          {
                $scl= $vall->count;   $sal= $vall->amount;  $salw= $vall->tenttype;  
	  }          
        }   
											?>
							
							
                            <div class="tab-content">
                                <div class="tab-pane" id="home2" role="tabpanel">
                                    <div class="p-20">
                                        <div class="form-group">
									
                                            <label for="exampleInputEmail12">Number of tents</label>
                                            <input type="text" class="form-control" id="smalltent" name="smalltent" value="<?php echo $sc;?>" placeholder="Number of tents">
                                        </div>
                                    <div class="form-group">
                                            <label for="exampleInputEmail12">Amount (per tent)</label>
                                            <input type="text" class="form-control" id="samllamount" value="<?php echo $sa;?>" name="samllamount" placeholder="Amount">
                                        </div>
                                    </div>
								
                                </div>
									<?php	if($samw==1); {?>
                                <div class="tab-pane p-20" id="profile2" role="tabpanel"><div class="form-group">
                                            <label for="exampleInputEmail12">Number of tents</label>
                                            <input type="text" class="form-control" id="mediumtent" value="<?php echo $scm;?>"  name="mediumtent" placeholder="Number of tents">
                                        </div>
                                    <div class="form-group">
                                            <label for="exampleInputEmail12">Amount (per tent)</label>
                                            <input type="text" class="form-control" id="mediumamount" value="<?php echo $sam;?>" name="mediumamount" placeholder="Amount">
                                        </div></div>
										
									<?php } ?>
									<?php	if($salw==3); {?>
                                <div class="tab-pane p-20 active" id="messages2" role="tabpanel"><div class="form-group">
                                            <label for="exampleInputEmail12">Number of tents</label>
                                            <input type="text" class="form-control" id="largetent" value="<?php echo $scl;?>" name="largetent" placeholder="Number of tents">
                                        </div>
                                    <div class="form-group">
                                            <label for="exampleInputEmail12">Amount (per tent)</label>
                                            <input type="text" class="form-control" id="largeamount" value="<?php echo $sal;?>" name="largeamount" placeholder="Amount">
                                        </div></div>
                            </div>
									<?php }?>
                         <div class="card-body p-b-0">
                                <h6 class="card-subtitle">Amenities </h6> </div>
                                 <div class="col-lg-12 col-md-12"><div class="row"> <div class=" col-lg-6 col-md-6"><div class="input-group"> <ul class="lz">
                                                            
								<?php 
									$cidsee=$pa['lood'] ;
									$query=$this->db->query("SELECT b.*,a.`name`,a.`id` as aid FROM `locationamenities` b, amenities a WHERE b.`amenities` = a.id  and b.`location` = $cidsee ");
                                    $result=$query->result();
                                    $rows=$query->num_rows();		
									foreach($amenities as $as) { ?>
                                        <li>
                                            <label class="contan"><?php echo $as['name']; ?>
                                            <input type="checkbox" name="amni[]" <?php if(isset($as['loc'])) echo "checked" ?> value="<?php echo $as['id']; ?>"  />
                                            <span class="checkmark"></span>
                                            </label>
                                        </li>        
                                <?php } ?> 
                                                          
                                                        </ul> </div> </div> 

                                                    </div>
                                                         </div>
                        </div>
                    </div>
			<?php } ?>
                </div>
                 </form>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
              <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	  
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
	
	 
    <script>
    $(".imgAdd").click(function(){
  $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
});
$(document).on("click", "i.del" , function() {
    $(this).parent().remove();
});
$(function() {
    $(document).on("change",".uploadFile", function()
    {
            var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }
      $('#imagd').attr('src', this.result);
    });
});
    </script>
    <!-- jQuery file upload -->
    
 <!-- wysuhtml5 Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/node_modules/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="<?php echo base_url(); ?>/assets/node_modules/html5-editor/bootstrap-wysihtml5.js"></script>
<script>
    $(document).ready(function() {
        $('.textarea_editor').wysihtml5();
    });
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
			//alert (st_id);
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