<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{

	}

	/***
	 * @param $user
	 * @param $password
	 * Login users
	 */
	public function login(){

		$flash_username = $this->session->flashdata('username');
		$flash_password = $this->session->flashdata('password');

		$username = ($flash_username != null) ? $flash_username : $this->input->post('username',TRUE);
		$password = ($flash_password != null) ? $flash_password : $this->input->post('pass',TRUE);
		$this->load->library("form_validation");
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('pass','Password','trim|required');

		//load user model
		$this->load->model('user_model');

		//validate login credentials
		if($this->form_validation->run() || ($flash_username != null && $flash_password != null)){
			$user = $this->user_model->get_user_by_email($username);

			//notify error on invalid username -> email address
			if(empty($user)){
				//echo error to user
				$errorJSON=  json_encode(array(
					'status' => 'FAIL',
					'pass' => 'Invalid username or password'
				));
				outputJSON($errorJSON);
			}else{
				/***
				 * Check user's password
				 */

				//load password hash library
				$this->load->library('bcrypt');
				$user_hash_pass = $user[0]->password;
				$valid_password = $this->bcrypt->verify($password,$user_hash_pass);

				//Login validated user and user is active
				if($valid_password == true && $user[0]->is_active == true){
					$session_data = array(
						'user' => $user[0]
					);

					//set session data for user
					$this->session->set_userdata($session_data);

					//redirect to dashboard
					$this->goto_dashboard();

				}else{
					//echo invalid password error to user
					$errorJSON =  json_encode(array(
						'status' => 'FAIL',
						'pass' => 'Invalid username or password'
					));
					outputJSON($errorJSON);
				}
			}

		}else{

			//echo error to user
			$errorJSON = json_encode(array(
				'status' => 'FAIL',
				'username' => form_error('username'),
				'pass' => form_error('pass')
			));
			outputJSON($errorJSON);
		}

	}

	/***
	 * Redirect user to dashboard
	 */
	private function goto_dashboard(){
		$user = $this->session->userdata('user');
		$flash_username = $this->session->flashdata('username');

		if($user != null){
			switch($user->user_group){
				//user group id 1 -> recruiter
				case RECRUITER_GROUP:
					if($flash_username != null){
						redirect("recruiter");
					}else{
						$errorJSON = json_encode(array(
							'status' => 'SUCCESS',
							'redirect_url' => base_url() . "recruiter"
						));
						outputJSON($errorJSON);
					}
					break;

				case EMPLOYEE_GROUP:
					if($flash_username != null){
						redirect("employee");
					}else{
						$errorJSON = json_encode(array(
							'status' => 'SUCCESS',
							'redirect_url' => base_url() . "employee"
						));
						outputJSON($errorJSON);
					}
					break;

				case 3:
					break;
			}
		}

	}

	/**
	 * Logout request handler
	 */
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
