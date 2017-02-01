<?php

/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 1/18/2017
 * Time: 2:27 PM
 */
class Recruiter_model extends CI_Model
{
    const TABLE_NAME = "recruiters";
    const PRIMARY_KEY = "id";

    public $id;
    public $first_name;
    public $last_name;
    public $company;
    public $phone_number;
    public $company_type;
    public $date_created;
    public $date_updated;

    public function __construct(){
        parent::__construct();
    }

    /***
     * Insert Recruiter's data
     */
    public function save(){
        $this->db->insert($this::TABLE_NAME,$this);
    }

    /***
     * @param $user_id
     */
    public function update($data,$user_id){
        $this->db->where('user_id',$user_id);
        $this->db->update($this::TABLE_NAME,$data);
    }

    /***
     * @param $company_name
     * @return mixed
     */
    public function get_recruiter_by_company_name($company_name){
        $this->db->select("*");
        $this->db->from($this::TABLE_NAME);
        $this->db->where('company',$company_name);

        $query = $this->db->get();
        $result = $query->result();

        return $result;

    }

    /***
     * @param $user_id
     * @return mixed
     */
    public function get_recruiter_by_user_id($user_id){

        $this->db->select("*");
        $this->db->from($this::TABLE_NAME);
        $this->db->join("users","recruiters.user_id=users.id");
        $this->db->join("company_types","recruiters.company_type=company_types.id");
        $this->db->where("recruiters.user_id",$user_id);
        $query = $this->db->get();
        $result = $query->result();

        if(empty($result))
            return null;
        else
            return $result[0];

    }

    /****
     * Get all recruiters
     * @return null
     */
    public function get_recruiters(){
        $this->db->select("*,users.id as id");
        $this->db->from($this::TABLE_NAME);
        $this->db->join("users","recruiters.user_id=users.id");
        $this->db->join("company_types","recruiters.company_type=company_types.id");
        $this->db->where('user_group',RECRUITER_GROUP);
        $query = $this->db->get();
        $result = $query->result();

        if(empty($result))
            return null;
        else
            return $result;
    }

}