<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_login extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->output->no_cache();
        $this->load->library('session');
        ob_start();
    }
    function changePassword()
        {
        $this->load->view('/header/header');
        $this->load->view('view_reset_password');
        $this->load->view('/footer/footer');
        }

    public function index() {
//        $this->load->library('session');  
        $email = ($_POST['email_id']);
        //$this->session->set_userdata('name',$email);
//         $this->form_validation->set_rules('user', 'Username', 'required');
        $this->load->view('userlogheader');
        $this->load->view('/customer/my-account');
    }

    public function process1() {
        $this->load->library('session');
          session_start();
        //$this->load->library('session');
        $email_id = ($_POST['email']);
        //$pass = md5($_POST['password']);
        $password = md5($_POST['password']);
        //$this->load->model("testmodel");
        //$data['records'] = $this->testmodel->getAllRecords();
        //$row = $data->row_array(); 
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->where(array('email_id' => $email_id, 'password' => $password));
        $query = $this->db->get();
        $user = $query->num_rows();
        $this->db->select('*');
        $this->db->from('loginadmin');
        $this->db->where(array('email' => $email_id, 'password' => $password));
        $query = $this->db->get();
        $user1 = $query->num_rows();
        if ($user > 0) {
            var_dump($_SESSION);
            //$data=$this->session->set_userdata('email_id',$email_id);
            $data = $this->session->set_userdata('email_id', $email_id);
            //$_SESSION['email_id']=$email_id;
            //$email_id=$_SESSION['email_id'];
                    $session = array(
                    'email_id'  => $email_id,
                    'logged_in' => TRUE
                );

                $logged_in=$this->session->set_userdata($session);
                 
            redirect("/customer_controller/loginhome", $data,$logged_in);
        } else if ($user1 > 0) {
//            $this->session->set_userdata(array('email_id'=>$email)); 
             $session = array(
                    'email'  => $email_id,
                    'logged_in' => TRUE
                );
              $logged_in=$this->session->set_userdata($session);
            redirect("/admin_controller/adminHome",$logged_in);
        } else {
            $this->session->set_flashdata('message','Invalid Credentials');
            redirect("/customer_controller/login", "refresh");
            //$this->load->view('/customer_controller/register', $data);
        }
        //if ($row['email']==$user && $row['pass']==$pass)   
        //{  
        //declaring session  
        //}  
    }

    public function logout() {
        //removing session 
        $this->session->unset_userdata('email');
        $this->load->driver('cache');
        $this->session->sess_destroy();
        $this->cache->clean();
        ob_clean();
        $this->session->set_flashdata('mes1','You have successfully loged out...');
        redirect("/customer_controller/login", "refresh");
//        session_start();
//        session_destroy();
//        $_SESSION = array();
//        header("location: /customer_controller/login");
    }

    /** Clear the old cache (usage optional) * */
    protected function no_cache() {
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }

}
?>  
