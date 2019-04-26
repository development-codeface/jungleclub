<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller

	{
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public

	function __construct()
		{
		parent::__construct();
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("");
		$this->load->model('Users_model', 'obj_model', TRUE);
		$this->load->library('session');
		$this->load->library(array(
			'upload',
			'form_validation',
			'Facebook'
		));
		$this->load->library(array(
			'session',
			'upload',
			'form_validation',
			'Facebook'
		));
		$this->load->library('upload');
		$this->load->helper('array');
		$this->load->helper(array(
			'form',
			'url'
		));
		$this->load->database();
		}

	public

	function index()
		{

		//	$data['district'] =  $this->obj_model->get_table('district',array('status' => '0'));
		//	 $this->load->view("user/public-profile-search", $this->data);
		//	 $data['home_image']        = $this->obj_model->gethomeimagefull();
		//  $data['district_image']        = $this->obj_model->getdistrictimagefull();
		//	$this->load->view('home',$data);

		$data['district'] = $this->obj_model->getlocationfull();
		$data['location'] = $this->obj_model->getlocationimg();
		$data['package'] = $this->obj_model->getpackageimg();
		//print_r($data['package']);exit;
		$data['authURL'] = $this->facebook->login_url();
		$this->load->view('home', $data);
		}

	public

	function register()
		{
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$email = $this->input->post('emailids');
		$mobile = $this->input->post('mobile');
		$pass = $this->input->post('password');
		$password = md5($pass);
		$usertype = 3;

		// echo $fname; echo $lname; echo $email; echo $mobile; echo $pass;exit;

		$result_data = $this->obj_model->register($fname, $lname, $email, $mobile, $password, $usertype);
		$user_id = $result_data;

		// $this->session->set_userdata('user_id',$result_data);

		$data['userphoto'] = $this->obj_model->get_userphoto($result_data);
		$this->session->set_userdata('user_id', $result_data);
		$data['userinfo'] = $this->obj_model->get_userdetails_register($result_data);

		// print_r($data);exit;

		$this->load->view('user/dasboard', $data);
		}

	public

	function login()
		{
		if (isset($_POST['fr']))
			{
			$name = $this->input->post("email");
			$pass = $this->input->post("password");
			$password = md5($pass);

			//    $pass    = $this->input->post('pass');
			//	  $name    = $this->input->post('name');

			$check = $this->obj_model->get_userdata($name, $password);
			foreach($check as $vals)
				{
				$user_role = $vals->usertype;
				}

			if (!$check || $check == FALSE)
				{
				$this->session->set_flashdata('err_msg', 'Incorrect Username/Password');
				redirect(base_url());
				}
			  else
			if ($user_role == 3)
				{
				foreach($check as $res_user)
					{

					//	echo "sdfgsggs";exit;
					// $userid=$res_user->user_id;

					$username = $res_user->email;
					$user_id = $res_user->id;

					//	echo "sdfsdffsdf";exit;
					// $this->session->set_userdata("user_id",$userid);
					// $a=	$this->session->set_userdata("username",$username);
					//	$b=	$this->session->set_userdata("user_id",$user_id);
					//	$session_data = array(
					//	'username' => $res_user->user_name,
					//	'id' => $res_user->user_id
					// /	);
					// $uid = $this->session->userdata('username');

					$this->session->set_userdata('user_name', $res_user->email);
					$this->session->set_userdata('user_id', $res_user->id);
					}

				$data['userphoto'] = $this->obj_model->get_userphoto($res_user->id);

				// print_r($data);

				$data['userinfo'] = $this->obj_model->get_userdetails($res_user->id);

				//	print_r($data);exit;

				$this->load->view('user/dasboard', $data);
				}
			  else
			if ($user_role == 1)
				{
				foreach($check as $res_user)
					{

					//	echo "sdfgsggs";exit;
					// $userid=$res_user->user_id;

					$username = $res_user->email;
					$user_id = $res_user->id;

					//	echo "sdfsdffsdf";exit;
					// $this->session->set_userdata("user_id",$userid);
					// $a=	$this->session->set_userdata("username",$username);
					//	$b=	$this->session->set_userdata("user_id",$user_id);
					//	$session_data = array(
					//	'username' => $res_user->user_name,
					//	'id' => $res_user->user_id
					// /	);
					// $uid = $this->session->userdata('username');

					//$this->session->set_userdata('user_name', $res_user->email);
					//$this->session->set_userdata('user_id', $res_user->id);
					}

				//	$data['list'] = $this->obj_model->get_location_list();
				//	$data['userphoto']=$this->obj_model->get_userphoto($res_user->id);
				// print_r($data);
				//	$data['userinfo']=$this->obj_model->get_userdetails($res_user->id);
				//	print_r($data);exit;

				$data['location'] = $this->obj_model->getlocationfull();
				$data['details'] = $this->obj_model->oderfulldetailsadmin();
				$month = date('m');
				$data['resultall'] = $this->obj_model->searchmonthresultnow($month);

				// 	$data['totalbooking']        = $this->obj_model->totalbooking();
				// 	$data['totalorder']        = $this->obj_model->totalorder();
				// $data['totaluser']        = $this->obj_model->totaluser();
				//  $data['newbook']        = $this->obj_model->newbook($month);

				$this->load->view('admin/main', $data);
				}
			  else
				{
				foreach($check as $res_user)
					{

					// $userid=$res_user->user_id;

					$username = $res_user->email;
					$user_id = $res_user->id;

					// $this->session->set_userdata("user_id",$userid);
					// $a=	$this->session->set_userdata("username",$username);
					//	$b=	$this->session->set_userdata("user_id",$user_id);
					//	$session_data = array(
					//	'username' => $res_user->user_name,
					//	'id' => $res_user->user_id
					// /	);
					// $uid = $this->session->userdata('username');

					$this->session->set_userdata('user_name', $res_user->email);
					$this->session->set_userdata('user_id', $res_user->id);
					}

				$data['booking'] = $this->obj_model->get_booking_detail();

				// print_r($data['sub_category']);exit;
				// $this->load->view($this->list_adverisements,$data);

				$this->load->view('admin/index', $data);
				}
			}
		}

	public

	function getSubCategory()
		{
		$district_id = $_POST['cat_id'];
		$sections = $this->obj_model->getSubCategory('district_id', $district_id);
		$str = '<option value="">Select</option>';
		if ($sections)
			{
			foreach($sections as $row)
				{
				$msg = '';
				$str = $str . '<option value="' . $row['detail_id'] . '"' . $msg . '>' . $row['loc_name'] . '</option>';
				}
			}

		echo json_encode($str);
		}

	public

	function detail_loc()
		{
		$this->session->unset_userdata('no_persons');
		$this->session->unset_userdata('no_tents');
		$this->session->unset_userdata('froms');
		$this->session->unset_userdata('tos');
		$this->session->unset_userdata('no_tent_avails');
		$this->session->unset_userdata('no_tent_avails');
		$this->session->unset_userdata('tent_rates');
		$this->session->unset_userdata('allowed_persons');
		$urlloc_id = $this->uri->segment(3);
		$district_id = $this->input->post('district_id');
		if ($district_id != null)
			{
			$loc_id = $this->input->post('location_id');

			// $district_id		=	$_POST['dis_id'];
			//	$loc_id		=	$_POST['loc_id'];
			// print_r($data);
			// $this->load->view('detail');

			$this->data['details'] = $this->obj_model->getlocdetail($loc_id);
			$this->data['gallery'] = $this->obj_model->getlocgallery($loc_id);
			$this->data['loc_image'] = $this->obj_model->getlocimage($loc_id);

			// $this->data['loc_image'] $this->data['loc_image']print_r( $this->data['loc_image']);exit;

			$this->data['home_image'] = $this->obj_model->gethomeimage($loc_id);

			//  print_r( $this->data['home_image'] );exit;

			$this->load->view("detail", $this->data);
			}
		  else
		if ($urlloc_id != null)
			{
			$this->data['details'] = $this->obj_model->getlocdetail($urlloc_id);
			$this->data['gallery'] = $this->obj_model->getlocgallery($urlloc_id);
			$this->data['loc_image'] = $this->obj_model->getlocimage($urlloc_id);

			// $this->data['loc_image'] $this->data['loc_image']print_r( $this->data['loc_image']);exit;

			$this->data['home_image'] = $this->obj_model->gethomeimage($urlloc_id);

			//  print_r( $this->data['home_image'] );exit;

			$this->load->view("detail", $this->data);
			}
		  else
			{
			redirect(base_url());
			}
		}

	public

	function signout()
		{

		//	$this->session->unset_userdata($array_items);

		$this->session->sess_destroy();
		redirect(base_url());
		}

	public

	function booking_confirmss()
		{
		$user_id = $this->session->userdata('user_id');
		$this->data['user_id'] = $user_id;
		$this->data['loc_id'] = $this->input->post('loc_id');
		$lo = $this->input->post('loc_id');
		$this->data['first_name'] = $this->input->post('firstname');
		$this->data['last_name'] = $this->input->post('lastname');
		$this->data['address'] = $this->input->post('address');
		$this->data['state/country'] = $this->input->post('statecountry');
		$this->data['city'] = $this->input->post('towncity');
		$this->data['pin'] = $this->input->post('postcode');
		$this->data['email'] = $this->input->post('email');
		$this->data['mobile'] = $this->input->post('phonename');
		$this->data['addinfo'] = $this->input->post('additional');
		$this->data['check_in'] = $this->input->post('datepicker-12');
		$this->data['check_out'] = $this->input->post('datepicker-13');
		$this->data['no_tents'] = $this->input->post('no_tent');
		$this->data['no_pesrson'] = $this->input->post('quantity');
		$this->data['tot_amount'] = $this->input->post('tot');

		// print_r($this->data);exit;

		$this->obj_model->Insert_tbl('booking_details', $this->data);

		// //////////////maillllllllllllllllll/////////////////////////////////////////////
		// /mailend//////////////////////////////////////
		// //////////////////////////////////

		$toEmail = $this->input->post('email');
		$this->load->library('email');
		$config = Array(
			'protocol' => 'MAIL_DRIVER',
			'MAIL_HOST' => 'mail.codefacetech.com',
			'MAIL_PORT' => 26,
			'MAIL_USERNAME' => 'jungle@codefacetech.com',
			'MAIL_PASSWORD' => 'DpS]%E757#d*',
			'mailtype' => 'html',
			'charset' => 'utf-8'
		);
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
		$data['check_in'] = $this->input->post('in');
		$loname = $this->obj_model->locname($lo);

		// print_r($loname);exit;

		$data['locname'] = $loname;
		$data['first_name'] = $this->input->post('firstname');
		$data['last_name'] = $this->input->post('lastname');
		$data['address'] = $this->input->post('address');
		$data['state'] = $this->input->post('statecountry');
		$data['city'] = $this->input->post('towncity');
		$data['pin'] = $this->input->post('postcode');
		$data['email'] = $this->input->post('email');
		$data['mobile'] = $this->input->post('phonename');
		$data['addinfo'] = $this->input->post('additional');
		$data['check_in'] = $this->input->post('datepicker-12');
		$data['check_out'] = $this->input->post('datepicker-13');
		$data['no_tents'] = $this->input->post('no_tent');
		$data['no_pesrson'] = $this->input->post('quantity');
		$data['tot_amount'] = $this->input->post('tot');
		$data['check_out'] = $this->input->post('out');
		$mesg = $this->load->view('mail', '$data', true);
		$message = '';
		$message = " jungle test";

		// $toEmail = $this->input->post('reemail');

		$to = $toEmail; // undefine
		$this->email->clear();
		$this->email->from('jungle@codefacetech.com');
		$this->email->to($toEmail);
		$this->email->subject("fghfg");
		$this->email->message($mesg);
		if (!$this->email->send())
			{
			echo "fail <br />";
			echo $this->email->print_debugger();
			/*$this->session->set_flashdata('flash_message', 'Password reset fail.');
			redirect(site_url().'/main/register');*/
			}

		// ////////////////////////////
		//	$this->load->view('user/dasboard',$data);

		$this->load->view('mail', $data);

		//  $this->data['details']        = $this->obj_model->getlocdetail($loc_id);
		//   $this->load->view("detail", $this->data);

		}

	public

	function destination()
		{
		$loc_id = $this->uri->segment('3');

		// $district_id		=	 $this->obj_model->district_id($loc_id);
		//   foreach($district_id as $val)
		//  {
		//		$dis=$val->district_id;
		//   }

		$this->data['details'] = $this->obj_model->getlocdetail($loc_id);
		$this->load->view("detail", $this->data);
		}

	public

	function edit_profile()
		{
		$user_id = $this->session->userdata('user_id');
		if ($user_id != null)
			{
			$data['userinfo'] = $this->obj_model->get_userdetails($user_id);
			$userinfo = $this->obj_model->get_userdetails($user_id);

			// print_r($userinfo);

			foreach($userinfo as $us)
				{
				$data['add'] = $us->addressid;
				}

			$data['userphoto'] = $this->obj_model->get_userphoto($user_id);

			// echo $ad;exit;

			$data['countries'] = $this->obj_model->get_table('countries', array(
				'status' => '1'
			));

			//	print_r($data);

			$this->load->view('user/edit_profile', $data);
			}
		  else
			{
			redirect(base_url());
			}
		}

	public

	function update_user()
		{
		$city = $this->input->post('city');

	

		$user_id = $this->session->userdata('user_id');
		if ($user_id != null)
			{
				
			$first_name = $this->input->post('firstname');
			$last_name = $this->input->post('lastname');
			$email = $this->input->post('email');
			$mobile = $this->input->post('phonename');
			$addid = $this->input->post('addid');
			$address1 = $this->input->post('address1');
			$address2 = $this->input->post('address2');
			$country = $this->input->post('country');
			$state = $this->input->post('state');
			$city = $this->input->post('city');
			$pin = $this->input->post('postcode');

			// echo $address1;	echo $address2;	echo $country;	echo $state;	echo $city;echo $pin;

			if ($addid == 0)
				{
					
				$this->add['address_line1'] = $address1;
				$this->add['address_line2'] = $address2;
				$this->add['postalcode'] = $pin;

				// $this->data['noperson']    = $this->input->post('noperson');

				$this->add['country'] = $country;
				$this->add['state '] = $state;
				$this->add['city '] = $city;

			//	echo "gyu";exit;

				$ins_id = $this->obj_model->Insert_tbl('address', $this->add);
				}
			  else
				{
				$user_items = array(
					'address_line1' => $address1,
					'address_line2' => $address2,
					'postalcode' => $pin,
					'country' => $country,
					'state' => $state,
					'city' => $city
				);
				$ins_id = $addid;
				$this->obj_model->common_update($addid, "id", "address", $user_items);
				}

			// $data['userinfo']=$this->obj_model->get_userdetails($user_id);
			// print_r($data);
			//				$this->load->view('user/edit_profile',$data);
			//

			$user_item = array(
				'firstname' => $first_name,
				'lastname' => $last_name,
				'email' => $email,
				'mobile' => $mobile,
				'addressid' => $ins_id
			);
			$this->obj_model->common_update($user_id, "id", "users", $user_item);
			$user_ids = $this->session->userdata('user_id');
			$data['userinfo'] = $this->obj_model->get_userdetails($user_ids);

			// print_r($data);exit;
$data['userphoto'] = $this->obj_model->get_userphoto($user_id);
			$this->load->view('user/dasboard', $data);
			}
		  else
			{
			redirect(base_url());
			}
		}

	public

	function changepass()
		{
		$this->load->view('user/changepass');
		}

	public

	function dasboard()
		{
		$user_id = $this->session->userdata('user_id');
		$data['userphoto'] = $this->obj_model->get_userphoto($user_id);
		$data['userinfo'] = $this->obj_model->get_userdetails($user_id);

		// print_r($data);exit;

		$this->load->view('user/dasboard', $data);
		}

	public

	function UploadProfile()
		{
		$user_id = $this->session->userdata('user_id');
		$flag = 0;
		$file = $_FILES['photopro'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/profile_pic/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

		if ($flag == 1)
			{
			$chk = $this->obj_model->get_userphoto($user_id);
			if ($chk == null)
				{
				$this->img['imagename'] = $file_name;
				$this->img['imagepath'] = $file_destination;
				$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
				$this->usimg['profilepic'] = $file_id;
				$this->usimg['useid'] = $user_id;
				$file_id = $this->obj_model->Insert_tbl(' userprofile', $this->usimg);
				}
			  else
				{
				$fid = $this->obj_model->get_profilepic($user_id);

				// print_r($fid);exit;

				foreach($fid as $f)
					{
					$id = $f['profilepic'];
					}

				$user_item = array(
					'imagename' => $file_name,
					'imagepath' => $file_destination
				);
				$this->obj_model->common_update($id, "id", "file", $user_item);
				$user_items = array(
					'profilepic' => $id,
					'useid' => $user_id
				);
				$this->obj_model->common_update($user_id, "useid", "userprofile", $user_items);
				}

			//  $dat = $this->obj_model->updatephoto($user_id, $file_name);

			}

		$user_id = $this->session->userdata('user_id');
		$data['userphoto'] = $this->obj_model->get_userphoto($user_id);
		$data['userinfo'] = $this->obj_model->get_userdetails($user_id);
		$this->load->view('user/dasboard', $data);
		}

	public

	function logindetail()
		{
		$name = $this->input->post("email");
		$pass = $this->input->post("password");
		$password = md5($pass);

		//    $pass    = $this->input->post('pass');
		//	  $name    = $this->input->post('name');

		$check = $this->obj_model->get_userdata($name, $password);
		if ($check)
			{
			foreach($check as $res_user)
				{

				// $userid=$res_user->user_id;

				$username = $res_user->user_name;
				$user_id = $res_user->user_id;

				// $this->session->set_userdata("user_id",$userid);
				// $a=	$this->session->set_userdata("username",$username);
				//	$b=	$this->session->set_userdata("user_id",$user_id);
				//	$session_data = array(
				//	'username' => $res_user->user_name,
				//	'id' => $res_user->user_id
				// /	);
				// $uid = $this->session->userdata('username');

				$this->session->set_userdata('user_name', $res_user->user_name);
				$this->session->set_userdata('user_id', $res_user->user_id);
				}

			//	$data['userinfo']=$this->obj_model->get_userdetails($user_id);

			$this->data['no_person'] = $this->input->post('no_person');
			$this->data['no_tent'] = $this->input->post('no_tent');
			$this->data['from'] = $this->input->post('from');
			$this->data['to'] = $this->input->post('to');
			$this->data['loc_id'] = $this->input->post('loc_id');
			$this->data['no_tent_avail'] = $this->input->post('no_tent_avail');
			$this->data['tent_rate'] = $this->input->post('tent_rate');
			$this->data['allowed_person'] = $this->input->post('allowed_person');
			$this->session->set_userdata('no_persons', $this->data['no_person']);
			$this->session->set_userdata('no_tents', $this->data['no_tent']);
			$this->session->set_userdata('froms', $this->data['from']);
			$this->session->set_userdata('tos', $this->data['to']);
			$this->session->set_userdata('loc_ids', $this->data['loc_id']);
			$this->session->set_userdata('no_tent_avails', $this->data['no_tent_avail']);
			$this->session->set_userdata('tent_rates', $this->data['tent_rate']);
			$this->session->set_userdata('allowed_persons', $this->data['allowed_person']);
			$no_person = $this->session->userdata('no_persons');
			$no_tent = $this->session->userdata('no_tents');
			$from = $this->session->userdata('froms');
			$to = $this->session->userdata('tos');
			$loc_id = $this->session->userdata('loc_ids');
			$no_tent_avail = $this->session->userdata('no_tent_avails');
			$tent_rate = $this->session->userdata('tent_rates');
			$allowed_person = $this->session->userdata('allowed_persons');
			if (!empty($check))
				{
				echo json_encode(array(
					'status' => 1
				));
				}
			  else
				{
				echo json_encode(array(
					'status' => 0
				));
				}

			//	echo $no_person;echo $no_tent;echo $from;echo $to;echo $loc_id;echo $no_tent_avail;echo $tent_rate;echo $allowed_person;exit;
			//	$this->load->view('booking', $this->data);
			// print_r($data);
			//	$this->load->view('user/dasboard',$data);

			}
		}

	public

	function registerdetail()
		{
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$email = $this->input->post('email');
		$mobile = $this->input->post('mobile');
		$pass = $this->input->post('password');
		$password = md5($pass);
		$result_data = $this->obj_model->register($fname, $lname, $email, $mobile, $password);
		$user_id = $result_data;

		//	  $this->session->set_userdata('user_name',$res_user->user_name);

		$this->session->set_userdata('user_id', $user_id);

		//	$data['userinfo']=$this->obj_model->get_userdetails($user_id);
		// print_r($data);
		//	$data['userinfo']=$this->obj_model->get_userdetails($user_id);

		$this->data['no_person'] = $this->input->post('no_person');
		$this->data['no_tent'] = $this->input->post('no_tent');
		$this->data['from'] = $this->input->post('from');
		$this->data['to'] = $this->input->post('to');
		$this->data['loc_id'] = $this->input->post('loc_id');
		$this->data['no_tent_avail'] = $this->input->post('no_tent_avail');
		$this->data['tent_rate'] = $this->input->post('tent_rate');
		$this->data['allowed_person'] = $this->input->post('allowed_person');
		$this->session->set_userdata('no_persons', $this->data['no_person']);
		$this->session->set_userdata('no_tents', $this->data['no_tent']);
		$this->session->set_userdata('froms', $this->data['from']);
		$this->session->set_userdata('tos', $this->data['to']);
		$this->session->set_userdata('loc_ids', $this->data['loc_id']);
		$this->session->set_userdata('no_tent_avails', $this->data['no_tent_avail']);
		$this->session->set_userdata('tent_rates', $this->data['tent_rate']);
		$this->session->set_userdata('allowed_persons', $this->data['allowed_person']);
		$no_person = $this->session->userdata('no_persons');
		$no_tent = $this->session->userdata('no_tents');
		$from = $this->session->userdata('froms');
		$to = $this->session->userdata('tos');
		$loc_id = $this->session->userdata('loc_ids');
		$no_tent_avail = $this->session->userdata('no_tent_avails');
		$tent_rate = $this->session->userdata('tent_rates');
		$allowed_person = $this->session->userdata('allowed_persons');
		if (!empty($check))
			{
			echo json_encode(array(
				'status' => 1
			));
			}
		  else
			{
			echo json_encode(array(
				'status' => 0
			));
			}

		//	echo $no_person;echo $no_tent;echo $from;echo $to;echo $loc_id;echo $no_tent_avail;echo $tent_rate;echo $allowed_person;exit;
		//	$this->load->view('booking', $this->data);
		// print_r($data);
		//	$this->load->view('user/dasboard',$data);

		}

	public

	function select_login_details()
		{
		$this->load->view('booking');
		}

	public

	function checkmail()
		{
		$params = $this->input->post('email');
		$emailTest = $this->obj_model->checkEmail($params);
		if (!empty($emailTest))
			{
			echo json_encode(array(
				'status' => 1
			));
			}
		  else
			{
			echo json_encode(array(
				'status' => 0
			));
			}
		}

	public

	function admin()
		{

		// $data['booking'] = $this->obj_model->get_booking_detail();
		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$this->load->view('admin/index');
		}

	public

	function approvebook()
		{
		$user_id = $this->uri->segment(3);
		$result = $this->obj_model->update_approve($user_id);

		// echo $result;exit;

		$data['booking'] = $this->obj_model->get_booking_detail();

		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$this->load->view('admin/index', $data);
		}

	public

	function rejectbook()
		{
		$user_id = $this->uri->segment(3);
		$result = $this->obj_model->rejectapprove($user_id);

		// echo $user_id;exit;

		$data['booking'] = $this->obj_model->get_booking_detail();

		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$this->load->view('admin/index', $data);
		}

	public

	function deletebook()
		{
		$user_id = $this->uri->segment(3);
		$result = $this->obj_model->deletebook($user_id);

		// echo $user_id;exit;

		$data['booking'] = $this->obj_model->get_booking_detail();

		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$this->load->view('admin/index', $data);
		}

	public

	function addlocation()
		{

		//	$data['district'] =  $this->obj_model->get_table('district',array('status' => '0'));
		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$data['amenities'] = $this->obj_model->get_table(' amenities', array(
			'status' => '1'
		));

		// print_r($data);exit;

		$data['countries'] = $this->obj_model->get_table('countries', array(
			'status' => '1'
		));

		//	print_r($data);exit;

		$this->load->view('admin/addlocation', $data);
		}

	public

	function savelocationbk()
		{
		$this->data['district_id'] = $this->input->post('dis_id');

		//	$this->data['loc_name']   = $this->input->post('location');

		$this->data['no_tent'] = $this->input->post('notent');
		$this->data['tent_rate'] = $this->input->post('rate');

		// $this->data['noperson']    = $this->input->post('noperson');

		$this->data['allowed_person'] = $this->input->post('allowed');
		$this->data['gst '] = $this->input->post('gst');
		$this->data['map'] = $this->input->post('map');
		$this->data['overview'] = $this->input->post('overview');

		//	$this->load->view('admin/addlocation',$data);
		// $this->data['tot_amount']		=	 $this->input->post('totamt');

		$this->obj_model->Insert_tbl('location_detail', $this->data);
		$data['list'] = $this->obj_model->get_location_detail();

		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$this->load->view('admin/listlocation', $data);
		}

	public

	function dellocation()
		{
		$user_id = $this->uri->segment(3);
		$result = $this->obj_model->dellocation($user_id);

		// echo $user_id;exit;

		$data['booking'] = $this->obj_model->get_booking_detail();

		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$data['list'] = $this->obj_model->get_location_detail();

		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$this->load->view('admin/listlocation', $data);
		}

	public

	function editlocation()
		{
		$loc_id = $this->uri->segment(3);
		$data['locatindetail'] = $this->obj_model->get_locationdetail($loc_id);

		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$data['district'] = $this->obj_model->get_table('district', array(
			'status' => '0'
		));
		$data['loc_images'] = $this->obj_model->get_table('loc_images', array(
			'status' => '1'
		));
		$data['gallery'] = $this->obj_model->get_table('gallary_images', array(
			'status' => '1'
		));
		$data['home_image'] = $this->obj_model->get_table('home_images', array(
			'status' => '1'
		));

		// print_r($data);
		// $this->load->view($this->list_adverisements,$data);
		// $this->load->view('admin/addlocation',$data);

		$this->load->view('admin/editlocation', $data);
		}

	public

	function updatelocation()
		{
		$this->data['district_id'] = $this->input->post('dis_id');
		$this->data['loc_name'] = $this->input->post('location');
		$this->data['no_tent'] = $this->input->post('notent');
		$this->data['tent_rate'] = $this->input->post('rate');

		// $this->data['noperson']    = $this->input->post('noperson');

		$this->data['allowed_person'] = $this->input->post('allowed');
		$this->data['gst '] = $this->input->post('gst');
		$this->data['map'] = $this->input->post('map');
		$this->data['overview'] = $this->input->post('overview');

		//	$this->load->view('admin/addlocation',$data);
		// $this->data['tot_amount']		=	 $this->input->post('totamt');

		$district_id = $this->input->post('dis_id');
		$user_item = array(
			'loc_name' => $this->data['loc_name'],
			'no_tent' => $this->data['loc_name'],
			'tent_rate' => $this->data['tent_rate'],
			'allowed_person' => $this->data['allowed_person'],
			'gst' => $this->data['gst '],
			'map' => $this->data['map'],
			'overview' => $this->data['overview']
		);
		$this->obj_model->common_update($district_id, "district_id", "location_detail", $user_item);
		$data['list'] = $this->obj_model->get_location_detail();

		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$this->load->view('admin/listlocation', $data);
		}

	public

	function locationimage()
		{

		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$data['location'] = $this->obj_model->get_table('location_detail', array(
			'status' => '1'
		));
		$this->load->view('admin/locationimage', $data);
		}

	public

	function uploadlocimage()
		{
		$loc_id = $this->input->post('loc_id');
		$flag = 0;
		$file = $_FILES['img'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width0, $height0) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width0 == 1900 && $height0 == 948)
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/locationslider/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updatelocphoto($loc_id, $file_name);
					}

				$this->session->set_flashdata('msglo1', '<div class="alert alert-success text-center">uploaded sucessfully</div>');
				}
			  else
				{
				$this->session->set_flashdata('msglo1', '<div class="alert alert-success text-center">height and width must be 1900px x 948px</div>');
				$data['location'] = $this->obj_model->get_table('location_detail', array(
					'status' => '1'
				));
				$this->load->view('admin/locationimage', $data);
				}

			$data['location'] = $this->obj_model->get_table('location_detail', array(
				'status' => '1'
			));
			$this->load->view('admin/locationimage', $data);
			}

		// /////////////////////////////////

		$flag = 0;
		$file = $_FILES['img2'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width0, $height0) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width0 == 1900 && $height0 == 948)
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/locationslider/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updatelocphoto($loc_id, $file_name);
					}

				$this->session->set_flashdata('msglo2', '<div class="alert alert-success text-center">uploaded sucessfully</div>');
				}
			  else
				{
				$this->session->set_flashdata('msglo2', '<div class="alert alert-success text-center">height and width not matched for image2</div>');
				$data['location'] = $this->obj_model->get_table('location_detail', array(
					'status' => '1'
				));
				$this->load->view('admin/locationimage', $data);
				}

			$data['location'] = $this->obj_model->get_table('location_detail', array(
				'status' => '1'
			));
			$this->load->view('admin/locationimage', $data);
			}

		// ////////////////////////////

		$flag = 0;
		$file = $_FILES['img3'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width0, $height0) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width0 == 1900 && $height0 == 948)
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/locationslider/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updatelocphoto($loc_id, $file_name);
					}

				$this->session->set_flashdata('msglo3', '<div class="alert alert-success text-center">uploaded sucessfully</div>');
				}
			  else
				{
				$this->session->set_flashdata('msglo3', '<div class="alert alert-success text-center">height and width not matched for image3</div>');
				$data['location'] = $this->obj_model->get_table('location_detail', array(
					'status' => '1'
				));
				$this->load->view('admin/locationimage', $data);
				}

			$data['location'] = $this->obj_model->get_table('location_detail', array(
				'status' => '1'
			));
			$this->load->view('admin/locationimage', $data);
			}

		$data['location'] = $this->obj_model->get_table('location_detail', array(
			'status' => '1'
		));
		$this->load->view('admin/locationimage', $data);
		$this->session->set_flashdata('msgno', '<div class="alert alert-success text-center">please select the image</div>');
		}

	public

	function uploadgallimage()
		{
		$loc_id = $this->input->post('locs_id');

		// echo $loc_id;exit;

		$flag = 0;
		$file = $_FILES['i1'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width0, $height0) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width0 == 401 && $height0 == 285)
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/locationgallery/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updategallaryphoto($loc_id, $file_name);
					}

				$this->session->set_flashdata('msggal1', '<div class="alert alert-success text-center">uploaded sucessfully</div>');
				$data['location'] = $this->obj_model->get_table('location_detail', array(
					'status' => '1'
				));
				$this->load->view('admin/locationimage', $data);
				}
			  else
				{
				$this->session->set_flashdata('msggal1', '<div class="alert alert-success text-center">height and width must be 401px x 285px</div>');
				$data['location'] = $this->obj_model->get_table('location_detail', array(
					'status' => '1'
				));
				$this->load->view('admin/locationimage', $data);
				}
			}

		// /////////////////////////////////

		$flag = 0;
		$file = $_FILES['i2'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width1, $height1) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width0 == 401 && $height0 == 285)
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/locationgallery/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updategallaryphoto($loc_id, $file_name);
					}

				$this->session->set_flashdata('msggal2', '<div class="alert alert-success text-center">uploaded sucessfully</div>');
				$data['location'] = $this->obj_model->get_table('location_detail', array(
					'status' => '1'
				));
				$this->load->view('admin/locationimage', $data);
				}
			  else
				{
				$this->session->set_flashdata('msggal2', '<div class="alert alert-success text-center">height and width must be 401px x 285px</div>');
				$data['location'] = $this->obj_model->get_table('location_detail', array(
					'status' => '1'
				));
				$this->load->view('admin/locationimage', $data);
				}
			}

		// ////////////////////////////

		$flag = 0;
		$file = $_FILES['i3'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width2, $height2) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width0 == 401 && $height0 == 285)
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/locationgallery/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updategallaryphoto($loc_id, $file_name);
					}

				$this->session->set_flashdata('msggal3', '<div class="alert alert-success text-center">uploaded sucessfully</div>');
				$data['location'] = $this->obj_model->get_table('location_detail', array(
					'status' => '1'
				));
				$this->load->view('admin/locationimage', $data);
				}
			  else
				{
				$this->session->set_flashdata('msggal3', '<div class="alert alert-success text-center">height and width must be 401px x 285px</div>');
				$data['location'] = $this->obj_model->get_table('location_detail', array(
					'status' => '1'
				));
				$this->load->view('admin/locationimage', $data);
				}
			}

		$flag = 0;
		$file = $_FILES['i4'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width3, $height3) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width0 == 401 && $height0 == 285)
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/locationgallery/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updategallaryphoto($loc_id, $file_name);
					}

				$this->session->set_flashdata('msggal4', '<div class="alert alert-success text-center">uploaded sucessfully</div>');
				$data['location'] = $this->obj_model->get_table('location_detail', array(
					'status' => '1'
				));
				$this->load->view('admin/locationimage', $data);
				}
			  else
				{
				$this->session->set_flashdata('msggal4', '<div class="alert alert-success text-center">height and width must be 401px x 285px</div>');
				$data['location'] = $this->obj_model->get_table('location_detail', array(
					'status' => '1'
				));
				$this->load->view('admin/locationimage', $data);
				}
			}

		// /////////////////////////////////

		$flag = 0;
		$file = $_FILES['i5'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width4, $height4) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width0 == 401 && $height0 == 285)
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/locationgallery/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updategallaryphoto($loc_id, $file_name);
					}

				$this->session->set_flashdata('msggal5', '<div class="alert alert-success text-center">uploaded sucessfully</div>');
				$data['location'] = $this->obj_model->get_table('location_detail', array(
					'status' => '1'
				));
				$this->load->view('admin/locationimage', $data);
				}
			  else
				{
				$this->session->set_flashdata('msggal5', '<div class="alert alert-success text-center">height and width must be 401px x 285px</div>');
				$data['location'] = $this->obj_model->get_table('location_detail', array(
					'status' => '1'
				));
				$this->load->view('admin/locationimage', $data);
				}
			}

		// ////////////////////////////

		$flag = 0;
		$file = $_FILES['i6'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width5, $height5) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width0 == 401 && $height0 == 285)
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/locationgallery/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updategallaryphoto($loc_id, $file_name);
					}

				$this->session->set_flashdata('msggal6', '<div class="alert alert-success text-center">uploaded sucessfully</div>');
				$data['location'] = $this->obj_model->get_table('location_detail', array(
					'status' => '1'
				));
				$this->load->view('admin/locationimage', $data);
				}
			  else
				{
				$this->session->set_flashdata('msggal6', '<div class="alert alert-success text-center">height and width must be 401px x 285px</div>');
				$data['location'] = $this->obj_model->get_table('location_detail', array(
					'status' => '1'
				));
				$this->load->view('admin/locationimage', $data);
				}
			}

		$this->session->set_flashdata('msggalno', '<div class="alert alert-success text-center">please select the image</div>');
		$data['location'] = $this->obj_model->get_table('location_detail', array(
			'status' => '1'
		));
		$this->load->view('admin/locationimage', $data);
		}

	public

	function uploadhomesliderimage()
		{
		$loc_id = $this->input->post('lochome_id');
		$flag = 0;
		$file = $_FILES['imghome'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width, $height) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width == 401 && $height == 245)
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/homeslider/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updatehomesliderphoto($loc_id, $file_name);
					}

				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">uploaded sucessfully</div>');
				$data['location'] = $this->obj_model->get_table('location_detail', array(
					'status' => '1'
				));
				$this->load->view('admin/locationimage', $data);
				}
			  else
				{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">height and width must be 401px x 245 </div>');
				$data['location'] = $this->obj_model->get_table('location_detail', array(
					'status' => '1'
				));
				$this->load->view('admin/locationimage', $data);
				}
			}

		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">please select the image</div>');
		$data['location'] = $this->obj_model->get_table('location_detail', array(
			'status' => '1'
		));
		$this->load->view('admin/locationimage', $data);
		}

	public

	function updatehomesliderimage()
		{
		$loc_id = $this->input->post('lochoid');
		$flag = 0;
		$file = $_FILES['imgho'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width, $height) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width <= 500 && $height <= 400)
				{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">height and width not matched</div>');
				$data['list'] = $this->obj_model->get_location_detail();

				// print_r($data['sub_category']);exit;
				// $this->load->view($this->list_adverisements,$data);

				$this->load->view('admin/listlocation', $data);
				}
			  else
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/homeslider/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updatehomesliderimage($loc_id, $file_name);
					}
				}

			$data['list'] = $this->obj_model->get_location_detail();

			// print_r($data['sub_category']);exit;
			// $this->load->view($this->list_adverisements,$data);

			$this->load->view('admin/listlocation', $data);
			}

		$data['list'] = $this->obj_model->get_location_detail();

		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$this->load->view('admin/listlocation', $data);
		}

	public

	function updateuploadlocimage()
		{
		$loc_id1 = $this->input->post('l1');
		$flag = 0;
		$file = $_FILES['im1'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width, $height) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width <= 500 && $height <= 400)
				{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">height and width not matched</div>');
				$data['list'] = $this->obj_model->get_location_detail();

				// print_r($data['sub_category']);exit;
				// $this->load->view($this->list_adverisements,$data);

				$this->load->view('admin/listlocation', $data);
				}
			  else
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/profile_pic/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updateuploadlocimage($loc_id1, $file_name);
					}
				}

			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">please select the image</div>');
			$data['list'] = $this->obj_model->get_location_detail();

			// print_r($data['sub_category']);exit;
			// $this->load->view($this->list_adverisements,$data);

			$this->load->view('admin/listlocation', $data);
			}

		// /////////////////////////////////

		$loc_id2 = $this->input->post('l2');
		$flag = 0;
		$file = $_FILES['im2'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width, $height) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width <= 500 && $height <= 400)
				{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">height and width not matched</div>');
				$data['list'] = $this->obj_model->get_location_detail();

				// print_r($data['sub_category']);exit;
				// $this->load->view($this->list_adverisements,$data);

				$this->load->view('admin/listlocation', $data);
				}
			  else
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/profile_pic/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updateuploadlocimage($loc_id2, $file_name);
					}
				}

			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">please select the image</div>');
			$data['list'] = $this->obj_model->get_location_detail();

			// print_r($data['sub_category']);exit;
			// $this->load->view($this->list_adverisements,$data);

			$this->load->view('admin/listlocation', $data);
			}

		// ////////////////////////////

		$loc_id3 = $this->input->post('l3');
		$flag = 0;
		$file = $_FILES['im3'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width, $height) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width <= 500 && $height <= 400)
				{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">height and width not matched</div>');
				$data['list'] = $this->obj_model->get_location_detail();

				// print_r($data['sub_category']);exit;
				// $this->load->view($this->list_adverisements,$data);

				$this->load->view('admin/listlocation', $data);
				}
			  else
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/locationgallery/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updateuploadlocimage($loc_id3, $file_name);
					}
				}

			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">please select the image</div>');
			$data['list'] = $this->obj_model->get_location_detail();

			// print_r($data['sub_category']);exit;
			// $this->load->view($this->list_adverisements,$data);

			$this->load->view('admin/listlocation', $data);
			}

		$data['list'] = $this->obj_model->get_location_detail();

		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$this->load->view('admin/listlocation', $data);
		}

	public

	function updategallimage()
		{
		$loc_id1 = $this->input->post('ga1');

		// echo $loc_id;exit;

		$flag = 0;
		$file = $_FILES['g1'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));

		// $data = getimagesize($file_name);
		// $width = $data[0];
		// $height = $data[1];
		// echo $width; echo $height;exit;
		//	print_r($file_size);exit;

		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width, $height) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width <= 500 && $height <= 400)
				{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">height and width not matched</div>');
				$data['list'] = $this->obj_model->get_location_detail();

				// print_r($data['sub_category']);exit;
				// $this->load->view($this->list_adverisements,$data);

				$this->load->view('admin/listlocation', $data);
				}
			  else
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/locationgallery/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updategallary($loc_id1, $file_name);
					}

				$data['list'] = $this->obj_model->get_location_detail();

				// print_r($data['sub_category']);exit;
				// $this->load->view($this->list_adverisements,$data);

				$this->load->view('admin/listlocation', $data);
				}
			} ///////////////////////////////////
		$loc_id2 = $this->input->post('ga2');

		// echo $loc_id;exit;

		$flag = 0;
		$file = $_FILES['g2'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width, $height) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width <= 500 && $height <= 400)
				{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">height and width not matched</div>');
				$data['list'] = $this->obj_model->get_location_detail();

				// print_r($data['sub_category']);exit;
				// $this->load->view($this->list_adverisements,$data);

				$this->load->view('admin/listlocation', $data);
				}
			  else
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/locationgallery/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updategallary($loc_id2, $file_name);
					}

				$data['list'] = $this->obj_model->get_location_detail();

				// print_r($data['sub_category']);exit;
				// $this->load->view($this->list_adverisements,$data);

				$this->load->view('admin/listlocation', $data);
				}
			}

		// ////////////////////////////

		$loc_id3 = $this->input->post('ga3');

		// echo $loc_id;exit;

		$flag = 0;
		$file = $_FILES['g3'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width, $height) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width <= 500 && $height <= 400)
				{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">height and width not matched</div>');
				$data['list'] = $this->obj_model->get_location_detail();

				// print_r($data['sub_category']);exit;
				// $this->load->view($this->list_adverisements,$data);

				$this->load->view('admin/listlocation', $data);
				}
			  else
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/locationgallery/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updategallary($loc_id3, $file_name);
					}

				$data['list'] = $this->obj_model->get_location_detail();

				// print_r($data['sub_category']);exit;
				// $this->load->view($this->list_adverisements,$data);

				$this->load->view('admin/listlocation', $data);
				}
			}

		$loc_id4 = $this->input->post('ga4');

		// echo $loc_id;exit;

		$flag = 0;
		$file = $_FILES['g4'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width, $height) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width <= 500 && $height <= 400)
				{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">height and width not matched</div>');
				$data['list'] = $this->obj_model->get_location_detail();

				// print_r($data['sub_category']);exit;
				// $this->load->view($this->list_adverisements,$data);

				$this->load->view('admin/listlocation', $data);
				}
			  else
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/locationgallery/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updategallary($loc_id4, $file_name);
					}

				$data['list'] = $this->obj_model->get_location_detail();

				// print_r($data['sub_category']);exit;
				// $this->load->view($this->list_adverisements,$data);

				$this->load->view('admin/listlocation', $data);
				}

			// /////////////////////////////////

			}

		$loc_id5 = $this->input->post('ga4');

		// echo $loc_id;exit;

		$flag = 0;
		$file = $_FILES['g5'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width, $height) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width <= 500 && $height <= 400)
				{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">height and width not matched</div>');
				$data['list'] = $this->obj_model->get_location_detail();

				// print_r($data['sub_category']);exit;
				// $this->load->view($this->list_adverisements,$data);

				$this->load->view('admin/listlocation', $data);
				}
			  else
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/locationgallery/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updategallary($loc_id5, $file_name);
					}

				$data['list'] = $this->obj_model->get_location_detail();

				// print_r($data['sub_category']);exit;
				// $this->load->view($this->list_adverisements,$data);

				$this->load->view('admin/listlocation', $data);
				}
			}

		// ////////////////////////////

		$loc_id6 = $this->input->post('ga4');

		// echo $loc_id;exit;

		$flag = 0;
		$file = $_FILES['g6'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		if ($file_name != null)
			{
			list($width, $height) = getimagesize($file_tmp);

			// echo $width;
			// echo $height;

			if ($width <= 500 && $height <= 400)
				{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">height and width not matched</div>');
				$data['list'] = $this->obj_model->get_location_detail();

				// print_r($data['sub_category']);exit;
				// $this->load->view($this->list_adverisements,$data);

				$this->load->view('admin/listlocation', $data);
				}
			  else
				{
				if (in_array($file_ext, $allowed))
					{
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = './uploads/locationgallery/' . $file_name;
					if (move_uploaded_file($file_tmp, $file_destination))
						{
						$flag = 1;
						}
					}

				if ($flag == 1)
					{
					$dat = $this->obj_model->updategallary($loc_id6, $file_name);
					}

				$data['list'] = $this->obj_model->get_location_detail();

				// print_r($data['sub_category']);exit;
				// $this->load->view($this->list_adverisements,$data);

				$this->load->view('admin/listlocation', $data);
				}
			}

		$data['list'] = $this->obj_model->get_location_detail();

		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$this->load->view('admin/listlocation', $data);
		}

	public

	function change_password()
		{
		$this->load->view('admin/changepass');
		}

	public

	function updatepassword()
		{
		$user_id = $this->session->userdata('user_id');

		// print_r($data);
		//	$this->load->view('user/changepass');

		$old = $this->input->post('oldpassword');
		$password = $this->input->post('password');
		$password1 = $this->input->post('repassword');
		/*if(strlen($password)<6){
		$this->data['error']="Password Contain at least 6 characters ";
		$this->load->view('change_password',$this->data);
		}

		*/
		$res = $this->obj_model->check_pass(md5($old) , $user_id);
		if (!empty($res))
			{
			if ($password == $password1)
				{
				$password = md5($password);
				$id = $this->obj_model->update_pass($password, $user_id);
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Password Changed</div>');

				// redirect('user/profile');
				//	$this->session->unset_userdata($array_items);
				// $this->session->sess_destroy();
				//	$data['district'] =  $this->obj_model->get_table('district',array('status' => '0'));
				//	 $this->load->view("user/public-profile-search", $this->data);
				// $this->load->view('home');

				$this->load->view('admin/changepass');
				}
			  else
				{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Password Mismatch</div>');
				$this->load->view('admin/changepass');
				}
			}
		  else
			{
			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Old Password Mismatch</div>');
			$this->load->view('admin/changepass');
			}
		}

	public

	function continueguest()
		{
			
		$this->data['no_person'] = $this->input->post('no_person');
		$this->session->set_userdata('no_persons', $this->data['no_person']);
		$this->session->set_userdata('no_tents', $this->data['no_tent']);
		$this->session->set_userdata('froms', $this->data['from']);
		$this->session->set_userdata('tos', $this->data['to']);
		$this->session->set_userdata('loc_ids', $this->data['loc_id']);
		$this->session->set_userdata('no_tent_avails', $this->data['no_tent_avail']);
		$this->session->set_userdata('tent_rates', $this->data['tent_rate']);
		$this->session->set_userdata('allowed_persons', $this->data['allowed_person']);
		$no_person = $this->session->userdata('no_persons');
		$no_tent = $this->session->userdata('no_tents');
		$from = $this->session->userdata('froms');
		$to = $this->session->userdata('tos');
		$loc_id = $this->session->userdata('loc_ids');
		$no_tent_avail = $this->session->userdata('no_tent_avails');
		$tent_rate = $this->session->userdata('tent_rates');
		$allowed_person = $this->session->userdata('allowed_persons');

		// echo $no_person;
		//		echo $no_person;
		//	echo $from;
		//		echo $to;
		//	echo $loc_id;
		//		echo $no_tent_avail;
		//	echo $tent_rate;
		//		echo $allowed_person;exit;
		//

		echo json_encode(array(
			'status' => 1
		));

		//	echo $no_person;echo $no_tent;echo $from;echo $to;echo $loc_id;echo $no_tent_avail;echo $tent_rate;echo $allowed_person;exit;
		//	$this->load->view('booking', $this->data);
		// print_r($data);
		//	$this->load->view('user/dasboard',$data);

		}

	public

	function guestbooking()
		{
		$data['chkin'] = $this->session->userdata('frmses');

		// $this->session->userdata('user_id');

		$data['chkout'] = $this->session->userdata('toses');

		// /////////////////////////////////

		$pack_id = $this->input->post('pakkid');
		$data['package'] = $this->obj_model->get_all_package_details($pack_id);
		//print_r($data);
		$data['personcount'] = $this->input->post('no_person');

		// /////////////////////////////////

		$data['countries'] = $this->obj_model->get_table('countries', array(
			'status' => '1'
		));

		//	print_r($data);exit;

		$this->load->view('booking', $data);
		}

	public

	function datechangecal()
		{
		$checkin = $this->input->post('checkin');
		$checkout = $this->input->post('checkout');
		$noperson = $this->input->post('noperson');
		$no_tent = $this->input->post('no_tent');
		$totamt = $this->input->post('totamt');
		$gst = $this->input->post('gst');

		//	echo $checkin;
		//	echo $checkin;echo $noperson;
		//	echo $no_tent;	echo $totamt;

		$tentrate = $this->input->post('tentrate');
		$date1 = strtotime($checkin);
		$date2 = strtotime($checkout);
		$datediff = $date2 - $date1;
		$days = floor($datediff / (60 * 60 * 24));
		if ($days == 0)
			{
			$days = 1;
			$tot = $noperson * $tentrate;
			}
		  else
			{
			$tot = $noperson * $tentrate * $days;
			}

		$gstsum = $tot + $gst;
		echo json_encode(array(
			'status' => 1,
			'days' => $days,
			'total' => $tot,
			'gstsum' => $gstsum
		));
		}

	public

	function persomminimise()
		{

		//	$checkin		=	 $this->input->post('checkin');
		//	$checkout	=	 $this->input->post('checkout');

		$noperson = $this->input->post('noperson');
	
		$gst = $this->input->post('gst');
		$personcount = $this->input->post('personcount');
		$personcount = $this->input->post('personcount');
		$packpri = $this->input->post('packpri');
		$qu = $this->input->post('qu');

		// echo $noperson;
		//		echo $gst;echo $personcount;
		// echo $personcount;
		//	echo $noperson;
		

		if($qu==0)
		{
			$nope = (($noperson)/1);
		$no = (ceil($nope));

		
		}
		else{
			$nope = (($noperson)/($qu));
		$no = (ceil($nope));
		}
			
		
	

		

		$tot = $packpri * $no;
		$sum = $tot + $gst;
		$gstsum = $tot + $gst;
		echo json_encode(array(
			'status' => 1,
			'total' => $tot,
			'gstsum' => $gstsum,
			'no' => $no
		));
		/*
		$date1 = strtotime($checkin);
		$date2 = strtotime($checkout);
		$datediff = $date2 - $date1;
		$days =  floor($datediff / (60 * 60 * 24));
		if($days == 0){
		$days=1;
		$tot=$noperson*$tentrate;
		}
		  else
		{
		$tot=$noperson*$tentrate*$days;
		}

		*/
		}

	public

	function districtimage()
		{

		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$data['district'] = $this->obj_model->get_table('district', array(
			'status' => '0'
		));
		$this->load->view('admin/districtimage', $data);
		}

	public

	function uploaddistrictimage()
		{
		$loc_id = $this->input->post('disid');
		$flag = 0;
		$file = $_FILES['imghome'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);
		list($width, $height) = getimagesize($file_tmp);

		//  echo $width;
		//  echo $height;exit;

		if (($width == 401) && ($height == 527))
			{
			if (in_array($file_ext, $allowed))
				{
				$file_name_new = uniqid('', true) . '.' . $file_ext;
				$file_destination = './uploads/district/' . $file_name;
				if (move_uploaded_file($file_tmp, $file_destination))
					{
					$flag = 1;
					}
				}

			if ($flag == 1)
				{
				$dats = $this->obj_model->deletedistrictimage($loc_id);
				$dat = $this->obj_model->updatedistrictimage($loc_id, $file_name);
				}

			//  echo "dwwwwwwwwffdf";exit;

			$this->session->set_flashdata('msgdis', '<div class="alert alert-success text-center">uploaded sucessfuly</div>');
			$data['list'] = $this->obj_model->get_districtlist();

			// print_r($data['sub_category']);exit;
			// $this->load->view($this->list_adverisements,$data);
			// print_r($data);exit;

			$this->load->view('admin/listdistrict', $data);
			}
		  else
			{
			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">height and width must be 401px x 527px</div>');
			$data['district'] = $this->obj_model->get_table('district', array(
				'status' => '0'
			));
			$this->load->view('admin/districtimage', $data);
			}
		}

	public

	function listdistrict()
		{
		$data['list'] = $this->obj_model->get_districtlist();

		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);
		// print_r($data);exit;

		$this->load->view('admin/listdistrict', $data);
		}

	public

	function editdistrictimage()
		{
		$dis_id = $this->uri->segment(3);
		$data['districtdetail'] = $this->obj_model->get_district_images($dis_id);
		$this->load->view('admin/editdistrict', $data);

		//	print_r($data);exit;
		// $this->load->view($this->list_adverisements,$data);
		//	$data['district'] =  $this->obj_model->get_table('district',array('status' => '0'));
		// $data['loc_images']= $this->obj_model->get_table('loc_images',array('status' => '1'));
		//	$data['gallery']= $this->obj_model->get_table('gallary_images',array('status' => '1'));
		//	$data['home_image']= $this->obj_model->get_table('home_images',array('status' => '1'));
		// 	print_r($data);
		// $this->load->view($this->list_adverisements,$data);
		// $this->load->view('admin/addlocation',$data);

		}

	public

	function updatedistrictimage()
		{
		$loc_id = $this->input->post('dis_id');
		$flag = 0;
		$file = $_FILES['imghome'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);

		// echo $width;
		// echo $height;

		if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/district/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

		if ($flag == 1)
			{
			}
		}

	public

	function deletedistrictimage()
		{
		$user_id = $this->uri->segment(3);
		$result = $this->obj_model->deletedistrictimage($user_id);

		// echo $user_id;exit;

		$data['list'] = $this->obj_model->get_districtlist();

		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);
		// print_r($data);exit;

		$this->load->view('admin/listdistrict', $data);
		}

	// ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public

	function deletehomeimageedit()
		{
		$user_id = $this->uri->segment(3);
		$result = $this->obj_model->deletehomeimageedit($user_id);

		// echo $user_id;exit;

		$data['list'] = $this->obj_model->get_location_detail();

		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$this->load->view('admin/listlocation', $data);
		}

	public

	function deletelocationimageedit()
		{
		$user_id = $this->uri->segment(3);
		$result = $this->obj_model->deletelocationimageedit($user_id);

		// echo $user_id;exit;
		//	echo "dfdffd";exit;

		$data['list'] = $this->obj_model->get_location_detail();

		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$this->load->view('admin/listlocation', $data);
		}

	public

	function deletegallaryimageedit()
		{
		$user_id = $this->uri->segment(3);
		$result = $this->obj_model->deletegallaryimageedit($user_id);

		// echo $user_id;exit;
		//	echo "dfdffd";exit;
		// unlink("uploads/".$group_picture);

		$data['list'] = $this->obj_model->get_location_detail();

		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$this->load->view('admin/listlocation', $data);
		}

	// forgotpass

	public

	function resetpass()
		{
		$params = $this->input->post('reemail');
		$unameTest = $this->obj_model->checkmail($params);
		$str = '';
		if (count($unameTest) == 0)
			{
			echo "no data";
			}
		  else
			{
			foreach($unameTest as $uname)
				{
				$user = $uname['user_id'];
				}

			//	echo $user;exit;

			$token = md5(uniqid(rand() , true));
			$token_set = $this->obj_model->insert_token($token, $user);

			// ///////////////////

			$this->load->library('email');
			$config = Array(
				'protocol' => 'MAIL_DRIVER',
				'MAIL_HOST' => 'mail.codefacetech.com',
				'MAIL_PORT' => 26,
				'MAIL_USERNAME' => 'jungle@codefacetech.com',
				'MAIL_PASSWORD' => 'DpS]%E757#d*',
				'mailtype' => 'html',
				'charset' => 'utf-8'
			);
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
			$qstring = base64_encode($token);
			$url = site_url() . '/Home/newpass/' . $token . '/' . $user;
			$link = '<a href="' . $url . '">Activation Link</a>';
			$message = '';
			$message.= '<strong>please click the link for change the password:</strong> ' . $link;
			$toEmail = $this->input->post('reemail');
			$to = $toEmail; // undefine
			$this->email->clear();
			$this->email->from('jungle@codefacetech.com');
			$this->email->to($toEmail);
			$this->email->subject('Reset password');
			$this->email->message($message);
			if (!$this->email->send())
				{
				echo "fail <br />";
				echo $this->email->print_debugger();
				/*$this->session->set_flashdata('flash_message', 'Password reset fail.');
				redirect(site_url().'/main/register');*/
				}
			  else
				{
				$this->session->set_flashdata('flash_message', 'Please check the mail.');
				redirect(base_url());
				}
			}
		}

	public

	function newpass()
		{
		$this->load->view("user/newpass");
		}

	public

	function setnewpass()
		{

		// $user =$this->input->post('first');

		$pass = md5($this->input->post('second'));
		$params = $this->input->post('tok');
		$user = $this->input->post('user');
		$unameTest = $this->obj_model->user_pass_rest($params, $pass, $user);
		$unameTest = $this->obj_model->delete_token($user);
		redirect(base_url());
		}

	// /////////////////////////////////////////////////newwwwwwwwwwwwwwwwwwwwwwww/////////////////////////////////////////////

	public

	function getstate()
		{
		$id = $_POST['co_id'];
		$sections = $this->obj_model->getstate('id', $id);

		// print_r($sections);exit;

		$str = '<option value="">Select</option>';
		if ($sections)
			{
			foreach($sections as $row)
				{
				$msg = '';
				$str = $str . '<option value="' . $row['s_id'] . '"' . $msg . '>' . $row['s_name'] . '</option>';
				}
			}

		echo json_encode($str);
		}

	public

	function getcity()
		{
		$s_id = $_POST['st_id'];
		$sections = $this->obj_model->getcity('s_id', $s_id);

		//	print_r($sections);exit;

		$str = '<option value="">Select</option>';
		if ($sections)
			{
			foreach($sections as $row)
				{
				$msg = '';
				$str = $str . '<option value="' . $row['c_id'] . '"' . $msg . '>' . $row['c_name'] . '</option>';
				}
			}

		echo json_encode($str);
		}

	public

	function listloc()
		{

		// $data['list'] = $this->obj_model->get_location_detail();
		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$data['list'] = $this->obj_model->get_location_list();

		// print_r($data);exit;

		$this->load->view('admin/listlocation', $data);
		}

	public

	function addpack()
		{

		// $data['list'] = $this->obj_model->get_location_detail();
		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);
		// $data['list'] = $this->obj_model->get_location_list();
		// print_r($data);exit;

		$data['location'] = $this->obj_model->get_all_pac();
		$data['amenities'] = $this->obj_model->get_table('amenities', array(
			'status' => '1'
		));
		$this->load->view('admin/addpackage', $data);
		}

	public

	function listpackage()
		{

		// $data['list'] = $this->obj_model->get_location_detail();
		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$data['package'] = $this->obj_model->get_package_list();

		//	print_r($data);exit;

		$this->load->view('admin/listpackage', $data);
		}

	public

	function packagelist()
		{

		// $data['list'] = $this->obj_model->get_location_detail();
		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);
		// $data['package'] = $this->obj_model->get_package_list();
		// print_r($data);exit;

		$this->load->view('packagelist');
		}

	public

	function packagedetailsbk()
		{
		$pack_id = $this->uri->segment(3);
		$data['chkin'] = $this->input->post('datepicker-12');
		$data['chkout'] = $this->input->post('datepicker-13');
		$data['package'] = $this->obj_model->get_all_package_details($pack_id);

		// print_r($data);
		// $data['packsliderss']    = $this->obj_model->getpacksliderimg($pack_id);

		$data['packsliderss'] = $this->obj_model->get_slider_pack($pack_id);

		// print_r($data['packsliderss']);

		$data['location'] = $this->obj_model->getlocationimg();
		$this->load->view('detail', $data);
		}

	public

	function locedit()
		{
		$pack_id = $this->uri->segment(3);
		$allamenities = $this->obj_model->get_table('amenities', array(
			'status' => '1'
		));
		 
		$data['package'] = $this->obj_model->get_all_location_detailsedit($pack_id);
		//print_r($data['package']);exit;
		$locAmenitiesId = $this->obj_model->getLocationAmenites($pack_id);
		foreach($locAmenitiesId as $locid){
			for($i = 0 ; $i< sizeof($allamenities);$i++){
				if($allamenities[$i]['id'] == $locid['id']){
					$allamenities[$i]["loc"] = true;
					break;
				}
			}
		}
		$data['amenities']  = $allamenities;
		$data['countries'] = $this->obj_model->get_table('countries', array(
			'status' => '1'
		));
		$this->load->view('admin/editlocation', $data);
		}

	public

	function deletelocation()
		{
		$pack_id = $this->uri->segment(3);
		$data['package'] = $this->obj_model->deletelocation($pack_id);
		//$this->load->view('admin/editlocation', $data);
		
		
		$data['list'] = $this->obj_model->get_location_list();

		// print_r($data);exit;

		$this->load->view('admin/listlocation', $data);
		}

	// ////////////////update///////

	public

	function updatepackagessss()
		{
		$id = $this->input->post('pa');
		$location = $this->input->post('location');
		$Package = $this->input->post('Package');
		$packagedescription = $this->input->post('Description');

		// $this->data['noperson']    = $this->input->post('noperson');

		$packagedays = $this->input->post('days');
		$packageprize = $this->input->post('price');
		$amount = $this->input->post('amount');
		$activestate = $this->input->post('minimal-radio');
		$user_items = array(
			'location' => $location,
			'Package' => $Package,
			'packagedescription' => $packagedescription,
			'packagedays' => $packagedays,
			'packageprize' => $packageprize,
			'amount' => $amount,
			'activestate' => $activestate,
			'thumbnailimage' => 1,
		);
		$this->obj_model->common_update($id, "id", "package", $user_items);

		// /
		// $ins_id = $this->obj_model->Insert_tbl('package',$this->add);

		/*
		$prefer= $this->input->post('amni');

		// $data['prefer'] =implode(",", $prefer);

		$this->amni['package ']  = $ins_id;
		$this->amni['amenities']  = implode(",", $prefer);

		// print_r($this->amni['amenities']);exit;

		$am = $this->obj_model->Insert_tbl('packageamenities',$this->amni);
		*/

		// /////////////////////////

		$data['location'] = $this->obj_model->get_all_pac();

		// $data['amenities'] =  $this->obj_model->get_table('amenities',array('status' => '1'));

		$data['package'] = $this->obj_model->get_all_package_details($pa);

		// print_r($data['package']);exit;

		$data['amenities'] = $this->obj_model->get_table(' amenities', array(
			'status' => '1'
		));
		$this->load->view('admin/editpackage', $data);

		//	$data['list'] = $this->obj_model->get_location_detail();
		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);
		//	$this->load->view('admin/listlocation',$data);

		}

	public function savelocation()
		{
		$flag = 0;
		$file = $_FILES['ssss'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);

		// print_r($file);
		// echo $width;
		// echo $height;

		if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/location/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

		if ($flag == 1)
			{
			$this->img['imagename'] = $file_name;
			$this->img['imagepath'] = $file_destination;
			$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
			$this->add['address_line1'] = $this->input->post('address1');
			$this->add['address_line2'] = $this->input->post('address2');
			$this->add['postalcode'] = $this->input->post('pin');

			// $this->data['noperson']    = $this->input->post('noperson');

			$this->add['country'] = $this->input->post('country');
			$this->add['state '] = $this->input->post('state');
			$this->add['city '] = $this->input->post('city');

			//	echo "gyu";exit;

			$ins_id = $this->obj_model->Insert_tbl('address', $this->add);
			$this->loc['map'] = $this->input->post('mapss');
			$this->loc['thumbnailimage'] = $file_id;
			$this->loc['locationaddress'] = $ins_id;
			$loc_id = $this->obj_model->Insert_tbl('location', $this->loc);
			$this->locimg['location'] = $loc_id;
			$this->locimg['file'] = $file_id;
			$this->obj_model->Insert_tbl('locationimage', $this->locimg);
			}

		//	$this->loc['locationname']   = $this->input->post('location');
		// echo $loc_id;

		$this->sml['locationid '] = $loc_id;
		$this->sml['count '] = $this->input->post('smalltent');
		$this->sml['amount '] = $this->input->post('samllamount');
		$this->sml['tenttype '] = 1;
		$this->me['count '] = $this->input->post('mediumtent');
		$this->me['amount '] = $this->input->post('mediumamount');
		$this->me['tenttype '] = 2;
		$this->me['locationid '] = $loc_id;
		$this->lar['count '] = $this->input->post('largetent');
		$this->lar['amount '] = $this->input->post('largeamount');
		$this->lar['tenttype '] = 3;
		$this->lar['locationid '] = $loc_id;
		$this->obj_model->Insert_tbl('locationtent', $this->sml);
		$this->obj_model->Insert_tbl('locationtent', $this->me);
		$this->obj_model->Insert_tbl('locationtent', $this->lar);
		$prefer = $this->input->post('amni');

		// $data['prefer'] =implode(",", $prefer);

		$this->amni['location '] = $loc_id;
		$val[] = implode(",", $prefer);

		

		foreach($val as $va)
			{
			$v = $va;
			}

		$va = "1,2,3";
		$amm = explode(",", $v);
			
		
		foreach($amm as $am)
			{
			$this->amni['amenities'] = $am;
			$this->amni['location '] = $loc_id;
			$am = $this->obj_model->Insert_tbl('locationamenities', $this->amni);
			}
//print_r($amm);exit;
		// echo "sucess";exit;
		//	$data['list'] = $this->obj_model->get_location_detail();
		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$data['amenities'] = $this->obj_model->get_table(' amenities', array(
			'status' => '1'
		));

		// print_r($data);exit;

		$data['countries'] = $this->obj_model->get_table('countries', array(
			'status' => '1'
		));

		//	print_r($data);exit;
	$data['list'] = $this->obj_model->get_location_list();

		// print_r($data);exit;

		$this->load->view('admin/listlocation', $data);
		}

	public

	function loginbook()
		{
		if (isset($_POST['fre']))
			{
			$name = $this->input->post("emailid");
			$pass = $this->input->post("passwordid");
			$password = md5($pass);

			//	echo $name;
			//	echo $pass;exit;
			//    $pass    = $this->input->post('pass');
			//	  $name    = $this->input->post('name');

			$check = $this->obj_model->get_userdata($name, $password);

			// print_r($check);exit;

			if (!$check || $check == FALSE)
				{
				$this->session->set_flashdata('err_msg', 'Incorrect Username/Password');
				redirect(base_url());
				}
			  else
				{
				foreach($check as $res_user)
					{

					// $userid=$res_user->user_id;

					$username = $res_user->email;
					$user_id = $res_user->id;

					// $this->session->set_userdata("user_id",$userid);
					// $a=	$this->session->set_userdata("username",$username);
					//	$b=	$this->session->set_userdata("user_id",$user_id);
					//	$session_data = array(
					//	'username' => $res_user->user_name,
					//	'id' => $res_user->user_id
					// /	);
					// $uid = $this->session->userdata('username');

					$this->session->set_userdata('user_name', $res_user->email);
					$this->session->set_userdata('user_id', $res_user->id);
					}

				$pack_id = $this->input->post('loeid');

				// $district_id		=	$_POST['dis_id'];
				//	$loc_id		=	$_POST['loc_id'];
				// print_r($data);
				// $this->load->view('detail');
				//
				//  $this->data['details']        = $this->obj_model->getlocdetail($loc_id);
				//	  $this->data['gallery']        = $this->obj_model->getlocgallery($loc_id);
				//	    $this->data['loc_image']        = $this->obj_model->getlocimage($loc_id);
				// $this->data['loc_image'] $this->data['loc_image']print_r( $this->data['loc_image']);exit;
				//	  $this->data['home_image']        = $this->obj_model->gethomeimage($loc_id);

				$data['chkin'] = $this->session->userdata('frmses');

				// $this->session->userdata('user_id');

				$data['chkout'] = $this->session->userdata('toses');
				$pack_id = $this->input->post('loeid');
				$data['package'] = $this->obj_model->get_all_package_details($pack_id);

				// print_r($data);
				// $data['packsliderss']    = $this->obj_model->getpacksliderimg($pack_id);

				$data['packsliderss'] = $this->obj_model->get_slider_pack($pack_id);

				// print_r($data['packsliderss']);

				$data['location'] = $this->obj_model->getlocationimg();
				$data['package'] = $this->obj_model->get_all_package_details($pack_id);

				// print_r($data);

				$this->load->view('detail', $data);

				//     $this->load->view("detail", $this->data);

				}
			}
		}

	public

	function select_detailsbk()
		{

		// ////////////////////

		$this->session->unset_userdata('no_persons');
		$this->session->unset_userdata('no_tents');
		$this->session->unset_userdata('froms');
		$this->session->unset_userdata('tos');
		$this->session->unset_userdata('no_tent_avails');
		$this->session->unset_userdata('no_tent_avails');
		$this->session->unset_userdata('tent_rates');
		$this->session->unset_userdata('allowed_persons');

		// $this->session->sess_destroy();

		$this->data['no_person'] = $this->input->post('no_person');
		$this->data['no_tent'] = $this->input->post('no_tent');
		$this->data['from'] = $this->input->post('datepicker-12');
		$this->data['to'] = $this->input->post('datepicker-13');
		$this->data['loc_id'] = $this->input->post('loc_id');
		$this->data['no_tent_avail'] = $this->input->post('no_tent_avail');
		$this->data['tent_rate'] = $this->input->post('tent_rate');
		$this->data['allowed_person'] = $this->input->post('allowed_person');

		// /////////////////////////////////

		$this->session->set_userdata('no_persons', $this->data['no_person']);
		$this->session->set_userdata('no_tents', $this->data['no_tent']);
		$this->session->set_userdata('froms', $this->data['from']);
		$this->session->set_userdata('tos', $this->data['to']);
		$this->load->view('booking', $this->data);

		//  $this->data['details']        = $this->obj_model->getlocdetail($loc_id);
		//   $this->load->view("detail", $this->data);

		}

	public

	function booiknginformation()
		{

		//	  $user_id=$this->session->userdata('user_id');

		$data['details'] = $this->obj_model->oderfulldetails();

		// print_r($data);exit;

		$this->load->view('admin/bookingdetails', $data);
		}

	public

	function orderview()
		{

		//	  $user_id=$this->session->userdata('user_id');

		$id = $this->uri->segment(3);

		//	echo $id;exit;

		$data['details'] = $this->obj_model->orderview($id);

		// print_r($data);exit;

		$this->load->view('admin/orderview', $data);
		}

	public

	function billingorder()
		{
		$id = $this->uri->segment(3);

		//	echo $id;exit;

		$data['details'] = $this->obj_model->orderview($id);

		// print_r($data);exit;

		$this->load->view('admin/billingorder', $data);
		}

	public

	function bookingdetail()
		{
		$user_id = $this->session->userdata('user_id');
		$data['bookinginfo'] = $this->obj_model->getbookinginfo($user_id);

		//  print_r($data);exit;

		$this->load->view('user/booking_detail', $data);
		}

	public

	function updatepass()
		{
		$user_id = $this->session->userdata('user_id');

		// print_r($data);
		//	$this->load->view('user/changepass');

		if ($user_id != null)
			{
			$old = $this->input->post('oldpassword');
			$password = $this->input->post('password');
			$password1 = $this->input->post('repassword');
			/*if(strlen($password)<6){
			$this->data['error']="Password Contain at least 6 characters ";
			$this->load->view('change_password',$this->data);
			}

			*/
			$res = $this->obj_model->check_pass(md5($old) , $user_id);
			if (!empty($res))
				{
				if ($password == $password1)
					{
					$password = md5($password);
					$id = $this->obj_model->update_pass($password, $user_id);
					$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Password Changed</div>');

					// redirect('user/profile');
					//	$this->session->unset_userdata($array_items);
					// $this->session->sess_destroy();
					// 	$data['district'] =  $this->obj_model->get_table('district',array('status' => '0'));
					//	 $this->load->view("user/public-profile-search", $this->data);
					// $this->load->view('home');

					$this->load->view('user/changepass');
					}
				  else
					{
					$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Password Mismatch</div>');
					$this->load->view('user/changepass');
					}
				}
			  else
				{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Old Password Mismatch</div>');
				$this->load->view('user/changepass');
				}
			}
		  else
			{
			redirect(base_url());
			}
		}

	public

	function mains()
		{
		$data['location'] = $this->obj_model->getlocationfull();
		$data['details'] = $this->obj_model->oderfulldetailsadmin();
		$month = date('m');
		$data['resultall'] = $this->obj_model->searchmonthresultnow($month);

		// 	$data['totalbooking']        = $this->obj_model->totalbooking();
		// 	$data['totalorder']        = $this->obj_model->totalorder();
		// $data['totaluser']        = $this->obj_model->totaluser();
		//  $data['newbook']        = $this->obj_model->newbook($month);

		$this->load->view('admin/main', $data);
		}

	public

	function serachmonth()
		{
		$loc = $this->input->post('location');
		$month = $this->input->post('month');
		$data['result'] = $this->obj_model->searchmonthresult($month, $loc);
		$this->load->view('admin/main_result', $data);
		}

	public

	function updatelocationsssssssss()
		{
		$lid = $this->input->post('lid');
		$sid = $this->input->post('sid');
		$cid = $this->input->post('cid');
		$co_id = $this->input->post('co_id');
		$add = $this->input->post('add');
		$fid = $this->input->post('fid');
		$flag = 0;
		$file = $_FILES['ssss'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);

		// print_r($file);
		// echo $width;
		// echo $height;

		if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/location/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

		if ($flag == 1)
			{
			$imagename = $file_name;
			$imagepath = $imagepath;

			// ////

			$user_item = array(
				'imagename' => $file_name,
				'imagepath' => $imagepath
			);
			$this->obj_model->common_update($fid, "id", "file", $user_item);

			// /

			$address_line1 = $this->input->post('address1');
			$address_line2 = $this->input->post('address2');
			$postalcode = $this->input->post('pin');

			// $this->data['noperson']    = $this->input->post('noperson');

			$country = $this->input->post('country');
			$state = $this->input->post('state');
			$city = $this->input->post('city');
			$user_items = array(
				'address_line1' => $address_line1,
				'address_line2' => $address_line2,
				'postalcode' => $postalcode,
				'country' => $country,
				'state' => $state,
				'city' => $city
			);
			$this->obj_model->common_update($add, "id", "address", $user_items);

			// /
			//	$ins_id = $this->obj_model->Insert_tbl('address',$this->add);

			$this->loc['thumbnailimage'] = $file_id;
			$this->loc['locationaddress'] = $lid;
			$city = $this->input->post('mapss');
			$user_itemsw = array(
				'thumbnailimage' => $file_id,
				'locationaddress' => $add
			);
			$this->obj_model->common_update($lid, "id", "location", $user_itemsw);

			// /
			// $loc_id =	 $this->obj_model->Insert_tbl('location',$this->loc);

			$this->locimg['location'] = $lid;
			$this->locimg['file'] = $file_id;
			$user_itemsww = array(
				'location' => $lid,
				'file' => $file_id
			);
			$this->obj_model->common_update($lid, "location", "locationimage", $user_itemsww);

			// /
			// $this->obj_model->Insert_tbl('locationimage',$this->locimg);

			}

		$amm = $lid;
		$this->obj_model->deleteloctent($amm);

		//	$this->loc['locationname']   = $this->input->post('location');
		// echo $loc_id;

		$this->sml['locationid '] = $lid;
		$this->sml['count '] = $this->input->post('smalltent');
		$this->sml['amount '] = $this->input->post('samllamount');
		$this->sml['tenttype '] = 1;
		$this->me['count '] = $this->input->post('mediumtent');
		$this->me['amount '] = $this->input->post('mediumamount');
		$this->me['tenttype '] = 2;
		$this->me['locationid '] = $lid;
		$this->lar['count '] = $this->input->post('largetent');
		$this->lar['amount '] = $this->input->post('largeamount');
		$this->lar['tenttype '] = 3;
		$this->lar['locationid '] = $lid;
		echo "sdfsg";
		exit;
		$this->obj_model->Insert_tbl('locationtent', $this->sml);
		$this->obj_model->Insert_tbl('locationtent', $this->me);
		$this->obj_model->Insert_tbl('locationtent', $this->lar);
		$prefer = $this->input->post('amni');

		// $data['prefer'] =implode(",", $prefer);

		$this->amni['location '] = $lid;
		$this->amni['amenities'] = implode(",", $prefer);
		$this->obj_model->deleteamni($amm);

		// print_r($this->amni['amenities']);exit;

		$am = $this->obj_model->Insert_tbl('locationamenities', $this->amni);

		// echo "sucess";exit;
		//	$data['list'] = $this->obj_model->get_location_detail();
		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$pack_id = $cid;
		$data['package'] = $this->obj_model->get_all_location_details($pack_id);

		//	print_r($data);exit;

		$data['amenities'] = $this->obj_model->get_table(' amenities', array(
			'status' => '1'
		));

		// print_r($data);exit;

		$data['countries'] = $this->obj_model->get_table('countries', array(
			'status' => '1'
		));

		//	print_r($data);exit;

		$this->load->view('admin/editlocation', $data);
		}

	public

	function updatelocations()
		{
			
		
		$address_line1 = $this->input->post('address1');
		$lid = $this->input->post('lid');
		$sid = $this->input->post('sid');
		$cid = $this->input->post('cid');
		$co_id = $this->input->post('co_id');
		$add = $this->input->post('add');
		$file_id = $this->input->post('fid');

		// echo $file_id;

		$amm = $lid;
		$this->obj_model->deleteamni($amm);
		$prefer = $this->input->post('amni');

		// $data['prefer'] =implode(",", $prefer);

		$this->amni['location '] = $lid;
		$this->amni['amenities'] = implode(",", $prefer);

		// print_r($this->amni['amenities']);exit;

		$am = $this->obj_model->Insert_tbl('locationamenities', $this->amni);
		
		$this->obj_model->deleteloctent($amm);

		//	$this->loc['locationname']   = $this->input->post('location');
		// echo $loc_id;

		$this->sml['locationid '] = $lid;
		$this->sml['count '] = $this->input->post('smalltent');
		$this->sml['amount '] = $this->input->post('samllamount');
		$this->sml['tenttype '] = 1;
		$this->me['count '] = $this->input->post('mediumtent');
		$this->me['amount '] = $this->input->post('mediumamount');
		$this->me['tenttype '] = 2;
		$this->me['locationid '] = $lid;
		$this->lar['count '] = $this->input->post('largetent');
		$this->lar['amount '] = $this->input->post('largeamount');
		$this->lar['tenttype '] = 3;
		$this->lar['locationid '] = $lid;
		$this->obj_model->Insert_tbl('locationtent', $this->sml);
		$this->obj_model->Insert_tbl('locationtent', $this->me);
		$this->obj_model->Insert_tbl('locationtent', $this->lar);
		$address_line1 = $this->input->post('address1');
		$address_line2 = $this->input->post('address2');
		$postalcode = $this->input->post('pin');

		// $this->data['noperson']    = $this->input->post('noperson');

		$country = $this->input->post('country');
		$state = $this->input->post('state');
		$city = $this->input->post('city');
		$user_items = array(
			'address_line1' => $address_line1,
			'address_line2' => $address_line2,
			'postalcode' => $postalcode,
			'country' => $country,
			'state' => $state,
			'city' => $city
		);

		// print_r($user_items);exit;

		$this->obj_model->common_update($add, "id", "address", $user_items);

		// /

		$flag = 0;
		$file = $_FILES['ssss'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);

		// print_r($file);
		// echo $width;
		// echo $height;

		if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/location/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

		if ($flag == 1)
			{
			$imagename = $file_name;
			$imagepath = $file_destination;

			// ////

			$user_itemimg = array(
				'imagename' => $file_name,
				'imagepath' => $imagepath
			);
			$this->obj_model->common_update($file_id, "id", "file", $user_itemimg);

			// /
			}
			//echo "fwfgefg";exit;
				$this->obj_model->delete_location_amini($lid);
			
			
			$prefer = $this->input->post('amni');
				$this->amni['location '] = $lid;
		$val[] = implode(",", $prefer);

		
//print_r($val);exit;
		foreach($val as $va)
			{
			$v = $va;
			}

		$va = "1,2,3";
		$amm = explode(",", $v);
			
		
		foreach($amm as $am)
			{
			$this->amni['amenities'] = $am;
			$this->amni['location '] = $lid;
			$am = $this->obj_model->Insert_tbl('locationamenities', $this->amni);
			}
			
			
			

			
			
			$data['list'] = $this->obj_model->get_location_list();

		// print_r($data);exit;

		$this->load->view('admin/listlocation', $data);
		}

	public
