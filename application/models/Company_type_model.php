<?php

/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 1/18/2017
 * Time: 3:07 PM
 */
class Company_type_model extends CI_Model
{
    const TABLE_NAME = "company_types";
    const PRIMARY_KEY =  "id";

    public function __construct(){
        parent::__construct();
    }

    /***
     * Get all company types
     */
    public function get_types(){
        $this->db->select("*");
        $this->db->from($this::TABLE_NAME);

        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

}