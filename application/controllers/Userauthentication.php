<?php defined('BASEPATH') OR exit('No direct script access allowed');
use OpenTok\OpenTok;
use OpenTok\MediaMode;
class Userauthentication extends CI_Controller
{
    public $opentok;
    function __construct() {
        parent::__construct();
        
        // Load facebook library
        $this->load->library('facebook');
        
        //Load user model
        $this->load->model('user');
        $this->load->library(array('session', 'upload','form_validation'));
	    $this->load->helper(array('url', 'html', 'form'));
	    $this->load->model('Users_model', 'obj_model', TRUE);  
        $this->load->helper('date');
    }
    public function index(){
        $userData = array();
     //   echo "fgdfgdgggzs";
        // Check if user is logged in
      //  if($this->facebook->is_authenticated()){
			 //  echo "fgdfgdgggzs";exit;
            // Get user facebook profile details
            $fbUserProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,locale,cover,picture,name');
            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $fbUserProfile['id'];
            $userData['full_name'] = $fbUserProfile['first_name']." ".$fbUserProfile['last_name'];
            $userData['email'] = $fbUserProfile['email'];
            $userData['gender'] = 2;//$fbUserProfile['gender'];
            $userData['user_name'] = $fbUserProfile['email'];
            $userData['password'] = "";
		
	//	print_r($userData);exit;
			
          //  $nickname = $fbUserProfile['name'];
            //$userData['picture'] = $fbUserProfile['picture']['data']['url'];
            //$userData['link'] = $fbUserProfile['link'];
            // Insert or update user data
            $userID = $this->user->checkUser($userData,$nickname);
            // Check user data insert or update status
            if(!empty($userID)){
                /*$data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);*/
                $result = $this->obj_model->getUserById($userID);
                $users_id = $result['user_id'];
                $users_name = $result['user_name'];
                $session_array = array('user_id'=>$users_id,'user_name'=>$users_name);
                $this->session->set_userdata($session_array);
                $param['user_id']=$users_id;
                $uid=$users_id;
                $res=$this->obj_model->check_session($users_id);
                $sessionId;
                $opentok = new OpenTok($this->config->item('opentok_key'), $this->config->item('opentok_secret'));
                foreach($res as $row){
                    if($row==null){
                        $session = $opentok->createSession(array('mediaMode' => MediaMode::ROUTED));
                        $sessionId = $session->getSessionId();
                    }else{
                        $sessionId=$row;
                    }
                }
                $data['tokenid'] = $opentok->generateToken($sessionId);	
                $this->obj_model->insert_session($uid,$sessionId);
                $session_array = array('user_id'=>$users_id,'user_name'=>$users_name,'token' => $data['tokenid'],'openSessionId' =>$sessionId );
                $this->session->set_userdata($session_array);
                $unameTest=$this->users_model->checkUserOnline($users_id);
                if(!empty($unameTest)){
                    $unameTest=$this->users_model->UpdateOnline($users_id,1);
                }else{
                    $result = $this->users_model->InsertOnline($param);
                }
                redirect('user/profile',"refresh");           
                //redirect(base_url()."index.php/user/profile");
            }else{
               $data['userData'] = array();
            }
            
            // Get logout URL
            $data['logoutURL'] = $this->facebook->logout_url();
      //  }else{
            // Get login URL
         //   $data['authURL'] =  $this->facebook->login_url();
       // }
        
        // Load login & profile view
        //$this->load->view('user_authentication/index',$data);
    }

    public function logout() {
        // Remove local Facebook session
        $this->facebook->destroy_session();
        // Remove user data from session
        $this->session->unset_userdata('userData');
        // Redirect to login page
        redirect('/user_authentication');
    }
}