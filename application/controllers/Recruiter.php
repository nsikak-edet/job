<?php
/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 1/16/2017
 * Time: 12:57 PM
 */
class Recruiter extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    /***
     * Recruiters dashboard
     */
    public function index(){
        $this->authenticate->permit_valid_user(get_permission('AR'));
        $user_id = $this->input->get('uid',TRUE);


        $data['page_title'] = "Recruiter";
        $data['sub_page_title'] = "Dashboard";

        $user = $this->session->userdata('user');
        $this->load->model("job_model");

        $user_id = ($user_id != null) ? intval($user_id) : $user->id;

        $data['jobs'] = $this->job_model->get_jobs_by_user_id($user_id);
        $this->template->load("board_default","recruiter/dashboard",$data);
    }

    public function candidates($job_id=0){
        $this->authenticate->permit_valid_user(get_permission('AR'));
        $data['page_title'] = "Recruiter";
        $data['sub_page_title'] = "candidates";

        $this->load->model('job_application_model');
        $data['candidates'] = $this->job_application_model->get_applications_by_jobid($job_id);
        $this->template->load("board_default","recruiter/candidates_list",$data);
    }

    /***
     * Method handles recruiter's registration
     */
    public function register(){

        //load password hash library
        $this->load->library('bcrypt');

        //load company types model
        $this->load->model("company_type_model");
        $data['company_types'] = $this->company_type_model->get_types();

        //check if recruiter form is submitted
        $new_recruiter = $this->input->post('create_account',TRUE);
        if($new_recruiter != null){

            $this->load->library("services/recruiter_service");
            $is_valid_recruiter = $this->recruiter_service->validate_recruiter($_POST);

            //add new recruiter if data is valid
            if($is_valid_recruiter == true){

                //load user model
                $this->load->model('user_model');
                $this->user_model->email = $this->input->post('email',TRUE);
                $this->user_model->date_created = date('Y-m-d H:i:s');
                $this->user_model->password = $this->bcrypt->hash($this->input->post('password',TRUE));
                $this->user_model->user_group = RECRUITER_GROUP; //user_group 1 {group 1- recruiters}

                //set active to 0 for new account
                $this->user_model->is_active = 1;

                //load recruiter model
                $this->load->model('recruiter_model');
                $this->recruiter_model->first_name = $this->input->post('first_name',TRUE);
                $this->recruiter_model->last_name = $this->input->post('last_name',TRUE);
                $this->recruiter_model->phone_number = $this->input->post('phone_number',TRUE);
                $this->recruiter_model->company = $this->input->post('company_name',TRUE);
                $this->recruiter_model->company_type = $this->input->post('company_type',TRUE);
                $this->recruiter_model->date_created = date('Y-m-d H:i:s');
                $this->recruiter_model->date_updated = date('Y-m-d H:i:s');

                $user_id = $this->user_model->save();

                //set user id
                $this->recruiter_model->user_id = $user_id;
                $this->recruiter_model->save();

                //set username and password
                $this->session->set_flashdata('username',$this->input->post('email',TRUE));
                $this->session->set_flashdata('password',$this->input->post('password',TRUE));

                //force login user after successful registration
                redirect("account/login");

            }

        }

        $data['page_title'] = "Recruiter";
        $data['sub_page_title'] = "Register";
        $this->template->load("board_default","recruiter/register",$data);
    }

    /***
     * Check if new recruiters email has duplicate in database
     * @param $email
     */
    public function email_check($email){
        $this->load->library("services/recruiter_service");
        return $this->recruiter_service->valid_email($email);
    }

    /***
     * @param $company_name
     * @return mixed
     */
    public function company_check($company_name){
        $this->load->library("services/recruiter_service");
        return $this->recruiter_service->valid_company($company_name);

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

    /*****
     *View recruiter's details
     */
    public function profile($user_id=0){
        $this->authenticate->permit_valid_user(get_permission('AR'));
        $data['page_title'] = "Recruiter";
        $data['sub_page_title'] = "Profile";

        $user = $this->session->userdata('user');
        $user_id = ($user_id > 0) ? $user_id : $user->id;
        if($user != null){
            $this->load->model('recruiter_model');
            $recruiter = $this->recruiter_model->get_recruiter_by_user_id($user_id);
            $data['recruiter_data'] = $recruiter;
        }

        $this->template->load("board_default","recruiter/profile",$data);
    }

    /***
     * Edit profile request handler
     */
    public function edit_profile(){
        $this->authenticate->permit_valid_user(get_permission('AR'));
        $user = $this->session->userdata('user');

        //load company types model
        $this->load->model("company_type_model");
        $data['company_types'] = $this->company_type_model->get_types();

        if($user != null){
            $this->load->model('recruiter_model');

            //check if recruiter update form is submitted
            $update_recruiter = $this->input->post('update_profile',TRUE);
            if($update_recruiter != null){

                //load required models and librarys
                $this->load->model('user_model');
                $this->load->model('recruiter_model');
                $this->load->library("services/recruiter_service");
                $is_valid_recruiter = $this->recruiter_service->validate_recruiter_edit();

                //update recruiter's profile data on successful validation
                if($is_valid_recruiter == true){

                    //update recruiter's user data
                    $user_data = array('email'=> $this->input->post('email',TRUE));
                    $this->user_model->update($user_data,$user->id);

                    //update recruiter's data
                    $recruiter_data = array(
                        'first_name' => $this->input->post('first_name',TRUE),
                        'last_name' => $this->input->post('last_name',TRUE),
                        'phone_number' => $this->input->post('phone_number',TRUE),
                        'company' => $this->input->post('company_name',TRUE),
                        'company_type' => $this->input->post('company_type',TRUE)
                    );

                    $this->recruiter_model->update($recruiter_data,$user->id);
                    $this->session->set_flashdata("msg","Profile successfully saved!");
                    redirect("recruiter/edit_profile");

                }

            }

            $data['msg'] =  $this->session->flashdata("msg");
            $recruiter = $this->recruiter_model->get_recruiter_by_user_id($user->id);
            $data['recruiter_data'] = $recruiter;

        }

        $data['page_title'] = "Recruiter";
        $data['sub_page_title'] = "Edit Profile";
        $this->template->load("board_default","recruiter/edit_profile",$data);
    }

    /***
     * Add new job advert process handler
     */
    public function add_job(){
        $this->authenticate->permit_valid_user(get_permission('R'));

        $data['page_title'] = "Recruiter";
        $data['sub_page_title'] = "Add job";

        $user = $this->session->userdata('user');

        //load salary type model
        $this->load->model('salary_type_model');
        $this->load->model('job_type_model');
        $this->load->model('job_location_model');
        $this->load->model('job_category_model');
        $data['salary_types'] = $this->salary_type_model->get_salary_types();
        $data['job_types'] = $this->job_type_model->get_job_types();
        $data['job_locations'] = $this->job_location_model->get_locations();
        $data['job_categories'] = $this->job_category_model->get_categories();

        /***
         * Display success page on successful creation of a new job
         */
        $success_msg = $this->session->flashdata('job_added');
        if($success_msg != null){
            $this->template->load("board_default","recruiter/register_job_success",@$data);
            return;
        }

        //check if recruiter form is submitted
        $new_job_advert = $this->input->post('create_new_job',TRUE);

        //process new job advert
        if($new_job_advert != null){
            $this->load->library("services/recruiter_service");
            $valid_job_data = $this->recruiter_service->validate_job();

            /***
             * Save validated job data
             */
            if($valid_job_data){
                $expiration_date = $this->input->post('expiration_date',TRUE);

                //load job model
                $this->load->model('job_model');
                $this->job_model->title = $this->input->post('title',TRUE);
                $this->job_model->company_name = $this->input->post('company_name',TRUE);
                $this->job_model->company_address = $this->input->post('company_address',TRUE);
                $this->job_model->email = $this->input->post('email',TRUE);
                $this->job_model->salary = $this->input->post('salary',TRUE);
                $this->job_model->salary_type = $this->input->post('salary_type',TRUE);
                $this->job_model->job_type = $this->input->post('job_type',TRUE);
                $this->job_model->job_category = $this->input->post('job_category',TRUE);
                $this->job_model->job_description = $this->input->post('job_description',TRUE);
                $this->job_model->date_created = date('Y-m-d H:i:s');
                $this->job_model->expiration_date = ($expiration_date == null) ? null : date('Y-m-d',strtotime($expiration_date));
                $this->job_model->user_id = $user->id;
                $this->job_model->job_location = $this->input->post('job_location',TRUE);
                $this->job_model->is_active = 0;

                $this->job_model->save();

                //set flashdata
                $this->session->set_flashdata('job_added',1);

                $errorJSON = json_encode(array(
                    'status' => 'SUCCESS',
                    'redirect_url' => base_url() . "recruiter/add_job"
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
                        array('key'=>'title','data' => form_error('title')),
                        array('key'=>'company_name', 'data'=>form_error('company_name')),
                        array('key'=>'company_address', 'data'=> form_error('company_address')),
                        array('key'=>'email', 'data'=>form_error('email')),
                        array('key'=>'salary_type', 'data'=> form_error('salary_type')),
                        array('key'=>'job_type', 'data'=> form_error('job_type')),
                        array('key'=>'job_location', 'data'=> form_error('job_location')),
                        array('key'=>'job_category', 'data'=> form_error('job_category')),
                        array('key'=>'job_description', 'data'=> form_error('job_description'))

                    )
                ));
                outputJSON($errorJSON);
                return;
            }
        }
        $this->template->load("board_default","recruiter/register_job",@$data);
    }

    /**
     * Edit job adverts
     */
    public function edit_job($job_id){

        $this->authenticate->permit_valid_user(get_permission('AR'));
        $data['page_title'] = "Recruiter";
        $data['sub_page_title'] = "Edit job";

        //load  models
        $this->load->model('job_model');
        $this->load->model('salary_type_model');
        $this->load->model('job_type_model');
        $this->load->model('job_location_model');
        $this->load->model('job_category_model');
        $data['salary_types'] = $this->salary_type_model->get_salary_types();
        $data['job_types'] = $this->job_type_model->get_job_types();
        $data['job_locations'] = $this->job_location_model->get_locations();
        $data['job_categories'] = $this->job_category_model->get_categories();
        $data['job'] = $this->job_model->get_job_by_id($job_id);

        $user = $this->session->userdata('user');

        /***
         * Display success page on successful job editing
         */
        $success_msg = $this->session->flashdata('job_edited');
        if($success_msg != null){
            $data['job_edited'] = $this->session->flashdata('job_edited');
        }

        //check if recruiter form is submitted
        $new_job_advert = $this->input->post('edit_job',TRUE);

        //process job edit
        if($new_job_advert != null && ($data['job'] != null) && ($user->id == $data['job']->user_id || $user->user_group == ADMIN_GROUP)){
            $this->load->library("services/recruiter_service");
            $valid_job_data = $this->recruiter_service->validate_job();

            /***
             * Save validated job data
             */
            if($valid_job_data){
                $expiration_date = $this->input->post('expiration_date',TRUE);

                //load job model
                $this->load->model('job_model');
                $data = array(
                            'title' => $this->input->post('title',TRUE),
                            'company_name' => $this->input->post('company_name',TRUE),
                            'company_address' => $this->input->post('company_address',TRUE),
                            'email' => $this->input->post('email',TRUE),
                            'salary' => $this->input->post('salary',TRUE),
                            'salary_type' => $this->input->post('salary_type',TRUE),
                            'job_type' => $this->input->post('job_type',TRUE),
                            'job_category' => $this->input->post('job_category',TRUE),
                            'job_description' => $this->input->post('job_description',TRUE),
                            'expiration_date' => ($expiration_date == null) ? null : date('Y-m-d',strtotime($expiration_date)),
                            'job_location' => $this->input->post('job_location',TRUE)
                        );
                $this->job_model->update($job_id,$data);


                //set flashdata
                $this->session->set_flashdata('job_edited',1);

                $errorJSON = json_encode(array(
                    'status' => 'SUCCESS',
                    'redirect_url' => base_url() . "recruiter/edit_job/$job_id"
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
                        array('key'=>'title','data' => form_error('title')),
                        array('key'=>'company_name', 'data'=>form_error('company_name')),
                        array('key'=>'company_address', 'data'=> form_error('company_address')),
                        array('key'=>'email', 'data'=>form_error('email')),
                        array('key'=>'salary_type', 'data'=> form_error('salary_type')),
                        array('key'=>'job_type', 'data'=> form_error('job_type')),
                        array('key'=>'job_location', 'data'=> form_error('job_location')),
                        array('key'=>'job_category', 'data'=> form_error('job_category')),
                        array('key'=>'job_description', 'data'=> form_error('job_description'))

                    )
                ));
                outputJSON($errorJSON);
                return;
            }
        }

        $this->template->load("board_default","recruiter/edit_job",@$data);
    }

    /***
     * Activate recruiter - ADMIN function
     * @param $user_id
     */
    public function activate($user_id){
        $this->authenticate->permit_valid_user(get_permission('A'));
        $this->load->model('user_model');
        $activate = $this->input->get('a',TRUE);

        if($activate != null && intval($activate) == 1){
            $data = array('is_active'=>1);
        }else{
            $data = array('is_active'=>0);
        }
        $this->user_model->update($data,$user_id);
        redirect('admin/recruiters');
    }

    /***
     * Delete recruiter from database
     *
     * @param $user_id
     */
    public function del($user_id){
        $this->authenticate->permit_valid_user(get_permission('A'));
        $this->load->model('recruiter_model');
        $this->load->model('job_model');
        $this->load->model('user_model');
        $jobs = $this->job_model->get_jobs_by_user_id($user_id);
        if($jobs == null){
            $this->user_model->delete($user_id);
        }
        redirect('admin/recruiters');

    }
}