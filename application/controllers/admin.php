<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    function __construct() {
        parent::__construct();  
    }
    public function update() {
       $this->load->view('updateItems');  
    }
    public function delete() {
       $this->load->view('deleteItems');  
    }
    public function add() {
       $this->load->view('addItems');  
    }
    public function addImages() {
       $this->load->view('addImages');  
    }
    public function addColor() {
       $this->load->view('addColors');  
    }
    public function notify() {
       $this->load->view('notifications');  
    }
    
}