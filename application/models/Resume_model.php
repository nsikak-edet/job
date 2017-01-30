<?php

/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 12/14/2016
 * Time: 2:44 PM
 */
class Resume_model extends CI_Model
{

    const TABLE_NAME = "resume";
    const EDU_TABLE_NAME = "employee_education";
    const EX_TABLE_NAME = "employee_experience";
    const PRIMARY_KEY = "id";

    public function __construct(){
        parent::__construct();
    }

    /**
     * Save data into database
     * @param $data
     */
    public function saveOrUpdate($data,$user_id){
        $resume = $this->get_resume_details_by_user_id($user_id);

        //execute insert if data not found in database
        if($resume == null)
            $this->db->insert($this::TABLE_NAME,$data);
        else{
            unset($data['date_created']);
            $this->db->where('user_id',$user_id);
            $this->db->update($this::TABLE_NAME,$data);
        }
    }

    public function saveOrUpdateEducation($data,$user_id){
        $resume = $this->get_resume_edu_by_user_id($user_id);

        //execute insert if data not found in database
        if($resume == null)
            $this->db->insert($this::EDU_TABLE_NAME,$data);
        else{
            unset($data['date_created']);
            $this->db->where('user_id',$user_id);
            $this->db->update($this::EDU_TABLE_NAME,$data);
        }
    }


    /***
     * @param $data
     * @param $user_id
     */
    public function saveExperience($data,$user_id){

        //delete previous records
        $this->db->where('user_id', $user_id);
        $this->db->delete($this::EX_TABLE_NAME);

        //add new experience
        $this->db->insert_batch($this::EX_TABLE_NAME,$data);
    }

    /***
     * @param $user_id
     * @return null
     */
    public function get_resume_details_by_user_id($user_id){
        $this->db->select("id");
        $this->db->from($this::TABLE_NAME);
        $this->db->where('user_id',$user_id);

        $query = $this->db->get();
        $result = $query->result();

        return (!empty($result)) ? $result[0] : null;
    }

    /***
     * @param $user_id
     * @return null
     */
    public function get_resume_edu_by_user_id($user_id){
        $this->db->select("id");
        $this->db->from($this::EDU_TABLE_NAME);
        $this->db->where('user_id',$user_id);

        $query = $this->db->get();
        $result = $query->result();

        return (!empty($result)) ? $result[0] : null;
    }

    /***
     * @param $user_id
     * @return null
     */
    public function get_details_by_id($user_id){
        $this->db->select("*");
        $this->db->from($this::TABLE_NAME);
        $this->db->where('user_id',$user_id);
        $this->db->join('apps_countries','apps_countries.id=resume.country');

        $query = $this->db->get();
        $result = $query->result();

        return (empty($result)) ? null : $result[0];
    }

    /**
     * @param $user_id
     * @return null
     */
    public function get_education_by_id($user_id){
        $this->db->select("*");
        $this->db->from($this::EDU_TABLE_NAME);
        $this->db->where('user_id',$user_id);

        $query = $this->db->get();
        $result = $query->result();

        return (empty($result)) ? null : $result[0];
    }

    /***
     * Get Employee experience
     * @param $user_id
     * @return null
     */
    public function get_experience_by_id($user_id){
        $this->db->select("*");
        $this->db->from($this::EX_TABLE_NAME);
        $this->db->where('user_id',$user_id);

        $query = $this->db->get();
        $result = $query->result();

        return (empty($result)) ? null : $result;
    }
}