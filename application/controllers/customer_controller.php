<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customer_controller extends CI_Controller {
   function __construct() {
    parent::__construct();
    $this->load->model('deleteCart_model');
    $this->load->library('session');
   
   }
        function aboutUs()
        {
        $this->load->view('/header/header');
        $this->load->view('customer/about');
        $this->load->view('/footer/footer');
        }
        function changePassword()
        {
        $this->load->view('/header/header');
        $this->load->view('view_reset_password');
        $this->load->view('/footer/footer');
        }
        function updatePassword()
        {
        $this->load->view('/header/header');
        $this->load->view('view_update_password');
        $this->load->view('/footer/footer');
        }
       
        function shop()
        {
        $this->load->view('/header/header3');
        $this->load->view('/customer/shop');
        $this->load->view('/footer/footer');
        }
        function faq()
        {
        $this->load->view('/header/header');
        $this->load->view('/customer/faq');
        $this->load->view('/footer/footer');
        }
        public function contactUs() {
        $this->load->view('/header/header');
        $this->load->view('/customer/contact');
        $this->load->view('/footer/footer');
        }
        function register()
        {
        $this->load->view('/header/header1');
        $this->load->view('customer/my-account');
        $this->load->view('/footer/footer');
        }
        function singleProduct()
        {
       $logged_in = $this->session->userdata('logged_in');
        if ($logged_in == FALSE || empty($logged_in)) {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('customer_controller/login'); # Login view
        } else {
        $this->load->view('/header/header');
        $this->load->view('/customer/single-product');
        $this->load->view('/footer/footer');
        }
        
        }
        function termsConditions()
        {
        $this->load->view('/header/header');
        $this->load->view('/customer/terms-and-conditions');
        $this->load->view('/footer/footer');
        }
        function home()
	{
        $this->load->view('/header/header');
        $this->load->view('customer/home');
        $this->load->view('/footer/footer');
	}
        function login()
        {
        $this->load->view('/header/header2');
        $this->load->view('login/Login');
        $this->load->view('/footer/footer');
        }
        function loginhome($data='',$logged_in='')
        {
         $logged_in = $this->session->userdata('logged_in');
        if($logged_in == False || empty($logged_in))
        {
            #user not logged in
            $this->session->set_flashdata('error', 'You have successfully loged out...');
            
            
            redirect('customer_controller/login'); # Login view
        }
        else
        {
        #user Logged in
        $this->load->view('/header/header',$data);
        $this->load->view('customer/home');
        $this->load->view('/footer/footer');
        }
        
        
       /* function master($page, $dataArray) {
            $this->load->view('/header/userlogheader');
            $this->load->view($page, $dataArray);
            $this->load->view('customer/home');
            $this->load->view('/footer/footer');
            
        }*/
       
        }
        
        function deleteCart() {
            $email = $this->input->get('$mail');
//            echo $email;
            $this->deleteCart_model->deleteCartItems($email);
           // redirect("//delivery", "refresh");         
            $this->load->view('/header/header');
        $this->load->view('customer/home');
        $this->load->view('/footer/footer');
        }
}
	 