<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	
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
	//	$this->User_model->user_data_by_id( $this->session->userdata('logedin_user')->id )->usertype;
	}
	public $logedin_usertype;
	
	public function index()
	{
		$data['menuitem4'] = 'home';
		
		$this->db->select('*');
		$this->db->from('subs_packages');
		$data['subs'] = $this->db->get()->result_object();
		
		$data['overall_avr_rating'] = $this->General_model->get_overall_avr_rating();
		$data['profile'] = $this->General_model->get_user_data($this->session->userdata('logedin_user')->id);
	//	pre(date('Y-m-d', strtotime('-2 months')));
	//	prex($this->General_model->get_overall_avr_rating('2018-10-10'));
		
		$this->db->select('rv.*');
		$this->db->from('reviews as rv');
		$this->db->join('q_pages as pg', 'rv.for_pgid = pg.id', 'left');
		if($this->logedin_user->usertype == 'generaluser'){
			$this->db->where('pg.userid',$this->logedin_user->id);
		}
		$data['total_rating_item'] = count($this->db->get()->result_object());
		$data['total_rating_item4chart'] = $this->General_model->get_overall_avr_rating_ind();
		
		$this->db->select('*');
		$this->db->from('rev_questions');
		if($this->logedin_user->usertype == 'generaluser'){
			$this->db->where('userid',$this->logedin_user->id);
		}
		$this->db->order_by('shorting', 'ASC');
		$data['ques'] = $this->db->get()->result_object();
		
		if($this->logedin_user->usertype == 'superadmin'){
			
			$this->load->view('dashboard/home-superadmin', $data);
		}else{
			$this->load->view('dashboard/home-superadmin', $data);
		}
	}
	
	public function review($rid){
		
		$data['menuitem4'] = '';
		if( isset($_POST['status_change']) ){
			$status = $this->input->post('rev_status');
		//	prex($status);
			$this->db->where('id', $rid);
			if($this->db->update('reviews', array('status'=>$status))){
				
				$this->session->set_flashdata('success', 'Status Updated');
				redirect(base_url('dashboard/page/review/' . $rid));
			}
		}
		
		$this->db->select('qr.*,rq.*');
		$this->db->from('question_ratings as qr');
		$this->db->join('rev_questions as rq', 'qr.qid = rq.qid', 'left');
		$this->db->where('qr.rid', $rid);
		$this->db->order_by('rq.shorting', 'ASC');
		$data['revItem_ques'] = $this->db->get()->result_object();
		
		$this->db->select('*');
		$this->db->from('reviews');
		$this->db->where('id', $rid);
		$data['revItem'] = $this->db->get()->row();
		
		$data['averageRating'] = $this->General_model->get_ques_average_rating($data['revItem']->id);
		
	//	prex($data);
		
		$this->load->view('dashboard/single-review', $data);
	}
	
	public function plan_subscription(){
		
		$data['menuitem4'] = 'plan_subscription';
		/* 
		$uid = $this->session->userdata('logedin_user')->id;
		$data['profile'] = $this->General_model->get_user_data($uid);
		 */
		$this->load->view('dashboard/plan-subscriptions', $data);
	}
	public function plan_subscription_form(){
		$session_userdata = $this->session->userdata();
		/* 
		$session_userdata['subs_action'] = 'gold';
		 */
	//	prex($session_userdata);
		$data['menuitem4'] = 'plan_subscription';
		$uid = $this->session->userdata('logedin_user')->id;
		
		$data['profile'] = $this->General_model->get_user_data($uid);
		
		if( $this->input->post() ){
			
			$enroll_data = [
				'fullname' => $this->input->post('fullname'),
				'fullname_contact' => $this->input->post('fullname_contact'),
				'phone' => $this->input->post('phone'),
				'alt_name_client_contact' => $this->input->post('alt_name_client_contact'),
				'alt_phone' => $this->input->post('alt_phone'),
				'alt_email' => $this->input->post('alt_email'),
				'tablet_needed' => $this->input->post('tablet_needed') ? $this->input->post('tablet_needed') : 0,
				'tablet_so_how_many' => $this->input->post('tablet_so_how_many') ? $this->input->post('tablet_so_how_many') : 0,
				'service_location' => $this->input->post('service_location'),
				'start_date_of_contract' => $this->input->post('start_date_of_contract'),
				'pos_rdr_url_yelp' => $this->input->post('pos_rdr_url_yelp') ? addhttp($this->input->post('pos_rdr_url_yelp')) : '',
				'pos_rdr_url_google' => $this->input->post('pos_rdr_url_google') ? addhttp($this->input->post('pos_rdr_url_google')) : '',
				'pos_rdr_url_facebook' => $this->input->post('pos_rdr_url_facebook') ? addhttp($this->input->post('pos_rdr_url_facebook')) : '',
				'pos_rdr_url_trip_advisor' => $this->input->post('pos_rdr_url_trip_advisor') ? addhttp($this->input->post('pos_rdr_url_trip_advisor')) : '',
				'pos_rdr_url_urban_spoon' => $this->input->post('pos_rdr_url_urban_spoon') ? addhttp($this->input->post('pos_rdr_url_urban_spoon')) : '',
				'pos_rdr_url_city_search' => $this->input->post('pos_rdr_url_city_search') ? addhttp($this->input->post('pos_rdr_url_city_search')) : ''
			];
			
			$this->db->select('*');
			$this->db->from('user_profile');
			$this->db->where('uid', $uid);
			
			if($this->db->get()->row()){ // Checking if user row found in user_profile table
				
				$this->db->where('uid', $uid);
				if( $this->db->update('user_profile', $enroll_data) ){
					$this->db->where('id', $uid);
					$this->db->update('users', ['subs_package_slug'=>$this->input->post('subs_package_slug')]);
					redirect('dashboard/settings/profile');
				}
				
			}else{
				$enroll_data['uid'] = $uid;
				if( $this->db->insert('user_profile', $enroll_data) ){
					$this->db->where('id', $uid);
					$this->db->update('users', ['subs_package_slug'=>$this->input->post('subs_package_slug')]);
					redirect('dashboard/settings/profile');
				}
			}
		exit;
		}
		$this->load->view('dashboard/plan-subscriptions-form', $data);
	}
	
	public function dt_ajax_get_rev_list()
	{
		$this->db->select('
			reviews.*, 
			q_pages.id pg_id, 
			q_pages.pg_title pg_title, 
			q_pages.userid userid, 
			users.username auth_username, 
			users.email auth_email, 
			users.subs_package_slug auth_subs_package, 
			user_profile.fullname auth_fullname, 
			users.service_category auth_service_category_id, 
			service_categories.title auth_business_type 
			');
		$this->db->from('reviews');
		$this->db->join('q_pages', 'reviews.for_pgid = q_pages.id', 'left');
		$this->db->join('users', 'q_pages.userid = users.id', 'left');
		$this->db->join('user_profile', 'users.id = user_profile.uid', 'left');
		$this->db->join('service_categories', 'users.service_category = service_categories.id', 'left');
		if($this->logedin_user->usertype == 'generaluser'){
			$this->db->where('q_pages.userid',$this->logedin_user->id);
		}
		$this->db->order_by('reviews.id', 'DESC');
		$reviews = $this->db->get();
		
		$data['data'] = [];
		$rv_data = [];
		
		foreach( $reviews->result_object() as $rv_k => $rv_v ){
		//	pre($rv_v);
			$status = '';
			$rating = '';
			if( $rv_v->status == 1 ){
				$status = '<i class="fa fa-star" aria-hidden="true"></i>';
			}
			if( $this->General_model->get_ques_average_rating($rv_v->id) != '' ){
				
				if($this->General_model->get_ques_average_rating($rv_v->id) > 69 ){
					$rating = '<h4><span class="badge badge-info">'. round($this->General_model->get_ques_average_rating($rv_v->id), 1) .' %</span></h4>';
				}elseif( $this->General_model->get_ques_average_rating($rv_v->id) <= 69 ){
					$rating = '<h5><span class="badge badge-secondary">'. round($this->General_model->get_ques_average_rating($rv_v->id), 1) .' %</span></h5>';
				}
			}
			$rv_data['sl'] = $rv_k *1 +1;
			$rv_data['inserted_at'] = $rv_v->inserted_at;
			$rv_data['email'] = $rv_v->email;
			$rv_data['pg_title'] = 'Username: <b>'. $rv_v->auth_username .'</b><br>
			Email: <b>'. $rv_v->auth_email .'</b> <br>';
			if( $rv_v->auth_fullname != '' ){
				$rv_data['pg_title'] .= 'FullName: <b>'. $rv_v->auth_fullname .'</b>';
			}
			if( $rv_v->auth_subs_package == 'silver' ){
				$rv_data['pg_title'] .= 'Subs:Package: <b class="badge badge-secondary">'. $rv_v->auth_subs_package .'</b>';
			}elseif($rv_v->auth_subs_package == 'gold' ){
				$rv_data['pg_title'] .= 'Subs:Package: <b class="badge badge-danger">'. $rv_v->auth_subs_package .'</b>';
			}elseif($rv_v->auth_subs_package == 'bronze' ){
				$rv_data['pg_title'] .= 'Subs:Package: <b class="badge badge-warning">'. $rv_v->auth_subs_package .'</b>';
			}
			$rv_data['average_rating'] = $rating;
			$rv_data['action'] = '<a href="'. base_url('/dashboard/page/review/'. $rv_v->id ) .'" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" title="">
						<i class="fa fa-fw fa-lg fa-eye"></i> / <i class="fa fa-fw fa-lg fa-edit"></i></a>';
			
			array_push($data['data'], $rv_data);
		}
		
	//	exit;
	//	prex($data);
	//	print_r($posts->result_array());
		echo json_encode($data);
	}
}

