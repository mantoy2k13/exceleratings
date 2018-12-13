<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	function __construct() {
       parent::__construct();
	//	prex($this->session->userdata('logedin_user'));
		$this->load->model('User_model');
		$this->load->model('General_model');
		if($this->session->userdata('logedin_user')){
		$this->logedin_user = $this->User_model->user_data_by_id( $this->session->userdata('logedin_user')->id );
		}
	}
	public function index()
	{
		$this->load->view('front/home');
	}
	
	public function review()
	{
		if( !$this->session->userdata('logedin_user') ){
			redirect('auth/login');
		}
		$this->db->select('*');
		$this->db->from('rev_questions');
		$this->db->where('status', 1);
		$this->db->where('userid', $this->session->userdata('logedin_user')->id);
		$this->db->order_by('shorting', 'ASC');
		$this->db->order_by('qid', 'DESC');
		$data['ques'] = $this->db->get()->result_object();
		
		$this->load->view('front/review', $data);
	}
	
	public function good_review()
	{
		if( !$this->session->userdata('logedin_user') ){
			redirect('auth/login');
		}
		$data['profile'] = $this->General_model->get_user_data($this->logedin_user->id);
		$this->load->view('front/good-review', $data);
	}
	
	public function enrollment(){
		

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
				'tablet_needed' => $this->input->post('tablet_needed'),
				'tablet_so_how_many' => $this->input->post('tablet_so_how_many'),
				'service_location' => $this->input->post('service_location'),
				'start_date_of_contract' => $this->input->post('start_date_of_contract'),
				'pos_rdr_url_yelp' => $this->input->post('pos_rdr_url_yelp'),
				'pos_rdr_url_google' => $this->input->post('pos_rdr_url_google'),
				'pos_rdr_url_facebook' => $this->input->post('pos_rdr_url_facebook'),
				'pos_rdr_url_trip_advisor' => $this->input->post('pos_rdr_url_trip_advisor'),
				'pos_rdr_url_urban_spoon' => $this->input->post('pos_rdr_url_urban_spoon'),
				'pos_rdr_url_city_search' => $this->input->post('pos_rdr_url_city_search')
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
		
		$this->load->view('front/enrollment', $data);
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
		//	prex($rev_ques);
			$cur_datetime = date("Y-m-d H:i:s");
		//	prex($this->input->post());
			$raringToSave = [
				'for_uid' => $this->logedin_user->id,
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
				//	$this->session->set_flashdata('success', 'Thanks for your rating, Please review us also on Yelp and Google review page. ');
					redirect(base_url('front/good_review'));
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
	
	public function contact(){
		
		if( $this->input->post('contact_submit') ){
			
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('comments','Comments','required');
			
			$this->load->library('email');
			
			$this->email->from($this->input->post('email'), $this->input->post('name'));
			$this->email->to('thomas.woodfin02@yopmail.com');
			
			$this->email->subject('Email from contact page by ' . $this->input->post('email'));
			$this->email->message($this->input->post('comments'));
			
			if($this->email->send()){
				redirect(base_url('front/contact'));
			}
		}
		$this->load->view('front/contact');
	}
	public function about(){
		$this->load->view('front/about');
	}
	public function pricing(){
		$this->load->view('front/pricing');
	}
	public function team(){
		$this->load->view('front/team');
	}
}
