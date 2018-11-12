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
		if( $this->input->post() ){
			
			$rev_ques = $this->input->post()['rev_ques'];
		//	prex($this->input->post());
			$raringToSave = [
				'first_rating' => $this->input->post('first_rating'),
				'firstname' => $this->input->post('c_firstname'),
				'lastname' => $this->input->post('c_lastname'),
				'email' => $this->input->post('c_email'),
				'phone' => $this->input->post('c_phone'),
				'street' => $this->input->post('c_street'),
				'address' => $this->input->post('c_address'),
				'rev_comment' => $this->input->post('rev_comment'),
				'is_intelidata' => $this->input->post('is_intelidata') ? $this->input->post('is_intelidata') : 0,
				'inserted_at' => date("Y-m-d H:i:s")
			];
			if($this->db->insert('reviews', $raringToSave)){
				$inserted_rid = $this->db->insert_id();
				
			//	prex($rev_ques);
				
				foreach( $rev_ques as $rvq_k => $rvq_v ){
				//	pre($rvq_v);
					if( $rvq_v > 0 ){

						$this->db->insert('question_ratings', [
							'rid' => $inserted_rid,
							'qid' => $rvq_k,
							'review' => $rvq_v
						]);
					}
				}
			//	prex($this->input->post('total_rev_plus'));
 			if( str_replace('%','',$this->input->post('total_rev_plus')) * 1 > 69 ){
				$this->session->set_flashdata('review70up', true);
				$this->session->set_flashdata('success', 'Thanks for your rating, Please review us also on Yelp and Google review page. ');
				}else{
					$this->session->set_flashdata('review70up', false);
					$this->session->set_flashdata('success', 'Thanks for your rating');
				} 
				redirect(base_url('front/review'));
			}
		   
		}else{
		//	prex(44444);
		}
		$this->load->view('front/review', $data);
	}
}
