<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function login()
	{
		if( isset($_POST['login']) ){
			$this->form_validation->set_rules('username','UserName','required');
			$this->form_validation->set_rules('password','Password','required');
			
			if( $this->form_validation->run() == TRUE ){
				
				$this->db->select('*');
				$this->db->from('users');
				$this->db->join ( 'user_profile', 'user_profile.uid = users.id' , 'left' );
				$this->db->where('username', $_POST['username']);
				$this->db->or_where('email',$_POST['username']); 
				$this->db->where('password', md5($_POST['password']));
				
				$query = $this->db->get();
         //   prex( $this->db->last_query() );
				if( $query->num_rows() > 0 ){
					$user = $query->row();
					
					if( $user->email ){
						$this->session->set_flashdata('is_login_msg', 'Welcome to Exceleratings. You are now logged in.');
						
						$_SESSION['user_loged'] = true;
						$_SESSION['user_control'] = array(
							'c_userid' => $user->id,
							'userid' => $user->id
						);
						unset($user->password);
						$_SESSION['logedin_user'] = $user;
						if( isset($_GET['rdr']) ){
							if( $_GET['rdr'] == 'plan_subscription' ){
								$get_plan = '';
								if( isset($_GET['plan']) ){
									$get_plan = $_GET['plan'];
								}
								redirect(base_url('dashboard/page/plan_subscription_form?plan=' . $get_plan), 'refresh');
							}
						}else{
							redirect('dashboard/page', 'refresh');
						}
					} else {
						$this->session->set_flashdata('error', 'Account not match !!');
						redirect('auth/login', 'refresh');
					}
				}else{
					$this->session->set_flashdata('error', 'Account not match !!');
					redirect('auth/login', 'refresh');
				}
			}
		}
		if( isset($_SESSION['user_loged']) && $_SESSION['user_loged'] ){
			redirect('dashboard/page', 'refresh');
		}else{
			$this->load->view('auth/login');
		}
	}
	
	public function registration()
	{
		$this->db->select('*')
					->from('service_categories')
					->order_by('id', 'DESC');
		$data['service_categories'] = $this->db->get()->result_object();
	
	//	prex($data['service_categories']);
		if( $this->input->post('submitForm') == 'register' ){
		//	prex($this->input->post());
			$this->form_validation->set_message('is_unique', 'The %s is already taken');
			$this->form_validation->set_rules('username','UserName','required|is_unique[users.username]');
			$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('service_category','Service Type','required');
			$this->form_validation->set_rules('password','Password','required|min_length[3]');
			$this->form_validation->set_rules('conf_password','Confirm Password','required|min_length[3]|matches[password]');
			
			if( $this->form_validation->run() == TRUE ){
				
				$data = array(
					'username' => $_POST['username'],
					'email' => $_POST['email'],
					'service_category' => $_POST['service_category'],
					'password' => md5($_POST['password']),
					'usertype' => 'generaluser',
					'subs_package_slug' => 'free'
				);
				$this->db->insert('users', $data);
				
				$this->session->set_flashdata('success', 'Your account has been registered. You can login now.');
				redirect('auth/login', 'refresh');
			}else{
				
			}
		}
		if( isset($_SESSION['user_loged']) ){
			redirect('dashboard/page', 'refresh');
		}else{
			$this->load->view('auth/registration', $data);
		}
	}
	public function logout()
	{
		unset($_SESSION);
		session_destroy();
		$this->session->set_flashdata('success', 'Thank you. You are logged out.');
		redirect('auth/login');
	}
}
