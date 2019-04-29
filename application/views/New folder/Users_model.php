<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function __construct()
    {
    }
    public function getUserLogin($username, $password)
    {
		  $query = $this->db->query("SELECT  * from  user_profile  WHERE  user_name='$username'  and password='$password'");
       /* $query = $this->db->or_where_in('users', array(
            'user_name' => $username  ,
			'Email' => $username,
			
            'password' => $password,
            'status' => 1
			
        ));*/
        return $query->row_array();
    }
  function Insert_tbl($table,$data)
    {
    	$this->db->insert($table,$data);
    	return $this->db->insert_id();
          
    }
    public function getUserById($userid = null)
    {
        $query = $this->db->get_where('users', array(
            'id' => $userid,
            'status' => 1
        ));
        return $query->row_array();
    }
 public function register($fname,$lname,$email,$mobile,$password,$usertype)
    {
		$name=$fname.' '.$lname;
	
		  //  $query = $this->db->query("INSERT INTO  users(user_name ,password)
          //    VALUES ('$email','$password') ");
			//   $user_id = $this->db->insert_id();
			   $query = $this->db->query("INSERT INTO  users(firstname,lastname,email,mobile,password,usertype)
              VALUES ('$fname','$lname','$email',$mobile,'$password',$usertype) ");
         echo $this->db->last_query();
		  $user_id = $this->db->insert_id();
        return  $user_id;
    }
   
   
   public function get_userdata($user,$pwd)
       {   
     $sql="select * from users where `email`='$user' AND `password`='$pwd'";
  $res = $this->db->query($sql);
     //   if ($res->num_rows() > 0) {
     //   $result = $res->result();
     //   return $result;
    //    }
     //   return null;
      return $res->result();
     }
	 
	 
	  function get_table($table,$where)
    {
    	$this->db->select('*');
    	$this->db->from($table);
    	$this->db->where($where);
    	$query= $this->db->get();
    	return $query->result_array();
    }
	
	 function getSubCategory($field, $value) {


        $this->db->where('district.' . $field,$value);
        $this->db->where('location_detail.status','1');
        $this->db->join('district', 'district.district_id=location_detail.district_id');

      //  $this->db->order_by($orderby);
        $query = $this->db->get('location_detail');//echo $this->db->last_query();exit;
// $this->db->where('location_detail.staus', 1);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
	
	
	 function getlocdetail($value)
    {
          $query = $this->db->query("select * FROM  location_detail where detail_id=$value");
       
        return $query->result();
        
        
    } 
	 function district_id($value)
    {
          $query = $this->db->query("select * FROM location where loc_id=$value");
       
        return $query->result();
        
        
    } 
	 function get_userdetails($value)
    {
          $query = $this->db->query("select * FROM users where id=$value");
       
        return $query->result();
        
        
    } 
	  function common_update($id, $field, $table, $datas)
    {
        $this->db->where($field, $id);
        $this->db->update($table, $datas);
    }

	  public function check_pass($params, $id)
    {
        $this->db->select('ph.*,');
        $this->db->from('user_profile ph');
        $this->db->where('ph.password', $params);
        $this->db->where('ph.user_id', $id);
        $result = $this->db->get();
        return $result->row_array();
        
    }
	
	  public function update_pass($password, $admin_id)
    {
        $data = array(
            'password' => $password
        );
        $this->db->where('user_id', $admin_id);
        $this->db->update('user_profile', $data);
        return 1;
    }
		 function booking_detail($value)
    {
          $query = $this->db->query("select * FROM booking_details where user_id=$value");
       
        return $query->result_array();
        
        
    } 

	
	 public function getbookinginfo($userId)
    {
   
	  $this->db->select('up.*,us.loc_name');
        $this->db->from('location_detail us');
        $this->db->join('booking_details up', 'up.loc_id=us.detail_id', 'JOIN');
        $this->db->where('up.user_id', $userId);
       
        $result = $this->db->get()->result();
        return $result;
}
    function updatephoto($user_id, $file_name)
    {
        $query = $this->db->query("update user_details set profile_pic='$file_name' where user_id=$user_id ");
        return 1;
    } 
	
	public function checkEmail($params)
    {
		 $query = $this->db->query("SELECT email from user_details WHERE  email='$params'");
       return $query->result_array();
    /*    $this->db->select('ph.*,');
        $this->db->from('users ph');
        $this->db->like('ph.email', $params);
        $result = $this->db->get();
        return $result->row_array();*/
        
    }
	
	
	
	///////////admin/////////////////////
	
	function get_booking_detail()
	{
		$this->db->select('booking_details.*,district.dis_name,location_detail.loc_name');
	    $this->db->from('booking_details');
	     $this->db->join('location_detail','location_detail.detail_id = booking_details.loc_id');
		 $this->db->join('district','district.district_id = location_detail.district_id');
		 	$this->db->where('booking_details.status !=',0);
		$query = $this->db->get();
		$row = $query->result_array(); 
		return $row;
	}	
	  function update_approve($user_id)
    {
        $query = $this->db->query("update booking_details set approve_status=0 where book_id=$user_id ");
        return 1;
    } 
	  function rejectapprove($user_id)
    {
        $query = $this->db->query("update booking_details set approve_status=1 where book_id=$user_id ");
        return 1;
    }  
	function deletebook($user_id)
    {
        $query = $this->db->query("update booking_details set status=0 where book_id=$user_id ");
        return 1;
    }

function get_district()
    {
        $query = $this->db->query("SELECT * from  district WHERE  status=0");
      return $query->result_array();
        
    }


	function get_location_detail()
    {
      
    
		
		
		
		
		
		
		
		
		
		
		
		
		
		$this->db->select('location_detail.*,district.dis_name');
	    $this->db->from('location_detail');
	     $this->db->join('district','district.district_id = location_detail.district_id');
		 
		 	$this->db->where('location_detail.status',1);
		$query = $this->db->get();
		$row = $query->result_array(); 
		return $row;
		
		
		
		
		
		
		
		
		
		
		
		
    } 
	
	
	
	function dellocation($user_id)
    {
        $query = $this->db->query("update location_detail set status=0 where detail_id=$user_id ");
        return 1;
    }
	 function get_locationdetail($value)
    {
          $query = $this->db->query("select * FROM location_detail where detail_id=$value");
       
        return $query->result();
        
        
    } 
	  function updatelocphoto($loc_id, $file_name)
    {
		
		$query = $this->db->query("INSERT INTO  loc_images(loc_image ,loc_id)
              VALUES ('$file_name','$loc_id') ");
     return 1;
    } 
	
	  function updategallaryphoto($loc_id, $file_name)
    {
		
		$query = $this->db->query("INSERT INTO  gallary_images(gall_image ,loc_id)
              VALUES ('$file_name','$loc_id') ");
     return 1;
    } 
	
	
	
	  function updatehomesliderphoto($loc_id, $file_name)
    {
		
		$query = $this->db->query("INSERT INTO  home_images(home_image ,loc_id)
              VALUES ('$file_name','$loc_id') ");
     return 1;
    } 
	  function updatehomesliderimage($loc_id, $file_name)
    {
		
		   $query = $this->db->query("update home_images set home_image='$file_name' where home_id=$loc_id ");
       
     return 1;
    }  function updateuploadlocimage($loc_id, $file_name)
    {
		
		   $query = $this->db->query("update loc_images set loc_image='$file_name' where img_id=$loc_id ");
       
     return 1;
    }  function updategallary($loc_id, $file_name)
    {
		
		   $query = $this->db->query("update gallary_images set gall_image='$file_name' where gal_id=$loc_id ");
       
     return 1;
    } 
	
	
		
	 function getlocgallery($value)
    {
          $query = $this->db->query("select * FROM  gallary_images where loc_id=$value");
       
        return $query->result();
        
        
    } 	
	 function getlocimage($value)
    {
          $query = $this->db->query("select * FROM  loc_images where loc_id=$value");
       
        return $query->result();
        
        
    }  function gethomeimage($value)
    {
         
		
		
        $this->db->select('home_images.*,location_detail.loc_name');
	    $this->db->from('home_images');
	     $this->db->join('location_detail','location_detail.detail_id = home_images.loc_id');
		
		 	$this->db->where('home_images.status ',1);
		$query = $this->db->get();
		$row = $query->result_array(); 
		return $row;
        
    } 
	
	 function locname($loc_id)
    {
    
   													  $query=$this->db->query("select * from location_detail where detail_id=$loc_id");
        $result=$query->result();

        $rows=$query->num_rows();
        if($rows > 0)
        {
         foreach ($result as $vals)
          {
                $loca_name= $vals->loc_name;
	  }          
        }  
        return $loca_name;
}



 function getlocimagefull()
    {
          $query = $this->db->query("select * FROM  loc_images where status=1");
       
        return $query->result();
        
        
    } 

 function gethomeimagefull()
    {
         
		
		
        $this->db->select('home_images.*,location_detail.loc_name');
	    $this->db->from('home_images');
	     $this->db->join('location_detail','location_detail.detail_id = home_images.loc_id');
		
		 	$this->db->where('home_images.status ',1);
		$query = $this->db->get();
		$row = $query->result_array(); 
		return $row;
        
    } 

 function updatedistrictimage($loc_id, $file_name)
    {
		
		$query = $this->db->query("INSERT INTO  district_images(dis_images ,dis_id)
              VALUES ('$file_name','$loc_id') ");
     return 1;
    } 

	
	
	function get_districtlist()
    {
      
    
		
		
		
		
		
		
		
		
		
		
		
		
		
		$this->db->select('district.*,district_images.dis_images,district_images.d_id');
	    $this->db->from('district');
	     $this->db->join('district_images','district_images.dis_id = district.district_id');
		 
		 	$this->db->where('district.status',1);
		$query = $this->db->get();
		$row = $query->result_array(); 
		return $row;
		
		
		
		
		
		
		
		
		
		
		
		
    } 
	

	 function get_district_images($value)
    {
          $query = $this->db->query("select * FROM district_images where d_id=$value");
       
        return $query->result_array();
        
        
    } 
	function deletedistrictimage($value)
    {
          $query = $this->db->query("DELETE FROM district_images WHERE dis_id=$value");
       
        return 1;
        
        
    } 
	
	 function getdistrictimagefull()
    {
         
		
		
        $this->db->select('district_images.*,district.dis_name');
	    $this->db->from('district_images');
	     $this->db->join('district','district.district_id = district_images.dis_id');
		
		 	$this->db->where('district_images.status ',1);
		$query = $this->db->get();
		$row = $query->result_array(); 
		return $row;
        
    } 

	/////////////////////////////dlete images/////////////////////
	
	
	function deletehomeimageedit($value)
    {
          $query = $this->db->query("DELETE FROM home_images WHERE home_id=$value");
       
        return 1;
        
        
    }
	function deletelocationimageedit($value)
    {
          $query = $this->db->query("DELETE FROM  loc_images WHERE img_id=$value");
       
        return 1;
        
        
    }
	function deletegallaryimageedit($value)
    {
          $query = $this->db->query("DELETE FROM  gallary_images WHERE gal_id=$value");
       
        return 1;
        
        
    } 
	    public function checkmail($params)
    {
        $query = $this->db->query("SELECT user_name,user_id from user_profile WHERE  user_name='$params'");
        return $query->result_array();
        
    }
	
	 public function insert_token($token, $user)
    {
        $query = $this->db->query("INSERT INTO token (token,user_id)
              VALUES ('$token',$user) ");
        // echo $this->db->last_query();
        return 1;
        
    }
	
	
	
	 function user_pass_rest($str, $pass, $user)
    {
        $query = $this->db->query(" UPDATE user_profile u
        JOIN token t ON t.user_id = u.user_id
        SET u.password='$pass',t.status=0
        WHERE u.user_id=$user
                      ");
        // echo $this->db->last_query();exit;
        return 1;
    }
    function delete_token($user)
    {
        $query = $this->db->query(" DELETE from token where user_id=$user");
        //  echo $this->db->last_query();exit;
        return 1;
    } 
	
	 function getstate($field, $value) {


        $this->db->where('countries.' . $field,$value);
        $this->db->where('states.status','1');
        $this->db->join('countries', 'countries.id=states.country_id');

      //  $this->db->order_by($orderby);
        $query = $this->db->get('states');//echo $this->db->last_query();exit;
// $this->db->where('location_detail.staus', 1);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

	function getcity($field, $value) {


        $this->db->where('states.' . $field,$value);
        $this->db->where('cities.status','1');
        $this->db->join('states', 'states.s_id=cities.state_id');

      //  $this->db->order_by($orderby);
        $query = $this->db->get('cities');//echo $this->db->last_query();exit;
// $this->db->where('location_detail.staus', 1);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
	
	
	
	
	
	function get_location_list()
    {
      
    
		
		
		
		
		
		
		
		
		
		
		
		
		
		$this->db->select('location.*,locationimage.*, file.*,cities.*,address.*');
	    $this->db->from('location');
	     $this->db->join('locationimage','locationimage.location = location.id');
		  $this->db->join('file','file.id =  locationimage.file');
		   $this->db->join('address','address.id =  location.locationaddress');
	 $this->db->join('cities','cities.c_id =  address.city');
	
		 	$this->db->where('location.status',1);
		$query = $this->db->get();
		$row = $query->result_array(); 
		return $row;
		
		
		
		
		
		
		
		
		
		
		
		
    } 
	
	function get_package_list()
    {
      
    
		
		$this->db->select('package.*,package.package as pc,package.id as pcid,file.*');
	    $this->db->from('package');
	 //  $this->db->join('packageimage','packageimage.package = package.id');
		$this->db->join('file','package.thumbnailimage=file.id');
	
		 //	$this->db->where('package.status',1);
		$query = $this->db->get();
		$row = $query->result_array(); 
		return $row;
		
	
		
    }
	
	
	 function getlocationfull()
    {
         
		
		
        $this->db->select('location.*,address.*,cities.*,states.*');
	    $this->db->from('location');
		$this->db->join('address','location.locationaddress = address.id');
		$this->db->join('cities','address.city = cities.c_id');
	    

		$this->db->join('states','states.s_id = cities.state_id');
		
		 	$this->db->where('cities.status ',1);
			$query= $this->db->get();
    	return $query->result_array();
        
		
		 $this->db->join('address','address.id =  location.locationaddress');
	   $this->db->join('cities','cities.c_id =  address.city');
		 $this->db->where('cities.c_id',$dis);
		
		
    } 

	 function get_package_details($dis)
    {
      
    
	/*	   $query = $this->db->query("SELECT 
    PACKAGE.*, group_concat(DISTINCT PACKFILE.imagepath order by PACKFILE.imagepath separator ',' ) AS packageImages,
    group_concat(DISTINCT LOCFILE.imagepath order by LOCFILE.imagepath separator ',' ) AS locationImages,
    group_concat(DISTINCT LOCAMENITIES.name order by LOCAMENITIES.name separator ',' ) AS locstionamineties, 
    group_concat(DISTINCT PACKAMENITIES.name order by PACKAMENITIES.name separator ',' ) AS packaageamineties 
    FROM `package` AS PACKAGE 
    LEFT JOIN packageimage AS PACKIMAGE ON PACKIMAGE.package = PACKAGE.id 
    LEFT JOIN file AS PACKFILE ON  PACKFILE.id = PACKIMAGE.file 
    LEFT JOIN location AS LOC ON LOC.id=PACKAGE.location 
    LEFT JOIN address AS ADDRESS ON ADDRESS.id = LOC.locationaddress 
    LEFT JOIN locationimage AS LOCIMAGE ON LOCIMAGE.location = LOC.id 
    LEFT JOIN file AS LOCFILE ON LOCFILE.id = LOCIMAGE.id 
    LEFT JOIN locationamenities AS LOCAMENITIESMAP ON LOCAMENITIESMAP.location = LOC.id LEFT JOIN amenities AS LOCAMENITIES ON LOCAMENITIES.id =  LOCAMENITIESMAP.amenities LEFT JOIN packageamenities AS PACKMENITIESMAP ON  PACKMENITIESMAP.package = PACKAGE.id 
    LEFT JOIN amenities AS PACKAMENITIES ON PACKAMENITIES.id =  PACKMENITIESMAP.amenities");
       
        return $query->result_array();
		*/
		
		
			
		$this->db->select('package.*,package.id as packid,location.*,address.*,cities.*,file.* ');
	    $this->db->from('package');
		
			   $this->db->join('cities','cities.c_id =  package.location');
			    $this->db->join('address','address.city =  cities.c_id');
	   $this->db->join('location','address.id =  location.locationaddress');
	 

	  //  $this->db->join('packageimage','packageimage.package = package.id');
		  $this->db->join('file','file.id =  package.thumbnailimage');
	 
	    $this->db->where('cities.c_id',$dis);
		$query = $this->db->get();  
		$row = $query->result_array();// echo $this->db->last_query();exit;
		return $row;
		
	
		
    } 

	function get_all_package_details($dis)
    {
      
    /*
		
		$this->db->select('package.*,package.id as packid,location.*,address.*,cities.*,file.*');
	    $this->db->from('package');
	 // 
	
	   $this->db->join('cities','cities.c_id =  package.location','left');
	     $this->db->join('address','address.city =  cities.c_id');
	 $this->db->join('location','location.locationaddress =  address.id');
$this->db->join('file','file.id =  package.thumbnailimage');

	//    $this->db->join('packageimage','packageimage.package = package.id','left');
		//  $this->db->join('file','file.id =  packageimage.file');
	 
	    $this->db->where('package.id',$dis);
		$query = $this->db->get();  
		$row = $query->result_array();// echo $this->db->last_query();exit;
		return $row;
		*/
		
		
		 $query = $this->db->query("SELECT 
    PACKAGE.*, group_concat(DISTINCT PACKFILE.imagename order by PACKFILE.imagename separator ',' ) AS packageImages,
    group_concat(DISTINCT LOCFILE.imagepath order by LOCFILE.imagepath separator ',' ) AS locationImages,
    group_concat(DISTINCT LOCAMENITIES.name order by LOCAMENITIES.name separator ',' ) AS locstionamineties, 
    group_concat(DISTINCT PACKAMENITIES.name order by PACKAMENITIES.name separator ',' ) AS packaageamineties 
    FROM `package` AS PACKAGE 
    LEFT JOIN packageimage AS PACKIMAGE ON PACKIMAGE.package = PACKAGE.id 
    LEFT JOIN file AS PACKFILE ON  PACKFILE.id = PACKIMAGE.file 
    LEFT JOIN location AS LOC ON LOC.id=PACKAGE.location 
    LEFT JOIN address AS ADDRESS ON ADDRESS.id = LOC.locationaddress 
    LEFT JOIN locationimage AS LOCIMAGE ON LOCIMAGE.location = LOC.id 
    LEFT JOIN file AS LOCFILE ON LOCFILE.id = LOCIMAGE.id 
    LEFT JOIN locationamenities AS LOCAMENITIESMAP ON LOCAMENITIESMAP.location = LOC.id LEFT JOIN amenities AS LOCAMENITIES ON LOCAMENITIES.id =  LOCAMENITIESMAP.amenities LEFT JOIN packageamenities AS PACKMENITIESMAP ON  PACKMENITIESMAP.package = PACKAGE.id 
    LEFT JOIN amenities AS PACKAMENITIES ON PACKAMENITIES.id =  PACKMENITIESMAP.amenities");
       
        return $query->result_array();
	
		
    }	function get_all_location_details($dis)
    {
      
	  
	  
	  
    
		
		$this->db->select('location.*,  locationimage.*,address.address_line1,address.address_line2,address.city,address.state,address.postalcode,address.country,cities.*,states.*,countries.*,locationimage.*,file.*,locationtent.*,countries.id as contid');
	    $this->db->from('location');
	     $this->db->join('address','address.id =  location.locationaddress','left');
		  $this->db->join('cities','cities.c_id =  address.city','inner');
		    $this->db->join('states','states.s_id =  cities.state_id','inner');
			   $this->db->join('countries','countries.id =  states.country_id','inner');
$this->db->join('locationimage','locationimage.location =  location.id');

	  $this->db->join('file','file.id =  locationimage.file');
 $this->db->join('locationtent','location.id =  locationtent.locationid');









	    $this->db->where('cities.c_id',$dis);
		$query = $this->db->get();  
		$row = $query->result_array();// echo $this->db->last_query();exit;
		return $row;
		
	
		
    } 
	
	
	
		function deletelocation($value)
    {
          $query = $this->db->query("DELETE FROM  locationtent WHERE locationid=$value");
       
   $query = $this->db->query("DELETE FROM   locationimage WHERE location=$value");   
   $query = $this->db->query("DELETE FROM    locationamenities WHERE location=$value");    
 $query = $this->db->query("DELETE FROM    location WHERE id=$value");    
    return 1;
        
        
    } 
	
	
	 function get_all_pac() {

	
		$this->db->select('location.*,address.*,cities.*');
	    $this->db->from('location');
	       $this->db->join('address','address.id =  location.locationaddress');
	 $this->db->join('cities','cities.c_id =  address.city');
	
		 	$this->db->where('location.status',1);
		$query = $this->db->get();
		$row = $query->result_array(); 
		return $row;
		
    }
	
	function deleteamni($amm)
    {
          $query = $this->db->query("DELETE FROM  locationamenities WHERE location=$amm");
       
        return 1;
        
        
    }
	function deleteloctent($amm)
    {
          $query = $this->db->query("DELETE FROM  locationtent  where locationid=$amm");
       
        return 1;
        
        
    }
	function get_slider_pack($amm)
    {
       	$this->db->select('packagesliderimage.*,file.*');
	    $this->db->from('packagesliderimage');
	       $this->db->join('file','packagesliderimage.imageid =  file.id');
	 
		 	$this->db->where('packagesliderimage.packageid',$amm);
		$query = $this->db->get();
		$row = $query->result_array(); 
		return $row;
        
        
    }
	function get_home_pack($amm)
    {
       	$this->db->select('packageimage.*,file.*');
	    $this->db->from('packageimage');
	       $this->db->join('file','packageimage.file =  file.id');
	 
		 	$this->db->where('packageimage.package',$amm);
		$query = $this->db->get();
		$row = $query->result_array(); 
		return $row;
        
        
    }
	
	
	
	
	
	function get_thumb_pack($amm)
    {
       	$this->db->select('package.*,file.*');
	    $this->db->from('package');
	       $this->db->join('file','package.thumbnailimage =  file.id');
	 
		 	$this->db->where('package.id',$amm);
		$query = $this->db->get();
		$row = $query->result_array(); 
		return $row;
        
        
    }
	
	
}
