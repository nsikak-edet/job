<?php

/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 1/24/2017
 * Time: 4:05 PM
 */
class Employee extends CI_Controller
{

    public function __construct(){
        parent::__construct();
    }

    /***
     * Employee dashboard
     */
    public function index(){
        $data['page_title'] = "Employee";
        $data['sub_page_title'] = "Dashboard";

        $user = $this->session->userdata('user');
        $this->load->model("resume_model");

        $data['employee_details'] = $this->resume_model->get_details_by_id($user->id);
        $this->template->load("board_default","employee/dashboard",$data);
    }

    /***
     * View employee resume
     */
    public function view($user_id = 0){

        $data['page_title'] = "Employee";
        $data['sub_page_title'] = "Dashboard";

        $user = $this->session->userdata('user');
        $this->load->model("resume_model");

        $user_id = ($user_id == 0) ? $user->id : $user_id;
        $data['employee_details'] = $this->resume_model->get_details_by_id($user_id);
        $data['employee_education'] = $this->resume_model->get_education_by_id($user_id);
        $data['employee_experience'] = $this->resume_model->get_experience_by_id($user_id);
        $this->template->load("board_default","employee/resume_view",$data);
    }

    public function applications(){
        $data['page_title'] = "Employee";
        $data['sub_page_title'] = "Applications";
        $user = $this->session->userdata('user');

        //load models
        $this->load->model('job_application_model');
        $data['applications'] = $this->job_application_model->get_applications($user->id);
        $this->template->load("board_default","employee/app_list",@$data);
    }

    /***
     * @param $user_id
     */
    public function del($user_id){
        $this->load->model('resume_model');
        $this->load->model('job_application_model');
        $this->load->model('user_model');
        $jobs = $this->job_application_model->get_applications($user_id);

        if($jobs == null){
            $this->user_model->delete_employee($user_id);
        }

        redirect('admin/employees');
    }

    /***
     * Activate employee - ADMIN function
     * @param $user_id
     */
    public function activate($user_id){
        $this->load->model('user_model');
        $activate = $this->input->get('a',TRUE);

        if($activate != null && intval($activate) == 1){
            $data = array('is_active'=>1);
        }else{
            $data = array('is_active'=>0);
        }
        $this->user_model->update($data,$user_id);
        redirect('admin/employees');
    }

    /***
     * Register new employee request handler
     */
    public function register(){
        $data['page_title'] = "Employee";
        $data['sub_page_title'] = "Register";

        //load password hash library
        $this->load->library('bcrypt');

        //check if employee form is submitted
        $new_employee = $this->input->post('create_employee',TRUE);
        if($new_employee != null){

            $this->load->library("services/employee_service");
            $is_valid_employee = $this->employee_service->validate_employee();

            //add new employee if data is valid
            if($is_valid_employee == true){
                //load employee model
                $this->load->model('user_model');
                $this->user_model->email = $this->input->post('email',TRUE);
                $this->user_model->date_created = date('Y-m-d H:i:s');
                $this->user_model->password = $this->bcrypt->hash($this->input->post('password',TRUE));
                $this->user_model->user_group = EMPLOYEE_GROUP;
                $this->user_model->is_active = 1; //set active status to true
                $this->user_model->save();

                //set username and password
                $this->session->set_flashdata('username',$this->input->post('email',TRUE));
                $this->session->set_flashdata('password',$this->input->post('password',TRUE));

                //force login user after successful registration
                redirect("account/login");
            }

        }

        $this->template->load("board_default","employee/register",@$data);
    }


    public function resume(){

        $user = $this->session->userdata('user');

        $data['page_title'] = "Employee";
        $data['sub_page_title'] = "Resume";

        $this->load->model('country_model');
        $this->load->model('resume_model');

        //get employee details
        $data['countries'] = $this->country_model->get_countries();
        $data['employee_details'] = $this->resume_model->get_details_by_id($user->id);
        $data['employee_education'] = $this->resume_model->get_education_by_id($user->id);
        $data['employee_experience'] = $this->resume_model->get_experience_by_id($user->id);

        //send passport upload error to view
        $upload_error = $this->session->flashdata('error');
        if($upload_error != null){
            $data['upload_error'] = $upload_error;
        }
        $this->template->load("board_default","employee/resume",$data);
    }

    /****
     * Upload passport
     */
    public function upload_passport(){

        $user = $this->session->userdata('user');

        /***
         * Update uploaded passport filename in database
         */
        $is_uploaded = image_upload('passport');
        if($is_uploaded != false){
            $this->load->model('resume_model');
            $resume_data = array(
                                'passport'=> $is_uploaded['file_name'],
                                'user_id' => $user->id,
                                'date_created' => date('Y-m-d H:i:s')
                            );
            $this->resume_model->saveOrUpdate($resume_data,$user->id);
        }

        //redirect to resume page on completion
        redirect("employee/resume");
    }

