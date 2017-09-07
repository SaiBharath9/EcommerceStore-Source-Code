<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UserAllreadyExist extends CI_Model{
    

function checkEmail($key)
{
    $email_address = $this->input->post('email');
    $this->db->where('email_id', $email_address);
    $result = $this->db->get('registration');

    if($result->num_rows() > 0){
        /*
         * the email already exists
         * */
        return false;
    }else{
     return true;
    }
}
}