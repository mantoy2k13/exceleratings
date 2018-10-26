<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function index()
	{
		$this->load->view('front/home');
	}
	
	public function review()
	{
		$this->db->select('*');
		$this->db->from('rev_questions');
		$this->db->where('status', 1);
		$this->db->order_by('shorting', 'ASC');
		$data['ques'] = $this->db->get()->result_object();
		
		$this->load->view('front/review', $data);
	}
	public function review_add()
	{
		prex( $_POST );
		$this->load->view('front/review', $data);
	}
}
