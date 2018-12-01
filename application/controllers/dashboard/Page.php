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
		
		$data['overall_avr_rating'] = $this->General_model->get_overall_avr_rating();
	//	pre(date('Y-m-d', strtotime('-2 months')));
	//	prex($this->General_model->get_overall_avr_rating('2018-10-10'));
		
		$this->db->select('*');
		$this->db->from('reviews');
		$data['total_rating_item'] = count($this->db->get()->result_object());
		$data['total_rating_item4chart'] = $this->General_model->get_overall_avr_rating_ind();
		
		

		$this->db->select('*');
		$this->db->from('rev_questions');
		$this->db->order_by('shorting', 'ASC');
		$data['ques'] = $this->db->get()->result_object();
		
		
		
		if($this->logedin_user->usertype == 'superadmin'){
			
			$this->load->view('dashboard/home-superadmin', $data);
		}else{
			$this->load->view('dashboard/plan-subscriptions', $data);
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
		
		$this->load->view('dashboard/plan-subscriptions', $data);
	}
	public function plan_subscription_form(){
		
		$data['menuitem4'] = 'plan_subscription';
		
		$this->load->view('dashboard/plan-subscriptions-form', $data);
	}
	
	public function dt_ajax_get_rev_list()
	{
		$this->db->select('*');
		$this->db->from('reviews');
		$this->db->order_by('id', 'DESC');
		$reviews = $this->db->get();
		
		$data['data'] = [];
		$rv_data = [];
		
		foreach( $reviews->result_object() as $rv_k => $rv_v ){
			
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
