<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/addImages_model');
    }

    function adminLoginPage() {
        $this->load->view('admin_header/admin_login _header');
        $this->load->view('/admin/adminLogin');
        $this->load->view('/admin_header/admin_footer');
    }

    function adminLogoutPage() {
        $this->load->view('/admin_header/admin_header');
        $this->load->view('/admin/adminLogin');
        $this->load->view('/admin_header/admin_footer');
    }

    function addItems() {
         $logged_in = $this->session->userdata('logged_in');
        if ($logged_in == FALSE || empty($logged_in)) {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('customer_controller/login'); # Login view
        } else {
            $this->load->view('/admin_header/admin_header');
            $this->load->view('/admin/addItems');
            $this->load->view('/admin_header/admin_footer');
        }
    }

    function adminHome($logged_in = '') {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in == FALSE || empty($logged_in)) {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('customer_controller/login'); # Login view
        } else {
        $this->load->view('/admin_header/admin_header');
        $this->load->view('/admin/adminHome');
        $this->load->view('/admin_header/admin_footer');
    }
    }

    function viewItems() {
         $logged_in = $this->session->userdata('logged_in');
        if ($logged_in == FALSE || empty($logged_in)) {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('customer_controller/login'); # Login view
        } else {
        $this->load->view('/admin_header/admin_header');
        $this->load->view('/admin/viewItems');
        $this->load->view('/admin_header/admin_footer');
        }
    }

    function deleteItem() {
        @$pid = $_POST['product_id'];
        $this->addImages_model->deleteById($pid);
        $this->load->view('/admin_header/admin_header');
        $this->load->view('/admin/viewItems');
        $this->load->view('/admin_header/admin_footer');
    }

    function editItems() {
        $this->load->view('/admin_header/admin_header');
        $this->load->view('/admin/editItems');
        $this->load->view('/admin_header/admin_footer');
    }

    function viewNotifications() {
        $this->load->view('/admin_header/admin_header');
        $this->load->view('/admin/notifications');
        $this->load->view('/admin_header/admin_footer');
    }

}
