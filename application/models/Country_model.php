<?php

/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 12/14/2016
 * Time: 2:44 PM
 */
class Country_model extends CI_Model
{

    const TABLE_NAME = "apps_countries";
    const PRIMARY_KEY = "id";

    public function __construct()
    {
        parent::__construct();
    }

    public function get_countries(){
        $this->db->select("*");
        $this->db->from($this::TABLE_NAME);

        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }


}