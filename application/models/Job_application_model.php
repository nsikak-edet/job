<?php

/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 12/14/2016
 * Time: 2:44 PM
 */
class Job_application_model extends CI_Model
{

    const TABLE_NAME = "job_application";
    const PRIMARY_KEY = "id";

    public $id;
    public $user_id; //email is used as the username
    public $job_id;
    public $date_applied;

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
     * Get application by userID and jobID
     * @param $user_id
     * @param $job_id
     * @return null
     */
    public function get_job_by_application_index($user_id,$job_id){
        $this->db->select("*");
        $this->db->from($this::TABLE_NAME);
        $this->db->where('user_id',$user_id);
        $this->db->where('job_id',$job_id);

        $query = $this->db->get();
        $result = $query->result();

        return (empty($result)) ? null : $result[0];
    }

    public function get_applications($user_id){
        $this->db->select("*");
        $this->db->from($this::TABLE_NAME);
        $this->db->join('users','job_application.user_id=users.id');
        $this->db->join('jobs','jobs.id=job_application.job_id');
        $this->db->where('job_application.user_id',$user_id);

        $query = $this->db->get();
        $result = $query->result();

        return (empty($result)) ? null : $result;
    }

    public function get_applications_by_jobid($job_id){
        $this->db->select("*,job_application.user_id as user_id,users.id as id");
        $this->db->from($this::TABLE_NAME);
        $this->db->join('jobs','jobs.id=job_application.job_id');
        $this->db->join('users','job_application.user_id=users.id');
        $this->db->join('resume','users.id=resume.user_id');
        $this->db->where('job_application.job_id',$job_id);

        $query = $this->db->get();
        $result = $query->result();

        return (empty($result)) ? null : $result;
    }
}