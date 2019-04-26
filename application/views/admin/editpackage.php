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
    <title>Add Package </title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/node_modules/dropify/dist/css/dropify.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/node_modules/html5-editor/bootstrap-wysihtml5.css" />
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
            <p class="loader__label">jungle club</p>
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
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Edit Package</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                   <li class="breadcrumb-item"><a href="javascript:void(0)">List Package</a></li>
                                <li class="breadcrumb-item active">Add Package</li>
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
                                <div> 
                            <h4 class="card-title">Edit Package</h4>  

                                                            </div>

                           <!--  <h5 class="card-subtitle"> Bootstrap Elements </h5> -->
                            <div class="row">
							
                                <div class="col-sm-12 col-xs-12">
								
								 
                                     <form class="tg-formtheme tg-formtrip " method="post" action="<?php echo base_url(); ?>index.php/Home/updatepackage" name="saveloc" id="saveloc" enctype="multipart/form-data" >
                                   <?php foreach($package as $pack) { ?>
                                        <div class="form-group">
                                            <div class="form-group">
                                            <label for="exampleInputEmail111">Location </label>
                                            <select class="custom-select col-12" id="location" name="location" >
                                          <?php for($i=0,$l=1;$i<count($location);$i++,$l++) { ?>
											  
                                                <option value = "<?= $location[$i]['c_id'];?>" ><?= $location[$i]['c_name']; ?></option>
                                                <?php } ?>
                                    </select>
                                        </div>
                                            <label for="exampleInputEmail12">Package name</label>
                                            <input type="text" class="form-control" id="Package" name="Package" value="<?php echo $pack['package'] ?>"  placeholder="Package name">
                                        </div>
										       <input type="hidden" class="form-control" id="apid" name="apid" value="<?php echo $pack['ped'] ?>"  placeholder="Package name">
                                       <input type="hidden" class="form-control" id="thid" name="thid" value="<?php echo $pack['thumbnailimage'] ?>"  placeholder="Package name">
                                    
                                       <div class="form-group">
                                         <label for="exampleInputEmail12">Package Description</label>
                                        <textarea class="textarea_editor form-control" rows="15" id="" name="Description" placeholder="Enter text ..."><?php echo $pack['packagedescription'] ?></textarea>
                                    </div>
                                         <div class="form-group">
                                            <label for="exampleInputPassword11">Package days</label>
                                            <input type="text" class="form-control" id="days" name="days" value="<?php echo $pack['packagedays'] ?>" placeholder="Package days">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword11">Package Price</label>
                                            <input type="text" class="form-control" id="price" name="price"  value="<?php echo $pack['packageprize'] ?>" placeholder="price">
                                        </div>
                            <div class="form-group">
                                            <label for="exampleInputPassword11">No of person</label>
                                            <input type="text" class="form-control" id="noperson" value="<?php echo $pack['noperson'] ?>"  name="noperson" placeholder="Amount">
                                        </div>
										
								   <?php }?>
                                       <div class="card-body p-b-0" style="padding-left: 0px; padding-bottom: 20px;">
                                 <label for="exampleInputPassword11">Amenities </label> </div>
                                 <div class="col-lg-12 col-md-12"><div class="row"> <div class=" col-lg-6 col-md-6"><div class="input-group"> <ul class="lz">
                                                            	
														<?php 
															$amb=	$pack['ped'];
															foreach($amenities as $as){				  
									                            /*$query=$this->db->query("SELECT b.*,a.`id` as aid FROM `packageamenities` b, locationamenities a WHERE b.`amenities` = a.amenities  and b.`package` = $amb ");
                                                                $result=$query->result();
                                                                $rows=$query->num_rows();
                                                                if($rows > 0){
                                                                    foreach ($result as $amni){
                                                                        $am= $amni->amenities;   $amid= $amni->aid;  */
																?>
                                                            <li>
                                                                <label class="contan"><?php echo $as['name']; ?>
                                                                   <input type="checkbox" name="amni[]" <?php if(isset($as['loc'])) echo "checked" ?> value="<?php echo $as['id']; ?>"  />
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </li>                                                                                    
		                                                <?php }/*}}*/ ?>  
                                                          
                                                            
                                                            
                                                           
                                                        </ul> </div> </div>




                                                    </div>





                                                         </div>
                                                         <div class="col-sm-12 col-xs-12" style="padding: 20px; border: 1px dashed #d7d1d1; margin-bottom: 20px;">
                            <div class="row">
                            					 
                         <div class="col-md-5 col-sm-5 col-xs-5">   <div class="custom-control custom-radio">
      <input type="radio" class="custom-control-input" id="minimal-radio-1" name="example1" value="0"  <?php if($pack['activestate']==0)
							 {?> checked  <?php } ?>>
      <label class="custom-control-label rao" for="minimal-radio-1">Activate</label>
    </div></div>
	
					
    <div class="col-md-5 col-sm-5 col-xs-5">
    <div class="custom-control custom-radio">
      <input type="radio" class="custom-control-input" id="minimal-radio-2" value="1"; name="example1">
      <label class="custom-control-label rao" for="minimal-radio-2" <?php if($pack['activestate']==1)
							 {?> checked  <?php } ?>>Deactivate</label>
    </div>    
                            
