<?php

/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 12/14/2016
 * Time: 2:44 PM
 */
class Salary_type_model extends CI_Model
{

    const TABLE_NAME = "salary_type";
    const PRIMARY_KEY = "id";

    public function __construct(){
        parent::__construct();
    }

    /***
     * @return mixed
     */
    public function get_salary_types(){
        $this->db->select("*");
        $this->db->from($this::TABLE_NAME);

        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }
}