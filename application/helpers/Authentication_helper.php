<?php
/**
 * Created by PhpStorm.
 * User: NSSOLVE
 * Date: 1/18/2017
 * Time: 2:20 PM
 */

function generate_salt(){
    return uniqid(mt_rand(), true);
}