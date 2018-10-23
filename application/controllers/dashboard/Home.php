<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
       parent::__construct();
		 
		 if( !isset( $_SESSION['user_loged'] ) ){
			$this->session->set_flashdata('error', 'Please login first !!!');
			redirect('auth/login');
		 }
		$this->logedin_usertype = $this->session->userdata('logedin_user')->usertype;
	}
	public $logedin_usertype;
	
	public function index()
	{
		if($this->session->userdata('logedin_user')->usertype == 'superadmin'){
			$this->load->view('dashboard/home-superadmin');
		}else{
			$this->load->view('dashboard/home');
		}
	}
}
