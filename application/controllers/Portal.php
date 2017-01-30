<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$this->load->model('job_model');
		$this->load->model('job_location_model');
		$this->load->model('job_category_model');

		//get job locations and job categories options
		$data['job_locations'] = $this->job_location_model->get_locations();
		$data['job_categories'] = $this->job_category_model->get_categories();

		$data['recent_jobs'] = $this->job_model->get_recent_jobs();
		$this->template->load("board_index","body/index",$data);
	}

	public function apply($job_id = 1){

		$data['page_title'] = "Advertised Job";
		$data['sub_page_title'] = "Job";

		$user = $this->session->userdata('user');
		if(($user != null) && ($user->is_active == true) && ($user->user_group == EMPLOYEE_GROUP)){
			$this->load->model('job_application_model');
			$this->load->model('job_model');

			$this->job_application_model->user_id = $user->id;
			$this->job_application_model->job_id = $job_id;
			$this->job_application_model->date_applied = date('Y-m-d H:i:s');

			//fetch job with associated id if found in database
			$job = $this->job_model->get_job_by_id($job_id);
			$user_application_in_db = $this->job_application_model->get_job_by_application_index($user->id,$job_id);
			if($job != null)
			{
				if($user_application_in_db != null){
					$data['msg'] = "You've already applied for this job.";
				}else{
					$this->job_application_model->save();
					$this->job_model->increment_applied($job_id);
					$data['msg'] = "Your application is successfully submitted ";

				}
				$this->template->load("board_default","body/apply_job_success",@$data);


			}else{
				/***
				 * Redirect user -> invalid job id
				 */
				redirect(base_url());
			}

		}else{
			/**
			 * Redirect user --> invalid use for this function
			 */
			redirect(base_url());
		}
	}

	public function job($job_id=0){
		$data['page_title'] = "Advertised Job";
		$data['sub_page_title'] = "Job";

		$this->load->model('job_model');
		$data['job'] = $this->job_model->get_job_by_id(intval($job_id));
		$this->template->load("board_default","body/job_view",$data);
	}

	/***
	 * Job search request handler
	 */
	public function search(){
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
		$url = 'portal/search';

		//initialize page pagination
		$pagination = paginate($total_result,PAGINATION_PER_PAGE,$url);

		$data['pagination'] = $pagination->create_links();
		$data['total_search_result'] = $total_result;

		//get search results
		$offset = ($this->uri->segment(3) != '' ? intval($this->uri->segment(3)) : 0);
		$search_result = $this->job_model->get_search_jobs($job_title,$job_location,$job_category,PAGINATION_PER_PAGE,$offset);
		$data['search_result'] = $search_result;

		$this->template->load("board_search","body/search_result",@$data);
	}

}
