<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
	//	$this->load->view('welcome_message');
	}
	
	public function user_data_by_id( $uid = null ){
		if( $uid != null ){
			
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('user_profile', 'user_profile.uid = users.id', 'left');
			$this->db->join('subs_packages', 'subs_packages.spk_slug = users.subs_package_slug', 'left');
			$this->db->where('users.id', $uid);
			$userdata = $this->db->get()->row();
			unset($userdata->password);
			return $userdata;
		}else{
			return [];
		}
	//	prex($uid);
	}
}