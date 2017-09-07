<?php

class Customer_Registration extends CI_Controller {

    function __construct() {
        parent::__construct();
//         echo "hai thuis is admin page";
    }

    function newUser() {
        
        @$connection=mysql_connect('localhost','root','');
        $select_db=mysql_select_db('ecommerce');
        $this->form_validation->set_rules('name', 'Username', 'required');
//          $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[registration.email_id]');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('cpwd', 'Confrom Password', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile number', 'required');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'user_name' => $_POST['name'],
                'email_id' => $_POST['email'],
                'password' => md5($_POST['password']),
                'mobile_no' => $_POST['mobile']
            );
        } 
        if(isset($_POST['email'])) {
            $user_email=$_POST['email'];
           
            $usercheck="select count(email_id) from registration where email_id=$user_email";
            
            $result=mysql_query($usercheck,$connection);
//            echo $result;
//            $yes=count($result);
            if($result>0)
            {
                $this->session->set_flashdata('message','Email already exists');
               redirect("/customer_controller/register", "refresh");
//                echo "yes";
            }
            else
            {
                $this->db->insert('registration', $data);
                redirect("/customer_controller/login", "refresh");
//                echo "no";
            }
        
        }
    }
}

?>