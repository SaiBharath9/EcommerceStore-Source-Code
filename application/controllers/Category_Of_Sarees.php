<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_Of_Sarees extends CI_Controller {
   
        
        function cotton()
        {
             $logged_in = $this->session->userdata('logged_in');
        if ($logged_in == FALSE || empty($logged_in)) {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('customer_controller/login'); # Login view
        } else {
        $this->load->view('/header/header3');
        $this->load->view('/customer/category/cottonSarees');
        $this->load->view('/footer/footer');
        }
        }
        function gadwal()
        {
             $logged_in = $this->session->userdata('logged_in');
        if ($logged_in == FALSE || empty($logged_in)) {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('customer_controller/login'); # Login view
        } else {
        $this->load->view('/header/header3');
        $this->load->view('/customer/category/gadwalSarees');
        $this->load->view('/footer/footer');
        }
        }
        function uppada()
        {
             $logged_in = $this->session->userdata('logged_in');
        if ($logged_in == FALSE || empty($logged_in)) {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('customer_controller/login'); # Login view
        } else {
        $this->load->view('/header/header3');
        $this->load->view('/customer/category/uppadaPattuSarees');
        $this->load->view('/footer/footer');
        }
        }
        function pattu()
        {
             $logged_in = $this->session->userdata('logged_in');
        if ($logged_in == FALSE || empty($logged_in)) {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('customer_controller/login'); # Login view
        } else {
        $this->load->view('/header/header3');
       $this->load->view('/customer/category/pattuSarees');
        $this->load->view('/footer/footer');
        }
        }
        function khanchi()
        {
             $logged_in = $this->session->userdata('logged_in');
        if ($logged_in == FALSE || empty($logged_in)) {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('customer_controller/login'); # Login view
        } else {
        $this->load->view('/header/header3');
        $this->load->view('/customer/category/khanchiPattuSarees');
        $this->load->view('/footer/footer');
        }
        }
        function designer()
        {
             $logged_in = $this->session->userdata('logged_in');
        if ($logged_in == FALSE || empty($logged_in)) {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('customer_controller/login'); # Login view
        } else {
        $this->load->view('/header/header3');
        $this->load->view('/customer/category/designerSarees');
        $this->load->view('/footer/footer');
        }
        }
        function others()
        {
             $logged_in = $this->session->userdata('logged_in');
        if ($logged_in == FALSE || empty($logged_in)) {
            #user not logged in
            $this->session->set_flashdata('error', 'Session has Expired');
            redirect('customer_controller/login'); # Login view
        } else {
        $this->load->view('/header/header3');
        $this->load->view('/customer/category/others');
        $this->load->view('/footer/footer');
        }
        }
}