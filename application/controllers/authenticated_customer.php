<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticated_customer extends CI_Controller {
	 
        function __construct() {
            parent::__construct();
            $this->load->model('Cart_model');
        }
        function cart()
        {
            $logged_in = $this->session->userdata('logged_in');
        if ($logged_in == FALSE || empty($logged_in)) {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('customer_controller/login'); # Login view
        } else {
            $this->load->view('/header/header');
            $this->load->view('/authenticated_customer/cart');
            $this->load->view('/footer/footer');
        }
        }
        function myOrders()
        {
            $logged_in = $this->session->userdata('logged_in');
        if ($logged_in == FALSE || empty($logged_in)) {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('customer_controller/login'); # Login view
        } else {
            $this->load->view('/header/header');
            $this->load->view('/authenticated_customer/myOrders');
            $this->load->view('/footer/footer');
        }
        }
        function delivery()
        {
            $logged_in = $this->session->userdata('logged_in');
        if ($logged_in == FALSE || empty($logged_in)) {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('customer_controller/login'); # Login view
        } else {
            $this->load->view('/header/header');
            $this->load->view('/authenticated_customer/delivery');
            $this->load->view('/footer/footer');
        }
        }
        function checkOut()
        {$logged_in = $this->session->userdata('logged_in');
        if ($logged_in == FALSE || empty($logged_in)) {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('customer_controller/login'); # Login view
        } else {
            $this->load->view('/header/header');
            $this->load->view('/authenticated_customer/checkout');
            $this->load->view('/footer/footer');
        }
        }
        
        function deleteCartItem() {
            $pid = $this->input->get('$id');
//            echo $pid;
            $this->Cart_model->deleteCartProduct($pid);
            $this->load->view('/header/header');
            $this->load->view('/authenticated_customer/cart');
            $this->load->view('/footer/footer');
            
        }
        
}
