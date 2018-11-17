<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	function __construct() {
       parent::__construct();
		 
		$this->load->model('General_model');
	}
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
	
	public function slug2option_val( $slug = null ){
		if( $slug != null ){
			
			$this->db->select('*');
			$this->db->from('settings');
			$this->db->where('option_slug', $slug);
			return $this->db->get()->row()->option_value;
		}else{
			return '';
		}
	}
	
	public function review_add()
	{
		if( $this->input->post() ){
			
			$rev_ques = $this->input->post()['rev_ques'];
			
			$cur_datetime = date("Y-m-d H:i:s");
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
				'rev_about_experience' => $this->input->post('rev_about_experience'),
				'inserted_at' => $cur_datetime
			];
			if( str_replace('%','',$this->input->post('total_rev_plus')) * 1 > 69 ){
				$raringToSave['status'] = 1;
			}
			if($this->db->insert('reviews', $raringToSave)){
				$inserted_rid = $this->db->insert_id();
								
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
			
				if( str_replace('%','',$this->input->post('total_rev_plus')) * 1 > 69 ){
					$this->session->set_flashdata('review70up', true);
					$this->session->set_flashdata('success', 'Thanks for your rating, Please review us also on Yelp and Google review page. ');
				}else{
					
					$emailContent = '';
					$this->db->select('*');
					$this->db->from('users');
					$this->db->where('username', 'admin');
					$siteadmin = $this->db->get()->row();
					
					// load email library
					$this->load->library('email');
					
					$emailContent .= '<h2><small>Rating percent<strong></small> : ' . $this->input->post('total_rev_plus') . '</strong> </h2><br> ';
					$emailContent .= 'Time <strong> : ' . $cur_datetime . '</strong> <br> ';
					$emailContent .= 'Email <strong> : ' . $this->input->post('c_email') . '</strong> <br> ';
					$emailContent .= 'Phone <strong> : ' . $this->input->post('c_phone') . '</strong> <br> ';
					$emailContent .= 'First Name <strong> : ' . $this->input->post('c_firstname') . '</strong> <br> ';
					$emailContent .= 'Last Name <strong> : ' . $this->input->post('c_lastname') . '</strong> <br> ';
					
					
					$get_note_contacts = $this->General_model->get_note_contacts();
					$note_contact_emails = [];
					foreach($get_note_contacts as $conts ){
						array_push($note_contact_emails, $conts->email);
					}
					
					$this->email
						 ->from($siteadmin->email, 'Exceleratings SuperAdmin')
						 ->to($note_contact_emails)
						 ->subject('Bad review notification')
						 ->message($emailContent)
						 ->set_mailtype('html');

					// send email
					$this->email->send();
					
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
