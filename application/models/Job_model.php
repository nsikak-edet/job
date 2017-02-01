<?php

/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 12/14/2016
 * Time: 2:44 PM
 */
class Job_model extends CI_Model
{

    const TABLE_NAME = "jobs";
    const PRIMARY_KEY = "id";

    public $id;
    public $email; //email is used as the username
    public $title;
    public $company_name;
    public $company_address;
    public $salary;
    public $salary_type;
    public $job_type;
    public $job_category;
    public $job_description;
    public $is_active;
    public $expiration_date;
    public $date_created;

    public function __construct(){
        parent::__construct();
    }

    /**
     * Save data into database
     * @param $data
     */
    public function save(){
        $this->db->insert($this::TABLE_NAME,$this);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }



    /***
     * Get job by id
     * @param $job_id
     * @return null
     */
    public function get_job_by_id($job_id){
        $this->db->select("*,jobs.id as id,job_category.name as job_category,job_types.name as job_type,job_location.name as job_location");
        $this->db->from($this::TABLE_NAME);
        $this->db->join('salary_type','salary_type.id=jobs.salary_type','left');
        $this->db->join('job_types','job_types.id=jobs.job_type');
        $this->db->join('job_category','job_category.id=jobs.job_category');
        $this->db->join('job_location','job_location.id=jobs.job_location');
        $this->db->where('jobs.id',$job_id);

        $query = $this->db->get();
        $result = $query->result();

        return (!empty($result)) ? $result[0] : null;

    }

    /***
     * Get recent jobs
     * @return null
     */
    public function get_recent_jobs(){
        $this->db->select("*,jobs.id as id,job_category.name as job_category,job_types.name as job_type,job_location.name as job_location");
        $this->db->from($this::TABLE_NAME);
        $this->db->join('salary_type','salary_type.id=jobs.salary_type','left');
        $this->db->join('job_types','job_types.id=jobs.job_type');
        $this->db->join('job_category','job_category.id=jobs.job_category');
        $this->db->join('job_location','job_location.id=jobs.job_location');
        $this->db->order_by('jobs.id','desc');
        $this->db->limit(10);

        $query = $this->db->get();
        $result = $query->result();

        return (!empty($result)) ? $result : null;

    }

    public function get_search_jobs($keyword,$location_id=0,$category_id=0,$start,$offset){
        $this->db->select("*,jobs.id as id,job_category.name as job_category,job_types.name as job_type,job_location.name as job_location");
        $this->db->from($this::TABLE_NAME);
        $this->db->join('salary_type','salary_type.id=jobs.salary_type','left');
        $this->db->join('job_types','job_types.id=jobs.job_type');
        $this->db->join('job_category','job_category.id=jobs.job_category');
        $this->db->join('job_location','job_location.id=jobs.job_location');
        $this->db->order_by('jobs.id','desc');
        $this->db->limit($start,$offset);

        if($keyword != '')
            $this->db->like('jobs.title',$keyword);

        if($location_id > 0)
            $this->db->where('jobs.job_location',$location_id);

        if($category_id > 0)
            $this->db->where('jobs.job_category',$category_id);

        $query = $this->db->get();
        $result = $query->result();

        return (!empty($result)) ? $result : null;

    }

    public function count_search_jobs($keyword,$location_id=0,$category_id=0){
        $this->db->select("*,jobs.id as id,job_category.name as job_category,job_types.name as job_type,job_location.name as job_location");
        $this->db->from($this::TABLE_NAME);
        $this->db->join('salary_type','salary_type.id=jobs.salary_type','left');
        $this->db->join('job_types','job_types.id=jobs.job_type');
        $this->db->join('job_category','job_category.id=jobs.job_category');
        $this->db->join('job_location','job_location.id=jobs.job_location');
        $this->db->order_by('jobs.id','desc');

        if($keyword != '')
            $this->db->like('jobs.title',$keyword);

        if($location_id > 0)
            $this->db->where('jobs.job_location',$location_id);

        if($category_id > 0)
            $this->db->where('jobs.job_category',$category_id);

        $query = $this->db->get();
        $result = $query->result();

        return (!empty($result)) ? sizeof($result) : 0;

    }

    /****
     * @param $user_id
     * @return null
     */
    public function get_jobs_by_user_id($user_id){
        $this->db->select("*,jobs.id as id");
        $this->db->from($this::TABLE_NAME);
        $this->db->join('salary_type','salary_type.id=jobs.salary_type','left');
        $this->db->join('job_types','job_types.id=jobs.job_type');
        $this->db->join('job_category','job_category.id=jobs.job_category');
        $this->db->join('job_location','job_location.id=jobs.job_location');
        $this->db->where('jobs.user_id',$user_id);
        $this->db->order_by('jobs.date_created');

        $query = $this->db->get();
        $result = $query->result();

        return (!empty($result)) ? $result : null;
    }

    /***
     * Update Job data
     * @param $job_id
     * @param $data
     */
    public function update($job_id,$data){
        $this->db->where('id',$job_id);
        $this->db->update($this::TABLE_NAME,$data);
    }

    /***
     * Increment applied_count column by +1
     * @param $job_id
     */
    public function increment_applied($job_id){
        $query = "UPDATE " . $this::TABLE_NAME .
                  " SET applied_count = applied_count + 1
                  WHERE `id` = " . intval($job_id);
        $this->db->query($query);
    }

    /***
     * Delete job by job id
     * @param $job_id
     */
    public function delete($job_id){
        //delete job from database
        $this->db->where('id',$job_id);
        $this->db->delete($this::TABLE_NAME);

        //delete associated applications
        $table_name = "job_application";
        $this->db->where('job_id',$job_id);
        $this->db->delete($table_name);
    }
}