</div>

	
</div>
								
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
                                <div class="row">  <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 15px;">  <label for="input-file-now-custom-2">Thumbnail Image</label></div>
                                
                           
<?php foreach($thumb as $th)
{
	?>


								<div class="col-lg-4 col-md-4 imgUp">  <!-- <i class=" icon-plus imgAdd"></i>    -->

     <div class="imagePreview" style="background: url(<?php echo base_url(); ?>uploads/packagethumbnail/<?php echo $th['imagename'] ; ?>); "><a href="<?php echo base_url(); ?>index.php/Home/deleteimages/<?php echo $th['fid']; ?>"> <div style="    color: #fff;
    text-align: center;
    padding: 10px;
    background-color: #de6845;
    height: 40px;">Delete </div></a> </div>
	
<label class="btn btn-primary bbbn">
 
Upload <input type="file" class="uploadFile img" id="slids" name="slids" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                </label>
 
                          </div>

<?php } ?>



						

                            </div>
                            </div> 
						
						
                            <div class="card-body">
							
							
							
                                <div class="row"> <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 15px;">  <label for="input-file-now-custom-2">Slider Image</label></div>
                                
<?php $i=1; foreach($slidepackage as $pd)
{
	?>


							
						  
						  
						  <div class="col-lg-4 col-md-4 imgUp">  <!-- <i class=" icon-plus imgAdd"></i>    -->

  
	 <div class="imagePreview" style="background: url(<?php echo base_url(); ?>uploads/packageslider/<?php echo $pd['imagename'] ; ?>); "> <a href="<?php echo base_url(); ?>index.php/Home/deleteimages/<?php echo $pd['fid']; ?>"> <div style="    color: #fff;
    text-align: center;
    padding: 10px;
    background-color: #de6845;
    height: 40px;">Delete </div></a> </div>
	
<label class="btn btn-primary bbbn">
Upload <input type="file" id="input-file-now-custom-2" name="sd<?php echo $i; ?>" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                </label>
 
                          </div>
						  
						  
<?php $i++; } ?> 

                            </div>
                            </div> 
<div class="card-body">
                                <div class="row"> 
                                   <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 15px;">  <label for="input-file-now-custom-2">Gallery Image</label></div>
                              
<?php $i=1; foreach($homepackage as $pd)
{
	
	?>

							  <div class="col-lg-4 col-md-4 imgUp">  <!-- <i class=" icon-plus imgAdd"></i>    -->

  

<div class="imagePreview" style="background: url(<?php echo base_url(); ?>uploads/packageimages/<?php echo $pd['imagename'] ; ?>); "> <a href="<?php echo base_url(); ?>index.php/Home/deleteimages/<?php echo $pd['file']; ?>"> <div style="    color: #fff;
    text-align: center;
    padding: 10px;
    background-color: #de6845;
    height: 40px;">Delete </div></a> </div>
<label class="btn btn-primary bbbn">	

Upload <input type="file" id="input-file-now-custom-2" name="gal<?php echo $i; ?>" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                </label>
 
                          </div>
                <?php $i++; } ?>         

                            </div>
                            </div> 



                             </div>


                     
                           
                        </form>
                                                   
                      

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
    <script src="vnode_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Plugins for this page -->
    <!-- ============================================================== -->
     <!-- icheck -->
<!-- icheck --><script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- jQuery file upload -->
   
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
	
		function change_city()
		{
			//alert("dfsdf");
				//$("#sub_category_id > option").remove();
			var st_id = $('#location').val();
			alert (st_id);
            var section_id;
       // var dept_id = $('#dept_id').val();
	   
	   
        $.ajax({
            type: "POST",
			//index.php/admin/Brand/getSubCategory/"+cat_id,
            url: "<?php echo base_url(); ?>index.php/Home/getaminities",
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

</html>