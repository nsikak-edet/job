<?php
/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 12/13/2016
 * Time: 3:51 PM
 */

function getAssetsURL(){
    $url = base_url() . "assets/template/";
    return $url;
}

function getDataTableURL(){
    $url = base_url(). "assets/editor";
    return $url;
}

function getSiteName(){
    return "Job Help";
}

function outputJSON($jsonObject){
    $CI =& get_instance();
    $CI->output->enable_profiler(false);
    $CI->output->set_content_type('application/json');

    echo $jsonObject;
}

function image_upload($form_name_attr){

    //get codeigniter instance
    $ci =& get_instance();

    //load form validation library
    $ci->load->library('form_validation');

    if($_FILES[$form_name_attr]['size'] != 0){
        $upload_dir = 'uploads/passports/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir);
        }

        $config['upload_path']   = $upload_dir;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name']     = 'passport_'.substr(md5(rand()),0,7);
        $config['overwrite']     = false;
        $config['max_size']	 = '5120';

        $ci->load->library('upload', $config);
        if (!$ci->upload->do_upload($form_name_attr)){
            $ci->session->set_flashdata('error',$ci->upload->display_errors());
            return false;
        }
        else{
//            $ci->upload_data['file'] =  $ci->upload->data();
            return $ci->upload->data();
        }
    }
    else{
        $ci->session->set_flashdata('error','No file selected');
        return false;
    }
}

function paginate($total,$per_page,$url){

    //get codeigniter instance
    $ci =& get_instance();

    $ci->load->library('pagination');
    $config['base_url'] = base_url() . $url;
    $config['per_page'] = $per_page;
    $config['suffix'] = '?'.http_build_query($_GET, '', "&");
    $config['uri_segment'] = 3;
    $config['total_rows'] = $total;

    /* This Application Must Be Used With BootStrap 3 *  */
    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] ="</ul>";
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
    $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";

    $ci->pagination->initialize($config);

    return $ci->pagination;
}

function get_permission($group){
    switch($group){
        /***
         * A -> Admin permission
         * E -> Employee permission
         * R -> Recruiter permission
         */
        case 'A':
            return array(ADMIN_GROUP);
        break;

        case 'AR':
            return array(ADMIN_GROUP,RECRUITER_GROUP);
        break;

        case 'AE':
            return array(ADMIN_GROUP,EMPLOYEE_GROUP);
        break;

        case 'AER':
            return array(ADMIN_GROUP,EMPLOYEE_GROUP,RECRUITER_GROUP);
        break;

        case 'R':
            return array(RECRUITER_GROUP);
        break;

        case 'E':
            return array(EMPLOYEE_GROUP);
        break;

    }
}