    public function save_details(){
        $user = $this->session->userdata('user');

        //check if employee details is submitted
        $employee_details = $this->input->post('employee_details',TRUE);

        //process employee details
        if($employee_details != null){
            $this->load->library("services/employee_service");
            $valid_employee_details = $this->employee_service->validate_employee_details();

            /***
             * Save validated job data
             */
            if($valid_employee_details){

                //load employee model
                $this->load->model('resume_model');
                $employee_details = array(
                    'first_name' => $this->input->post('first_name',TRUE),
                    'middle_name' => $this->input->post('middle_name',TRUE),
                    'last_name' => $this->input->post('last_name',TRUE),
                    'country' => $this->input->post('country',TRUE),
                    'city' => $this->input->post('city',TRUE),
                    'user_id' => $user->id,
                    'address' => $this->input->post('address',TRUE),
                    'phone_number' => $this->input->post('phone_number',TRUE),
                    'description' => $this->input->post('description',TRUE),
                    'date_created' => date('Y-m-d H:i:s')
                );

                $this->resume_model->saveOrUpdate($employee_details,$user->id);
                $errorJSON = json_encode(array(
                    'status' => 'SUCCESS'
                ));
                outputJSON($errorJSON);
                return;
            }else{

                /**
                 * send form error to view - AJAX response
                 */
                $errorJSON=  json_encode(array(
                    'status' => 'FAIL',
                    'errors' =>array(
                        array('key'=>'first_name','data' => form_error('first_name')),
                        array('key'=>'last_name', 'data'=>form_error('last_name')),
                        array('key'=>'middle_name', 'data'=> form_error('middle_name')),
                        array('key'=>'email', 'data'=>form_error('email')),
                        array('key'=>'country', 'data'=> form_error('country')),
                        array('key'=>'city', 'data'=> form_error('city')),
                        array('key'=>'address', 'data'=> form_error('address')),
                        array('key'=>'phone_number', 'data'=> form_error('phone_number')),
                        array('key'=>'description', 'data'=> form_error('description'))

                    )
                ));
                outputJSON($errorJSON);
                return;
            }
        }
    }

    public function save_education(){
        $user = $this->session->userdata('user');

        //check if employee education is submitted
        $employee_education = $this->input->post('employee_education',TRUE);

        //process employee education
        if($employee_education != null){
            $this->load->library("services/employee_service");
            $valid_employee_education = $this->employee_service->validate_employee_education();

            /***
             * Save validated employee education data
             */
            if($valid_employee_education){

                //load employee model
                $this->load->model('resume_model');
                $employee_education = array(
                    'school_location' => $this->input->post('school_location',TRUE),
                    'school_name' => $this->input->post('school_name',TRUE),
                    'degree' => $this->input->post('degree',TRUE),
                    'description' => $this->input->post('description',TRUE),
                    'user_id' => $user->id,
                    'date_created' => date('Y-m-d H:i:s')
                );

                $this->resume_model->saveOrUpdateEducation($employee_education,$user->id);
                $errorJSON = json_encode(array(
                    'status' => 'SUCCESS'
                ));
                outputJSON($errorJSON);
                return;
            }else{

                /**
                 * send form error to view - AJAX response
                 */
                $errorJSON=  json_encode(array(
                    'status' => 'FAIL',
                    'errors' =>array(
                        array('key'=>'school_name','data' => form_error('school_name')),
                        array('key'=>'degree', 'data'=>form_error('degree')),
                        array('key'=>'edu_description', 'data'=> form_error('description')),
                        array('key'=>'school_location', 'data'=> form_error('school_location'))


                    )
                ));
                outputJSON($errorJSON);
                return;
            }
        }
    }

    public function save_experience(){
        $user = $this->session->userdata('user');

        //check if employee experience is submitted
        $employee_experience = $this->input->post('employee_experience',TRUE);

        //process employee experience
        if($employee_experience != null){
            $this->load->library("services/employee_service");
            $valid_employee_experience = $this->employee_service->validate_employee_experience();

            /***
             * Save validated employee experience data
             */
            if($valid_employee_experience){

                //load employee model
                $this->load->model('resume_model');
                $employee_experience = array(
                    array(
                        'title' => $this->input->post('title1',TRUE),
                        'from' => date('Y-m-d',strtotime($this->input->post('from1',TRUE))),
                        'to' => date('Y-m-d',strtotime($this->input->post('to1',TRUE))),
                        'description' => $this->input->post('description1',TRUE),
                        'user_id' => $user->id,
                        'date_created' => date('Y-m-d H:i:s')
                    ),
                    array(
                        'title' => $this->input->post('title2',TRUE),
                        'from' => date('Y-m-d',strtotime($this->input->post('from2',TRUE))),
                        'to' => date('Y-m-d',strtotime($this->input->post('to2',TRUE))),
                        'description' => $this->input->post('description2',TRUE),
                        'user_id' => $user->id,
                        'date_created' => date('Y-m-d H:i:s')
                    ),
                );

                $this->resume_model->saveExperience($employee_experience,$user->id);
                $errorJSON = json_encode(array(
                    'status' => 'SUCCESS'
                ));
                outputJSON($errorJSON);
                return;

            }else{

                /**
                 * send form error to view - AJAX response
                 */
                $errorJSON=  json_encode(array(
                    'status' => 'FAIL',
                    'errors' =>array(
                        array('key'=>'title1','data' => form_error('title1')),
                        array('key'=>'from1', 'data'=>form_error('from1')),
                        array('key'=>'to1', 'data'=> form_error('to1')),
                        array('key'=>'ex_description1', 'data'=> form_error('description1')),

                        array('key'=>'title2','data' => form_error('title2')),
                        array('key'=>'from2', 'data'=>form_error('from2')),
                        array('key'=>'to2', 'data'=> form_error('to2')),
                        array('key'=>'ex_description2', 'data'=> form_error('description2'))


                    )
                ));
                outputJSON($errorJSON);
                return;
            }
        }
    }
    /***
     * Validate options
     * @param $value
     * @return bool
     */
    public function options_check($value){
        if($value == '0'){
            $this->form_validation->set_message('options_check', 'Please select option');
            return false;
        }else{
            return true;
        }

    }

    /***
     * Check if new recruiters email has duplicate in database
     * @param $email
     */
    public function email_check($email){
        $this->load->library("services/recruiter_service");
        return $this->recruiter_service->valid_email($email);
    }
}