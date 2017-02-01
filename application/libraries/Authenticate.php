<?php

/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 12/14/2016
 * Time: 4:27 PM
 */
class Authenticate
{
    private $CI;

    public function __construct(){
        $this->CI =& get_instance();
    }


    /***
     * Check if session is valid
     * @return bool
     */
    public function is_permitted_user($permitted_users){
        $user = $this->CI->session->userdata('user');
        if($user != null){
            foreach($permitted_users as $user_group){
                if(intval($user->user_group) == intval($user_group)){
                    return true;
                }

            }

        }

        return false;
    }

    /***
     * @param $permitted_users
     */
    public function permit_valid_user($permitted_users){
        $is_permitted = $this->is_permitted_user($permitted_users);
        if($is_permitted == false){
            $this->logout();
        }
    }


    /***
     * Logout user from the system
     */
    public function logout(){
        $this->CI->session->sess_destroy();
        redirect(base_url());
    }
}