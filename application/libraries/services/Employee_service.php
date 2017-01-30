<?php
/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 1/17/2017
 * Time: 5:00 PM
 */
class Employee_service{

    private $CI;

    public function __construct(){
        $this->CI =& get_instance();
    }

    /**
     * Validate new recruiter data
     */
    public function validate_employee(){
        $this->CI->load->library("form_validation");

        $this->CI->form_validation->set_rules('email','Email','trim|required|valid_email|callback_email_check');
        $this->CI->form_validation->set_rules('first_name','First Name','trim|required');
        $this->CI->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->CI->form_validation->set_rules('password','Password','trim|required|min_length[6]');
        $this->CI->form_validation->set_rules('confirm_password','Password Confirmation','trim|required|matches[password]');
        $this->CI->form_validation->set_rules('terms_status','Terms','trim|required',array('required' => 'You must accept our Terms to submit form'));

        return $this->CI->form_validation->run();
    }

    /***
     * Validate new employee details
     * @return mixed
     */
    public function validate_employee_details(){
        $this->CI->load->library("form_validation");
        $this->CI->form_validation->set_rules('first_name','First Name','trim|required');
        $this->CI->form_validation->set_rules('middle_name','Middle Name','trim|required');
        $this->CI->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->CI->form_validation->set_rules('country','Country','trim|required|callback_options_check');
        $this->CI->form_validation->set_rules('city','City','trim|required');
        $this->CI->form_validation->set_rules('address','address','trim|required');
        $this->CI->form_validation->set_rules('phone_number','Phone Number','trim|required');
        $this->CI->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->CI->form_validation->set_rules('description','Description','trim|required');

        return $this->CI->form_validation->run();

    }

    public function validate_employee_education(){
        $this->CI->load->library("form_validation");
        $this->CI->form_validation->set_rules('school_name','School Name','trim|required');
        $this->CI->form_validation->set_rules('degree','Degree','trim|required');
        $this->CI->form_validation->set_rules('school_location','School Location','trim|required');
        $this->CI->form_validation->set_rules('description','Description','trim|required');

        return $this->CI->form_validation->run();

    }

    public function validate_employee_experience(){
        $this->CI->load->library("form_validation");
        $this->CI->form_validation->set_rules('title1','School Name','trim|required');
        $this->CI->form_validation->set_rules('from1','Degree','trim|required');
        $this->CI->form_validation->set_rules('to1','School Location','trim|required');
        $this->CI->form_validation->set_rules('description1','Description','trim|required');

        $this->CI->form_validation->set_rules('title2','School Name','trim|required');
        $this->CI->form_validation->set_rules('from2','Degree','trim|required');
        $this->CI->form_validation->set_rules('to2','School Location','trim|required');
        $this->CI->form_validation->set_rules('description2','Description','trim|required');


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

        if(!empty($result) && ($user->id != $result[0]->id)){
            $this->CI->form_validation->set_message('email_check', 'Email already exists in database');
        }

        //return true if empty and false if not empty
        return (empty($result) || (!empty($result) && ($user->id == $result[0]->id))) ? true : false;
    }

    /***
     * @param $company_name
     * @return bool
     */
    public function valid_company($company_name){
        $this->CI->load->model("recruiter_model");
        $result = $this->CI->recruiter_model->get_recruiter_by_company_name($company_name);
        $user = $this->CI->session->userdata('user');

        if(!empty($result) && ($user->id != $result[0]->id)){
            $this->CI->form_validation->set_message('company_check', 'Company Name already exists in database');
        }

        return (empty($result) || (!empty($result) && ($user->id == $result[0]->id)));
    }
}