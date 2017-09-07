<?php
class Login_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    public function email_exits($email){
        $sql="SELECT user_name, email_id FROM registration where email_id ='{$email}' LIMIT 1";
        $result=$this->db->query($sql);
        $row=$result->row();   
        return ($result-> num_rows()===1 && $row->email_id) ? $row->user_name : false;
    }
    
    public function verify_reset_password_code($email,$code){
        
    $sql="SELECT user_name,email_id FROM registration where email_id='{$email}' LIMIT 1 ";
    $result =$this->db->query($sql);
    $row=$result->row();
    
        if($result ->num_row()===1){
            return ($code== md5($this->config->item('salt').$row->user_name))?true:FALSE;
        }else{
            return false;
        }
    }
    
    public function update_function(){
        
        $email=$this->input->post('email');
        $password= sha1($this->config->item('salt').$this->input->post('password'));
    $sql="UPDATE registration SET password ='{$password}' WHERE email_id = '{$email}' LIMT 1";
    $this->db->query($sql);
    
        if($this->db->affected_rows()===1){
            return true;
        }else{
            return FALSE;
        }
    }
}