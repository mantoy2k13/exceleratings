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
				$this->db->where(array('username' => $_POST['username'], 'password' => md5($_POST['password']) ));
				
				$query = $this->db->get();
				if( $query->num_rows() > 0 ){
					$user = $query->row();
					
					if( $user->email ){
						$this->session->set_flashdata('success', 'you are loged in');
						
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
	//	prex($this->input->post);
		if( $this->input->post('submitForm') == 'register' ){
		//	prex($this->input->post());
			$this->form_validation->set_rules('username','UserName','required|is_unique[users.username]');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required|min_length[3]');
			$this->form_validation->set_rules('conf_password','Confarm Password','required|min_length[3]|matches[password]');
			
			if( $this->form_validation->run() == TRUE ){
				
				$data = array(
					'username' => $_POST['username'],
					'email' => $_POST['email'],
					'password' => md5($_POST['password']),
					'usertype' => 'generaluser',
					'subs_package_slug' => 'free'
				);
				$this->db->insert('users', $data);
				
				$this->session->set_flashdata('success', 'Your account has been registered. You can login now.');
				redirect('auth/login', 'refresh');
			}
		}
		if( isset($_SESSION['user_loged']) ){
			redirect('dashboard/page', 'refresh');
		}else{
			$this->load->view('auth/registration');
		}
	}
	public function logout()
	{
		unset($_SESSION);
		session_destroy();
		redirect(base_url('dashboard'), 'refresh');
	}
}
