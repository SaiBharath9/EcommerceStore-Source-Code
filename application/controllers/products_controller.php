<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products_controller extends CI_Controller {
    function __construct() {
        parent::__construct();  
    }
    public function addCart() {
       $this->load->view('/header/header');
        $this->load->view('/cart');
        $this->load->view('/footer/footer');
    }
    public function viewProduct() {
       $this->load->view('/header/header');
        $this->load->view('/single-product');
        $this->load->view('/footer/footer');
    }
    function wishlist()
    {
        $this->load->view('/header/header');
        $this->load->view('/wishlist');
        $this->load->view('/footer/footer');
    }
    function checkOut()
    {
        $this->load->view('/header/header');
        $this->load->view('/checkout');
        $this->load->view('/footer/footer');
    }
    
    
}