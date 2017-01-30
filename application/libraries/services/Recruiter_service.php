<?php
/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 1/17/2017
 * Time: 5:00 PM
 */
class Recruiter_service{

    private $CI;

    public function __construct(){
        $this->CI =& get_instance();
    }

    /**
     * Validate new recruiter data
     */
    public function validate_recruiter(){
        $this->CI->load->library("form_validation");

        $this->CI->form_validation->set_rules('email','Email','trim|required|valid_email|callback_email_check');
        $this->CI->form_validation->set_rules('first_name','First Name','trim|required');
        $this->CI->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->CI->form_validation->set_rules('phone_number','Phone Number','trim|required');
        $this->CI->form_validation->set_rules('company_name','Company Name','trim|required|callback_company_check');
        $this->CI->form_validation->set_rules('company_type','Company Type','trim|required|callback_options_check');
        $this->CI->form_validation->set_rules('password','Password','trim|required|min_length[6]');
        $this->CI->form_validation->set_rules('confirm_password','Password Confirmation','trim|required|matches[password]');
        $this->CI->form_validation->set_rules('terms_status','Terms','trim|required',array('required' => 'You must accept our Terms to submit form'));

        return $this->CI->form_validation->run();
    }

    /***
     * Validates recruiter edit data
     * @return mixed
     */
    public function validate_recruiter_edit(){
        $this->CI->load->library("form_validation");

        $this->CI->form_validation->set_rules('email','Email','trim|required|valid_email|callback_email_check');
        $this->CI->form_validation->set_rules('first_name','First Name','trim|required');
        $this->CI->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->CI->form_validation->set_rules('phone_number','Phone Number','trim|required');
        $this->CI->form_validation->set_rules('company_name','Company Name','trim|required|callback_company_check');
        $this->CI->form_validation->set_rules('company_type','Company Type','trim|required|callback_options_check');

        return $this->CI->form_validation->run();
    }

    /***
     * Validate new job data
     * @return mixed
     */
    public function validate_job(){
        $this->CI->load->library("form_validation");
        $this->CI->form_validation->set_rules('title','Job title','trim|required');
        $this->CI->form_validation->set_rules('company_name','Company name','trim|required');
        $this->CI->form_validation->set_rules('company_address','Company address','trim|required');
        $this->CI->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->CI->form_validation->set_rules('job_type','Job type','trim|required|callback_options_check');
        $this->CI->form_validation->set_rules('job_location','Job Location','trim|required|callback_options_check');
        $this->CI->form_validation->set_rules('job_category','Job Category','trim|required|callback_options_check');
        $this->CI->form_validation->set_rules('job_description','Job descripton','trim|required');


        $salary = $this->CI->input->post('salary',TRUE);
        if($salary != null){
            $this->CI->form_validation->set_rules('salary_type','Salary type','trim|required|callback_options_check');
        }

        return $this->CI->form_validation->run();

    }

    /***
     * Check if new recruiters email has duplicate in database
     * @param $email
     */
    public function valid_email($email){
        $this->CI->load->model("user_model");
        $result = $this->CI->user_model->get_user_by_email($email);
        $user = $this->CI->session->userdata('user');


        if(!empty($result) && (@$user->id != @$result[0]->id)){
            $this->CI->form_validation->set_message('email_check', 'Email already exists in database');
        }

        //return true if empty and false if not empty
        return (empty($result) || (!empty($result) && (@$user->id == @$result[0]->id))) ? true : false;
    }

    /***
     * @param $company_name
     * @return bool
     */
    public function valid_company($company_name){
        $this->CI->load->model("recruiter_model");
        $result = $this->CI->recruiter_model->get_recruiter_by_company_name($company_name);
        $user = $this->CI->session->userdata('user');

        if(!empty($result) && (@$user->id != @$result[0]->id)){
            $this->CI->form_validation->set_message('company_check', 'Company Name already exists in database');
        }

        return (empty($result) || (!empty($result) && (@$user->id == @$result[0]->id)));
    }
}