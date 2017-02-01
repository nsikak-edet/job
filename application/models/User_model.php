<?php

/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 12/14/2016
 * Time: 2:44 PM
 */
class User_model extends CI_Model
{

    const TABLE_NAME = "users";
    const PRIMARY_KEY = "id";

    public $id;
    public $email; //email is used as the username
    public $password;
    public $user_group;
    public $is_active;
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
     * @param $data
     * @param $user_id
     */
    public function update($data,$user_id){
        $this->db->where('id',$user_id);
        $this->db->update($this::TABLE_NAME,$data);

    }

    /***
     * @param $email
     */
    public function get_user_by_email($email){
        $this->db->select("*");
        $this->db->from($this::TABLE_NAME);
        $this->db->where('email',$email);

        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

    /***
     * @param $user_id
     */
    public function delete($user_id){
        $this->db->where('id',$user_id);
        $this->db->delete($this::TABLE_NAME);
    }

    public function get_employees($user_id){
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