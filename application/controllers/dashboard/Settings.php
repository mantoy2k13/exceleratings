<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct() {
       parent::__construct();
		 
		 if( !isset( $_SESSION['user_loged'] ) ){
			$this->session->set_flashdata('error', 'Please login first !!!');
			
			redirect('auth/login');
		 }
			
		$this->logedin_usertype = $this->session->userdata('logedin_user')->usertype;
	}
	
	public $logedin_usertype;
	
	public function check_usertype( $chk_label ){
		
		$this->logedin_usertype = $this->session->userdata('logedin_user')->usertype;
		if( $this->logedin_usertype == $chk_label ){
			return true;
		}else{
			$this->session->set_flashdata('error', 'please login as superadmin !!!');
			
			redirect('auth/login');
			return false;
		}
	}
	
	public function index()
	{
		$this->load->view('dashboard/settings', $data);
	}
	
	public function rev_questions()
	{
		$this->load->view('dashboard/settings', $data);
	}
	public function rev_question_add()
	{
		
		if( isset($_POST['rev_question_add']) ){

			$question_form = [
				'question' => $this->input->post('question'),
				'answer_option' => $this->input->post('answer_option')
			];
		  if($this->db->insert('rev_questions', $question_form)){
				$this->session->set_flashdata('success', 'Saved');
				redirect('dashboard/settings/rev_question_add');
		  }
		}
		
		$this->load->view('dashboard/rev-question-add');
	}
	
	
}



