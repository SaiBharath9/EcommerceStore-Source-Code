<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class deleteCart_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function deleteCartItems($email) {
        
        $que = "DELETE FROM cart WHERE email_id='$email'";
        if($this->db->query($que)) {
//            echo $email;
//            echo "cart item deleted successfully...";
        }
    }
}

