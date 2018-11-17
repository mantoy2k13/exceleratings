<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
	//	$this->load->view('welcome_message');
	}
	
	public function get_note_contacts(){

		$this->db->select('*');
		$this->db->from('notification_contacts');
		$this->db->where('status', 1);
		$conts = $this->db->get()->result_object();
		
		return $conts;
	}
		
}
