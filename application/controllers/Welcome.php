<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	 function index()
	{
        $this->load->view('/header/header');
        $this->load->view('customer/home');
        $this->load->view('/footer/footer');
	}       
}
