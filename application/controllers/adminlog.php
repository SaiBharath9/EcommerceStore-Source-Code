
<?php  

defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Adminlog extends CI_Controller {  
      
    public function index()  
    {  
        
        $this->load->view('adminLogin');  
    }  
    public function process()  
    {  
        $user = ($_POST['username']);  
        $pass = md5($_POST['password']);
        //$this->load->model("testmodel");
        //$data['records'] = $this->testmodel->getAllRecords();
        //$row = $data->row_array(); 
        $this->db->select('*');
        $this->db->from('loginadmin');
        $this->db->where(array('username'=>$user,'password'=>$pass));
        $query=$this->db->get();
        $user=$query->num_rows();
        if($user>0)
        {
            $this->session->set_userdata(array('username'=>$user));  
            redirect("/admin_controller/addItems","refresh");
            //$this->load->view('/admin/addItems');  
        }
        else{  
            $data['error'] = 'Your Account is Invalid';  
            redirect("/admin_controller/adminLoginPage","refresh");
            //$this->load->view('/admin/adminLogin', $data);  
        }  
        //if ($row['email']==$user && $row['pass']==$pass)   
        //{  
            //declaring session  
            
        //}  
        
    }  
    public function logout()  
    {  
        //removing session  
        $this->session->unset_userdata('username');  
        redirect("adminLogin");  
    }  
  
}  
?>  