function savepackage()
		{

		// echo"dfss";exit;

		$idm = $this->input->post('location');
		$this->add['location'] = $this->input->post('location');
		$this->add['Package'] = $this->input->post('Package');
		$this->add['packagedescription'] = $this->input->post('Description');

		// $this->data['noperson']    = $this->input->post('noperson');
$this->add['noperson']    = $this->input->post('noperson');
		$this->add['packagedays'] = $this->input->post('days');
		$this->add['packageprize '] = $this->input->post('price');
		$this->add['amount '] = $this->input->post('amount');
		$this->add['activestate'] = $this->input->post('example1');
		$flag = 0;
		$file = $_FILES['thumbnail'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);

		// print_r($file);
		// echo $width;
		// echo $height;

		if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packagethumbnail/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

		if ($flag == 1)
			{
			$this->img['imagename'] = $file_name;
			$this->img['imagepath'] = $file_destination;
			$file_id = $this->obj_model->Insert_tbl(' file', $this->img);

			//		$this->locimg['package']= $ins_id;
			//		$this->locimg['file']= $file_id;

			$this->add['thumbnailimage'] = $file_id;

			// $this->obj_model->Insert_tbl('packageimage',$this->locimg);

			}

		$ins_id = $this->obj_model->Insert_tbl('package', $this->add);
		$prefer = $this->input->post('amni');

		// $data['prefer'] =implode(",", $prefer);

		$this->amni['package '] = $ins_id;
		$this->amni['amenities'] = implode(",", $prefer);

		
		$this->amni['package '] = $ins_id;
		$val[] = implode(",", $prefer);

		

		foreach($val as $va)
			{
			$v = $va;
			}

		$va = "1,2,3";
		$amm = explode(",", $v);
			
		
		foreach($amm as $am)
			{
			$this->amni['amenities'] = $am;
			$this->amni['package '] = $ins_id;
			$am = $this->obj_model->Insert_tbl('packageamenities', $this->amni);
			}
		
		
		
		
		
		
		
		
		// print_r($this->amni['amenities']);exit;

	
		$flag = 0;
		$file = $_FILES['slid'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);

		// print_r($file);
		// echo $width;
		// echo $height;

		if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packageslider/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

		if ($flag == 1)
			{
			$this->img['imagename'] = $file_name;
			$this->img['imagepath'] = $file_destination;
			$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
			$this->locimgs['packageid'] = $ins_id;
			$this->locimgs['imageid'] = $file_id;
			$this->obj_model->Insert_tbl('packagesliderimage', $this->locimgs);
			}

		// ///////slide2222/////////////

		$flag = 0;
		$file = $_FILES['slid2'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);

		// print_r($file);
		// echo $width;
		// echo $height;

		if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packageslider/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

		if ($flag == 1)
			{
			$this->img['imagename'] = $file_name;
			$this->img['imagepath'] = $file_destination;
			$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
			$this->locimgs['packageid'] = $ins_id;
			$this->locimgs['imageid'] = $file_id;
			$this->obj_model->Insert_tbl('packagesliderimage', $this->locimgs);
			}

		// //////////slide3///

		$flag = 0;
		$file = $_FILES['slid3'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);

		// print_r($file);
		// echo $width;
		// echo $height;

		if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packageslider/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

		if ($flag == 1)
			{
			$this->img['imagename'] = $file_name;
			$this->img['imagepath'] = $file_destination;
			$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
			$this->locimgs['packageid'] = $ins_id;
			$this->locimgs['imageid'] = $file_id;
			$this->obj_model->Insert_tbl('packagesliderimage', $this->locimgs);
			}

		// //////////gal1///

		$flag = 0;
		$file = $_FILES['gal1'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);

		// print_r($file);
		// echo $width;
		// echo $height;

		if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packageimages/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

		if ($flag == 1)
			{
			$this->img['imagename'] = $file_name;
			$this->img['imagepath'] = $file_destination;
			$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
			$this->locimg['package'] = $ins_id;
			$this->locimg['file'] = $file_id;
			$this->obj_model->Insert_tbl('packageimage', $this->locimg);
			}

		// //////////gal2///

		$flag = 0;
		$file = $_FILES['gal2'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);

		// print_r($file);
		// echo $width;
		// echo $height;

		if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packageimages/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

		if ($flag == 1)
			{
			$this->img['imagename'] = $file_name;
			$this->img['imagepath'] = $file_destination;
			$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
			$this->locimg['package'] = $ins_id;
			$this->locimg['file'] = $file_id;
			$this->obj_model->Insert_tbl('packageimage', $this->locimg);
			}

		// //////////gal3///

		$flag = 0;
		$file = $_FILES['gal3'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);

		// print_r($file);
		// echo $width;
		// echo $height;

		if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packageimages/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

		if ($flag == 1)
			{
			$this->img['imagename'] = $file_name;
			$this->img['imagepath'] = $file_destination;
			$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
			$this->locimg['package'] = $ins_id;
			$this->locimg['file'] = $file_id;
			$this->obj_model->Insert_tbl('packageimage', $this->locimg);
			}

		// //////////gal4///

		$flag = 0;
		$file = $_FILES['gal4'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);

		// print_r($file);
		// echo $width;
		// echo $height;

		if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packageimages/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

		if ($flag == 1)
			{
			$this->img['imagename'] = $file_name;
			$this->img['imagepath'] = $file_destination;
			$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
			$this->locimg['package'] = $ins_id;
			$this->locimg['file'] = $file_id;
			$this->obj_model->Insert_tbl('packageimage', $this->locimg);
			}

		// //////////gal5///

		$flag = 0;
		$file = $_FILES['gal5'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);

		// print_r($file);
		// echo $width;
		// echo $height;

		if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packageimages/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

		if ($flag == 1)
			{
			$this->img['imagename'] = $file_name;
			$this->img['imagepath'] = $file_destination;
			$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
			$this->locimg['package'] = $ins_id;
			$this->locimg['file'] = $file_id;
			$this->obj_model->Insert_tbl('packageimage', $this->locimg);
			}

		// //////////gal6///

		$flag = 0;
		$file = $_FILES['gal6'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		$allowed = array(
			"gif",
			"png",
			"jpg",
			"jpeg"
		);

		// print_r($file);
		// echo $width;
		// echo $height;

		if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packageimages/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

		if ($flag == 1)
			{
			$this->img['imagename'] = $file_name;
			$this->img['imagepath'] = $file_destination;
			$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
			$this->locimg['package'] = $ins_id;
			$this->locimg['file'] = $file_id;
			$this->obj_model->Insert_tbl('packageimage', $this->locimg);
			}

		// /////////////////////////

		$data['location'] = $this->obj_model->get_all_pac();
		$data['amenities'] = $this->obj_model->get_table('amenities', array(
			'status' => '1'
		));
	$data['package'] = $this->obj_model->get_package_list();

		//	print_r($data);exit;

		$this->load->view('admin/listpackage', $data);
		//	$data['list'] = $this->obj_model->get_location_detail();
		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);
		//	$this->load->view('admin/listlocation',$data);

		}

	public

	function editpack()
		{
		$pack_id = $this->uri->segment(3);
		$data['location'] = $this->obj_model->get_all_pac();
		$data['package'] = $this->obj_model->get_all_package_details_admin($pack_id);
		$data['thumb'] = $this->obj_model->get_thumb_pack($pack_id);
		$data['slidepackage'] = $this->obj_model->get_slider_pack($pack_id);
		//print_r($data['slidepackage']);exit;
		$data['homepackage'] = $this->obj_model->get_home_pack($pack_id);
		//print_r($data['homepackage']);exit;
		//$data['amenities'] = $this->obj_model->get_loc_aminities($pack_id);
		$packageAminites  	= $this->obj_model->get_loc_aminities($pack_id);
		$allamenities 		= $this->obj_model->getLocationAmenites($data['package'][0]['locationId']);
		foreach($packageAminites as $locid){
			for($i = 0 ; $i< sizeof($allamenities);$i++){
				if($allamenities[$i]['id'] == $locid['id']){
					$allamenities[$i]["loc"] = true;
					break;
				}
			}
		}
		$data['amenities']   = $allamenities;	

		$this->load->view('admin/editpackage', $data);
		}

	public

	function updatepackage()
		{
		$id = $this->input->post('apid');
		$idth = $this->input->post('thid');

		//	echo $idth;exit;
		// ///////////gallmain

		$this->obj_model->deletehomeimg($id);

		// //////////gal1///

		$flag = 0;
		if(isset($_FILES['gal1'])){
			$file = $_FILES['gal1'];
			$file_name = $file['name'];
			$file_tmp = $file['tmp_name'];
			$file_ext = explode('.', $file_name);
			$file_ext = strtolower(end($file_ext));
			$allowed = array(
				"gif",
				"png",
				"jpg",
				"jpeg"
			);
			if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packageimages/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

			if ($flag == 1)
			{
				$this->img['imagename'] = $file_name;
				$this->img['imagepath'] = $file_destination;
				$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
				$this->locimg['package'] = $id;
				$this->locimg['file'] = $file_id;
				$this->obj_model->Insert_tbl('packageimage', $this->locimg);
			}
		}
		

		// print_r($file);
		// echo $width;
		// echo $height;

		

		// //////////gal2///

		$flag = 0;
		if(isset($_FILES['gal2'])){
			$file = $_FILES['gal2'];
			$file_name = $file['name'];
			$file_tmp = $file['tmp_name'];
			$file_ext = explode('.', $file_name);
			$file_ext = strtolower(end($file_ext));
			$allowed = array(
				"gif",
				"png",
				"jpg",
				"jpeg"
			);
			if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packageimages/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

			if ($flag == 1)
			{
				$this->img['imagename'] = $file_name;
				$this->img['imagepath'] = $file_destination;
				$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
				$this->locimg['package'] = $id;
				$this->locimg['file'] = $file_id;
				$this->obj_model->Insert_tbl('packageimage', $this->locimg);
			}
		}

		

		// //////////gal3///

		$flag = 0;
		if(isset($_FILES['gal3'])){
			$file = $_FILES['gal3'];
			$file_name = $file['name'];
			$file_tmp = $file['tmp_name'];
			$file_ext = explode('.', $file_name);
			$file_ext = strtolower(end($file_ext));
			$allowed = array(
				"gif",
				"png",
				"jpg",
				"jpeg"
			);
			if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packageimages/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}
			if ($flag == 1)
			{
			$this->img['imagename'] = $file_name;
			$this->img['imagepath'] = $file_destination;
			$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
			$this->locimg['package'] = $id;
			$this->locimg['file'] = $file_id;
			$this->obj_model->Insert_tbl('packageimage', $this->locimg);
			}
		}
		

		// //////////gal4///

		$flag = 0;
		if(isset($_FILES['gal4'])){
			$file = $_FILES['gal4'];
			$file_name = $file['name'];
			$file_tmp = $file['tmp_name'];
			$file_ext = explode('.', $file_name);
			$file_ext = strtolower(end($file_ext));
			$allowed = array(
				"gif",
				"png",
				"jpg",
				"jpeg"
			);
			if (in_array($file_ext, $allowed))
			{
				$file_name_new = uniqid('', true) . '.' . $file_ext;
				$file_destination = './uploads/packageimages/' . $file_name;
				if (move_uploaded_file($file_tmp, $file_destination))
				{
					$flag = 1;
				}
			}

			if ($flag == 1)
				{
				$this->img['imagename'] = $file_name;
				$this->img['imagepath'] = $file_destination;
				$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
				$this->locimg['package'] = $id;
				$this->locimg['file'] = $file_id;
				$this->obj_model->Insert_tbl('packageimage', $this->locimg);
				}
		}

		

		// //////////gal5///

		$flag = 0;
		if(isset($_FILES['gal5'])){
			$file = $_FILES['gal5'];
			$file_name = $file['name'];
			$file_tmp = $file['tmp_name'];
			$file_ext = explode('.', $file_name);
			$file_ext = strtolower(end($file_ext));
			$allowed = array(
				"gif",
				"png",
				"jpg",
				"jpeg"
			);
			if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packageimages/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

			if ($flag == 1)
			{
			$this->img['imagename'] = $file_name;
			$this->img['imagepath'] = $file_destination;
			$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
			$this->locimg['package'] = $id;
			$this->locimg['file'] = $file_id;
			$this->obj_model->Insert_tbl('packageimage', $this->locimg);
			}

		}

		

		

		// //////////gal6///

		$flag = 0;
		if(isset($_FILES['gal6'])){
			$file = $_FILES['gal6'];
			$file_name = $file['name'];
			$file_tmp = $file['tmp_name'];
			$file_ext = explode('.', $file_name);
			$file_ext = strtolower(end($file_ext));
			$allowed = array(
				"gif",
				"png",
				"jpg",
				"jpeg"
			);
			if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packageimages/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

		if ($flag == 1)
			{
			$this->img['imagename'] = $file_name;
			$this->img['imagepath'] = $file_destination;
			$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
			$this->locimg['package'] = $id;
			$this->locimg['file'] = $file_id;
			$this->obj_model->Insert_tbl('packageimage', $this->locimg);
			}
		}
		$this->obj_model->deleteslideimg($id);
		
		$flag = 0;
		if(isset($_FILES['sd2'])){
			$file = $_FILES['sd1'];
			$file_name = $file['name'];
			$file_tmp = $file['tmp_name'];
			$file_ext = explode('.', $file_name);
			$file_ext = strtolower(end($file_ext));
			$allowed = array(
				"gif",
				"png",
				"jpg",
				"jpeg"
			);
			if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packageslider/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}
			if ($flag == 1)
			{
			$this->img['imagename'] = $file_name;
			$this->img['imagepath'] = $file_destination;
			$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
			$this->locimgs['packageid'] = $id;
			$this->locimgs['imageid'] = $file_id;
			$this->obj_model->Insert_tbl('packagesliderimage', $this->locimgs);
			}
		}
		$flag = 0;
		if(isset($_FILES['sd2'])){
			$file = $_FILES['sd2'];
			$file_name = $file['name'];
			$file_tmp = $file['tmp_name'];
			$file_ext = explode('.', $file_name);
			$file_ext = strtolower(end($file_ext));
			$allowed = array(
				"gif",
				"png",
				"jpg",
				"jpeg"
			);
			if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packageslider/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

			if ($flag == 1)
			{
				$this->img['imagename'] = $file_name;
				$this->img['imagepath'] = $file_destination;
				$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
				$this->locimgs['packageid'] = $id;
				$this->locimgs['imageid'] = $file_id;
				$this->obj_model->Insert_tbl('packagesliderimage', $this->locimgs);
			}
		}
		

		// //////////slide3///

		$flag = 0;
		if(isset($_FILES['sd3'])){
			$file = $_FILES['sd3'];
			$file_name = $file['name'];
			$file_tmp = $file['tmp_name'];
			$file_ext = explode('.', $file_name);
			$file_ext = strtolower(end($file_ext));
			$allowed = array(
				"gif",
				"png",
				"jpg",
				"jpeg"
			);
			if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packageslider/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}
			if ($flag == 1)
			{
			$this->img['imagename'] = $file_name;
			$this->img['imagepath'] = $file_destination;
			$file_id = $this->obj_model->Insert_tbl(' file', $this->img);
			$this->locimgs['packageid'] = $id;
			$this->locimgs['imageid'] = $file_id;
			$this->obj_model->Insert_tbl('packagesliderimage', $this->locimgs);
			}


		}
		

		

		
		// ///slide////

		$flag = 0;
		if(isset($_FILES['slids'])){
			$file = $_FILES['slids'];
			$file_name = $file['name'];
			$file_tmp = $file['tmp_name'];
			$file_ext = explode('.', $file_name);
			$file_ext = strtolower(end($file_ext));
			$allowed = array(
				"gif",
				"png",
				"jpg",
				"jpeg"
			);
			if (in_array($file_ext, $allowed))
			{
			$file_name_new = uniqid('', true) . '.' . $file_ext;
			$file_destination = './uploads/packageimages/' . $file_name;
			if (move_uploaded_file($file_tmp, $file_destination))
				{
				$flag = 1;
				}
			}

			if ($flag == 1)
			{
				$imagename = $file_name;
				$imagepath = $file_destination;
				$user_itemimg = array(
					'imagename' => $file_name,
					'imagepath' => $imagepath
				);
				$this->obj_model->common_update($idth, "id", "file", $user_itemimg);
			}
		}
		
		$location = $this->input->post('location');
		$Package = $this->input->post('Package');
		$packagedescription = $this->input->post('Description');

		// $this->data['noperson']    = $this->input->post('noperson');

		$packagedays = $this->input->post('days');
		$packageprize = $this->input->post('price');
		$noperson = $this->input->post('noperson');
		$activestate = $this->input->post('minimal-radio');
		$user_itemsare = array(
			'location' => $location,
			'Package' => $Package,
			'packagedescription' => $packagedescription,
			'packagedays' => $packagedays,
			'packageprize' => $packageprize,
			'noperson' => $noperson,
			'activestate' => $activestate
		);
		$this->obj_model->common_update($id, "id", "package", $user_itemsare);

		// /
		//	print_r($user_itemsare);exit;
		//	echo "f";exit;
		// $ins_id = $this->obj_model->Insert_tbl('package',$this->add);

		
		$prefer= $this->input->post('amni');
		$aminetiesList =  array();
		for($i= 0 ; $i< sizeof($prefer);$i++ ){
			$amItem = array(
                'package' => $id,
                'amenities' => $prefer[$i],
				'ispayable' => 0,
				'status' => 1
        	);
			array_push($aminetiesList,$amItem);	
		}
		//$this->amni['package'] = $id;
		//$this->amni['amenities'] = implode(",", $prefer);
		$this->obj_model->deleteamnipack($id);

		// print_r($this->amni['amenities']);exit;

		$am = $this->obj_model->Insert_tbl_batch('packageamenities', $aminetiesList);

		$data['package'] = $this->obj_model->get_package_list();

		//	print_r($data);exit;

		$this->load->view('admin/listpackage', $data);
		}

	public

	function registerbook()
		{
		$pack_id = $this->input->post('loid');
		$data['chkin'] = $this->input->post('datepicker-12');
		$data['chkout'] = $this->input->post('datepicker-13');
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$email = $this->input->post('emailids');
		$mobile = $this->input->post('mobile');
		$pass = $this->input->post('password');
		$password = md5($pass);
		$usertype = 2;
		$result_data = $this->obj_model->register($fname, $lname, $email, $mobile, $password, $usertype);
		$user_id = $result_data;

		//	  $this->session->set_userdata('user_name',$res_user->user_name);

		$this->session->set_userdata('user_id', $user_id);
		$data['userinfo'] = $this->obj_model->get_userdetails($user_id);

		// print_r($data);
		// $loc_id		=	 $this->input->post('locm');

		$data['chkin'] = $this->session->userdata('frmses');

		// $this->session->userdata('user_id');

		$data['chkout'] = $this->session->userdata('toses');
		$pack_id = $this->input->post('loid');
		$data['package'] = $this->obj_model->get_all_package_details($pack_id);

		// print_r($data);
		// $data['packsliderss']    = $this->obj_model->getpacksliderimg($pack_id);

		$data['packsliderss'] = $this->obj_model->get_slider_pack($pack_id);

		// print_r($data['packsliderss']);

		$data['location'] = $this->obj_model->getlocationimg();
		$data['package'] = $this->obj_model->get_all_package_details($pack_id);

		// print_r($data);

		$this->load->view('detail', $data);
		}

	public

	function searchpackage()
		{
		$district_id = $this->input->post('district_id');
		
		$data['dis_id']= $this->input->post('district_id');
		$data['chkin'] = $this->input->post('datepickerfr');
		$data['chkout'] = $this->input->post('datepickerto');
		$frm = $this->input->post('datepickerfr');
		$to = $this->input->post('datepickerto');
		$this->session->set_userdata('frmses', $frm);
		$this->session->set_userdata('toses', $to);

		// $district_id;
		// $data['list'] = $this->obj_model->get_location_detail();
		// print_r($data['sub_category']);exit;
		// $this->load->view($this->list_adverisements,$data);

		$data['package'] = $this->obj_model->get_package_details($district_id);

		// print_r($data);
		// $data['district']    = $this->obj_model->getlocationfull();

		$data['district'] = $this->obj_model->getlocationfull();
		$this->load->view('packagelist', $data);
		}

	public

	function packagedetails()
		{
		$pack_id = $this->uri->segment(3);
		$data['chkin'] = $this->session->userdata('frmses');

		// $this->session->userdata('user_id');

		$data['chkout'] = $this->session->userdata('toses');
		$data['package'] = $this->obj_model->get_all_package_details_view($pack_id);

		// print_r($data);
		// $data['packsliderss']    = $this->obj_model->getpacksliderimg($pack_id);

		$data['packsliderss'] = $this->obj_model->get_slider_pack($pack_id);

		$data['packages'] = $this->obj_model->getpackageimg();
		// print_r($data['packsliderss']);
$data['location_package'] = $this->obj_model->get_location_package_detail();

		$data['location'] = $this->obj_model->getlocationimg();
	//$data['location'] = $this->obj_model->getlocationimg_packimages($pack_id);
		$this->load->view('detail', $data);
		}

	public

	function select_details()
		{
		$data['chkin'] = $this->session->userdata('frmses');

		// $this->session->userdata('user_id');

		$data['chkout'] = $this->session->userdata('toses');
		$data['personcount'] = $this->input->post('no_person');

		// /////////////////////////////////

		$data['countries'] = $this->obj_model->get_table('countries', array(
			'status' => '1'
		));
		$pack_id = $this->input->post('pakkid');
		$data['package'] = $this->obj_model->get_all_package_details($pack_id);
		//print_r($data['package']);exit;
		
		$this->load->view('booking', $data);

		//  $this->data['details']        = $this->obj_model->getlocdetail($loc_id);
		//   $this->load->view("detail", $this->data);

		}

	public

	function booking_confirm()
		{
			
			
		$user_id = $this->session->userdata('user_id');
		$this->data['user_id'] = $user_id;
		$this->data['first_name'] = $this->input->post('firstname');
		$this->data['last_name'] = $this->input->post('lastname');
		$address1 = $this->input->post('addressone');
		$address2 = $this->input->post('addresstwo');
		$country = $this->input->post('country');
		$state = $this->input->post('state');
		$city = $this->input->post('city');
		$pin = $this->input->post('postcode');
		$this->data['email'] = $this->input->post('email');
		$this->data['mobile'] = $this->input->post('phonename');

		// $this->data['addinfo']		=	 $this->input->post('additional');

		$this->data['check_in'] = $this->input->post('in');
		$this->data['check_out'] = $this->input->post('out');

		// print_r($this->data);exit;

		$this->data['noday'] = $this->input->post('noday');
		$this->data['no_pesrson'] = $this->input->post('quantity');
		$this->data['packpr'] = $this->input->post('packpr');
		$this->data['nopac'] = $this->input->post('nopac');

		// //insert address////////////////////

		$this->add['address_line1'] = $address1;
		$this->add['address_line2'] = $address2;
		$this->add['postalcode'] = $pin;

		// $this->data['noperson']    = $this->input->post('noperson');

		$this->add['country'] = $country;
		$this->add['state '] = $state;
		$this->add['city '] = $city;

		//	echo "gyu";exit;

		$addres_ins_id = $this->obj_model->Insert_tbl('address', $this->add);
		$tot_amt = $this->input->post('tot');
		$this->data['tot_amount'] = $this->input->post('tot');
		$this->data['pkd'] = $this->input->post('pkd');
		$this->guest['firstname'] = $this->input->post('firstname');
		$this->guest['lastname'] = $this->input->post('lastname');
		$this->guest['address'] = $addres_ins_id;
		$prigest = $this->obj_model->Insert_tbl('guest', $this->guest);
		$orderplacedate = date('Y-m-d');

		// echo $orderplacedate;

		$prigesssst = $this->obj_model->getlocationbypack($this->input->post('pkd'));
		foreach($prigesssst as $pak)
			{
			$as = $pak['loid'];
			}

		$this->order['orderplacedate'] = $orderplacedate;
	//	$this->order['bookingstartdate'] = $this->input->post('in');
	//	$this->order['bookingenddate'] = $this->input->post('out');
			$this->order['bookingstartdate'] =  date ("Y-m-d H:i:s", strtotime($this->input->post('in')));
		$this->order['bookingenddate'] = date ("Y-m-d H:i:s", strtotime($this->input->post('out')));
		
		
		


		
		
		$this->order['bookedby'] = $user_id;
		$this->order['primaryguest'] = $prigest;
		$this->order['package'] = $this->input->post('pkd');
		$this->order['amount'] = $tot_amt;
		$this->order['packagecount'] = $this->input->post('nopac');
		$this->order['no_persons'] = $this->input->post('personcount');
		$this->order['paymentoption'] = 1;
		$orderid = $this->obj_model->Insert_tbl('order', $this->order);
		$this->ordergu['orderid'] = $orderid;
		$this->ordergu['guest'] = $prigest;
		$this->obj_model->Insert_tbl('orderguest', $this->ordergu);

		// print_r($this->data);exit;
		//	$this->obj_model->Insert_tbl('booking_details',$this->data);
		// //////////////maillllllllllllllllll/////////////////////////////////////////////
		// /mailend//////////////////////////////////////
		// //////////////////////////////////

		$toEmail = $this->input->post('email');
			$this->load->library('email');
		$this->load->library('parser');
		$config = Array(
			'protocol' => 'MAIL_DRIVER',
			'MAIL_HOST' => 'mail.codefacetech.com',
			'MAIL_PORT' => 26,
			'MAIL_USERNAME' => 'jungle@codefacetech.com',
			'MAIL_PASSWORD' => 'DpS]%E757#d*',
			'mailtype' => 'html',
			'charset' => 'utf-8'
		);
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
		$data['check_in'] = $this->input->post('in');

		// $loname= $this->obj_model->locname($lo);
		// print_r($loname);exit;
		// $data['locname']=$loname;

		
		
			$state = $this->input->post('state');
		$city = $this->input->post('city');
		$country = $this->input->post('country');
	
		$placedetails = $this->obj_model->placedetails($city);	
		
foreach($placedetails as $am)
{
	$cityname=$am['c_name'];
	$statename=$am['s_name'];
	$countryname=$am['name'];
}
		//echo $cityname;	echo $statename;	echo $countryname ;exit;;
		
		
		
		
		$data['first_name'] = $this->input->post('firstname');
		$data['last_name'] = $this->input->post('lastname');
		$data['addresson'] = $this->input->post('addressone');	$data['addresstw'] = $this->input->post('addresstwo');
		$data['state'] = $statename;
		$data['city']= $cityname;
		$data['country'] = $countryname;
		$data['pin'] = $this->input->post('postcode');
		$data['email'] = $this->input->post('email');
		$data['mobile'] = $this->input->post('phonename');
	$data['curdate'] = date('Y-m-d h:i:sa');

		// $data['addinfo']		=	 $this->input->post('additional');

		$data['check_in'] = $this->session->userdata('frmses');
		$data['check_out'] =  $this->session->userdata('toses');

		//	$data['no_tents']		=	 $this->input->post('no_tent');

		$data['no_pesrson'] = $this->input->post('quantity');
		$data['tot_amount'] = $this->input->post('tot');
		$this->data['packpr'] = $this->input->post('packpr');
		$this->data['nopac'] = $this->input->post('nopac');
		$this->data['noday'] = $this->input->post('noday');

		
			
$a= $this->input->post('pkd');
$data['pakname'] = $this->obj_model->get_all_package_details_admin($a);

		// $data['check_out']=	  $this->input->post('out');

	

		 $mesg = $this->parser->parse('mail', $data, true);
		
		
		
		$message = '';
		$message = " jungle test";

		// $toEmail = $this->input->post('reemail');

		$to = $toEmail; // undefine
		$this->email->clear();
		$this->email->from('jungle@codefacetech.com');
		$this->email->to($toEmail);
		$this->email->subject("Booking information");
		$this->email->message($mesg);
		if (!$this->email->send())
			{
			echo "fail <br />";
			echo $this->email->print_debugger();
			/*$this->session->set_flashdata('flash_message', 'Password reset fail.');
			redirect(site_url().'/main/register');*/
			}

		// ////////////////////////////
		//	$this->load->view('user/dasboard',$data);

		$this->load->view('mail', $data);

		//  $this->data['details']        = $this->obj_model->getlocdetail($loc_id);
		//   $this->load->view("detail", $this->data);

		}
		
			function deletepack()
		{
		$pack_id = $this->uri->segment(3);
		$data['package'] = $this->obj_model->deletepackage($pack_id);
		//$this->load->view('admin/editlocation', $data);
		
		$data['package'] = $this->obj_model->get_package_list();

		//	print_r($data);exit;

		$this->load->view('admin/listpackage', $data);
		}
		function bookingusercancel()
		{
		$order_id = $this->uri->segment(3);
		//$data['cancel'] = $this->obj_model->bookingusercancel($order_id);
		//$this->load->view('admin/editlocation', $data);
			//$id = $this->obj_model->update_pass($password, $user_id);
		
		
			$data['cancel'] = $this->obj_model->bookingusercancel(2,$order_id);
			$user_id = $this->session->userdata('user_id');
		$data['userphoto'] = $this->obj_model->get_userphoto($user_id);
		$data['userinfo'] = $this->obj_model->get_userdetails($user_id);

		// print_r($data);exit;

		$this->load->view('user/dasboard', $data);
		
		}
		function bookingadmincancel()
		{
		$order_id = $this->uri->segment(3);
		//$data['cancel'] = $this->obj_model->bookingusercancel($order_id);
		//$this->load->view('admin/editlocation', $data);
			//$id = $this->obj_model->update_pass($password, $user_id);
		
		
			$data['cancel'] = $this->obj_model->bookingadmincancel(2,$order_id);
			
			
			$data['location'] = $this->obj_model->getlocationfull();
		$data['details'] = $this->obj_model->oderfulldetailsadmin();
		$month = date('m');
		$data['resultall'] = $this->obj_model->searchmonthresultnow($month);
			//$user_id = $this->session->userdata('user_id');
		$this->load->view('admin/main', $data);
		// print_r($data);exit;

		
		}
		
		function packagedetailshome()
		{
		$pack_id = $this->uri->segment(3);
		
		$frm = date('Y-m-d');
		$to=date('Y-m-d', strtotime(' +1 day'));
		//echo $orderplacedate;exit;
		
		
		$this->session->set_userdata('frmses', $frm);
		$this->session->set_userdata('toses', $to);
		
		$data['chkin'] = $this->session->userdata('frmses');

		// $this->session->userdata('user_id');

		$data['chkout'] = $this->session->userdata('toses');
		//print_r($data);exit;
		$data['package'] = $this->obj_model->get_all_package_details_view($pack_id);

		// print_r($data);
		// $data['packsliderss']    = $this->obj_model->getpacksliderimg($pack_id);

		$data['packsliderss'] = $this->obj_model->get_slider_pack($pack_id);

		// print_r($data['packsliderss']);
$data['location_package'] = $this->obj_model->get_location_package_detail();

		$data['location'] = $this->obj_model->getlocationimg();
	//$data['location'] = $this->obj_model->getlocationimg_packimages($pack_id);
		$this->load->view('detail', $data);
		}

		
	/*function getamiCategory()
		{
		$district_id = $_POST['l_id'];
		$sections = $this->obj_model->getamiCategory($district_id);
		
		//print_r($sections);exit;
		$str = '<option value="">Select</option>';
		if ($sections)
			{
			foreach($sections as $row)
				{
				$msg = '';
				//$str = $str . '<option value="' . $row['amid'] . '"' . $msg . '>' . $row['name'] . '</option>';
			$str = $str .'' . $row['name'] . '<input type="checkbox" name="amni[]" id="amni" value="' . $row['amid'] . '"  />
                         <span class="checkmark"></span>';
                                                           //  </label>';
                        //                                    </li>';
				//
				}
			}

		echo json_encode($str);
		}*/
	
		//deleteimages
		
		
	function deleteimages()
		{
		$pack_id = $this->uri->segment(3);
		
		$a= $this->obj_model->deletegalleryimages($pack_id);
		//$this->load->view('admin/editlocation', $data);
		
	$data['package'] = $this->obj_model->get_package_list();

		//	print_r($data);exit;

		$this->load->view('admin/listpackage', $data);
		//$data['list'] = $this->obj_model->get_location_list();

		// print_r($data);exit;

		//$this->load->view('admin/listlocation', $data);
		}
		function deletelocationimages()
		{
		$pack_id = $this->uri->segment(3);
		
		$a= $this->obj_model->deletelocationimages($pack_id);
		//$this->load->view('admin/editlocation', $data);
		
	//		$data['package'] = $this->obj_model->get_package_list();

		//	print_r($data);exit;

	//	$this->load->view('admin/listpackage', $data);
		$data['list'] = $this->obj_model->get_location_list();

		// print_r($data);exit;

		$this->load->view('admin/listlocation', $data);
		}
	}