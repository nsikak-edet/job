<?php

/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 1/18/2017
 * Time: 3:07 PM
 */
class Job_type_model extends CI_Model
{
    const TABLE_NAME = "job_types";
    const PRIMARY_KEY =  "id";

    public function __construct(){
        parent::__construct();
    }

    /***
     * Get all company types
     */
    public function get_job_types(){
        $this->db->select("*");
        $this->db->from($this::TABLE_NAME);

        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

}