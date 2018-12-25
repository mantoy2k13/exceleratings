<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuperAdmin extends CI_Controller {

	function __construct() {
       parent::__construct();
		 
		 if( !isset( $_SESSION['user_loged'] ) ){
			$this->session->set_flashdata('error', 'Please login first !!!');
			
			redirect('auth/login');
		 }
		$this->load->model('User_model');		
		$this->logedin_usertype = $this->User_model->user_data_by_id( $this->session->userdata('logedin_user')->id )->usertype;
		$this->logedin_user = $this->User_model->user_data_by_id( $this->session->userdata('logedin_user')->id );
			
		$this->load->model('General_model');
		$this->logedin_usertype = $this->session->userdata('logedin_user')->usertype;
	}
	
	public $logedin_usertype;
	
	
	
	public function service_categories( $sid = null ){
		if( $this->logedin_user->usertype != 'superadmin' ){
			redirect('dashboard');
		}
		$data['menuitem4'] = 'service_categories';
		
		$this->db->select('*');
		$this->db->from('service_categories');
		$this->db->order_by('id', 'DESC');
		$data['services'] = $this->db->get()->result_object();
		$data['edit_item'] = '';
		
		if( $sid == null ){
			$data['page_env'] = 'addnew';
			if( isset($_POST['add_contact']) ){

				$contact2add = [
					'title' => $this->input->post('title') ? $this->input->post('title') : '',
					'status' => $this->input->post('status') ? $this->input->post('status') : 0
				];
				if($this->db->insert('service_categories', $contact2add)){
					$insert_qid = $this->db->insert_id();
					$this->session->set_flashdata('success', '<< Added new service category');
					redirect('dashboard/superadmin/service_categories');
				}
			}
		}else{
			$data['page_env'] = 'edit';
			$data['edit_item'] = $sid;
			
			$this->db->select('*');
			$this->db->from('service_categories');
			$this->db->where('id', $sid);
			$data['serviceItem'] = $this->db->get()->row();
			if( isset($_POST['edit_contact']) ){

				$contact2edit = [
					'title' => $this->input->post('title'),
					'status' => $this->input->post('status')
				];
				$this->db->where('id', $sid);
			  if($this->db->update('service_categories', $contact2edit)){
					$insert_qid = $this->db->insert_id();
					$this->session->set_flashdata('success', 'Service Category updated');
					redirect('dashboard/superadmin/service_categories/' . $sid);
			  }
			}	
		}
		$this->load->view('dashboard/service-categories', $data);
	}
	public function service_category_remove( $sid = null ){
		
		if( $this->logedin_user->usertype != 'superadmin' ){
			redirect('dashboard');
		}
		if( $sid != null ){
			$data['page_env'] = 'addnew';
	
			$this->db->where('id', $sid);
			if($this->db->delete('service_categories')){
				$this->session->set_flashdata('remvoe_success', 'Contact item removed successfully');
				redirect('dashboard/superadmin/service_categories');
			}
		}
	}
		
} /* ==========================[ / End SuperAdmin Class ]========================== */



