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
      
    
		
		
		
		
		
		
		
		
		
		
		
		
		
		$this->db->select('location.*,locationimage.*, file.*');
	    $this->db->from('location');
	     $this->db->join('locationimage','locationimage.location = location.id');
		  $this->db->join('file','file.id =  locationimage.file');
	
		 	$this->db->where('location.status',1);
		$query = $this->db->get();
		$row = $query->result_array(); 
		return $row;
		
		
		
		
		
		
		
		
		
		
		
		
    } 
	
	
}
