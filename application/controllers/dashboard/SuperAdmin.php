<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {

   function __construct() {
      parent::__construct();

      if (!isset($_SESSION['user_loged'])) {
         $this->session->set_flashdata('error', 'Please login first !!!');

         redirect('auth/login');
      }
      $this->load->model('User_model');
      $this->logedin_usertype = $this->User_model->user_data_by_id($this->session->userdata('logedin_user')->id)->usertype;
      $this->logedin_user = $this->User_model->user_data_by_id($this->session->userdata('logedin_user')->id);

      $this->load->model('General_model');
      $this->logedin_usertype = $this->session->userdata('logedin_user')->usertype;
   }

   public $logedin_usertype;

   public function service_categories($sid = null) {
      if ($this->logedin_user->usertype != 'superadmin') {
         redirect('dashboard');
      }
      $data['menuitem4'] = 'service_categories';

      $this->db->select('*');
      $this->db->from('service_categories');
      $this->db->order_by('id', 'DESC');
      $data['services'] = $this->db->get()->result_object();
      $data['edit_item'] = '';

      if ($sid == null) {
         $data['page_env'] = 'addnew';
         if (isset($_POST['add_contact'])) {

            $contact2add = [
                'title' => $this->input->post('title') ? $this->input->post('title') : '',
                'status' => $this->input->post('status') ? $this->input->post('status') : 0
            ];
            if ($this->db->insert('service_categories', $contact2add)) {
               $insert_qid = $this->db->insert_id();
               $this->session->set_flashdata('success', '<< Added new service category');
               redirect('dashboard/superadmin/service_categories');
            }
         }
      } else {
         $data['page_env'] = 'edit';
         $data['edit_item'] = $sid;

         $this->db->select('*');
         $this->db->from('service_categories');
         $this->db->where('id', $sid);
         $data['serviceItem'] = $this->db->get()->row();
         if (isset($_POST['edit_contact'])) {

            $contact2edit = [
                'title' => $this->input->post('title'),
                'status' => $this->input->post('status')
            ];
            $this->db->where('id', $sid);
            if ($this->db->update('service_categories', $contact2edit)) {
               $insert_qid = $this->db->insert_id();
               $this->session->set_flashdata('success', 'Service Category updated');
               redirect('dashboard/superadmin/service_categories/' . $sid);
            }
         }
      }
      $this->load->view('dashboard/service-categories', $data);
   }

   public function service_category_remove() {
      if ($this->logedin_user->usertype != 'superadmin') {
         redirect('dashboard');
      } else {
         if ($this->input->post('sid')) {
            $sid = $this->input->post('sid');
            $this->db->where('id', $sid);
            if ($this->db->delete('service_categories'))
               echo 1;
            else
               echo 0;
         }
         else {
            redirect('dashboard/superadmin/service_categories');
         }
      }
      // if( $sid != null ){
      // 	$data['page_env'] = 'addnew';
      // 	$this->db->where('id', $sid);
      // 	if($this->db->delete('service_categories')){
      // 		$this->session->set_flashdata('remove_success', 'Contact item removed successfully');
      // 		redirect('dashboard/superadmin/service_categories');
      // 	}
      // }
   }

   public function users($uid = null) {
      if ($this->logedin_user->usertype != 'superadmin') {
         redirect('dashboard');
      }
      $data['menuitem4'] = 'users';

      $this->db->select('*');
      $this->db->from('users');
      $this->db->order_by('id', 'DESC');
      $data['services'] = $this->db->get()->result_object();
      $data['edit_item'] = '';

      $this->load->view('dashboard/users', $data);
   }

   
   
	public function ajax_get_all_users()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('usertype !=', 'superadmin');
		$this->db->order_by('id', 'DESC');
		$ques = $this->db->get()->result_object();
		
		$data['data'] = [];
		$q_data = [];
		foreach( $ques as $q_k => $q_v ){
			$answer_option = '';
			$pkg = '';
         if( $q_v->subs_package_slug == 'gold'  ){
            $pkg = '<span class="badge badge-danger">Gold</span>';
         }elseif( $q_v->subs_package_slug == 'silver'  ){
            $pkg = '<span class="badge badge-secondary">Silver</span>';
         }elseif( $q_v->subs_package_slug == 'bronze'  ){
            $pkg = '<span class="badge badge-warning">Bronze</span>';
         }elseif( $q_v->subs_package_slug == 'free'  ){
            $pkg = 'Free';
         }
         
			$q_data['sl'] = $q_k *1 +1;
			$q_data['the_user'] =  'Username: <b>' . $q_v->username . '</b><br>' .$q_v->email;
			$q_data['subs_plan'] = $pkg;
			$q_data['action'] = '<a href="'. base_url('dashboard/settings/profile/') . $q_v->id .'" class="btn btn-outline-secondary btn-sm" title="">
                  <i class="fa fa-fw fa-lg fa-eye"></i> <i class="fa fa-fw fa-lg fa-edit"></i></a>';
			
			array_push($data['data'], $q_data);
		}
	//	exit;
	//	prex($data);
	//	print_r($posts->result_array());
		echo json_encode($data);
	}
   
}

/* ==========================[ / End SuperAdmin Class ]========================== */



