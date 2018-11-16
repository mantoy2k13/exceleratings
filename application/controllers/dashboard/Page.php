<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

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
		$data['menuitem4'] = 'home';
		if($this->session->userdata('logedin_user')->usertype == 'superadmin'){
			
			$this->load->view('dashboard/home-superadmin', $data);
		}else{
			$this->load->view('dashboard/home', $data);
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
		
		$data['averageRating'] = $this->get_ques_average_rating($data['revItem']->id);
		
	//	prex($data);
		
		$this->load->view('dashboard/single-review', $data);
	}
	
	public function get_ques_average_rating( $rid )
	{
		$this->db->select('*');
		$this->db->from('reviews');
		$this->db->where('id', $rid);
		$first_rating = $this->db->get()->row()->first_rating;
		
		// Get question reviews 
		$this->db->select('*');
		$this->db->from('question_ratings');
		$this->db->where('rid', $rid);
		$rev = $first_rating;
		$actRev = []; // only this review which is greater then 0
		$ratingPercentage = '';
		foreach( $this->db->get()->result_object() as $actRev_k => $actRev_v ){
			
			if( $actRev_v->review > 0 ){
				$rev = $rev + $actRev_v->review;
				array_push($actRev, $actRev_v);
			}
		}
		/*
		pre($rev);
		pre($revItem = count($actRev));
		pre($actRev);
		*/
		$revItem = count($actRev) + 1;
	//	prex($revItem);
		if( $revItem > 0 ){
			
			$ratingPercentage = ($rev / $revItem) * 10;
		}
		return $ratingPercentage;
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
			if( $this->get_ques_average_rating($rv_v->id) != '' ){
					
				if($this->get_ques_average_rating($rv_v->id) > 69 ){
					$rating = '<h4><span class="badge badge-info">'. round($this->get_ques_average_rating($rv_v->id), 1) .' %</span></h4>';
				}elseif( $this->get_ques_average_rating($rv_v->id) <= 69 ){
					$rating = '<span class="badge badge-secondary">'. round($this->get_ques_average_rating($rv_v->id), 1) .' %</span>';
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
