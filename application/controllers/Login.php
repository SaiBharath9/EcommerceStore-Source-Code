<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
    }

    function reset_password() {

        if (isset($_POST['email']) && !empty($_POST['email'])) {
//            $this-> load->library('form_validation');
            //first check if it is a valid emil or not
            $this->form_validation->set_rules('email_id', 'Email Address', 'trim|requried|min_length[6]|max_length[50]|valid_email|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                //email didn't validate ,send back to reset password form and shhow errors 
                //this will likely never occur due to validations done on type"email"
                //$this->load->view('includes/header'F);
                $this->load->view('view_login', array('error' => 'please supply a valid email address.'));
                // $this->load->view('include/footer');
            } else {
                $email = trim($this->input->post('email'));
              //  echo $email . "*******";
                $result = $this->Login_model->email_exits($email);

                if ($result) { 
                    $this->send_reset_password_email($email, $result);
                    // $this->load->view('include/header');
                    //$this->load->view('view_reset_password-sent', array('email' => $email));
                      $this->session->set_flashdata('message','Mail has been sent..check your mail');
                    redirect("/customer_controller/changePassword", "refresh");
                    //$this->load->view('include/footer');
                } else {
                    // $this->load->view('include/header');
                    $this->session->set_flashdata('msg','Email not registered');
                    redirect("/customer_controller/changePassword", "refresh");
//                    $this->load->view('view_reset_password', array('error' => 'Email address not registered'));
                }
            }
        } else {
            //$this->load->view('include/header');
            $this->load->view('view_reset_password');
            //$this->load->view('include/footer');
        }
    }

    function send_reset_password_email($email, $user_name) {



        require 'C:/xampp/php/PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;

        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        $mail->Username = 'freightforumteam@gmail.com';          // SMTP username
        $mail->Password = 'Freight@123'; // SMTP password
        $mail->SMTPSecure = 'tls';                  // Enable TLS encryption,`ssl` also accepted
        $mail->Port = 587;                          // TCP port to connect to

        $mail->setFrom('freightforumteam@gmail.com', 'FreightForum');
        $mail->addReplyTo('freightforumteam@gmail.com', 'FreightForum');
        $mail->addAddress($email);   // Add a recipient
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        $mail->isHTML(true);  // Set email format to HTML

        $bodyContent = '<p> Dear  ' . $user_name . '</p>';
        $bodyContent .= '<p> we want to help you to reset your password ! Please <strong> <a href="http://localhost/sareerstore/login/view_password_change"> click here </a></strong> to reset your password . </p>';
        $bodyContent .= "<p> Thank You !</p>";
        $bodyContent .= "<p> The Team at freight forum </p>";

        $mail->Subject = 'Please reset your password';
        $mail->Body = $bodyContent;

        if (!$mail->send()) {
//            echo 'Message could not be sent.';
//            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
//            echo 'Message has been sent';
        }
    }

    public function reset_password_form($emial, $email_code) {

        if (isset($email, $email_code)) {
            
            $email = trim($email);
            
            $email_hash = sha1($email . $email_code);
            
            $verified = $this->Login_model->verify_reset_password_code($email, $email_code);

            if ($verified) {
                //  $this->load->view('includes/header');
                $this->load->view('view_update_password', array('email_hash' => $email_hash, 'email_code' => $email_code, 'email' => $email));
                //$this->load->view('include/footer');
            } else {
                //$this->load->view('include/header');
                //send back to reset_password page, not update_password , if there was a problem 
                $this->load->view('view_reset_password', array('error' => 'there was aproblem with your link . Please click it again or request to reset your password again ', 'email' => $email));
                //$this->load->view('include/footer');
            }
        }
    }

    public function update_password() {

//        if(isset($_post['email'],$_POST['email_hash'])|| $_POST['email_hash'] !== sha1($POST['email'] . $_POST['email_code'])){
//            //Either a hacker or they changed their  emaail in the email feild , just die.
//            die('Error in updating the password');
//        }
        $this->load->library('form_validation');

        //$this->form_validation->set_rules('email_hash','Email Hash','trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'password ', 'trim|required|min_length[6]|max_length[50]|matches[password_conf]');
        $this->form_validation->set_rules('password_conf', 'Confirmed password', 'trim|required|min_length[6]|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            // user didn't validate ,send back to update  password form and show errors
            //$this->load->view('include/header');
//            $this->load->view('view_update_password');
            // $this->load->view('include/footer');
        } else {
            //successful update
            //returns users   first name if successful
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $sql = "UPDATE registration SET password ='$password' WHERE email_id = '$email' ";
            $this->db->query($sql);
            if ($this->db->affected_rows() === 1) {
                redirect("/customer_controller/login", "refresh");
                //$this->load->view('login/login');
//            } else {
//                return FALSE;
//            }
//

//
//
//            if ($result) {
//                //$this->load->view('include/header');
//                $this->load->view('view_update_password_sucess');
//                //$this->load->view('include/footer');
//            } else {
                //this should never happen 
                //$this->load->view('include/header');
                $this->load->view('view_update_password', array('error' => 'problem in updating your password.please contact' .
                    $this->config->item('admin_email')));
                // $this->load->view('include/footer');
            }
        }
    }

    function view_password_change() 
    {
    redirect("/customer_controller/updatePassword", "refresh");
       // $this->load->view('view_update_password');
    }

}
