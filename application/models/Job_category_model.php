<?php

/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 12/14/2016
 * Time: 2:44 PM
 */
class Job_category_model extends CI_Model
{

    const TABLE_NAME = "job_category";
    const PRIMARY_KEY = "id";

    public function __construct(){
        parent::__construct();
    }

    /***
     * @return mixed
     */
    public function get_categories(){
        $this->db->select("*");
        $this->db->from($this::TABLE_NAME);

        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }
}