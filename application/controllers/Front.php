<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use MessageMediaMessagesLib\MessageMediaMessagesClient;
use MessageMediaMessagesLib\APIHelper;

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
	
	public function test_raf_46834638(){
		sms_send('8801815035736','Test SMS 3 ...');
	}
	 
	public function index()
	{
		/* 
		echo base_url('dashboard/settings/test_raf_46834638/');
		
		$ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, base_url('dashboard/settings/test_raf_46834638/'));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_HEADER, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $data = curl_exec($ch);
		curl_close($ch);
		
		prex($data);
		
		 */
		$this->load->view('front/home');
	}
	
	public function review($qpg_id = null)
	{
		//$ch = curl_init();
		
		// Set query data here with the URL
	//	curl_setopt($ch, CURLOPT_URL, 'https://witnessone.net/bin/sms/send.php?phone=' . $con_emails . '&message=' . $sms_msg); 
		// curl_setopt($ch, CURLOPT_URL, 'http://exceleratings.local/dashboard/settings/test_raf_46834638'); 
		
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// curl_setopt($ch, CURLOPT_TIMEOUT, 3);
		// $content = trim(curl_exec($ch));
		// curl_close($ch);
		
		
		if( !$this->session->userdata('logedin_user') ){
			redirect('auth/login');
		}
		/* ========================= Firebase Update ======================== */
		$this->db->select('rv.id');
		$this->db->from('reviews as rv');
		$this->db->join('q_pages as pg', 'rv.for_pgid = pg.id', 'left');
		if($this->logedin_user->usertype == 'generaluser'){
			$this->db->where('pg.userid',$this->logedin_user->id);
		}
		$data['user_id'] = $this->logedin_user->id;
		$data['last_review_inserted'] = $this->db->order_by('rv.id','desc')->limit(1)->get()->row();
	//	prex($data['last_review_inserted']);
		if( $data['last_review_inserted'] ){
			
			$data['last_review_inserted'] = $data['last_review_inserted']->id;
		}
		
		$data['overall_avr_rating'] = $this->General_model->get_overall_avr_rating();
		$this->db->select('rv.*');
		$this->db->from('reviews as rv');
		$this->db->join('q_pages as pg', 'rv.for_pgid = pg.id', 'left');
		if($this->logedin_user->usertype == 'generaluser'){
			$this->db->where('pg.userid',$this->logedin_user->id);
		}
		$data['total_rating_item'] = count($this->db->get()->result_object());
		
		$data['total_rating_item4chart'] = $this->General_model->get_overall_avr_rating_ind();
		/* ========================= Firebase Update ======================== */
		
		if( $qpg_id == null ){

			$this->db->select('*')->from('q_pages');
			if( $this->logedin_user->usertype == 'generaluser' ){
				$this->db->where('userid', $this->logedin_user->id);
			}
			$this->db->order_by('id', 'DESC');
			$data['chk_pgs'] = $this->db->get()->row();
			if( $data['chk_pgs'] ){
				redirect('front/review/'.$data['chk_pgs']->id);
			}
			$this->db->select('*');
			$this->db->from('q_pages');
			if( $this->logedin_user->usertype == 'generaluser' ){
				$this->db->where('userid', $this->logedin_user->id);
			}
			$this->db->order_by('id', 'DESC');
			$data['pgs'] = $this->db->get()->result_object();
			
			$this->load->view('front/review-pages', $data);
		}else{
			$data['qpg_id'] = $qpg_id;
			$this->db->select('*')
						->from('pages_questions')
						->join('rev_questions', 'pages_questions.qid = rev_questions.qid', 'left')
						->where('page_id', $qpg_id)
						->order_by('q_shorting', 'ASC');
			$data['ques'] = $this->db->get()->result_object();
		//	prex($data['ques']);
			$this->load->view('front/review', $data);
		}
		
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
	
	public function emailtemp470up(){
		$data = $this->logedin_user;
		$this->load->view('front/emailtemp470up', $data);
	}
	
	public function review_add()
	{
		if( $this->input->post() ){
			
			// load email library
			$this->load->library('email');

			$rev_ques = $this->input->post()['rev_ques'];
		//	prex($rev_ques);
			$cur_datetime = date("Y-m-d H:i:s");
		//	prex($this->input->post());
			$raringToSave = [
				'for_pgid' => $this->input->post('qpg_id'),
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
		//	prex($raringToSave);
			if($this->db->insert('reviews', $raringToSave)){
				
				$inserted_rid = $this->db->insert_id();
				
				$q_detail = [];
				foreach( $rev_ques as $rvq_k => $rvq_v ){
						
					$this->db->select('*')
								->from('rev_questions')
								->where('qid', $rvq_k);
					$q_detail[$rvq_k] = $this->db->get()->row();
					$q_detail[$rvq_k]->rating_from_client = $rvq_v;
				//	pre($rvq_v);
					/* 
					if( $rvq_v > 0 ){
						
						$this->db->insert('question_ratings', [
							'rid' => $inserted_rid,
							'qid' => $rvq_k,
							'review' => $rvq_v
						]);
					}
					 */
				}
			//	prex($q_detail);
				
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('username', 'admin');
				$siteadmin = $this->db->get()->row();
				
				if( str_replace('%','',$this->input->post('total_rev_plus')) * 1 > 69 ){
					$this->session->set_flashdata('review70up', true);
				//	$this->session->set_flashdata('success', 'Thanks for your rating, Please review us also on Yelp and Google review page. ');
					$data = $this->logedin_user;
					$this->email
						 ->from($this->logedin_user->email, 'Exceleratings SuperAdmin')
						 ->to($this->input->post('c_email'))
						 ->subject('Thanks for your rating')
					//	 ->message( $this->load->view('front/emailtemp470up', $data) )
						 ->message( $this->load->view('front/emailtemp470up', $data, true) )
						 ->set_mailtype('html');

					// send email
					$this->email->send();
					
					redirect(base_url('front/good_review'));
				}else{
					
					$emailContent = '';
					
					$emailContent .= '<h2><small>Rating percent<strong></small> : ' . $this->input->post('total_rev_plus') . '</strong> </h2><br> ';
					$emailContent .= 'Time <strong> : ' . $cur_datetime . '</strong> <br> ';
					$emailContent .= 'Email <strong> : ' . $this->input->post('c_email') . '</strong> <br> ';
					$emailContent .= 'Phone <strong> : ' . $this->input->post('c_phone') . '</strong> <br> ';
					$emailContent .= 'First Name <strong> : ' . $this->input->post('c_firstname') . '</strong> <br> ';
					$emailContent .= 'Last Name <strong> : ' . $this->input->post('c_lastname') . '</strong> <br> '.
					'<hr>';
					$qdi = 1;
					$emailContent .= '<ul>';
					$emailContent .= ''.
					'<li style="padding: 5px 0;font-size: 1.4em;">Head rating is <b>'.
					$this->input->post('first_rating') . '</b> out of <b>10</b>'.
					'</li>';
					$emailContent .= '</ul>';
					$emailContent .= '<ol>';
					$ret = '';
					foreach( $q_detail as $qd ){
						
						if( $qd->answer_option == 'yes_no' ){
						
							if( $qd->yes_0_no_1 == 0 ){
								if( $qd->rating_from_client == 10 ){
									$ret = '"<b>YES</b>" selected';
								}elseif($qd->rating_from_client == 0){
									$ret = '"<b>NO</b>" selected';
								}
							}elseif( $qd->yes_0_no_1 == 1 ){
								if( $qd->rating_from_client == 10 ){
									$ret = '"<b>NO</b>" selected';
								}elseif($qd->rating_from_client == 0){
									$ret = '"<b>YES</b>" selected';
								}
							}
							
						}else{
							$ret = '<b>'.$qd->rating_from_client . '</b> rating out of <b>10</b>';
						}
						$emailContent .= ''.
						'<li style="padding: 5px 0;">'.
						$qd->question . '<br>'.
						$ret .
						'</li>'.
						'';
						$qd++;
					}
					$emailContent .= '</ol>';
					$emailContent .= '<hr>';
					
					$get_note_contacts = $this->General_model->get_note_contacts();
					$note_contact_emails = [];
					$note_contact_phons = [];
					foreach($get_note_contacts as $conts ){
						array_push($note_contact_emails, $conts->email);
						array_push($note_contact_phons, $conts->phone);
					}
					
					$this->email
						 ->from($siteadmin->email, 'Exceleratings SuperAdmin')
						 ->to($note_contact_emails)
						 ->subject('Bad review notification')
						 ->message($emailContent)
						 ->set_mailtype('html');
						
					// send email
					$this->email->send();
					
					if( $this->logedin_user->subs_package_slug == 'gold' || $this->logedin_user->subs_package_slug == 'silver' ){
						
						//	https://witnessone.net/bin/sms/send.php?phone=23434342&message=sdjfhksdjf 
						$sms_msg = 'Rating percent (' . $this->input->post('total_rev_plus') . ') // From email : ' . $this->input->post('c_email') . ' // From phone : ' . $this->input->post('c_phone') . ' // Name : ' . $this->input->post('c_firstname') . ' ' . $this->input->post('c_lastname') . ' // Time was : ' . $cur_datetime . '';
						
						foreach( $note_contact_phons as $c_phone ){
							sms_send( $c_phone, $sms_msg );
						}
						//	print $content;
					}
					$this->session->set_flashdata('review70up', false);
					$this->session->set_flashdata('success', 'Thanks for your rating');
				} 
				redirect(base_url('front/review/' . $this->input->post('qpg_id')));
			}
		}else{
				prex(44444);
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
	
	
	function sms_test($phone = null){
	//	base_url('dashboard/settings/test_raf_46834638');

		
	//	use MessageMediaMessagesLib\MessageMediaMessagesClient;
	//	use MessageMediaMessagesLib\APIHelper;
		if( $phone != null ){
				/* 
			$authUserName = '9FpRrzD8yFZpOh5cikLw'; // The API key to use with basic/HMAC authentication
			$authPassword = 'mwGj32ezcEITUDAjbJNeZtfwlDg6k7'; // The API secret to use with basic/HMAC authentication
				 */
			$authUserName = '2BuJJVZO7RRGmWOiUbf8'; // The API key to use with basic/HMAC authentication
			$authPassword = 'wN1RQ1EmURe4t1BY1jeZAqT7e67o37'; // The API secret to use with basic/HMAC authentication
			$useHmacAuthentication = false; // Change to true if you are using HMAC keys

			$client = new MessageMediaMessagesLib\MessageMediaMessagesClient($authUserName, $authPassword, $useHmacAuthentication);

			$messages = $client->getMessages();

			
			
			
			$bodyValue = '{
				"messages":[
					{
						"content":"ExceleRatings SMS test",
						"destination_number":"+88'. $phone .'"
					}
				]
			}';

			$body = MessageMediaMessagesLib\APIHelper::deserialize($bodyValue);

			$results = $messages->createSendMessages($body);
			
			pre($body);
			pre($results);
			$messageId = 'a508b910-84d5-4e4a-978d-f9ffcfa90953'; // The message id for the message you wish to get the status for

			$result = $messages->getMessageStatus($results->messages[0]->message_id);
			pre($result);
			
		}
	}
	
}
