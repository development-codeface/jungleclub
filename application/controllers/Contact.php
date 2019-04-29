<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	 
	 function __construct()
	 {
	 	parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->library('form_validation');
     	$this->load->helper(array('form', 'url'));
	
		
	 }
	 
	public function index()
	{
	
		
			$this->load->view('contact');
	
	}
	
	
	
	
}
