<?php
/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 1/16/2017
 * Time: 12:57 PM
 */
class Admin extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    /***
     * Admin dashboard
     */
    public function index(){
        $data['page_title'] = "Admin";
        $data['sub_page_title'] = "Dashboard";

        $this->jobs();
    }


    public function recruiters(){
        $data['page_title'] = "Admin";
        $data['sub_page_title'] = "Recruiters";

        $this->load->model('recruiter_model');
        $data['recruiters'] = $this->recruiter_model->get_recruiters();
        $this->template->load("board_default","admin/recruiter_list",$data);
    }

    public function employees(){
        $data['page_title'] = "Admin";
        $data['sub_page_title'] = "Employees";

        $this->load->model('resume_model');
        $data['employees'] = $this->resume_model->get_employees();
        $this->template->load("board_default","admin/employee_list",$data);
    }

    public function jobs(){
        $this->load->model('job_model');
        $this->load->model('job_location_model');
        $this->load->model('job_category_model');

        //gather search inputs
        $job_title = $this->input->get('search-keyword',TRUE);
        $job_location = $this->input->get('job_location',TRUE);
        $job_category = $this->input->get('job_category',TRUE);

        //get job locations and job categories options
        $data['job_locations'] = $this->job_location_model->get_locations();
        $data['job_categories'] = $this->job_category_model->get_categories();

        //count search results
        $total_result = $this->job_model->count_search_jobs($job_title,$job_location,$job_category);
        $url = 'admin/jobs';
        $data['search_url'] = $url;

        //initialize page pagination
        $pagination = paginate($total_result,PAGINATION_PER_PAGE,$url);

        $data['pagination'] = $pagination->create_links();
        $data['total_search_result'] = $total_result;

        //get search results
        $offset = ($this->uri->segment(3) != '' ? intval($this->uri->segment(3)) : 0);
        $search_result = $this->job_model->get_search_jobs($job_title,$job_location,$job_category,PAGINATION_PER_PAGE,$offset);
        $data['search_result'] = $search_result;

        $this->template->load("board_search","admin/search_result",@$data);
    }

}