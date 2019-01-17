<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

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
	
	public function check_usertype( $chk_label ){
		
		$this->logedin_usertype = $this->session->userdata('logedin_user')->usertype;
		if( $this->logedin_usertype == $chk_label ){
			return true;
		}else{
			$this->session->set_flashdata('error', 'please login as superadmin !!!');
			
			redirect('auth/login');
			return false;
		}
	}
	
	public function index()
	{	
		$data['menuitem4'] = 'settings';
		
		if( isset($_POST['save_setting_options']) ){
			foreach( $this->input->post('setting_options') as $op_p_k => $op_p_v ){
				
				$this->db->where('option_slug', $op_p_k);
				$this->db->update('settings', array('option_value'=>$op_p_v));
			}
			
			$this->session->set_flashdata('success', 'Updated ');
			redirect('dashboard/settings');
		}
		$this->db->select('*');
		$this->db->from('settings');
		$data['seting_options'] = $this->db->get()->result_object();
		
		$this->load->view('dashboard/settings', $data);
	}
	
	public function rev_questions( $showReport = null ){
		
	//	$session_user = $this->logedin_user;
		
		$data['menuitem4'] = 'rev_questions';
		
		$this->db->select('*');
		$this->db->from('service_categories');
		$this->db->order_by('id', 'DESC');
		$data['service_categories'] = $this->db->get()->result_object();
	//	pre($data['service_categories']);
		foreach( $data['service_categories'] as $sc_k => $sc_v ){
			$this->db->select('*');
			$this->db->from('rev_questions');
			$this->db->order_by('shorting', 'ASC');
			$this->db->where('service_category', $sc_v->id);
			$data['service_categories'][$sc_k]->questions = $this->db->get()->result_object();
		}
		
		$this->db->select('*');
		$this->db->from('rev_questions');
		if( $this->logedin_user->usertype == 'generaluser' ){
			$this->db->where('userid', $this->logedin_user->id);
		}
		$this->db->order_by('shorting', 'ASC');
		$this->db->order_by('qid', 'DESC');
		$data['ques'] = $this->db->get()->result_object();
		
	//	prex($this->General_model->get_queations_ratings(5));
		$this->load->view('dashboard/rev-question-list-pg', $data);
	}
	
	public function rev_question_add()
	{
		$data['menuitem4'] = 'rev_question_add';
		$data['profile'] = $this->General_model->get_user_data($this->logedin_user->id);
	//	$session_user = $this->logedin_user;
	//	prex($session_user);
	
		$this->db->select('*');
		$this->db->from('service_categories');
		$this->db->order_by('id', 'DESC');
		$data['service_categories'] = $this->db->get()->result_object();
	
		if( isset($_POST['rev_question_add']) ){
			
			$this->form_validation->set_rules('question','Question','required');
			
			if( $this->form_validation->run() == TRUE ){
				
				$this->db->select('MIN(shorting) as min_shorting');
				$this->db->from('rev_questions');
				$get_min_shorting = $this->db->get()->row()->min_shorting;
				
			//	prex($get_min_shorting);
				
				$question_form = [
					'question' => $this->input->post('question'),
					'answer_option' => $this->input->post('answer_option'),
					'yes_0_no_1' => $this->input->post('yes_no_count'),
					'service_category' => $this->input->post('service_category') ? $this->input->post('service_category') : 0,
					'userid' => $this->logedin_user->id,
					'shorting' => $get_min_shorting - 1
				];
				if($this->db->insert('rev_questions', $question_form)){
					$insert_qid = $this->db->insert_id();
					$this->session->set_flashdata('success', 'Added new question');
					redirect('dashboard/settings/rev_questions/');
				}
			}else{
				redirect('dashboard/settings/rev_question_add', $data);
			}
		}
		$this->load->view('dashboard/rev-question-add', $data);
	}

	public function rem_rev_questions(){
		if($this->input->post('qid')){
			$qid = $this->input->post('qid');
			$this->db->where('qid', $qid);
			if($this->db->delete('rev_questions')){
				echo 1;
			} else{
				echo 0;
			}
		}
		else{
			redirect('dashboard/settings/rev_questions');
		}
	}
	
	public function question_pages($pgid = null)
	{
		$session_user = $this->logedin_user;
	//	prex($this->input->post());
		$data['menuitem4'] = 'question_pages';
		
		$this->db->select('*');
		$this->db->from('rev_questions');
		if( $this->logedin_user->usertype == 'generaluser' ){
			$this->db->where('service_category', $this->logedin_user->service_category);
		}
		$this->db->order_by('shorting', 'ASC');
		$data['def_questions'] = $this->db->get()->result_object();
		
		$this->db->select('*');
		$this->db->from('q_pages');
		if( $this->logedin_user->usertype == 'generaluser' ){
			$this->db->where('userid', $this->logedin_user->id);
		}
		$this->db->order_by('id', 'DESC');
		$data['pgs'] = $this->db->get()->result_object();
		
		$data['pageType'] = '';
		$data['pgid'] = '';
		
		if( $pgid != null ){
			$data['pgid'] = $pgid;
			$data['pageType'] = 'edit';
			$data['thePage'] = $this->db->select('*')->from('q_pages')->where('id', $pgid)->get()->row();
			$data['thePageQs'] = $this->db->select('pages_questions.*, rev_questions.question')
												->from('pages_questions')
												->join('rev_questions', 'rev_questions.qid = pages_questions.qid', 'left')
												->where('page_id', $pgid)
												->order_by('q_shorting', 'ASC')
												->get()->result_object();
			
			if( $this->input->post('submit') == 'q_pg_edit' ){
				
				$cur_users_qus = $this->db->select('*')
													->from('rev_questions')
													->where('userid', $session_user->id)
													->get()->result_object();
				
				$curUserAllQs = [];
				foreach($cur_users_qus as $cuq_k => $cuq_v){
					$curUserAllQs[$cuq_k] = $cuq_v->qid;
				}
				$totalUsersQs = array_intersect($curUserAllQs, $this->input->post()['qid']);
				
				 
				if( $session_user->subs_package_slug == 'gold' ){
				//	prex(count($totalUsersQs));
					if( count($totalUsersQs) > 10 ){
						$this->session->set_flashdata('error', 'Your account in Gold plan, Maximum 10 question is allowed from you. <br>Now your question items limit over !!');
					//	prex($session_user->subs_package_slug);
						redirect('dashboard/settings/question_pages/'. $pgid);
					}
				}elseif( $session_user->subs_package_slug == 'silver' ){
					
					if( count($totalUsersQs) > 5 ){
						$this->session->set_flashdata('error', 'Your question exceeds your plan limit. <a href="'. base_url('dashboard/page/plan_subscription_form?plan=gold') .'">Please upgrade your plan to proceed.</a>');
						redirect(base_url('dashboard/settings/question_pages/'. $pgid));
					}
				}elseif( $session_user->subs_package_slug == 'bronze' ){
					
					if( count($totalUsersQs) > 3 ){
						$this->session->set_flashdata('error', 'Your question exceeds your plan limit. <a href="'. base_url('dashboard/page/plan_subscription_form?plan=gold') .'">Please upgrade your plan to proceed.</a>');
						redirect(base_url('dashboard/settings/question_pages/'. $pgid));
					}
				}
				
				/* 
				pre($this->input->post()['qid']);
				pre($curUserAllQs);
				pre($totalUsersQs);
				
				prex($cur_users_qus);
				*/
				
				$pg_data = [
					'pg_title' => $this->input->post('pg_title')
				];
				$this->db->where('id', $pgid); // This page ID
				if($this->db->update('q_pages', $pg_data)){
					
					$this->db->where('page_id', $pgid);
					if($this->db->delete('pages_questions')){
							
						foreach( $this->input->post('qid') as $qid_k => $qid_v ){
							
							$data = [
								'page_id' => $pgid,
								'qid' => $qid_v,
								'q_shorting' => $qid_k
							];
							$this->db->insert('pages_questions', $data);
						}
						$this->session->set_flashdata('success', 'Updated');
						redirect('dashboard/settings/question_pages/'.$pgid);
					}
				}
				
				foreach( $this->input->post('qid') as $qid_k => $qid_v ){
					
					$data = [
						'qid' => $qid_v,
						'q_shorting' => $qid_k
					];
					$this->db->insert('pages_questions', $data);
				}
				$this->session->set_flashdata('success', 'Added new question');
				redirect('dashboard/settings/rev_questions/');
			//	prex( $this->input->post('qid') );
			}else{
					
				$this->db->select('*');
				$this->db->from('rev_questions');
				if( $this->logedin_user->usertype == 'generaluser' ){
					$this->db->where('userid', $this->logedin_user->id);
				}
				
				foreach( $data['thePageQs'] as $qs ){
					$this->db->where('qid !=', $qs->qid);
				}
				$this->db->order_by('shorting', 'ASC');
				$this->db->order_by('qid', 'DESC');
				$data['ques'] = $this->db->get()->result_object();
			//	prex($this->db->last_query()); 
			//	prex($this->General_model->get_queations_ratings(5));
				$this->load->view('dashboard/question-pages', $data);
			}
		}else{
			
			$this->db->select('*')->from('q_pages');
			if( $this->logedin_user->usertype == 'generaluser' ){
				$this->db->where('userid', $this->logedin_user->id);
			}
			$this->db->order_by('id', 'DESC');
			$data['chk_pgs'] = $this->db->get()->row();
			if( $data['chk_pgs'] ){
				redirect('dashboard/settings/question_pages/'.$data['chk_pgs']->id);
			}
		//	prex($data['pgs']->id);
			
			if( $this->input->post('submit') == 'q_pg_save' ){
			//	prex($this->input->post());
				$pg_data = [
					'pg_title' => $this->input->post('pg_title'),
					'userid' => $session_user->id
				];
				if($this->db->insert('q_pages', $pg_data)){
					$insert_pgid = $this->db->insert_id();
					foreach( $this->input->post('qid') as $qid_k => $qid_v ){
						
						$data = [
							'page_id' => $insert_pgid,
							'qid' => $qid_v,
							'q_shorting' => $qid_k
						];
						$this->db->insert('pages_questions', $data);
					}
					$this->session->set_flashdata('success', 'New question page greated');
					redirect('dashboard/settings/question_pages/'.$insert_pgid);
				}
			//	prex( $this->input->post('qid') );
			}else{
					
				$this->db->select('*');
				$this->db->from('rev_questions');
				if( $this->logedin_user->usertype == 'generaluser' ){
					$this->db->where('userid', $this->logedin_user->id);
				}
				$this->db->order_by('shorting', 'ASC');
				$this->db->order_by('qid', 'DESC');
				$data['ques'] = $this->db->get()->result_object();
				
			//	prex($this->General_model->get_queations_ratings(5));
				$this->load->view('dashboard/question-pages', $data);
			}
		}
	}
	
	public function notification_contacts( $cid = null ){
		
		$data['menuitem4'] = 'notification_contacts';
		
		$this->db->select('*');
		$this->db->from('notification_contacts');
		if( $this->logedin_user->usertype == 'generaluser' ){
			$this->db->where('userid', $this->logedin_user->id);
		}
		$this->db->order_by('id', 'DESC');
		$data['contacts'] = $this->db->get()->result_object();
		$data['edit_item'] = '';
		
		if( $cid == null ){
			$data['page_env'] = 'addnew';
			if( isset($_POST['add_contact']) ){

				$contact2add = [
					'title' => $this->input->post('title'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'userid' => $this->logedin_user->id,
					'status' => 1
				];
				if($this->db->insert('notification_contacts', $contact2add)){
					$insert_qid = $this->db->insert_id();
					$this->session->set_flashdata('success', 'New contact was successfully added.');
					redirect('dashboard/settings/notification_contacts');
				}
			}
		}else{
			$data['page_env'] = 'edit';
			$data['edit_item'] = $cid;
			
			$this->db->select('*');
			$this->db->from('notification_contacts');
			$this->db->where('id', $cid);
			$data['contItem'] = $this->db->get()->row();
			if( isset($_POST['edit_contact']) ){

				$contact2edit = [
					'title' => $this->input->post('title'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'status' => $this->input->post('status')
				];
				$this->db->where('id', $cid);
			  if($this->db->update('notification_contacts', $contact2edit)){
					$insert_qid = $this->db->insert_id();
					$this->session->set_flashdata('success', 'Contact item updated');
					redirect('dashboard/settings/notification_contacts/' . $cid);
			  }
			}	
		}
		$this->load->view('dashboard/notification-contacts', $data);
	}
	public function notification_contact_remove(){

		if($this->input->post('cid')){
			$cid = $this->input->post('cid');
			$this->db->where('id', $cid);
			if($this->db->delete('notification_contacts'))
				echo 1;
			else
				echo 0;
		}
		else{
			redirect('dashboard/settings/notification_contacts');
		}
		
		// if( $cid != null ){
		// 	$data['page_env'] = 'addnew';
	
		// 	$this->db->where('id', $cid);
		// 	if($this->db->delete('notification_contacts')){
		// 		$this->session->set_flashdata('remove_success', 'Contact item removed successfully');
		// 		redirect('dashboard/settings/notification_contacts');
		// 	}
		// }
	}
	
	
	
	/* 
	public function rev_question($qid = null)
	{
		if( $qid != null ){
				
			
			if( isset($_POST['rev_question_update']) ){

				$question_form = [
					'question' => $this->input->post('question'),
					'answer_option' => $this->input->post('answer_option')
				];
				$this->db->where('qid', $qid);
			  if($this->db->update('rev_questions', $question_form)){
					$this->session->set_flashdata('success', 'Updated <b>"'.$this->input->post('question').'"</b>');
					redirect('dashboard/settings/rev_question/'.$qid);
			  }
			}
			$this->db->select('*');
			$this->db->from('rev_questions');
			$this->db->where('qid', $qid);
			$data['question'] = $this->db->get()->row();
			$this->load->view('dashboard/rev-question-list');
		}else{
			$this->load->view('dashboard/rev-question-list');
		}
	}
 */

	public function rev_question_edit(){
		
		$qid = $this->input->post('qid');
		if( isset($_POST['rev_question_update']) ){

			$question_form = [
				'question' => $this->input->post('question'),
				'status' => $this->input->post('status'),
				'yes_0_no_1' => $this->input->post('yes_no_count'),
				'answer_option' => $this->input->post('answer_option')
			];
		//	prex($qid);
			
			$this->db->where('qid', $qid);
			if($this->db->update('rev_questions', $question_form)){
				$this->session->set_flashdata('success', 'Updated <h6>"'.$this->input->post('question').'"</h6>');
				redirect('dashboard/settings/rev_questions/');
			}
		}
	}
	
	public function ajax_get_all_questions()
	{
		$this->db->select('*');
		$this->db->from('rev_questions');
		$this->db->order_by('qid', 'DESC');
		$ques = $this->db->get()->result_object();
		
		$data['data'] = [];
		$q_data = [];
		foreach( $ques as $q_k => $q_v ){
			$answer_option = '';
			if( $q_v->answer_option == 'yes_no' ){
				$answer_option = 'Yes/No selection';
			}else if( $q_v->answer_option == 'rev_1_5' ){
				$answer_option = 'Review 1-5 selection';
			}else if( $q_v->answer_option == 'rev_1_10' ){
				$answer_option = 'Review 1-10 selection';
			}
			
			$status = '<span class="badge badge-info">ACTIVE</span>';
			if( $q_v->status == '0' ){
				$status = 'Inactive';
			}
			
			$q_data['sl'] = $q_k *1 +1;
			$q_data['question'] = '<span class="qs">' . $q_v->question . '</span> <small>('. $q_v->qid .')</small>';
			$q_data['answer_option'] = $answer_option . '<span class="ans" hidden>'. $q_v->answer_option .'</span>';
			$q_data['status'] = $status . '<span class="sts" hidden>'. $q_v->status .'</span>';
			$q_data['action'] = '<button data-qid="'. $q_v->qid .'" data-toggle="modal" data-target="#qusEditForm" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" title="">
                  <i class="fa fa-fw fa-lg fa-eye"></i> / <i class="fa fa-fw fa-lg fa-edit"></i></button> &nbsp; 
						<button type="button" class="btn btn-outline-secondary btn-sm toremove" data-toggle="tooltip" data-id="'. $q_v->qid .'">
                  <i class="fa fa-fw fa-lg fa-close"></i></button>';
			
			array_push($data['data'], $q_data);
		}
	//	exit;
	//	prex($data);
	//	print_r($posts->result_array());
		echo json_encode($data);
	}
	
	public function remove_qs_item(){
		if( $_POST ){			
						
			if ( $this->db->delete('rev_questions', array('qid' => $this->input->post('id'))) ) {
				 $result = 'Success';
			} else {
				 $result = 'Error!';
			}
			echo json_encode($result);
		}else{
			echo 'Not posted !';
		}
	}
	
	public function qShortingSave(){
			
		if( $_POST ){	
		//	prex($_POST);
		
			foreach( $_POST as $q_k => $q_v ){
				
				$question_shorting = [
					'shorting' => $q_k
				];
				
				$this->db->where('qid', $q_v);
				$this->db->update('rev_questions', $question_shorting);
				
			}
			echo 'done';
		}else{
			echo 'Not posted !';
		}
	}
	
	

	public function profile( $uid = null )
	{
		$data['menuitem4'] = 'profile';
	//	prex($this->User_model->user_data_by_id($this->session->userdata('logedin_user')->id));
		if( $this->logedin_usertype != 'superadmin' ){
			$uid = null;
		}
		
		if( $uid == null ){
			$uid = $this->session->userdata('logedin_user')->id;
		}
		
		$this->db->select('*')
					->from('service_categories')
					->order_by('id', 'DESC');
		$data['service_categories'] = $this->db->get()->result_object();
	
		if( isset($_POST['profile_save']) ) {
	
			$proPicUpload = $this->do_upload('profilePic','uploads/profile-pic/');
		
			if( isset($proPicUpload['upload_data']) ){
				$profilePicName = $proPicUpload['upload_data']['file_name'];
			}else{
				$profilePicName = '';
			}
			//	prex($this->input->post('user_subs'));
			$toSave1 = [
				'email' => $this->input->post('email')
			];
			
			if( $this->input->post('user_subs') ){
				$toSave1['subs_package_slug'] = $this->input->post('user_subs');
			}
			
			if( $this->input->post('usertype') ){
				$toSave1['usertype'] = $this->input->post('usertype');
			}
			if( $this->input->post('service_category') ){
				$toSave1['service_category'] = $this->input->post('service_category');
			}
			
			$this->db->where('id', $uid);
			
			if($this->db->update('users', $toSave1)){
			//  	prex(4543);
				$ql = $this->db->select('uid')->from('user_profile')->where('uid',$uid)->get();
				if( $ql->num_rows() > 0 ){
					
				$profilePicName = $this->input->post('profilePic_hid');
				if($_FILES['profilePic']['name']) {
					
					$catImgUpload = $this->do_upload('profilePic','uploads/profile-pic/');
					
					if( isset($catImgUpload['upload_data']) ){
						
						$profilePicName = $catImgUpload['upload_data']['file_name'];
					}
				}
					
					$toSave2 = [
						'fullname' => $this->input->post('fullname'),
						'about' => $this->input->post('about'),
						'profilpic' => $profilePicName,
						'pos_rdr_url_yelp' => $this->input->post('pos_rdr_url_yelp') ? addhttp($this->input->post('pos_rdr_url_yelp')) : '',
						'pos_rdr_url_google' => $this->input->post('pos_rdr_url_google') ? addhttp($this->input->post('pos_rdr_url_google')) : '',
						'pos_rdr_url_facebook' => $this->input->post('pos_rdr_url_facebook') ? addhttp($this->input->post('pos_rdr_url_facebook')) : '',
						'pos_rdr_url_trip_advisor' => $this->input->post('pos_rdr_url_trip_advisor') ? addhttp($this->input->post('pos_rdr_url_trip_advisor')) : '',
						'pos_rdr_url_urban_spoon' => $this->input->post('pos_rdr_url_urban_spoon') ? addhttp($this->input->post('pos_rdr_url_urban_spoon')) : '',
						'pos_rdr_url_city_search' => $this->input->post('pos_rdr_url_city_search') ? addhttp($this->input->post('pos_rdr_url_city_search')) : ''
					];
					
				//	prex($toSave2);
					$this->db->where('uid', $uid);
					if($this->db->update('user_profile', $toSave2)){
						$this->session->userdata('logedin_user')->profilpic = $profilePicName;
						$this->session->set_flashdata('success', 'Updated done.');
						redirect('dashboard/settings/profile/'. $uid);
					}
				}else{
						
					$toSave2 = [
						'uid' => $uid,
						'fullname' => $this->input->post('fullname'),
						'about' => $this->input->post('about'),
						'profilpic' => $profilePicName
					];
				  if($this->db->insert('user_profile', $toSave2)){
						$this->session->userdata('logedin_user')->profilpic = $profilePicName;
						$this->session->set_flashdata('success', 'Updated done.');
						redirect('dashboard/profile/'. $uid);
				  }
				}
			}
		}else{
				
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('user_profile', 'user_profile.uid = users.id', 'left');
			$this->db->join('subs_packages', 'subs_packages.spk_slug = users.subs_package_slug', 'left');
			$this->db->where('users.id', $uid);
			$profile = $this->db->get()->row();
		//	prex($this->db->last_query());
			unset($profile->password);
			$data['profile'] = $profile;
		//	prex($profile);
		
			$this->db->select('*');
			$this->db->from('subs_packages');
			$data['subs'] = $this->db->get()->result_object();
		
			$this->load->view('dashboard/profile', $data);
		}
	}
	
	public function do_upload($fileInputName,$save_location){
		
		$config['upload_path']          = $save_location;
		$config['allowed_types']        = 'gif|jpg|png|mp4';
		$config['max_size']             = 0;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($fileInputName))
		{
				$error = array('error' => $this->upload->display_errors());

				return $error;
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());

				return $data;
		}
	}
	
	
	
}



