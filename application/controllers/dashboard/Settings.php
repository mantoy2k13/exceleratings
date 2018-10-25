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
		$this->db->select('*');
		$this->db->from('rev_questions');
		$this->db->order_by('shorting', 'ASC');
		$data['ques'] = $this->db->get()->result_object();
		
		$this->load->view('dashboard/rev-question-list', $data);
	}
	public function rev_question_add()
	{
		
		if( isset($_POST['rev_question_add']) ){

			$question_form = [
				'question' => $this->input->post('question'),
				'answer_option' => $this->input->post('answer_option')
			];
		  if($this->db->insert('rev_questions', $question_form)){
				$insert_qid = $this->db->insert_id();
				$this->session->set_flashdata('success', 'Saved');
				redirect('dashboard/settings/rev_question/'. $insert_qid);
		  }
		}
		
		$this->load->view('dashboard/rev-question-add');
	}
	/* 
	public function rev_question($qid = null)
	{
		if( $qid != null ){
				
			
			if( isset($_POST['rev_question_update']) ){

				$question_form = [
					'question' => $this->input->post('question'),
					'answer_option' => $this->input->post('answer_option')
				];
				$this->db->where('qid', $qid);
			  if($this->db->update('rev_questions', $question_form)){
					$this->session->set_flashdata('success', 'Updated <b>"'.$this->input->post('question').'"</b>');
					redirect('dashboard/settings/rev_question/'.$qid);
			  }
			}
			$this->db->select('*');
			$this->db->from('rev_questions');
			$this->db->where('qid', $qid);
			$data['question'] = $this->db->get()->row();
			$this->load->view('dashboard/rev-question-list');
		}else{
			$this->load->view('dashboard/rev-question-list');
		}
	}
 */

	public function rev_question_edit()
	{
		$qid = $this->input->post('qid');
		if( isset($_POST['rev_question_update']) ){

			$question_form = [
				'question' => $this->input->post('question'),
				'status' => $this->input->post('status'),
				'answer_option' => $this->input->post('answer_option')
			];
		//	prex($qid);
			
			$this->db->where('qid', $qid);
		  if($this->db->update('rev_questions', $question_form)){
				$this->session->set_flashdata('success', 'Updated <h6>"'.$this->input->post('question').'"</h6>');
				redirect('dashboard/settings/rev_questions/');
		  }
		}
	}
	

	public function ajax_get_all_questions()
	{
		$this->db->select('*');
		$this->db->from('rev_questions');
		$this->db->order_by('qid', 'DESC');
		$ques = $this->db->get()->result_object();
		
		$data['data'] = [];
		$q_data = [];
		foreach( $ques as $q_k => $q_v ){
			$answer_option = '';
			if( $q_v->answer_option == 'yes_no' ){
				$answer_option = 'Yes/No selection';
			}else if( $q_v->answer_option == 'rev_1_5' ){
				$answer_option = 'Review 1-5 selection';
			}else if( $q_v->answer_option == 'rev_1_10' ){
				$answer_option = 'Review 1-10 selection';
			}
			
			$status = '<span class="badge badge-info">ACTIVE</span>';
			if( $q_v->status == '0' ){
				$status = 'Inactive';
			}
			
			$q_data['sl'] = $q_k *1 +1;
			$q_data['question'] = '<span class="qs">' . $q_v->question . '</span> <small>('. $q_v->qid .')</small>';
			$q_data['answer_option'] = $answer_option . '<span class="ans" hidden>'. $q_v->answer_option .'</span>';
			$q_data['status'] = $status . '<span class="sts" hidden>'. $q_v->status .'</span>';
			$q_data['action'] = '<button data-qid="'. $q_v->qid .'" data-toggle="modal" data-target="#qusEditForm" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" title="">
                  <i class="fa fa-fw fa-lg fa-eye"></i> / <i class="fa fa-fw fa-lg fa-edit"></i></button> &nbsp; 
						<button type="button" class="btn btn-outline-secondary btn-sm toremove" data-toggle="tooltip" data-id="'. $q_v->qid .'">
                  <i class="fa fa-fw fa-lg fa-close"></i></button>';
			
			array_push($data['data'], $q_data);
		}
	//	exit;
	//	prex($data);
	//	print_r($posts->result_array());
		echo json_encode($data);
	}
	
	public function remove_qs_item(){
		if( $_POST ){			
						
			if ( $this->db->delete('rev_questions', array('qid' => $this->input->post('id'))) ) {
				 $result = 'Success';
			} else {
				 $result = 'Error!';
			}
			echo json_encode($result);
		}else{
			echo 'Not posted !';
		}
	}
	
	public function qShortingSave(){
			
		if( $_POST ){	
		//	prex($_POST);
		
			foreach( $_POST as $q_k => $q_v ){
				
				$question_shorting = [
					'shorting' => $q_k
				];
				
				$this->db->where('qid', $q_v);
				$this->db->update('rev_questions', $question_shorting);
				
			}
			echo 'done';
		}else{
			echo 'Not posted !';
		}
	}
	
	
}



